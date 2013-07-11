<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'complexImcpList.tpl';
$html->title='中介公司列表';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('complexImcpManage');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$imcpService=new ImcpService($db);

if(isset($_REQUEST['page'])&&!empty($_REQUEST['page'])){
	$page=$_REQUEST['page'];
}else{
	$page=1;
}
if(isset($_REQUEST['search'])&&!empty($_REQUEST['search'])){
	$search=$_REQUEST['search'];
}else{
	$search='';
}
$fileName='';
$step=20;
$begin=$step*($page-1);

$fileName='complexImcpList.php?search='.$search.'&page';

//echo $fileName;

$info['begin']=$begin;
$info['step']=$step;
$info['search']=$search;

$imcpList=$imcpService->getImcpList($info);
$imcpCount=$imcpService->countImcp($info);
//
$divPage='';
if(!empty($imcpCount)&&$imcpCount['counts']>0){
	$divPage=sysAdminPageInfo($imcpCount['counts'],$step,$page,$fileName,'');
}else{
	$divPage='';
}

$smarty->assign('imcpList',$imcpList);
$smarty->assign('divPage',$divPage);
$smarty->assign('info',$info);
$html->show();
$smarty->display($tpl_name);
?>