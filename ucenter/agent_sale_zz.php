<?php
require 'prop_input_path.inc.php';
require 'check_login.php';
require 'check_auth_user.php';
$tpl_name = $tpl_dir.'agent_sale_zz.tpl';
$picTypeList=$cfg['arr_pic']['2handHouse'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$smarty->display($tpl_name);
?>