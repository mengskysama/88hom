<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-23
 * 广告类别管理，控制类
 */
require 'path.inc.php';
//$userService=new UserService($db);
//$userService->checkAdminUserExpired();//登陆是否期
//$permissionsState=sysPermissionsChecking('adType');//是否有对广告类别管理的权限
//if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$adTypeDAO = new AdTypeDAO($db);
$adService = new AdService($db);
$adType = null;
$adTypeList = null;
$tpl = null;

if($action == 'add'){//初始化插入
	$tpl = $tpl_dir.'type_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$adType = $adTypeDAO->getAdTypeById($_REQUEST['id']);
	$smarty->assign('adType',$adType);
	$tpl = $tpl_dir.'type_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	
	toList();
}
elseif ($action == 'doUpdate'){//提交更新
	$adTypeDAO->modify($_POST);
	toList();
}
elseif ($action == 'delete'){//执行删除
	$adService->delAdTypeById($_REQUEST['id']);
	toList();
}
else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $adTypeDAO,$adTypeList,$tpl,$smarty,$tpl_dir;
	$adTypeList = $adTypeDAO->getAdTypeList('*','','order by adtypeUpdateTime desc','');
	$smarty->assign('adTypeList',$adTypeList);
	$tpl = $tpl_dir.'type_list.tpl';
}