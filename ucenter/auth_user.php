<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'auth_user.tpl';
$html->addJs("ucenter_register_qw.js");
$html->show();

$err_msg_auth_user = "";
if(isset($_SESSION['err_msg_auth_user'])){
	$err_msg_auth_user = $_SESSION['err_msg_auth_user'];
}
$smarty->assign("err_msg_auth_user",$err_msg_auth_user);
$smarty->assign("userId",$userId);
$smarty->display($tpl_name);
?>