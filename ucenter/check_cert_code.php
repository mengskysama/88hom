<?php
require 'path.inc.php';

$userPhone = !empty($_POST['userPhone']) ? $_POST['userPhone'] : "";
if($userPhone == ""){
	echo "203|invalid mobile no";
	return;
}

$vcode = !empty($_POST['vcode']) ? $_POST['vcode'] : "";
if($vcode == ""){
	echo "202|invalid vcode";
	return;
}

$userService = new UserService($db);
$isValidCertCode = $userService->isValidCertCode($userPhone,$vcode);
echo $isValidCertCode ? "200|valid vcode" : "202|no record found"; 

?>