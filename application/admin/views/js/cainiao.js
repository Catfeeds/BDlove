var webSocket;
var socket;
var printData;
var printer_address = '127.0.0.1:13528';
//var printer_address = '127.0.0.1:13529';
var re =  /^([0-9]|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.([0-9]|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.([0-9]|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.([0-9]|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]):[\d]+$/;
//备注：webSocket 是全局对象，不要每次发送请求丢去创建一个，做到webSocket对象重用，和打印组件保持长连接。


jQuery(function() {
    var defaultMessage ={ "cmd": "print","requestID": "123458976","version": "1.0","task": {"taskID": "1","preview": false,"printer": "QR-588-1","documents":[{"documentID": "9890000106027","contents": [{"data": {"recipient": {"address": {"city": "北京市","detail": "花家地社区卫生服务站三层楼我也不知道是哪儿了","district": "朝阳区","province": "北京","town": "望京街道"},"mobile": "1326443654","name": "张三","phone": "057123222"},"routingInfo": {"consolidation": {"name": "杭州","code": "hangzhou"},"origin": {"code":"POSTB"},"sortation":{"name": "杭州"},"routeCode": "380D-56-04"},"sender": {"address": {"city": "北京市","detail": "花家地社区卫生服务站二层楼我也不知道是哪儿了","district": "朝阳区","province": "北京","town": "望京街道"},"mobile": "1326443654","name": "张三","phone": "057123222"},"shippingOption":{"code":"COD","services": {"SVC-COD": {"value": "200"}},"title": "代收货款"},"waybillCode": "9890000160004"},"signature":"123","templateURL": "http://cloudprint.cainiao.com/template/standard/83910/7"}]}]}};
    printData = defaultMessage;

});





function install_print(){
	urls = $("#hidden_url").val();
	layer.open({
        type: 1,
        title: '<b>菜鸟打印组件下载</b>',
        skin: 'layui-layer-rim', //加上边框
        area: ['520px', 'auto'], //宽高
        content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form3" method="POST" enctype=multipart/form-data>' +
        '<div id="" style="width:100%;text-align:center;font-size:14px;color:#FF00FF;" class="">菜鸟打印组件尚未安装启动!点击下载并安装,安装后请刷新页面。</div>'+
        '<div style="width: 100%;text-align:center;color:#0096ff"><ul><li><a href="'+urls+'">点击下载</a></li>' +
        '</ul></div>'+
        '</form></div>',
    });

	
}


function doConnect()
{
  socket = new WebSocket('ws://'+printer_address);

  //如果是https的话，端口是13529
  //socket = new WebSocket('wss://'+printer_address);
  
   if(!re.test(printer_address) && printer_address != 'localhost') {
       console.log("ip地址格式不正确，请修改:ip:port");
       return false;
   } 
  
   
    // 打开Socket
/* 	if (socket.readyState == 0) {
	     alert('WebSocket连接中...');
	} */
	
	

    
    
	 // 打开Socket
     socket.onopen = function(event)
    {
    	 console.log("Websocket准备就绪,连接到客户端成功");
        
      //监听消息  响应请求
        socket.onmessage = function(event)
        {
           // console.log('Client received a message',event);
            var data = JSON.parse(event.data);
            if (data.cmd == "getPrinters") {
            	if($("#labelprinte")){
            		$(data.printers).each(function(k,v){
                		$("#labelprinte").append('<option value="'+v.name+'">'+v.name+'</option>');
                	})
            	}
                //alert('打印机列表:' + JSON.stringify(data.printers));
                
                defaultPrinter = data.defaultPrinter;
                //printData.task.printer = defaultPrinter;
                //alert('默认打印机为:' + defaultPrinter);
            }else if(data.cmd == "printerConfig"){
            	
            } else {
                alert("返回数据:" + JSON.stringify(data));
            }
        };
        
        
        
        // 监听Socket的关闭
        socket.onclose = function(event)
        {
            console.log('Client notified socket has closed',event);
        };

    }; 
    
    
    socket.onerror = function(event) {
    	alert('无法连接到:' + printer_address+' \n如果你还没有安装菜鸟打印组件,请下载并安装;\n如果你已经安装，请启动菜鸟打印组件！');
    	install_print();
  };
  
}



/***
 * 
 * 获取请求的UUID，指定长度和进制,如 
 * getUUID(8, 2)   //"01001010" 8 character (base=2)
 * getUUID(8, 10) // "47473046" 8 character ID (base=10)
 * getUUID(8, 16) // "098F4D35"。 8 character ID (base=16)
 *   
 */
function getUUID(len, radix) {
    var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.split('');
    var uuid = [], i;
    radix = radix || chars.length; 
    if (len) {
      for (i = 0; i < len; i++) uuid[i] = chars[0 | Math.random()*radix];
    } else {
      var r;
      uuid[8] = uuid[13] = uuid[18] = uuid[23] = '-';
      uuid[14] = '4';
      for (i = 0; i < 36; i++) {
        if (!uuid[i]) {
          r = 0 | Math.random()*16;
          uuid[i] = chars[(i == 19) ? (r & 0x3) | 0x8 : r];
        }
      }
    }
    return uuid.join('');
}




/***
 * 构造request对象
 */
function getRequestObject(cmd) {
    var request  = new Object();
    request.requestID=getUUID(8, 16);
    request.version="1.0";
    request.cmd=cmd;
    return request;
}


/***
 * 请求打印机列表协议
 */
function getPrinters() {
	var request  = getRequestObject("getPrinters");
    socket.send(JSON.stringify(request));
}

/***
 * 请求打印机配置协议
 */
function getPrinterConfig() {
	var request  = getRequestObject("getPrinterConfig");
	    //request.printer="QR-800 LABEL";
    socket.send(JSON.stringify(request));
}

/***
 * 获取打印机配置(弹出打印机配置界面)协议
 */
function printerConfig() {
	var request  = getRequestObject("printerConfig");
	    request.printer="QR-800 LABEL";
    socket.send(JSON.stringify(request));
}

/***
 * 设置打印机
 */
function setPrinterConfig() {
	var request  = getRequestObject("setPrinterConfig");
		request.printer = {
	        name : "QR-800 LABEL",
	        needTopLogo : true,
	        needBottomLogo: false
	    };
    socket.send(JSON.stringify(request));
}

/***
 * 获取全局配置信息(getGlobalConfig)
 */
function getGlobalConfig(){
	var request  = getRequestObject("getGlobalConfig");
	socket.send(JSON.stringify(request));
}


/***
 * 设置全局配置信息(setGlobalConfig)
 */
function setGlobalConfig(){
	var request  = getRequestObject("setGlobalConfig");
	request.notifyOnTaskFailure = true;//	打印任务失败时是否需要通知（弹出对话框提醒用户打印失败原因并默认暂停当前打印机的打印），true为需要，false为不需要
	socket.send(JSON.stringify(request));
}


/***
 * 发送打印/预览数据协议(print)
 */
function doPrint(){
	var request  = getRequestObject("print");
	request.task ={
			    taskID: getUUID(8,10),
		        preview: false,  //如果为true，则是预览模式，为false，则直接打印
		        previewType:"pdf/image",//如果是预览模式，是以pdf还是image方式预览，二选一，此属性不是必选，默认以pdf预览。
		        printer: "QR-800 LABEL",
		        notifyMode:"oneByOne/allInOne",//打印结果通知模式，是逐个document通知还是批量一次通知最终打印结果
		        //firstDocumentNumber:10,// v0.2.8.3 新增：task 起始 document 序号
		        //totalDocumentCount:100,// v0.2.8.3 本次新增task document 总数
	            documents : [
	                {
	                    documentID : "9890000076011",
	                    contents : [
	                        //电子面单部分
	                        {
	                            templateURL : "http://cloudprint.cainiao.com/template/standard/82710/16",
	                            signature : "ALIBABACAINIAOWANGLUO",
	                            "data": {
	                              "recipient": {
	                                "address": {
	                                  "city": "北京市",
	                                  "detail": "花家地社区卫生服务站三层楼我也不知道是哪儿了",
	                                  "district": "朝阳区",
	                                  "province": "北京",
	                                  "town": "望京街道"
	                                },
	                                "mobile": "1326443654",
	                                "name": "张三",
	                                "phone": "057123222"
	                              },
	                              "routingInfo": {
	                                "consolidation": {
	                                  "name": "杭州",
	                                  "code": "hangzhou"
	                                },
	                                "origin": {
	                                  "code": "POSTB"
	                                },
	                                "sortation": {
	                                  "name": "成都"
	                                },
	                                "routeCode": "380D-56-04"
	                              },
	                              "sender": {
	                                "address": {
	                                  "city": "四川省",
	                                  "detail": "金泉路5号蓝领集团501",
	                                  "district": "金牛区",
	                                  "province": "成都市",
	                                  "town": "金牛坝"
	                                },
	                                "mobile": "1326443654",
	                                "name": "李刚",
	                                "phone": "057123222"
	                              },
	                              "shippingOption": {
	                                "code": "COD",
	                                "services": {
	                                  "SVC-COD": {
	                                    "value": "360"
	                                  }
	                                },
	                                "title": "面单测试"
	                              },
	                              "waybillCode": "9890000160004"
	                            }
	                        },
	                        //自定义区部分
	                        {
	                            templateURL : "http://cloudprint.cainiao.com/cloudprint/customArea/queryCustomAreaList4Top.json?custom_area_id=642230",
	                            data : {
	                                "item_name": "我是你要的商品芭比娃娃。。。",
	                            }
	                        }
	                    ]
	                }
	            ]
	        };
	    socket.send(JSON.stringify(request));
}
