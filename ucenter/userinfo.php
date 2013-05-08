<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'userinfo.tpl';

$actionType = 10; //10insert;11update
$user = $_SESSION['UCUser'];
$userId = $user['userId'];
$userName = $user['userName'];

$userService = new UserService($db);
$userDetail = $userService->getUserDetail($userId);
if($userDetail){
	$actionType = 11;	
}

$btn_confirm = getParameter("btn_confirm");
if($btn_confirm){
	$rblSex = getParameter("rblSex");
	$ddlProvince = getParameter("ddlProvince");
	$ddlCity = getParameter("ddlCity");
	$ddlDistrict = getParameter("ddlDistrict");
	$realName = getParameter("realName");
	$ddlIDCode = getParameter("ddlIDCode");
	$IDCode = getParameter("IDCode");
	$contactAddr = getParameter("contactAddr");
	$postCode = getParameter("postCode");
	$contactPhone = getParameter("contactPhone");
	$contactQQ = getParameter("contactQQ");
	$contactMSN = getParameter("contactMSN");
	
	$user['userdetailName'] = $realName;
	$user['userdetailGender'] = $rblSex;
	$user['userdetailTel'] = $contactPhone;
	$user['userdetailQQ'] = $contactQQ;
	$user['userdetailMSN'] = $contactMSN;
	$user['areaId'] = '';
	$user['cardtypeId'] = $ddlIDCode;
	$user['userdetailCardNumber'] = $IDCode;
	$user['userdetailCardNumber'] = $IDCode;
	
	
}


/*
 values('".(empty()?'':$user['userdetailName'])."',
 		".(empty($user[''])?0:$user['userdetailGender'])."',
 		'".(empty($user['userdetailPic'])?'':$user['userdetailPic'])."',
 		'".(empty($user['userdetailPicThumb'])?0:$user['userdetailPicThumb'])."',
 		'".(empty($user[''])?'':$user['userdetailTel'])."',
 		'".(empty($user[''])?'':$user['userdetailQQ'])."',
 		'".(empty($user[''])?'':$user['userdetailMSN'])."',
 		".(empty($user[''])?0:$user['areaId']).",
 		".(empty($user[''])?0:$user['cardtypeId']).",
 		".(empty($user['imcpstoreId'])?0:$user['imcpstoreId']).",
 		'".(empty($user[''])?'':$user['userdetailCardNumber'])."',
 		'".(empty($user['userdetailIdCard'])?'':$user['userdetailIdCard'])."',
 		'".(empty($user['userdetailIdCardPic'])?'':$user['userdetailIdCardPic'])."',
 		'".(empty($user['userdetailCredPicThumb'])?'':$user['userdetailCredPicThumb'])."',
 		'".(empty($user['userdetailCardPic'])?'':$user['userdetailCardPic']).",
 		".(empty($user['userdetailCardPicThumb'])?'':$user['userdetailCardPicThumb'])."',
 		'".(empty($user['userdetailCredNumber'])?'':$user['userdetailCredNumber'])."',
 		'".(empty($user['userdetailCredPic'])?'':$user['userdetailCredPic'])."',
 		'".(empty($user['userdetailCredPicThumb'])?'':$user['userdetailCredPicThumb'])."',
 		*/

$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('actionType',$actionType);
$smarty->display($tpl_name);

?>