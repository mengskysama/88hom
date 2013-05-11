<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'message_inbox.tpl';

$user = $_SESSION['UCUser'];
$userId = $user['userId'];
$userName = $user['userName'];
$userId = 3;

$where = "where messageToUserId=".$userId;
$msgType = getParameter("type");
if($msgType == 's'){
	$where = " and messagetypeId=1";
}else if($msgType == 'x'){
	$where = " and messagetypeId=2";
}else if($msgType == 'z'){
	$where = " and messagetypeId=3";
}

$fields = "messageId,messageContent,(select userUsername from ecms_user where userId=messageFromUserId) as sender,messageState,from_unixtime(messageCreateTime,'%Y-%m-%d %H:%i:%s') as sentTime";
$order = "order by messageCreateTime desc";

$page = getParameter("page");
$page = $page == "" ? 1 : $page;
$limit = "limit ".(($page - 1) * MESSAGE_CENTER_PAGE_SIZE).",".MESSAGE_CENTER_PAGE_SIZE;

$messageService = new MessageService($db);
$totalNum = $messageService->countMessage($where);

$messageList = $messageService->getMessageList($fields,$where,$order,$limit);
$pagination = sysAdminPageInfo($totalNum,MESSAGE_CENTER_PAGE_SIZE,$page,"message_inbox.php?type=".$msgType."&page","");

$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('messageList',$messageList);
$smarty->assign('pagination',$pagination);
$smarty->display($tpl_name);
?>