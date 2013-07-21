<?php 
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_wanted_choose.tpl';
//wType，1求购，2求租！
if(isset($_POST['wType'])){
	$wType=$_POST['wType'];
}else{
	$wType=$_GET['wType'];
}
$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('userId',$userId);
$smarty->assign('wType',$wType);
$smarty->display($tpl_name);
?>