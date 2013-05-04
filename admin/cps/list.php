<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'list.tpl';
$html->title='信息管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('cpsModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$mediaService=new MediaService($db);
$type=2;
if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}

$fileName='list.php?page';

$lines=5;
$begin=$lines*($page-1);
$field="*";
$where="where 1=1 and type=$type";
$order="order by create_time desc";
$limit='limit '.$begin.','.$lines;

$mediaList=$mediaService->getInfoList($field,$where,$order,$limit);
$mediaCount=$mediaService->countInfo($where);

$divPage='';
if(!empty($mediaCount)&&$mediaCount['counts']>0){
	$divPage=sysAdminPageInfo($mediaCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}

$smarty->assign('type',$type);
$smarty->assign('infoList',$mediaList);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>