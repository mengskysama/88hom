<?php
require 'path.inc.php';
require 'check_user_login.php';

$tpl_name = $tpl_dir.'userinfo.tpl';

$actionType = 10; //10insert;11update
$realName = "";
$rblSex = "";
$contactPhone = "";
$contactQQ = "";
$contactMSN = "";
$cardtypeId = "";
$IDCode = "";
$userdetailPic = "";
$contactAddr = "";
$postCode = "";
$ddlProvince = -1;
$ddlCity = -1;
$ddlDistrict = -1;
$userdetailArea = -1;
$operation_msg = "";
$areaIndex = "";

$userService = new UserService($db);
if(isset($_POST['actionType'])){
	$rblSex = isset($_POST['rblSex']) ? $_POST['rblSex'] : 1;
	$realName = getParameter("userdetailName");
	$cardtypeId = getParameter("cardtypeId");
	$IDCode = getParameter("IDCode");
	$contactAddr = getParameter("contactAddr");
	$postCode = getParameter("postCode");
	$contactPhone = getParameter("contactPhone");
	$contactQQ = getParameter("contactQQ");
	$contactMSN = getParameter("contactMSN");
	$actionType = getParameter("actionType");
	
	$userdetailPic = "";
	$userdetailPicThumb = "";
	if(!empty($_POST['picPath'])){
		$len = count($_POST['picPath']);
		$key = $len-1;
		$userdetailPic = $_POST['picPath'][$key];
		$userdetailPicThumb = $_POST['picPathThumb'][$key];
	}
	
	if(isset($_POST['areaIndex'])){
		$areaIndex = getParameter("areaIndex");
		if($areaIndex){
			$areas = explode("-", $areaIndex);
			if(count($areas) != 4){
				$operation_msg .= "alert('请选齐城市、区域和商圈');";
			}else{
				$ddlProvince = $areas[0];
				$ddlCity = $areas[1];
				$ddlDistrict = $areas[2];
				$userdetailArea = $areas[3];
			}
		}
	}
	if($operation_msg == ""){		
		$UCUser['userdetailName'] = $realName;
		$UCUser['userdetailGender'] = $rblSex;
		$UCUser['userdetailTel'] = $contactPhone;
		$UCUser['userdetailQQ'] = $contactQQ;
		$UCUser['userdetailMSN'] = $contactMSN;
		$UCUser['cardtypeId'] = $cardtypeId;
		$UCUser['userdetailCardNumber'] = $IDCode;
		$UCUser['userdetailPic'] = $userdetailPic;
		$UCUser['userdetailPicThumb'] = $userdetailPicThumb;
		
		$UCUser['userdetailAddr'] = $contactAddr;
		$UCUser['userdetailPostCode'] = $postCode;
		$UCUser['userdetailProvince'] = $ddlProvince;
		$UCUser['userdetailCity'] = $ddlCity;
		$UCUser['userdetailDistrict'] = $ddlDistrict;
		$UCUser['userdetailArea'] = $userdetailArea;
		$UCUser['userdetailState'] = 1;
		
		if($actionType == 10){
			$userService->saveUserDetail($UCUser);
		}else if($actionType == 11){
			$userService->updateUserDetail($UCUser);
		}		
		$operation_msg = "alert('注册成功');";
	}	
}

$userDetail = $userService->getUserDetail($userId);
if($userDetail){
	$realName = $userDetail['userdetailName'];
	$rblSex = $userDetail['userdetailGender'];
	$contactPhone = $userDetail['userdetailTel'];
	$contactQQ = $userDetail['userdetailQQ'];
	$contactMSN = $userDetail['userdetailMSN'];
	$cardtypeId = $userDetail['cardtypeId'];
	$IDCode = $userDetail['userdetailCardNumber'];

	$userdetailPic = $userDetail['userdetailPic'];
	$userdetailPicThumb = $userDetail['userdetailPicThumb'];
	$contactAddr = $userDetail['userdetailAddr'];
	$postCode = $userDetail['userdetailPostCode'];
	$ddlProvince = $userDetail['userdetailProvince'];
	$ddlCity = $userDetail['userdetailCity'];
	$ddlDistrict = $userDetail['userdetailDistrict'];
	$userdetailArea = $userDetail['userdetailArea'];
	$areaIndex = $ddlProvince.'-'.$ddlCity.'-'.$ddlDistrict.'-'.$userdetailArea;
	$actionType = 11;
}

$femaleGender = "";
$maleGender = "";
if($rblSex == 1){
	$femaleGender = "";
	$maleGender = "checked=checked";
}else{
	$femaleGender = "checked=checked";
	$maleGender = "";
}

$html->addJs("ucenter_city.js");
$html->addJs("ucenter_register_agent.js");
$html->addJs("ucenter_upload_pic.js");
//$html->addJs("ucenter_property_input.js");
$html->addJs('jquery.uploadify.min.js');
$html->addCss('common/uploadify/uploadify.css');
$html->addCss("ucenter/city.css");
$html->addCss('ucenter/jquery-ui.css');
$html->addCss('ucenter/css.css');
$html->show();

$smarty->assign('userName',$userName);
$smarty->assign('actionType',$actionType);
$smarty->assign('realName',$realName);
$smarty->assign('femaleGender',$femaleGender);
$smarty->assign('maleGender',$maleGender);
$smarty->assign('contactPhone',$contactPhone);
$smarty->assign('contactQQ',$contactQQ);
$smarty->assign('contactMSN',$contactMSN);
$smarty->assign('cardtypeId',$cardtypeId);
$smarty->assign('IDCode',$IDCode);

//echo 'userdetailPic-'.$userdetailPic;
$smarty->assign('userdetailPic',$userdetailPic);
$smarty->assign('userdetailPicThumb',$userdetailPicThumb);
$smarty->assign('contactAddr',$contactAddr);
$smarty->assign('postCode',$postCode);
$smarty->assign('ddlProvince',$ddlProvince);
$smarty->assign('ddlCity',$ddlCity);
$smarty->assign('ddlDistrict',$ddlDistrict);
$smarty->assign('ddlArea',$userdetailArea);
$smarty->assign('operation_msg',$operation_msg);
$smarty->assign('areaIndex',$areaIndex);
$smarty->assign('actionType',$actionType);

$timestamp=time();
$token=md5('unique_salt' . $timestamp);
$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->display($tpl_name);

?>