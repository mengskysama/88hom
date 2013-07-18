<?php
require 'path.inc.php';

$userPhone = !empty($_POST['userPhone']) ? $_POST['userPhone'] : "";
if($userPhone == ""){
	echo "203";
	return;
}

$mathcode = !empty($_POST['mathcode']) ? $_POST['mathcode'] : "";
if($mathcode == ""){
	echo "201";
	return;
}

if($mathcode != $_SESSION['line_captcha']){
	echo "205";
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
$sent = $smsSender->send($userPhone, '房不胜房注册码是'.$certCode);
//$sent = true;
if($sent){
	echo "200";
	return;
}
echo "204";

?>