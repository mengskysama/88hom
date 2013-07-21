<?php
require 'path.inc.php';
require 'includes/xml.inc.php';
$smarty->setTemplateDir(ECMS_SMARTY_TEMPLATES.'web/'.LANG.'/');
if($cfg['web_type']=='http'){
	$tpl_name='index.tpl';
}else{
	$tpl_name='index_m.tpl';
}

$html->addJs('jquery.min1.js');
$html->addJs('initPage.js');
$html->addJs('jquery.cycle.all.js');
$html->addJs('common.js');
$html->addJs('web.js');
$html->addCss('web/'.LANG.'/css.css');
$html->title=$cfg['web_keywords_str'].$webset['siteName'];//站点标题
$html->keyword=$webset['keywords'];					//站点关键字
$html->description=$webset['description'];			//站点关描述

require 'left.php';

//首页新闻列表
$curl=curl_init();
$url='http://www.chngalaxy.com/API/news.asmx/NewsList';
$post_data="AuthCode='7f811343960162de'&PageSize=6&PageIndex=1";
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_NOBODY,false);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
curl_setopt($curl,CURLOPT_TIMEOUT,200); 
curl_setopt($curl,CURLOPT_URL,$url);
$output=curl_exec($curl);
curl_close($curl); 
$arr_xml=XML_unserialize($output);
$str=$arr_xml['string'];
//$str=strip_tags($output);
$obj=json_decode($str);
$arr=get_object_vars($obj);
$infoList=null;
$infoList=$arr['items'];
if(!empty($infoList)){
	for($i=0;$i<count($infoList);$i++){
		$infoList[$i]=get_object_vars($infoList[$i]);
	}
}
$infoList=charsetIconv($infoList,'UTF-8','GBK');

$indexClass=$indexClass.' m_index_current current';

$smarty->assign('infoList',$infoList);
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
?>