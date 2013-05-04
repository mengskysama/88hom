<?php
require 'path.inc.php';
require ECMS_PATH_ROOT.'includes/xml.inc.php';
$tpl_name=$tpl_dir.'top.tpl';
$menus = require ECMS_PATH_CONF.'system/adminMenu.cfg.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$user=$_SESSION['Admin_User'];
//处理如果没有权限的导航,移除该导航
if($user['userId']!=ECMS_SYSTEM_ADMIN){
	foreach($menus as $key=>$submenu){
		if(file_exists(ECMS_PATH_CONF.'system/user_'.$user['userId'].'.php')){
			$userPermissions=require ECMS_PATH_CONF.'system/user_'.$user['userId'].'.php';
			if(!is_array($userPermissions)){
				$userPermissions=array();
			}
		}else{
			$userPermissions=array();
		}
		$hasitem = false;
		foreach($submenu['sub'] as $subkey=>$menuitem){
			if(isset($userPermissions[$subkey])&&$userPermissions[$subkey]==1){
				$hasitem = true;
				break;
			}
		}
		if(!$hasitem){
			unset($menus[$key]);
		}
	}
}
//print_r($menus);
//exit;
$xml = file_get_contents(ECMS_PATH_DATA.'xml/ad.xml');    //读取XML文件  
$data=XML_unserialize($xml); 
//$data=charsetIconv($data);
$bgad=$data['root']['bgad'];
$bgads='';
if(!is_array(empty($bgad[0])?null:$bgad[0])){
	$bgads[0]=$bgad;
}else{
	$bgads=$bgad;
}
$smarty->assign('menus',$menus);
$smarty->assign('bgads',$bgads);
$html->show();
$smarty->display($tpl_name);
?>