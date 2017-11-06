<?php
/* Smarty version 3.1.29, created on 2017-08-04 10:36:07
  from "D:\www\yunjuke\application\pay\views\account_details.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5983dd9784cfd8_77259084',
  'file_dependency' => 
  array (
    '25ca096062aff5045041de065f414b1ecbae53f1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\account_details.html',
      1 => 1501814154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
    'file:common_list_page.html' => 1,
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_5983dd9784cfd8_77259084 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '149045983dd9773f711_31843298';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
	dt.tit {
		width: 100px !important;
		padding-right: 2px !important;
		font-size:14px !important;
	}
	.ncap-form-default dl.row{
		padding:4px 0 !important;
	}
	.input-text{
		width:150px ;
		height:30px !important;
	}
	.mDiv h5{
		display: inline !important;
	}
	.ncap-form-default dd.opt {
		text-align: left;
		width: 20%;
	}
	.ncap-form-default dd.opt1 {
		text-align: left;
		width: 80%;
	}
	.ncap-form-default dd.opt2 {
		text-align: left;
		min-width: 155px !important;
	}
	dl.row1{
		float:left;
		width:30%;
	}
	dl.row2{
		float:left;
		width:40% !important;
	}
	span.check{
		padding:0 4px;
		border-left:1px solid #ccc;
		border-bottom:1px solid #ccc;
		border-top:1px solid #ccc;
		display:inline-block;
		height:28px;
		line-height:28px;
	}
	span.check_box{
		display:inline-block;
		height:30px;
		cursor:pointer;
		border-right:1px solid #ccc;
	}
	span.current{
		background-color:#ccc;
	}

</style>
	<body style="background-color: #FFF; overflow: auto;">
	<div class="page">
	<div class="fixed-bar">
		<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 账户管理 <span class="c-gray en">&gt;</span> 收支明细 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	</div>
				<div class="wrapper wrapper-content animated" style="min-height: 400px;">
					<form id="formSearch" action="" method="post">
					<div class="form-inline">
					  <div class="form-group">时间：
					  <input type="text" onclick="laydate()" id="datemin" class="input-text Wdate" name="datemin" style="width:150px;">
							至
							<input type="text" onclick="laydate()" id="datemax" class="input-text Wdate" name="datemax" style="width:150px;">
							<a class="btn btn-info btn-sm btn-warning radius r" id="serachInfo" style="margin-left: 10px;">搜索</a>
					  </div>

					</div>
					</form>

					<div class="">
						<table class="table table-border table-bordered table-hover table-bg table-content mt-20">
							<thead>
							<tr>
								<th scope="col" colspan="13">收支明细</th>
							</tr>
							<tr class="text-c">
								<th>流水号</th>
								<th>交易类型</th>
								<th>账户支出</th>
								<th>账户收入</th>
								<th>余额</th>
								<th style="width: 400px">备注</th>
								<th>发生时间</th>
							</tr>

							</thead>
							<tbody>
							<tr>
								<td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="flexigrid">
						<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common_list_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

					</div>

				</div>

	</div>
		<!--<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
-->
		<?php echo '<script'; ?>
 type="text/javascript">
			$(function () {
                var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
                $(".select2").select2();
                $('#serachInfo').click(function(){
                    load_page_to(url);
                });
                load_page(url);
            })


		/*	var idTmr;
        function  getExplorer() {  
            var explorer = window.navigator.userAgent ;  
            //ie  
            if (explorer.indexOf("MSIE") >= 0) {  
                return 'ie';  
            }  
            //firefox  
            else if (explorer.indexOf("Firefox") >= 0) {  
                return 'Firefox';  
            }  
            //Chrome  
            else if(explorer.indexOf("Chrome") >= 0){  
                return 'Chrome';  
            }  
            //Opera  
            else if(explorer.indexOf("Opera") >= 0){  
                return 'Opera';  
            }  
            //Safari  
            else if(explorer.indexOf("Safari") >= 0){  
                return 'Safari';  
            }  
        }  
        function method5(tableid) {  
            if(getExplorer()=='ie')  
            {  
                var curTbl = document.getElementById(tableid);  
                var oXL = new ActiveXObject("Excel.Application");  
                var oWB = oXL.Workbooks.Add();  
                var xlsheet = oWB.Worksheets(1);  
                var sel = document.body.createTextRange();  
                sel.moveToElementText(curTbl);  
                sel.select();  
                sel.execCommand("Copy");  
                xlsheet.Paste();  
                oXL.Visible = true;  
  
                try {  
                    var fname = oXL.Application.GetSaveAsFilename("Excel.xls", "Excel Spreadsheets (*.xls), *.xls");  
                } catch (e) {  
                    print("Nested catch caught " + e);  
                } finally {  
                    oWB.SaveAs(fname);  
                    oWB.Close(savechanges = false);  
                    oXL.Quit();  
                    oXL = null;  
                    idTmr = window.setInterval("Cleanup();", 1);  
                }  
  
            }  
            else  
            {  
                tableToExcel(tableid)  
            }  
        }  
        function Cleanup() {  
            window.clearInterval(idTmr);  
            CollectGarbage();  
        }  
        var tableToExcel = (function() {  
            var uri = 'data:application/vnd.ms-excel;base64,',  
                    template = '<html><head><meta charset="UTF-8"></head><body><table>{table}</table></body></html>',  
                    base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) },  
                    format = function(s, c) {  
                        return s.replace(/{(\w+)}/g,  
                                function(m, p) { return c[p]; }) }  
            return function(table, name) {  
                if (!table.nodeType) table = document.getElementById(table)  
                var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}  
                window.location.href = uri + base64(format(template, ctx))  
            }  
        })()  */

        // 搜索
   /* $('#serachInfo').click(function(){
        var start=$("#datemin").val();
        var end=$("#datemax").val();
        $.ajax({
            type: "post",
            url: "accountDetails?op=search",
            data: {start:start,end:end},
            dataType: "json",
            success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state){
                    pages = total_page;
                    curr = page;
                    page_curr(pages,curr);
                }

            }
        })
    });*/


		<?php echo '</script'; ?>
>

	<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
	</body>
</html><?php }
}
