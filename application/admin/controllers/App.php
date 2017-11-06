<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
    }

    /*APP版本 管理*/
    public function app_version_manage(){
        $this->common_function->shop_admin_priv("app_version_manage");//权限
        $this->smarty->display ( 'app_version_manage.html' );
    }
    /*获取版本 管理*/
    public function get_app_version_manage(){
        $this->common_function->shop_admin_priv("app_version_manage");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $qtype = isset($_POST['qtype']) && !empty($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) && !empty($_POST['query']) ? trim($_POST['query']) : false;
        if($qtype && $query){
            if($qtype == 'id'){
                $this->db->like('id',$query);
            }else if($qtype == 'version_code'){
                $this->db->like('version_code',$query);
            }
        }
        $db = clone($this->db);
        $total = $this->db->count_all_results('app_version_upgrade');
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $this->db->select('id,app_id,version_code,apk_url,upgrade_point,status,create_time');
        $rows = $this->db->limit($rp,$start)->get('app_version_upgrade')->result_array();
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.$row['id'].'">';
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['id'] . ")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                <ul>
                    <li><a onclick=update_state(". $row['id'] .",'{$row['status']}')>".($row['status']==1 ? '禁用' : '启用')."</a></li>
                    <li><a onclick=fg_edit(".$row['id'] .")>编辑</a></li>
                </ul></span>]]></cell>";
            $xml .= '<cell><![CDATA['.$row['id'].']]></cell>';
            $xml .= '<cell><![CDATA['.($row['app_id']==1 ? '安卓手机' : ($row['app_id']==2 ? 'ios手机' :  'ipad' )).']]></cell>';
            $xml .= '<cell><![CDATA['.$row['version_code'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['apk_url'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['upgrade_point'].']]></cell>';
            $xml .= '<cell><![CDATA['.($row['status']==1 ? '是' : '否').']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['create_time']).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);
    }
    /*获取版本 管理*/
    public function app_version_edit($id = 0){
        $this->common_function->shop_admin_priv("app_version_manage");//权限
        $id = intval($id);
        if($id != 0){
            $this->db->select('id,app_id,version_mini,version_id,version_code,type,apk_url,upgrade_point,status');
            $this->db->where('id',$id);
            $row = $this->db->get('app_version_upgrade')->row_array();
            $this->smarty->assign('row',$row);
        }
        $this->smarty->display ( 'app_version_edit.html' );
    }
    /*获取版本 管理*/
    public function app_version_add_edit(){
        $this->common_function->shop_admin_priv("app_version");//权限
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        $data = $_POST;
        $time = time();
        $res = ['state'=>false];
        if($id){
            $data['update_time'] = $time;
            if($this->db->update('app_version_upgrade',$data,['id'=>$id])){
                $res = ['state'=>true];
            }else{
                $res = ['state'=>false];
            }
        }else{
            $data['create_time'] = $time;
            $data['update_time'] = $time;
            if($this->db->insert('app_version_upgrade',$data)){
                $res = ['state'=>true];
            }else{
                $res = ['state'=>false];
            }
        }
        die(json_encode($res));
    }
    
    public function update_state(){
        $this->common_function->shop_admin_priv("app_version_manage");//权限
        $id = isset($_POST['id']) ? intval($_POST['id']) : false;
        $state = isset($_POST['state']) ? intval($_POST['state']) : false;
        if($this->db->update('app_version_upgrade',['status'=>$state],['id'=>$id])){
            $res = ['state'=>true,'msg'=>'修改成功'];
        }else{
            $res = ['state'=>false,'msg'=>'修改失败'];
        }
        die(json_encode($res));
    }

    /*APP版本 删除*/
    public function app_version_delete(){
        $this->common_function->shop_admin_priv("app_version_manage");//权限
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $ids=explode(',',$id);
        if($ids){
            if($this->db->where_in('id',$ids)->delete('app_version_upgrade')){
                $res = ['state'=>true,'msg'=>'删除成功'];
            }else{
                $res = ['state'=>false,'msg'=>'删除失败'];
            }
        }

        die(json_encode($res));

    }

    /*APP反馈 管理*/
    public function app_version_feedback(){
        $this->common_function->shop_admin_priv("app_version_feedback");//权限
        $this->smarty->display ( 'app_version_feedback.html' );
    }
    /*获取APP反馈*/
    public function get_app_version_feedback(){
        $this->common_function->shop_admin_priv("app_version_feedback");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $qtype = isset($_POST['qtype']) && !empty($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) && !empty($_POST['query']) ? trim($_POST['query']) : false;
        if($qtype && $query){
            if($qtype == 'type'){
                $this->db->like('l.client_type',$query);
            }else if($qtype == 'version'){
                $this->db->like('l.app_version_id',$query);
            }
        }
        $this->db->select('l.id,l.error_log,l.create_time,l.user_id,l.is_read,l.read_time,l.client_type,l.app_version_id,l.admin_id,g.spg_nike_name')
            ->from('app_bug_log l')
            ->join('store_shopping_guide g','l.user_id=g.spg_id','left');
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows = $this->db->order_by('l.is_read ASC,l.create_time ASC')
            ->limit($rp,$start)->get()->result_array();
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.$row['id'].'">';
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['id'] . ")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                <ul>
                    <li><a onclick=fg_edit(".$row['id'] .")>查看</a></li>
                </ul></span>]]></cell>";
            $xml .= '<cell><![CDATA['.$row['id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['client_type'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['spg_nike_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['app_version_id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['error_log'].']]></cell>';
            $xml .= '<cell><![CDATA['.($row['is_read']==0 ? '未查看':'已查看').']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['create_time']).']]></cell>';
            $xml .= '<cell><![CDATA['.($row['read_time']=='' ? '--':date('Y-m-d H:i:s',$row['read_time'])).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);

    }

    /*APP用户 反馈查看*/
    public function app_feedback_edit($id){
        $this->common_function->shop_admin_priv("app_version_feedback");//权限
        $id = intval($id);$time=time();
        $this->db->select('id,client_type,app_version_id,error_log,create_time');
        $this->db->where('id',$id);
        $row = $this->db->get('app_bug_log')->row_array();
        $this->smarty->assign('row',$row);
        $this->db->set(['read_time'=>$time,'admin_id'=>$_SESSION['shop_admin_id'],'is_read'=>1])->where('id',$id)->update('app_bug_log');
        $this->smarty->display ( 'app_feedback_edit.html' );
    }


    /*APP用户 反馈批量标记查看*/
    public function app_feedback_look(){
        $this->common_function->shop_admin_priv("app_version_feedback");//权限
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $ids=explode(',',$id);
        $time=time();
        if($ids){
            if($this->db->set(['read_time'=>$time,'admin_id'=>$_SESSION['shop_admin_id'],'is_read'=>1])->where_in('id',$ids)->update('app_bug_log')){
                $res = ['state'=>true,'msg'=>'标记成功'];
            }else{
                $res = ['state'=>false,'msg'=>'标记失败'];
            }

        }
        die(json_encode($res));
    }


    /*APP用户反馈 删除*/
    public function app_feedback_delete(){
        $this->common_function->shop_admin_priv("app_version_feedback");//权限
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $ids=explode(',',$id);
        if($ids){
            if($this->db->where_in('id',$ids)->delete('app_bug_log')){
                $res = ['state'=>true,'msg'=>'删除成功'];
            }else{
                $res = ['state'=>false,'msg'=>'删除失败'];
            }
        }

        die(json_encode($res));

    }

    /*APP用户 管理*/
    public function app_user_manage(){
        $this->common_function->shop_admin_priv("App_user_manage");//权限

        $this->smarty->display ( 'app_user_manage.html' );
    }
    /*获取用户 管理*/
    public function get_app_user_manage(){
        $this->common_function->shop_admin_priv("App_user_manage");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $qtype = isset($_POST['qtype']) && !empty($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) && !empty($_POST['query']) ? trim($_POST['query']) : false;
        if($qtype && $query){
            if($qtype == 'name'){
                $this->db->like('c.name',$query);
            }else if($qtype == 'username'){
                $this->db->like('g.spg_nike_name',$query);
            }else{
                $this->db->like('g.spg_tel',$query);
            }
        }
        $this->db->select('c.id,c.name,c.is_encryption,c.app_version_id,c.create_time,c.update_time,c.did,c.cid,c.status,g.spg_nike_name,g.spg_tel')
            ->from('app_client c')
            ->join('store_shopping_guide g','c.user_id=g.spg_id')
            ->order_by('c.update_time DESC');
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows = $this->db->limit($rp,$start)->get()->result_array();
        /*var_dump($rows);die;*/
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        $time=time();
        $time_line = $this->config->config['api_time_line'];
        foreach ($rows as $row){
            $online=($row['update_time']+$time_line)<$time? '离线' : '在线';

            $xml .= '<row id="'.$row['id'].'">';
            $xml .= "<cell><![CDATA[<span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                <ul>
                    <li>
                    <a onclick=update_state(". $row['id'] .",'{$row['status']}')>".($row['status']==1 ? '禁用' : '启用')."</a>
                    </li>
                </ul></span>]]></cell>";
            $xml .= '<cell><![CDATA['.$row['id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['spg_nike_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['spg_tel'].']]></cell>';
            $xml .= '<cell><![CDATA['.$online.']]></cell>';
            $xml .= '<cell><![CDATA['.$row['cid'].']]></cell>';
            $xml .= '<cell><![CDATA['.($row['is_encryption']==1 ? '是' : '否').']]></cell>';
            $xml .= '<cell><![CDATA['.($row['status']==1 ? '正常' : '已删除').']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['create_time']).']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['update_time']).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);
    }

    /*APP用户状态修改*/
    public function user_update_state(){
        $this->common_function->shop_admin_priv("App_user_manage");//权限
        $id = isset($_POST['id']) ? intval($_POST['id']) : false;
        $state = isset($_POST['state']) ? intval($_POST['state']) : false;
        if($this->db->update('app_client',['status'=>$state],['id'=>$id])){
            $res = ['state'=>true,'msg'=>'修改成功'];
        }else{
            $res = ['state'=>false,'msg'=>'修改失败'];
        }
        die(json_encode($res));
    }

    /*APP消息管理*/
    public function app_user_msg_manage(){
        $this->common_function->shop_admin_priv("app_user_msg_manage");//权限
        $this->smarty->display ( 'app_user_msg_manage.html' );
    }
    /*获取APP消息管理*/
    public function get_app_user_msg_manage(){
        $this->common_function->shop_admin_priv("app_user_msg_manage");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $qtype = isset($_POST['qtype']) && !empty($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) && !empty($_POST['query']) ? trim($_POST['query']) : false;
        if($qtype && $query){
            if($qtype == 'title'){
                $this->db->like('m.title',$query);
            }else if($qtype == 'content'){
                $this->db->like('m.content',$query);
            }
        }
        $this->db->select('m.push_message_id,m.title,m.content,m.push_time,m.push_id,g.spg_nike_name')
            ->from('app_push_message m')
            ->join('store_shopping_guide g','g.spg_id=m.rec_id')
            ->order_by('m.push_time DESC');
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows = $this->db->limit($rp,$start)->get()->result_array();
        /*var_dump($rows);die;*/
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            if($row['push_id']==0){
                $push_name='系统消息';
            }else{
                $push_name=$this->db->select('admin_name')->where('admin_id',$row['push_id'])->get('admin')->row('admin_name');
            }

            $xml .= '<row id="'.$row['push_message_id'].'">';
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['push_message_id'] . ")' <i class='fa fa-trash-o'></i>删除</a>]]></cell>";
            $xml .= '<cell><![CDATA['.$row['push_message_id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['title'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['content'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['spg_nike_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$push_name.']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['push_time']).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);

}

    /*APP推送消息 删除*/
    public function app_msg_delete(){
        $this->common_function->shop_admin_priv("app_user_msg_manage");//权限
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $ids=explode(',',$id);
        if($ids){
            if($this->db->where_in('push_message_id',$ids)->delete('app_push_message')){
                $res = ['state'=>true,'msg'=>'删除成功'];
            }else{
                $res = ['state'=>false,'msg'=>'删除失败'];
            }
        }
        die(json_encode($res));
    }
    /*获取APP消息管理*/
    public function app_user_msg_push(){
        $this->common_function->shop_admin_priv("app_user_msg_manage");//权限
        $this->smarty->display ( 'app_user_msg_push.html' );
    }

    /*实时获取导购信息*/
    public function guide_name(){
        $this->common_function->shop_admin_priv("app_user_msg_manage");//权限
        $name = isset($_POST['name']) ? $_POST['name'] : false;
        if($name){
            $this->db->group_start();
            $this->db->like('spg_name',$name);
            $this->db->or_like('spg_tel',$name);
            $this->db->group_end();
            $result=$this->db->select('spg_id,spg_name,spg_tel')->limit(5)->get('store_shopping_guide')->result_array();
            if(empty($result)){
                $res = ['state'=>false,'result'=>$result];
            }else{
                $res = ['state'=>true,'result'=>$result];
            }
            die(json_encode($res));
        }
    }

    /*导购所属门店*/
    public function store_name(){
        $this->common_function->shop_admin_priv("app_user_msg_manage");//权限
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if($id){
            $result=$this->db->select('s.store_name,g.role_type')->from('store_shopping_guide g')
                ->join('store s','g.spg_store_id=s.store_id')
                ->where('spg_id',$id)
                ->get()->row_array();

            if(empty($result)){
                $res = ['state'=>false,'result'=>$result];
            }else{
                $res = ['state'=>true,'result'=>$result];
            }
            die(json_encode($res));
        }
    }


    /*APP推送消息*/
    public function message_management(){
        $this->common_function->shop_admin_priv("app_user_msg_manage");//权限
           $url="http://api.juketz.com/index.php/App/push_msg";
           //$url="http://192.168.3.8/mdapi/index.php/App/push_msg";
            $r=array('tag'=>'sysMsg','content'=>$_POST['note']);
           $data=array('title'=>"{$_POST['title']}",'content'=>"{$_POST['note']}",'payload'=>json_encode($r),'guideId'=>$_POST['spg_id'],'admin_id'=>$_SESSION['shop_admin_id']);
           $res=$this->common_function->https_request($url,$data);
           $result=object_array(json_decode($res,true));
           if($result['code']==200){
               $resu = ['state'=>true,'msg'=>'发送成功'];
           }else{
               $resu = ['state'=>false,'msg'=>'发送失败'];
           }
        die(json_encode($resu));
    }

    /*获取APP消息管理*/
    public function app_user_msg_push_group(){
        $this->common_function->shop_admin_priv("app_user_msg_manage");//权限
        $stroes=$this->db->select('store_id,store_name')->where('store_state',1)->get('store')->result_array();
        $this->smarty->assign('stores',$stroes);
        $this->smarty->display ( 'app_user_msg_push_group.html' );
    }

    /*APP消息群推(按门店)*/
    public function message_push_group(){
        $this->common_function->shop_admin_priv("app_user_msg_manage");//权限
        $guides=$this->db->select('spg_id')->where_in('spg_store_id',$_POST['store'])->get('store_shopping_guide')->result_array('spg_id');

        $url="http://api.juketz.com/index.php/App/push_group";
        //$url="http://192.168.3.8/mdapi/index.php/App/push_group";
        $r=array('tag'=>'sysMsg','content'=>$_POST['note']);
        $msg=array('title'=>$_POST['title'],'content'=>$_POST['note'],'payload'=>json_encode($r),'guideId'=>json_encode($guides),'admin_id'=>$_SESSION['shop_admin_id']);
        $res=$this->common_function->https_request($url,$msg);
        $result=object_array(json_decode($res,true));
        if($result['code']==200){
            $resu = ['state'=>true,'msg'=>'发送成功'];
        }else{
            $resu = ['state'=>false,'msg'=>'发送失败'];
        }
        die(json_encode($resu));
    }


    /*工单信息*/
    public function app_work_order(){
        $this->common_function->shop_admin_priv("app_work_order");//权限
        $this->smarty->display('app_work_order.html');

    }


    /*获取工单信息列表*/
    public function get_work_order(){
        $this->common_function->shop_admin_priv("app_work_order");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $qtype = isset($_POST['qtype']) && !empty($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) && !empty($_POST['query']) ? trim($_POST['query']) : false;
        if($qtype && $query){
            if($qtype == 'title'){
                $this->db->like('job_title',$query);
            }else if($qtype == 'guide'){
                $this->db->like('submit_name',$query);
            }
        }
        $this->db->select('*')
            ->from('job')
            ->order_by('urgency DESC,add_time ASC');
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows = $this->db->limit($rp,$start)->get()->result_array();
        /*var_dump($rows);die;*/
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.intval($row['job_id']).'">';
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . intval($row['job_id']) . ")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                <ul>
                    <li><a onclick=fg_edit(".intval($row['job_id']) .")>查看</a></li>
                </ul></span>]]></cell>";
            $xml .= '<cell><![CDATA['.intval($row['job_id']).']]></cell>';
            $xml .= '<cell><![CDATA['.($row['type']==1?'商品类':($row['type']==2?'订单类':($row['type']==3?'分享类':($row['type']==4?'入库类':'APP应用类')))).']]></cell>';
            $xml .= '<cell><![CDATA['.$row['job_title'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['job_content'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['submit_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['contact_tel'].']]></cell>';
            $xml .= '<cell><![CDATA['.($row['urgency']==1?'低':($row['urgency']==2?'普通':($row['urgency']==3?'高':($row['urgency']==4?'紧急':'立刻')))).']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['add_time']).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);

    }

    /*工单信息删除*/
    public function work_order_delete(){
        $this->common_function->shop_admin_priv("app_work_order");//权限
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $ids=explode(',',$id);
        $res = ['state'=>false,'msg'=>'删除失败'];
        if($ids){
            $rows=[];
            foreach ($ids as $k=>$v){
                $row=$this->db->select('pic_info')->where('job_id',$v)->get('job')->row_array();
                if(!empty($row['pic_info'])){
                    $pic=json_decode($row['pic_info'],true);
                    foreach ($pic as $vv){
                        $rows[]=$vv;
                    }
                }
            }
            if($this->db->where_in('job_id',$ids)->delete('job')){
                if(!empty($rows)){
                    foreach ($rows as $vvv){
                        @unlink(ROOTPATH.'data/app_feedback/'.$vvv);
                    }
                }
                $this->db->where_in('job_id',$ids)->delete('job_log');
                $res = ['state'=>true,'msg'=>'删除成功'];
            }else{
                $res = ['state'=>false,'msg'=>'删除失败'];
            }
        }
        die(json_encode($res));

    }


    /*查看工单*/
    public function work_order_look(){
		$this->smarty->display('work_order_look.html');
    }










}


?>