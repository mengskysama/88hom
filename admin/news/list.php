<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'list.tpl';
$html->title='信息管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('newsModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$infoService=new InfoService($db);
$fid=0;
if(isset($_GET['typeId'])&&!empty($_GET['typeId'])){
	$typeId=$_GET['typeId'];
}else{
	$typeId='';
}
if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}
$type=1;
$fileName='';
if($typeId==''){
	$fileName='list.php?page';
}else{
	$fileName="list.php?typeId=$typeId&page";
}
$lines=20;
$begin=$lines*($page-1);
$field="*";
$where="where type=$type and lang='".LANG."'";
$order="order by create_time desc";
$limit='limit '.$begin.','.$lines;

if(!empty($typeId)){
	$typeStr=$infoService->getAllInfoTypeChByFatherTypeId($typeId);
	$typeStr.=$typeId;
//	$strNum=strlen($typeStr);
//	if(substr($typeStr,$strNum-1)==','){
//		$typeStr=substr($typeStr,0,$strNum-1);
//	}
	$where .= " and type_id in ($typeStr)";
	
}


$infoTypeList=$infoService->getInfoTypeListByCache($fid,$type);
$infoList=$infoService->getInfoList($field,$where,$order,$limit);
$infoCount=$infoService->countInfo($where);
if(!empty($infoList)){
	for($i=0;$i<count($infoList);$i++){
		$infoList[$i]['type']=$infoService->getInfoTypeDetailById($infoList[$i]['type_id']);
	}
}
$divPage='';
if(!empty($infoCount)&&$infoCount['counts']>0){
	$divPage=sysAdminPageInfo($infoCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}
$smarty->assign('infoTypeList',$infoTypeList);
$smarty->assign('infoList',$infoList);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>