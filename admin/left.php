<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'left.tpl';
$menus = require ECMS_PATH_CONF.'system/adminMenu.cfg.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$user=$_SESSION['Admin_User'];
if(isset($_GET['tab'])&&!empty($_GET['tab'])){
	$menus = $menus[$_GET['tab']]['sub'];
}else{
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
		$menus = array_shift($menus);
		$menus = $menus['sub'];
	}else{
		$menus = array_shift($menus);
		$menus = $menus['sub'];
	}
}

//处理如果没有权限的导航,移除该导航
if($user['userId']!=ECMS_SYSTEM_ADMIN){
	if(file_exists(ECMS_PATH_CONF.'system/user_'.$user['userId'].'.php')){
		$userPermissions=require ECMS_PATH_CONF.'system/user_'.$user['userId'].'.php';
		if(!is_array($userPermissions)){
			$userPermissions=array();
		}
	}else{
		$userPermissions=array();
	}
	foreach($menus as $key=>$value){
		$hasitem = false;
		if(isset($userPermissions[$key])&&$userPermissions[$key]==1){
			$hasitem=true;
		}
		if(!$hasitem){
			unset($menus[$key]);
		}
	}
}
$smarty->assign('menus',$menus);
$html->show();
$smarty->display($tpl_name);
?>