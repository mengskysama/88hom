<?php
require 'path.inc.php';

$userPhone = !empty($_POST['userPhone']) ? $_POST['userPhone'] : "";
if($userPhone == ""){
	echo "203";
	return;
}

$vcode = !empty($_POST['vcode']) ? $_POST['vcode'] : "";
if($vcode == ""){
	echo "202";
	return;
}

$userService = new UserService($db);
$isValidCertCode = $userService->isValidCertCode($userPhone,$vcode);
if($isValidCertCode){
	echo "200";
	return;
}
echo "202";
?>