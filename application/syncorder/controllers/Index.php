<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @author lxc //接收消息队列自动同步店铺订单
 */
class index extends CI_Controller {

    private $log_path;      //日志路径
    private $error_data = '';                          //错误信息
    private $log_data = '';                            //日志内容
    private $op = 'sync_order';                  //操作

    public function __construct() {
        parent::__construct();
        $this->load->library('store_api');
        $this->log_path = 'timing_run_' . $this->op . '_' . date("Y-m-d", time()) . '.log';
        $this->op .= "_" . date("His", time());
        
        
    }
    function index() {
    	$config_status = $this->config->config['sync_logs'];
        $this->log_data = '[' . date("Y-m-d H:i:s", time()) . "] {$this->op}:start!";
        note_log($this->log_path, $this->log_data,$config_status);
        
        try {
            $cids = array();
            $sync_store = $this->db->select('us.store_id,us.sync_order_interval_time,e.bind_ecstore_type')->from('store_sync us')
            ->join('store e','e.store_id=us.store_id and e.is_delete!=1 and e.store_state=1')
            ->where('us.sync_order_state',1)->get()->result_array();
            //$sync_store = $this->db->select('u_ecs_id,sync_order_interval_time')->where('u_ecs_id',11)->get('wqt_user_ecstore_synchro')->result_array();
            $sync_store_arr = array();
            foreach ($sync_store as $sk=>$sv){
            	$last_sync_time = $this->db->select('sync_time')->where('store_id',$sv['store_id'])->where('sync_type',1)
            	->where_in('sync_statu',array(2,3))->order_by('sync_logid','DESC')->limit(1)->get('store_syn_log')->row_array();
            	$sv['order'] = 1;
            	$sv['last_order_sync_time'] = isset($last_sync_time['sync_time'])?$last_sync_time['sync_time']:'';
            	//$sv['last_order_sync_time'] = time()-3600*2;
            	$sync_store_arr[$sv['store_id']] = $sv;
            }
           //print_r($sync_store_arr);die;
            //子进程代码，为防止不停的启用子进程造成系统资源被耗尽的情况，一般子进程代码运行完成后，加入exit来确保子进程正常退出。
            $this->db->close();
            foreach ($sync_store_arr as $kk => $vv) {
            	
            	//开启进程
            	$pid = pcntl_fork();
            	if ($pid == -1) {
            		$this->error_data = 'could not fork!';
            		throw new Exception($this->error_data);
            	} else {
            		if ($pid) {
            			//从这里开始写的代码是父进程的
            			$cids[] = $pid;
            		} else {
            			if($this->config->config['sync_logs']){
            				if(!is_dir(ROOTPATH.'logs/stores')){
            					if(!mkdir(ROOTPATH.'logs/stores')){
            						$this->error_data = "The store, id is {$kk} store note sync table error in the creating logs dir!";
            						 
            						continue;
            						//throw new Exception($this->error_data);
            					}
            				}
            				if(!is_dir(ROOTPATH.'logs/stores/'.$kk)){
            					if(!mkdir(ROOTPATH.'logs/stores/'.$kk)){
            						$this->error_data = "The store, id is {$kk} store note sync table error in the creating logs dir!";
            			
            						continue;
            						//throw new Exception($this->error_data);
            					}
            				}
            			}
            			$Stime = time();
            			if($this->config->config['sync_logs']){
            				file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺'.$kk."开启进程($Stime)".PHP_EOL,FILE_APPEND);
            			}
            			$this->load->database();
            			if (isset($vv['order'])) {
            				$sync_log_info = $this->db->select('sync_statu,sync_time')->from('store_syn_log')->where('store_id', $kk)->where('sync_type', 1)->order_by('sync_logid', 'DESC')->get()->row_array();
            				//print_r($sync_log_info);
            				if (!empty($sync_log_info) && $sync_log_info['sync_statu'] == 1 && time()-$sync_log_info['sync_time']<1800) {      //上一个进程还在进行中,本次就不同步该店铺订单(半个小时之类)
            					//                                        $this->error_data = "The store, id is {$kk} is still sync,give up the sync!";
            					//                                        throw new Exception($this->error_data);
            					if($this->config->config['sync_logs']){
            						file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺'.$kk."结束进程($Stime)".PHP_EOL,FILE_APPEND);
            					}
            					continue;
            				}
            				//print_r($kk);
            				//$aaaa[$kk] = 11;continue;
            				$store_info = $this->store_api->get_store_by_id($kk);
            				//$aaaa[$kk] = $store_info;continue;
            				if (!empty($store_info) && !empty($store_info['bind_token_session'])) {
            					 
            					// var_dump($store_info);exit;
            					
            					if($this->config->config['sync_logs']){
            						if(!is_dir(ROOTPATH.'logs/stores')){
            							if(!mkdir(ROOTPATH.'logs/stores')){
            								$this->error_data = "The store, id is {$kk} store note sync table error in the creating logs dir!";
            								if($this->config->config['sync_logs']){
            									file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').$this->error_data."结束进程($Stime)".PHP_EOL,FILE_APPEND);
            								}
            								continue;
            								//throw new Exception($this->error_data);
            							}
            						}
            						if(!is_dir(ROOTPATH.'logs/stores/'.$kk)){
            							if(!mkdir(ROOTPATH.'logs/stores/'.$kk)){
            								$this->error_data = "The store, id is {$kk} store note sync table error in the creating logs dir!";
            								if($this->config->config['sync_logs']){
            									file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').$this->error_data."结束进程($Stime)".PHP_EOL,FILE_APPEND);
            								}
            								continue;
            								//throw new Exception($this->error_data);
            							}
            						}
            					}
            					
            					$last_order_sync_time = !empty($vv['last_order_sync_time']) ? $vv['last_order_sync_time'] : $store_info['bind_auth_time'];
            					$time = time();
            					if($this->config->config['sync_logs']){
            						file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺'.$kk.'开始获取数据'.PHP_EOL,FILE_APPEND);
            					}
            					 
            					if ($store_info['ecs_code'] == 2) {
            						$this->load->library('taobao_op');
            						$this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            						$a_month_ago = strtotime('-1month');
            						$last_order_sync_time = $last_order_sync_time>$a_month_ago?$last_order_sync_time:$a_month_ago;
            			
            						$online_orders = $this->taobao_op->get_create_orders($last_order_sync_time, $time);
            						if($this->config->config['sync_logs']){
            							file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺'.$kk.'获取增量订单。'.$online_orders['msg'].PHP_EOL,FILE_APPEND);
            						}
            					} elseif ($store_info['ecs_code'] == 1) {
            						$a_month_ago = strtotime('-1month');
            						$stime = $last_order_sync_time > $a_month_ago ? date('Y-m-d H:i:s', $last_order_sync_time) : date('Y-m-d H:i:s', $a_month_ago);
            						$etime = date('Y-m-d H:i:s', $time);
            						$this->load->library('jd_op');
            						$this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            						$online_orders = $this->jd_op->get_orders($stime, $etime);
            					}
            					//$aaaa[$kk] = $online_orders;continue;
            					//print_r($last_order_sync_time);print_r($online_orders);die;
            					if($this->config->config['sync_logs']){
            						file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺'.$kk.'获取结束'.PHP_EOL,FILE_APPEND);
            					}
            					$log_id = '';
            					if ($online_orders['state']) {
            						$result = $this->note_sync_log(1, '', $kk);  //记录日志表（进行中）
            						
            						if (!$result['state']) {
            							$this->error_data = "The store, id is {$kk} store note sync table error in the beginning!";
            							if($this->config->config['sync_logs']){
            								file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').$this->error_data."结束进程($Stime)".PHP_EOL,FILE_APPEND);
            							}
            							continue;
            							//throw new Exception($this->error_data);
            						} else {
            							$log_id = $result['in_id'];
            						}
            						if (!empty($online_orders['orders'])) {
            							$flag = $this->store_api->inner_orders_sync($online_orders['orders'], $store_info);
            							if ($flag) {
            								
            								if($this->config->config['sync_logs']){
            									file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺'.$kk."成功同步订单，结束进程($Stime)".PHP_EOL,FILE_APPEND);
            								}
            							} else {
            								if($this->config->config['sync_logs']){
            									file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺'.$kk."同步订单失败，结束进程($Stime)".PHP_EOL,FILE_APPEND);
            								}
            								$error_msg = "The store id is {$kk} insert orders table error!";
            								$msg_arr = array($log_id, $error_msg);
            								$this->error_data = implode(',', $msg_arr);
            								if($this->config->config['sync_logs']){
            									file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').$this->error_data."结束进程($Stime)".PHP_EOL,FILE_APPEND);
            								}
            								continue;
            								//throw new Exception($this->error_data);
            							}
            						}
            					} else {
            						$error_msg = isset($online_orders['msg']) ? $online_orders['msg'] : "The store id is {$kk} store download orders info error!";
            						$msg_arr = array($log_id, $error_msg);
            						$this->error_data = implode(',', $msg_arr);
            						if($this->config->config['sync_logs']){
            							file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').$this->error_data."结束进程($Stime)".PHP_EOL,FILE_APPEND);
            						}
            						continue;
            						//throw new Exception($this->error_data);
            					}
            					if($this->config->config['sync_logs']){
            						file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺'.$kk.'写入数据结束'.PHP_EOL,FILE_APPEND);
            					}
            				} else {
            					if (empty($store_info)) {
            						$this->error_data = "This id is {$kk} store not information!";
            					} elseif (empty($store_info['token_session'])) {
            						$this->error_data = "This id is {$kk} store unauthorized!";
            					} else {
            						$this->error_data = "This id is {$kk} information error!";
            					}
            					if($this->config->config['sync_logs']){
            						file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').$this->error_data."结束进程($Stime)".PHP_EOL,FILE_APPEND);
            					}
            					continue;
            				}
            				if(!empty($log_id)) {
            					$result = $this->note_sync_log(2, '', '', $log_id);  //成功时更新日志表（成功）
            					if (!$result['state']) {
            						$error_msg = "The store, id is {$kk} store note sync table error in the success!";
            						$msg_arr = array($log_id, $error_msg);
            						$this->error_data = implode(',', $msg_arr);
            						if($this->config->config['sync_logs']){
            							file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').$this->error_data."结束进程($Stime)".PHP_EOL,FILE_APPEND);
            						}
            						continue;
            						//throw new Exception($this->error_data);
            					}
            				}
            			}
            			if($this->config->config['sync_logs']){
            				file_put_contents(ROOTPATH.'logs/stores/'.$kk.'/order_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺'.$kk."结束进程($Stime)".PHP_EOL,FILE_APPEND);
            			}
            			exit;
            		}
            		
            	}	
            }
            //print_r($aaaa);die;
        } catch (Exception $e) {
            $msg_arr = explode(',', $e->getMessage());
            $error_msg = '';
            if (count($msg_arr) >= 2) {
                $error_msg = $msg_arr[1];
                $result = $this->note_sync_log(3, $error_msg, '', $msg_arr[0]);  //记录日志表（进行中）
                if (!$result) {
                    $this->error_data = "The store, id is {$kk} store note sync table error in the finish!";
                    $this->log_data = '[' . date("Y-m-d H:i:s", time()) . "] {$this->op}:{$this->error_data}";
                    note_log($this->log_path, $this->log_data,$config_status);
                }
            } else {
                $error_msg = $msg_arr[0];
            }
            $this->log_data = '[' . date("Y-m-d H:i:s", time()) . "] {$this->op}:{$error_msg} Line:{$e->getLine()}";
            note_log($this->log_path, $this->log_data,$config_status);
//            var_dump($e->getMessage());exit;       //打印错误
            exit;
        }
       /*  while (count($cids) > 0) {
            foreach ($cids as $key => $pid) {
                $res = pcntl_waitpid($pid, $status, WNOHANG);
                if ($res == -1 || $res > 0) {
                    unset($cids[$key]);
                }
            }
            usleep(100);
        } */
        $this->log_data = '[' . date("Y-m-d H:i:s", time()) . "] {$this->op}:success!";
        note_log($this->log_path, $this->log_data,$config_status);
        exit;
    }

    /**
     * 插入用户店铺同步日志表
     * @param   int     $uec_id           店铺ID
     * @param   string  $sync_statu       状态
     * @param   string  $sync_note        备注
     * @param   int     $sync_logid       流水号
     * @param   string  $field           需要返回的字段
     * @return  array   $user_depots     返回仓库数组
     */
    private function note_sync_log($sync_statu, $sync_note = '', $uec_id = '', $sync_logid = false) {
        $data = array('state' => false, 'msg' => 'note sync logs error!');
        if ($sync_statu) {
            $data = array('state' => false, 'msg' => 'Parameters sync_statu cannot be empty');
        }
        if ($sync_logid) {
            $logs['sync_statu'] = $sync_statu;
            $logs['sync_time'] = time();
            if (!empty($sync_note)) {
                $logs['sync_note'] = $sync_note;
            }
            $result = $this->db->update('store_syn_log', $logs, array('sync_logid' => $sync_logid));
            if ($result) {
                $data = array('state' => true, 'msg' => 'success');
            }
        } else {
            $logs = array(
                'store_id' => $uec_id,
                'sync_time' => time(),
                'sync_type' => 1,
                'sync_statu' => $sync_statu,
                'sync_note' => $sync_note,
            );
            $result = $this->db->insert('store_syn_log', $logs);
            if ($result) {
                $in_id = $this->db->insert_id();
                $data = array('state' => true, 'in_id' => $in_id, 'msg' => 'success');
            }
        }
        return $data;
    }

}
