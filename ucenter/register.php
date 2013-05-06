<?php
require 'path.inc.php';

$userType = !empty($_POST['userType']) ? $_POST['userType'] : "";
if($userType == 1){
	$register = new ShopRegister();
}else if($userType == 2){
	$register = new AgentRegister();
}else{
	$register = new UserRegister();
}
$result = $register->register(); 
header('Location: register_success.php');
?>
