<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-24
 * 装修设计图库
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('furnitureDesignPic');//是否有对装修设计图库管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$tpl = null;
$furnitureDesignPic = null;
$furnitureDesignPicList = null;
$furnitureService = new FurnitureService($db);
$picDAO = new PicDAO($db);

if($action == 'add'){//初始化插入
	$timestamp=time();
	$token=md5('unique_salt' . $timestamp);

	$smarty->assign('timestamp',$timestamp);
	$smarty->assign('token',$token);
	$tpl = $tpl_dir.'furniture_design_pic_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$pic = $picDAO->getPicById($_REQUEST['id']);
	$timestamp=time();
	$token=md5('unique_salt' . $timestamp);

	$smarty->assign('timestamp',$timestamp);
	$smarty->assign('token',$token);
	$smarty->assign('pic',$pic);
	$tpl = $tpl_dir.'furniture_design_pic_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	for($i=0;$i<count($_POST['name']);$i++){//插入多个图片
			$picDAO->release(array('picBuildId'=>$_POST['picBuildId'],'pictypeId'=>$_POST['pictypeId'],'picBuildFatherType'=>3,
			'picBuildType'=>0,'picSellRent'=>0,'picUrl'=>$_POST['path'][$i],'picThumb'=>$_POST['pathThumb'][$i],
			'picInfo'=>(empty($_POST['name'][$i])?$cfg['arr_pic']['furnitureDesignPicType'][$_POST['picBuildId']].'-'.$cfg['arr_pic']['furnitureDesignPicSubType'][$_POST['picBuildId']][$_POST['pictypeId']]:$_POST['name'][$i]),'picLayer'=>$_POST['orderNum'][$i],'picState'=>1));
	}
	toList();	
}
elseif ($action == 'doUpdate'){//提交更新
	$pic = $picDAO->getPicById($_REQUEST['picId']);
	$picDAO->modify($_POST);
	if($_POST['picUrl'] != $pic['picUrl'])
	{
		if(file_exists(ECMS_PATH_UPLOADS.$pic['picUrl']))
			unlink(ECMS_PATH_UPLOADS.$pic['picUrl']);//删除大图文件
		if(file_exists(ECMS_PATH_UPLOADS.$pic['picThumb']))
			unlink(ECMS_PATH_UPLOADS.$pic['picThumb']);//删除缩略图文件
	}
	toList();
}
elseif ($action == 'delete'){//执行删除
	$pic = $picDAO->getPicById($_REQUEST['id']);
	if(file_exists(ECMS_PATH_UPLOADS.$pic['picUrl']))
		unlink(ECMS_PATH_UPLOADS.$pic['picUrl']);//删除大图文件
	if(file_exists(ECMS_PATH_UPLOADS.$pic['picThumb']))
		unlink(ECMS_PATH_UPLOADS.$pic['picThumb']);//删除缩略图文件
	$picDAO->delPicById($_REQUEST['id']);//删除记录
	toList();
}
//返回家居装修设计图库某大类下某小类的json格式
elseif ($action == 'getSubPicTypeJsonByParentId'){
	echo $furnitureService->getSubPicTypeJsonByParentId($_REQUEST['id']);
	exit(0);
}
else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $furnitureDesignPicList,$picDAO,$tpl,$smarty,$tpl_dir,$action;
	
	$picInfo = (!isset($_REQUEST['picInfo'])||isset($_REQUEST['picInfo'])&&empty($_REQUEST['picInfo']))?'':$_REQUEST['picInfo'];//信息
	$picBuildId = (!isset($_REQUEST['picBuildId'])||isset($_REQUEST['picBuildId'])&&empty($_REQUEST['picBuildId']))?'':$_REQUEST['picBuildId'];//大类
	$pictypeId = (!isset($_REQUEST['pictypeId'])||isset($_REQUEST['pictypeId'])&&empty($_REQUEST['pictypeId']))?'':$_REQUEST['pictypeId'];//小类
	
	if($action == 'doAdd' || $action == 'doUpdate')//不过虑
	{
		$picInfo = '';
		$picBuildId = '';
		$pictypeId = '';
	}
	
	$where = '';
	$pageStr = '';
	
	if($picInfo != ''){
		$where .= " and picInfo like '%".$picInfo."%' ";
		$pageStr .= "&picInfo=".$picInfo;
	}
	else {
		$pageStr .= "&picInfo=";
	}
	if($picBuildId != '')
	{
		$where .= " and picBuildId=".$picBuildId;
		$pageStr .= "&picBuildId=".$picBuildId;
	}
	else{
		$pageStr .= "&picBuildId=";
	}
	if($pictypeId != '')
	{
		$where .= " and pictypeId=".$pictypeId;
		$pageStr .= "&pictypeId=".$pictypeId;
	}
	else{
		$pageStr .= "&pictypeId=";
	}
	if($pageStr == '')
		$pageStr .= 'page';
	else 
		$pageStr .= '&page';
		
	$pageSize = 14;//每页15条
	$page = empty($_REQUEST['page'])?1:$_REQUEST['page'];
	$limit = ' limit '.(($page-1)*$pageSize).','.$pageSize;
	//$where = $params[0]==''?'':' where '.$params[0];
	$where = ' where picBuildFatherType=3 '.$where;
	$furnitureDesignPicList = $picDAO->getPicList('*',$where,' order by picLayer desc,picUpdateTime desc ',$limit);
	//$communityList = $communityService->getCommunityList($where.' order by communityOrderNum desc,communityCreateTime desc' .$limit);//按排序号，更新时间倒序排序
	
	$totalNum = $picDAO->countPic($where);
	$pageHtml = $totalNum[0]>0?sysAdminPageInfo($totalNum[0],$pageSize,$page,'furniture_design_pic_manager.php?'.$pageStr,''):'';//分页html

	$smarty->assign('picInfo',$picInfo);
	$smarty->assign('picBuildId',$picBuildId);
	$smarty->assign('pictypeId',$pictypeId);
	$smarty->assign('pageHtml',$pageHtml);
	$smarty->assign('furnitureDesignPicList',$furnitureDesignPicList);
	$tpl = $tpl_dir.'furniture_design_pic_list.tpl';
}
