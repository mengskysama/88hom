<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'outlink.tpl';
$html->title='网站外链';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('outlink');

$from_url=$_SERVER ["REQUEST_URI"];
if(isset($_GET['type'])&!empty($_GET['type'])){
	$type=$_GET['type'];
}else{
	$type='index';
}
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id='';
}
if(isset($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=0;
}
if(isset($_GET['status'])){
	$status=$_GET['status'];
}else{
	$status='false';
}
if(isset($_GET['url'])){
	$url=$_GET['url'];
}else{
	$url='';
	$status='false';
}

$divExeShow='none;';
$divContentShow='block;';

if($type=='index'){
	$tpl_name=$tpl_dir.'outlink.tpl';
}else if($type=='outLinkManage'){
	$tpl_name=$tpl_dir.'outlinkManage.tpl';
	$outlinkList='';
	if(empty($id)){
		$btName='添加';
		$btType='outlinkRelease';
		$file=ECMS_PATH_OUTLINK.'outlink.txt';
		if(is_file($file)){
			$lines=file($file);
			$total=count($lines);
			$begin=0;
			$step=15;
			for($begin;$begin<$total;$begin++){
				$outlinkList[$begin]['id']=$total-$begin;
				$outlinkList[$begin]['url']=$lines[$total-$begin-1];	
			}
		}
	}else{
		$btName='修改';
		$btType='outlinkSave';
		$file=ECMS_PATH_OUTLINK.'outlink.txt';
		if(is_file($file)){
			$lines=file($file);
			$total=count($lines);
			$begin=0;
			$step=15;
			for($begin;$begin<$total;$begin++){
				$outlinkList[$begin]['id']=$total-$begin;
				$outlinkList[$begin]['url']=$lines[$total-$begin-1];	
			}
			$line=$lines[$id-1];
			$smarty->assign('line',$line);
		}
	}
	$smarty->assign('btName',$btName);
	$smarty->assign('btType',$btType);
	$smarty->assign('outlinkList',$outlinkList);
}else if($type=='exeLinkManage'){
	$tpl_name=$tpl_dir.'exelinkManage.tpl';
	$exelinkList='';
	if(empty($id)){
		$btName='添加';
		$btType='exelinkRelease';
		$file=ECMS_PATH_OUTLINK.'exelink.txt';
		if(is_file($file)){
			$lines=file($file);
			$total=count($lines);
			$begin=0;
			$step=15;
			for($begin;$begin<$total;$begin++){
				$exelinkList[$begin]['id']=$total-$begin;
				$exelinkList[$begin]['url']=$lines[$total-$begin-1];	
			}
		}
	}else{
		$btName='修改';
		$btType='exelinkSave';
		$file=ECMS_PATH_OUTLINK.'exelink.txt';
		if(is_file($file)){
			$lines=file($file);
			$total=count($lines);
			$begin=0;
			$step=15;
			for($begin;$begin<$total;$begin++){
				$exelinkList[$begin]['id']=$total-$begin;
				$exelinkList[$begin]['url']=$lines[$total-$begin-1];	
			}
			$line=$lines[$id-1];
			$smarty->assign('line',$line);
		}
	}
	$smarty->assign('btName',$btName);
	$smarty->assign('btType',$btType);
	$smarty->assign('exelinkList',$exelinkList);
}else if($type=='outLinkExe'){
	$tpl_name=$tpl_dir.'outlinkExe.tpl';
	$resultListJson='';
	$resultList=array();
	$resultList_=array();
	if($status=='true'){
		$divExeShow='block;';
		$divContentShow='none;';
		$file=ECMS_PATH_OUTLINK.'outlink.txt';
		if(is_file($file)){
			$lines=file($file);
			$total=count($lines);
			$step=10;
			$pages=ceil($total/$step);
			$begin=$step*$page;
			for($begin;$begin<$total;$begin++){
				$step--;
				$url_=$lines[$begin];
				$url_=str_replace('***',$url,$url_);
				$resultList_[]['id']=$begin+1;
				$resultList[$begin]['id']=$begin+1;
				$resultList[$begin]['url']=$url_;
				if($step==0){
					break;
				}
			}
			$page++;
			if($page>$pages){
				$status='false';
				$divExeShow='none;';
				$divContentShow='block;';
			}
			$resultListJson=json_encode($resultList_);
		}
	}
	$smarty->assign('resultList',$resultList);
	$smarty->assign('resultListJson',$resultListJson);
}
$smarty->assign('id',$id);
$smarty->assign('status',$status);
$smarty->assign('url',$url);
$smarty->assign('type',$type);
$smarty->assign('page',$page);
$smarty->assign('divExeShow',$divExeShow);
$smarty->assign('divContentShow',$divContentShow);
$html->show();
$smarty->display($tpl_name);
?>