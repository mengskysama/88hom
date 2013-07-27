<?php
require 'prop_input_path.inc.php';
require 'check_user_login.php';
require 'check_auth_user.php';
$txType = 1;
require 'check_live_prop_account.php';
$tpl_name = $tpl_dir.'user_sale_zz.tpl';

$picTypeList = $cfg['arr_pic']['2handHouse'];
$smarty->assign('picTypeList',$picTypeList);

$structureList = $cfg['arr_build']['2handHouseBuildStructure'];
$formList = $cfg['arr_build']['2handHouseBuildForm'];
$smarty->assign('structureList',$structureList);
$smarty->assign('formList',$formList);

$FCKeditor = createCKeditor('houseContent',0,400,150,'');
$smarty->assign('FCKeditor',$FCKeditor);

$smarty->assign('userName',$userName);
$smarty->assign('restLivePropsCount',$restLivePropsCount);
$smarty->display($tpl_name);
?>