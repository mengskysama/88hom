<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'link.tpl';
$html->title='友情链接';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('link');
$action='linkRelease';
$typeTitle='发布';
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id='';
}
$type=1;
$linkService=new LinkService($db);
$linkList=$linkService->getLinkList($type,'admin');
$linkDetail='';
if(!empty($id)){
	$linkDetail=$linkService->getLinkDetailById($id);
	if(!empty($linkDetail)){
		$linkDetail['name']=htmlspecialchars($linkDetail['name'], ENT_QUOTES, 'ISO-8859-1', true);
		$linkDetail['url']=htmlspecialchars($linkDetail['url'], ENT_QUOTES, 'ISO-8859-1', true);
		$typeTitle='修改';
		$action='linkModify';
	}else{
		$id='';
	}
}
$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('type',$type);
$smarty->assign('id',$id);
$smarty->assign('action',$action);
$smarty->assign('typeTitle',$typeTitle);
$smarty->assign('linkDetail',$linkDetail);
$smarty->assign('linkList',$linkList);
$html->show();
$smarty->display($tpl_name);
?>