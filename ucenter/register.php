<?php
require 'path.inc.php';
require 'UserRegister.class.php';
require 'AgentRegister.class.php';
require 'BindAccountRegister.class.php';

$userType = getParameter('userType');
$userName = getParameter('userName');
$userPassword = getParameter('userPassword');
$confirmUserPass = getParameter('confirmUserPass');
$userEmail = getParameter('userEmail');
$agreement = getParameter('agree_ucenter');

if($userType == 3){
	$userPhone = getParameter('userPhone');
	$phoneCert = getParameter('phoneCert');
	$userRealName = getParameter('userRealName');
	$register = new UserRegister($db,$userName,$userPassword,$confirmUserPass,$userRealName,$userEmail,$userPhone,$phoneCert,$agreement);
}else if($userType == 2){
	$userPhone = getParameter('userPhone');
	$phoneCert = getParameter('phoneCert');
	$userRealName = getParameter('userRealName');
	$userTel = getParameter('userTel');
	$areaIndex = getParameter('areaIndex');
	
	$register = new AgentRegister($db,$userName,$userPassword,$confirmUserPass,$userEmail,$userPhone,$phoneCert,$userRealName,$areaIndex,$userTel,$agreement);
}else if($userType == 10){
	if(!isset($_SESSION['QW_USER'])){
		header("location:index.php");
	}

	$qw_user = $_SESSION['QW_USER'];
	$userPhone = getParameter('userPhone');
	$phoneCert = getParameter('phoneCert');
	$reg_mobile_agree_ucenter = getParameter('reg_mobile_agree_ucenter');
	$reg_email_agree_ucenter = getParameter('reg_email_agree_ucenter');
	$qwAgreement = ($reg_mobile_agree_ucenter == "") ? ($reg_email_agree_ucenter == "" ? "" : $reg_email_agree_ucenter) : $reg_mobile_agree_ucenter;
	//echo $userName.'|'.$userPassword;
	//return ;
	$register = new BindAccountRegister($db, $userName, $userPassword, $userEmail, $userPhone, $phoneCert, $qwAgreement, $qw_user);
}else if($userType == 20){
	//auth user
	$userId = getParameter("userId");
	$userPhone = getParameter('userPhone');
	$userService = new UserService($db);
	$authResult = false;
	$user['userId'] = $userId;
	if($userPhone != ""){
		$phoneCert = getParameter('phoneCert');
		$userRealName = getParameter('userRealName');
		$user['userPhone'] = $userPhone;
		$user['phoneCert'] = $phoneCert;
		$user['userPhoneState'] = 1;
		$user['userdetailState'] = 2;
		$user['userdetailName'] = $userRealName;
		$authResult = $userService->authUser($user);
		$taret_page = "success_auth_user_phone.php";
	}else if($userEmail != ""){
		$user['userEmail'] = $userEmail;
		$authResult = $userService->authUser($user);
		$taret_page = "success_reg_email.php?email=".$userEmail;
	}
	if($authResult){
		$_SESSION['UCUserDetail']['userdetailState'] = 2;
		header('Location: '.$taret_page);
	}else{
		$_SESSION['err_msg_auth_user'] = "认证失败，请重试";
		header('Location: auth_user.php');
	}
}
$result = $register->register(); 
$callback = "index.php";
if($result[0] == ERR_CODE_REGISTER_SUCCESS){
	//echo $userType.'|'.$userEmail.'|'.$userPhone.'<br/>';
	if($userType == 3 && $userPhone != ""){
		$callback = "success_reg_mobile.php?userType=".$userType;
	}else if($userType == 3 && $userEmail != ""){
		$callback = "success_reg_email.php?email=".$userEmail;
	}else if($userType == 10){ //binding the existing account and QQ/Weibo account
		$callback = "userinfo.php";
	}else if($userType == 2){
		$callback = "success_reg_mobile.php?userType=2";
	}
}else if($userType == 10){
	$_SESSION['err_msg_bind_account'] = $result[1];
	$callback = "bind_account.php";
}else{
	$_SESSION['ERR_MSG_FAIL_TO_REG'] = $result[1];
	$callback = "fail_reg.php?userType=".$userType;
}
/*
print_r($result);
echo "<br>";
echo $callback;
*/
header('Location: '.$callback);
?>
