<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'sitemap.tpl';
$html->title='SiteMap';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('sitemap');

$html->show();
$smarty->display($tpl_name);
?>