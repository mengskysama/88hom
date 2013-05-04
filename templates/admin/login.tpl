<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<title>后台登陆</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
<script type="text/javascript">
$(document).ready(function(){
	$('#username').focus();
});
</script>
</head>
<body class="bodyBg">
<div class="container">
<div class="loginTop"><img src="<!--{$cfg.web_images}-->admin/loginTopLogoBg.gif"/></a></div>
<div class="loginBody">
  <div class="left"></div>
  <div class="right">
 	  <div class="sigin"></div>
      <form action="" onsubmit="return exeAdminLogin();" method="post">
          <div class="loginUser"><label>User:</label><input type="text" id="username" name="username"/></div>
          <div class="loginPasswd"><label>Password:</label><input type="password" id="password" name="password"/></div>
          <div class="loginValideCode"><label>ValideCode:</label><input type="text" id="vadideCode" name="vadideCode"/><img id="codeImg" onclick="this.src=this.src+'?op=login&'+Math.random()" src="<!--{$cfg.web_code_admin}-->"/></div>
          <div class="loginBnt">
            <input id="loginSubmit" type="submit" value="Login"/>
            <input id="loginReset" type="reset" value="Reset"/>
           </div>
      </form>
  </div>
</div>
<div class="loginFooter">Copyright&copy; <a href="<!--{$cfg.ecms_url}-->" target="_blank" title="<!--{$cfg.ecms_name}-->"><!--{$cfg.ecms_name}--></a> all right reserved. </div>
</div>
</body>
</html>
