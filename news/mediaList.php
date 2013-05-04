<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'mediaList.tpl';

if(empty($cfg['web_user'])){
	$html->gotoUrl($cfg['web_url'].'news/mediaLogin.htm');
}

require '../left.php';

$html->title='Γ½ΜεΧ¨Ηψ_'.$cfg['nav']['cname']['5'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
$html->keyword=$webset['keywords'];				
$html->description=$webset['description'];

if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}

$mediaService=new MediaService($db);
$lines=6;
$where='where 1=1';
$order='order by create_time desc';
$begin=$lines*($page-1);
$limit='limit '.$begin.','.$lines;
$fileName=$cfg['web_url'].'news/mediaList';
$mediaList=null;
$mediaList=$mediaService->getInfoList('*',$where,$order,$limit);
$mediaCount=$mediaService->countInfo($where);
$divPage='';
if($mediaCount['counts']>0){
	$divPage=sysPageInfo($mediaCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}

$nav=$newsNavList[2];

$newsClass=$newsClass.' m_news_current current';

$smarty->assign('nav',$nav);
$smarty->assign('mediaList',$mediaList);
$smarty->assign('divPage',$divPage);
$smarty->assign('indexClass',$indexClass);
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