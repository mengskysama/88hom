<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'secure_reset_mobile.tpl';

$errMsg = "";
$oldUserPhone = $UCUser['userPhone'];
if(isset($_POST['userPhone'])){
	
	$userPhone = getParameter("userPhone");	
	$vcode = getParameter("phoneCert");	
	
	$userService = new UserService($db);
	$user = $userService->getUserByUserPhone($userPhone);
	if(!empty($user)){
		$errMsg = "该手机已被绑定，请重新输入";
	}else{
		$isValidCertCode = $userService->isValidCertCode($userPhone,$vcode);
		if(!$isValidCertCode){
			$errMsg = "手机验证码不正确，请重新输入";
		}else{		
			$UCUser['userPhone'] = $userPhone;
			$result = $userService->updateUser($UCUser);
			if($result>0){
				$_SESSION['UCUser'] = $UCUser;
				$oldUserPhone = $userPhone;
				//deactive the verify code
				$userService->deactiveCertCode($userPhone,$vcode);
				$errMsg = "验证手机成功";
			}else{
				$errMsg = "验证手机失败，请重试";
			}
		}
	}
}
$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('oldUserPhone',$oldUserPhone);
$smarty->assign('errMsg',$errMsg);
$smarty->display($tpl_name);
?>
