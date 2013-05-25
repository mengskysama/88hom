<?php
//require 'path.inc.php';
require '../classes/CheckCode.class.php';
$checkcode=new CheckCode();
$checkcode->width=60;
$checkcode->height=18;
$checkcode->font_size=12;
$checkcode->doimage();
$_SESSION['codeweb']=$checkcode->get_code();
?>