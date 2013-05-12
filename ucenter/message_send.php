<?php
require 'path.inc.php';
$html->addJs("fontsLength.js");
$html->addJs("jqModal.js");
$tpl_name = $tpl_dir.'message_send.tpl';

$user = $_SESSION['UCUser'];
$userId = $user['userId'];
$userName = $user['userName'];

$html->show();

$smarty->assign('userName',$userName);
$smarty->display($tpl_name);
?>