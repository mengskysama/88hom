<?php
require 'path.inc.php';
$checkcode=new CheckCode();
$checkcode->width=80;
$checkcode->height=24;
$checkcode->font_size=14;
$checkcode->doimage();
$_SESSION['codeadmin']=$checkcode->get_code();
?>