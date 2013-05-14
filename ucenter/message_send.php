<?php
require 'path.inc.php';
require 'check_login.php';

$html->addJs("fontsLength.js");
$html->addJs("jqModal.js");
$tpl_name = $tpl_dir.'message_send.tpl';

$html->show();

$smarty->assign('userName',$userName);
$smarty->display($tpl_name);
?>