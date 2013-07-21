<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir . 'user_wanted_manage.tpl';
$wType = $_GET ['wType'];
if (isset ( $_GET ['isIntermediary'] )) {
	$isIntermediary = $_GET ['isIntermediary'];
}else{
	$isIntermediary = 2;//默认显示个人
}
//echo 'wType==='.$wType;
//echo 'isIntermediary==='.$isIntermediary;
if(isset($_REQUEST['page'])&&!empty($_REQUEST['page'])){
	$page=$_REQUEST['page'];
}else{
	$page=1;
}
$field = '*';
$order = ' order by update_time desc ';
$where=' where user_id='.$userId.' and w_type='.$wType.' and is_intermediary='.$isIntermediary;
$pageSize=5;
$limit='limit '.($page-1)*$pageSize.','.$pageSize;
$userWanted = new UserWantedDAO ( $db );
$infoList=$userWanted->getUserWantedList($field,$where,$order,$limit);
$infoCount=$userWanted->countUserWanted($where);
//分页
$divPage='';
//每页几条信息
$url="user_wanted_manage.php?wType=".$wType."&isIntermediary=".$isIntermediary."&page";
//$params="&wType=".$wType."&isIntermediary=".$isIntermediary;
if(!empty($infoCount[0])&&$infoCount[0]>0){
	$divPage=sysAdminPageInfo($infoCount[0],$pageSize,$page,$url,null);
}else{
	$divPage='';
}
$smarty->assign ( 'infoList', $infoList );
$html->show ();
$smarty->assign ( 'ucenter_user_left_menu', $tpl_dir . 'ucenter_user_left_menu.tpl' );
$smarty->assign ( 'wType', $wType );
$smarty->assign ( 'divPage', $divPage );
$smarty->assign ( 'isIntermediary', $isIntermediary );
$smarty->display ( $tpl_name );
?>