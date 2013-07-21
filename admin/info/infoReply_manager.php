<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-06-26
 * 信息
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('infoReply');//是否有对信息回复管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$tpl = null;
$info = null;
$infoReplyList = null;
$infoReplyDAO = new InfoReplyDAO($db);
$infoReplyService = new InfoReplyService($db);
$infoDAO = new InfoDAO($db);

if($action == 'pass'){//通过审核
	$infoReplyDAO->changeState(1, $_REQUEST['id']);
	toList();
}
elseif ($action == 'delete'){//删除
	$infoReplyDAO->delInfoReplyById($_REQUEST['id']);
	toList();
}

else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $action,$info,$infoDAO,$infoReplyList,$infoReplyService,$tpl,$smarty,$tpl_dir;
	
	$infoId = (!isset($_REQUEST['infoId'])||isset($_REQUEST['infoId'])&&empty($_REQUEST['infoId']))?'':$_REQUEST['infoId'];
	$state = (!isset($_REQUEST['state'])||isset($_REQUEST['state'])&&empty($_REQUEST['state']))?0:$_REQUEST['state'];

	$pageStr = '';
	
	if($infoId != ''){
		$pageStr .= "&infoId=".$infoId;
	}
	else {
		$pageStr .= "&infoId=";
	}
	if($state != ''){
		$pageStr .= "&state=".$state;
	}
	else {
		$pageStr .= "&state=";
	}
	
	$info = $infoDAO->getInfoById($infoId);	


	if($pageStr == '')
		$pageStr .= 'page';
	else 
		$pageStr .= '&page';
		
	$pageSize = 10;//每页10条
	$page = empty($_REQUEST['page'])?1:$_REQUEST['page'];
	$limit = ' limit '.(($page-1)*$pageSize).','.$pageSize;

	$infoReplyList = $infoReplyService->getInfoReplyList($infoId, $state,$limit);
	
	$totalNum = $infoReplyService->countInfoReplyList($infoId, $state);
	$pageHtml = $totalNum[0]>0?sysAdminPageInfo($totalNum[0],$pageSize,$page,'infoReply_manager.php?'.$pageStr,''):'';//分页html

	$smarty->assign('info',$info);
	$smarty->assign('infoReplyList',$infoReplyList);
	$smarty->assign('pageHtml',$pageHtml);
	$smarty->assign('state',$state);
	$tpl = $tpl_dir.'infoReply_list.tpl';
}
