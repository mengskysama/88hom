<?php
require 'path.inc.php';
require 'check_login.php';
require 'PropertyHandler.class.php';

$action = getParameter("action");
if($action == "toAgent"){
	$propId = getParameter("propId");
	$agentId = getParameter("agentId");
	if($propId == "" && $agentId == ""){
		echo "{\"result\":\"failure\"}";
		return;
	}	
	$prop['agentUserId'] = $agentId;
	$prop['propId'] = $propId;
	
	$secondPropService = new SecondHandPropertyService($db);
	$chkResult = $secondPropService->chkAgentProp($propId,$agentId);
	if($chkResult && $chkResult['total']>0){ 
		echo "{\"result\":\"agented\"}";
		return;
	}
	if($secondPropService->agentProperty($prop)){
		echo "{\"result\":\"success\"}";
	}else{
		echo "{\"result\":\"failure\"}";
	}
	return;
}else{
	$txType = getParameter("txType");
	$estName = getParameter("estName");
	$propPrice = getParameter("propPrice");
	$remarks = getParameter("remarks");
	$contactName = getParameter("contactName");
	$contactGender = getParameter("contactGender");
	$contactMobile = getParameter("contactMobile");
	$certcode = getParameter("certcode");
	
	$err_redirect_uri = $txType == 1 ? "user_sale_prop_agent.php" : "user_lease_prop_agent.php";
	$prop['propUserId'] = $userId;
	$prop['propName'] = $estName;
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
		header("location:user_prop_agent_target.php?propId=".$propId."&txType=".$txType);
	}
	
	$_SESSION['ERR_MSG_AGENT_PROP'] = "委托失败，请重试";
	header("location:".$err_redirect_uri);
}
?>