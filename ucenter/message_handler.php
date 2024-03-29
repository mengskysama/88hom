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
	
	$msg_count_sent = $messageService->countMessage("where messageFromUserId=".$userId." and from_unixtime(messageCreateTime,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d')");
	if($msg_count_sent > 20){
		echo "{\"err\":\"error\",\"msg\":\"您今天发送信息已超过20条\"}";
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
		$toUser = $userService->getUserByUserName($name,-1);
		if($toUser == ""){
			echo "{\"err\":\"error\",\"msg\":\"不能发信息给用户".$name."，因为它并不存在\"}";
			return;
		}

		$message['messageToUserId'] = $toUser['userId'];
		$messageService->release($message);
	}
	echo "{\"result\":\"1\"}";
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