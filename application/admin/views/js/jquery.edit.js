$(document).ready(function(){
    var url = window.location.search;
    var params  = url.substr(1).split('&');
    var act = '';
    var op  = '';
    for(var j=0; j < params.length; j++)
    {
        var param = params[j];
        var arr   = param.split('=');
        if(arr[0] == 'act')
        {
            act = arr[1];
        }
        if(arr[0] == 'op')
        {
            sort = arr[1];
        }
    }
	//缁欓渶瑕佷慨鏀圭殑浣嶇疆娣诲姞淇敼琛屼负
	$('span[nc_type="inline_edit"]').click(function(){
		var s_value  = $(this).text();
		var s_name   = $(this).attr('fieldname');
		var s_id     = $(this).attr('fieldid');
		var req      = $(this).attr('required');
		var type     = $(this).attr('datatype');
		var max      = $(this).attr('maxvalue');
		var ajax_branch      = $(this).attr('ajax_branch');
		$('<input type="text">')
                        .attr({value:s_value})
                        .insertAfter($(this))
                        .focus()
                        .select()
                        .keyup(function(event){
                        if(event.keyCode == 13)
                        {
                            if(req)
                            {
                                if(!required($(this).attr('value'),s_value,$(this)))
                                {
                                    return;
                                }
                            }
                            if(type)
                            {
                                if(!check_type(type,$(this).attr('value'),s_value,$(this)))
                                {
                                    return;
                                }
                            }
                            if(max)
                            {
                                if(!check_max($(this).attr('value'),s_value,max,$(this)))
                                {
                                    return;
                                }
                            }
                            $(this).prev('span').show().text($(this).attr("value"));
							//branch ajax 鍒嗘敮
							//id 淇敼鍐呭绱㈠紩鏍囪瘑
							//column 淇敼瀛楁鍚�
							//value 淇敼鍐呭
                            $.get(phpname+'?act='+act+'&op=ajax',{branch:ajax_branch,id:s_id,column:s_name,value:$(this).attr('value')},function(data){
                                if(data === 'false')
                                {
                                    alert('鍚嶇О宸茬粡瀛樺湪锛岃鎮ㄦ崲涓€涓�');
                                    $('span[fieldname="'+s_name+'"][fieldid="'+s_id+'"]').text(s_value);
                                    return;
                                }
                            });
                            $(this).remove();
                        }
                    })
					.blur(function(){
					if(req)
					{
						if(!required($(this).attr('value'),s_value,$(this)))
						{
							return;
						}
					}
					if(type)
					{
						if(!check_type(type,$(this).attr('value'),s_value,$(this)))
						{
							return;
						}
					}
					if(max)
					{
						if(!check_max($(this).attr('value'),s_value,max,$(this)))
						{
							return;
						}
					}
					$(this).prev('span').show().text($(this).attr('value'));
					$.get(phpname+'?act='+act+'&op=ajax',{branch:ajax_branch,id:s_id,column:s_name,value:$(this).attr('value')},function(data){
						if(data === 'false')
							{
								alert('鍚嶇О宸茬粡瀛樺湪锛岃鎮ㄦ崲涓€涓�');
								$('span[fieldname="'+s_name+'"][fieldid="'+s_id+'"]').text(s_value);
								return;
							}
					});
					$(this).remove();
				});
		$(this).hide();
	});


		$('span[nc_type="inline_edit_textarea"]').click(function(){
		var s_value  = $(this).text();
		var s_name   = $(this).attr('fieldname');
		var s_id     = $(this).attr('fieldid');
		var req      = $(this).attr('required');
		var type     = $(this).attr('datatype');
		var max      = $(this).attr('maxvalue');
		var ajax_branch      = $(this).attr('ajax_branch_textarea');
		$('<textarea>')
                        .attr({value:s_value})
                        .appendTo($(this).parent())
                        .focus()
                        .select()
                        .keyup(function(event){
                        if(event.keyCode == 13)
                        {
                            if(req)
                            {
                                if(!required($(this).attr('value'),s_value,$(this)))
                                {
                                    return;
                                }
                            }
                            if(type)
                            {
                                if(!check_type(type,$(this).attr('value'),s_value,$(this)))
                                {
                                    return;
                                }
                            }
                            if(max)
                            {
                                if(!check_max($(this).attr('value'),s_value,max,$(this)))
                                {
                                    return;
                                }
                            }
                            $(this).prev('span').show().text($(this).attr("value"));
							//branch ajax 鍒嗘敮
							//id 淇敼鍐呭绱㈠紩鏍囪瘑
							//column 淇敼瀛楁鍚�
							//value 淇敼鍐呭
                            $.get(phpname+'?act='+act+'&op=ajax',{branch:ajax_branch,id:s_id,column:s_name,value:$(this).attr('value')},function(data){
                                if(data === 'false')
                                {
                                    alert('鍚嶇О宸茬粡瀛樺湪锛岃鎮ㄦ崲涓€涓�');
                                    $('span[fieldname="'+s_name+'"][fieldid="'+s_id+'"]').text(s_value);
                                    return;
                                }
                            });
                            $(this).remove();
                        }
                    })
					.blur(function(){
					if(req)
					{
						if(!required($(this).attr('value'),s_value,$(this)))
						{
							return;
						}
					}
					if(type)
					{
						if(!check_type(type,$(this).attr('value'),s_value,$(this)))
						{
							return;
						}
					}
					if(max)
					{
						if(!check_max($(this).attr('value'),s_value,max,$(this)))
						{
							return;
						}
					}
					$(this).prev('span').show().text($(this).attr('value'));
					$.get(phpname+'?act='+act+'&op=ajax',{branch:ajax_branch,id:s_id,column:s_name,value:$(this).attr('value')},function(data){
						if(data === 'false')
							{
								alert('鍚嶇О宸茬粡瀛樺湪锛岃鎮ㄦ崲涓€涓�');
								$('span[fieldname="'+s_name+'"][fieldid="'+s_id+'"]').text(s_value);
								return;
							}
					});
					$(this).remove();
				});
		$(this).hide();
	});

	//缁欓渶瑕佷慨鏀圭殑鍥剧墖娣诲姞寮傛淇敼琛屼负
	$('img[nc_type="inline_edit"]').click(function(){
		var i_id    = $(this).attr('fieldid');
		var i_name  = $(this).attr('fieldname');
		var i_src   = $(this).attr('src');
		var i_val   = ($(this).attr('fieldvalue'))== 0 ? 1 : 0;
		var ajax_branch      = $(this).attr('ajax_branch');

		$.get(phpname+'?act='+act+'&op=ajax',{branch:ajax_branch,id:i_id,column:i_name,value:i_val},function(data){
		if(data == 'true')
			{
				if(i_val == 0)
				{
					$('img[fieldid="'+i_id+'"][fieldname="'+i_name+'"]').attr({'src':i_src.replace('enabled','disabled'),'fieldvalue':i_val});
				}
				else
				{
					$('img[fieldid="'+i_id+'"][fieldname="'+i_name+'"]').attr({'src':i_src.replace('disabled','enabled'),'fieldvalue':i_val});
				}
			}
		});
	});

	$('a[nc_type="inline_edit"]').live('click', function() {
		var i_id    = $(this).attr('fieldid');
		var i_name  = $(this).attr('fieldname');
		var i_src   = $(this).attr('src');
		var i_val   = ($(this).attr('fieldvalue'))== 0 ? 1 : 0;
		var ajax_branch      = $(this).attr('ajax_branch');

		$.get(phpname+'?act='+act+'&op=ajax',{branch:ajax_branch,id:i_id,column:i_name,value:i_val},function(data){
		if(data == 'true')
			{
				if(i_val == 0){
					$('a[fieldid="'+i_id+'"][fieldname="'+i_name+'"]').attr({'class':('enabled','disabled'),'title':('寮€鍚�','鍏抽棴'),'fieldvalue':i_val});
				}else{
					$('a[fieldid="'+i_id+'"][fieldname="'+i_name+'"]').attr({'class':('disabled','enabled'),'title':('鍏抽棴','寮€鍚�'),'fieldvalue':i_val});
				}
			}else{
				alert('鍝嶅簲澶辫触');
			}
		});
	});
    //缁欐瘡涓彲缂栬緫鐨勫皬鍥剧墖鐨勭埗鍏冪礌娣诲姞鍙紪杈戞爣棰� $('img[nc_type="inline_edit"]').parent().attr('title','鍙紪杈�');

    //缁欏垪琛ㄦ湁鎺掑簭琛屼负鐨勫垪娣诲姞榧犳爣鎵嬪瀷鏁堟灉
    $('span[nc_type="order_by"]').hover(function(){$(this).css({cursor:'pointer'});},function(){});

});
//妫€鏌ユ彁浜ゅ唴瀹圭殑蹇呴』椤�
function required(str,s_value,jqobj)
{
	if(str == '')
	{
		jqobj.prev('span').show().text(s_value);
		jqobj.remove();
		alert('姝ら」涓嶈兘涓虹┖');
		return 0;
	}
return 1;
}
//妫€鏌ユ彁浜ゅ唴瀹圭殑绫诲瀷鏄惁鍚堟硶
function check_type(type, value, s_value, jqobj)
{
	if(type == 'number')
	{
		if(isNaN(value))
		{
		jqobj.prev('span').show().text(s_value);
		jqobj.remove();
		alert('姝ら」浠呰兘涓烘暟瀛�');
		return 0;
		}
	}
	if(type == 'int')
	{
		var regu = /^-{0,1}[0-9]{1,}$/;
		if(!regu.test(value))
		{
			jqobj.prev('span').show().text(s_value);
			jqobj.remove();
			alert('姝ら」浠呰兘涓烘暣鏁�');
			return 0;
		}
	}
	if(type == 'pint')
	{
		var regu = /^[0-9]+$/;
		if(!regu.test(value))
		{
			jqobj.prev('span').show().text(s_value);
			jqobj.remove();
			alert('姝ら」浠呰兘涓烘鏁存暟');
			return 0;
		}
	}
	if(type == 'zint')
	{
		var regu = /^[1-9]\d*$/;
		if(!regu.test(value))
		{
			jqobj.prev('span').show().text(s_value);
			jqobj.remove();
			alert('姝ら」浠呰兘涓烘鏁存暟');
			return 0;
		}
	}
		if(type == 'discount')
	{
		var regu = /[1-9]|0\.[1-9]|[1-9]\.[0-9]/;
		if(!regu.test(value))
		{
			jqobj.prev('span').show().text(s_value);
			jqobj.remove();
			alert('鍙兘鏄�0.1-9.9涔嬮棿鐨勬暟瀛�');
			return 0;
		}
	}
	return 1;
}
//妫€鏌ユ墍濉」鐨勬渶澶у€�
function check_max(str,s_value,max,jqobj)
{
	if(parseInt(str) > parseInt(max))
	{
		jqobj.prev('span').show().text(s_value);
		jqobj.remove();
		alert('姝ら」搴斿皬浜庣瓑浜�'+max);
		return 0;
	}
	return 1;
}


//鏂扮殑inline_edit璋冪敤鏂规硶
//javacript
//$('span[nc_type="class_sort"]').inline_edit({act: 'microshop',op: 'update_class_sort'});
//html
//<span nc_type="class_sort" column_id="<?php echo $val['class_id'];?>" title="<?php echo $lang['nc_editable'];?>" class="editable tooltip"><?php echo $val['class_sort'];?></span>
//php
//$result = array();
//$result['result'] = FALSE;/TURE
//$result['message'] = '閿欒';
//echo json_encode($result);

(function($) {
 $.fn.inline_edit= function(options) {
     var settings = $.extend({}, {open: false}, options);
     return this.each(function() {
         $(this).click(onClick);
     });

     function onClick() {
         var span = $(this);
         var old_value = $(this).html();
         var column_id = $(this).attr("column_id");
         var s_name   = $(this).attr('fieldname');
         $('<input type="text">')
         .insertAfter($(this))
         .focus()
         .select()
         .val(old_value)
         .blur(function(){
             var new_value = $(this).attr("value");
             if(new_value != '') {
                 $.get(phpname+'?act='+settings.act+'&op='+settings.op,{branch:s_name,id:column_id,value:new_value},function(data){
                     data = $.parseJSON(data);
                     if(data.result) {
                         span.show().text(new_value);
                     } else {
                         span.show().text(old_value);
                         if (typeof(data.message) != 'undefined') alert(data.message);
                     }
                 });
             } else {
                 span.show().text(old_value);
             }
             $(this).remove();
         })
         $(this).hide();
     }
}
})(jQuery);

(function($) {
 $.fn.inline_edit_confirm = function(options) {
     var settings = $.extend({}, {open: false}, options);
     return this.each(function() {
         $(this).click(onClick);
     });

     function onClick() {
         var $span = $(this);
         var old_value = $(this).text();
         var column_id = $(this).attr("column_id");
         var $input = $('<input type="text">');
         var $btn_submit = $('<a class="inline-edit-submit" href="JavaScript:;">纭</a>');
         var $btn_cancel = $('<a class="inline-edit-cancel" href="JavaScript:;">鍙栨秷</a>');
         var s_name   = $(this).attr('fieldname');

         $input.insertAfter($span).focus().select().val(old_value);
         $btn_submit.insertAfter($input);
         $btn_cancel.insertAfter($btn_submit);
         $span.hide();

         $btn_submit.click(function(){
             var new_value = $input.attr("value");
             if(new_value !== '' && new_value !== old_value) {
                 $.post(phpname+'?act=' + settings.act + '&op=' + settings.op, {branch:s_name,id:column_id, value:new_value}, function(data) {
                     data = $.parseJSON(data);
                     if(data.result) {
                         $span.text(new_value);
                     } else {
                         if (typeof(data.message) != 'undefined') alert(data.message);
                     }
                 });
             }
             show();
         });

         $btn_cancel.click(function() {
             show();
         });

         function show() {
             $span.show();
             $input.remove();
             $btn_submit.remove();
             $btn_cancel.remove();
         }
     }
};
})(jQuery);

