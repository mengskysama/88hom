<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_sale_xzl_edit.tpl';

$html->addJs('jquery-ui-1.8.21.custom.min.js');
$html->addJs('ucenter_property_input.js');
$html->addCss('ucenter/jquery-ui.css');
$html->addCss('ucenter/public.css');
$html->show();

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getOfficePropertyById($userId,$propId);
if($property){
	$estId = $property['officeCommunityId'];
	$estName = $property['propName'];	
	$officeNumber = $property['officeNumber'];
	$officeType = $property['officeType'];
	$officeSellPrice = $property['officeSellPrice'];
	$officeProFee = $property['officeProFee'];
	$privateofficeNumber = '';//$property['privateofficeNumber'];
	$officeBuildArea = $property['officeBuildArea'];
	$officeFloor = $property['officeFloor'];
	$officeAllFloor = $property['officeAllFloor'];
	$officeDivision = $property['officeDivision'];
	$officeFitment = $property['officeFitment'];
	$officeLevel = $property['officeLevel'];

	$picId = $property['picId'];
	$propPhoto = $property['propPhoto'];
	$officeTitle = $property['officeTitle'];
	$officeContent = $property['officeContent'];
	
	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("officeNumber",$officeNumber);
	$smarty->assign("privateofficeNumber",$privateofficeNumber);
	$smarty->assign("officeProFee",$officeProFee);
	$smarty->assign("officeType",$officeType);
	$smarty->assign("officeSellPrice",$officeSellPrice);
	$smarty->assign("officeBuildArea",$officeBuildArea);
	$smarty->assign("officeFloor",$officeFloor);
	$smarty->assign("officeAllFloor",$officeAllFloor);
	$smarty->assign("officeDivision",$officeDivision);
	$smarty->assign("officeFitment",$officeFitment);
	$smarty->assign("officeLevel",$officeLevel);
	$smarty->assign("picId",$picId);
	$smarty->assign("propPhoto",$propPhoto);
	$smarty->assign("officeTitle",$officeTitle);
	$smarty->assign("officeContent",$officeContent);
	$smarty->assign("propId",$propId);
}
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('ckeditLib','../common/libs/fck/ckeditor/ckeditor.js');
$smarty->display($tpl_name);
?>