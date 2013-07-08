<?php
require 'path.inc.php';
$smsSender = new SMSSender();
if($smsSender->send('15986605675', '你的注册码是789589')){
	echo "发送成功";
}else{
	echo "发送失败";
}
?> 