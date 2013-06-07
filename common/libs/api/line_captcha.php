<?php
require 'path.inc.php';

$Captcha = new Captcha("add");
$Captcha->set_checkimage_wh(60, 20);
$Captcha->set_checkcode_num(4);
$Captcha->out_checkimage();
$_SESSION['line_captcha']=$Captcha->get_checkresult();
?>