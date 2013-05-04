<?php
require 'path.inc.php';
require '../../includes/xml.inc.php';
$tpl_name=$tpl_dir.'list.tpl';
$html->title='信息管理';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('infoModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
if(isset($_GET['pageIndex'])&&!empty($_GET['pageIndex'])){
	$pageIndex=$_GET['pageIndex'];
}else{
	$pageIndex=1;
}
$pageSize=10;

$curl=curl_init();
$url='http://www.chngalaxy.com/API/news.asmx/NewsListB';
$post_data="AuthCode='7f811343960162de'&PageSize=$pageSize&PageIndex=$pageIndex";
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_NOBODY,false);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
curl_setopt($curl,CURLOPT_TIMEOUT,200); 
curl_setopt($curl,CURLOPT_URL,$url);
$output=curl_exec($curl);
$arr_xml=XML_unserialize($output);
$str=$arr_xml['string'];
//$str=strip_tags($output);
$obj=json_decode($str);
$arr=get_object_vars($obj);
$total=0;
$total=$arr['TotalRecords'];
$infoList=null;
$infoList=$arr['items'];
if(!empty($infoList)){
	for($i=0;$i<count($infoList);$i++){
		$infoList[$i]=get_object_vars($infoList[$i]);
	}
}
$infoList=charsetIconv($infoList,'UTF-8','GBK');

$fileName='list';
$divPage='';
if(!empty($total)){
	$divPage=sysAdminPageInfo($total,$pageSize,$pageIndex,$fileName,'');
}



$smarty->assign('pageIndex',$pageIndex);
$smarty->assign('pageSize',$pageSize);
$smarty->assign('infoList',$infoList);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>