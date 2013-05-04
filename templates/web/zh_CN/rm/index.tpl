<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<meta name="keywords" content="<!--{$cfg.web_page.keyword}-->" />
<meta name="description" content="<!--{$cfg.web_page.description}-->" />
<title><!--{$cfg.web_page.title}--></title> 
<!--{$cssFiles}-->
<!--{$jsFiles}-->
<script type="text/javascript">
$(document).ready(function() {
	switchNavigation('a_6');
	$('.list').hover(function(){ 
	    $(this).addClass('level0');
	},function(){ 
	    $(this).removeClass('level0'); 
	});
	$('.list').click(function(){
		if($('#detail_'+$(this).attr('val')).is(":visible"))
	$('#detail_'+$(this).attr('val')).hide();
	else
	$('#detail_'+$(this).attr('val')).show();
	});
});	
</script>
</head>
<body>
<!-- ͷ�� -->
<!--{include file="header.tpl"}-->
<!-- ͷ�� -->
<div class="pic jobs_pic"></div>
<div class="body_wrap">
	<div class="body_wrap_inner">
		<div class="left">
			<div class="a">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t24.jpg"/>
			</div>
			<ul>
				<!--{$nav}-->
			</ul>
			<div class="b">
				<img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t17.jpg"/>
			</div>
		</div>
		<div class="right">
			<div class="location">
				<span class="a"><img src="<!--{$cfg.web_images}-->web/<!--{$LANG.common_lang_type}-->/t23.jpg"/></span>
				<span class="b">
					<!--{$location}-->
				</span>
			</div>
			<div class="content">
				<!--{if $typeId==0}-->
				<div style="float:left;width:768px;text-indent:25px;line-height:25px;color:#655858;">
					    ����ְλ��Ϣ�����л�Ӣ������������Ƹ��ǰ�����ǡ�����Ӣ�ŵ���վ�������������������վ��ע���˻��ͼ�����������Ӧ��վͶ�ݼ������ɣ������ڴ˴��ظ�Ͷ�ݣ��Խ�Լ����ʱ�䡣
				</div>
				<table class="jobs_tbl" cellspacing="0" cellpadding="0">
					<tr>
						<th>��Ƹְλ</th><th>��Ƹ����</th><th>�����ص�</th><th>��Ƹ����</th><th>��������</th>
					</tr>
					<!--{foreach from=$infoList key=key item=item}-->
					<tr class="list" val="<!--{$key}-->">
						<td><!--{$item.typeName}--></td>
						<td><!--{$item.dept}--></td>
						<td><!--{$item.address}--></td>
						<td><!--{$item.persons}--></td>
						<td><!--{$item.update_time|date_format:"%Y-%m-%d"}--></td>
					</tr>
					<tr class="list_detail" id="detail_<!--{$key}-->">
						<td>����</td>
						<td colspan="4">
							<!--{$item.text_content}-->
						</td>
					</tr>
					<!--{/foreach}-->
				</table>
				<!--{else}-->
					<!--{$infoDetail.text_content}-->
				<!--{/if}-->
			</div>
		</div>
	</div>
</div>
<!-- �Ų� -->
<!--{include file="footer.tpl"}-->
<!-- �Ų� -->
</body>
</html>