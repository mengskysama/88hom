<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'message_inbox.tpl';

$where = "where messageToUserId=".$userId." and messageState=0 or messageState=1";
$msgType = getParameter("type","GET");
if($msgType == 's'){
	$where .= " and messagetypeId=1";
}else if($msgType == 'x'){
	$where .= " and messagetypeId=2";
}else if($msgType == 'z'){
	$where .= " and messagetypeId=3";
}

$fields = "messageId,messageContent,(select userUsername from ecms_user where userId=messageFromUserId) as sender,messageState,from_unixtime(messageCreateTime,'%Y-%m-%d %H:%i:%s') as sentTime";
$order = "order by messageCreateTime desc";

$page = getParameter("page","GET");
$page = $page == "" ? 1 : $page;
$limit = "limit ".(($page - 1) * MESSAGE_CENTER_PAGE_SIZE).",".MESSAGE_CENTER_PAGE_SIZE;

$messageService = new MessageService($db);
$totalNum = $messageService->countMessage($where);

$messageList = $messageService->getMessageList($fields,$where,$order,$limit);
$pagination = sysAdminPageInfo($totalNum,MESSAGE_CENTER_PAGE_SIZE,$page,"message_inbox.php?type=".$msgType."&page","");

$html->addJs("jqModal.js");
$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('messageList',$messageList);
$smarty->assign('pagination',$pagination);
$smarty->display($tpl_name);
?>