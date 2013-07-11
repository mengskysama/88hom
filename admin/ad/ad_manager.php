<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-23
 * 广告类别管理，控制类
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('ad');//是否有对广告管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$adDAO = new AdDAO($db);
$adTypeDAO = new AdTypeDAO($db);
$adService = new AdService($db);
$adType = null;
$adList = null;
$tpl = null;

if($action == 'add'){//初始化插入
	$adtypeList = $adTypeDAO->getAdTypeList('*','','','');
	$smarty->assign('adtypeList',$adtypeList);
	$tpl = $tpl_dir.'ad_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$ad = $adDAO->getAdById($_REQUEST['id']);
	$adtypeList = $adTypeDAO->getAdTypeList('*','','','');
	$adType =  $adTypeDAO->getAdTypeById($ad['adtypeId']);
	$img = '';
	if($adType['adtypeKey']!='url')
	{
		$img = $adService->getAdById($_REQUEST['id']);
	}	
	$smarty->assign('adtypeList',$adtypeList);
	$smarty->assign('ad',$ad);
	$smarty->assign('img',$img);
	$tpl = $tpl_dir.'ad_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	$adService->addAd($_POST);
	toList();
}
elseif ($action == 'doUpdate'){//提交更新
	$adService->updateAd($_POST);
	toList();
}
elseif ($action == 'delete'){//执行删除
	$adService->delAdById($_REQUEST['id']);
	toList();
}
else{//管理列表
	toList();
}
$html->show();
$smarty->assign('path',ECMS_PATH_AD_URL);
$smarty->display($tpl);

function toList(){//列表
	global $adService,$adList,$tpl,$smarty,$tpl_dir;
	$adList = $adService->getAdList();
	$smarty->assign('adList',$adList);
	$tpl = $tpl_dir.'ad_list.tpl';
}