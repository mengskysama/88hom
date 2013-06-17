<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'success_reg_email.tpl';

$email = getParameter("email","GET");
$mail_server = "http://".gotomail($email);
$html->show();
$smarty->assign("mail_server",$mail_server);
$smarty->assign("target_email",$email);
$smarty->display($tpl_name);
?>