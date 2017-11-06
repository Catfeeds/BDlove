<?php
class Stores_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('store_model','store');
    }
    /**
     * 查询店铺所有自定义标签
    */
    public function get_all_catetages(){
        if(isset($_SESSION['shop_spg_store_id'])){
            $where = 'store_id = '.$_SESSION['shop_spg_store_id'] .' and parent_id=0 order by sort asc';
            $rows = $this->common_function->get_rows('store_catetags',$where);
            foreach ($rows as $k=>$v){
                $where = 'parent_id = '.$v['catetag_id'].' order by sort asc';
                $rows[$k]['add_time'] = date('Y-m-d',$v['add_time']);
                $rows[$k]['level2'] = $this->common_function->get_rows('store_catetags',$where);
                foreach ($rows[$k]['level2'] as $kk=>$vv){
                    $where = 'parent_id = '.$vv['catetag_id'].' order by sort asc';
                    $rows[$k]['level2'][$kk]['add_time'] = date('Y-m-d',$vv['add_time']);
                    $rows[$k]['level2'][$kk]['level3'] = $this->common_function->get_rows('store_catetags',$where);
                    foreach ($rows[$k]['level2'][$kk]['level3'] as $kkk=>$vvv){
                        $rows[$k]['level2'][$kk]['level3'][$kkk]['add_time'] = date('Y-m-d',$vvv['add_time']);
                    }
                }
            }
            return $rows;
        }else{
            //没有店铺ID
        }
    }
    /**
     * 更新自定义标签
    */
    public function update_catetag_name($catetag_id,$catetag_name,$parent_id){
        //更新之前判断此分类下有无该名称菜单
        $where = "parent_id = $parent_id && catetag_name = '$catetag_name'";
        $old_cateage_name = $this->common_function->get_one('store_catetags', $where,'catetag_name');
        $row = $this->common_function->get_row('store_catetags',$where);
        if($row){
            return [
                'code' => 2,    //该分类下已有此名称
                'old_catetag_name' => $old_cateage_name
            ];
        }
        $data = [
            'catetag_name' => $catetag_name,
        ];
        $this->db->where('catetag_id', $catetag_id);
        $this->db->update('store_catetags', $data);
        return [
            'code' => $this->db->affected_rows(),
        ];
    }
    /**
     * 添加自定义菜单
    */
    public function add_catetag_name($catetag_name,$parent_id){
        //判断此分类下有无该名称菜单
        $where = "parent_id = $parent_id && catetag_name = '$catetag_name'";
        $row = $this->common_function->get_row('store_catetags',$where);
        if($row){
            return ['catetag_id'=>0];
        }
        if($parent_id == 0) {
            $sort = $this->common_function->get_max_sort('store_catetags');
            $int = $sort + 1;
        }
        elseif($parent_id != 0){
            $lastsort =  $this->common_function->get_parent_max_sort('store_catetags',$parent_id);
            $int = $lastsort + 1;
        }
        $data = [
            'parent_id'    => $parent_id,
            'catetag_name' => $catetag_name,
            'sort'         => $int,
            'add_time'     => time(),
            'store_id'     =>$_SESSION['shop_spg_store_id'],
        ];
        $this->db->insert('store_catetags',$data);
        $where = 'catetag_id = '.$this->db->insert_id();
        $rows = $this->common_function->get_row('store_catetags',$where);
        $rows['add_time'] = date('Y-m-d',$rows['add_time']);
        return $rows;
    }
    /**
     * 更改菜单顺序
    */
    public function change_menu_order($current_id,$change_id){
        $where1 = 'catetag_id = '.$current_id;
        $where2 = 'catetag_id = '.$change_id;
        $current_sort = $this->common_function->get_one('store_catetags', $where1,'sort');
        $change_sort = $this->common_function->get_one('store_catetags',$where2,'sort');
        //开启事务操作
        $this->db->trans_begin();
        $this->db->where('catetag_id',$current_id);
        $this->db->update('store_catetags',['sort'=>$change_sort]);
        $this->db->where('catetag_id',$change_id);
        $this->db->update('store_catetags',['sort'=>$current_sort]);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;//操作失败
        } else {
            $this->db->trans_commit();
            return 1;//操作成功
        }
    }
    /**
     * 删除菜单(有子菜单不允许删除)
    */
    public function delete_catetag_name($catetag_id)
    {
        $where = 'parent_id = '.$catetag_id;
        $row = $this->common_function->get_row('store_catetags',$where);
        if($row){
            return 2;//该分类下有子菜单不允许删除
        }
        $where = 'catetag_id = ' . $catetag_id;
        $this->db->delete('store_catetags', $where);
        return $this->db->affected_rows();
    }
}