<?php
require 'path.inc.php';
require 'check_login.php';

$tpl_name = $tpl_dir.'secure_reset_password.tpl';

$errCode = 0;
if(isset($_POST['btn_confirm_reset'])){
	$oldPwd = getParameter("oldpass");
	$newPwd = getParameter("newpass");
	$newPwd1 = getParameter("newpass1");
	
	if($newPwd != $newPwd1){
		$errCode = 1;
	}
	$userPwd = $UCUser['userPassword'];
	if($userPwd != sysAuth($oldPwd)){
		$errCode = 2;
	}
	if($errCode == 0){
		$userService = new UserService($db);
		$UCUser['userPassword'] = $newPwd;
		$userService->updateUser($UCUser);
	}else{
		header("Location:secure_reset_password_err.php");
	}
}

$html->addJs('ucenter_reset_password.js');
$html->show();

$smarty->assign('userName',$userName);
$smarty->display($tpl_name);
?>