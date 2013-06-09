<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'message_detail.tpl';

$messageId = getParameter("msgid","GET");
$messageService = new MessageService($db);
$messageService->changeState(4,$messageId);
$message = $messageService->getMessageById($messageId);
$msg_sender_id = $message['messageFromUserId'];
$msg_sender = $message['fromUserName'];
$msg_content = $message['messageContent'];
$msg_count_sent = $messageService->countMessage("where messageFromUserId=".$userId." and from_unixtime(messageCreateTime,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d')");

$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('msg_sender_id',$msg_sender_id);
$smarty->assign('msg_sender',$msg_sender);
$smarty->assign('msg_content',$msg_content);
$smarty->assign('msg_count_sent',$msg_count_sent);
$smarty->display($tpl_name);
?>