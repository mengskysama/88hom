<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'secure_reset_password.tpl';

$user = $_SESSION['UCUser'];
$userId = $user['userId'];
$userId = 3;
$userName = $user['userName'];

$errCode = 0;
if(isset($_POST['btn_confirm_reset'])){
	$oldPwd = getParameter("oldpass");
	$newPwd = getParameter("newpass");
	$newPwd1 = getParameter("newpass1");
	
	if($newPwd != $newPwd1){
		$errCode = 1;
	}
	$userPwd = $user["userPassword"];
	if($userPwd != sysAuth($oldPwd)){
		$errCode = 2;
	}
	if($errCode == 0){
		$userService = new UserService($db);
		$userService->updateUser($user);
	}else{
		header("Location:secure_reset_password_err.php");
	}
}

$html->addJs('ucenter_reset_password.js');
$html->show();

$smarty->assign('userName',$userName);
$smarty->display($tpl_name);
?>