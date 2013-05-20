<?php
require 'path.inc.php';
require 'check_login.php';

$action = getParameter("action");
$messageService = new MessageService($db);
//get the amount of sent message in a day
if($action == "getcount"){
	$msgCountSent = $messageService->countMessage("where messageFromUserId=".$userId." and from_unixtime(messageCreateTime,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d')");
	echo "{\"result\":\"".$msgCountSent."\"}";
	return;
}

//send message
if($action == "sendMessage"){
	$toName = unescape(getParameter("toName"));
	$content = unescape(getParameter("content"));
	
	if($toName == ""){
		echo "{\"err\":\"error\",\"msg\":\"请输入收件人\"}";
		return;
	}
	if($content == ""){
		echo "{\"err\":\"error\",\"msg\":\"请输入信息内容\"}";
		return;
	}
	
	$message['messageTitle'] = "";
	$message['messageContent'] = $content;
	$message['messageFromUserId'] = $userId;
	$message['messagetypeId'] = 1;
	$message['messageState'] = 0; 
	$userService = new UserService($db);
	$toNameArr = split(",",$toName);
	foreach($toNameArr as $name){
		$toUser = $userService->getUserByUserName($name);
		if($toUser == "") continue;

		$message['messageToUserId'] =$toUser['userId'];
		$messageService->release($message);
	}
	echo "{\"result\":\"1\"}";
	return;
}

//update the message status to READ
if($action == "read"){
	$messageId = getParameter("messageId");
	$result = $messageService->changeState(4,$messageId);
	echo "{\"result\":\"".$result."\"}";
	return;
}

//delete the message
if($action == "DelSelectedMessage"){
	$msgIds = getParameter("msgids");
	$boxType = getParameter("type");
	if($msgIds == "" || $boxType == "" || ($boxType != "i" && $boxType != "o")){
		echo "{\"result\":\"failure\"}";
		return;
	}
	$length = strlen($msgIds);
	if(strrpos($msgIds,",") == ($length - 1)){
		$msgIds = substr($msgIds,0,$length-1);
	}
	
	if($boxType == "i"){
		$state = 1;
	}else{
		$state = 2;
	}
	
	$result = $messageService->updateBatchMessageState($state,$msgIds);
	if($result > 0){
		echo "{\"result\":\"success\"}";
		return;
	}else{
		echo "{\"result\":\"failure\"}";
		return;
	}
}

?>