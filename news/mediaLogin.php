<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'mediaLogin.tpl';

if(!empty($cfg['web_user'])){
	$html->gotoUrl($cfg['web_url'].'news/mediaList.htm');
}

require '../left.php';

$html->title='Γ½ΜεΧ¨Ηψ_'.$cfg['nav']['cname']['5'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
$html->keyword=$webset['keywords'];				
$html->description=$webset['description'];

$nav=$newsNavList[2];

$newsClass=$newsClass.' m_news_current current';

$smarty->assign('nav',$nav);
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