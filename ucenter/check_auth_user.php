<?php
if(!isset($_SESSION['UCUserDetail']) && !isset($_SESSION['UCUser'])){
	header("location: index.php");
}

$userType = $_SESSION['UCUser']['userType'];
$userPhone = $_SESSION['UCUser']['userPhone'];
$userPhoneState = $_SESSION['UCUser']['userPhoneState'];
$userdetailState = $_SESSION['UCUserDetail']['userdetailState'];
//echo $userType.'|'.$userdetailState;return;
if($userType == 3 && $userdetailState != 2){
	header("location: auth_user.php");
}else if($userType == 2 && $userdetailState != 2){
	header("location: auth_agent_idcard.php");
}
?>