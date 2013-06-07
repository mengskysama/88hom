<?php
require 'path.inc.php';

$userName = !empty($_POST['userName']) ? $_POST['userName'] : "";
if($userName == ""){
	echo "203|invalid account";
	return;
}

$userService = new UserService($db);
$user = $userService->getUserByUserName($userName);
if(empty($user)){
	echo "200|no account found";
	return;
}

$userPhone = $user['userPhone'];
$userEmail = $user['userEmail'];
if($userPhone == "" && $userEmail == ""){
	echo "202|no mobile & email found";
}

echo "201|the acount found";
?> 