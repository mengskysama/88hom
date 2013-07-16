<?php

if(!isset($_SESSION['UCUser']) || empty($_SESSION['UCUser']) || $_SESSION['UCUser']['userType'] != 2){
	header("Location:index.php?userType=2");
}

$UCUser = $_SESSION['UCUser'];
$userId = $UCUser['userId'];
$userName = $UCUser['userUsername'];
?>