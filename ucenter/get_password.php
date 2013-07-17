<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'get_password.tpl';

$aType = getParameter("aType");
if($aType == "getPwd"){
	$err_code = 0;
	$loginId = getParameter("loginId");
	$userService = new UserService($db);
	$user = $userService->checkUserByUserName($loginId);
	if(empty($user)){
		header("Location:get_password_success.php");
	}
	$userPassword = sysAuth($user['userPassword'],"DECODE");
	$content = "您的房不剩房账号".$loginId."的密码是".$userPassword."，请登录重设密码。";

	$result = false;
	$pass_channel = getParameter("pass_channel");	
	if($pass_channel == "mobile"){
		$userPhone = $user['userPhone'];
		$result = sendSMS($userPhone,$content);
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
		$result = $sendMail->send();
	}
	$err_code = ($result == 'true') ? 1 : 0;
	$get_pass_result['err_code'] = $err_code;
	$get_pass_result['pass_channel'] = $pass_channel;
	$get_pass_result['userPhone'] = $userPhone;
	$get_pass_result['userEmail'] = $userEmail;
	$_SESSION['get_pass_result'] = $get_pass_result;
	//echo $err_code.'|'.$pass_channel.'|'.$userPhone.'|'.$userEmail;
	header("Location:get_password_success.php");
}

$html->show();
$smarty->display($tpl_name);
?>