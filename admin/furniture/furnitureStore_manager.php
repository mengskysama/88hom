<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-24
 * 家居卖场
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('furnitureStore');//是否有对家居卖场管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$tpl = null;
$furnitureStore = null;
$furnitureStoreList = null;
$furnitureStoreDAO = new FurnitureStoreDAO($db);

if($action == 'add'){//初始化插入
	$timestamp=time();
	$token=md5('unique_salt' . $timestamp);

	$smarty->assign('timestamp',$timestamp);
	$smarty->assign('token',$token);
	$tpl = $tpl_dir.'furnitureStore_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$furnitureStore = $furnitureStoreDAO->getFurnitureStoreById($_REQUEST['id']);
	$timestamp=time();
	$token=md5('unique_salt' . $timestamp);

	$smarty->assign('timestamp',$timestamp);
	$smarty->assign('token',$token);
	$smarty->assign('furnitureStore',$furnitureStore);
	$tpl = $tpl_dir.'furnitureStore_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	$furnitureStoreDAO->release($_REQUEST);
	toList();	
}
elseif ($action == 'doUpdate'){//提交更新
	$furnitureStore = $furnitureStoreDAO->getFurnitureStoreById($_REQUEST['id']);
	if($_POST['logo'] != $furnitureStore['logo'])
	{
		if(file_exists(ECMS_PATH_UPLOADS.$furnitureStore['logo']))
			unlink(ECMS_PATH_UPLOADS.$furnitureStore['logo']);//删除大图文件
		$temp1 = explode('_', $furnitureStore['logo']);
		$temp2 = explode('.', $furnitureStore['logo']);	
		if(file_exists(ECMS_PATH_UPLOADS.$temp1[0].'.'.$temp2[1]))
			unlink(ECMS_PATH_UPLOADS.$temp1[0].'.'.$temp2[1]);//删除缩略图文件
	}
	$furnitureStoreDAO->modify($_REQUEST);
	toList();
}
elseif ($action == 'delete'){//执行删除
	$furnitureStore = $furnitureStoreDAO->getFurnitureStoreById($_REQUEST['id']);
	if(file_exists(ECMS_PATH_UPLOADS.$furnitureStore['logo']))
		unlink(ECMS_PATH_UPLOADS.$furnitureStore['logo']);//删除大图文件
		$temp1 = explode('_', $furnitureStore['logo']);
		$temp2 = explode('.', $furnitureStore['logo']);	
	if(file_exists(ECMS_PATH_UPLOADS.$temp1[0].'.'.$temp2[1]))
		unlink(ECMS_PATH_UPLOADS.$temp1[0].'.'.$temp2[1]);//删除缩略图文件
		
	$furnitureStoreDAO->delFurnitureStoreById($_REQUEST['id']);
	toList();
}
else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $furnitureStoreList,$furnitureStoreDAO,$tpl,$smarty,$tpl_dir;
	
	$furnitureStoreList = $furnitureStoreDAO->getFurnitureStoreList('*','',' order by orderNum desc,updateTime desc ','');
	$smarty->assign('furnitureStoreList',$furnitureStoreList);
	$tpl = $tpl_dir.'furnitureStore_list.tpl';
}
