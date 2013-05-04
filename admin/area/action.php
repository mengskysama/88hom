<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('�������,û������ ����action��');
}
$areaService=new AreaService($db);
$shopService=new ShopService($db);
$propertyService=new PropertyService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('area');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$areaService->release($_POST);
		if($result===true){
			$html->replaceUrl('area.php?fid='.$_POST['fatherId'],'�����ɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('area');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		$result=$areaService->save($_POST);
		if($result===true){
			$html->replaceUrl('area.php?fid='.$_POST['fatherId'],'�޸ĳɹ���');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('area');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$areaService->delArea($_GET['id'],$_GET['fid']);
			if($result===true){
				$html->replaceUrl('area.php?fid='.$_GET['fid'],'ɾ���ɹ���');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��ɾ����ϢID����Ϊ�գ�');
		}
	break;
	case 'del':
		$permissionsState=sysPermissionsChecking('area');
		if(!$permissionsState)$html->backUrl('��û��Ȩ�޽��д��������');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$result=$areaService->delAreaByIds($_POST['chk'],$_GET['fid']);
			if($result===true){
				$html->replaceUrl('area.php?fid='.$_GET['fid']);
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('��ѡ����Ҫɾ����Ϣ��');
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