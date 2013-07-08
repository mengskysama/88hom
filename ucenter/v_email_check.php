<?php
require 'path.inc.php';

$userId = getParameter("UserID","GET");
$verifyCode = getParameter("VerifyCode","GET");
if($userId == "" || $verifyCode == ""){
	echo "验证失败，请重新注册";
	return;
}

$userService = new UserService($db);
$user = $userService->verifyEmailReg($userId,$verifyCode);
if($user){
	$userType = $user['userType'];
	$param = $userType == 2 ? "?userType=2" : "";
	echo "验证成功，现在就<a href=\"index.php".$param."\">登陆房不剩房</a>";
}else{
	echo "验证失败，请联系客服";
}
?>