<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-24
 * 小区
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('community');//是否有对小区管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$tpl = null;
$community = null;
$communityList = null;
$communityDAO = new CommunityDAO($db);
$communityService = new CommunityService($db);
$pic = null;
$picDAO = new PicDAO($db);

if($action == 'add'){//初始化插入
	$traffic=createCKeditor('communityTraffic',0,700,80,'');
	$periInfo=createCKeditor('communityPeriInfo',0,700,80,'');
	$buildInfo=createCKeditor('communityBuildInfo',0,700,80,'');
	$smarty->assign('traffic',$traffic);
	$smarty->assign('periInfo',$periInfo);
	$smarty->assign('buildInfo',$buildInfo);
	$tpl = $tpl_dir.'community_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$community = $communityDAO->getCommunityById($_REQUEST['id']);
	$traffic=createCKeditor('communityTraffic',0,700,80,$community['communityTraffic']);
	$periInfo=createCKeditor('communityPeriInfo',0,700,80,$community['communityPeriInfo']);
	$buildInfo=createCKeditor('communityBuildInfo',0,700,80,$community['communityBuildInfo']);
	$smarty->assign('traffic',$traffic);
	$smarty->assign('periInfo',$periInfo);
	$smarty->assign('buildInfo',$buildInfo);
	$smarty->assign('community',$community);
	$tpl = $tpl_dir.'community_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	$areaIndexArr = explode("-",$_REQUEST['areaIndex']);
	$_REQUEST['communityProvince'] = $areaIndexArr[0];
	$_REQUEST['communityCity'] = $areaIndexArr[1];
	$_REQUEST['communityDistrict'] = $areaIndexArr[2];
	$_REQUEST['communityArea'] = $areaIndexArr[3];
	$_REQUEST['communityUserId'] = $_SESSION['Admin_User']['userId'];
	$communityMapArr = null;
	if(!empty($_REQUEST['communityMap'])){
		$communityMapArr = explode(",",$_REQUEST['communityMap']);
		$_REQUEST['communityMapX'] = $communityMapArr[0];
		$_REQUEST['communityMapY'] = $communityMapArr[1];
	}
	else{
		$_REQUEST['communityMapX'] = 0;
		$_REQUEST['communityMapY'] = 0;
	}
	
	$communityDAO->release($_REQUEST);
	toList();	
}
elseif ($action == 'doUpdate'){//提交更新
	$areaIndexArr = explode("-",$_REQUEST['areaIndex']);
	$_REQUEST['communityProvince'] = $areaIndexArr[0];
	$_REQUEST['communityCity'] = $areaIndexArr[1];
	$_REQUEST['communityDistrict'] = $areaIndexArr[2];
	$_REQUEST['communityArea'] = $areaIndexArr[3];
	$_REQUEST['communityUserId'] = $_SESSION['Admin_User']['userId'];
	
	$communityMapArr = null;
	if(!empty($_REQUEST['communityMap'])){
		$communityMapArr = explode(",",$_REQUEST['communityMap']);
		$_REQUEST['communityMapX'] = $communityMapArr[0];
		$_REQUEST['communityMapY'] = $communityMapArr[1];
	}
	else{
		$_REQUEST['communityMapX'] = 0;
		$_REQUEST['communityMapY'] = 0;
	}
	
	$communityDAO->modify($_REQUEST);
	
	$picTypeList = $communityService->getPicTypeByBuildId($_REQUEST['communityId']);
	$temp = array();
	for($i=0;$i<count($picTypeList);$i++){
		$picList = $communityService->getPicByBuildIdAndPicTypeId($_REQUEST['communityId'], $picTypeList[$i]['pictypeId']);
		$temp[$i] = array('type'=>$picTypeList[$i],'picList'=>$picList);
	}
	$smarty->assign('picList',$temp);
	
	$community = $communityService->getCommunityById($_REQUEST['communityId']);
	$smarty->assign('community',$community);
	$tpl = $tpl_dir.'community_detail.tpl';
	//toList();
}
elseif ($action == 'delete'){//执行删除
	$picList = $picDAO->getPicList('*',' where picBuildFatherType=1 and picBuildId='.$_REQUEST['id'],'','');
	if($picDAO->delPic(' where picBuildFatherType=1 and picBuildId='.$_REQUEST['id'])>0){
		for($i=0;$i<count($picList);$i++)
		{
			if(file_exists(ECMS_PATH_UPLOADS.$picList[$i]['picUrl']))
				unlink(ECMS_PATH_UPLOADS.$picList[$i]['picUrl']);//删除大图文件
			if(file_exists(ECMS_PATH_UPLOADS.$picList[$i]['picThumb']))
				unlink(ECMS_PATH_UPLOADS.$picList[$i]['picThumb']);//删除缩略图文件
		}
	}
	$communityDAO->delCommunityById($_REQUEST['id']);
	toList();
}
elseif ($action == 'detail'){//详细
	$community = $communityService->getCommunityById($_REQUEST['id']);
	$picTypeList = $communityService->getPicTypeByBuildId($_REQUEST['id']);
	$temp = array();
	for($i=0;$i<count($picTypeList);$i++){
		$picList = $communityService->getPicByBuildIdAndPicTypeId($_REQUEST['id'], $picTypeList[$i]['pictypeId']);
		$temp[$i] = array('type'=>$picTypeList[$i],'picList'=>$picList);
	}
	$smarty->assign('picList',$temp);
	$smarty->assign('community',$community);
	$tpl = $tpl_dir.'community_detail.tpl';
}
elseif ($action == 'pic'){//小区相册
	$subAction = $_REQUEST['subAction'];
	$picBuildId = $_REQUEST['picBuildId'];
	$smarty->assign('picBuildId',$picBuildId);
	
	if($subAction == 'add'){
		$timestamp=time();
		$token=md5('unique_salt' . $timestamp);

		$smarty->assign('timestamp',$timestamp);
		$smarty->assign('token',$token);
		$tpl = $tpl_dir.'community_pic_add.tpl';
	}
	else if($subAction == 'update'){
		$timestamp=time();
		$token=md5('unique_salt' . $timestamp);
		$pic = $picDAO->getPicById($_REQUEST['id']);
		$smarty->assign('pic',$pic);
		$smarty->assign('timestamp',$timestamp);
		$smarty->assign('token',$token);
		$tpl = $tpl_dir.'community_pic_update.tpl';
	}
	else if($subAction == 'doAdd'){
		$tempCommunity = $communityDAO->getCommunityById($_REQUEST['picBuildId']);
		$defaultPicName = $C[$tempCommunity['communityProvince']][$tempCommunity['communityCity']];//市
		//$defaultPicName = $D[$tempCommunity['communityProvince']][$tempCommunity['communityCity']][$tempCommunity['communityDistrict']];//区名
		//$defaultPicName .= $A[$tempCommunity['communityProvince']][$tempCommunity['communityCity']][$tempCommunity['communityDistrict']][$tempCommunity['communityArea']];//片区名
		$defaultPicName .= ' '.$tempCommunity['communityName'];//小区名
		$defaultPicName .= ' '.$cfg['arr_pic']['communityPicType'][$_POST['pictypeId']];//图片类别

		for($i=0;$i<count($_POST['name']);$i++){//插入多个图片
			$picDAO->release(array('picBuildId'=>$_POST['picBuildId'],'pictypeId'=>$_POST['pictypeId'],'picBuildFatherType'=>1,
			'picBuildType'=>0,'picSellRent'=>0,'picUrl'=>$_POST['path'][$i],'picThumb'=>$_POST['pathThumb'][$i],
			'picInfo'=>(empty($_POST['name'][$i])?$defaultPicName:$_POST['name'][$i]),'picLayer'=>$_POST['orderNum'][$i],'picState'=>1));
		}
		toPicList($picBuildId);
	}
	else if($subAction == 'doUpdate'){
		$pic = $picDAO->getPicById($_REQUEST['picId']);
		$picDAO->modify($_POST);
		if($_POST['picUrl'] != $pic['picUrl'])
		{
			if(file_exists(ECMS_PATH_UPLOADS.$pic['picUrl']))
				unlink(ECMS_PATH_UPLOADS.$pic['picUrl']);//删除大图文件
			if(file_exists(ECMS_PATH_UPLOADS.$pic['picThumb']))
				unlink(ECMS_PATH_UPLOADS.$pic['picThumb']);//删除缩略图文件
		}
		toPicList($picBuildId);
	}
	else if($subAction == 'delete'){//删除图片
		$pic = $picDAO->getPicById($_REQUEST['id']);
		if(!empty($pic)){
			if(file_exists(ECMS_PATH_UPLOADS.$pic['picUrl']))
				unlink(ECMS_PATH_UPLOADS.$pic['picUrl']);//删除大图文件
			if(file_exists(ECMS_PATH_UPLOADS.$pic['picThumb']))
				unlink(ECMS_PATH_UPLOADS.$pic['picThumb']);//删除缩略图文件
			$picDAO->delPicById($_REQUEST['id']);//删除记录
		}
		toPicList($picBuildId);
	}
	else{
		toPicList($picBuildId);
	}
}
else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $communityList,$communityDAO,$communityService,$tpl,$smarty,$tpl_dir;
	$params = $communityService->getCommunityPageListParam($_REQUEST);
	$searchType = (!isset($_REQUEST['searchType'])||isset($_REQUEST['searchType'])&&empty($_REQUEST['searchType']))?'':$_REQUEST['searchType'];
	$name = (!isset($_REQUEST['name'])||isset($_REQUEST['name'])&&empty($_REQUEST['name']))?'':$_REQUEST['name'];
	$areaIndex = (!isset($_REQUEST['areaIndex'])||isset($_REQUEST['areaIndex'])&&empty($_REQUEST['areaIndex']))?'':$_REQUEST['areaIndex'];//区域下标,前台与area.js,后台与area.php对应
	$isHouseType = (!isset($_REQUEST['isHouseType'])||isset($_REQUEST['isHouseType'])&&empty($_REQUEST['isHouseType']))?'':$_REQUEST['isHouseType'];
	$isBusinessType = (!isset($_REQUEST['isBusinessType'])||isset($_REQUEST['isBusinessType'])&&empty($_REQUEST['isBusinessType']))?'':$_REQUEST['isBusinessType'];
	$isOfficeType = (!isset($_REQUEST['isOfficeType'])||isset($_REQUEST['isOfficeType'])&&empty($_REQUEST['isOfficeType']))?'':$_REQUEST['isOfficeType'];
	$isVillaType = (!isset($_REQUEST['isVillaType'])||isset($_REQUEST['isVillaType'])&&empty($_REQUEST['isVillaType']))?'':$_REQUEST['isVillaType'];

	$pageSize = 15;//每页15条
	$page = empty($_REQUEST['page'])?1:$_REQUEST['page'];
	$limit = ' limit '.(($page-1)*$pageSize).','.$pageSize;
	$where = $params[0]==''?'':' where '.$params[0];
	
	
	$communityList = $communityService->getCommunityList($where.' order by communityOrderNum desc,communityCreateTime desc' .$limit);//按排序号，更新时间倒序排序
	
	$totalNum = $communityDAO->countCommunity($where);
	$pageHtml = $totalNum[0]>0?sysAdminPageInfo($totalNum[0],$pageSize,$page,'community_manager.php?'.$params[1],''):'';//分页html

	$smarty->assign('communityList',$communityList);
	$smarty->assign('searchType',$searchType);
	$smarty->assign('name',$name);
	$smarty->assign('areaIndex',$areaIndex);
	$smarty->assign('isHouseType',$isHouseType);
	$smarty->assign('isBusinessType',$isBusinessType);
	$smarty->assign('isOfficeType',$isOfficeType);
	$smarty->assign('isVillaType',$isVillaType);
	$smarty->assign('pageHtml',$pageHtml);
	$tpl = $tpl_dir.'community_list.tpl';
}
function toPicList($buildId){//图片列表,$buildId小区id
	global $community,$communityDAO,$communityService,$tpl,$smarty,$tpl_dir;
	$community = $communityDAO->getCommunityById($buildId);
	$picTypeList = $communityService->getPicTypeByBuildId($buildId);
	$temp = array();
	for($i=0;$i<count($picTypeList);$i++){
		$picList = $communityService->getPicByBuildIdAndPicTypeId($buildId, $picTypeList[$i]['pictypeId']);
		$temp[$i] = array('type'=>$picTypeList[$i],'picList'=>$picList);
	}
	$smarty->assign('community',$community);
	$smarty->assign('picList',$temp);
	$tpl = $tpl_dir.'community_pic_list.tpl';
}