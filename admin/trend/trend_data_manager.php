<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-10
 * 走势数据管理
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('trend_data');//是否有对走势数据管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$trendDataDAO = new TrendDataDAO($db);
$trendService = new TrendService($db);
$trendData = null;
$trendDataList = null;
$trendAreaDAO = new TrendAreaDAO($db);
$trendAreaList = null;
$tpl = null;

if($action == 'add'){//初始化插入
	global $smarty;
	$trendAreaList = $trendAreaDAO->getTrendAreaList();
	$smarty->assign('trendAreaList',$trendAreaList);	
	$tpl = $tpl_dir.'trend_data_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$trendData = $trendDataDAO->getTrendDataById($_REQUEST['id']);
	$trendAreaList = $trendAreaDAO->getTrendAreaList();
	$smarty->assign('trendAreaList',$trendAreaList);
	$smarty->assign('trendData',$trendData);
	$tpl = $tpl_dir.'trend_data_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	$temp = $trendDataDAO->countTrendData(" where city='".$_REQUEST['city']."' and areaId=".$_REQUEST['areaId']." and year=".$_REQUEST['year'].
			" and month=".$_REQUEST['month']." and type='".$_REQUEST['type']."' and subType='".$_REQUEST['subType']."'");
	if($temp[0]>0)
		$html->backUrl('这条数据已经存在！');
	else{
		$trendDataDAO->release($_REQUEST);
		toList();	
	}	
	
}
elseif ($action == 'doUpdate'){//提交更新
	$trendDataDAO->modify($_REQUEST);
	toList();
}
elseif ($action == 'delete'){//执行删除
	$trendDataDAO->delTrendDataById($_REQUEST['id']);
	toList();
}
else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $trendDataDAO,$trendDataList,$trendService,$tpl,$smarty,$tpl_dir,$trendAreaList,$trendAreaDAO;
	$params = $trendService->getTrendDataPageListParam($_REQUEST);
	$searchType = (!isset($_REQUEST['searchType'])||isset($_REQUEST['searchType'])&&empty($_REQUEST['searchType']))?'':$_REQUEST['searchType'];
	$city = (!isset($_REQUEST['city'])||isset($_REQUEST['city'])&&empty($_REQUEST['city']))?'':$_REQUEST['city'];
	$areaId = (!isset($_REQUEST['areaId'])||isset($_REQUEST['areaId'])&&empty($_REQUEST['areaId']))?'':$_REQUEST['areaId'];
	$type = (!isset($_REQUEST['type'])||isset($_REQUEST['type'])&&empty($_REQUEST['type']))?'':$_REQUEST['type'];
	$subType = (!isset($_REQUEST['subType'])||isset($_REQUEST['subType'])&&empty($_REQUEST['subType']))?'':$_REQUEST['subType'];
	$year = (!isset($_REQUEST['year'])||isset($_REQUEST['year'])&&empty($_REQUEST['year']))?'':$_REQUEST['year'];
	$month = (!isset($_REQUEST['month'])||isset($_REQUEST['month'])&&empty($_REQUEST['month']))?'':$_REQUEST['month'];

	
	$pageSize = 15;
	$page = empty($_REQUEST['page'])?1:$_REQUEST['page'];
	$limit = ' limit '.(($page-1)*$pageSize).','.$pageSize;
	$where = $params[0]==''?'':' where '.$params[0];

	
	$trendDataList = $trendService->getTrendDataList($where.' order by areaId asc , year desc ,month asc'.$limit);
	$totalNum = $trendDataDAO->countTrendData($where);
	$pageHtml = $totalNum[0]>0?sysAdminPageInfo($totalNum[0],$pageSize,$page,'trend_data_manager.php?'.$params[1],''):'';//分页html

	$smarty->assign('trendDataList',$trendDataList);
	$trendAreaList = $trendAreaDAO->getTrendAreaList();
	$smarty->assign('trendAreaList',$trendAreaList);
	$smarty->assign('city',$city);
	$smarty->assign('areaId',$areaId);
	$smarty->assign('type',$type);
	$smarty->assign('subType',$subType);
	$smarty->assign('year',$year);
	$smarty->assign('month',$month);
	$smarty->assign('searchType',$searchType);
	$smarty->assign('pageHtml',$pageHtml);
	$tpl = $tpl_dir.'trend_data_list.tpl';
}