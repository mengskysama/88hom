<?php
require 'path.inc.php';
require 'check_login.php';

$userPhone = getParameter("userPhone");
if($userPhone == ""){
	echo "203";
	return;
}

$certCode = rand(100000, 999999);
$userService = new UserService($db);
$result = $userService->saveCertCode($userPhone,$certCode);
if(!$result){
	echo "202";
	return;
}

$smsSender = new SMSSender();
$sent = $smsSender->send($userPhone, '为了确认这是来自您本人的真实信息，请输入手机验证码：'.$certCode.'，24小时内有效哦。【房不剩房】');
//$sent = true;
if($sent){
	echo "200";
	return;
}
echo "204";

?>