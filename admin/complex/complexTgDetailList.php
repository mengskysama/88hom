<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexTgDetailList.tpl';
$html->title='团购详情列表';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexTgManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$tgService=new TgService($db);

if(isset($_REQUEST['page'])&&!empty($_REQUEST['page'])){
	$page=$_REQUEST['page'];
}else{
	$page=1;
}
if(isset($_REQUEST['id'])&&!empty($_REQUEST['id'])){
	$id=$_REQUEST['id'];
}else{
	$html->backUrl('错误传参！');
}

$fileName='';
$step=1;
$begin=$step*($page-1);

$fileName='complexTgDetailList.php?id='.$id.'&page';

$field='*';
$where='where tgPropertyId='.$id;
$order='order by tgCreateTime desc ';
$limit='limit '.$begin.','.$step;

$tgList=$tgService->getTgList($field,$where,$order,$limit);
$tgCount=$tgService->countTgList($where);
//
$divPage='';
if(!empty($tgCount)&&$tgCount['counts']>0){
	$divPage=sysAdminPageInfo($tgCount['counts'],$step,$page,$fileName,'');
}else{
	$divPage='';
}

$info['page']=$page;
$info['id']=$id;

$smarty->assign('tgList',$tgList);
$smarty->assign('divPage',$divPage);
$smarty->assign('info',$info);
$html->show();
$smarty->display($tpl_name);
?>