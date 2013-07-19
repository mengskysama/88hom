<?php
require 'prop_input_path.inc.php';
require 'check_user_login.php';
require 'check_auth_user.php';
$txType = 1;
require 'check_live_prop_account.php';
$tpl_name = $tpl_dir.'user_sale_bs.tpl';
$picTypeList=$cfg['arr_pic']['2handVilla'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$smarty->assign('restLivePropsCount',$restLivePropsCount);
$smarty->display($tpl_name);
?>