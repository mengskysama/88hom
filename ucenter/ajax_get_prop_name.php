<?php
require 'path.inc.php';
require 'check_login.php';

$q = getParameter("term","GET");
if($q == ""){
	return "[{ \"label\": \"\", \"id\": \"\" }]";
}

$estateService = new EstateService($db);
$estates = $estateService->getEstatesByLikeName($q);
if(!$estates){
	return "[{ \"label\": \"\", \"id\": \"\" }]";
}

$estNames = "[";
$size = count($estates);
for($i=0; $i<$size; $i++){
	$estNames .= "{ \"label\": \"".$estates[$i]['communityName']."\", \"id\": \"".$estates[$i]['communityId']."\" },";
}
$estNames = substr($estNames,0,strrpos($estNames,","))."]";
echo $estNames; 
?>