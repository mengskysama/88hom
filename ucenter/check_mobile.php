<?php
require 'path.inc.php';

$userId = getParameter("userId");
$userPhone = getParameter("userPhone");
if($userPhone == ""){
	echo "203|invalid mobile no";
	return;
}
$userService = new UserService($db);
$user = $userService->getUserByUserPhone($userPhone);
if(empty($user)){
	echo "200|valid phone";
	return;
}
if($userId == "" || $userId == $user['userId']){
	echo "201|the phone already exist";
	return;
}
echo "204|the phone no found";
?>