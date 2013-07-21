<?php
/**
 * 我的选房条件
 * @author Max(maxyellow@vip.qq.com)
 * @since 2013-07-14
 */
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir . 'my_search_criteria_modify.tpl';
$html->addJs ( 'area.js' );
$html->addJs ( 'processArea.js' );
$html->addJs ( "search_citeria.js" );
$html->addCss ( 'admin/area.css' );
$cType = $_GET ['cType'];
////主键ID
$id = $_GET ['id'];
$userCriteria = new UserCriteriaDAO ( $db );
$infoDetail = $userCriteria->getUserCriteriaById ( $id );
//房屋类别
$arr = require ECMS_PATH_ROOT . 'includes/build.inc.php';
if ($infoDetail ['hand'] == 1) {
	$infoTypeSelectList = $arr['buildTypeNew'];
} else {
	$infoTypeSelectList = $arr['buildType'];
}
$html->show ();
$smarty->assign ( 'ucenter_user_left_menu', $tpl_dir . 'ucenter_user_left_menu.tpl' );
$smarty->assign ( 'hand', $infoDetail['hand'] );
$smarty->assign ( 'infoDetail', $infoDetail );
$smarty->assign ( 'infoTypeSelectList', $infoTypeSelectList );
$smarty->assign ( 'userId', $userId );
$smarty->assign ( 'cType', $cType );
$smarty->display ( $tpl_name );

?>