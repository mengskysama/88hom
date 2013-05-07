<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'index.tpl';

$userType = !empty($_GET['userType']) ? $_GET['userType'] : 3;
if($userType == 1){
	$userTagClass = "";
	$agentTagClass = "";
	$shopTagClass = "class=current";
	$regFormAction = "shop_register.php";
}else if($userType == 2){
	$userTagClass = "";
	$agentTagClass = "class=current";
	$shopTagClass = "";
	$regFormAction = "agent_register.php";
}else{
	$userTagClass = "class=current";
	$agentTagClass = "";
	$shopTagClass = "";
	$regFormAction = "user_register.php";
}
$html->show();

$smarty->assign('userTagClass',$userTagClass);
$smarty->assign('agentTagClass',$agentTagClass);
$smarty->assign('shopTagClass',$shopTagClass);
$smarty->assign('regFormAction',$regFormAction);
$smarty->assign('userType',$userType);
$smarty->display($tpl_name);

?>