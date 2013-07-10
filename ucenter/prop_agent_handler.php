<?php
require 'path.inc.php';
require 'check_login.php';
require 'PropertyHandler.class.php';

$txType = getParameter("txType");
$estId = getParameter("estId");
$estName = getParameter("estName");
$propPrice = getParameter("propPrice");
$remarks = getParameter("remarks");
$contactName = getParameter("contactName");
$contactGender = getParameter("contactGender");
$contactMobile = getParameter("contactMobile");
$certcode = getParameter("certcode");

$err_redirect_uri = $txType == 1 ? "user_sale_prop_agent.php" : "user_lease_prop_agent.php";
$estateService = new EstateService($db);
$propHandler = new PropertyHandler();
$realEstId = $propHandler->getRealEstateId($estateService,$estId,$estName);
if(!$realEstId){
	$_SESSION['ERR_MSG_AGENT_PROP'] = "委托失败，请重试";
	header("location:".$err_redirect_uri); 
}
$prop['propUserId'] = $userId;
$prop['communityId'] = $realEstId;
$prop['propPrice'] = $propPrice;
$prop['txType'] = $txType;
$prop['remarks'] = $remarks;
$prop['contactName'] = $contactName;
$prop['contactGender'] = $contactGender;
$prop['contactMobile'] = $contactMobile;
$prop['certcode'] = $certcode;
$prop['propState'] = 1;
$prop['agentUserId'] = 0;

$secondPropService = new SecondHandPropertyService($db);
$propId = $secondPropService->sendPropToAgent($prop);
if($propId){
	header("location:user_sale_prop_agent_target.php?propId=".$propId);
}

$_SESSION['ERR_MSG_AGENT_PROP'] = "委托失败，请重试";
header("location:".$err_redirect_uri);
?>