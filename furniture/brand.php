<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'brand.tpl';
//所有品牌馆
$furnitureBrandDAO = new FurnitureBrandDAO($db);
$brandList = null;
if(isset($_REQUEST['brandTypeId']) && !empty($_REQUEST['brandTypeId'])){
	$brandList = $furnitureBrandDAO->getFurnitureBrandList('*','where typeId='.$_REQUEST['brandTypeId'].' and state=1 ','order by orderNum desc ,updateTime desc','');
}
else{
	$brandList = $furnitureBrandDAO->getFurnitureBrandList('*',' where state=1 ','order by orderNum desc ,updateTime desc','');
}

$smarty->assign('brandList',$brandList);
$html->show();
$smarty->display($tpl_name);

?>