<?php
require 'path.inc.php';
require '../includes/xml.inc.php';
$tpl_name=$tpl_dir.'index.tpl';

if(isset($_GET['pageIndex'])&&!empty($_GET['pageIndex'])){
	$pageIndex=$_GET['pageIndex'];
}else{
	$pageIndex=1;
}
$pageSize=8;
require '../left.php';

$html->title=$newsNavList[1].'_'.$cfg['nav']['cname']['5'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
$html->keyword=$webset['keywords'];				
$html->description=$webset['description'];

$nav=$newsNavList[1];

//新闻列表获取
$curl=curl_init();
$url='http://www.chngalaxy.com/API/news.asmx/NewsList';
$post_data="AuthCode='7f811343960162de'&PageSize=$pageSize&PageIndex=$pageIndex";
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
$total=0;
$total=$arr['TotalRecords'];
$infoTop=null;
$infoTop=$arr['TopNews'];
$infoTop=get_object_vars($infoTop);
$infoList=null;
$infoList=$arr['items'];
if(!empty($infoList)){
	for($i=0;$i<count($infoList);$i++){
		$infoList[$i]=get_object_vars($infoList[$i]);
	}
}

$infoTop=charsetIconv($infoTop,'UTF-8','GBK');
//$infoTop['NewsContent']=html2text($infoTop['NewsContent']);
$infoList=charsetIconv($infoList,'UTF-8','GBK');
$fileName=$cfg['web_url'].'news/index';
$divPage='';
if(!empty($total)){
	$divPage=sysPageInfo($total,$pageSize,$pageIndex,$fileName,'');
}

$newsClass=$newsClass.' m_news_current current';

$smarty->assign('nav',$nav);
$smarty->assign('pageIndex',$pageIndex);
$smarty->assign('pageSize',$pageSize);
$smarty->assign('infoTop',$infoTop);
$smarty->assign('infoList',$infoList);
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