<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-06-26
 * 信息
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('info');//是否有对信息管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$tpl = null;
$info = null;
$infoList = null;
$infoTypeList = null;
$infoDAO = new InfoDAO($db);
$infoTypeDAO = new InfoTypeDAO($db);
//$infoService = new InfoService($db);

if($action == 'add'){//初始化插入
	$infoSummary=createCKeditor('infoSummary',0,700,80,'');//信息摘要
	$infoContent=createCKeditor('infoContent',1,700,400,'');//信息内容
	$smarty->assign('infoSummary',$infoSummary);
	$smarty->assign('infoContent',$infoContent);
	$tpl = $tpl_dir.'info_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$info = $infoDAO->getInfoById($_REQUEST['id']);
	$infoSummary=createCKeditor('infoSummary',0,700,80,$info['infoSummary']);
	$infoContent=createCKeditor('infoContent',1,700,400,$info['infoContent']);
	$infoTypeList = $infoTypeDAO->getInfoTypeListByInfoId($_REQUEST['id']);
	$smarty->assign('info',$info);
	$smarty->assign('infoTypeList',$infoTypeList);
	$smarty->assign('infoSummary',$infoSummary);
	$smarty->assign('infoContent',$infoContent);
	$tpl = $tpl_dir.'info_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	$_REQUEST['infoUserId'] = $_SESSION['Admin_User']['userId'];
	$infoDAO->release($_REQUEST);//插入新闻
	for($i=0;$i<count($_REQUEST['infotype']);$i++)
	{
		$type = explode('-', $_REQUEST['infotype']);
		$infoTypeDAO->release(//插入一条或多条新闻类别
			array(
				'infoId'=>mysql_insert_id(),
				'infotypeId'=>$type[0],
				'infotypeSubId'=>$type[1]
			)
		);
	}
	toList();	
}
elseif ($action == 'doUpdate'){//提交更新
	$info = $infoService->getCommunityById($_REQUEST['infoId']);
	$smarty->assign('info',$info);
	$tpl = $tpl_dir.'info_detail.tpl';
	//toList();
}
elseif ($action == 'delete'){//执行删除
	$info = $infoDAO->getInfoById($_REQUEST['id']);
	if(file_exists(ECMS_PATH_UPLOADS.$info['infoPic']))
		unlink(ECMS_PATH_UPLOADS.$info['infoPic']);//删除大图文件
	if(file_exists(ECMS_PATH_UPLOADS.$info['infoPicThumb']))
		unlink(ECMS_PATH_UPLOADS.$info['infoPicThumb']);//删除缩略图文件
	$infoDAO->delInfoById($_REQUEST['id']);
	$infoTypeDAO->delInfoTypeByInfoId($_REQUEST['id']);
	toList();
}
elseif ($action == 'detail'){//详细
	$info = $infoDAO->getInfoById($_REQUEST['id']);
	$infoTypeList = $infoTypeDAO->getInfoTypeListByInfoId($_REQUEST['id']);

	$smarty->assign('infoTypeList',$infoTypeList);
	$smarty->assign('info',$info);
	$tpl = $tpl_dir.'info_detail.tpl';
}
else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $action,$infoList,$infoDAO,$infoService,$tpl,$smarty,$tpl_dir;
	
	$infoTitle = (!isset($_REQUEST['infoTitle'])||isset($_REQUEST['infoTitle'])&&empty($_REQUEST['infoTitle']))?'':$_REQUEST['infoTitle'];
	$infoType = (!isset($_REQUEST['infoType'])||isset($_REQUEST['infoType'])&&empty($_REQUEST['infoType']))?'':$_REQUEST['infoType'];

	if($action == 'doAdd' || $action == 'doUpdate')//不过虑
	{
		$infoTitle = '';
		$infoType = '';
	}
	
	$where = '';
	$pageStr = '';
	
	if($infoTitle != ''){
		$where .= " and infoTitle like '%".$infoTitle."%' ";
		$pageStr .= "&infoTitle=".$infoTitle;
	}
	else {
		$pageStr .= "&infoTitle=";
	}
	if($infoType != '')
	{
		$where .= " and picBuildId=".$picBuildId;
		$pageStr .= "&picBuildId=".$picBuildId;
	}
	else{
		$pageStr .= "&picBuildId=";
	}

	if($pageStr == '')
		$pageStr .= 'page';
	else 
		$pageStr .= '&page';
		
	$pageSize = 15;//每页15条
	$page = empty($_REQUEST['page'])?1:$_REQUEST['page'];
	$limit = ' limit '.(($page-1)*$pageSize).','.$pageSize;

	$where = ' where picBuildFatherType=3 '.$where;
	$furnitureDesignPicList = $picDAO->getPicList('*',$where,' order by infoLayer desc,infoUpdateTime desc ',$limit);
	
	$totalNum = $picDAO->countPic($where);
	$pageHtml = $totalNum[0]>0?sysAdminPageInfo($totalNum[0],$pageSize,$page,'info_manager.php?'.$pageStr,''):'';//分页html

	$smarty->assign('infoList',$infoList);
	$smarty->assign('picBuildId',$picBuildId);
	$smarty->assign('pictypeId',$pictypeId);
	$smarty->assign('pageHtml',$pageHtml);
	$tpl = $tpl_dir.'info_list.tpl';
}
