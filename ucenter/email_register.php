<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'email_register.tpl';

$html->addJs('ucenter_register.js');
$html->addJs('ucenter_register_email.js');
$html->show();
$smarty->display($tpl_name);
?>