<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'spider.tpl';
$html->title='蜘蛛统计';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('spider');
$file=ECMS_PATH_SPIDER.date('Y-m').'.txt';
$spiderList=array();
if(is_file($file)){
	$lines=file($file);
	$total=count($lines);
	$begin=$total-1;
	$step=15;
	for($begin;$begin>=0;$begin--){
		$line=explode("|",$lines[$begin]);//把字符串打散为数组
		$spider['name']=spiderName($line[0]);
		$spider['time']=date('Y-m-d H:i:s',$line[1]);
		$spider['url']=$line[2];
		$spiderList[]=$spider;
	}
}
$smarty->assign('spiderList',$spiderList);
$html->show();
$smarty->display($tpl_name);
?>