<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'jobs.tpl';

if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}

require '../left.php';

$html->title='人才招聘_'.$cfg['nav']['cname']['7'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
$html->keyword=$webset['keywords'];				
$html->description=$webset['description'];

$infoList=null;
$curl=curl_init();
$APIKey='e2d4c1774a6843ceaa2fb4c9c700e2de';
$sType='json';
$recruitType=0;
$take=6;
if($page>1){
	$start=$take*($page-1);
}else{
	$start=0;
}
//$url="http://openapi.hirede.com/ISite/Job/GetJobs.ashx?APIKey=$APIKey&sType=$sType&recruitType=$recruitType&start=$start&take=$take";
$url="http://openapi.hirede.com/ISite/Job/GetJobs.ashx?APIKey=$APIKey&sType=$sType&recruitType=$recruitType&start=0&take=100";
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_NOBODY,false);
curl_setopt($curl,CURLOPT_TIMEOUT,300); 
curl_setopt($curl,CURLOPT_URL,$url);
$output=curl_exec($curl);
curl_close($curl); 
$json=base64_decode($output);
$obj=json_decode($json);
$arr=get_object_vars($obj);
$infoList=$arr['List'];
$total=$arr['Total'];
$infoListAll=null;
if(!empty($infoList)){
	for($i=0;$i<count($infoList);$i++){
		$infoList[$i]=get_object_vars($infoList[$i]);
	}
	$infoList=charsetIconv($infoList,'UTF-8','GBK');
	for($i=0;$i<count($infoList);$i++){
		if($infoList[$i]['JobDept']=='-集团本部-集团本部-经营公司'){
			$infoListAll[]=$infoList[$i];
		}
	}
}
$total=count($infoListAll);

$infoListNew=null;
for($i=$start,$j=0;$i<$total,$j<$take;$i++,$j++){
	if($i==$total)break;
	$infoListNew[]=$infoListAll[$i];
}

$fileName=$cfg['web_url'].'job/jobs';
if($total>0){
	$divPage=sysPageInfo($total,$take,$page,$fileName,'');
}else{
	$divPage='';
}

$jobClass=$jobClass.' m_jobs_current current';

$smarty->assign('infoList',$infoList);
$smarty->assign('infoListNew',$infoListNew);
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