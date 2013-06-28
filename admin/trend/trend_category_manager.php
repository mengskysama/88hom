<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-10
 * 走势类别管理
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('trend_category');//是否有对走势类别管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$trendCategoryDAO = new TrendCategoryDAO($db);
//$adService = new AdService($db);
$trendCategory = null;
$trendCategoryList = null;
$tpl = null;

if($action == 'add'){//初始化插入
	$tpl = $tpl_dir.'trend_category_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$trendCategory = $trendCategoryDAO->getTrendCategoryById($_REQUEST['id']);
	$smarty->assign('trendCategory',$trendCategory);
	$tpl = $tpl_dir.'trend_category_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	$temp = $trendCategoryDAO->countTrendCategory(" where name='".$_POST['name']."'");
	if($temp[0]>0)
		$html->backUrl('这个类别名已经存在！');
	else{
		$trendCategoryDAO->release($_POST);
		toList();	
	}	
	
}
elseif ($action == 'doUpdate'){//提交更新
	$trendCategoryDAO->modify($_POST);
	toList();
}
elseif ($action == 'delete'){//执行删除
	$trendCategoryDAO->delTrendCategoryById($_REQUEST['id']);
	toList();
}
else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $trendCategoryDAO,$trendCategoryList,$tpl,$smarty,$tpl_dir;
	$trendCategoryList = $trendCategoryDAO->getTrendCategoryList('*','','','');
	$smarty->assign('trendCategoryList',$trendCategoryList);
	$tpl = $tpl_dir.'trend_category_list.tpl';
}