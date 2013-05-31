<?php
require 'path.inc.php';
require 'UserRegister.class.php';

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
}
$result = $register->register(); 
$callback = "index.php";
if($result[0] == ERR_CODE_REGISTER_SUCCESS){
	if($userPhone != ""){
		$callback = "success_reg_mobile.php";
	}else if($userEmail != ""){
		$callback = "success_reg_email.php?email=".$userEmail;
	}
}
header('Location: '.$callback);
?>
