<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_sale.tpl';

$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->display($tpl_name);
?>