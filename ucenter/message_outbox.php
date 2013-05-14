<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'message_outbox.tpl';

$where = "where messageFromUserId=".$userId." and messageState != 2";

$fields = "messageId,messageContent,(select userUsername from ecms_user where userId=messageToUserId) as receiver,messageState,from_unixtime(messageCreateTime,'%Y-%m-%d %H:%i:%s') as sentTime";
$order = "order by messageCreateTime desc";

$page = getParameter("page","GET");
$page = $page == "" ? 1 : $page;
$limit = "limit ".(($page - 1) * MESSAGE_CENTER_PAGE_SIZE).",".MESSAGE_CENTER_PAGE_SIZE;

$messageService = new MessageService($db);
$totalNum = $messageService->countMessage($where);

$messageList = $messageService->getMessageList($fields,$where,$order,$limit);
$pagination = sysAdminPageInfo($totalNum,MESSAGE_CENTER_PAGE_SIZE,$page,"message_outbox.php?page","");

$html->addJs("jqModal.js");
$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('messageList',$messageList);
$smarty->assign('pagination',$pagination);
$smarty->display($tpl_name);
?>