<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'index_all.tpl';
$infoService=new InfoService($db);

require '../left.php';

$html->title=$cfg['nav']['cname']['4'].'_'.$cfg['web_keywords_str'].$webset['siteName'];

$html->keyword=$webset['keywords'];				
$html->description=$webset['description'];

$projectClass='current';

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