<?php
require 'path.inc.php';
require 'check_login.php';

$tpl_name = $tpl_dir.'userinfo.tpl';

$actionType = 10; //10insert;11update
$realName = "";
$rblSex = "";
$contactPhone = "";
$contactQQ = "";
$contactMSN = "";
$ddlIDCode = "";
$IDCode = "";
$userdetailPic = "";
$contactAddr = "";
$postCode = "";
$ddlProvince = "";
$ddlCity = "";
$ddlDistrict = "";

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

if(isset($_POST['updateInfo'])){
	$rblSex = getParameter("rblSex");
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

// 	$ddlProvince = getParameter("ddlProvince");
// 	$ddlCity = getParameter("ddlCity");
// 	$ddlDistrict = getParameter("ddlDistrict");
	$areaIndex = getParameter("areaIndex");
	echo 'areaindex->'.$areaIndex;return;
	
	$UCUser['userdetailName'] = $realName;
	$UCUser['userdetailGender'] = $rblSex;
	$UCUser['userdetailTel'] = $contactPhone;
	$UCUser['userdetailQQ'] = $contactQQ;
	$UCUser['userdetailMSN'] = $contactMSN;
	$UCUser['cardtypeId'] = $ddlIDCode;
	$UCUser['userdetailCardNumber'] = $IDCode;

	$UCUser['userdetailPic'] = $userdetailPic;
	$UCUser['userdetailAddr'] = $contactAddr;
	$UCUser['userdetailPostCode'] = $postCode;
	$UCUser['userdetailProvince'] = $ddlProvince;
	$UCUser['userdetailCity'] = $ddlCity;
	$UCUser['userdetailDistrict'] = $ddlDistrict;
	$UCUser['userdetailState'] = 1;
	
	if($actionType == 10){
		$userService->saveUserDetail($UCUser);
	}else if($actionType == 11){
		$userService->updateUserDetail($UCUser);
	}
	
}

$femaleGender = ($rblSex == 1) ? "checked" : "";
$maleGender = ($rblSex == 0) ? "checked" : "";

$html->addJs("ucenter_city.js");
$html->addJs("ucenter_register_agent.js");
$html->addCss("ucenter/city.css");
$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('actionType',$actionType);
$smarty->assign('realName',$realName);
$smarty->assign('femaleGender',$femaleGender);
$smarty->assign('maleGender',$maleGender);
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