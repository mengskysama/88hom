<?php
require 'path.inc.php';
$user = $_SESSION['UCUser'];
$userId = $user['userId'];

$action = getParameter("action");
$messageService = new MessageService($db);
//var option = { action: "getcount" };
if($action == "getcount"){
	$msgCountSent = $messageService->countMessage("where messageFromUserId=".$userId." and from_unixtime(messageCreateTime,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d')");
	return "{\"result\":\"".$msgCountSent."\"}";
}

// var option = { action: "sendMessage", toName: escape(namesp), content: escape(sendcontent)};
if($action == "sendMessage"){
	$toName = getParameter("toName");
	$content = getParameter("content");
}
//var option={action:"read",messageId:msgid};
if($action == "read"){
	$messageId = getParameter("messageId");
	$result = $messageService->changeState(1,$messageId);
	return $result;
}
//var option={action:"DelSelectedMessage",msgids:msglist,parentids:parentlist};
if($action == "DelSelectedMessage"){
	
}
//
?>