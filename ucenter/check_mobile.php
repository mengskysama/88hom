<?php
require 'path.inc.php';

$userPhone = !empty($_POST['userPhone']) ? $_POST['userPhone'] : "";
if($userPhone == ""){
	echo "203|invalid mobile no";
	return;
}

$userService = new UserService($db);
$user = $userService->getUserByUserPhone($userPhone);
echo empty($user) ? "200|valid phone" : "201|the phone already exist "; 

?>