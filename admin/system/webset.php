<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'webset.tpl';
$html->title='网站配置';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('webset');
$webset='';
$webset=$userService->getWebSet();
if(!empty($webset)){
	foreach ($webset as $key=>$value){
		if($key!='baiduCountJs'||$key!='googleCountJs'){
			$webset[$key]=htmlspecialchars($value, ENT_QUOTES, 'ISO-8859-1', true);
		}
	}
}
$smarty->assign('webset',$webset);
$html->show();
$smarty->display($tpl_name);
?>