<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('请求出错,没有请求 参数action！');
}
$infoService=new InfoService($db);
switch ($action){
	case 'release':
		$permissionsState=sysPermissionsChecking('infoRelease');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$curl=curl_init();
		$url='http://www.chngalaxy.com/API/news.asmx/AddNews';
		$title=$_POST['title'];
		$content=$_POST['content'];

		$title=iconv('GBK','UTF-8',$title);
		$content=iconv('GBK','UTF-8',$content);
		
		$title=urlencode($title);
		$content=urlencode($content);

		$data=array('ID'=>0,'NewsTitle'=>$title,'NewsContent'=>$content,'AddTime'=>$_POST['time']);
		$data=json_encode($data);
		
		$post_data='callback=ddddddd&AuthCode=7f811343960162de_write&data='.$data;
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl,CURLOPT_HEADER,false);
		curl_setopt($curl,CURLOPT_NOBODY,false);
		curl_setopt($curl,CURLOPT_POST,true);
		curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl,CURLOPT_TIMEOUT,300); 
		curl_setopt($curl,CURLOPT_URL,$url);
		$output=curl_exec($curl);
		$info=curl_getinfo($curl);
		$str=strip_tags($output);
		$arr=get_object_vars(json_decode($str));
		if($arr['records']==1){
			$html->replaceUrl('release.php','发布信息成功！');
		}else{
			$html->backUrl('信息发布失败！');
		}
	break;
	case 'modify':
		$permissionsState=sysPermissionsChecking('infoModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$curl=curl_init();
		$url='http://www.chngalaxy.com/API/news.asmx/UpdateNews';
		$title=$_POST['title'];
		$content=$_POST['content'];

		$title=iconv('GBK','UTF-8',$title);
		$content=iconv('GBK','UTF-8',$content);
		
		$title=urlencode($title);
		$content=urlencode($content);
		$data=array('ID'=>$_POST['nid'],'NewsTitle'=>$title,'NewsContent'=>$content,'AddTime'=>$_POST['time']);
		$data=json_encode($data);
		$post_data="callback=ddddddd&AuthCode=7f811343960162de_write&data=$data";
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl,CURLOPT_HEADER,false);
		curl_setopt($curl,CURLOPT_NOBODY,false);
		curl_setopt($curl,CURLOPT_POST,true);
		curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl,CURLOPT_TIMEOUT,300); 
		curl_setopt($curl,CURLOPT_URL,$url);
		$output=curl_exec($curl);
		$info=curl_getinfo($curl);
		$str=strip_tags($output);
		$arr=get_object_vars(json_decode($str));
		if($arr['records']==1){
			$html->replaceUrl('list.php','修改信息成功！');
		}else{
			$html->backUrl('信息修改失败！');
		}
	break;
	case 'delById':
		$permissionsState=sysPermissionsChecking('infoModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$curl=curl_init();
		$url='http://www.chngalaxy.com/API/news.asmx/DeleteNews';
		$post_data="callback=ddddddd&AuthCode=7f811343960162de_write&ids=".$_GET['ids'];
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl,CURLOPT_HEADER,false);
		curl_setopt($curl,CURLOPT_NOBODY,false);
		curl_setopt($curl,CURLOPT_POST,true);
		curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl,CURLOPT_TIMEOUT,300); 
		curl_setopt($curl,CURLOPT_URL,$url);
		$output=curl_exec($curl);
		$info=curl_getinfo($curl);
		$str=strip_tags($output);
		$arr=get_object_vars(json_decode($str));
		if($arr['records']>0){
			$html->replaceUrl('list.php?pageIndex='.$_GET['pageIndex'],'信息删除成功！');
		}else{
			$html->backUrl('信息删除失败！');
		}
	break;
	case 'changeState':
		$permissionsState=sysPermissionsChecking('newsModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$infoService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('list.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'ajaxDivPage':
		$permissionsState=sysPermissionsChecking('infoModify');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$fileName='list.php?pageIndex';
		$divPage=sysAdminPageInfo($_GET['total'],$_GET['pageSize'],$_GET['pageIndex'],$fileName,'');
		$divPage=iconv('GBK', 'UTF-8', $divPage);
		echo $divPage;
	break;
}
?>