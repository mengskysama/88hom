<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#bnt').click(function(){
				$('form:first').submit();
		});
		$('#reset').click(function(){
			/*$('#infoTitle').val('');
			$('input[name="subType"]').removeAttr('checked');*/
			location.href='info_manager.php';
		});
		//初始化过虑的类别
		if('<!--{$infoType}-->' != ''){
			var infoType = '<!--{$infoType}-->'.split('-');
			for(var i=0;i<infoType.length;i++)
			$('input[value="'+infoType[i]+'"]').attr("checked","true"); 
		}
	});
	function del(id){
		if(confirm('确认真的要删除吗？'))
			location.href='info_manager.php?action=delete&id='+id;
	}

</script>
<style type="text/css">
input{
	vertical-align:middle;
}	
</style>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">信息列表</div><div class="title"><a href="info_manager.php?action=add">添加+</a></div>
</div>
<div style="float:left;width:100%;margin:0px 0px;">
	<form action="info_manager.php?action=search" method="post">
            <div style="float:Left;width:100%;">
 	            	<table cellspacing="0" cellpadding="0">
	            			<tr>
	            				<td colspan="2">
	            				标题：<input name="infoTitle" class="input" value="<!--{$infoTitle}-->"/> 推荐<input <!--{if $infoSuggest eq 1}-->checked="checked"<!--{/if}--> type="checkbox" value="1" name="infoSuggest"/><input style="margin-left:20px;" type="button" value="查询" id="bnt"/> <input id="reset" type="reset" value="重置"/>
	            				</td>
	            			</tr>
	            			<!--{foreach from=$cfg.arr_info.infoType item=item key=key}--> 
	            			<tr>
	            				<td width="100">
	            					<!--{$item.caption}-->
	            				</td>
	            				<td>
	            					<!--{foreach from=$item.subType item=item1 key=key1}-->
	            						<span style="float:left;margin-right:10px;height:15px;line-height:15px;"><input style="margin-right:2px;" type="checkbox" name="infoType[]" value="<!--{$key1}-->"/><label><!--{$item1}--></label></span>
	            					<!--{/foreach}-->
	            				</td>
	            			</tr>
	            			<!--{/foreach}-->
	            	</table>
			</div>	
	</form>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr align="center">
			<th width="21%">
				标题
			</th>
			<th width="20%">
				类别
			</th>
			<th width="7%">
				推荐
			</th>
			<th width="6%">
				序号
			</th>
			<th width="6%">
				点击
			</th>
			<th width="6%">
				开启
			</th>
			<th width="8%">
				最后更新
			</th>
			<th width="10%">
				更新时间
			</th>
			<th width="15%">
				操作
			</th>
		</tr>
		<!--{foreach from=$infoList item=item key=key}--> 
		<tr >
			<td>
				<!--{$item.info.infoTitle}-->
			</td>
			<td>
			<!--{foreach from=$item.infoType item=item1 key=key1}--> 
				<!--{$cfg.arr_info.infoType[$item1.infotypeId].subType[$item1.infotypeSubId]}--> |
			<!--{/foreach}-->	
			</td>
			<td align="center">
				<!--{if $item.info.infoSuggest eq 1}-->
				<font color="blue">是</font>
				<!--{else}-->
				否
				<!--{/if}--> 
			</td>
			<td align="center">
				<!--{$item.info.infoLayer}-->
			</td>
			<td align="right">
				<!--{$item.info.infoClickCount}-->
			</td>
			<td align="center">
				<!--{if $item.info.infoState eq 1}-->
				是
				<!--{else}-->
				否
				<!--{/if}--> 
			</td>
			<td >
				<!--{$item.info.userUsername}-->
			</td>
			<td align="center">
				<!--{$item.info.infoUpdateTime|date_format:'%Y-%m-%d %H:%M:%S'}-->
			</td>
			<td align="center">
				<a href="info_manager.php?action=detail&id=<!--{$item.info.infoId}-->">详细</a> 
				<a href="info_manager.php?action=update&id=<!--{$item.info.infoId}-->">修改</a> 
				<a href="javascript:del(<!--{$item.info.infoId}-->)">删除</a>
			</td>
		</tr>
		<!--{/foreach}-->
	</table>
	<!--{if $pageHtml !=''}-->
	<span class="pagingPanel">
			<!--{$pageHtml}-->
	</span>
	<!--{/if}-->
</body>
</html>
