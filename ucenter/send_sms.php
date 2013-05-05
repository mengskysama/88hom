<?php

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
	
}
//sendSMS('15986605675', '234567');
?> 