<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-06-20
 * 家居品牌馆
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('furnitureBrand');//是否有对家居品牌馆管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$tpl = null;
$furnitureBrand = null;
$furnitureBrandList = null;
$furnitureBandDAO = new FurnitureBrandDAO($db);

if($action == 'add'){//初始化插入
	$timestamp=time();
	$token=md5('unique_salt' . $timestamp);

	$smarty->assign('timestamp',$timestamp);
	$smarty->assign('token',$token);
	$tpl = $tpl_dir.'furniture_brand_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$furnitureBrand = $furnitureBandDAO->getFurnitureBrandById($_REQUEST['id']);
	$timestamp=time();
	$token=md5('unique_salt' . $timestamp);

	$smarty->assign('timestamp',$timestamp);
	$smarty->assign('token',$token);
	$smarty->assign('furnitureBrand',$furnitureBrand);
	$tpl = $tpl_dir.'furniture_brand_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	for($i=0;$i<count($_POST['name']);$i++){//插入多个图片
			$furnitureBandDAO->release(array('typeId'=>$_POST['typeId'],'url'=>(empty($_POST['url'][$i])?'javascript:;':$_POST['url'][$i]),
			'pic'=>$_POST['path'][$i],'picThumb'=>$_POST['pathThumb'][$i],
			'name'=>(empty($_POST['name'][$i])?$cfg['arr_pic']['furnitureBrand'][$_POST['typeId']]:$_POST['name'][$i]),'orderNum'=>$_POST['orderNum'][$i],'state'=>1));
	}
	toList();	
}
elseif ($action == 'doUpdate'){//提交更新
	$furnitureBrand = $furnitureBandDAO->getFurnitureBrandById($_REQUEST['id']);
	$furnitureBandDAO->modify($_POST);
	if($_POST['picThumb'] != $furnitureBrand['picThumb'])
	{
		if(file_exists(ECMS_PATH_UPLOADS.$furnitureBrand['pic']))
			unlink(ECMS_PATH_UPLOADS.$furnitureBrand['pic']);//删除大图文件
		if(file_exists(ECMS_PATH_UPLOADS.$furnitureBrand['picThumb']))
			unlink(ECMS_PATH_UPLOADS.$furnitureBrand['picThumb']);//删除缩略图文件
	}
	toList();
}
elseif ($action == 'delete'){//执行删除
	$furnitureBrand = $furnitureBandDAO->getFurnitureBrandById($_REQUEST['id']);
	if(file_exists(ECMS_PATH_UPLOADS.$furnitureBrand['pic']))
			unlink(ECMS_PATH_UPLOADS.$furnitureBrand['pic']);//删除大图文件
		if(file_exists(ECMS_PATH_UPLOADS.$furnitureBrand['picThumb']))
			unlink(ECMS_PATH_UPLOADS.$furnitureBrand['picThumb']);//删除缩略图文件
	$furnitureBandDAO->delFurnitureBrandById($_REQUEST['id']);//删除记录
	toList();
}
else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $furnitureBrandList,$furnitureBandDAO,$tpl,$smarty,$tpl_dir,$action;
	
	$name = (!isset($_REQUEST['name'])||isset($_REQUEST['name'])&&empty($_REQUEST['name']))?'':$_REQUEST['name'];//信息
	$typeId = (!isset($_REQUEST['typeId'])||isset($_REQUEST['typeId'])&&empty($_REQUEST['typeId']))?'':$_REQUEST['typeId'];//类别
	if($action == 'doAdd' || $action == 'doUpdate')//不过虑
	{
		$name = '';
		$typeId = '';
	}
	$where = '';
	$pageStr = '';
	
	if($name != ''){
		$where .= " name like '%".$name."%' ";
		$pageStr .= "&name=".$name;
	}
	else {
		$pageStr .= "&name=";
	}
	if($typeId != '')
	{
		if($where != '')
			$where .= " and typeId=".$typeId;
		else
		 	$where .= " typeId=".$typeId;
		$pageStr .= "&typeId=".$typeId;
	}
	else{
		$pageStr .= "&typeId=";
	}
	
	if($pageStr == '')
		$pageStr .= 'page';
	else 
		$pageStr .= '&page';
		
	$pageSize = 14;//每页15条
	$page = empty($_REQUEST['page'])?1:$_REQUEST['page'];
	$limit = ' limit '.(($page-1)*$pageSize).','.$pageSize;

	$where = $where==''?'':' where '.$where;
	$furnitureBrandList = $furnitureBandDAO->getFurnitureBrandList('*',$where,' order by orderNum desc,updateTime desc ',$limit);
	
	$totalNum = $furnitureBandDAO->countFurnitureBrand($where);
	$pageHtml = $totalNum[0]>0?sysAdminPageInfo($totalNum[0],$pageSize,$page,'furniture_brand_manager.php?'.$pageStr,''):'';//分页html

	$smarty->assign('name',$name);
	$smarty->assign('typeId',$typeId);
	$smarty->assign('pageHtml',$pageHtml);
	$smarty->assign('furnitureBrandList',$furnitureBrandList);
	$tpl = $tpl_dir.'furniture_brand_list.tpl';
}
