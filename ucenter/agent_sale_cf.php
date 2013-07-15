<?php
require 'prop_input_path.inc.php';
require 'check_login.php';
require 'check_auth_user.php';
$tpl_name = $tpl_dir.'agent_sale_cf.tpl';
$picTypeList=$cfg['arr_pic']['2handFactory'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$smarty->display($tpl_name);
?>