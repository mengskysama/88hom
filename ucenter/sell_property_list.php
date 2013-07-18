<?php
require 'path.inc.php';
require 'check_user_login.php';
$tpl_name = $tpl_dir.'sell_property_list.tpl';

$propState = isset($_POST['propState']) ? $_POST['propState'] : "";
$propState = $propState == "" ? 1 : $propState;
$propNum = getParameter("propNum");
$propPriceFrom = getParameter("propPriceFrom");
$propPriceTo = getParameter("propPriceTo");
$propRoom = getParameter("propRoom");
$propRoom = $propRoom == "" ? 0 : $propRoom;
$propKind = getParameter("propKind");
$propKind = $propKind == "" ? 'vv' : $propKind;
$propOrder = getParameter("propOrder");
$propOrder = $propOrder == "" ? 0 : $propOrder;
$propName = getParameter("propName");
$destNo = getParameter("destNo");
$pageNo = getParameter("pageNo");
$pageNo = $destNo == "" ? ($pageNo == "" ? 1 : $pageNo) : $destNo;
$txType = 1;

$secondPropertyService = new SecondHandPropertyService($db);
$soonBeExpiredCount = 0;
$expiredPropsCount = 0;
$expiredPropStat = $secondPropertyService->getExpiredPropStat($userId,$txType);
if($expiredPropStat){
	$soonBeExpiredCount = $expiredPropStat['soonbeexpiredcount'];
	$expiredPropsCount = $expiredPropStat['expiredcount'];
}

$unlivePropsCount = $secondPropertyService->countPropertiesByState($userId,0,$txType);
$livePropsCount = $secondPropertyService->countPropertiesByState($userId,1,$txType);
$illegalPropsCount = $secondPropertyService->countPropertiesByState($userId,4,$txType);
$usedLivePropsCount = $livePropsCount + $expiredPropsCount + $illegalPropsCount;
$restLivePropsCount = $cfg['arr_build']['2handConfig']['PROPERTY_COUNT_SALE_USER'] - $usedLivePropsCount;

$userService = new UserService($db);
$user = $userService->getUserById($userId);
$usedRefreshTimes = $user['propRefreshTimes'];
$restRefreshTimes = $cfg['arr_build']['2handConfig']['REFRESH_COUNT_USER'] - $usedRefreshTimes;

//fill the condition
$condition['userId'] = $userId;
$condition['propState'] = $propState;
$condition['propNum'] = $propNum;
$condition['propPriceFrom'] = $propPriceFrom;
$condition['propPriceTo'] = $propPriceTo;
$condition['propRoom'] = $propRoom;
$condition['propKind'] = $propKind;
$condition['propOrder'] = $propOrder;
$condition['propName'] = $propName;
$condition['currentPageNo'] = $pageNo;
$condition['txType'] = $txType;
$props = $secondPropertyService->getSellPropertyList($condition);
$propList = $props['data'];
$pagination = $props['pagination'];

$html->addJs("ucenter_property_input.js");
$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign("unlivePropsCount",$unlivePropsCount);
$smarty->assign("usedLivePropsCount",$usedLivePropsCount);
$smarty->assign("restLivePropsCount",$restLivePropsCount);
$smarty->assign("expiredPropsCount",$expiredPropsCount);
$smarty->assign("illegalPropsCount",$illegalPropsCount);
$smarty->assign("usedRefreshTimes",$usedRefreshTimes);
$smarty->assign("restRefreshTimes",$restRefreshTimes);
$smarty->assign("soonBeExpiredCount",$soonBeExpiredCount);
$smarty->assign("propList",$propList);
$smarty->assign("pagination",$pagination);
$smarty->assign("propState",$propState);
$smarty->assign("pageNo",$pageNo);

$smarty->assign("propNum",$propNum);
$smarty->assign("propPriceFrom",$propPriceFrom);
$smarty->assign("propPriceTo",$propPriceTo);
$smarty->assign("propRoom",$propRoom);
$smarty->assign("propKind",$propKind);
$smarty->assign("propOrder",$propOrder);
$smarty->assign("destNo",$destNo);
$smarty->assign("propName",$propName);
$smarty->display($tpl_name);
?>