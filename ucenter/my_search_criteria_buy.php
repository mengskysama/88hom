<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'my_search_criteria_buy.tpl';


$html->show();

$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');

$smarty->display($tpl_name);

?>