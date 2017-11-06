<?php
class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library ('common_function' );
        $this->load->language('common');
    }
    
    
    /**
     *
     * 获取地区信息：省市区；
     *根据父级ID获取下级地区信息
     * @param $parent_id 父级ID
     * @param $area_deep 深度
     */
    public function get_area_info($parent_id=0) {
        $area =array();
        $provs_data = "[";
        $where1 = "area_parent_id=".$parent_id;
        $this->db->select('area_id,area_name');
        $this->db->from('area');
        $this->db->where($where1);
        $this->db->order_by('area_id','ASC');
        $provs = $this->db->get()->result_array();
        foreach ($provs as $key=>$val){
            $provs_data.='{"text":"'.$val['area_name'].'","value":"'.$val['area_id'].'"},';
            $where2 = "area_parent_id=".$val['area_id'];
            $this->db->select('area_id,area_name');
            $this->db->from('area');
            $this->db->where($where2);
            $this->db->order_by('area_id','ASC');
            $city[$val['area_id']] = $this->db->get()->result_array();
            
        }
        $provs_data = substr($provs_data,0,strripos($provs_data,","));
        $provs_data.="]";
        //print_r($provs_data);die;
        $citys_data="{";
        if(isset($city) && !empty($city)){
            foreach ($city as $key=>$val){
                if(!empty($city[$key])){
                    $citys_data.="{$key}".":[";
                    foreach ($val as $keys=>$vals){
                        $citys_data.='{"text":"'.$vals['area_name'].'","value":"'.$vals['area_id'].'"},';
                        $where3 = "area_parent_id=".$vals['area_id'];
                        $this->db->select('area_id,area_name');
                        $this->db->from('area');
                        $this->db->where($where3);
                        $this->db->order_by('area_id','ASC');
                        $dists[$vals['area_id']] = $this->db->get()->result_array();
                        
                    }
                    $citys_data = substr($citys_data,0,strripos($citys_data,","));
                    $citys_data.="],";
                }    
            }
        }
        $citys_data = substr($citys_data,0,strripos($citys_data,","));
        $citys_data.="}";
        //print_r($citys_data);die;
        $dists_data="{";
        if(isset($dists) && !empty($dists)){
            foreach ($dists as $key=>$val){
                if(!empty($dists[$key])){
                    $dists_data.="{$key}:[";
                    foreach ($val as $ke=>$va){
                        $dists_data.='{"text":"'.$va['area_name'].'","value":"'.$va['area_id'].'"},';
                    }
                    $dists_data = substr($dists_data,0,strripos($dists_data,","));
                    $dists_data.="],";
                }
            }
        }
        $dists_data = substr($dists_data,0,strripos($dists_data,","));
        $dists_data.="}";
        //print_r($dists_data);die;
        $area =array("provs_data"=>$provs_data,"citys_data"=>$citys_data,"dists_data"=>$dists_data);
        return $area ;
    }
    
    //openid 查询会员积分等级
    public  function get_openid_info($user_id){
        if(empty($user_id)){
            return false;
        }
        $this->db->select('t.user_id,t.tel,t.head_portrait,t.wx_openid,t.wx_nickname,t.ecshopping_guide_id,t.ecstore_id,s.store_id,s.store_name,s.area_id,a.area_id,a.area_name')
        ->from('user as t')
        ->join('store s','s.store_id=t.ecstore_id','left')
        ->join('area a','s.area_id =a.area_id','left')
        ->where("t.user_id",$user_id);
        $info= $this->db->get()->row_array();
        if(empty($info)){
            return false;
        }
        
        $this->db->select('uig_id,user_id,integral_num');
        $this->db->from('user_integral');
        $this->db->where("user_id",$info['user_id']);
        $this->db->order_by('uig_id','ASC');
        $integral= $this->db->get()->result_array();
        if(count($integral)>=2){
            $integration = 0;
            foreach ($integral as $key=>$val){
                $integration+=$val['integral_num'];
            }
        }elseif (count($integral)==1){
            $integration = $integral['integral_num'];
        }else{
            $integration = 0;
        }
        $info['integral_num'] = $integration;
        $this->db->select('mld_id,mld_name,mld_exp');
        $this->db->from('user_mldefault');
        $this->db->order_by('mld_id','ASC');
        $mldefault= $this->db->get()->result_array();
        if(count($mldefault)>=2){
             foreach ($mldefault as $key=>$val){
                 if($key<(count($mldefault)-2)){
                     $num1 = $mldefault[$key]['mld_exp'];
                     $num2 = $mldefault[$key+1]['mld_exp'];
                     if($integration<$num2){
                         $info['mld_name'] = $mldefault[$key]['mld_name'];
                         return $info;
                     }
                 }else{
                     $info['mld_name'] = $mldefault[$key]['mld_name'];
                     return $info;
                 }
             }
        }elseif (count($integral)<=1){
            $info['mld_name'] = "初级粉丝";
            return $info;
        }
    }
    
    
    /**
     *
     * 根据id获取省市区名称；
     * @return  string      四川省,成都市,金牛区
     */
    public function get_area_infos($province_id,$city_id,$area_id) {
        
        $where = "area_id in ($province_id,$city_id,$area_id) ";
        $this->db->select('area_id,area_name');
        $this->db->from('area');
        $this->db->where($where);
        $this->db->order_by('area_id','ASC');
        $info= $this->db->get()->result_array();
        $info[0] = isset($info[0]['area_name'])?$info[0]['area_name']:' ';
        $info[1] = isset($info[1]['area_name'])?$info[1]['area_name']:' ';
        $info[2] = isset($info[2]['area_name'])?$info[2]['area_name']:' ';
        return $info[0].",". $info[1].",". $info[2];
    }
    
    public function get_areas_info($province_id,$city_id,$area_id) {
        $province = $city = $area ='';
        if($province_id){
            $province = $this->db->select('area_name')->where('area_id',$province_id)->get('area')->row('area_name');
        }
        
        if($city_id){
            $city = $this->db->select('area_name')->where('area_id',$city_id)->get('area')->row('area_name');
        }
        
        if($area_id){
            $area = $this->db->select('area_name')->where('area_id',$area_id)->get('area')->row('area_name');
        }
        
        return $province.$city.$area;
    }
    
    
    /**
     * 获取用户信息
     * @param  int $user_id   用户id
     * @param  char $field   查询字段
     */
    public function getUserInfo($user_id, $field = ''){
        if(isset($user_id)===FALSE){
            return FALSE;
        }
        if($field){
            $this->db->select($field)
            ->from('user')
            ->where('user_id', $user_id);
            $result = $this->db->get()->row_array();
        }else{
            $this->db->select('*')
            ->from('user')
            ->where('user_id', $user_id);
            $result = $this->db->get()->row_array();
        }
        if($result){
            return $result;
        }else{
            return FALSE;
        }
    }
    
    /**
     * 获取用户信息和地址信息
     * @param  int $user_id   用户id
     */
    public function getUserAddrInfo($user_id){
        if(isset($user_id)===FALSE){
            return FALSE;
        }
        $this->db->select('sb.user_id,sb.user_name,sb.is_status,st.is_default,st.province_id,st.city_id,st.area_id,st.address,st.tel,st.tel_2');
        $this->db->from('user as sb');
        $this->db->join('user_address as st',"st.user_id = sb.user_id",'left');
        $this->db->where('sb.user_id',$user_id);
        $this->db->where('sb.is_status','1');
        $result = $this->db->get()->row_array();
        if($result){
            return $result;
        }else{
            return FALSE;
        }
    }
    
    
    

    
}