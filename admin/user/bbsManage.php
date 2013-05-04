<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'bbsManage.tpl';
$html->title='信息管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('bbsManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$bbsService=new BbsService($db);

if(isset($_GET['type'])&&!empty($_GET['type'])){
	$type=$_GET['type'];
}else{
	$type=1;
}
if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}

$fileName='';
$fileName="bbsManage.php?type=$type&page";
$lines=20;
$begin=$lines*($page-1);
$where='';
$order='order by b.create_time desc';
$limit='limit '.$begin.','.$lines;

$infoList=null;
$infoList=$bbsService->getInfoList($where, $order, $limit);
if(!empty($infoList)){
	foreach($infoList as $key=>$value){
		$value['content']=sysCnSubStr($value['content'], 200,'...');
		$infoList[$key]=$value;
	}
}
$infoCount=$bbsService->countInfo($where);

$divPage='';
if(!empty($infoCount)&&$infoCount['counts']>0){
	$divPage=sysAdminPageInfo($infoCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}

$smarty->assign('infoList',$infoList);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>