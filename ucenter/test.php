<?php
require '../common/libs/classes/Captcha.php';
$Captcha = new Captcha("add"); 
$Captcha->set_checkimage_wh(60, 20); 
$Captcha->set_checkcode_num(4);
$Captcha->out_checkimage();
?>