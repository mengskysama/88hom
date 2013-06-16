<?php
require 'path.inc.php';

$type = getParameter("type");
if($type == ""){
	echo "203";
	return;
}

$vcode = getParameter("vcode");
if($vcode == ""){
	echo "202";
	return;
}
//echo $type."|".$vcode."|".$_SESSION['codeweb'];
if($type == "phone"){
	
	$userPhone = getParameter("userPhone");
	if($userPhone == ""){
		echo "203";
		return;
	}
	
	$userService = new UserService($db);
	$isValidCertCode = $userService->isValidCertCode($userPhone,$vcode);
	if($isValidCertCode){
		echo "200";
		return;
	}
}else if($type == "email" && $_SESSION['line_captcha'] == $vcode){
	echo "200";
	return;
}else if($type == "qw_email" && $_SESSION['codeweb'] == $vcode){
	echo "200";
	return;
}
echo "202";
?>