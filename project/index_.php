<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'index.tpl';
$infoService=new InfoService($db);

if(isset($_GET['t'])){
	$typeId=$_GET['t'];
}else{
	$typeId=13;//COCOPark
}
require '../left.php';

if($typeId==23||$typeId==24){
	$html->title=$projectNavList[13].'_'.$cfg['nav']['cname']['4'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
	if($typeId==23){
		$title='福田星河COCO Park';
		$nav='<a href="index-13.htm">星河COCO Park</a> > 福田星河COCO Park';
	}else{
		$title='龙岗星河COCO Park';
		$nav='<a href="index-13.htm">星河COCO Park</a> > 龙岗星河COCO Park';
	}
}else{
	$html->title=$projectNavList[$typeId].'_'.$cfg['nav']['cname']['4'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
	$title=$projectNavList[$typeId];
	$nav=$projectNavList[$typeId];
}

$html->keyword=$webset['keywords'];				
$html->description=$webset['description'];

$contentList=null;
$content=null;
$contentList=$infoService->getInfoList('*',"where state=1 and type_id=$typeId",'order by create_time desc','limit 0,1');
$infoId=0;
if(!empty($contentList)){
	$content=$contentList[0]['text_content'];
	$infoId=$contentList[0]['id'];
}
$picList=null;
if($infoId!=0){
	$picList=$infoService->getInfoPicListByInfoId($infoId);
}
$projectClass='current';

$smarty->assign('nav',$nav);
$smarty->assign('title',$title);
$smarty->assign('typeId',$typeId);
$smarty->assign('infoId',$infoId);
$smarty->assign('content',$content);
$smarty->assign('picList',$picList);
$smarty->assign('aboutClass',$aboutClass);
$smarty->assign('businessClass',$businessClass);
$smarty->assign('projectClass',$projectClass);
$smarty->assign('newsClass',$newsClass);
$smarty->assign('serviceClass',$serviceClass);
$smarty->assign('jobClass',$jobClass);
$smarty->assign('contactClass',$contactClass);
$html->show();
$smarty->display($tpl_name);
spiderCount();
?>