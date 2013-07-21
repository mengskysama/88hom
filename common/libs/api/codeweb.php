<?php
session_start();
require_once '../classes/CheckCode.class.php';
$checkcode=new CheckCode();
$checkcode->width=60;
$checkcode->height=20;
$checkcode->font_size=12;
$checkcode->doimage();
$_SESSION['codeweb']=$checkcode->get_code();
?>