<?php
require 'prop_input_path.inc.php';
require 'check_user_login.php';
$tpl_name = $tpl_dir.'user_sale_sp_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getShopPropertyById($userId,$propId);
$shopsContent = "";
if($property){
	$estId = $property['shopsCommunityId'];
	$estName = $property['propName'];
	$shopsAddress = $property['shopsAddress'];
	$shopsType = $property['shopsType'];
	$shopsSellPrice = $property['shopsSellPrice'];	
	$shopsNumber = $property['shopsNumber'];
	$privateShopsNumber = '';//$property['privateshopsNumber'];
	$shopsPropFee = $property['shopsPropFee'];
	$shopsBuildArea = $property['shopsBuildArea'];
	$shopsFloor = $property['shopsFloor'];
	$shopsAllFloor = $property['shopsAllFloor'];
	$shopsDivision = $property['shopsDivision'];
	$shopsFitment = $property['shopsFitment'];
	$shopsTraffic = $property['shopsTraffic'];
	$shopsSet = $property['shopsSet'];
	$shopsBaseService = $property['shopsBaseService'];
	for($i=1; $i<=9; $i++){
		$index = strpos($shopsBaseService,','.$i.',');
		if($index !== false){
			$smarty->assign("shopsBaseService".$i,"checked=\"checked\"");
		}else{
			$smarty->assign("shopsBaseService".$i,"");
		}
	}

	$shopsAimOperastion = $property['shopsAimOperastion'];
	for($i=1; $i<=9; $i++){
		$index = strpos($shopsAimOperastion,','.$i.',');
		if($index !== false){
			$smarty->assign("shopsAimOperastion".$i,"checked=\"checked\"");
		}else{
			$smarty->assign("shopsAimOperastion".$i,"");
		}
	}
	
	$photo['picBuildIdId'] = $propId;
	$photo['picBuildType'] = 2;
	$propertyDetailPicList = $propService->getPropPhotos($photo);
	$picCount = count($propertyDetailPicList);
	$smarty->assign("picCount",$picCount);

	$photo['pictypeId'] = 1;
	$topPic = $propService->getPropPhotos($photo);
	if($topPic){
		$smarty->assign('topPicPath',$topPic[0]['picUrl']);
		$smarty->assign('topPicThumb',$topPic[0]['picThumb']);
	}else{
		$smarty->assign('topPicPath',"");
		$smarty->assign('topPicThumb',"");
	}
	$shopsTitle = $property['shopsTitle'];
	$shopsContent = $property['shopsContent'];
	$shopsState = $property['shopsState'];
	
	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("shopsAddress",$shopsAddress);
	$smarty->assign("shopsNumber",$shopsNumber);
	$smarty->assign("privateShopsNumber",$privateShopsNumber);
	$smarty->assign("shopsPropFee",$shopsPropFee);
	$smarty->assign("shopsType",$shopsType);
	$smarty->assign("shopsSellPrice",$shopsSellPrice);
	$smarty->assign("shopsBuildArea",$shopsBuildArea);
	$smarty->assign("shopsFloor",$shopsFloor);
	$smarty->assign("shopsAllFloor",$shopsAllFloor);
	$smarty->assign("shopsDivision",$shopsDivision);
	$smarty->assign("shopsFitment",$shopsFitment);
	$smarty->assign("propertyDetailPicList",$propertyDetailPicList);
	$smarty->assign("shopsTitle",$shopsTitle);
	$smarty->assign("shopsTraffic",$shopsTraffic);
	$smarty->assign("shopsSet",$shopsSet);
	$smarty->assign("propId",$propId);
	$smarty->assign("propState",$shopsState);
}
$picTypeList=$cfg['arr_pic']['2handShop'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$FCKeditor = createCKeditor('shopsContent',0,400,150,$shopsContent);
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->display($tpl_name);
?>