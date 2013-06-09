<?php
require 'path.inc.php';
require 'check_login.php';

$tpl_name = $tpl_dir.'secure_reset_password.tpl';

$errCode = 0;
$errMsg = "";
if(isset($_POST['btn_confirm_reset'])){
	$oldPwd = getParameter("oldpass");
	$newPwd = getParameter("newpass");
	$newPwd1 = getParameter("newpass1");
	
	if($newPwd != $newPwd1){
		$errCode = 1;
		$errMsg = "两次输入的密码不一，修改密码失败";
	}else{
		$userPwd = $UCUser['userPassword'];
		if(sysAuth($userPwd,'DECODE') != $oldPwd){
			$errCode = 2;
			$errMsg = "密码不正确，修改密码失败";
		}
		if($errCode == 0){
			$userService = new UserService($db);
			$UCUser['userPassword'] = sysAuth($newPwd);
			$result = $userService->updateUser($UCUser);
			if($result>0){
				$errMsg = "修改密码成功";
			}else{
				$errMsg = "修改密码失败，请重试";
			}
		}		
	}
}

$html->addJs('ucenter_reset_password.js');
$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('errMsg',$errMsg);
$smarty->display($tpl_name);
?>