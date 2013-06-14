<?php
require 'path.inc.php';

if(!isset($_SESSION['QW_USER'])){
	header("Location:index.php");
	exit;
}

$qw_user = $_SESSION['QW_USER'];
$userService = new UserService($db);
$user = $userService->getUserByUOpenID($qw_user['openID']);
if($user != ""){
	$_SESSION['UCUser'] = $user;
	$dist_page = "ucenter_user.php";
}else{
	$dist_page = "bind_account.php";
}
header("Location:".$dist_page);
?>