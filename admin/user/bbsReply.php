<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'bbsReply.tpl';
$html->title='信息管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('bbsManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$bbsService=new BbsService($db);

if(isset($_GET['bid'])&&!empty($_GET['bid'])){
	$bid=$_GET['bid'];
}else{
	$html->backUrl('参数错误！');
}
if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}

$infoDetail=null;
$infoDetail=$bbsService->getInfoDetailById($bid,'admin');
if(empty($infoDetail)){
	$html->backUrl('无此内容！');
}

$fileName='';
$fileName="bbsReply.php?bid=$bid&page";
$lines=20;
$begin=$lines*($page-1);
$where='where r.bid='.$bid;
$order='order by r.create_time desc';
$limit='limit '.$begin.','.$lines;

$infoList=null;
$infoList=$bbsService->getInfoReplyList($where, $order, $limit);
if(!empty($infoList)){
	foreach($infoList as $key=>$value){
		$value['content']=sysCnSubStr($value['content'], 200,'...');
		$infoList[$key]=$value;
	}
}
$infoCount=$bbsService->countInfoReply($where);

$divPage='';
if(!empty($infoCount)&&$infoCount['counts']>0){
	$divPage=sysAdminPageInfo($infoCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}

$smarty->assign('infoDetail',$infoDetail);
$smarty->assign('infoList',$infoList);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>