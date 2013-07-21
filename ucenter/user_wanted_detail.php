<?php
/**
 * 我的求购求租详情
 * @author Max(maxyellow@vip.qq.com)
 * @since 2013-07-18
 */
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir . 'user_wanted_detail.tpl';
//$html->addJs ( "user_wanted.js" );
////主键ID
$id = $_GET ['id'];
$userWanted = new UserWantedDAO ( $db );
$infoDetail=$userWanted->getUserWantedById($id);
//房屋类别
$html->show ();
$smarty->assign ( 'ucenter_user_left_menu', $tpl_dir . 'ucenter_user_left_menu.tpl' );
$smarty->assign ( 'infoDetail', $infoDetail );
$smarty->assign ( 'wType', $infoDetail['w_type'] );
$smarty->assign ( 'isIntermediary', $infoDetail['is_intermediary'] );
$smarty->display ( $tpl_name );
?>