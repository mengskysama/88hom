<?php
require 'path.inc.php';
if(isset($_SESSION['UCUser'])){
	$userType = $_SESSION['UCUser']['userType'];
	unset($_SESSION['UCUser']);
	$userType = $userType == 2 ? "?userType=2" : "";
	header("Location:index.php".$userType);
}
header("Location:index.php");
?>