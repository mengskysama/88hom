<?php
$userService = new UserService($db);
$user = $userService->getUserById($userId);
if(($user['userPhone'] != "" 
	&& $user['userPhoneState'] == 1)
	|| ($user['userEmail'] != "" && $user['userEmailState'] == 1)){
}else{
	header("location: auth_user.php");
}
?>