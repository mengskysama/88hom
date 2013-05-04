<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title>split</title>
<!--{$jsFiles}-->
<script type="text/javascript">
	$(document).ready(function(){
		var flag = true;
		$('#splitAnchor').click(function(){
			if(flag)
			{
				$('#frameset',window.top.document).attr('cols','0,9,*');
				$('#splitAnchor').attr('title','显示菜单');
				$('#splitAnchor').attr('src','<!--{$cfg.web_images}-->admin/expand.gif');
				flag = false;
			}
			else
			{
				$('#frameset',window.top.document).attr('cols','160,9,*');
				$('#splitAnchor').attr('title','隐藏菜单');
				$('#splitAnchor').attr('src','<!--{$cfg.web_images}-->admin/unexpand.gif');
				flag = true;
			}
		});
	});
</script>
</head>
<body style="overflow:hidden;margin:0px;padding:0px;text-align:left;" >
  <table width="10" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td style="background-image:url(<!--{$cfg.web_images}-->admin/x.gif);background-repeat:repeat-y;" width="10" valign="middle" class="bian1"><img  title="隐藏菜单" src="<!--{$cfg.web_images}-->admin/unexpand.gif"  id="splitAnchor"  style="cursor:pointer" /></td>
  </tr>
  </table>
</body>
</html>
