<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'ucenter_user.tpl';

$userGender = "男";
if(isset($_SESSION['UCUserDetail'])){
	$UCUserDetail = $_SESSION['UCUserDetail'];
	$userGender = $UCUserDetail['userdetailGender'];
	$userGender = $userGender == 0 ? "女" : "男";
}

$html->show();
$smarty->assign("userGender",$userGender);
$smarty->assign("userName",$userName);
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->display($tpl_name);
?>