<?php
require 'path.inc.php';
require 'UserRegister.class.php';

$userType = getParameter('userType');
$userName = getParameter('userName');
$userPassword = getParameter('userPassword');
$confirmUserPass = getParameter('confirmUserPass');
$userEmail = getParameter('userEmail');
$userPhone = getParameter('userPhone');
$phoneCert = getParameter('phoneCert');
$agreement = getParameter('agreement');

if($userType == 1){
	$register = new ShopRegister();
}else if($userType == 2){
	$register = new AgentRegister();
}else{
	$register = new UserRegister($db,$userName,$userPassword,$confirmUserPass,$userEmail,$userPhone,$phoneCert,$agreement);
}
$result = $register->register(); 
echo "result->".$result;
//header('Location: register_success.php');

function getParameter($param){
	return !empty($_POST[$param]) ? $_POST[$param] : "";
}
?>
