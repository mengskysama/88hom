<?php
$expiredPropsCount = 0;
$secondPropertyService = new SecondHandPropertyService($db);
$expiredPropStat = $secondPropertyService->getExpiredPropStat($userId,$txType);
if($expiredPropStat){
	$expiredPropsCount = $expiredPropStat['expiredcount'];
}
$unlivePropsCount = $secondPropertyService->countPropertiesByState($userId,0,$txType);
$livePropsCount = $secondPropertyService->countPropertiesByState($userId,1,$txType);
$illegalPropsCount = $secondPropertyService->countPropertiesByState($userId,4,$txType);
$usedLivePropsCount = $livePropsCount + $expiredPropsCount + $illegalPropsCount;

$upLimit = 60;
$userType = $UCUser['userType'];
if($userType == 2){
	if($txType == 1){
		$upLimit = $cfg['arr_build']['2handConfig']['PROPERTY_COUNT_SALE_AGENT'];
	}else{
		$upLimit = $cfg['arr_build']['2handConfig']['PROPERTY_COUNT_LEASE_AGENT'];
	}
}else{
	if($txType == 1){
		$upLimit = $cfg['arr_build']['2handConfig']['PROPERTY_COUNT_SALE_USER'];
	}else{
		$upLimit = $cfg['arr_build']['2handConfig']['PROPERTY_COUNT_LEASE_USER'];
	}
}
if($usedLivePropsCount >= $upLimit){
	header("location: prop_input_exceed_limit.php");
}
$restLivePropsCount = $upLimit - $usedLivePropsCount;
?>