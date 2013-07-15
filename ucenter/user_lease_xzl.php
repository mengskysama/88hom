<?php
require 'prop_input_path.inc.php';
require 'check_login.php';
require 'check_auth_user.php';
$tpl_name = $tpl_dir.'user_lease_xzl.tpl';
$picTypeList=$cfg['arr_pic']['2handOffice'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$smarty->display($tpl_name);
?>