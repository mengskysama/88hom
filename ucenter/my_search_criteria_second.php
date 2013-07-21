<?php
/**
 * 我的二手房选房条件
 * @author Max(maxyellow@vip.qq.com)
 * @since 2013-07-14
 */
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir . 'my_search_criteria_second.tpl';
$cType = $_GET ['cType'];
$html->addJs ( 'area.js' );
$html->addJs ( 'processArea.js' );
$html->addJs ( "search_citeria.js" );
$html->addCss ( 'admin/area.css' );
$arr = require ECMS_PATH_ROOT . 'includes/build.inc.php';
$html->show ();
$smarty->assign ( 'houseType', $arr ['buildType'] );
$smarty->assign ( 'ucenter_user_left_menu', $tpl_dir . 'ucenter_user_left_menu.tpl' );
$smarty->assign ( 'userId', $userId );
$smarty->assign ( 'cType', $cType );
$smarty->display ( $tpl_name );
?>