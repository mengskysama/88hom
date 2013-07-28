<?php
require 'prop_input_path.inc.php';
require 'check_user_login.php';
$tpl_name = $tpl_dir.'user_lease_zz_edit.tpl';

$propId = getParameter("propId","GET");
$propService = new SecondHandPropertyService($db);
$property = $propService->getHousePropertyById($userId,$propId);
$houseContent = "";
if($property){
	$estId = $property['houseCommunityId'];
	$estName = $property['propName'];
	$houseNumber = $property['houseNumber'];
	$privateHouseNumber = '';//$property['privateHouseNumber'];
	$houseSellPrice = $property['houseSellPrice'];
	$houseRoom = $property['houseRoom'];
	$houseHall = $property['houseHall'];
	$houseToilet = $property['houseToilet'];
	$houseKitchen = $property['houseKitchen'];
	$houseBalcony = $property['houseBalcony'];

	$houseRentType = $property['houseRentType'];
	$houseRentRoomType = $property['houseRentRoomType'];
	$houseRentDetail = $property['houseRentDetail'];
	$housePayment = $property['housePayment'];
	$housePayDetailY = $property['housePayDetailY'];
	$housePayDetailF = $property['housePayDetailF'];
	$houseRentArea = $property['houseRentArea'];
	$houseFloor = $property['houseFloor'];
	$houseAllFloor = $property['houseAllFloor'];
	$houseForward = $property['houseForward'];
	$houseFitment = $property['houseFitment'];
	$houseBaseService = $property['houseBaseService'];
	for($i=1; $i<9; $i++){
		$index = strpos($houseBaseService,','.$i.',');
		if($index !== false){
			$smarty->assign("houseBaseService".$i,"checked=\"checked\"");
		}else{
			$smarty->assign("houseBaseService".$i,"");
		}
	}

	$photo['picBuildIdId'] = $propId;
	$photo['picBuildType'] = 1;
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

	$houseTitle = $property['houseTitle'];
	$houseContent = $property['houseContent'];
	$houseState = $property['houseState'];

	$smarty->assign("estId",$estId);
	$smarty->assign("estName",$estName);
	$smarty->assign("houseNumber",$houseNumber);
	$smarty->assign("privateHouseNumber",$privateHouseNumber);
	$smarty->assign("houseSellPrice",$houseSellPrice);
	$smarty->assign("houseRoom",$houseRoom);
	$smarty->assign("houseHall",$houseHall);
	$smarty->assign("houseToilet",$houseToilet);
	$smarty->assign("houseKitchen",$houseKitchen);
	$smarty->assign("houseBalcony",$houseBalcony);
	$smarty->assign("houseRentType",$houseRentType);
	$smarty->assign("houseRentRoomType",$houseRentRoomType);
	$smarty->assign("houseRentDetail",$houseRentDetail);
	$smarty->assign("housePayment",$housePayment);
	$smarty->assign("housePayDetailY",$housePayDetailY);
	$smarty->assign("housePayDetailF",$housePayDetailF);
	$smarty->assign("houseRentArea",$houseRentArea);
	$smarty->assign("houseFloor",$houseFloor);
	$smarty->assign("houseAllFloor",$houseAllFloor);
	$smarty->assign("houseForward",$houseForward);
	$smarty->assign("houseFitment",$houseFitment);
	$smarty->assign("houseTitle",$houseTitle);
	$smarty->assign("propId",$propId);
	$smarty->assign("propertyDetailPicList",$propertyDetailPicList);
	$smarty->assign("propState",$houseState);
}
$picTypeList=$cfg['arr_pic']['2handHouse'];
$smarty->assign('picTypeList',$picTypeList);
$smarty->assign('userName',$userName);
$FCKeditor = createCKeditor('houseContent',0,400,150,$houseContent);
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->display($tpl_name);
?>