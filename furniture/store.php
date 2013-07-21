<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'store.tpl';
//所有品牌馆
$infoDAO = new InfoDAO($db);
$furnitureStoreDAO = new FurnitureStoreDAO($db);//家居卖场
$maichang_infoList = null;//卖场资讯
$redian_infoList = null;//卖场热点
$furnitureStoreList = null;//家居卖场列表
$furnitureStoreList_sort = null;//家居卖场排名列表

//卖场资讯
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=710)  ';
$maichang_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,13');

//卖场热点
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=703)  ';
$redian_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,8');

$furnitureStoreList = $furnitureStoreDAO->getFurnitureStoreList('*','',' order by orderNum desc,updateTime desc ','');
$furnitureStoreList_sort = $furnitureStoreDAO->getFurnitureStoreList('*','',' order by orderNum desc ','limit 0,10');

$smarty->assign('furnitureStoreList',$furnitureStoreList);
$smarty->assign('furnitureStoreList_sort',$furnitureStoreList_sort);
$smarty->assign('maichang_infoList',$maichang_infoList);
$smarty->assign('redian_infoList',$redian_infoList);
$html->show();
$smarty->display($tpl_name);

?>