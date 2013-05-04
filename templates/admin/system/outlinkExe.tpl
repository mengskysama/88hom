<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title><!--{$cfg.web_page.title}--></title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
var second=10;
var timer;
function change(){
	second--;
	if(second>-1){
		$('#time').html(second);
		timer = setTimeout('change()',1000);
	}
	else{
		clearTimeout(timer);
	}
}
function ourl(){
	$('#status').attr('value','true');
	$('#releaseForm').submit();
}
function submit_(){
	var url=$.trim($('#url').val());
	if(null==url||url==''){
		alert('执行外链地址不能为空！');
		$('#url').focus();
		return false;
	}
	$('#status').attr('value','true');
	$('#page').attr('value',0);
	$('#releaseForm').submit();
}
function exe(){
	var url=$.trim($('#url').val());
	var status='<!--{$status}-->';
	if(status=='true'){
		timer = setTimeout('change()',1000); 
		setTimeout('ourl()',10000);
	}
}
function fuck(){
	var url=$.trim($('#url').val());
	var status='<!--{$status}-->';
	var listJson='<!--{$resultListJson}-->';
	var url=$.trim($('#url').val());
	var action='outlinkExeByUrl';
	if(status=='true'){
		var listObj=eval(listJson);
		for(var i=0;i<listObj.length;i++){
			exeAdminOutLinkByUrl(listObj[i].id,action,url);
		}
	}
}
$(document).ready(function(){
	exe();
	fuck();
});
</script>
</head>
<body class="main_content">
<div class="title_panel">
	<div class="title">网站外链管理</div>
</div>
<ul class="list_panel">
	<li><a href="outlink.php?type=outLinkManage">外链地址管理</a>|</li>
	<li><a href="outlink.php?type=exeLinkManage">执行地址管理</a>|</li>
	<li><a href="outlink.php?type=outLinkExe">外链地址执行</a></li>
</ul>
<div class="title_panel">
	<div class="title">网站外链地址执行</div>
</div>
<form name="releaseForm" id="releaseForm" method="get" action="outlink.php">
<input type="hidden" id="status" name="status" value="<!--{$status}-->" />
<input type="hidden" id="type" name="type" value="<!--{$type}-->" />
<input type="hidden" id="page" name="page" value="<!--{$page}-->" />
<table cellpadding="3" cellspacing="0" >
    <tr>
      <td>输入要刷外链的网址：http://<input name="url" id="url" value="<!--{$url}-->" type="text" style="width: 200px;" maxlength="255"></input><input type="button" value="开始" onclick="submit_();"/></td>
    </tr>
</table>
<div id="exeShow" style="display: <!--{$divExeShow}-->">
  <table cellpadding="3" cellspacing="0" >
    <caption>请不要关闭页面,<span id="time">10</span>秒后跳到下一页！</caption>
    <tr>
      <td width="10%">ID</td>
      <td width="80%">外链地址</td>
      <td width="10%">执行结果</td>
    </tr>
    <!--{foreach from=$resultList item=item key=key}-->
    <tr>
      <td><!--{$item.id}--></td>
      <td><!--{$item.url}--></td>
      <td><span id="<!--{$item.id}-->"><img src="<!--{$cfg.web_images}-->admin/loading.gif" /></span></td>
    </tr>
    <!--{/foreach}-->
  </table>
</div>
<div id="contentShow" style="display: <!--{$divContentShow}-->">
  <table cellpadding="3" cellspacing="0" >
    <caption><font color="red" size="4"><b>刷超级外链的好处</b></font></caption>
    <tr>
      <td>超级外链快速增加网站外链的原理: 超级外链由本站精心收集了数个ip查询 Alexa排名查询，pr查询等站长常用查询网站，由于这些网站大多有查询记录显示功能，而且查询记录可以被百度，谷歌，搜狗等搜索引擎快速收录，这样就形成了外链。经过长时间观察发现这种外链有很大一部分还是比较稳定，所以可以用来进行seo利用，因为这是正常的查询产生的外链，所以这种外链对SEO效果还是很明显的！把复杂的友情链接交换过程交给电脑，交给批量而自动化的外链工具，节省我们的时间、健康、人力、金钱和脑细胞。现在开始，体验和享受功能强大、轻松便捷而免费的网站推广过程吧。根据最新的科学艺术预测：现如今人类的一切重复性劳动，在未来都可以被机器和工具替代，人可以腾出手来，从事自己喜爱的创造性的事情。就让我们先行一步吧，把网站的宣传推广工作交由机器来完成。 </td>
    </tr>
  </table>
</div>
</form>
</body>
</html>
