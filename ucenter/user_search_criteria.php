<?php
/**
 * 我的选房条件
 * @author Max(maxyellow@vip.qq.com)
 * @since 2013-07-14
 */
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir . 'user_search_criteria.tpl';
$cType = $_GET ['cType'];
$field = '*';
$order = ' order by update_time desc ';
$userCriteria = new UserCriteriaDAO ( $db );
//新房没有求租
if ($cType == 1) {
	$where1 = 'where c_type=1 and hand=1 and user_id=' . $userId;
	$infoListOneHand = $userCriteria->getUserCriteriaList ( $field, $where1, $order );
	//搜索参数添加
	//路径property/search.php?p=&c=&d=&a=&t=&pr=&price=&search=&page
	//p 省
	//c 城市
	//d 区域
	//a 商圈
	//t 1住宅，2商铺，3写字楼，4别墅
	//pr 头部价格范围
	//price 元/平米
	//search 名称
	//page 分页
	$url = 'http://192.168.0.27/88hom/property/search.php?';
	foreach ( $infoListOneHand as $key => $item ) {
		$infoListOneHand [$key] ['areaIndex'] = $url . 't=' . $item ['house_type'];
		if (isset ( $item ['price'] ) && $item ['price'] != '') {
			$infoListOneHand [$key] ['areaIndex'] .= '&price=' . $item ['price'];
		}
		if (isset ( $item ['area'] ) && $item ['area'] != '') {
			$infoListOneHand [$key] ['areaIndex'] .= '&search=' . $item ['area'];
		}
		$arr = explode ( "-", $item ['area_index'] );
		$infoListOneHand [$key] ['areaIndex'] .= '&p=' . $arr [0] . '&c=' . $arr [1];
		if (isset ( $arr [2] )) {
			$infoListOneHand [$key] ['areaIndex'] .= '&d=' . $arr [2];
		}
		if (isset ( $arr [3] )) {
			$infoListOneHand [$key] ['areaIndex'] .= '&a=' . $arr [3];
		}
	}
	$smarty->assign ( 'infoList1', $infoListOneHand );
}

$where2 = 'where c_type=' . $cType . ' and hand=2 and user_id=' . $userId;
$infoListSecondHand = $userCriteria->getUserCriteriaList ( $field, $where2, $order );

$html->show ();
$smarty->assign ( 'ucenter_user_left_menu', $tpl_dir . 'ucenter_user_left_menu.tpl' );
$smarty->assign ( 'infoList2', $infoListSecondHand );
$smarty->assign ( 'userId', $userId );
$smarty->assign ( 'cType', $cType );
$smarty->display ( $tpl_name );

?>