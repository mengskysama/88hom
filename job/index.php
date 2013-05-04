<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'index.tpl';
$infoService=new InfoService($db);
if(isset($_GET['t'])){
	$typeId=$_GET['t'];
}else{
	$typeId=21;//企业简介
}
require '../left.php';

$html->title=$jobNavList[$typeId].'_'.$cfg['nav']['cname']['7'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
$html->keyword=$webset['keywords'];				
$html->description=$webset['description'];

//关于我们
$contentList=null;
$content=null;
$contentList=$infoService->getInfoList('*',"where state=1 and type_id=$typeId",'order by create_time desc','limit 0,1');
if(!empty($contentList)){
	$content=$contentList[0]['text_content'];
}

$jobClass=$jobClass.' m_jobs_current current';

$smarty->assign('content',$content);
$smarty->assign('indexClass',$indexClass);
$smarty->assign('aboutClass',$aboutClass);
$smarty->assign('businessClass',$businessClass);
$smarty->assign('projectClass',$projectClass);
$smarty->assign('newsClass',$newsClass);
$smarty->assign('serviceClass',$serviceClass);
$smarty->assign('jobClass',$jobClass);
$smarty->assign('contactClass',$contactClass);
$smarty->assign('typeId',$typeId);
$html->show();
$smarty->display($tpl_name);
spiderCount();
?>