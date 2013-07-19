<?php
require 'path.inc.php';
require 'check_user_login.php';
$tpl_name = $tpl_dir.'user_lease_prop_agent.tpl';

$err_msg = "";
if(isset($_SESSION['ERR_MSG_AGENT_PROP'])){
	$err_msg = "alert('".$_SESSION['ERR_MSG_AGENT_PROP']."');";
	unset($_SESSION['ERR_MSG_AGENT_PROP']);
}

$propKind = getParameter("propKind","GET");
$propId = getParameter("propId","GET");
$propName = "";
$propPrice = "";
if($propKind != "" && $propId != ""){
	$propService = new SecondHandPropertyService($db);
	$property = $propService->getProperty($propKind,$propId,2);
	if($property){
		$propName = $property['propName'];
		$propPrice = $property['propPrice'];
	}
}

$html->addJs('jquery-ui-1.8.21.custom.min.js');
$html->addJs('ucenter_property_input.js');
$html->addCss('ucenter/jquery-ui.css');
$html->addCss('ucenter/public.css');
$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('userId',$userId);
$smarty->assign("err_msg",$err_msg);
$smarty->assign("propName",$propName);
$smarty->assign("propPrice",$propPrice);
$smarty->display($tpl_name);
?>