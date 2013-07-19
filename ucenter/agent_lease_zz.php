<?php
require 'prop_input_path.inc.php';
require 'check_agent_login.php';
require 'check_auth_user.php';
$txType = 2;
require 'check_live_prop_account.php';
$tpl_name = $tpl_dir.'agent_lease_zz.tpl';
$picTypeList=$cfg['arr_pic']['2handHouse'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$smarty->assign('restLivePropsCount',$restLivePropsCount);
$smarty->display($tpl_name);
?>