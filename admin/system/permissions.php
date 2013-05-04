<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'permissions.tpl';
$html->title='权限分配';
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}
else{
	$html->backUrl('缺少参数 action');
}
if(isset($_GET['gid'])&&!empty($_GET['gid'])){
	$gid=$_GET['gid'];
}else{
	$gid='';
}
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id='';
}
if($gid==''&&$id==''){
	$html->backUrl('参数 错误');
}
$permissions=require ECMS_PATH_CONF.'system/system.cfg.php';
$permissions=$permissions['admin'];
if($action=='group'){
	if(!file_exists(ECMS_PATH_CONF.'system/group_'.$gid.'.php')){
		$group=array();
	}else{
		$group=require ECMS_PATH_CONF.'system/group_'.$gid.'.php';
	}
	foreach($permissions as $key=>$subPermissions){
		foreach($subPermissions['sub'] as $subKey=>$subItem){
			if(isset($group[$subKey])&&$group[$subKey]==1){
				$permissions[$key]['sub'][$subKey]['state']=1;
			}
		}
	}
}else if($action=='systemUser'){
	if(!file_exists(ECMS_PATH_CONF.'system/user_'.$id.'.php')){
		$user=array();
	}else{
		$user=require ECMS_PATH_CONF.'system/user_'.$id.'.php';
	}
	foreach($permissions as $key=>$subPermissions){
		foreach($subPermissions['sub'] as $subKey=>$subItem){
			if(isset($user[$subKey])&&$user[$subKey]==1){
				$permissions[$key]['sub'][$subKey]['state']=1;
			}
		}
	}
}
$smarty->assign('id',$id);
$smarty->assign('gid',$gid);
$smarty->assign('action',$action);
$smarty->assign('permissions',$permissions);
$html->show();
$smarty->display($tpl_name);
?>