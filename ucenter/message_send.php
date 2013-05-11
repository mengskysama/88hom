<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'message_send.tpl';

$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('messageList',$messageList);
$smarty->assign('pagination',$pagination);
$smarty->display($tpl_name);
?>