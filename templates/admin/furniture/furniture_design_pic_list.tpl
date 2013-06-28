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
			location.href='furniture_design_pic_manager.php';
		});
		<!--{if $picBuildId!=''}-->
		temp = 0;
		<!--{if $pictypeId != ''}-->
		temp = <!--{$pictypeId}-->
		<!--{/if}-->
		$.ajax({
			url:'furniture_design_pic_manager.php',
			data:{
					action:'getSubPicTypeJsonByParentId',
					id:<!--{$picBuildId}-->
				},
			dataType:'text',	
			success:function(result){
				data = eval(result);
				$('select[name="pictypeId"]').empty();
				<!--{if $pictypeId == ''}-->
				$('select[name="pictypeId"]').append('<option value="" selected="selected">选择小类</option>');
				<!--{/if}-->
				$.each(data,function(i,e){
					if(e.id == temp)
						$('select[name="pictypeId"]').append('<option selected="selected" value="'+e.id+'">'+e.text+'</option>');
					else
						$('select[name="pictypeId"]').append('<option value="'+e.id+'">'+e.text+'</option>');	
				});					
			}
		});
		<!--{/if}-->
		$('select[name="picBuildId"]').change(function(){
			$.ajax({
					url:'furniture_design_pic_manager.php',
					data:{
							action:'getSubPicTypeJsonByParentId',
							id:$(this).val()
						},
					dataType:'text',	
					success:function(result){
						data = eval(result);
						$('select[name="pictypeId"]').empty();
						$('select[name="pictypeId"]').append('<option value="" selected="selected">选择小类</option>');
						$.each(data,function(i,e){
							$('select[name="pictypeId"]').append('<option value="'+e.id+'">'+e.text+'</option>');
						});					
					}
				});
		});
	});
	function del(id){
		if(confirm('确认真的要删除吗？'))
			location.href='furniture_design_pic_manager.php?action=delete&id='+id;
	}

</script>
<style type="text/css">

</style>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">家居装修设计图片列表</div><div class="title"><a href="furniture_design_pic_manager.php?action=add">添加+</a></div>
</div>
<div style="float:left;width:100%;margin:10px 0px;">
	<form method="post" action="furniture_design_pic_manager.php">
	名称：<input name="picInfo" value="<!--{$picInfo}-->" class="input"/>  
	大类：<select name="picBuildId" >
			<!--{if $picBuildId==''}-->
			<option value="" selected="selected">选择大类</option>
			<!--{/if}-->
			<!--{foreach from=$cfg.arr_pic.furnitureDesignPicType item=item key=key}--> 
			<!--{if $picBuildId eq $key}-->
			<option value="<!--{$key}-->" selected="selected"><!--{$item}--></option>
			<!--{else}-->
			<option value="<!--{$key}-->"><!--{$item}--></option>
			<!--{/if}-->
			<!--{/foreach}-->
			</select>
	小类：<select name="pictypeId" >
				<option value="" selected="selected">选择小类</option>
				</select>
		<input type="button" value="查询" id="bnt"/>
		<input type="reset" value="重置" id="reset"/>		
	</form>					
</div>
<div style="float:Left;width:100%;margin:10px 0px;">
<!--{foreach from=$furnitureDesignPicList item=item key=key}--> 
		<span style="float:left;width:200px;margin:5px;">
			<a target="_blank" href="<!--{$cfg.web_url}-->uploads/<!--{$item.picUrl}-->"><img width="200" src="<!--{$cfg.web_url}-->uploads/<!--{$item.picThumb}-->"/></a><br />
			信息：<!--{$item.picInfo}--><br />
			大类：<!--{$cfg.arr_pic.furnitureDesignPicType[$item.picBuildId]}--><br />
			小类：<!--{$cfg.arr_pic.furnitureDesignPicSubType[$item.picBuildId][$item.pictypeId]}--><br />
			排序号：<!--{$item.picLayer}--><br />
			开启：<!--{if $item.picState eq 1}-->是<!--{else}-->否<!--{/if}--><br />
			操作：<a href="furniture_design_pic_manager.php?action=update&id=<!--{$item.picId}-->">修改</a> <a href="javascript:del(<!--{$item.picId}-->)">删除</a> 
		</span>
<!--{/foreach}-->
</div>
<!--{if $pageHtml !=''}-->
	<span class="pagingPanel">
			<!--{$pageHtml}-->
	</span>
<!--{/if}-->
</body>
</html>
