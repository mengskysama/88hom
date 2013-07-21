<?php 
/**
 * 用户中心求购
 * @author Max(maxyellow@vip.qq.com)
 * @since 2013-07-17
 */
require 'path.inc.php';
require 'check_login.php';
$html->addJs ( "user_wanted.js" );
$wType=$_GET['wType'];
$tpl_name = $tpl_dir.'user_wanted_intermediary.tpl';
$html->show();
$smarty->assign ( 'userId', $userId );
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('userId',$userId);
$smarty->assign('wType',$wType);
$smarty->display($tpl_name);
?>