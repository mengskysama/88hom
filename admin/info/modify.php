<?php
require 'path.inc.php';
require '../../includes/xml.inc.php';
$tpl_name=$tpl_dir.'modify.tpl';
$html->title='信息修改';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('infoModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
if(isset($_GET['nid'])&&!empty($_GET['nid'])){
	$nid=$_GET['nid'];
}else{
	$html->backUrl('参数错误！');
}

//获取新闻详情
$curl=curl_init();
$url='http://www.chngalaxy.com/API/news.asmx/NewsDetail';
$post_data="AuthCode='7f811343960162de'&nid=$nid";
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

$infoDetail=null;

$infoDetail['ID']=$arr['ID'];
if(empty($infoDetail)){
	$html->backUrl('无此信息！');
}
$infoDetail['NewsTitle']=$arr['NewsTitle'];
$infoDetail['NewsContent']=$arr['NewsContent'];
$infoDetail['AddTime']=$arr['AddTime'];

$infoDetail=charsetIconv($infoDetail,'UTF-8','GBK');

$FCKeditor=createCKeditor('content',1,700,250,$infoDetail['NewsContent']);

$smarty->assign('infoDetail',$infoDetail);
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->assign('nid',$nid);
$html->show();
$smarty->display($tpl_name);
?>