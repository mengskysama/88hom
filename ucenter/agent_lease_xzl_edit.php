<?php
require 'prop_input_path.inc.php';
require 'check_agent_login.php';
$tpl_name = $tpl_dir.'agent_lease_xzl_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getOfficePropertyById($userId,$propId);
$officeContent = "";
if($property){
	$estId = $property['officeCommunityId'];
	$estName = $property['propName'];	
	$officeNumber = $property['officeNumber'];
	$officeType = $property['officeType'];
	$officeBuildArea = $property['officeBuildArea'];
	
	$officeRentPrice = $property['officeRentPrice'];
	$officeRentPriceUnit = $property['officeRentPriceUnit'];
	if($officeRentPriceUnit == 1){
		$officeRentPrice = $officeRentPrice/(30 * $officeBuildArea);
	}else if($officeRentPriceUnit == 2){
		$officeRentPrice = $officeRentPrice/$officeBuildArea;
	}
	
	$officeProFee = $property['officeProFee'];
	$privateofficeNumber = '';//$property['privateofficeNumber'];
	$officeFloor = $property['officeFloor'];
	$officeAllFloor = $property['officeAllFloor'];
	$officeDivision = $property['officeDivision'];
	$officeFitment = $property['officeFitment'];
	$officeLevel = $property['officeLevel'];
		
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
	$officeTitle = $property['officeTitle'];
	$officeContent = $property['officeContent'];
	$officeTraffic = $property['officeTraffic'];
	$officeState = $property['officeState'];
	$officeIncludFee = $property['officeIncludFee'];
	$officePayment = $property['officePayment'];
	$officePayDetailY = $property['officePayDetailY'];
	$officePayDetailF = $property['officePayDetailF'];
	$smarty->assign("officeIncludFee",$officeIncludFee);
	$smarty->assign("officePayment",$officePayment);
	$smarty->assign("officePayDetailY",$officePayDetailY);
	$smarty->assign("officePayDetailF",$officePayDetailF);
	
	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("officeNumber",$officeNumber);
	$smarty->assign("privateofficeNumber",$privateofficeNumber);
	$smarty->assign("officeProFee",$officeProFee);
	$smarty->assign("officeType",$officeType);
	$smarty->assign("officeRentPrice",$officeRentPrice);
	$smarty->assign("officeRentPriceUnit",$officeRentPriceUnit);	
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