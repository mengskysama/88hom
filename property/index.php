<?php 
require_once 'path.inc.php';
$tpl_name = $tpl_dir.'index.tpl';
$html->title=$cfg['web_keywords_str'].$webset['siteName'];//վ标题
$html->keyword=$webset['keywords'];					//关键字
$html->description=$webset['description'];			//描述简介

$html->addJs('jquery.cycle.all.js');
$html->addJs('page.js');
$html->addCss('web/css.css');

$html->show();
$smarty->display($tpl_name);
?>