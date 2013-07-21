<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'v_email_check.tpl';

$msg_title = "";
$msg_subject = "";
$msg_content = "";

$userId = getParameter("UserID","GET");
$verifyCode = getParameter("VerifyCode","GET");
if($userId == "" || $verifyCode == ""){
	$msg_title = "验证失败";
	$msg_subject = "验证失败";
	$msg_content = "验证失败，请联系客服";
}else{

	$userService = new UserService($db);
	$user = $userService->verifyEmailReg($userId,$verifyCode);
	if($user){
		$msg_title = "验证成功";
		$msg_subject = "验证成功";
		$msg_content = "验证失败，请联系客服";
		$userType = $user['userType'];
		$param = $userType == 2 ? "?userType=2" : "";
		$msg_content = "验证成功，现在就<a href=\"index.php".$param."\"><span class=\"red\">登陆</span></a>房不剩房";
	}else{
		$msg_title = "验证失败";
		$msg_subject = "验证失败";
		$msg_content = "验证失败，请联系客服";
	}
}

$html->show();
$smarty->assign("msg_title",$msg_title);
$smarty->assign("msg_subject",$msg_subject);
$smarty->assign("msg_content",$msg_content);
$smarty->display($tpl_name);
?>