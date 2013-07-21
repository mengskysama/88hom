<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'index.tpl';

$furnitureBrandDAO = new FurnitureBrandDAO($db);
$infoDAO = new InfoDAO($db);
$hangye_infoList = null;//行业资讯
$fengshui_infoList = null;//家居风水
$brandList = null;//品牌馆
$huodong_infoList = null;//活动促销
$huodong_suggest_infoList = null;//推荐活动促销
$pinpai_infoList = null;//品牌促销
$pinpai_suggest_infoList = null;//推荐品牌促销
$maichang_infoList = null;//卖场促销
$maichang_suggest_infoList = null;//推荐卖场促销

if(isset($_REQUEST['brandTypeId']) && !empty($_REQUEST['brandTypeId'])){
	$brandList = $furnitureBrandDAO->getFurnitureBrandList('*','where typeId='.$_REQUEST['brandTypeId'].' and state=1 ','order by orderNum desc ,updateTime desc','limit 0,15');
}
else{
	$brandList = $furnitureBrandDAO->getFurnitureBrandList('*',' where state=1 ','order by orderNum desc ,updateTime desc','limit 0,15');
}
//行业资讯
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=704) and infoState=1 ';
$hangye_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,11');
//家居风水
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=709)  and infoState=1  ';
$fengshui_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,22');

//活动促销
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=705)  and infoSuggest =0  and infoState=1 ';
$huodong_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,6');
//推荐活动促销
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and infoSuggest=1 and (ecms_info_type.infotypeSubId=705)  and infoState=1   ';
$huodong_suggest_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,4');

$huodong_suggest_infoList[0] = empty($huodong_suggest_infoList[0])?'':$huodong_suggest_infoList[0];
$huodong_suggest_infoList[1] = empty($huodong_suggest_infoList[1])?'':$huodong_suggest_infoList[1];
$huodong_suggest_infoList[2] = empty($huodong_suggest_infoList[2])?'':$huodong_suggest_infoList[2];
$huodong_suggest_infoList[3] = empty($huodong_suggest_infoList[3])?'':$huodong_suggest_infoList[3];

//品牌促销
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=706)  and infoSuggest =0  and infoState=1 ';
$pinpai_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,6');
//推荐品牌促销
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId  and infoSuggest =1 and (ecms_info_type.infotypeSubId=706)  and infoState=1 ';
$pinpai_suggest_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,4');

$pinpai_suggest_infoList[0] = empty($pinpai_suggest_infoList[0])?'':$pinpai_suggest_infoList[0];
$pinpai_suggest_infoList[1] = empty($pinpai_suggest_infoList[1])?'':$pinpai_suggest_infoList[1];
$pinpai_suggest_infoList[2] = empty($pinpai_suggest_infoList[2])?'':$pinpai_suggest_infoList[2];
$pinpai_suggest_infoList[3] = empty($pinpai_suggest_infoList[3])?'':$pinpai_suggest_infoList[3];


//卖场促销
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=707)  and infoSuggest =0  and infoState=1 ';
$maichang_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,6');
//推荐卖场促销
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and infoSuggest =1 and (ecms_info_type.infotypeSubId=707)  and infoState=1 ';
$maichang_suggest_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,4');

$maichang_suggest_infoList[0] = empty($maichang_suggest_infoList[0])?'':$maichang_suggest_infoList[0];
$maichang_suggest_infoList[1] = empty($maichang_suggest_infoList[1])?'':$maichang_suggest_infoList[1];
$maichang_suggest_infoList[2] = empty($maichang_suggest_infoList[2])?'':$maichang_suggest_infoList[2];
$maichang_suggest_infoList[3] = empty($maichang_suggest_infoList[3])?'':$maichang_suggest_infoList[3];

$smarty->assign('brandList',$brandList);//品牌馆
$smarty->assign('hangye_infoList',$hangye_infoList);//行业资讯
$smarty->assign('fengshui_infoList',$fengshui_infoList);//家居风水
$smarty->assign('huodong_infoList',$huodong_infoList);//活动促销
$smarty->assign('huodong_suggest_infoList',$huodong_suggest_infoList);//推荐活动促销
$smarty->assign('pinpai_infoList',$pinpai_infoList);//品牌促销
$smarty->assign('pinpai_suggest_infoList',$pinpai_suggest_infoList);//推荐品牌促销
$smarty->assign('maichang_infoList',$maichang_infoList);//品牌促销
$smarty->assign('maichang_suggest_infoList',$maichang_suggest_infoList);//推荐品牌促销
$html->show();
$smarty->display($tpl_name);

?>