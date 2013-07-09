<?php
require 'path.inc.php';
require 'check_login.php';

$userPhone = !empty($_POST['userPhone']) ? $_POST['userPhone'] : "";
if($userPhone == ""){
	echo "203";
	return;
}
$userPhone = $_GET['userPhone'];
$certCode = rand(100000, 999999);
$userService = new UserService($db);
$result = $userService->saveCertCode($userPhone,$certCode);
if(!$result){
	echo "202";
	return;
}

$smsSender = new SMSSender();
$sent = $smsSender->send($userPhone, '您在房不剩房发布委托房源验证码是'.$certCode);
if($sent){
	echo "200";
	return;
}
echo "204";

?>