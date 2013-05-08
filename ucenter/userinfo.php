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

	$realName = $userDetail['userdetailName'];
	$rblSex = $userDetail['userdetailGender'];
	$contactPhone = $userDetail['userdetailTel'];
	$contactQQ = $userDetail['userdetailQQ'];
	$contactMSN = $userDetail['userdetailMSN'];
	$ddlIDCode = $userDetail['cardtypeId'];
	$IDCode = $userDetail['userdetailCardNumber'];
	
	$userdetailPic = $userDetail['userdetailPic'];
	$contactAddr = $userDetail['userdetailAddr'];
	$postCode = $userDetail['userdetailPostCode'];
	$ddlProvince = $userDetail['userdetailProvince'];
	$ddlCity = $userDetail['userdetailCity'];
	$ddlDistrict = $userDetail['userdetailDistrict'];
	
}

if(isset($_POST['btn_confirm'])){
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

	$userdetailPic = getParameter("");
	$userdetailPicThumb = getParameter("");
	$userdetailState = getParameter("");
	
	$user['userdetailName'] = $realName;
	$user['userdetailGender'] = $rblSex;
	$user['userdetailTel'] = $contactPhone;
	$user['userdetailQQ'] = $contactQQ;
	$user['userdetailMSN'] = $contactMSN;
	$user['cardtypeId'] = $ddlIDCode;
	$user['userdetailCardNumber'] = $IDCode;

	$user['userdetailPic'] = $userdetailPic;
	$user['userdetailAddr'] = $contactAddr;
	$user['userdetailPostCode'] = $postCode;
	$user['userdetailProvince'] = $ddlProvince;
	$user['userdetailCity'] = $ddlCity;
	$user['userdetailDistrict'] = $ddlDistrict;
	$user['userdetailState'] = 1;
	
	if($actionType == 10){
		$userService->saveUserDetail($user);
	}else if($actionType == 11){
		$userService->updateUserDetail($user);
	}
	
}

$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('actionType',$actionType);

$smarty->assign('realName',$realName);
$smarty->assign('rblSex',$rblSex);
$smarty->assign('contactPhone',$contactPhone);
$smarty->assign('contactQQ',$contactQQ);
$smarty->assign('contactMSN',$contactMSN);
$smarty->assign('ddlIDCode',$ddlIDCode);
$smarty->assign('IDCode',$IDCode);

$smarty->assign('userdetailPic',$userdetailPic);
$smarty->assign('contactAddr',$contactAddr);
$smarty->assign('postCode',$postCode);
$smarty->assign('ddlProvince',$ddlProvince);
$smarty->assign('ddlCity',$ddlCity);
$smarty->assign('ddlDistrict',$ddlDistrict);

$smarty->display($tpl_name);

?>