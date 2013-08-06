<?php
require 'agent_account_path.inc.php';
require 'check_agent_login.php';
$tpl_name = $tpl_dir.'agent_account_modify_data.tpl';

$userService = new UserService($db);

$areaIndex = "";

$userDetail=null;
$userDetail=$userService->getUserDetail($userId);
if($userDetail['userdetailProvince']!==null&&$userDetail['userdetailCity']!==null&&$userDetail['userdetailDistrict']!==null&&$userDetail['userdetailArea']!==null){
	$areaIndex=$userDetail['userdetailProvince'].'-'.$userDetail['userdetailCity'].'-'.$userDetail['userdetailDistrict'].'-'.$userDetail['userdetailArea'];
}

$smarty->assign('userName',$userName);
$smarty->assign('userPhone',$UCUser['userPhone']);
$smarty->assign('userDetail',$userDetail);
$smarty->assign('areaIndex',$areaIndex);
$smarty->display($tpl_name);
?>