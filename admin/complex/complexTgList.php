<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexTgList.tpl';
$html->title='团购新盘列表';
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

$fileName='';
$step=20;
$begin=$step*($page-1);

$fileName='complexTgList.php?page';

$field='*';
$where='';
$where='';
$group='group by propertyId';
$order='order by tgCreateTime desc ';
$limit='limit '.$begin.','.$step;

$tgList=$tgService->getPropertyListForTg($field,$where,$group,$order,$limit);
$tgCount=$tgService->countPropertyListForTg($where);
//
$divPage='';
if(!empty($tgCount)&&$tgCount['counts']>0){
	$divPage=sysAdminPageInfo($tgCount['counts'],$step,$page,$fileName,'');
}else{
	$divPage='';
}

$info['page']=$page;

$smarty->assign('tgList',$tgList);
$smarty->assign('divPage',$divPage);
$smarty->assign('info',$info);
$html->show();
$smarty->display($tpl_name);
?>