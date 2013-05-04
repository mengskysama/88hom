<?php
require 'path.inc.php';
if(isset($_GET['action'])){
	if($_GET['action']=='loginOut'){
		$userService=new UserService($db);
		$userService->getAdminLoginOut();
	}else{
		$html->replaceUrl($cfg['web_url'].'admin/index.php');
	}
}else{
	if(isset($_SESSION['Admin_Login']) && $_SESSION['Admin_Login']=='adminLoginOn'){
		$_SESSION['Admin_Login']='adminLoginOff';
		$html->replaceUrl($cfg['web_url'].'admin/index.php');
	}else{
		if(isset($_SESSION['Admin_User'])&&!empty($_SESSION['Admin_User'])){
			$userService=new UserService($db);
			$userService->checkAdminUserExpired();
			$tpl_name=$tpl_dir.'index.tpl';
		}else{
			$tpl_name=$tpl_dir.'login.tpl';
		}
	}
}
$html->show();
$smarty->display($tpl_name);
?>