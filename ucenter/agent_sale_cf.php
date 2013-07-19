<?php
require 'cf_path.inc.php';
require 'check_agent_login.php';
require 'check_auth_user.php';
$txType = 1;
require 'check_live_prop_account.php';

$tpl_name = $tpl_dir.'agent_sale_cf.tpl';
$picTypeList=$cfg['arr_pic']['2handFactory'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$smarty->assign('restLivePropsCount',$restLivePropsCount);
$smarty->display($tpl_name);
?>