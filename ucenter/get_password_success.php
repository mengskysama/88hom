<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'get_password_success.tpl';

$err_code = 0;
$pass_channel = "";
$receive_mail = "";
$receive_mobile = "";

if(isset($_SESSION['get_pass_result'])){
	$get_pass_result = $_SESSION['get_pass_result'];
	$err_code = $get_pass_result['err_code'];
	$pass_channel = $get_pass_result['pass_channel'];
	$receive_mail = $get_pass_result['userEmail'];
	$receive_mobile = $get_pass_result['userPhone'];	
	unset($_SESSION['get_pass_result']);
	
	if($err_code == 1 && $pass_channel == 'mobile'){
		$receive_mobile = substr_replace($receive_mobile,'****',3,4);
	}
}

$html->show();
$smarty->assign('err_code',$err_code);
$smarty->assign('pass_channel',$pass_channel);
$smarty->assign('receive_mail',$receive_mail);
$smarty->assign('receive_mobile',$receive_mobile);
$smarty->display($tpl_name);
?>