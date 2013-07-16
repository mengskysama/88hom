<?php
require 'path.inc.php';
require 'check_user_login.php';
$tpl_name = $tpl_dir.'ucenter_user.tpl';

$userService = new UserService($db);
$userDetail = $userService->getUserDetail($userId);
$userGender = $userDetail['userdetailGender'];
$userGender = $userGender == 0 ? "女" : "男";
$userdetailPic = $userDetail['userdetailPic'];

$html->show();
$smarty->assign("userGender",$userGender);
$smarty->assign("userName",$userName);
$smarty->assign("userdetailPic",$userdetailPic);
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->display($tpl_name);
?>