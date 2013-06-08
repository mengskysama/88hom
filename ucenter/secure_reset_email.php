<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'secure_reset_email.tpl';

$errMsg = "";
$oldUserEmail = $UCUser['userEmail'];
$userEmail = getParameter("userEmail");	
if(isset($userEmail)){
	
	
	$userService = new UserService($db);
	$user = $userService->getUserByUserEmail($userEmail);
	if(!empty($user)){
		$errMsg = "该邮箱已被绑定，请重新输入";
	}else{
		$UCUser['userEmail'] = $userEmail;
		$result = $userService->updateUser($UCUser);
		if($result>0){
			$errMsg = "修改邮箱成功";
		}else{
			$errMsg = "修改邮箱失败，请重试";
		}
	}
}

$html->addJs('ucenter_register.js');
$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('oldUserEmail',$oldUserEmail);
$smarty->assign('errMsg',$errMsg);
$smarty->display($tpl_name);
?>
