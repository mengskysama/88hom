<?php
require 'path.inc.php';

$loginId = !empty($_POST['loginID']) ? $_POST['loginID'] : "";
$loginPwd = !empty($_POST['loginPWD']) ? $_POST['loginPWD'] : "";
$userType = !empty($_POST['userType']) ? $_POST['userType'] : "";

$userService = new UserService($db);
$user = $userService->loginUCenter($loginId);

if(empty($user) || ($user['userPassword'] != sysAuth($loginPwd))){
	echo "<script>alert('用户不存在！');</script>";	
	header("Location:index.php?userType=" + $userType);
}

$_SESSION["UCUser"] = $user;
$userType = $user['userType'];
if($userType == 3){
	header("Location:ucenter_user.php");
}
?>