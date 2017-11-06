<?php
class Write_import extends CI_Controller{
    
public function excel_upload(){
        //$this->common_function->shop_admin_priv();//权限
        // EXCEL 文件上传
        if (empty ( $_FILES ['file_'] ['name'] )) {
            $return = array(
                'state'=>false,
                'msg'=>"请选择需要上传CSV文件！"
            );
            echo json_encode($return);
            exit();
        }
         
        $tmp_file = $_FILES ['file_'] ['tmp_name'];
        $file_types = explode ( ".", $_FILES ['file_'] ['name'] );
        $file_type = $file_types [count ( $file_types ) - 1];
        if (strtolower ( $file_type ) != "csv") {
            $return = array(
                'state'=>false,
                'msg'=>"不是CSV文件，重新稍后上传"
            );
            echo json_encode($return);
            exit();
        }
         
        $savePath = ROOTPATH . 'data/excel/'; // 设置上传路径
        $str = date ( 'YmdHis' ) . uniqid (); // 以时间来命名上传的文件
        $file_name = $str . "." . $file_type; // 是否上传成功
        if (! copy ( $tmp_file, $savePath . $file_name )) {
            $return = array(
                'state'=>false,
                'msg'=>"CSV上传失败，请稍后重新上传"
            );
            echo json_encode($return);
            exit();
        }
        
        echo json_encode(array('state'=>true,'name'=>$str));exit;
    }
}