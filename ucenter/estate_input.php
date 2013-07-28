<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'estate_input.tpl';
$html->addJs('ucenter_register.js');
$html->addJs("ucenter_city.js");
$html->addJs("ucenter_register_email.js");
$html->addJs("ucenter_register_agent.js");
$html->addJs('jquery.uploadify.min.js');
$html->addJs('ucenter_upload_pic.js');
$html->addCss('common/uploadify/uploadify.css');
$html->addCss("ucenter/city.css");
$html->addCss("ucenter/css.css");
$html->show();

$err_msg_submit = "";
if(isset($_POST['checkname'])){
	$checkname = getParameter("checkname");
	$estName = getParameter("estName");
	$areaIndex = getParameter("areaIndex");
	$estType = getParameter("estType");
	$estAddr = getParameter("estAddr");
	$communityTraffic = getParameter("communityTraffic");
	$communityPeriInfo = getParameter("communityPeriInfo");

	$propPhoto = "";
	if(!empty($_POST['picPath'])){
		$len = count($_POST['picPath']);
		for($key=0; $key<$len; $key++){
			$propPhoto[$key]['pictypeId'] = $_POST['picTypeId'][$key];
			$propPhoto[$key]['picBuildType'] = 0;
			$propPhoto[$key]['picSellRent'] = 0;
			$propPhoto[$key]['picUrl'] = $_POST['picPath'][$key];
			$propPhoto[$key]['picThumb'] = $_POST['picPathThumb'][$key];
			$propPhoto[$key]['picInfo'] = $_POST['picName'][$key];
			$propPhoto[$key]['picLayer'] = $_POST['picLayer'][$key];
			$propPhoto[$key]['picState'] = 1;
		}
	}
	if($checkname != "1"){
		$err_msg_submit = "该楼盘已存在！";
	}else if($estName == ""){
		$err_msg_submit = "请填写楼盘名称！";
	}else if(mb_strlen($estName) > 15){
		$err_msg_submit = "楼盘名称不可超过15个汉字！";
	}else if(count(explode("-",$areaIndex)) != 4){
		$err_msg_submit = "请选择所在商圈！";
	}else if(count($estType) <= 0){
		$err_msg_submit = "请选择物业类型！";
	}else if($estAddr == ""){
		$err_msg_submit = "请填写物业地址！";
	}else if(mb_strlen($estAddr) > 30){
		$err_msg_submit = "楼盘名称不可超过30个汉字！";
	}else if($communityTraffic == ""){
		$err_msg_submit = "请填写交通状况!";
	}else if(mb_strlen($estName) > 500){
		$err_msg_submit = "交通状况不能太长！";
	}else{
		$estate['communityName'] = $estName;

		$estate['communityIsHouseType'] = 0;
		$estate['communityIsBusinessType'] = 0;
		$estate['communityIsOfficeType'] = 0;
		$estate['communityIsVillaType'] = 0;
		
		$len = count($estType);
		for($i=0; $i<$len; $i++){
			$estTypeId = $estType[$i];
			
			if($estTypeId == 1){
				$estate['communityIsHouseType'] = 1;
			}else if($estTypeId == 2){
				$estate['communityIsBusinessType'] = 1;
			}else if($estTypeId == 3){
				$estate['communityIsOfficeType'] = 1;
			}else if($estTypeId == 4){
				$estate['communityIsVillaType'] = 1;
			} 
		}
		
		$estate['communityAddress'] = $estAddr;
		$estate['communityTraffic'] = $communityTraffic;
		$estate['communityPeriInfo'] = $communityPeriInfo;
		
		$areas = explode("-",$areaIndex);
		$estate['communityProvince'] = $areas[0];
		$estate['communityCity'] = $areas[1];
		$estate['communityDistrict'] = $areas[2];;
		$estate['communityArea'] = $areas[3];;
		$estate['communityState'] = 0;
		$estate['communityUserId'] = 0;
		$estate['photos'] = $propPhoto;
		
		$estateService = new EstateService($db);
		$estId = $estateService->saveEstate($estate);
		if($estId){
			$err_msg_submit = "提交成功,管理员会尽快处理您的提交信息！";
		}else{
			$err_msg_submit = "提交失败,请重试！";
		}
	}
	$err_msg_submit = "alert('" . $err_msg_submit . "');";
}

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('err_msg_submit',$err_msg_submit);
$smarty->display($tpl_name);
?>