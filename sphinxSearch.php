<?php
require 'path.inc.php';
$sphinxSearch=new SphinxSearch($db);
$searchModel=new SearchModel();
$searchModel->search='花园';
$communityList=null;
$propertyList=null;
//$communityList=$sphinxSearch->getCommunityForAutoComplete($searchModel);
$propertyList=$sphinxSearch->getPropertyForAutoComplete($searchModel);
echo '<pre>';
//print_r($communityList);
print_r($propertyList);
echo '</pre>';
?>