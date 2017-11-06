<?php
class Store_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    /**
     * 获取导购信息
     * @param  int $flag   1按spg_store_id(门店id) 查询 ， 2 按spg_id(导购id)查询
     * @param  int $id   查询id
     * @param  char $field   查询字段
     */
    public function getGuideInfo($flag=1,$id){
        if(isset($id)===FALSE){
            return FALSE;
        }
        if($flag==1){
            $this->db->select("spg_id, spg_store_id,spg_nike_name, spg_name, role_type, spg_ewm, head_portrait, spg_sex")
            ->from('store_shopping_guide')
            ->where("spg_store_id", $id);
            $result = $this->db->get()->result_array();
        }elseif($flag==2){
            $this->db->select('st.spg_id,st.spg_tel, st.spg_store_id,st.spg_nike_name, st.spg_name, st.role_type, st.spg_ewm, st.head_portrait, st.spg_sex,br.store_id,br.store_name,br.area_id,ar.area_id,ar.area_name')
            ->from('store_shopping_guide as st')
            ->join('store as br','st.spg_store_id = br.store_id','left')
            ->join('area as ar','br.area_id = ar.area_id','left')
            ->where("st.spg_id", $id);
            $result = $this->db->get()->row_array();
        }
        
        return $result;
    }
    
    
    /**
     * 查询聊天记录
     * @param  int $userid   用户id
     * @param  int $spgid   导购id
     * @param  int $page   当前页
     * @param  int $rp   每页显示记录数
     * @return array    
     */
    public function getChatlog($userid,$spgid,$page=1,$rp=10){
        $this->db->select("ucl_id,spg_id,user_id,send_time,send_content,source")
        ->from('user_chat_log')
        ->where("user_id", $userid)
        ->where("spg_id", $spgid)
        ->order_by('send_time',"DESC");
        $result = $this->db->get()->result_array();
        $rows = array_slice($result,($page-1)*$rp,$rp);
        $rows = array_reverse($rows);
        if($rows){
            foreach ($rows as $key=>$val){
                   $rows[$key]["send_times"] = date("m/d H:i:s",$val['send_time']);
            }
        }
    
        return $rows;
    }
    
    /**
     * 查询聊天历史
     * @param  int $userid   用户id
     * @param  int $spgid   导购id
     * @return array
     */
    public function userChatlog($userid){
        $this->db->select("a.ucl_id,a.spg_id,a.user_id,a.send_time,a.send_content,a.source,b.spg_id, b.spg_store_id,b.spg_nike_name, b.spg_name, b.role_type, b.spg_ewm, b.head_portrait, b.spg_sex,sg.store_id,sg.store_name,sg.ous_logo")
        ->from('user_chat_log as a')
        ->join('store_shopping_guide as b','a.spg_id = b.spg_id')
        ->join('store as sg','sg.store_id=b.spg_store_id')
        ->where("a.user_id", $userid)
        ->group_by("a.spg_id")
        ->order_by('a.send_time',"DESC");
        $result = $this->db->get()->result_array();
        return $result;
    }
    
    
    
    //获取两点之间距离
    /**
     * @param Decimal $longitude 用户所在位置经度
     * @param Decimal $latitude 用户所在位置纬度
     * @param Decimal $long 门店所在位置经度
     * @param Decimal $lat 门店所在位置纬度
     * @return Decimal    km
     */
    public function getlocation($longitude,$latitude,$long,$lat){
        $EARTH_RADIUS = 6370.996; // 地球半径系数
        $PI = 3.1415926;
        
        $radLng1 = $longitude * $PI / 180.0;
        $radLng2 = $long * $PI /180.0;
        
        $radLat1 = $latitude * $PI / 180.0;
        $radLat2 = $lat * $PI / 180.0;
        
        $a = $radLat1 - $radLat2;
        $b = $radLng1 - $radLng2;
        
        $distance = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1) * cos($radLat2) * pow(sin($b/2),2)));
        $distance = $distance * $EARTH_RADIUS * 1000;
        $distance =   round($distance /1000,2);  //km
        return $distance;
    }
        
    /**
     * @param Decimal $longitude 用户所在位置经度
     * @param Decimal $latitude 用户所在位置纬度
     * @return Decimal
     */
    public function getDistance($user_id,$longitude, $latitude){
        $history_store = array();
        $nearby_store = array();
        $ecstore_id = isset($_SESSION['ecstore_id']) ?$_SESSION['ecstore_id']:"";
        //print_r($ecstore_id);die;
        //var_dump($ecstore_id);die;
        //访问过的门店
        $this->db->select('sf.adv_id,sf.user_id,sf.store_id,sf.adv_time,sg.is_wx_store,sg.is_wx_store_type,sg.store_id,sg.store_name,sg.ous_longitude,sg.ous_latitude,sg.ous_logo,sg.province_id,sg.city_id,sg.area_id,sg.ous_address,sg.store_state,sg.agp_id,sg.ous_type');
        $this->db->from('user_adv_store as sf');
        $this->db->join('store as sg','sg.store_id=sf.store_id');
        $this->db->where('sf.user_id',$user_id);
        $this->db->where('sg.store_state','1');
        $this->db->where("sg.ous_type !='3'");
        $this->db->where('sg.is_delete','0');
        $this->db->order_by('sf.adv_time',"ASC");
        $result = $this->db->get()->result_array();
        //print_r($ecstore_id);die;
        if(!empty($result)){
            $history_store= $result;
        }else{
            //print_r($ecstore_id);die;
            if($ecstore_id){
                $this->db->select('is_wx_store,is_wx_store_type,store_id,store_name,ous_longitude,ous_latitude,ous_logo,province_id,city_id,area_id,ous_address,store_state,ous_type');
                $this->db->from('store');
                $this->db->where('store_id',$ecstore_id);
                $this->db->where('store_state','1');
                $this->db->where("ous_type!='3'");
                $this->db->where('is_delete','0');
                $history_store = $this->db->get()->result_array();
                //print_r($history_store);die;
            }else{
                $history_store = "";
            }
        }
        //print_r($history_store);die;
        
        $history = array();
        if(!empty($history_store)){
            foreach ($history_store as $key =>$val){
                $history_store[$key]['distance'] = $this->getlocation($longitude, $latitude,$val['ous_longitude'],$val['ous_latitude']);
                $history_store[$key]['province_name'] = $this->db->select('area_name')->where('area_id',$val['province_id'])->get('area')->row('area_name');
                $history_store[$key]['city_name'] = $this->db->select('area_name')->where('area_id',$val['city_id'])->get('area')->row('area_name');
                $history_store[$key]['area_name'] = $this->db->select('area_name')->where('area_id',$val['area_id'])->get('area')->row('area_name');
                $history[$val['store_id']] = $val['store_id'];
            }
        }
        //print_r($history);die;
        ////附近的门店
        
        //是否绑定导购
        $this->db->select('user_id,ecshopping_guide_id');
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $guide = $this->db->get()->row_array();
        //print_r($guide);die;
        $whres = "1 = '1'";
        if($guide['ecshopping_guide_id']){
            //已绑定导购
             /*if(!empty($history_store)){
                //已浏览
                $num  = count($history_store);
                $info = $history_store[$num-1];
                $agp_id = $info['agp_id'];
                $whres .= " and agp_id ='{$agp_id}'  and ous_type != '3' ";
            }else{
                //未浏览
                $this->db->select('store_id,store_name,ous_longitude,ous_latitude,ous_logo,province_id,city_id,area_id,ous_address,agp_id,ous_type');
                $this->db->from('store');
                $this->db->where('store_state','1');
                $this->db->where('ous_type','1');
                $this->db->where('is_delete','0');
                $store = $this->db->get()->result_array();
                $arr=array();
                foreach ($store as $key =>$val){
                    $distance =   $this->getlocation($longitude,$latitude,$val['ous_longitude'],$val['ous_latitude']);  //km
                    $store[$key]['distance'] = $distance;
                    $arr[$key] = $distance."-".$val['store_id']."-".$val['agp_id'];
                }
                ksort($arr);
                $arr = $arr[0];
                $arr = explode("-",$arr);
                $agp_id = $arr[2];
                $whres .= " and agp_id ='{$agp_id}' ";
            } */
            
            $this->db->select('is_wx_store,is_wx_store_type,store_id,store_name,ous_longitude,ous_latitude,ous_logo,province_id,city_id,area_id,ous_address,store_state,agp_id,ous_type');
            $this->db->from('store');
            $this->db->where('store_state','1');
            $this->db->where("ous_type != '3'");
            $this->db->where('is_delete','0');
            $this->db->where($whres);
            $this->db->order_by('store_id',"ASC");
            $result = $this->db->get()->result_array();
            //print_r($result);die;
            
            $nearby_store = $result;
            $store_region_state = $this->common_function->get_system_value('store_region_state');//区域门店隔离
            $store_region_radius  = $this->common_function->get_system_value('store_region_radius');//门店隔离半径
            $num ="";//km
            if($store_region_state){
                $num = $store_region_radius;
            }
            
            if($nearby_store){
                foreach ($nearby_store as $key =>$val){
                    /* if(!empty($history)){
                        if(array_key_exists($nearby_store[$key]['store_id'], $history)){
                            unset($nearby_store[$key]);
                            continue;
                        }
                    } */
                    $distance = $this->getlocation($longitude,$latitude,$val['ous_longitude'],$val['ous_latitude']);  //km
                    $nearby_store[$key]['distance'] = $distance;
                    if(!empty($num)){
                        if($distance<=$num){
                            $nearby_store[$key]['distance'] = $distance;
                            $nearby_store[$key]['province_name'] = $this->db->select('area_name')->where('area_id',$val['province_id'])->get('area')->row('area_name');
                            $nearby_store[$key]['city_name'] = $this->db->select('area_name')->where('area_id',$val['city_id'])->get('area')->row('area_name');
                            $nearby_store[$key]['area_name'] = $this->db->select('area_name')->where('area_id',$val['area_id'])->get('area')->row('area_name');
                        }else{
                            unset($nearby_store[$key]);
                            continue;
                        }
                    }else{
                        $nearby_store[$key]['distance'] = $distance;
                        $nearby_store[$key]['province_name'] = $this->db->select('area_name')->where('area_id',$val['province_id'])->get('area')->row('area_name');
                        $nearby_store[$key]['city_name'] = $this->db->select('area_name')->where('area_id',$val['city_id'])->get('area')->row('area_name');
                        $nearby_store[$key]['area_name'] = $this->db->select('area_name')->where('area_id',$val['area_id'])->get('area')->row('area_name');
                    }
                }
            }
            
        }else{
            //未绑定导购
            /* if(!empty($history_store)){
                //已浏览
                $num  = count($history_store);
                $info = $history_store[0];
                $agp_id = $info['agp_id'];
                $whres .= " and agp_id ='{$agp_id}'  and ous_type != '3' ";
            }else{
                //未浏览
                $this->db->select('store_id,store_name,ous_longitude,ous_latitude,ous_logo,province_id,city_id,area_id,ous_address,agp_id,ous_type');
                $this->db->where('store_state','1');
                //$this->db->where('ous_type =1 or ous_type =4');
                $this->db->from('store');
                $store = $this->db->get()->result_array();
                //print_r($store);die;
                $arr=array();
                foreach ($store as $key =>$val){
                    $distance =   $this->getlocation($longitude,$latitude,$val['ous_longitude'],$val['ous_latitude']);  //km
                    $store[$key]['distance'] = $distance;
                    $arr[$key] = $distance."-".$val['store_id']."-".$val['agp_id'];
                }
                ksort($arr);
                $arr = $arr[0];
                $arr = explode("-",$arr);
                $agp_id = $arr[2];
                $whres .= " and agp_id ='{$agp_id}'";
            } */
            
            $this->db->select('is_wx_store,is_wx_store_type,store_id,store_name,ous_longitude,ous_latitude,ous_logo,province_id,city_id,area_id,ous_address,store_state,agp_id,ous_type');
            $this->db->from('store');
            $this->db->where('store_state','1');
            $this->db->where("ous_type != '3'");
            $this->db->where($whres);
            $this->db->where('is_delete','0');
            $this->db->order_by('store_id',"ASC");
            $result = $this->db->get()->result_array();
            
            $nearby_store = $result;
//             $store_region_state = $this->common_function->get_system_value('store_region_state');//区域门店隔离
//             $store_region_radius  = $this->common_function->get_system_value('store_region_radius');//门店隔离半径
             $num ="";//km
            //print_r($store_region_state);die;0
            //print_r($store_region_radius);die;1000
            //$store_region_state = 1;
 /*            if($store_region_state){
                $num = $store_region_radius;
            } */
            //print_r($num);die;0
            if($nearby_store){
                foreach ($nearby_store as $key =>$val){
                    /* if(!empty($history)){
                        if(array_key_exists($nearby_store[$key]['store_id'], $history)){
                            unset($nearby_store[$key]);
                            continue;
                        }
                    } */
                    $distance = $this->getlocation($longitude,$latitude,$val['ous_longitude'],$val['ous_latitude']);  //km
                    //print_r($distance);die;
                    $nearby_store[$key]['distance'] = $distance;
                    if(!empty($num)){
                        if($distance<=$num){
                            $nearby_store[$key]['distance'] = $distance;
                            $nearby_store[$key]['province_name'] = $this->db->select('area_name')->where('area_id',$val['province_id'])->get('area')->row('area_name');
                            $nearby_store[$key]['city_name'] = $this->db->select('area_name')->where('area_id',$val['city_id'])->get('area')->row('area_name');
                            $nearby_store[$key]['area_name'] = $this->db->select('area_name')->where('area_id',$val['area_id'])->get('area')->row('area_name');
                        }else{
                            unset($nearby_store[$key]);
                            continue;
                        }
                    }else{
                        $nearby_store[$key]['distance'] = $distance;
                        $nearby_store[$key]['province_name'] = $this->db->select('area_name')->where('area_id',$val['province_id'])->get('area')->row('area_name');
                        $nearby_store[$key]['city_name'] = $this->db->select('area_name')->where('area_id',$val['city_id'])->get('area')->row('area_name');
                        $nearby_store[$key]['area_name'] = $this->db->select('area_name')->where('area_id',$val['area_id'])->get('area')->row('area_name');
                    }
                }
            }
            
            $store_region_noguide  = $this->common_function->get_system_value('store_region_noguide');//未绑定导购用户的操作
            //print_r($store_region_noguide);die;
            //print_r($nearby_store);die;
            
            
            // print_r($nearby_store);die;
            
            if(empty($nearby_store) && empty($history_store)){
                if($store_region_noguide!=1){
                    $this->db->select('is_wx_store,is_wx_store_type,store_id,store_name,ous_longitude,ous_latitude,ous_logo,province_id,city_id,area_id,ous_address,agp_id,ous_type');
                    $this->db->from('store');
                    $this->db->where('store_state','1');
                    $this->db->where("ous_type !='3'");
                    $this->db->where('is_delete','0');
/*                     if($store_region_noguide==5 ){
                        //只显示旗舰店
                        $this->db->where('ous_tag =2');
                    }elseif($store_region_noguide==4){
                        //只显示直营店
                        $this->db->where('ous_tag =3');
                    }elseif($store_region_noguide==3 ){
                        //无则显示旗舰店
                        //$this->db->where('agp_id',$agp_id);
                        $this->db->where('ous_tag =2');
                    }elseif($store_region_noguide==2 ){
                        //无则显示直营店
                        //$this->db->where('agp_id',$agp_id);
                        $this->db->where('ous_tag =3');
                    } */
                    $this->db->order_by('store_id',"ASC");
                    $nearby_store = $this->db->get()->result_array();
            
//                     $store_region_state = $this->common_function->get_system_value('store_region_state');//区域门店隔离
//                     $store_region_radius  = $this->common_function->get_system_value('store_region_radius');//门店隔离半径
                    $num ="";//km
                    /* if($store_region_state){
                        $num = $store_region_radius;
                    } */
            
                    foreach ($nearby_store as $key =>$val){
                        /* if(!empty($history)){
                            if(array_key_exists($nearby_store[$key]['store_id'], $history)){
                                unset($nearby_store[$key]);
                                continue;
                            }
                        } */
                        $distance =   $this->getlocation($longitude,$latitude,$val['ous_longitude'],$val['ous_latitude']);  //km
                        if(!empty($num) && ($store_region_noguide==2 or $store_region_noguide==3)){
                            $nearby_store[$key]['distance'] = $distance;
                            $nearby_store[$key]['province_name'] = $this->db->select('area_name')->where('area_id',$val['province_id'])->get('area')->row('area_name');
                            $nearby_store[$key]['city_name'] = $this->db->select('area_name')->where('area_id',$val['city_id'])->get('area')->row('area_name');
                            $nearby_store[$key]['area_name'] = $this->db->select('area_name')->where('area_id',$val['area_id'])->get('area')->row('area_name');
                     /*        if($distance<=$num){
                                $nearby_store[$key]['distance'] = $distance;
                                $nearby_store[$key]['province_name'] = $this->db->select('area_name')->where('area_id',$val['province_id'])->get('area')->row('area_name');
                                $nearby_store[$key]['city_name'] = $this->db->select('area_name')->where('area_id',$val['city_id'])->get('area')->row('area_name');
                                $nearby_store[$key]['area_name'] = $this->db->select('area_name')->where('area_id',$val['area_id'])->get('area')->row('area_name');
                            }else{
                                unset($nearby_store[$key]);
                                continue;
                            } */
                        }else{
                            $nearby_store[$key]['distance'] = $distance;
                            $nearby_store[$key]['province_name'] = $this->db->select('area_name')->where('area_id',$val['province_id'])->get('area')->row('area_name');
                            $nearby_store[$key]['city_name'] = $this->db->select('area_name')->where('area_id',$val['city_id'])->get('area')->row('area_name');
                            $nearby_store[$key]['area_name'] = $this->db->select('area_name')->where('area_id',$val['area_id'])->get('area')->row('area_name');
                        }
                    }
                }
            }
            
        }
        //对未访问的门店与用户间的距离进行升序排序
        foreach ($nearby_store as $key => $val) {
                
            $dis[$key] = $val['distance'];
               //echo $a.'<br>';
        }
        array_multisort($dis,SORT_ASC,$nearby_store);

        //print_r($nearby_store);die;
        //print_r($history_store);die;
        return  array("history_store"=>$history_store,"nearby_store"=>$nearby_store);
    }
     

    
    
    

    
}