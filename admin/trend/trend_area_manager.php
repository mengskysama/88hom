<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-10
 * 走势区域或项管理
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('trend_area');//是否有对走势区域或项目管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$trendAreaDAO = new TrendAreaDAO($db);
$trendArea = null;
$trendAreaList = null;
$tpl = null;

if($action == 'add'){//初始化插入
	$tpl = $tpl_dir.'trend_area_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$trendArea = $trendAreaDAO->getTrendAreaById($_REQUEST['id']);
	$smarty->assign('trendArea',$trendArea);
	$tpl = $tpl_dir.'trend_area_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	$temp = $trendAreaDAO->countTrendArea(" where name='".$_POST['name']."'");
	if($temp[0]>0)
		$html->backUrl('这个区域或项目已经存在！');
	else{
		$trendAreaDAO->release($_POST);
		toList();	
	}	
	
}
elseif ($action == 'doUpdate'){//提交更新
	$trendAreaDAO->modify($_POST);
	toList();
}
elseif ($action == 'delete'){//执行删除
	$trendAreaDAO->delTrendAreaById($_REQUEST['id']);
	toList();
}
else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $trendAreaDAO,$trendAreaList,$tpl,$smarty,$tpl_dir;
	$trendAreaList = $trendAreaDAO->getTrendAreaList('*','','','');
	$smarty->assign('trendAreaList',$trendAreaList);
	$tpl = $tpl_dir.'trend_area_list.tpl';
}