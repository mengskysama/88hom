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
			location.href='info_manager.php?action=update&id=<!--{$info.infoId}-->';
		});
		$('#return').click(function(){
			location.href='info_manager.php';
		});
	});

</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">信息详细</div>
</div>
	<table cellspacing="0" cellpadding="0" >
		<tr><td width="100">标题：</td><td><!--{$info.infoTitle}--></td></tr>
		<tr><td width="100">类别：</td>
		<td> 
			<!--{foreach from=$infoTypeList item=item key=key}--> 
				<!--{$cfg.arr_info.infoType[$item.infotypeId].subType[$item.infotypeSubId]}-->|
			<!--{/foreach}-->
		</td>
		</tr>
		<tr><td width="100">外观图：</td>
			<td>
				<!--{if $info.infoPicThumb != '' }-->
					<img src="<!--{$cfg.web_url}-->uploads/<!--{$info.infoPicThumb}-->"/>
				<!--{/if}-->
			</td>
		</tr>
		<tr ><td width="100">信息来源：</td><td><!--{$info.infoSource}--></td></tr>
		<tr ><td width="100">信息摘要：</td><td><!--{$info.infoSummary}--></td></tr>
		<tr ><td width="100">信息详细：</td><td><!--{$info.infoContent}--></td></tr>
		<tr ><td width="100">控制设置：</td>
			<td>
				开启：<!--{if $info.infoState eq 1 }-->
						是
					  <!--{else}-->
					  	否		
					  <!--{/if}-->
				推荐：<!--{if $info.infoSuggest eq 1 }-->
						是
					  <!--{else}-->
					  	否		
					  <!--{/if}-->
				排序号：<!--{$info.infoLayer}-->
			</td>
		</tr>
		<tr ><td colspan="2" align="center"><input type="button" value="修改" id="bnt"/> <input type="button" value="返回" id="return"/></td></tr>
	</table>
</body>
</html>
