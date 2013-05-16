<?php
require 'path.inc.php';

if(!isset($_SESSION['UOpenID'])){
	header("Location:index.php");
	exit;
}

$userService = new UserService($db);
$user = $userService->getUserByUOpenID($_SESSION['UOpenID']);
if($user != ""){
	$_SESSION['UCUser'] = $user;
	$next_page = "";
}else{
	$next_page = "bind_account.php";
}
header("Location:".$nextPage);
?>