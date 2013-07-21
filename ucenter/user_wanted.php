<?php
/**
 * 我要求购求租
 * @author Max(maxyellow@vip.qq.com)
 * @since 2013-07-14
 */
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_wanted.tpl';
$wType=$_GET['wType'];
$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('userId',$userId);
$smarty->assign('wType',$wType);
$smarty->display($tpl_name);
?>