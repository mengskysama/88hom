<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'user_register.tpl';

$html->addJs('ucenter_mobile.js');
$html->addJs('ucenter_register.js');
$html->show();
$smarty->display($tpl_name);
?>