<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
	$(document).ready(function(){

	});
	
	function pass(infoId,id){
		if(confirm('确认真的要通过审核吗？'))
			location.href='infoReply_manager.php?action=pass&state=0&infoId='+infoId+'&id='+id;
	}
	function del(infoId,id,state){
		if(confirm('确认真的要删除吗？'))
			location.href='infoReply_manager.php?action=delete&infoId='+infoId+'&id='+id+'&state='+state;
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
	<div class="title">信息回复<!--{if $state==0}-->等审<!--{else}-->已审<!--{/if}-->列表</div>
</div>
<div style="float:left;width:100%;margin:5px 0px;text-align:center;font-size:16px;">
	<!--{$info.infoTitle}--> >><a href="info_manager.php?action=detail&id=<!--{$info.infoId}-->">详细</a> <a href="info_manager.php">返回资讯列表</a> 
</div>
	<table cellspacing="0" cellpadding="0" >
		
		<!--{foreach from=$infoReplyList item=item key=key}--> 
		<tr >
			<td>
				<table cellspacing="0" cellpadding="0" >
					<tr >
						<td rowspan="3" width="65">
							<!--{if $item.userdetailPicThumb !=''}-->
								<img width="65" height="65" src="<!--{$cfg.web_url_upload}--><!--{$item.infoPicThumb}-->"/>
							<!--{else}-->
								<img src="<!--{$cfg.web_images}-->web/testing/tx.gif" width="65" height="65" />
							<!--{/if}-->
						</td>
						<td >
							用户名：<!--{$item.userUsername}-->
							<!--{if $item.userUsername != ''}-->(<!--{$item.userdetailName}-->)<!--{/if}-->
						</td>
						
						<td align="center" rowspan="3" width="100">
							<!--{if $state==0}-->
							<a href="javascript:pass(<!--{$info.infoId}-->,<!--{$item.inforeplyId}-->)">通过审核</a> 
							<!--{/if}-->
							<a href="javascript:del(<!--{$info.infoId}-->,<!--{$item.inforeplyId}-->,<!--{$state}-->)">删除</a><br />
						</td>
					</tr>
					<tr >
						
						<td >
							<!--{$item.inforeplyContent}-->
							
						</td>
						
						
					</tr>
					<tr >
						
						<td >
							回复时间：<!--{$item.inforeplyCreateTime}-->
						</td>
						
					</tr>
				</table>
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
