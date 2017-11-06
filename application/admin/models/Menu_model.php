<?php
/**
 * 框架目录
 * @author yhx
 *
 */
class Menu_model extends CI_Model{
    
    public function menu(){
    	      $son_menu_systemform = array (
            array (
                'text' => '系统',
                'role' => 'systemform',
                'list' => array (
                    array (
                        'role' => 'website_setting',
                        'args' => 'web',
                        'text' => '站点设置'
                    ),
                    array (
                        'role' => 'area_setting',
                        'args' => 'web/area',
                        'text' => '地区设置'
                    ),
                    array (
                        'role' => 'upload_setting',
                        'args' => 'web/upload',
                        'text' => '上传设置'
                    ),
                    array (
                        'role' => 'mail_setting',
                        'args' => 'web/set',
                        'text' => '邮件设置'
                    ),
                    array (
                        'role' => 'sms_setting',
                        'args' => 'sms/set',
                        'text' => '短信设置'
                    ),
                    array (
                        'role' => 'admin_setting',
                        'args' => 'web/admin',
                        'text' => '权限管理'
                    ),
                    array (
                        'role' => 'operate_log',
                        'args' => 'web/admin_log',
                        'text' => '操作日志'
                    ),
                    array (
                        'role' => 'cache_clear',
                        'args' => 'web/cache',
                        'text' => '清理缓存'
                    )
                )
            ),
            array (
                'text' => '网站',
                'role' => 'Website',
                'list' => array (
                   array (
                        'role' => 'pic_setting',
                        'args' => 'Website/pic_mall_set',
                        'text' => '图片设置'
                    ),
                   array (
                        'role' => 'Articleclass_setting',
                        'args' => 'Website/website_article_classify',
                        'text' => '文章分类'
                    ),
                    array (
                        'role' => 'Article_management',
                        'args' => 'Website/website_article_management',
                        'text' => '文章管理'
                    ),
                )
            ),
            
        );
        $son_menu_platform = array (
              array (
                'text' => '设置',
                'role' => 'Mall',
                'list' => array (
                    array (
                        'role' => 'mall_pic_set',
                        'args' => 'Mall/mall_pic_set',
                        'text' => '水印设置'
                    ),
                    array (
                        'role' => 'mall_payment',
                        'args' => 'Mall/mall_payment',
                        'text' => '支付方式'
                    ),
                    array (
                        'role' => 'mall_payment',
                        'args' => 'Mall/authority',
                        'text' => '权限管理'
                    ),
                     array (
                        'role' => 'mall_news',
                        'args' => 'Mall/mall_news',
                        'text' => '消息通知'
                    ),array (
                        'role' => 'mall_news',
                        'args' => 'Mall/mall_other',
                        'text' => '其他设置'
                    ),
                )
            ),
                array (
                'text' => '商品',
                'role' => 'Goods',
                'list' => array (
//                     array (
//                        'role' => 'supp_stock_deductio',
//                        'args' => 'Goods/goods_stock_deduction',
//                        'text' => '库存扣减设置'
//                    ),
                    array (
                        'role' => 'depot_management',
                        'args' => 'Goods/goods_management?source=all',
                        'text' => '商品管理'
                    ),
                    array (
                        'role' => 'waybill',
                        'args' => 'Goods/goods_classify_management',
                        'text' => '分类管理'
                    ),
                     /* array (
                        'role' => 'waybill',
                        'args' => 'Goods/goods_self_taxonomy',
                        'text' => '自定义标签分类'
                    ),
                    array (
                        'role' => 'waybill',
                        'args' => 'Goods/code_segment',
                        'text' => '码段管理'
                    ), */
                    array (
                        'role' => 'waybill',
                        'args' => 'Goods/code_segment_size',
                        'text' => '尺码管理'
                    ),
                    array (
                        'role' => 'depot_inplode',
                        'args' => 'Goods/goods_brand_management',
                        'text' => '品牌管理'
                    ),
        
                    array (
                        'role' => 'depot_select',
                        'args' => 'Goods/goods_type_management',
                        'text' => '类型管理'
                    ),
        
//                    array (
//                        'role' => 'supp_discount',
//                        'args' => 'Goods/goods_specifications',
//                        'text' => '规格管理'
//                    ),
                    
                    array (
                        'role' => 'agent_discount',
                        'args' => 'Goods/goods_pic_room',
                        'text' => '图片空间'
                    )
                )
            ),
            array (
                'text' => '店铺',
                'role' => 'Stores',
                'list' => array (
                    array (
                        'role' => 'store_management',
                        'args' => 'PubStore/store_management',
                        'text' => '店铺管理'
                    ),
                    array (
                        'role' => 'store_shopping_guide',
                        'args' => 'PubStore/store_shopping_guide',
                        'text' => '导购管理'
                    ),
                )
            ),
            array (
                'text' => '会员',
                'role' => 'Member',
                'list' => array (
                   array (
                        'role' => 'user_base',
                        'args' => 'Member/member_management?role=',
                        'text' => '会员管理'
                    ), 
                    array (
                        'role' => 'QQ_connect',
                        'args' => 'Member/member_step_qq',
                        'text' => '帐号同步'
                    ),
                    array (
                        'role' => 'member_protocol',
                        'args' => 'Member/website_member_agreement',
                        'text' => '会员协议'
                    ),
                                        array (
                                            'role' => 'member_protocol',
                                            'args' => 'Member/member_marketing',
                                            'text' => '会员营销'
                                        )
                )
            ),
            array (
                'text' => '交易',
                'role' => 'Business',
                'list' => array (
                    array (
                        'role' => 'order_manage',
                        'args' => 'Business/business_order',
                        'text' => '订单管理'
                    ),
                    array (
                        'role' => 'return_manage',
                        'args' => 'Business/business_refund',
                        'text' => '售后管理'
                    ),
                    /* array (
                        'role' => 'cancel_product',
                        'args' => 'Business/business_consultation',
                        'text' => '咨询管理'
                    ), */
                    array (
                        'role' => 'cancel_product',
                        'args' => 'Business/business_evaluate_buyers',
                        'text' => '评价管理'
                    ),
                )
            ),
            array (
                'text' => '微信',
                'role' => 'weixin',
                'list' => array (
                    array (
                        'role' => 'mp_setting',
                        'args' => 'weixin/information_set',
                        'text' => '公众号授权'
                    ),
                    array (
                        'role' => 'mp_menu',
                        'args' => 'weixin/menu_management',
                        'text' => '菜单设置'
                    ),
					array (
                        'role' => 'mp_reply_management',
                        'args' => 'weixin/reply_management',
                        'text' => '自动回复'
                    ),
                    array (
                        'role' => 'follow_management',
                        'args' => 'follow/follow_management',
                        'text' => '粉丝管理'
                    ),
                )
            ),
            array (
                'text' => '物流',
                'role' => 'logistics',
                'list' => array (
                   array (
                        'role' => 'mall_express',
                        'args' => 'Mall/mall_express',
                        'text' => '快递公司'
                    ),
					array (
                        'role' => 'mall_express_interfa',
                        'args' => 'Mall/mall_express_interface',
                        'text' => '快递接口'
                    ),
					array (
                        'role' => 'mall_express_tools',
                        'args' => 'Mall/mall_express_tools',
                        'text' => '运费设置'
                    ),
/* 					 array (
                        'role' => 'mall_template_management',
                        'args' => 'Mall/mall_template_management',
                        'text' => '模版管理'
                    ),
                      array (
                        'role' => 'mall_express',
                        'args' => 'web/logistics',
                        'text' => '物流管理'
                    ), */
                    array (
                        'role' => 'mall_express',
                        'args' => 'mall/mall_waybill',
                        'text' => '运单模板'
                    ),
                )
            ),
            
        );
        
        $son_menu_shops = array (
          array (
                'text' => '设置',
                'role' => 'Mall',
                'list' => array (
                    array (
                        'role' => 'mall_set',
                        'args' => 'Mall/mall_set',
                        'text' => '商城设置'
                    ),
                    array (
                        'role' => 'mall_pic_set',
                        'args' => 'Mall/mall_pic_set',
                        'text' => '图片设置'
                    ),
                    array (
                        'role' => 'mall_search',
                        'args' => 'Mall/mall_search',
                        'text' => '搜索设置'
                    ),
                   /*  array (
                        'role' => 'mall_seo_set',
                        'args' => 'Mall/mall_seo_set',
                        'text' => 'SEO设置'
                    ), */
                   
                )
            ),
            array (
                'text' => '店铺',
                'role' => 'Stores',
                'list' => array (
                    	
                    array (
                        'role' => 'store_management',
                        'args' => 'PubStore/store_management?role=w',
                        'text' => '店铺管理'
                    ),
                    array (
                        'role' => 'store_shopping_guide',
                        'args' => 'PubStore/store_shopping_guide?role=w',
                        'text' => '导购管理'
                    ),
        
                    array (
                        'role' => 'store_decoration',
                        'args' => 'stores/store_decoration',
                        'text' => '微商城装修'
                    )
                    ,
                  array (
                        'role' => 'store_area_setting',
                        'args' => 'stores/store_area_setting',
                        'text' => '门店区域设置'
                    )
                    ,
                    array (
                        'role' => 'store_cashier',
                        'args' => 'stores/store_cashier',
                        'text' => '门店收银'
                    )
                      ,
                    array (
                        'role' => 'store_department',
                        'args' => 'stores/store_department',
                        'text' => '集合店管理'
                    )
                )
            ),
            array (
                'text' => '商品',
                'role' => 'Goods',
                'list' => array (
//                     array (
//                        'role' => 'supp_stock_deductio',
//                        'args' => 'Goods/goods_stock_deduction',
//                        'text' => '库存扣减设置'
//                    ),
                    array (
                        'role' => 'depot_management',
                        'args' => 'Goods/goods_management?op=shop_goods&source=store',
                        'text' => '商品管理'
                    ),
                    /* array (
                         'role' => 'waybill',
                         'args' => 'Goods/goods_classify_management',
                         'text' => '分类管理'
                     ),
                      array (
                         'role' => 'waybill',
                         'args' => 'Goods/goods_self_taxonomy',
                         'text' => '自定义标签分类'
                     ),
                   /* array (
                         'role' => 'waybill',
                         'args' => 'Goods/code_segment',
                         'text' => '码段管理'
                     ),
                    array (
                        'role' => 'waybill',
                        'args' => 'Goods/code_segment_size',
                        'text' => '尺码管理'
                    ),
                    array (
                        'role' => 'depot_inplode',
                        'args' => 'Goods/goods_brand_management',
                        'text' => '品牌管理'
                    ),
        
                    array (
                        'role' => 'depot_select',
                        'args' => 'Goods/goods_type_management',
                        'text' => '类型管理'
                    ),*/
        
//                    array (
//                        'role' => 'supp_discount',
//                        'args' => 'Goods/goods_specifications',
//                        'text' => '规格管理'
//                    ),
                    
                    /*array (
                        'role' => 'agent_discount',
                        'args' => 'Goods/goods_pic_room',
                        'text' => '图片空间'
                    )*/
                )
            ),
            array (
                'text' => '会员',
                'role' => 'User',
                'list' => array (
                    array (
                        'role' => 'user_base',
                        'args' => 'Member/member_management?role=w',
                        'text' => '会员管理'
                    ),
                    array (
                        'role' => 'user_management',
                        'args' => 'User/user_integral_detail',
                        'text' => '积分管理'
                    ),
                 /*   array (
                        'role' => 'user_management',
                        'args' => 'User/user_exp_detail',
                        'text' => '经验管理'
                    ),
                    	
                     array (
                        'role' => 'user_rank',
                        'args' => 'User/user_shared_binding',
                        'text' => '分享绑定'
                    ),
                    	 */
                   
                )
            ),
            array (
                'text' => '交易',
                'role' => 'Business',
                'list' => array (
                    array (
                        'role' => 'order_manage',
                        'args' => 'Business/business_order?role=w',
                        'text' => '订单管理'
                    ),
					array (
                        'role' => 'return_manage',
                        'args' => 'Business/business_refund?role=w',
                        'text' => '售后管理'
                    ),
					/* array (
                        'role' => 'cancel_product',
                        'args' => 'Business/business_consultation',
                        'text' => '咨询管理'
                    ), */
					array (
                        'role' => 'cancel_product',
                        'args' => 'Business/business_evaluate_buyers?role=w',
                        'text' => '评价管理'
                    ),
                )
            ),
            array (
                'text' => '促销',
                'role' => 'Sales',
                'list' => array (
                  /*
                    array (
                        'role' => 'after_sale_type',
                        'args' => 'Sales/sales_discount',
                        'text' => '限时折扣'
                    ),
                    array (
                        'role' => 'aftersale_reason',
                        'args' => 'Sales/sales_group',
                        'text' => '团购管理'
                    ),
					 array (
                        'role' => 'aftersale_reason',
                        'args' => 'Sales/sales_full_send',
                        'text' => '满就送'
                    ),
					array (
                        'role' => 'aftersale_reason',
                        'args' => 'Sales/sales_together',
                        'text' => '拼团管理'
                    ),
					array (
                        'role' => 'aftersale_reason',
                        'args' => 'Sales/sales_red_packets',
                        'text' => '平台红包'
                    ),
					array (
                        'role' => 'aftersale_reason',
                        'args' => 'Sales/sales_phone',
                        'text' => '手机专享'
                    ),
					array (
                        'role' => 'aftersale_reason',
                        'args' => 'Sales/sales_presell',
                        'text' => '预售商品'
                    ),*/
                    array (
                        'role' => 'CouponOfNewman',
                        'args' => 'Promotion/couponOfNewman',
                        'text' => '新会员送券'
                    ),
                    array (
                        'role' => 'CouponOfShopping',
                        'args' => 'Promotion/CouponOfShopping',
                        'text' => '买后送券'
                    ),
					 array (
                        'role' => 'qiangHongBao',
                        'args' => 'Promotion/qiangHongBao',
                        'text' => '抢红包'
                    ),
					array (
                        'role' => 'CouponOfSales',
                        'args' => 'Promotion/CouponOfSales',
                        'text' => '发券给导购'
                    ),
					array (
                        'role' => 'CouponOfReceive',
                        'args' => 'Promotion/CouponOfReceive',
                        'text' => '领券活动'
                    ),
					array (
                        'role' => 'OfDiscount',
                        'args' => 'Promotion/OfDiscount',
                        'text' => '满减满折'
                    ),
                     array (
                        'role' => 'OfSeckill',
                        'args' => 'Promotion/OfSeckill',
                        'text' => '天天闪购'
                    ),
					 array (
                        'role' => 'specialPromotion',
                        'args' => 'Promotion/specialPromotion',
                        'text' => '商品专题'
                    ),
					array (
                        'role' => 'OfLimitTimeDiscount',
                        'args' => 'Promotion/OfLimitTimeDiscount',
                        'text' => '限时折扣'
                    ),
					array (
                        'role' => 'GameOfSign',
                        'args' => 'Promotion/sign',
                        'text' => '签到'
                    ),
					array (
                        'role' => 'GameOfLottery',
                        'args' => 'Promotion/wheel',
                        'text' => '大转盘'
                    ),
                    array (
                        'role' => 'GameOfScratch',
                        'args' => 'Promotion/GameOfScratch',
                        'text' => '刮刮卡'
                    ),
                    array(
                        'role' => 'GameOfScratch',
                        'args' => 'MicroBargain/micro',
                        'text' => '微砍价'
                    ),
                    array(
                        'role' => 'GameOfScratch',
                        'args' => 'MicroBargain/member_shop',
                        'text' => '会员购'
                    )
                )
            ),
			array (
                'text' => '统计',
                'role' => 'Statistics',
                'list' => array (
                    array (
                        'role' => 'after_sale_type',
                        'args' => 'Statistics/sales_discount',
                        'text' => '限时折扣'
                    ),
                    array (
                        'role' => 'aftersale_reason',
                        'args' => 'Statistics/sales_group',
                        'text' => '团购管理'
                    ),
					 array (
                        'role' => 'aftersale_reason',
                        'args' => 'Statistics/sales_full_send',
                        'text' => '满就送'
                    ),
					array (
                        'role' => 'aftersale_reason',
                        'args' => 'Statistics/sales_together',
                        'text' => '拼团管理'
                    ),
                )
            ),
        );
        $son_menu_phone = array (
            array (
                'text' => '设置',
                'role' => 'app_version',
                'list' => array (
                    array (
                        'role' => 'app_version_manage',
                        'args' => 'App/app_version_manage',
                        'text' => '版本管理'
                    ),
                     array (
                        'role' => 'app_version_feedback',
                        'args' => 'App/app_version_feedback',
                        'text' => '导购反馈'
                    ),
                    array (
                        'role' => 'app_work_order',
                        'args' => 'App/app_work_order',
                        'text' => '工单信息'
                    )
                )
            ),
            array (
                'text' => '导购',
                'role' => 'app_user',
                'list' => array (
                    array (
                        'role' => 'App_user_manage',
                        'args' => 'App/App_user_manage',
                        'text' => '导购管理'
                    ),
                     array (
                        'role' => 'app_user_msg_manage',
                        'args' => 'App/app_user_msg_manage',
                        'text' => '消息管理'
                    ),
                )
            )
            ,
            array (
                'text' => '统计',
                'role' => 'app_statistics',
                'list' => array (
                    array (
                        'role' => 'app_statistics',
                        'args' => 'App/app_statistics',
                        'text' => '统计概况'
                    )
                )
            )
        );
          $son_menu_ebusiness=array (
           /* array (
                'text' => '设置',
                'role' => 'finance_set',
                'list' => array (
                    array (
                        'role' => 'finance_set_account',
                        'args' => 'Ebusiness/set',
                        'text' => ''
                    ),
                )
            ),*/
            array (
                'text' => '店铺',
                'role' => 'finance_account',
                'list' => array (
                    array (
                        'role' => 'finance_account_cash',
                        'args' => 'PubStore/store_management?role=d',
                        'text' => '店铺管理'
                    ),
                    array (
                        'role' => 'store_shopping_guide',
                        'args' => 'PubStore/store_shopping_guide?role=d',
                        'text' => '导购管理'
                    ),
                )
            ),
              array (
                  'text' => '商品',
                  'role' => 'Goods',
                  'list' => array (
                      array (
                          'role' => 'store_shopping_guide',
                          'args' => 'Goods/goods_management?op=shop_goods&source=ebusiness',
                          'text' => '商品管理'
                      ),
                  )
              ),
              array (
                  'text' => '会员',
                  'role' => 'finance_account',
                  'list' => array (
                      array (
                          'role' => 'finance_account_cash',
                          'args' => 'Member/member_management?role=d',
                          'text' => '会员管理'
                      )
                  )
              ),
              array (
                  'text' => '交易',
                  'role' => 'finance_account',
                  'list' => array (
                      array (
                          'role' => 'order_manage',
                          'args' => 'Business/business_order?role=e',
                          'text' => '订单管理'
                      ),
                      array (
                          'role' => 'return_manage',
                          'args' => 'Business/business_refund?role=e',
                          'text' => '售后管理'
                      ),

                  )
              ),
        );
          $son_menu_supply=array (
             /* array (
                  'text' => '设置',
                  'role' => 'finance_set',
                  'list' => array (
                      array (
                          'role' => 'finance_set_account',
                          'args' => 'Supply/set',
                          'text' => ''
                      ),
                  )
              ),*/
              array (
                  'text' => '店铺',
                  'role' => 'finance_account',
                  'list' => array (
                      array (
                          'role' => 'finance_account_cash',
                          'args' => 'PubStore/store_management?role=g',
                          'text' => '店铺管理'
                      ),
                      array (
                          'role' => 'store_shopping_guide',
                          'args' => 'PubStore/store_shopping_guide?role=g',
                          'text' => '导购管理'
                      ),
                  )
              ),
              array (
                  'text' => '商品',
                  'role' => 'Goods',
                  'list' => array (
                      array (
                          'role' => 'store_shopping_guide',
                          'args' => 'Goods/goods_management?op=shop_goods&source=supply',
                          'text' => '商品管理'
                      ),
                  )
              ),
              array (
                  'text' => '会员',
                  'role' => 'finance_account',
                  'list' => array (
                      array (
                          'role' => 'finance_account_cash',
                          'args' => 'Member/member_management?role=g',
                          'text' => '会员管理'
                      )
                  )
              ),
              array (
                  'text' => '交易',
                  'role' => 'finance_account',
                  'list' => array (
                      array (
                          'role' => 'order_manage',
                          'args' => 'Business/business_order?role=s',
                          'text' => '订单管理'
                      ),
                      array (
                          'role' => 'return_manage',
                          'args' => 'Business/business_refund?role=s',
                          'text' => '售后管理'
                      ),

                  )
              ),
          );
        $son_menu_finance=array (
            array (
                'text' => '设置',
                'role' => 'finance_set',
                'list' => array (
                    array (
                        'role' => 'finance_set_account',
                        'args' => 'Finance/finance_set_account',
                        'text' => '平台设置'
                    ),
                )
            ),
            array (
                'text' => '账户',
                'role' => 'finance_account',
                'list' => array (
                    array (
                        'role' => 'finance_account_cash',
                        'args' => 'Finance/finance_account_cash',
                        'text' => '提现管理'
                    ),
                    array (
                        'role' => 'finance_account_sys',
                        'args' => 'Finance/finance_account_sys',
                        'text' => '平台账户明细'
                    ),
                    array (
                        'role' => 'finance_account_user',
                        'args' => 'Finance/finance_account_user',
                        'text' => '会员管理'
                    ),
                    array (
                        'role' => 'finance_account_store',
                        'args' => 'Finance/finance_account_store',
                        'text' => '门店管理'
                    ),
                    array (
                        'role' => 'finance_account_guide',
                        'args' => 'Finance/finance_account_guide',
                        'text' => '导购管理'
                    ),
                    array (
                        'role' => 'finance_account_recharge',
                        'args' => 'Finance/finance_account_recharge',
                        'text' => '充值申请'
                    )
                )
            )
        );
        
        return array (
          array (
                'args' => 'system',
                'role' => 'system',
                'text' => '系统',
                'content' => $son_menu_systemform
            ),
            array (
                'args' => 'plat',
                'role' => 'plat',
                'text' => '平台',
                'content' => $son_menu_platform
            ),
            array (
                'args' => 'shops',
                'role' => 'shops',
                'text' => '微商城',
                'content' => $son_menu_shops
            ),
             array (
                'args' => 'ebusiness',
                'role' => 'ebusiness',
                'text' => '电商',
                'content' => $son_menu_ebusiness
            ),
             array (
                'args' => 'supply',
                'role' => 'supply',
                'text' => '供应',
                'content' => $son_menu_supply
            ),
            array (
                'args' => 'finance',
                'role' => 'finance',
                'text' => '财务',
                'content' => $son_menu_finance
            ),
            array (
                'args' => 'app',
                'role' => 'app',
                'text' => '手机端',
                'content' => $son_menu_phone
            )

        );
    }
}