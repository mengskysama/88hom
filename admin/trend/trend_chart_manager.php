<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-13
 * 走势数据图
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('trend_chart');//是否有对走势图管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$tpl = null;
$trendData = null;
$trendChart = null;
$trendDataList = null;
$trendAreaList = null;
$trendChartList = null;
$trendCategoryList = null;
$trendDataDAO = new TrendDataDAO($db);
$trendAreaDAO = new TrendAreaDAO($db);
$trendCategoryDAO = new TrendCategoryDAO($db);
$trendChartDAO = new TrendChartDAO($db);
$trendService = new TrendService($db);


if($action == 'add'){//初始化插入
	$trendAreaList = $trendAreaDAO->getTrendAreaList();
	$trendCategoryList = $trendCategoryDAO->getTrendCategoryList();
	$smarty->assign('trendAreaList',$trendAreaList);
	$smarty->assign('trendCategoryList',$trendCategoryList);	
	$tpl = $tpl_dir.'trend_chart_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$trendChart = $trendChartDAO->getTrendChartById($_REQUEST['id']);
	$trendAreaList = $trendAreaDAO->getTrendAreaList();
	$trendCategoryList = $trendCategoryDAO->getTrendCategoryList();
	$smarty->assign('trendAreaList',$trendAreaList);
	$smarty->assign('trendCategoryList',$trendCategoryList);
	$smarty->assign('trendChart',$trendChart);
	$tpl = $tpl_dir.'trend_chart_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	$temp = $trendChartDAO->countTrendChart(" where city='".$_REQUEST['city']."' and areaId=".$_REQUEST['areaId']." and categoryId=".$_REQUEST['categoryId'].
			" and type='".$_REQUEST['type']."' and subType='".$_REQUEST['subType']."'");
	if($temp[0]>0)
		$html->backUrl('这条数据已经存在！');
	else{
		$trendChartDAO->release($_REQUEST);
		toList();	
	}	
}
elseif ($action == 'doUpdate'){//提交更新
	$trendChartDAO->modify($_REQUEST);
	toList();
}
elseif ($action == 'delete'){//执行删除
	$trendChartDAO->delTrendChartById($_REQUEST['id']);
	toList();
}
elseif ($action == 'view'){//执行删除
	$trendChart = $trendChartDAO->getTrendChartById($_REQUEST['id']);
	$smarty->assign('trendChart',$trendChart);
	$tpl = $tpl_dir.'trend_chart_view.tpl';
}
elseif ($action == 'getChart'){//执行删除
	$trendChart = $trendChartDAO->getTrendChartById($_REQUEST['id']);
	echo $trendService->getChartJsonById($_REQUEST['id']);
}
else{//管理列表
	toList();
}
if($action != 'getChart')
{
	$html->show();
	$smarty->display($tpl);
}


function toList(){//列表
	global $trendDataDAO,$trendChartDAO,$trendDataList,$trendService,$tpl,$smarty,$tpl_dir,$trendAreaList,$trendAreaDAO,$trendCategoryList,$trendCategoryDAO;
	$params = $trendService->getTrendChartPageListParam($_REQUEST);
	$searchType = (!isset($_REQUEST['searchType'])||isset($_REQUEST['searchType'])&&empty($_REQUEST['searchType']))?'':$_REQUEST['searchType'];
	$city = (!isset($_REQUEST['city'])||isset($_REQUEST['city'])&&empty($_REQUEST['city']))?'':$_REQUEST['city'];
	$areaId = (!isset($_REQUEST['areaId'])||isset($_REQUEST['areaId'])&&empty($_REQUEST['areaId']))?'':$_REQUEST['areaId'];
	$categoryId = (!isset($_REQUEST['categoryId'])||isset($_REQUEST['categoryId'])&&empty($_REQUEST['categoryId']))?'':$_REQUEST['categoryId'];
	$type = (!isset($_REQUEST['type'])||isset($_REQUEST['type'])&&empty($_REQUEST['type']))?'':$_REQUEST['type'];
	$subType = (!isset($_REQUEST['subType'])||isset($_REQUEST['subType'])&&empty($_REQUEST['subType']))?'':$_REQUEST['subType'];


	
	$pageSize = 4;
	$page = empty($_REQUEST['page'])?1:$_REQUEST['page'];
	$limit = ' limit '.(($page-1)*$pageSize).','.$pageSize;
	$where = $params[0]==''?'':' where '.$params[0];

	
	$trendChartList = $trendService->getTrendChartList($where.' order by updateTime desc' .$limit);
	$totalNum = $trendChartDAO->countTrendChart($where);
	$pageHtml = $totalNum[0]>0?sysAdminPageInfo($totalNum[0],$pageSize,$page,'trend_chart_manager.php?'.$params[1],''):'';//分页html

	$smarty->assign('trendChartList',$trendChartList);
	$trendAreaList = $trendAreaDAO->getTrendAreaList();
	$smarty->assign('trendAreaList',$trendAreaList);
	$trendCategoryList = $trendCategoryDAO->getTrendCategoryList();
	$smarty->assign('trendCategoryList',$trendCategoryList);
	$smarty->assign('city',$city);
	$smarty->assign('areaId',$areaId);
	$smarty->assign('type',$type);
	$smarty->assign('subType',$subType);
	$smarty->assign('categoryId',$categoryId);
	$smarty->assign('searchType',$searchType);
	$smarty->assign('pageHtml',$pageHtml);
	$tpl = $tpl_dir.'trend_chart_list.tpl';
}