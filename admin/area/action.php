<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('请求出错,没有请求 参数action！');
}
$areaService=new AreaService($db);
$shopService=new ShopService($db);
$propertyService=new PropertyService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('area');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$areaService->release($_POST);
		if($result===true){
			$html->replaceUrl('area.php?fid='.$_POST['fatherId'],'发布成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('area');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$areaService->save($_POST);
		if($result===true){
			$html->replaceUrl('area.php?fid='.$_POST['fatherId'],'修改成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('area');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$areaService->delArea($_GET['id'],$_GET['fid']);
			if($result===true){
				$html->replaceUrl('area.php?fid='.$_GET['fid'],'删除成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('待删除信息ID不能为空！');
		}
	break;
	case 'del':
		$permissionsState=sysPermissionsChecking('area');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$result=$areaService->delAreaByIds($_POST['chk'],$_GET['fid']);
			if($result===true){
				$html->replaceUrl('area.php?fid='.$_GET['fid']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('请选择中要删除信息！');
		}
	break;
	case 'ajaxChangeArea':
		$result='';
		if(isset($_GET['areaId'])){
			$result=$areaService->getAreaList($_GET['areaId']);
			if(!empty($result)){
				$result=charsetIconv($result,'GBK','UTF-8');
				$result=json_encode($result);
			}else{
				$result='';
			}
		}
		echo $result;
	break;
	case 'ajaxBackArea':
		$result='';
		if(isset($_GET['areaId'])){
			$area=$areaService->getArea($_GET['areaId']);
			$result=$areaService->getAreaList($area['fatherId']);
			if(!empty($result)){
				$result=charsetIconv($result,'GBK','UTF-8');
				$result=json_encode($result);
			}else{
				$result='';
			}
		}
		echo $result;
	break;
	case 'ajaxChangeAreaForShop':
		$result='';
		if(isset($_GET['shopAreaId'])){
			$areaStr=$areaService->getAllAreaChByFatherId($_GET['shopAreaId']);
			$strNum=strlen($areaStr);
			if(substr($areaStr,$strNum-1)==','){
				$areaStr=substr($areaStr,0,$strNum-1);
			}
			$result=$shopService->getInfoList("where s.areaId in ($areaStr)");
			if(!empty($result)){
				$result=charsetIconv($result,'GBK','UTF-8');
				$result=json_encode($result);
			}else{
				$result='';
			}
		}
		echo $result;
	break;
	case 'ajaxChangeAreaForProperty':
		$result='';
		if(isset($_GET['propertyAreaId'])){
			$areaStr=$areaService->getAllAreaChByFatherId($_GET['propertyAreaId']);
			$strNum=strlen($areaStr);
			if(substr($areaStr,$strNum-1)==','){
				$areaStr=substr($areaStr,0,$strNum-1);
			}
			$result=$propertyService->getInfoList("where p.areaId in ($areaStr)");
			if(!empty($result)){
				$result=charsetIconv($result,'GBK','UTF-8');
				$result=json_encode($result);
			}else{
				$result='';
			}
		}
		echo $result;
	break;
}
?>