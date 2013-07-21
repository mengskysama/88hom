<?php
require_once 'path.inc.php';
if(isset($_REQUEST['action'])&&!empty($_REQUEST['action'])){
	$action=$_REQUEST['action'];
}else{
	$action='';
}
if(isset($_REQUEST['search'])&&!empty($_REQUEST['search'])){
	$search=$_REQUEST['search'];
}else{
	$search='';
}
$sphinxSearch=new SphinxSearch($db);
switch ($action){
	case 'searchForCommunityAutoComplete':
		$result=null;
		$searchModel=new SearchModel();
		$searchModel->search=$search;
		$result=$sphinxSearch->getCommunityForAutoComplete($searchModel);
		echo json_encode($result);
	break;
}
?>