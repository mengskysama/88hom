<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'index.tpl';
$infoService=new InfoService($db);
$rmService=new RecruitmentService($db);

$fid=19;//企业招聘
$infoTypeList=$infoService->getInfoTypeListByCache($fid);
$rmTypeList=$rmService->getRmTypeListByCache(1);

if(isset($_GET['t'])){
	$typeId=$_GET['t'];
}else{
	$typeId=0;//人才招聘
}
if(isset($_GET['page'])&&!empty($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}


$html->keyword=$webset['keywords'];				
$html->description=$webset['description'];

$nav='';	
$location='';
if($typeId==0){
	$html->title='人才招聘_'.$cfg['nav']['cname']['6'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
	$nav.='<li><a class="current" href="'.$cfg['nav']['url']['6'].'index-'.$typeId.'.htm">人才招聘</a></li>';
	foreach($infoTypeList as $key=>$value){
		$nav.='<li><a href="'.$cfg['nav']['url']['6'].'index-'.$key.'.htm">'.$value.'</a></li>';
	}
	$location='您现在的位置：<a href="'.$cfg['nav']['url']['1'].'">'.$cfg['nav']['cname']['1'].'</a> > <a href="'.$cfg['nav']['url']['6'].'">'.$cfg['nav']['cname']['6'].'</a> > <a href="'.$cfg['nav']['url']['6'].'index-'.$typeId.'.htm">人才招聘</a>';	
}else{
	$html->title=$infoTypeList[$typeId].'_'.$cfg['nav']['cname']['6'].'_'.$cfg['web_keywords_str'].$webset['siteName'];
	$nav.='<li><a href="'.$cfg['nav']['url']['6'].'index-0.htm">人才招聘</a></li>';
	foreach($infoTypeList as $key=>$value){
		if($typeId==$key){
			$nav.='<li><a class="current" href="'.$cfg['nav']['url']['6'].'index-'.$key.'.htm">'.$value.'</a></li>';
		}else{
			$nav.='<li><a href="'.$cfg['nav']['url']['6'].'index-'.$key.'.htm">'.$value.'</a></li>';
		}
	}
	$location='您现在的位置：<a href="'.$cfg['nav']['url']['1'].'">'.$cfg['nav']['cname']['1'].'</a> > <a href="'.$cfg['nav']['url']['6'].'">'.$cfg['nav']['cname']['6'].'</a> > <a href="'.$cfg['nav']['url']['6'].'index-'.$typeId.'.htm">'.$infoTypeList[$typeId].'</a>';	
}


$infoDetail=null;
$infoList=null;
if($typeId==0){
	$infoList=$rmService->getRmList('*',"where state=1 and lang='".LANG."' order by update_time desc",'limit 0,1000');
	if(!empty($infoList)){
		foreach($infoList as $key=>$value){
			$value['typeName']=$rmTypeList[$value['type_id']];
			$infoList[$key]=$value;
		}
	}
}else{
	$infoList=$infoService->getInfoList('*','where state=1 and type_id='.$typeId,'order by create_time desc','limit 0,1');
	if(!empty($infoList)){
		$infoDetail=$infoList[0];
	}
}

$smarty->assign('nav',$nav);
$smarty->assign('location',$location);
$smarty->assign('typeId',$typeId);
$smarty->assign('infoDetail',$infoDetail);
$smarty->assign('infoList',$infoList);
$html->show();
$smarty->display($tpl_name);
spiderCount();
?>