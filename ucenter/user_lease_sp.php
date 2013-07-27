<?php
require 'prop_input_path.inc.php';
require 'check_user_login.php';
require 'check_auth_user.php';
$txType = 2;
require 'check_live_prop_account.php';
$tpl_name = $tpl_dir.'user_lease_sp.tpl';
$picTypeList=$cfg['arr_pic']['2handShop'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$smarty->assign('restLivePropsCount',$restLivePropsCount);
$FCKeditor = createCKeditor('shopsContent',0,400,150,'');
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->display($tpl_name);
?>