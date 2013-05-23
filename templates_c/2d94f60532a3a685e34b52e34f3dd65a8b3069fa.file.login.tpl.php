<?php /* Smarty version Smarty-3.1.8, created on 2013-05-23 15:05:15
         compiled from "E:/workspace/projects/88hom/templates\admin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:238151836e774af136-74123074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d94f60532a3a685e34b52e34f3dd65a8b3069fa' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\admin\\login.tpl',
      1 => 1367804335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '238151836e774af136-74123074',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51836e7754ccb2_13635797',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51836e7754ccb2_13635797')) {function content_51836e7754ccb2_13635797($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
"/>
<title>后台登陆</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

<script type="text/javascript">
$(document).ready(function(){
	$('#username').focus();
});
</script>
</head>
<body class="bodyBg">
<div class="container">
<div class="loginTop"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
admin/loginTopLogoBg.gif"/></a></div>
<div class="loginBody">
  <div class="left"></div>
  <div class="right">
 	  <div class="sigin"></div>
      <form action="" onsubmit="return exeAdminLogin();" method="post">
          <div class="loginUser"><label>User:</label><input type="text" id="username" name="username"/></div>
          <div class="loginPasswd"><label>Password:</label><input type="password" id="password" name="password"/></div>
          <div class="loginValideCode"><label>ValideCode:</label><input type="text" id="vadideCode" name="vadideCode"/><img id="codeImg" onclick="this.src=this.src+'?op=login&'+Math.random()" src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_code_admin'];?>
"/></div>
          <div class="loginBnt">
            <input id="loginSubmit" type="submit" value="Login"/>
            <input id="loginReset" type="reset" value="Reset"/>
           </div>
      </form>
  </div>
</div>
<div class="loginFooter">Copyright&copy; <a href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['ecms_url'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['ecms_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['ecms_name'];?>
</a> all right reserved. </div>
</div>
</body>
</html>
<?php }} ?>