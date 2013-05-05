<?php
require 'path.inc.php';

$userPhone = !empty($_POST['userPhone']) ? $_POST['userPhone'] : "";
if($userPhone == ""){
	echo "203";
	return;
}

$mathcode = !empty($_POST['mathcode']) ? $_POST['mathcode'] : "";
if($mathcode == ""){
	echo "201";
	return;
}

if($mathcode != $_SESSION['codeweb']){
	echo "205";
	return;
}

$certCode = rand(100000, 999999);
$userService = new UserService($db);
$result = $userService->saveCertCode($userPhone,$certCode);
if(!$result){
	echo "202";
	return;
}

$sent = sendSMS($userPhone,$certCode);
echo "sent->".$sent;
return;
if($sent){
	echo "200";
	return;
}
echo "204";

function sendSMS($strMobile,$content){
	$url=" http://service.winic.org:8009/sys_port/gateway/?id=%s&pwd=%s&to=%s&content=%s&time=";
	$id = urlencode("88hom");
	$pwd = urlencode("88hom168");
	$to = urlencode($strMobile);
	$content = iconv("UTF-8","GB2312",$content);
	$rurl = sprintf($url, $id, $pwd, $to, $content);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_URL,$rurl);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);

	$result = curl_exec($ch);
	//echo "result->".$result;
	curl_close($ch);
	return $result;
}
?>