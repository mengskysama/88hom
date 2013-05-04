<?php
require 'path.inc.php';
require '../includes/xml.inc.php';
$tpl_name=$tpl_dir.'detail.tpl';

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}

require '../left.php';

//获取新闻详情
$curl=curl_init();
$url='http://www.chngalaxy.com/API/news.asmx/NewsDetail';
$post_data="AuthCode='7f811343960162de'&nid=$id";
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

$infoDetail=null;
$infoNext=null;
$infoPrev=null;

$infoDetail['ID']=$arr['ID'];
if(empty($infoDetail)){
	$html->backUrl('无此信息！');
}
$infoDetail['NewsTitle']=$arr['NewsTitle'];
$infoDetail['NewsContent']=$arr['NewsContent'];
$infoDetail['AddTime']=$arr['AddTime'];

$infoDetail=charsetIconv($infoDetail,'UTF-8','GBK');

$infoNext=empty($arr['NextNews'])?null:get_object_vars($arr['NextNews']);
$infoPrev=empty($arr['PrevNews'])?null:get_object_vars($arr['PrevNews']);

$infoNext=charsetIconv($infoNext,'UTF-8','GBK');
$infoPrev=charsetIconv($infoPrev,'UTF-8','GBK');

$nextPrevNews='';
if(empty($infoNext)&&empty($infoPrev)){
	$nextPrevNews='';
}else{
	if(empty($infoNext)){
		$nextPrevNews='上一篇：<a href="'.$cfg['web_url'].'news/d-'.$infoPrev['ID'].'.htm" title="'.$infoPrev['NewsTitle'].'">'.$infoPrev['NewsTitle'].'</a><br/>';
	}else if(empty($infoPrev)){
		$nextPrevNews='下一篇：<a href="'.$cfg['web_url'].'news/d-'.$infoNext['ID'].'.htm" title="'.$infoNext['NewsTitle'].'">'.$infoNext['NewsTitle'].'</a><br/>';
	}else{
		$nextPrevNews='上一篇：<a href="'.$cfg['web_url'].'news/d-'.$infoPrev['ID'].'.htm" title="'.$infoPrev['NewsTitle'].'">'.$infoPrev['NewsTitle'].'</a><br/>'.
					  '下一篇：<a href="'.$cfg['web_url'].'news/d-'.$infoNext['ID'].'.htm" title="'.$infoNext['NewsTitle'].'">'.$infoNext['NewsTitle'].'</a><br/>';
	}
}

$html->title=$infoDetail['NewsTitle'].'_企业动态_'.$cfg['nav']['cname']['5'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
$html->keyword=$webset['keywords'];				
$html->description=$webset['description'];

$newsClass=$newsClass.' m_news_current current';

$smarty->assign('id',$id);
$smarty->assign('infoDetail',$infoDetail);
$smarty->assign('nextPrevNews',$nextPrevNews);
$smarty->assign('indexClass',$indexClass);
$smarty->assign('aboutClass',$aboutClass);
$smarty->assign('businessClass',$businessClass);
$smarty->assign('projectClass',$projectClass);
$smarty->assign('newsClass',$newsClass);
$smarty->assign('serviceClass',$serviceClass);
$smarty->assign('jobClass',$jobClass);
$smarty->assign('contactClass',$contactClass);
$html->show();
$smarty->display($tpl_name,$id);
spiderCount();
?>