<?php
function SendSMS($strMobile,$content){
			$url = "http://service.winic.org:8009/sys_port/gateway/?id=%s&pwd=%s&to=%s&content=%s&time=";
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
			curl_close($ch);
			return $result;
} 
$strMobile='15820437227';
$content='房不剩房活动大酬宾，您被幸运的抽中一等奖，现金9万8千元，领奖联系电话15820437227！手机短信平台费用别忘了哦！';
$result=SendSMS($strMobile,$content);
echo $result;
?> 