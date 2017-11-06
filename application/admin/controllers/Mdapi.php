<?php

/**
 * Created by PhpStorm.
 * User: yhx
 * Date: 2017/6/9
 * Time: 22:38
 */
class Mdapi extends CI_Controller
{

    /**
     * app图片处理
     */
    public function img(){

        //file_put_contents('test.log', json_encode($_POST)."\r\n", true);
        $img=$_POST['img'];
        $files = substr($img, 22);
        $tag=$_POST['tag'];$id=$_POST['id'];
        $tmp = base64_decode($files);
        $b = (strpos($img, "/"));
        $c = (strpos($img, ";"));
        $file_type = substr($img, $b + 1, ($c - $b - 1));
        if (!in_array(strtolower($file_type), ['jpg','jpeg', 'png', 'gif'])) {
            echo json_encode(array('code'=>404,'msg'=>'未知格式'));exit;
        }else{
            if($tag==1){         //导购头像
                $name = 'head_portrait_'.$id;
                $fp = FCPATH.'/data/store_guide_headportrait/'.$name.".".$file_type;
            }elseif($tag==2){          //商品图片
                $name=$id. '_' . date("YmdHis") . rand(0, 9);
                $fp = FCPATH.'/data/shop/album_pic/'.$name.".".$file_type;
            }else{         //工单附件
                $name=$id. '_' . date("YmdHis") . rand(0, 9);
                $fp = FCPATH.'/data/app_feedback/'.$name.".".$file_type;
            }

            $res=file_put_contents($fp,$tmp);

            if($res){
                echo json_encode(array('code'=>200,'name'=>$name.".".$file_type,'msg'=>'上传成功'));exit;
            }else{
                echo json_encode(array('code'=>201,'msg'=>'上传失败'));exit;
            }
        }

    }

    /**
     * app盘点历史记录
     */
    public function pandian(){
        //file_put_contents('test.log', json_encode($_POST)."\r\n", true);

        $h=$_POST['history'];
        $history=json_decode($h,true);
        $store_id=$_POST['storeid'];
        $guide_id=$_POST['guideid'];
        $time=time();
        $date = date ( 'YmdHis',$time );
        $filename = $date.'pd'.'.csv';
        $dir = DOWNLOAD.$store_id;
        if(!file_exists($dir)){
            if(!file_exists(ROOTPATH.'data/pdlog')){
                if(@mkdir(ROOTPATH.'data/pdlog')&&@chmod(ROOTPATH.'data/pdlog',0777)){
                    @mkdir($dir);
                    @chmod($dir,0777);
                }
            }else{
                @mkdir($dir);
                @chmod($dir,0777);
            }
        }else{
            $log = $this->db->select('*')->from('store_inventory_log')->where('sil_store_id',$store_id)->order_by('create_time ASC')->get()->result_array();
            if(count($log)>=3){
                $delLog =  isset($log[0])?$log[0]:'';
                if(isset($delLog['sil_url'])&&!empty($delLog['sil_url'])){
                    $this->db->delete('store_inventory_log',array('sil_id'=>$delLog['sil_id']));
                    if(is_file($dir.'/'.$delLog['sil_url'])){
                        @unlink($dir.'/'.$delLog['sil_url']);
                    }
                }
            }
        }
        $file = DOWNLOAD.$store_id.'/'.$filename;
        $title = array(chr(0xef).chr(0xbb).chr(0xbf).'序号','商品ID','商品名称','货号','尺码','条码','数量','销售价','门店ID','商品颜色尺码ID');
        file_put_contents ($file,implode(',', $title).PHP_EOL,FILE_APPEND);
        foreach ($history as $k=>$v){
            $data = array(
                ($k+1),$v['goods_id'],$v['goods_name'],$v['stock_code'],$v['size'],
                $v['barcode'],$v['amount'],(empty($v['price'])?$v['stocks_price']:$v['price']),$store_id,$v['goods_ea_id']
            );
            file_put_contents ($file,implode(',',$data).PHP_EOL,FILE_APPEND);
        }
        $name=$this->db->select('spg_name')->where('spg_id',$guide_id)->get('store_shopping_guide')->row('spg_name');
        $logs = array('sil_store_id'=>$store_id,'sil_url'=>$filename,'create_time'=>$time,'create_user_id'=>$guide_id,'create_user_name'=>$name,);
        $this->db->insert('store_inventory_log',$logs);
        echo json_encode(array('code'=>200,'msg'=>''));exit;
    }


    /**
     * app盘点恢复
     */
    public function recovery()
    {
        $sli = $_POST['id'];
        if ($sli) {
            $row = $this->db->select('sil_url,sil_store_id')->where('sil_id', $sli)->get('store_inventory_log')->row_array();
            $url = DOWNLOAD .$row['sil_store_id'] . '/' . $row['sil_url'];
            if (!empty($url)) {
                // 读取EXCEL文件
                require_once ROOTPATH . 'libraries/PHPExcel/IOFactory.php';
                $objReader = PHPExcel_IOFactory::createReader('CSV');
                $objPHPExcel = $objReader->load($url);
                $sheet = $objPHPExcel->getSheet(0);
                $highestRowNum = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                $highestColumnNum = PHPExcel_Cell::columnIndexFromString($highestColumn);
                /*$filed = array();
                for ($i = 0; $i < $highestColumnNum; $i++) {
                    $cellName = PHPExcel_Cell::stringFromColumnIndex($i) . '1';
                    $cellVal = $sheet->getCell($cellName)->getValue();//取得列内容
                    $filed [] = $cellVal;
                }*/
                $filed=['id','goods_id','goods_name','sku','size','barCode','num','price','storeId','goods_ea_id'];
                $data = array();
                for ($i = 2; $i <= $highestRowNum; $i++) {//ignore row 1
                    $row = array();
                    for ($j = 0; $j < $highestColumnNum; $j++) {
                        $cellName = PHPExcel_Cell::stringFromColumnIndex($j) . $i;
                        $cellVal = $sheet->getCell($cellName)->getValue();
                        $row[$filed[$j]] = $cellVal;
                    }
                    $data [] = $row;
                }
                echo json_encode(array('code'=>200,'msg'=>json_encode($data)));exit;

            }else{
                echo json_encode(array('code'=>201,'msg'=>''));exit;
            }
        }else{
            echo json_encode(array('code'=>202,'msg'=>''));exit;
        }
    }

}