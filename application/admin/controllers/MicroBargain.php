<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class MicroBargain extends CI_Controller{

	/**
     * MicroBargain Page for this controller.
     */

	public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $defaultImg = $this->common_function->get_system_value('default_goods_image');
        $this->smarty->assign('defaultImg',$defaultImg);
    }
   
    //微砍价--活动列表
    public function micro() {
    	$this->common_function->shop_admin_priv("CouponOfNewman");//权限
    	$op = isset($_GET['op'])?trim($_GET['op']):1;
    	$this->smarty->assign('op',$op);
    	$this->smarty->display('micro_bargain.html');
    }
    
    //微砍价--get活动列表
    public function micro_list(){
        $this->common_function->delete_micro_bargain();
        $op = isset($_GET['op'])?trim($_GET['op']):1;
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = '1=1';
        $times = time();
        if($op==1){
            $where = "start_time<=".$times ." and end_time>=".$times;
        }elseif($op==2){
            $where = "end_time<=".$times;
        }elseif($op==3){
            $where = "start_time>=".$times;
        }
        $where .= "  order by bargain_id desc";
        $total = $this->common_function->total('shop_p_bargain', $where);
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('shop_p_bargain', $where);
        	
        	
        	
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows as $kes=> $row){
            $store_name = $this->db->select('store_name')->from('store')->where('store_id',$row['store_id'])->get()->row('store_name');
            $admin_name = $this->db->select('admin_name')->from('admin')->where('admin_id',$row['add_user'])->get()->row('admin_name');
            $again_bargain = $this->db->select('count(1) as num')->from('shop_p_bargain_attr')->where("bargain_id",$row['bargain_id'])->get()->row('num');

            $this->db->from('shop_goods as g')
            ->join('store_stocks_amount  as sta','g.goods_id=sta.goods_id','left');
            $this->db->where('g.goods_id', $row['goods_id']);
            $this->db->where('sta.ssa_store_id', $row['store_id']);
            $goods_info = $this->db->select('g.goods_id,g.goods_name,g.goods_price,g.goods_marketprice,sta.stocks_price')->group_by('g.goods_id')->get()->row_array();
            $goods_total = $this->db->select('count(1) as num')->from('shop_p_bargain_log')
            ->where("bargain_id",$row['bargain_id'])->get()->row('num');
             
            $flag_id = false;$flag_ids= false;
            if($row['start_time'] <=$times  && $row['end_time']>=$times){
                $flag = "进行中";$flag_id = true;
            }elseif($row['start_time'] >=$times){
                $flag = "未开始";
            }else{
                $flag = "已结束";$flag_ids = true;
            }
            $xml .= "<row id='".$row['bargain_id']."'>";
            $xml .= "<cell><![CDATA[
    	                    <a class='btn red' onclick='fg_edt(" . $row['bargain_id'].")' <i class='fa fa-trash-o'></i>查看活动</a>
    	                    <a class='btn red' onclick='fg_view(" . $row['bargain_id'].")' <i class='fa fa-trash-o'></i>活动详情</a>";
            if($flag_id){
                $xml .= "<a class='btn red' onclick='fg_edit(" . $row['bargain_id'].")' <i class='fa fa-trash-o'></i>编辑活动</a>";
                $xml .= "<a class='btn red' onclick='fg_over(" . $row['bargain_id'].")' <i class='fa fa-trash-o'></i>结束活动</a>";
            }
            if($flag_ids){
                if($again_bargain>=$row['bargain_again']){
                    $xml .= "<a class='btn active' onclick='fg_again(" . $row['bargain_id'].")' <i class='fa fa-trash-o'></i>重启活动</a>";
                }else{
                    $xml .= "<a  href ='javascript:return false;' class='btn'  style='background: #e6e6e6;' <i class='fa fa-trash-o'></i>重启活动</a>";
                }
                
            }
    	    $xml .="]]></cell>";
            $xml .= "<cell><![CDATA[".$row['bargain_title']."]]></cell>";
            $xml .= "<cell><![CDATA[".$goods_info['goods_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$store_name."]]></cell>";
            $xml .= "<cell><![CDATA[". $goods_info['goods_marketprice']."]]></cell>";
            $xml .= "<cell><![CDATA[".(!empty($goods_info['stocks_price'])?$goods_info['stocks_price']:$goods_info['goods_price'])."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['bargain_price']."]]></cell>";
            $xml .= "<cell><![CDATA[".$goods_total."]]></cell>";
            $xml .= "<cell><![CDATA[".date("Y-m-d",$row['start_time'])."]]></cell>";
            $xml .= "<cell><![CDATA[".date("Y-m-d",$row['end_time'])."]]></cell>";
            $xml .= "<cell><![CDATA[".$flag."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['bargain_again']."]]></cell>";
            $xml .= "<cell><![CDATA[".$again_bargain."]]></cell>";
            $xml .= "<cell><![CDATA[".$admin_name."]]></cell>";
            $xml .= "<cell><![CDATA[".date("Y-m-d H:i:s",$row['add_time'])."]]></cell>";
            
            
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }

    
    //微砍价--重启活动
    public function micro_again(){
        $bargain_id = isset($_GET['id']) && !empty($_GET['id'])? $_GET['id']:false;
        $bargain_Info = $this->db->select('*')->from('shop_p_bargain as sb')->where('bargain_id',$bargain_id )->get()->row_array();
        //print_r($bargain_Info);die;
        $key = isset($_GET['key']) && !empty($_GET['key'])? $_GET['key']:false;
        if($bargain_Info){
            $this->db->select('store_name,ous_type,store_id')
            ->from('store')
            ->where('store_id',$bargain_Info['store_id']);
            $store_info = $this->db->get()->row_array();
            $this->db->select('goods_id,goods_pos,goods_image,goods_price,goods_marketprice,goods_name')
            ->from('shop_goods')
            ->where('goods_id',$bargain_Info['goods_id']);
            $goods_info = $this->db->get()->row_array();
            //商品图片
            $shop_goods_img = $goods_info['goods_image'];
            $shop_goods_url = isset($shop_goods_img)?base_url('data/shop/album_pic/')."{$shop_goods_img}":' ';
            
            //砍价规则
            $bargains = !empty($bargain_Info['bargain_info']) ?unserialize($bargain_Info['bargain_info']):array();
            $bargains_count= count($bargains);
            //print_r($bargains);die;
            
            //轮播图片
            $goods_image = unserialize($bargain_Info['goods_image']);
            $goods_image[0] = isset($goods_image[0])?$goods_image[0]:'no';
            $goods_image[1] = isset($goods_image[1])?$goods_image[1]:'no';
            $goods_image[2] = isset($goods_image[2])?$goods_image[2]:'no';
            //print_r($goods_image);die;
            
            //活动图片
            $bargain_url = base_url('data/shop/album_pic/')."{$bargain_Info['bargain_image']}";
            $bargain_url_wx = base_url('data/shop/album_pic/')."{$bargain_Info['bargain_image_wx']}";

            //分享图片
            //$share_url = base_url('data/shop/album_pic/')."{$bargain_Info['bargain_image']}";

            //活动时间
            $time = '';
            $time['start_time'] = date("Y-m-d",$bargain_Info['start_time']);
            $time['end_time'] = date("Y-m-d",$bargain_Info['end_time']);
            
            $defaultImg = $this->common_function->get_system_value('default_goods_image');
            $this->smarty->assign('defaultImg',$defaultImg);
            $this->smarty->assign('store_info',$store_info);
            $this->smarty->assign('goods_info',$goods_info);

            //轮播图片
            $this->smarty->assign('goods_image',$goods_image);
            
            //活动图片
            $this->smarty->assign('bargain_url',$bargain_url);
            $this->smarty->assign('bargain_url_wx',$bargain_url_wx);
            
            //商品图片
            $this->smarty->assign('shop_goods_url',$shop_goods_url);

            //商品时间
            $this->smarty->assign('time',$time);

            $this->smarty->assign('bargain_Info',$bargain_Info);
            $this->smarty->assign('bargains',$bargains);
            $this->smarty->assign('bargains_count',$bargains_count);
            $this->smarty->assign('key',$key);
            $this->smarty->display('micro_again.html');    
        } 
    }
    
    
    //微砍价--新建活动
    public function micro_add(){
        $this->smarty->display('micro_add.html');
    }

    //微砍价--分享设置
    public function micro_share(){
        $savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
        $micros['micro_share_title'] = $this->common_function->get_system_value('micro_share_title');
        $micros['micro_share_content'] = $this->common_function->get_system_value('micro_share_content');
        $micros['micro_share_url'] = $this->common_function->get_system_value('micro_share_url');
        $defaultImg = $this->common_function->get_system_value('default_goods_image');
        $this->smarty->assign('defaultImg',$defaultImg);
        //print_r($micros);die;
        $this->smarty->assign('micros',$micros);
        $this->smarty->display('micro_share.html');
    }
    
    
    
   //微砍价--分享保存
    public function micro_share_save(){
        $savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
        $key_words = '分享编辑';
        $res = array(
            'state'=>false,
            'msg'=> $key_words."失败"
        );
        
        $micros['micro_share_title'] = isset($_POST['share_title']) && !empty($_POST['share_title'])? trim($_POST['share_title']):false;
        $micros['micro_share_content'] = isset($_POST['share_content']) && !empty($_POST['share_content'])? trim($_POST['share_content']):false;
        $micros['micro_share_url'] = isset($_POST['share_images']) && !empty($_POST['share_images'])? trim($_POST['share_images']):false;
	    if(isset($_FILES['share_img'])){
	          if( $_FILES['share_img']['size'] && $_FILES['share_img']['error']==0){
                            $tmp_file = $_FILES['share_img']['tmp_name'];
                            $file_types = explode ( ".", $_FILES['share_img']['name'] );
                            $file_type = $file_types [count ( $file_types ) - 1];
                            if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                                $return = array(
                                    'state'=>false,
                                    'msg'=>'图片'.$kes."不是图片文件，请重新上传"
                                );
                                echo json_encode($return);
                                exit(); 
                            }
                            $str = date ( 'Ymd' ) .$this->common_function->get_msectime()."_micro"; // 以时间来命名上传的文件
                            $file_name = $str . "." . $file_type; // 是否上传成功
                            if (! copy( $tmp_file, $savePath . $file_name )) {
                                $return = array(
                                    'state'=>false,
                                    'msg'=>'图片'.$kes."图片上传失败，请稍后重新上传"
                                );
                                echo json_encode($return);
                                exit(); 
                            }else{
                                $micros['micro_share_url'] = $file_name;
                            }
               }
         }
         
            $this->db->trans_off(); //禁用事务
            $this->db->trans_start(); //开启事务
            $this->db->update('system_config', array('value'=>$micros['micro_share_title']), array('code'=>'micro_share_title'));
            $this->db->update('system_config', array('value'=>$micros['micro_share_content']), array('code'=>'micro_share_content'));
            $this->db->update('system_config', array('value'=>$micros['micro_share_url']), array('code'=>'micro_share_url'));
            $this->db->trans_complete(); //事务完成
            $this->db->trans_off(); //禁用事务
            $res['state'] =true;$res['msg'] =$key_words."成功";
            echo json_encode($res);exit(); 
    }
    
    //微砍价--查看活动
    public function micro_edit(){
        $bargain_id = isset($_GET['id']) && !empty($_GET['id'])? $_GET['id']:false;
        $defaultImg = $this->common_function->get_system_value('default_goods_image');
        
        
        $bargain_Info = $this->db->select('sb.*,b.store_name,g.goods_image as goods_images')->from('shop_p_bargain as sb')
        ->join('store as b','b.store_id=sb.store_id','left')
        ->join('shop_goods as g','sb.goods_id=g.goods_id','left')
        ->where('sb.bargain_id',$bargain_id )->get()->row_array();
        if($bargain_Info['bargain_info']){
            $bargain_Info['bargain_info'] = unserialize($bargain_Info['bargain_info']);
        }
        //$bargain_Info = $this->common_function->get_row('shop_p_bargain', "bargain_id=".$bargain_id);
        //print_r($bargain_Info['goods_image']);die;
        if($bargain_Info['goods_image']){
            $bargain_Info['goods_image'] = unserialize($bargain_Info['goods_image']);
        }
        $this->smarty->assign('defaultImg',$defaultImg);
        $this->smarty->assign('bargain_Info',$bargain_Info);
        $this->smarty->assign('bargain_id',$bargain_id);
        $this->smarty->display('micro_edit.html');
    }
    
    
    //微砍价--保存活动第一步
    public function micro_add_edit_one(){
        $bargain_id = isset($_GET['id']) && !empty($_GET['id'])? $_GET['id']:false;
        $key_words = '添加活动';
        if($bargain_id){
            $key_words = '编辑活动';
        }
        $res = array(
            'state'=>false,
            'id'=>$bargain_id ,
            'msg'=> $key_words."失败"
        );
        $savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
        $goods_images = '';//砍价轮播图
        if(isset($_FILES)){
            foreach ($_FILES as $kes=>$val){
                if($val){
                    if( $val['size'] && $val['error']==0){
                        $tmp_file = $val['tmp_name'];
                        $file_types = explode ( ".", $val['name'] );
            
                        $file_type = $file_types [count ( $file_types ) - 1];
                        if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                            $return = array(
                             'state'=>false,
                             'msg'=>'图片'.$kes."不是图片文件，请重新上传"
                            );
                            echo json_encode($return);
                            exit(); 
                        }
                        $str = date ( 'Ymd' ) .$this->common_function->get_msectime()."_micro"; // 以时间来命名上传的文件
                        $file_name = $str . "." . $file_type; // 是否上传成功
                        if (! copy( $tmp_file, $savePath . $file_name )) {
                            $return = array(
                             'state'=>false,
                             'msg'=>'图片'.$kes."图片上传失败，请稍后重新上传"
                            );
                            echo json_encode($return);
                            exit(); 
                        }else{
                           $goods_images[] = $file_name;
                        }
                    }
                }
            }
        }

        if($goods_images){
            $goods_images  = serialize($goods_images);
        }
        $bargain = array(
            'goods_id'=>trim($_POST['goods_id']),
            'store_id'=>trim($_POST['store_id']),
            'start_time'=>strtotime($_POST['start_time']),
            'end_time'=>strtotime($_POST['end_time']),
            'bargain_rule'=>trim($_POST['bargain_rule']),
            'bargain_title'=>trim($_POST['bargain_title']),
            'add_user'=>$_SESSION['shop_admin_id'],
            'add_time'=>time(),
        );
        if($bargain_id){
            $goods_image_info = $this->db->select('goods_image')->where('bargain_id',$bargain_id)->get('shop_p_bargain')->row('goods_image');
            if($goods_image_info){
                $goods_image_info = unserialize($goods_image_info);
            }
            if($goods_images && $goods_image_info){//删除之前的图片
                foreach ($goods_image_info as $ks=>$vs){
                    if($vs){
                        @unlink($savePath.$vs);
                    }
                }
                $bargain['goods_image'] = $goods_images;
            }
            
            if($this->db->where("bargain_id = '{$bargain_id}'")->update('shop_p_bargain',$bargain)){
                $res['state']=true;$res['id']=$bargain_id;$res['msg']=$key_words."成功";
            }
        }else{
            $bargain['goods_image'] = $goods_images;
            if($this->db->insert('shop_p_bargain',$bargain)){
                $bargain_id = $this->db->insert_id();
                $res['state']=true;$res['id']=$bargain_id;$res['msg']=$key_words."成功";
                
            }
        }
        echo json_encode($res);
        exit();
    }
    
    
    //微砍价--保存活动第二步
    public function micro_add_edit_two(){
        $bargain_id = isset($_GET['bargain_id']) && !empty($_GET['bargain_id'])? $_GET['bargain_id']:false;
        $res = array(
            'state'=>false,
            'id'=>$bargain_id ,
            'msg'=> "编辑失败,请重试"
        );
        if($bargain_id){
            $bargain_info = array();
            if(isset($_POST['user_number']) && !empty($_POST['user_number'])){
                foreach ($_POST['user_number'] as $keys=>$vals){
                    $bargain_info[$keys]['user_number'] = $vals;
                    $bargain_info[$keys]['depreciate_prices'] = $_POST['depreciate_prices'][$keys];
                    $bargain_info[$keys]['depreciate_odds'] = $_POST['depreciate_odds'][$keys];
                    $bargain_info[$keys]['price_low'] = $_POST['price_low'][$keys];
                    $bargain_info[$keys]['price_height'] = $_POST['price_height'][$keys];
                    $bargain_info[$keys]['prices_lows'] = $_POST['prices_lows'][$keys];
                    $bargain_info[$keys]['prices_heights'] = $_POST['prices_heights'][$keys];
                }
            }
            if($bargain_info){
                $bargain_info = serialize($bargain_info);
            }
            $bargain = array(
                'goods_nums'=>trim($_POST['goods_nums']),
                'goods_price'=>trim($_POST['goods_price']),
                'bargain_price'=>trim($_POST['bargain_price']),
                'bargain_info'=>$bargain_info,//砍价参数
                'bargain_again'=>trim($_POST['bargain_again']),
            );

            if($this->db->where("bargain_id = '{$bargain_id}'")->update('shop_p_bargain',$bargain)){
                $res['state']=true;$res['id']=$bargain_id;$res['msg']="编辑成功";
            }
        }
        echo json_encode($res);
        exit();
    }
    
    
    //微砍价--保存活动第三步
    public function micro_add_edit_three(){
        $bargain_id = isset($_GET['bargain_id']) && !empty($_GET['bargain_id'])? $_GET['bargain_id']:false;
        $res = array(
            'state'=>false,
            'id'=>$bargain_id ,
            'msg'=> "编辑失败,请重试"
        );
        if($bargain_id){
            $images_info['bargain_image_file'] = $_FILES['bargain_image'];
            $images_info['share_image_file'] = $_FILES['share_image'];
            $images_info['weixin_image_file'] = $_FILES['bargain_image_wx'];
            $savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
            $bargain_image = '';//活动图片
            $share_image = '';//活动图片
            $bargain_image_wx = '';//推文图片
            foreach ($images_info as $kes=>$val){
                if($val){
                    if( $val['size'] && $val['error']==0){
                        $tmp_file = $val['tmp_name'];
                        $file_types = explode ( ".", $val['name'] );
            
                        $file_type = $file_types [count ( $file_types ) - 1];
                        if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                            $return = array(
                             'state'=>false,
                             'msg'=>"不是图片文件，请重新上传"
                            );
                            echo json_encode($return);
                            exit(); 
                        }
                        $str = date ( 'Ymd' ) .$this->common_function->get_msectime()."_micro"; // 以时间来命名上传的文件
                        $file_name = $str . "." . $file_type; // 是否上传成功
                        if (! copy( $tmp_file, $savePath . $file_name )) {
                            $return = array(
                             'state'=>false,
                             'msg'=>"图片上传失败，请稍后重新上传"
                            );
                            echo json_encode($return);
                            exit(); 
                        }else{
                            if($kes=='bargain_image_file'){
                                $bargain_image = $file_name;
                            }elseif ($kes=='share_image_file'){
                                $share_image = $file_name;
                            }elseif($kes=='weixin_image_file'){
                                $bargain_image_wx = $file_name;
                            }
                        }
                    }
                }
            }
            
            $bargain_title = $this->db->select('bargain_title')->from('shop_p_bargain')->where('bargain_id',$bargain_id)->get()->row('bargain_title');
            $bargain = array(
                'bargain_key'=>trim($_POST['bargain_key']),
                'bargain_note'=>trim($_POST['bargain_note']),
                'bargain_image_wx'=>$bargain_image_wx,
                'bargain_image'=> $bargain_image,
                'share_title'=> $bargain_title,
                'share_content'=> trim($_POST['bargain_note']),
                'share_image'=> $bargain_image,
                'share_way'=>1
            );
            
            if($_POST['ous_tag']==2){
                $bargain['share_title'] = trim($_POST['share_title']);
                $bargain['share_content'] = trim($_POST['share_content']);
                $bargain['share_image'] = $share_image;
                $bargain['share_way'] =2;
            }
            if($this->db->where("bargain_id = '{$bargain_id}'")->update('shop_p_bargain',$bargain)){
                $res['state']=true;$res['id']=$bargain_id;$res['msg']="编辑成功";
            }

        }
        echo json_encode($res);
        exit();
    }

    
    
    //微砍价--重开活动第一步
    public function micro_again_edit_one(){
        $bargain_id = isset($_GET['bargain_id']) && !empty($_GET['bargain_id'])? $_GET['bargain_id']:false;
        $key = isset($_GET['key']) && !empty($_GET['key'])? $_GET['key']:false;
        //print_r($_GET);die;
        $key_words = '';
        if($key == 'edit'){
            $key_words = '编辑活动';
        }
        if($key == 'restart'){
            $key_words = '重开活动';
        }
        $res = array(
            'state'=>false,
            'id'=>$bargain_id ,
            'msg'=> $key_words."失败"
        );
        $savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
        $goods_images = '';//砍价轮播图
        //print_r($_FILES);die;
        //print_r($_GET);die;
        //print_r($_POST);die;
        if(isset($_FILES)){
            foreach ($_FILES as $kes=>$val){
                if($val){
                    if( $val['size'] && $val['error']==0){
                        $tmp_file = $val['tmp_name'];
                        $file_types = explode ( ".", $val['name'] );
            
                        $file_type = $file_types [count ( $file_types ) - 1];
                        if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                            $return = array(
                             'state'=>false,
                             'msg'=>'图片'.$kes."不是图片文件，请重新上传"
                            );
                            echo json_encode($return);
                            exit(); 
                        }
                        $str = date ( 'Ymd' ) .$this->common_function->get_msectime()."_micro"; // 以时间来命名上传的文件
                        $file_name = $str . "." . $file_type; // 是否上传成功
                        if (! copy( $tmp_file, $savePath . $file_name )) {
                            $return = array(
                             'state'=>false,
                             'msg'=>'图片'.$kes."图片上传失败，请稍后重新上传"
                            );
                            echo json_encode($return);
                            exit(); 
                        }else{
                           $goods_images[] = $file_name;
                        }
                    }
                }
            }
        }
        //用户未上传新的轮播图片
        if(!($_FILES['goods_images1']['size'] && $_FILES['goods_images1']['error']==0)){
            if($_POST['goods_image1'] == 'no'){
                $goods_images[] = 'no';
            }else{
                $file_types1 = explode ( ".", $_POST['goods_image1']);
                $file_type1 = $file_types1 [count ( $file_types1 ) - 1];
                $str1 = date ( 'Ymd' ) .$this->common_function->get_msectime()."_micro";
                $file_name1 = $str1 . "." . $file_type1;
                $tmp_file1 = $savePath.$_POST['goods_image1'];
                copy( $tmp_file1, $savePath . $file_name1 );
                $goods_images[] = $file_name1;
            }
            
        }
        if(!($_FILES['goods_images2']['size'] && $_FILES['goods_images2']['error']==0)){
            if($_POST['goods_image2'] == 'no'){
                $goods_images[] = 'no';
            }else{
                $file_types2 = explode ( ".", $_POST['goods_image2']);
                $file_type2 = $file_types2 [count ( $file_types2 ) - 1];
                $str2 = date ( 'Ymd' ) .$this->common_function->get_msectime()."_micro";
                $file_name2 = $str2 . "." . $file_type2;
                $tmp_file2 = $savePath.$_POST['goods_image2'];
                copy( $tmp_file2, $savePath . $file_name2 );
                $goods_images[] = $file_name2;
            }
        }
        if(!($_FILES['goods_images3']['size'] && $_FILES['goods_images3']['error']==0)){
            if($_POST['goods_image3'] == 'no'){
                $goods_images[] = 'no';
            }else{
                $file_types3 = explode ( ".", $_POST['goods_image3']);
                $file_type3 = $file_types3 [count ( $file_types3 ) - 1];
                $str3 = date ( 'Ymd' ) .$this->common_function->get_msectime()."_micro";
                $file_name3 = $str3 . "." . $file_type3;
                $tmp_file3 = $savePath.$_POST['goods_image3'];
                copy( $tmp_file3, $savePath . $file_name3 );
                $goods_images[] = $file_name3;
            } 
        }
        //print_r($goods_images);die;
        if($goods_images){
            $goods_images  = serialize($goods_images);
        }
        $bargain = array(
            'goods_id'=>trim($_POST['goods_id']),
            'store_id'=>trim($_POST['store_id']),
            'start_time'=>strtotime($_POST['start_time']),
            'end_time'=>strtotime($_POST['end_time']),
            'bargain_rule'=>trim($_POST['bargain_rule']),
            'bargain_title'=>trim($_POST['bargain_title']),
            'add_user'=>$_SESSION['shop_admin_id'],
            'add_time'=>time(),
        );
        if($key == 'edit'){
            $goods_image_info = $this->db->select('goods_image')->where('bargain_id',$bargain_id)->get('shop_p_bargain')->row('goods_image');
            if($goods_image_info){
                $goods_image_info = unserialize($goods_image_info);
            }
            if($goods_images && $goods_image_info){//删除之前的图片
                foreach ($goods_image_info as $ks=>$vs){
                    if($vs){
                        @unlink($savePath.$vs);
                    }
                }
                $bargain['goods_image'] = $goods_images;
            }
            
            if($this->db->where("bargain_id = '{$bargain_id}'")->update('shop_p_bargain',$bargain)){
                $res['state']=true;$res['id']=$bargain_id;$res['msg']=$key_words."成功";
            }
        }elseif($key == 'restart'){
            $bargain['goods_image'] = $goods_images;
            if($this->db->insert('shop_p_bargain',$bargain)){
                $bargain_id = $this->db->insert_id();
                $res['state']=true;$res['id']=$bargain_id;$res['msg']=$key_words."成功";
                
            }
        }
        //$res['state']=true;$res['id']=$bargain_id;$res['msg']=$key_words."成功";
        echo json_encode($res);
        exit();
    }
    
    
    //微砍价--重开活动第二步
    public function micro_again_edit_two(){
        $bargain_id = isset($_GET['bargain_id']) && !empty($_GET['bargain_id'])? $_GET['bargain_id']:false;
        //print_r($_GET);die;
        $res = array(
            'state'=>false,
            'id'=>$bargain_id ,
            'msg'=> "编辑失败,请重试"
        );
        if($bargain_id){
            $bargain_info = array();
            if(isset($_POST['user_number']) && !empty($_POST['user_number'])){
                foreach ($_POST['user_number'] as $keys=>$vals){
                    $bargain_info[$keys]['user_number'] = $vals;
                    $bargain_info[$keys]['depreciate_prices'] = $_POST['depreciate_prices'][$keys];
                    $bargain_info[$keys]['depreciate_odds'] = $_POST['depreciate_odds'][$keys];
                    $bargain_info[$keys]['price_low'] = $_POST['price_low'][$keys];
                    $bargain_info[$keys]['price_height'] = $_POST['price_height'][$keys];
                    $bargain_info[$keys]['prices_lows'] = $_POST['prices_lows'][$keys];
                    $bargain_info[$keys]['prices_heights'] = $_POST['prices_heights'][$keys];
                }
            }
            if($bargain_info){
                $bargain_info = serialize($bargain_info);
            }
            $bargain = array(
                'goods_nums'=>trim($_POST['goods_nums']),
                'goods_price'=>trim($_POST['goods_price']),
                'bargain_price'=>trim($_POST['bargain_price']),
                'bargain_info'=>$bargain_info,//砍价参数
                'bargain_again'=>trim($_POST['bargain_again']),
            );

            if($this->db->where("bargain_id = '{$bargain_id}'")->update('shop_p_bargain',$bargain)){
                $res['state']=true;$res['id']=$bargain_id;$res['msg']="编辑成功";
            }
        }
        //$res['state']=true;$res['id']=$bargain_id;$res['msg']="编辑成功";
        echo json_encode($res);
        exit();
    }
    
    
    //微砍价--重开活动第三步
    public function micro_again_edit_three(){
        $bargain_id = isset($_GET['bargain_id']) && !empty($_GET['bargain_id'])? $_GET['bargain_id']:false;
        $res = array(
            'state'=>false,
            'id'=>$bargain_id ,
            'msg'=> "编辑失败,请重试"
        );
        $savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
        if($bargain_id){
            $images_info['bargain_image_file'] = $_FILES['bargain_images'];
            $images_info['share_image_file'] = $_FILES['share_images'];
            $images_info['weixin_image_file'] = $_FILES['bargain_image_wx'];
            
            $bargain_image = '';//活动图片
            $share_image = '';//活动图片
            $bargain_image_wx = '';//推文图片
            foreach ($images_info as $kes=>$val){
                if($val){
                    if( $val['size'] && $val['error']==0){
                        $tmp_file = $val['tmp_name'];
                        $file_types = explode ( ".", $val['name'] );
            
                        $file_type = $file_types [count ( $file_types ) - 1];
                        if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                            $return = array(
                             'state'=>false,
                             'msg'=>"不是图片文件，请重新上传"
                            );
                            echo json_encode($return);
                            exit(); 
                        }
                        $str = date ( 'Ymd' ) .$this->common_function->get_msectime()."_micro"; // 以时间来命名上传的文件
                        $file_name = $str . "." . $file_type; // 是否上传成功
                        if (! copy( $tmp_file, $savePath . $file_name )) {
                            $return = array(
                             'state'=>false,
                             'msg'=>"图片上传失败，请稍后重新上传"
                            );
                            echo json_encode($return);
                            exit(); 
                        }else{
                            if($kes=='bargain_image_file'){
                                $bargain_image = $file_name;
                            }elseif ($kes=='share_image_file'){
                                $share_image = $file_name;
                            }elseif ($kes=='weixin_image_file'){
                                $bargain_image_wx = $file_name;
                            }
                        }
                    }
                }
            }

            //用户未上传新的活动图片
            if(!($_FILES['bargain_images']['size'] && $_FILES['bargain_images']['error'] == 0)){
                $bargain_image = $_POST['bargain_images_h'];
            }
            
            if(!($_FILES['share_images']['size'] && $_FILES['share_images']['error'] == 0)){
                $share_image = $_POST['share_images_h'];
            }
            
            if(!($_FILES['bargain_image_wx']['size'] && $_FILES['bargain_image_wx']['error'] == 0)){
                $bargain_image_wx = $_POST['bargain_images_h_wx'];
            }
            
            
            
            $bargain_title = $this->db->select('bargain_title')->from('shop_p_bargain')->where('bargain_id',$bargain_id)->get()->row('bargain_title');
            $bargain = array(
                'bargain_key'=>trim($_POST['bargain_key']),
                'bargain_note'=>trim($_POST['bargain_note']),
                'bargain_image_wx'=>$bargain_image_wx,
                'bargain_image'=> $bargain_image,
                'share_title'=> $bargain_title,
                'share_content'=> trim($_POST['bargain_note']),
                'share_image'=> $bargain_image,
                'share_way'=>1
            );
            
            if($_POST['ous_tag']==2){
                $bargain['share_title'] = trim($_POST['share_title']);
                $bargain['share_content'] = trim($_POST['share_content']);
                $bargain['share_image'] = $share_image;
                $bargain['share_way'] =2;
            }
            if($this->db->where("bargain_id = '{$bargain_id}'")->update('shop_p_bargain',$bargain)){
                $res['state']=true;$res['id']=$bargain_id;$res['msg']="编辑成功";
            }

        }
        echo json_encode($res);
        exit();
    }
   
    
    
    //ajax搜索商品
    public function goods_search(){
        //print_r($_POST);die;
        $result = array('state'=>false,'data'=>'','msg'=>'操作错误');
        $goods_pos = isset($_POST['goods_pos'])?trim($_POST['goods_pos']):0;
        $auth_store_id = isset($_POST['store'])?intval($_POST['store']):'';
        
        $search_goods_name = isset($_POST['search_goods_name'])?trim($_POST['search_goods_name']):'';//商品名
        $stocks_sn = isset($_POST['change_stocks_sn'])?trim($_POST['change_stocks_sn']):'';//货号
        $goods_spu = isset($_POST['change_goods_spu'])?trim($_POST['change_goods_spu']):'';//款号
        
        $page = !empty($_POST['page'])?trim($_POST['page']):1;
        $total_page = isset($_POST['total_page']) ? trim($_POST['total_page']) : '';
        $rp = 8;
        $start = $rp*($page-1);
        if($goods_pos){
            $goods_pos = $auth_store_id;
        }
        
        $this->db->from('store_stocks_amount  as sta')
        ->join('shop_goods g','g.goods_id=sta.goods_id','left');
/*         $this->db->from('shop_goods g')
        ->join('shop_goods_extend_attr ge','ge.goods_id=g.goods_id')
        ->join('shop_goods_class c','c.gc_id=g.gc_id','left')
        ->join('store_attr_brands b','b.brand_id=g.brand_id','left'); */
        if($stocks_sn){
            $this->db->where('sta.stocks_sn', $stocks_sn);
        }
        if($goods_spu){
            $this->db->where('g.goods_spu', $goods_spu);
        }
        if($search_goods_name){
            $this->db->like('g.goods_name', $search_goods_name);
        } 
       
        $this->db->where('sta.ssa_store_id', $auth_store_id);
        $this->db->where('g.goods_pos', $goods_pos);
        $this->db->where('g.goods_state',1);
        $this->db->where('sta.amount >0');
        $db = clone($this->db);
        $total_rows = $this->db->select('g.goods_id')->group_by('g.goods_id')->get()->result_array();
        $total = count($total_rows);
        $this->db = $db;
        $this->db->select('g.goods_marketprice,g.goods_price,g.goods_id,g.goods_pos,g.goods_name,g.goods_image,sta.stocks_price,g.goods_spu,sta.stocks_sn');
        $rows = $this->db->group_by('g.goods_id')->limit($rp,$start)->get()->result_array();
        //print_r($this->db->last_query());die;
        $total_page = ceil($total/$rp);
        //print_r($this->db->last_query());die;
        $goods_sku = array();
        $sexs = array(2 => '男', 1 => '女', 0 => '中性');
        $season = array(1 => 'Q1', 2 => 'Q2', 3 => 'Q3',4=>'Q4');
        foreach ($rows as $k=>$v){
            $v['goods_image'] = img_http($v['goods_image']);
            $rows[$k] = $v;
    
        }
        if(!empty($rows)){
            $result = array('state'=>true,'data'=>$rows,'msg'=>'','page'=>$page,'total_page'=>$total_page,'rp'=>$rp,'total'=>$total);
        }else{
            $result = array('state'=>false,'data'=>'','msg'=>'没有查到符合条件的数据！');
        }
        echo json_encode($result);die;
    
    }

    //ajax搜索店铺
    public function ajax_get_store_list(){
       $type = isset($_GET['type']) ?$_GET['type'] :false;
       $data = array("state"=>false,'msg'=>"店铺为空",'data'=>'');
       if($type){
           $store = $this->db->select('store_id,short_store_name,store_name')
           ->from('store')->where('ous_type',$type)->where('is_delete',0)->where('store_state',1)->get()->result_array();
           if($store){
              $data['state']=true;$data['msg']='成功';$data['data']=$store;
           }
       }
       echo json_encode($data);exit;
    }
    
    //微砍价--活动统计
    public function micro_detail(){
        $opId = isset($_GET['id'])?trim($_GET['id']):false;
        $rows = $this->common_function->get_rows('shop_p_bargain', "bargain_id=".$opId);
        $microInfo = $this->db->select('sb.bargain_id,sb.bargain_title,sb.goods_id,b.goods_name')->from('shop_p_bargain as sb')
        ->join('shop_goods as b','b.goods_id=sb.goods_id','left')
        ->where('sb.bargain_id',$opId)->get()->row_array();
        $this->smarty->assign('opId',$opId);
        //print_r($microInfo);die;
        $this->smarty->assign('microInfo',$microInfo);
        $this->smarty->display('micro_bargains.html');
    }

    //微砍价--活动详细列表
    public function get_micro_list() {
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $bargain_id = isset($_GET['bargain_id']) && !empty($_GET['bargain_id']) ? $_GET['bargain_id'] :false;
        $where = ' 1=1';
        $times = time();
    
        
        //姓名
        if(isset($_GET['name']) && !empty($_GET['name'])){
            $name = $_GET['name'];
            $where .=" and u.true_name like '%{$name}%' ";
        }
        //微信昵称
        if(isset($_GET['wx_name']) && !empty($_GET['wx_name'])){
            $wx_name = $_GET['wx_name'];
            $where .=" and u.wx_nickname like '%{$wx_name}%' ";
        }
        //手机号
        if(isset($_GET['tel']) && !empty($_GET['tel'])){
            $tel = $_GET['tel'];
            $where .=" and u.tel = {$tel} ";
        }
        //时间
        if(isset($_GET['start_date']) && !empty($_GET['start_date']) ){
            $start_date = strtotime($_GET['start_date']);
            $where .=" spbl.bargain_time >=".$start_date;
        }
        
        //时间
        if( isset($_GET['end_date']) && !empty($_GET['end_date'])){
            $end_date = strtotime($_GET['end_date']);
            $where .=" spbl.bargain_time <=". $end_date;
        }
    
        $where .= " and spbl.bargain_id = {$bargain_id} ";
        
        $this->db->select('spb.bargain_id,spb.goods_id,spb.store_id,spbl.bargain_num,spbl.user_id,u.user_name,u.wx_nickname,u.tel,u.province_id,u.city_id,u.area_id,spbl.log_id,spbl.bargain_time,spbl.goods_price')
        ->from('shop_p_bargain_log as spbl')
        ->join('shop_p_bargain as spb','spbl.bargain_id = spb.bargain_id','left')
        ->join('user as u','spbl.user_id = u.user_id','left')
        ->where($where);
        $db = clone($this->db);
        $data = $this->db->get()->result_array();
        $total = count($data);
        //var_dump($total);die;exit;
        $start  = ($page - 1) * $rp;
        $this->db = $db;
        $this->db->limit ($rp, $start);
        $data = $this->db->get()->result_array();
        //var_dump($data);die;exit;
        //print_r($data);die;
        //$data = array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($data as $val){
            //测试
            $this->db->from('shop_goods as g')
            ->join('store_stocks_amount  as sta','g.goods_id=sta.goods_id','left');
            $this->db->where('g.goods_id', $val['goods_id']);
            $this->db->where('sta.ssa_store_id', $val['store_id']);
            $goods_info = $this->db->select('g.goods_id,g.goods_name,g.goods_price,g.goods_marketprice,sta.stocks_price')->group_by('g.goods_id')->get()->row_array();
            
            
            
            
             //print_r($goods_info);die;
            $user_address = $this->user_model->get_areas_info($val['province_id'],$val['city_id'],$val['area_id']);
            //print_r($user_address);die;
            
            $wx_nickname = !empty($val['wx_nickname'])?$val['wx_nickname']:'';
            $tel = !empty($val['tel'])?$val['tel']:'';
            
            
            $xml .= "<row id='".$val['log_id']."'>";
            //$xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $val['log_id'].")'> <i class='fa fa-trash-o'></i>删除</a>]]></cell>";
            $xml .= "<cell><![CDATA[<span>".$val['user_name']."</span>]]></cell>";
            $xml .= "<cell><![CDATA[<span>".$wx_nickname."</span>]]></cell>";
            $xml .= "<cell><![CDATA[<span>".$tel."</span>]]></cell>";
            $xml .= "<cell><![CDATA[".$user_address."]]></cell>";
            //砍价时间
            //$xml .= "<cell><![CDATA[".$val['bargain_time']."]]></cell>";
    
            $time = date('Y-m-d', $val['bargain_time']);
            $xml .= "<cell><![CDATA[".$time."]]></cell>";
    
    
            $xml .= "<cell><![CDATA[".$goods_info['goods_name']."]]></cell>";
    
            //帮砍人数
            $xml .= "<cell><![CDATA[".$val['bargain_num']."]]></cell>";
            //$xml .= "<cell><![CDATA[".$val['fnum']."]]></cell>";
            
            $xml .= "<cell><![CDATA[".(sprintf("%.2f",($goods_info['stocks_price']-$val['goods_price'])))."]]></cell>"; 

            $xml .= "<cell><![CDATA[".$val['goods_price']."]]></cell></row>";
        }
        $xml .= "</rows>";
       
        echo $xml;
    }


    //微砍价--结束活动
    public function micro_over(){
        $bargain_id = isset($_GET['id']) && !empty($_GET['id'])? $_GET['id']:false;
        $res = array(
            'state'=>false,
            'msg'=> "操作失败,请重试"
        );
        if($bargain_id){
            $endYesterday=mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
            if($this->db->where("bargain_id = '{$bargain_id}'")->update('shop_p_bargain',array("end_time"=>$endYesterday))){
                $res['state']=true;$res['msg']="操作成功";
            }
        }
        echo json_encode($res);
        exit();
        
    }

    
    
    
    
   //会员购--活动中心
    public function member_shop(){
        $this->common_function->shop_admin_priv("CouponOfNewman");//权限
        $op = isset($_GET['op'])?trim($_GET['op']):1;
        $this->smarty->assign('op',$op);
        $this->smarty->display('micro_member_shop.html');
    }

    
    //会员购--get活动列表
    public function member_shop_list(){
        $op = isset($_GET['op'])?trim($_GET['op']):1;
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = '1=1';
        $times = time();
        if($op==1){
            $where = "start_time<=".$times ." and end_time>=".$times;
        }elseif($op==2){
            $where = "end_time<=".$times;
        }elseif($op==3){
            $where = "start_time>=".$times;
        }
        $where .= "  order by shop_id desc";
        $total = $this->common_function->total('shop_p_member_shop', $where);
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('shop_p_member_shop', $where);
         
         
         
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows as $kes=> $row){
            $store_name = $this->db->select('store_name')->from('store')->where('store_id',$row['store_id'])->get()->row('store_name');
            $admin_name = $this->db->select('admin_name')->from('admin')->where('admin_id',$row['add_user'])->get()->row('admin_name');
            $goods_total = $this->db->select('count(1) as num')->from('shop_p_member_shop_attr')->where("shop_id",$row['shop_id'])->get()->row('num');
            
            $flag_id = false;$flag_ids = false;
            if($row['start_time'] <=$times  && $row['end_time']>=$times){
                $flag = "进行中";$flag_id = true;
            }elseif($row['start_time'] >=$times){
                $flag = "未开始";$flag_ids = true;
            }else{
                $flag = "已结束";
            }
            $xml .= "<row id='".$row['shop_id']."'>";
            $xml .= "<cell><![CDATA[";
        	if($flag_ids){
                $xml .= "<a class='btn red' onclick='fg_edit(" . $row['shop_id'].")' <i class='fa fa-trash-o'></i>编辑活动</a>";
            }
            if($flag_id){
                $xml .= "<a class='btn red' onclick='fg_edit(" . $row['shop_id'].")' <i class='fa fa-trash-o'></i>编辑活动</a>";
                $xml .= "<a class='btn red' onclick='fg_over(" . $row['shop_id'].")' <i class='fa fa-trash-o'></i>结束活动</a>";
            }else{
            	$xml .= "<a class='btn red' onclick='fg_del(" . $row['shop_id'].")' <i class='fa fa-trash-o'></i>删除活动</a>";
            }
   
            $xml .="]]></cell>";
            $xml .= "<cell><![CDATA[".$row['shop_title']."]]></cell>";
            $xml .= "<cell><![CDATA[".$store_name."]]></cell>";
            $xml .= "<cell><![CDATA[".$goods_total."]]></cell>";
            $xml .= "<cell><![CDATA[".date("Y-m-d",$row['start_time'])."]]></cell>";
            $xml .= "<cell><![CDATA[".date("Y-m-d",$row['end_time'])."]]></cell>";
            $xml .= "<cell><![CDATA[".$flag."]]></cell>";
            $xml .= "<cell><![CDATA[".$admin_name."]]></cell>";
            $xml .= "<cell><![CDATA[".date("Y-m-d H:i:s",$row['add_time'])."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }
    
    
    //会员购--编辑活动
    public function member_shop_edit(){
        $shop_id = isset($_GET['id']) && !empty($_GET['id'])? $_GET['id']:false;
        $shop_Info = array();
        if($shop_id){
        	$shop_Info = $this->common_function->get_row('shop_p_member_shop', "shop_id=".$shop_id);
        	$Infos = $this->common_function->get_rows('shop_p_member_shop_attr', "shop_id=".$shop_id);
        	if($Infos){
        		foreach ($Infos as $key => $val){
        			$goodsInfo = $this->db->select('goods_marketprice,goods_name')->from('shop_goods')->where('goods_id',$val['goods_id'])->get()->row_array();
        			$Infos[$key]['goods_name'] =$goodsInfo['goods_name'];
        			$Infos[$key]['goods_marketprice'] =$goodsInfo['goods_marketprice'];
        		}
        	}
        	$shop_Info['goods_info'] = $Infos;
        	$shop_Info['store_name'] = $this->db->select('store_name')->from('store')->where('store_id',$shop_Info['store_id'])->get()->row('store_name');
        }
        $this->smarty->assign('shop_id',$shop_id);
        $this->smarty->assign('shop_Info',$shop_Info);
        $this->smarty->display('micro_member_shop_edit.html');
    }
    
    //会员购--保存活动
    public function member_shop_save(){
        $shop_id = isset($_GET['shop_id']) && !empty($_GET['shop_id'])? $_GET['shop_id']:false;
        $res = array(
            'state'=>false,
            'msg'=> "活动保存失败,请重试"
        );
        $shop_image_wx = '';//推文图片
       if( isset($_FILES['shop_image_wx'])  && $_FILES['shop_image_wx']['size'] && $_FILES['shop_image_wx']['error']==0){
            $savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
            $tmp_file = $_FILES['shop_image_wx']['tmp_name'];
            $file_types = explode ( ".", $_FILES['shop_image_wx']['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];
            if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                $return = array(
                    'state'=>false,
                    'msg'=>"不是图片文件，请重新上传"
                );
                echo json_encode($return);
                exit();
            }
            $str = date ( 'Ymd' ) .$this->common_function->get_msectime()."_member"; // 以时间来命名上传的文件
            $file_name = $str . "." . $file_type; // 是否上传成功
            if (! copy( $tmp_file, $savePath . $file_name )) {
                $return = array(
                    'state'=>false,
                    'msg'=>"图片上传失败，请稍后重新上传"
                );
                echo json_encode($return);
                exit();
            }else{
                $shop_image_wx = $file_name;
            }
       }
       if(!$shop_image_wx){
           $shop_image_wx = trim($_POST['shop_image_wx_h']);
       }
        
        $data['store_id'] = isset($_POST['store_id']) && !empty($_POST['store_id']) ? trim($_POST['store_id']):false;
        $data['shop_title'] = isset($_POST['shop_title']) && !empty($_POST['shop_title']) ? trim($_POST['shop_title']):false;
        $data['start_time'] = isset($_POST['start_time']) && !empty($_POST['start_time']) ? strtotime(trim($_POST['start_time'])):false;
        $data['end_time'] = isset($_POST['end_time']) && !empty($_POST['end_time']) ? strtotime(trim($_POST['end_time'])):false;
        $data['add_user'] = $_SESSION['shop_admin_id'];
        $data['shop_image_wx'] = $shop_image_wx;
        $data['shop_note'] = isset($_POST['shop_note']) && !empty($_POST['shop_note']) ? trim($_POST['shop_note']):false;
		$this->db->trans_begin(); //开启事物
        if($shop_id){
            $this->db->update('shop_p_member_shop', $data, array('shop_id'=>$shop_id));
		}else{
		    $data['add_time'] = time();
		    $this->db->insert('shop_p_member_shop',$data);
		    $shop_id = $this->db->insert_id();//
		}
        $attr= array(); $attr_sql = array();
        if(isset($_POST['shop_goods_id']) && !empty($_POST['shop_goods_id'])){
        	foreach ($_POST['shop_goods_id'] as $ks=>$vs){
        		$attr_sql['shop_id'] = $shop_id;
        		$attr_sql['goods_id'] = isset($vs) && !empty($vs) ? trim($vs):false;
        		$attr_sql['goods_marketprice'] = isset($_POST['shop_marketprice'][$ks]) ? trim($_POST['shop_marketprice'][$ks]):false;
        		$attr_sql['goods_discount'] = isset($_POST['shop_goods_discount'][$ks]) ? trim($_POST['shop_goods_discount'][$ks]):false;
        		$attr_sql['goods_price'] = isset($_POST['shop_stocks_price'][$ks])? trim($_POST['shop_stocks_price'][$ks]):false;
        		$attr_sql['goods_num'] = isset($_POST['shop_goods_nums'][$ks]) ? trim($_POST['shop_goods_nums'][$ks]):false;
        		$attr_sql['sell_nums'] = 0;
        		$attr[]= $attr_sql;
        	}
        }
        $this->db->insert_batch('shop_p_member_shop_attr',$attr);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();//事物回滚
        }else{
            $this->db->trans_commit();//事物提交
            $res['state'] =true; $res['msg'] ="活动保存成功";
        }
         echo json_encode($res);exit();
    
    }
    
    
    
    //会员购--结束活动
    public function member_shop_over(){
        $shop_id = isset($_GET['id']) && !empty($_GET['id'])? $_GET['id']:false;
        $res = array(
            'state'=>false,
            'msg'=> "操作失败,请重试"
        );
        if($shop_id){
            $endYesterday=mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
            if($this->db->where("shop_id = '{$shop_id}'")->update('shop_p_member_shop',array("end_time"=>$endYesterday))){
                $res['state']=true;$res['msg']="操作成功";
            }
        }
        echo json_encode($res);
        exit();
    }
    
    //会员购--删除活动
    public function member_shop_del(){
        $shop_id = isset($_GET['id']) && !empty($_GET['id'])? $_GET['id']:false;
        $res = array(
            'state'=>false,
            'msg'=> "删除失败,请重试"
        );
        if($shop_id){
        	 $this->db->trans_off(); //禁用事务
	         $this->db->trans_start(); //开启事务
	         $this->db->where('shop_id',$shop_id)->delete('shop_p_member_shop_attr');
	         $this->db->where('shop_id',$shop_id)->delete('shop_p_member_shop');
	         $this->db->trans_complete(); //事务完成
	         $this->db->trans_off(); //禁用事务
	         $res['state']=true;$res['msg']="删除成功";
        }
        echo json_encode($res);
        exit();
    }
    
    
    
   //会员购--分享设置
    public function member_shop_share(){
        $savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
        $membShop['membShop_share_title'] = $this->common_function->get_system_value('membShop_share_title');
        $membShop['membShop_share_content'] = $this->common_function->get_system_value('membShop_share_content');
        $membShop['membShop_share_url'] = $this->common_function->get_system_value('membShop_share_url');
        $defaultImg = $this->common_function->get_system_value('default_goods_image');
        $this->smarty->assign('defaultImg',$defaultImg);
        //print_r($membShop);die;
        $this->smarty->assign('membShop',$membShop);
        
        $this->smarty->display('micro_member_shop_share.html');
    }
    
    
    
   //会员购--分享保存
    public function member_shop_share_save(){
        $savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
        $key_words = '分享编辑';
        $res = array(
            'state'=>false,
            'msg'=> $key_words."失败"
        );
        
        $micros['membShop_share_title'] = isset($_POST['share_title']) && !empty($_POST['share_title'])?trim($_POST['share_title']):false;
        $micros['membShop_share_content'] = isset($_POST['share_content']) && !empty($_POST['share_content'])?trim($_POST['share_content']):false;
        $micros['membShop_share_url'] = isset($_POST['share_images']) && !empty($_POST['share_images'])?trim($_POST['share_images']):false;
	    if(isset($_FILES['share_img'])){
	          if( $_FILES['share_img']['size'] && $_FILES['share_img']['error']==0){
                            $tmp_file = $_FILES['share_img']['tmp_name'];
                            $file_types = explode ( ".", $_FILES['share_img']['name'] );
                            $file_type = $file_types [count ( $file_types ) - 1];
                            if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                                $return = array(
                                    'state'=>false,
                                    'msg'=>'图片'.$kes."不是图片文件，请重新上传"
                                );
                                echo json_encode($return);
                                exit(); 
                            }
                            $str = date ( 'Ymd' ) .$this->common_function->get_msectime()."_micro"; // 以时间来命名上传的文件
                            $file_name = $str . "." . $file_type; // 是否上传成功
                            if (! copy( $tmp_file, $savePath . $file_name )) {
                                $return = array(
                                    'state'=>false,
                                    'msg'=>'图片'.$kes."图片上传失败，请稍后重新上传"
                                );
                                echo json_encode($return);
                                exit(); 
                            }else{
                                $micros['membShop_share_url'] = $file_name;
                            }
               }
         }
         
            $this->db->trans_off(); //禁用事务
            $this->db->trans_start(); //开启事务
            $this->db->update('system_config', array('value'=>$micros['membShop_share_title']), array('code'=>'membShop_share_title'));
            $this->db->update('system_config', array('value'=>$micros['membShop_share_content']), array('code'=>'membShop_share_content'));
            $this->db->update('system_config', array('value'=>$micros['membShop_share_url']), array('code'=>'membShop_share_url'));
            $this->db->trans_complete(); //事务完成
            $this->db->trans_off(); //禁用事务
            $res['state'] =true;$res['msg'] =$key_words."成功";
            echo json_encode($res);exit(); 
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>