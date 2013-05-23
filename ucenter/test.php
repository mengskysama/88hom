<?php
header ("Content-type: image/png");

$mCheckImage = @imagecreate (60, 20);
$bgcolor = imagecolorallocate ($mCheckImage, 245,245,245);     //背景色
$iborder = imagecolorallocate ($mCheckImage, 206,206,206);     //边框色
imagerectangle($this->mCheckImage, 0, 0, $this->mCheckImageWidth-1, $this->mCheckImageHeight-1, $iborder);
/*
require 'E:/workspace/projects/88hom/common/libs/api/Captcha.php';
$Captcha = new Captcha(); 
$Captcha->set_checkimage_wh(60, 20); 
$Captcha->out_checkimage();
*/
 
?>