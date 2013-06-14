<?php
require 'path.inc.php';
require 'check_login.php';

$html->addJs("fontsLength.js");
$html->addJs("jqModal.js");
$tpl_name = $tpl_dir.'message_send.tpl';

$messageService = new MessageService($db);
$msg_count_sent = $messageService->countMessage("where messageFromUserId=".$userId." and from_unixtime(messageCreateTime,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d')");

$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('msg_count_sent',$msg_count_sent);
$smarty->display($tpl_name);
?>