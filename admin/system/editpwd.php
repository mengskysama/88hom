<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'editpwd.tpl';
$html->title='用户密码修改';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('editpwd');

$html->show();
$smarty->display($tpl_name);
?>