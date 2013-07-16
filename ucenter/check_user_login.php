<?php

if(!isset($_SESSION['UCUser']) || empty($_SESSION['UCUser']) || $_SESSION['UCUser']['userType'] != 3){
	header("Location:index.php");
}

$UCUser = $_SESSION['UCUser'];
$userId = $UCUser['userId'];
$userName = $UCUser['userUsername'];
?>