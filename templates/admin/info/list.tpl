<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(function() {
	//��ȡ�����б���Ϣ
//	$.ajax({ 
//		type : "GET", 
//		async : false, 
//		cache : false,
//		url : "http://xinghe.lentor.net/api/news.asmx/NewsListB", 
//		data:"AuthCode='7f811343960162de'&PageSize=<!--{$pageSize}-->&PageIndex=<!--{$pageIndex}-->",
//		dataType : "jsonp", 
//		jsonp: "callback",
//		jsonpCallback:"ddddddd",
//		success : function(data){ 
//			var obj=jQuery.parseJSON(data.d);
//			var total=obj.TotalRecords;
//			var pageIndex=obj.PageIndex;
//			var pageSize=obj.PageSize;
//			//alert('total='+total+'pageIndex='+pageIndex+'pageSize='+pageSize);
//			getDivPage(total,pageSize,pageIndex);
//			var itemList=obj.items;
//			var html='';
//			for(var i=0;i<itemList.length;i++){
//				html += '<tr align="center">'+
//						'<td><a href="javascript:void(0);">'+itemList[i].NewsTitle+'</a></td>'+
//						'<td>'+itemList[i].AddTime+'</td>'+
//						'<td><a href="modify.php?nid='+itemList[i].ID+'">�޸�</a> <a href="javascript:exeAdminDelMessage(\'action.php?action=delById&pageIndex='+pageIndex+'&ids='+itemList[i].ID+'\');">ɾ��</a> </td>'+
//						'</tr>';
//			}
//			$('#title').after(html);
//		}, 
//		error:function(){ 
//			alert('fail'); 
//		} 
//	}); 
});
//function getDivPage(total,pageSize,pageIndex){
//	$.ajax({
//		type : 'get',
//		async : false, 
//		cache : false,
//		url : "action.php?action=ajaxDivPage", 
//		data:"total="+total+"&pageSize="+pageSize+"&pageIndex="+pageIndex,
//		dataType : "html",
//		success : function(data){ 
//			$('#pagingPanel').html(data);
//		}, 
//		error:function(){ 
//			alert('fail'); 
//		} 
//	});
//}
//function infoDeleteById(id){
//	var msg = confirm('��Ϣɾ�������ָܻ�����ȷ��!');
//	if (msg) {
//		$.ajax({ 
//			type : "GET", 
//			async : false, 
//			cache : false,
//			url : "http://xinghe.lentor.net/api/news.asmx/DeleteNews", 
//			data:"AuthCode='7f811343960162de_write'&ids="+id,
//			dataType : "jsonp", 
//			jsonp: "callback",
//			jsonpCallback:"ddddddd",
//			success : function(data){ 
//				alert(data);
//				var obj=jQuery.parseJSON(data);
//				if(obj.records>0){
//					alert('��Ϣɾ���ɹ�');
//				}else{
//					alert('��Ϣɾ��ʧ��');
//				}
//			}, 
//			error:function(){ 
//				alert('fail'); 
//			} 
//		}); 
//		document.location.reload();
//	}
//}
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">��Ϣ�б�</div>
</div>
<form name="listForm" action="action.php?action=Del" method="post">
	<table cellspacing="0" cellpadding="0" >
		<tr id='title'>
			<th width="20%">����</th>
			<th width="10%">ʱ��</th>
			<th width="15%">����</th>
		</tr>
		<!--{foreach from=$infoList key=key item=item}-->
		<tr align="center">
			<td><a href="javascript:void(0);"><!--{$item.NewsTitle}--></a></td>
			<td><!--{$item.AddTime}--></td>
			<td><a href="modify.php?nid=<!--{$item.ID}-->">�޸�</a> <a href="javascript:exeAdminDelMessage('action.php?action=delById&pageIndex=<!--{$pageIndex}-->&ids=<!--{$item.ID}-->');">ɾ��</a> </td>
		</tr>
		<!--{/foreach}-->
	</table>
	<span id="pagingPanel" class="pagingPanel">
		<!--{$divPage}-->
	</span>
</form>
</body>
</html>
