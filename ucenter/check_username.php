<?php
require 'path.inc.php';

$userName = !empty($_POST['userName']) ? $_POST['userName'] : "";
if($userName == ""){
	echo "203|invalid account";
	return;
}

$userService = new UserService($db);
$user = $userService->getUserByUserName($userName);
echo empty($user) ? "200|valid account" : "201|the acount found"; 

?> 