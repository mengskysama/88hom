<?php
require 'prop_input_path.inc.php';
require 'check_agent_login.php';
require 'check_auth_user.php';
$txType = 2;
require 'check_live_prop_account.php';
$tpl_name = $tpl_dir.'agent_lease_xzl.tpl';
$picTypeList=$cfg['arr_pic']['2handOffice'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$smarty->assign('restLivePropsCount',$restLivePropsCount);
$FCKeditor = createCKeditor('officeContent',0,400,150,'');
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->display($tpl_name);
?>