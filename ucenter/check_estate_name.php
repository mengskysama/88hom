<?php
require 'path.inc.php';

$q = trim(getParameter("name"));
if($q == ""){
	echo -1;
	return;
}

$estateService = new EstateService($db);
$estates = $estateService->getEstateByName($q);
if(!$estates){
	echo 1;
	return;
}
return -1;
?>