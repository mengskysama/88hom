<?php
require 'prop_input_path.inc.php';
require 'check_agent_login.php';
$tpl_name = $tpl_dir.'agent_sale_xzl_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getOfficePropertyById($userId,$propId);
$officeContent = "";
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

	$officeTitle = $property['officeTitle'];
	$officeContent = $property['officeContent'];
	$officeTraffic = $property['officeTraffic'];
	$officeState = $property['officeState'];
	
	$photo['picBuildIdId'] = $propId;
	$photo['picBuildType'] = 3;
	$propertyDetailPicList = $propService->getPropPhotos($photo);

	$photo['pictypeId'] = 1;
	$topPic = $propService->getPropPhotos($photo);
	if($topPic){
		$smarty->assign('topPicPath',$topPic[0]['picUrl']);
		$smarty->assign('topPicThumb',$topPic[0]['picThumb']);
	}else{
		$smarty->assign('topPicPath',"");
		$smarty->assign('topPicThumb',"");
	}
	
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
	$smarty->assign("officeTitle",$officeTitle);
	$smarty->assign("officeTraffic",$officeTraffic);
	$smarty->assign("propId",$propId);
	$smarty->assign("propertyDetailPicList",$propertyDetailPicList);
	$smarty->assign("propState",$officeState);
}
$picTypeList=$cfg['arr_pic']['2handOffice'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$FCKeditor = createCKeditor('officeContent',0,400,150,$officeContent);
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->display($tpl_name);
?>