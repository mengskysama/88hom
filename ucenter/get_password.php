<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'get_password.tpl';

$aType = getParameter("aType");
if($aType == "getPwd"){
	$loginId = getParameter("loginId");
	$userService = new UserService($db);
	$user = $userService->getUserByUserName($loginId);
	if(empty($user)){
		header("Location:get_password_success.php");
	}
	$userPassword = sysAuth($user['userPassword'],"DECODE");
	$content = "您的房不剩房账号".$loginId."的密码是".$userPassword."，请登录重设密码。";

	$pass_channel = getParameter("pass_channel");	
	if($pass_channel == "mobile"){
		$userPhone = $user['userPhone'];
		sendSMS($userPhone,$content);
	}else if($pass_channel == "email"){
		$userEmail = $user['userEmail'];
		$sendMail = new SendMail();
		$sendMail->mailer = ECMS_MAIL_MAILER;
		$sendMail->SMTPAuth = true;
		$sendMail->isHTML(true);
		$sendMail->host = ECMS_MAIL_HOST;
		$sendMail->from = ECMS_MAIL_USERNAME;
		$sendMail->fromName = ECMS_MAIL_USERNAME;
		$sendMail->sender = ECMS_MAIL_USERNAME;
		$sendMail->username = ECMS_MAIL_USERNAME;
		$sendMail->password = ECMS_MAIL_PASSWORD;
		$sendMail->addAddress($userEmail);
		
		$sendMail->subject = "房不剩房密码取回邮件";
		$sendMail->body = $content;
		$sendMail->SMTPDebug =false;
		$sendMail->send();
	}
	header("Location:get_password_success.php");
}

$html->show();
$smarty->display($tpl_name);
?>