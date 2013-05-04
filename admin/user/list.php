<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'list.tpl';
$html->title='信息管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('userModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}

$fileName='';
$fileName='list.php?page';
$lines=20;
$begin=$lines*($page-1);
$where='';
$order='';
$limit='limit '.$begin.','.$lines;

$userList=array();
$userList=$userService->getWebUserList($where, $order, $limit);
$userCount=$userService->countWebUser($where);

$divPage='';
if(!empty($userCount)&&$userCount['counts']>0){
	$divPage=sysAdminPageInfo($userCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}

$smarty->assign('userList',$userList);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>