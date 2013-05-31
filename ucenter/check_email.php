<?php
require 'path.inc.php';

$userEmail = getParameter("userEmail");
if($userEmail == ""){
	echo "203|invalid email";
	return;
}

$userService = new UserService($db);
$user = $userService->getUserByUserEmail($userEmail);
echo empty($user) ? "200|valid email" : "201|the email already exist "; 

?>