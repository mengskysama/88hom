<?php 
require_once 'path.inc.php';
$tpl_name = $tpl_dir.'xpIndex.tpl';
$html->title=$cfg['web_keywords_str'].$webset['siteName'];//վ标题
$html->keyword=$webset['keywords'];					//关键字
$html->description=$webset['description'];			//描述简介

$html->addCss('web/public.css');
$html->addCss('web/xinpan.css');
$html->addCss('web/css.css');

if(isset($_REQUEST['id'])&&!empty($_REQUEST['id'])){
	$id=$_REQUEST['id'];
}else{
	$html->replaceUrl('search.htm');
}

$propertyService=new PropertyService($db);
$info['id']=$id;
$info['type']='web';
$propertyDetail=null;
$propertyDetail=$propertyService->getPropertyById($info);
if(empty($propertyDetail)) $html->replaceUrl('search.htm');
unset($info);

require_once ECMS_PATH_ROOT.'includes/area.inc.php';

$propertyDetail['propertyAreaAddress']=$C[$propertyDetail['propertyProvince']][$propertyDetail['propertyCity']].'-'.$D[$propertyDetail['propertyProvince']][$propertyDetail['propertyCity']][$propertyDetail['propertyDistrict']];

$info['picBuildId']=$id;
$info['picBuildFatherType']=2;
$propertyPicList=null;
$propertyPicList=$propertyService->getPropertyPicList($info);

$smarty->assign('propertyDetail',$propertyDetail);
$smarty->assign('propertyPicList',$propertyPicList);
$html->show();
$smarty->display($tpl_name);
?>