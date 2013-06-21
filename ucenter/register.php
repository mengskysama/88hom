<?php
require 'path.inc.php';
require 'check_login.php';
require 'UserRegister.class.php';
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
	$register = new UserRegister($db,$userName,$userPassword,$confirmUserPass,$userEmail,$userPhone,$phoneCert,$agreement);
}else if($userType == 2){
	$txtUserPhone = getParameter('txtUserPhone');
	$userRealName = getParameter('userRealName');
	$userTel = getParameter('userTel');
	$province = getParameter('userTel');
	$city = getParameter('userTel');
	$dist = getParameter('userTel');
	$register = new AgentRegister($db,$userName,$userPassword,$confirmUserPass,$userEmail,$txtUserPhone,$userRealName,$userTel,$agreement);
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
}
$result = $register->register(); 
$callback = "index.php";
if($result[0] == ERR_CODE_REGISTER_SUCCESS){
	if($userPhone != ""){
		$callback = "success_reg_mobile.php";
	}else if($userEmail != ""){
		$callback = "success_reg_email.php?email=".$userEmail;
	}else if($userType == 10 && $userName != ""){ //binding the existing account and QQ/Weibo account
		$callback = "userinfo.php";
	}
}else if($userType == 10){
	$_SESSION['err_msg_bind_account'] = $result[1];
	$callback = "bind_account.php";
}
header('Location: '.$callback);
?>
