<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'dzhk.tpl';
$type=2;

require '../left.php';

$html->title='╣Гвс╩А©╞_'.$cfg['nav']['cname']['6'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
$html->keyword=$webset['keywords'];				
$html->description=$webset['description'];

if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}
$mediaService=new MediaService($db);
$fileName='dzhk.php?page';

$lines=4;
$begin=$lines*($page-1);
$field="*";
$where="where 1=1 and state=1 and type=$type";
$order="order by create_time desc";
$limit='limit '.$begin.','.$lines;

$mediaList=$mediaService->getInfoList($field,$where,$order,$limit);
$mediaCount=$mediaService->countInfo($where);

$divPage='';
if(!empty($mediaCount)&&$mediaCount['counts']>0){
	$divPage=sysAdminPageInfo($mediaCount['counts'],$lines,$page,$fileName,'');
}else{
	$divPage='';
}

$serviceClass=$serviceClass.' m_service_current current';

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