<?php 
require_once 'path.inc.php';
$tpl_name = $tpl_dir.'search.tpl';
$html->title=$cfg['web_keywords_str'].$webset['siteName'];//վ标题
$html->keyword=$webset['keywords'];					//关键字
$html->description=$webset['description'];			//描述简介

$html->addCss('web/public.css');
$html->addCss('web/xinpan.css');
$html->addCss('web/css.css');

$area=new Area();

if(isset($_REQUEST['search'])&&!empty($_REQUEST['search'])){
	$search=$_REQUEST['search'];
}else{
	$search='';
}
if(isset($_REQUEST['page'])&&!empty($_REQUEST['page'])){
	$page=$_REQUEST['page'];
}else{
	$page=1;
}
if(isset($_REQUEST['pr'])&&!empty($_REQUEST['pr'])){
	$pr=$_REQUEST['pr'];
}else{
	$pr='';
}
if(isset($_REQUEST['price'])&&!empty($_REQUEST['price'])){
	$price=$_REQUEST['price'];
}else{
	$price='';
}
if(isset($_REQUEST['t'])&&!empty($_REQUEST['t'])){
	$t=$_REQUEST['t'];
}else{
	$t='';
}
if(isset($_REQUEST['p'])){
	$p=$_REQUEST['p'];
}else{
	$p='';
}
if(isset($_REQUEST['c'])){
	$c=$_REQUEST['c'];
}else{
	$c='';
}
if(isset($_REQUEST['d'])){
	$d=$_REQUEST['d'];
}else{
	$d='';
}
if(isset($_REQUEST['a'])){
	$a=$_REQUEST['a'];
}else{
	$a='';
}
$params='';
if(!empty($search)){
	$search=str_replace(' ', '+', $search);
	$params=$search;
	$search=base64_decode($search);
}

$sphinx=new SphinxClient();
$sphinx->SetServer(SPHINX_SERVER_HOST,SPHINX_SERVER_PORT);
$sphinx->SetConnectTimeout(SPHINX_CONNECTTIMEOUT);//设置连接超时时间
$sphinx->SetMaxQueryTime(SPHINX_MAXQUERYTIME);//设置最大查询时间

$title_opts = array(
	"before_match"		=> "<span class='link14' style='color: red;'>",
	"after_match"		=> "</span>",
	"chunk_separator"	=> " ... ",
	"limit"				=> 50,
	"around"			=> 5,
	"exact_phrase"		=> false,
	"allow_empty"		=> true
);
$content_opts = array(
	"before_match"		=> "<span style='color: red;'>",
	"after_match"		=> "</span>",
	"chunk_separator"	=> " ... ",
	"limit"				=> 50,
	"around"			=> 5,
	"exact_phrase"		=> false,
	"allow_empty"		=> true,
	"html_strip_mode"	=> "strip",
	"single_passage"    => true
);

$arr_words=null;
$str_words=null;
$IsHighlight=true;
if(!empty($search)){
	$arr_words=$sphinx->BuildKeywords($search, 'index_ecms_property_main' , false);//获取搜索关键字分词
	if($arr_words==false){
		$IsHighlight=false;
	}else{
		for($i=0;$i<count($arr_words);$i++){
			$str_words=$str_words.$arr_words[$i]['tokenized']."_";
		}
	}
}else{
	$IsHighlight=false;
}

$sphinxSearch=new SphinxSearch($db);
$propertyService=new PropertyService($db);
$searchModel=new SearchModel();
$searchModel->search=$search;
$searchModel->step=10;
$searchModel->begin=($page-1)*$searchModel->step;

$searchModel->p=$p===''?4:$p;//省
if(isset($area->P[$searchModel->p])&&$area->P[$searchModel->p]=='不限'){
	$searchModel->p=4;
}else if(!isset($area->P[$searchModel->p])){
	$searchModel->p=4;
}
$searchModel->c=$c===''?8:$c;//市
if(isset($area->C[$searchModel->p][$searchModel->c])&&$area->C[$searchModel->p][$searchModel->c]=='不限'){
	$searchModel->c=8;
}else if(!isset($area->C[$searchModel->p][$searchModel->c])){
	$searchModel->c=8;
}
$searchModel->d=$d;//区
if(isset($area->D[$searchModel->p][$searchModel->c][$searchModel->d])&&$area->D[$searchModel->p][$searchModel->c][$searchModel->d]=='不限'){
	$searchModel->d='';
}else if(!isset($area->D[$searchModel->p][$searchModel->c][$searchModel->d])){
	$searchModel->d='';
}
$searchModel->a=$a;//商圈
if(isset($area->A[$searchModel->p][$searchModel->c][$searchModel->d][$searchModel->a])&&$area->A[$searchModel->p][$searchModel->c][$searchModel->d][$searchModel->a]=='不限'){
	$searchModel->a='';
}else if(!isset($area->C[$searchModel->p][$searchModel->c])){
	$searchModel->a='';
}
if($t!=''){
	$searchModel->isHouseType=$t==1?1:'';//小区、新盘是否为住宅
	$searchModel->isBusinessType=$t==2?1:'';//小区、新盘是否为商铺
	$searchModel->isOfficeType=$t==3?1:'';//小区、新盘是否为写字楼
	$searchModel->isVillaType=$t==4?1:'';//小区、新盘是否为别墅
}
if($pr!=''){
	if($pr==1){
		$searchModel->openPriceStart=0;
		$searchModel->openPriceEnd=10000;
	}else if($pr==2){
		$searchModel->openPriceStart=10000;
		$searchModel->openPriceEnd=20000;
	}else if($pr==3){
		$searchModel->openPriceStart=20000;
		$searchModel->openPriceEnd=30000;
	}else if($pr==4){
		$searchModel->openPriceStart=30000;
		$searchModel->openPriceEnd=50000;
	}else if($pr==5){
		$searchModel->openPriceStart=50000;
		$searchModel->openPriceEnd='';
	}
}else if($price!=''){
	if($price>0&&$price<=10000){
		$searchModel->openPriceStart=0;
		$searchModel->openPriceEnd=10000;
	}else if($price>10000&&$price<=20000){
		$searchModel->openPriceStart=10000;
		$searchModel->openPriceEnd=20000;
	}else if($price>20000&&$price<=30000){
		$searchModel->openPriceStart=20000;
		$searchModel->openPriceEnd=30000;
	}else if($price>30000&&$price<=50000){
		$searchModel->openPriceStart=30000;
		$searchModel->openPriceEnd=50000;
	}else if($price>50000){
		$searchModel->openPriceStart=50000;
		$searchModel->openPriceEnd='';
	}
}
$fileName='';
$propertyList=null;
$propertyCount=null;
$propertyList=$sphinxSearch->getPropertyForList($searchModel);
$propertyCount=$sphinxSearch->getPropertyForCount($searchModel);

if($IsHighlight==true&&count($propertyList)>0){
	$docs_title=null;
	$docs_content=null;
	for($i=0;$i<count($propertyList);$i++){
		$docs_title[]=sysCnSubStr($propertyList[$i]['propertyName'], 50,'...','UTF-8');
		$docs_content[]=sysCnSubStr($propertyList[$i]['propertySellAddress'], 50,'...','UTF-8');
	}
	$docs_title=$sphinx->BuildExcerpts($docs_title, 'index_ecms_property_main', $search,$title_opts);
	$docs_content=$sphinx->BuildExcerpts($docs_content, 'index_ecms_property_main', $search,$content_opts);
	for($i=0;$i<count($propertyList);$i++){
		$propertyList[$i]['propertyNameHighlight']=$docs_title[$i];
		$propertyList[$i]['propertySellAddressHighlight']=$docs_content[$i];
	}
}else{
	for($i=0;$i<count($propertyList);$i++){
		$propertyList[$i]['propertyNameHighlight']=sysCnSubStr($propertyList[$i]['propertyName'], 50,'...','UTF-8');
		$propertyList[$i]['propertySellAddressHighlight']=sysCnSubStr($propertyList[$i]['propertySellAddress'], 50,'...','UTF-8');
	}
}

$fileName='search.php?p='.$searchModel->p.'&c='.$searchModel->c.'&d='.$searchModel->d.'&a='.$searchModel->a.'&t='.$t.'&pr='.$pr.'&price='.$price.'&search='.$params.'&page';

$divPage='';
if(!empty($propertyCount)&&$propertyCount>0){
	$divPage=sysAdminPageInfo($propertyCount,$searchModel->step,$page,$fileName,'');
}else{
	$divPage='';
}

<<<<<<< .mine
=======
$searchArea=null;
$searchArea['']='区域';
$searchArea_=$area->D[$searchModel->p][$searchModel->c];
if(!empty($searchArea_)){
	foreach ($searchArea_ as $key=>$val){
		$searchArea[$key]=$val;
	}
}

>>>>>>> .r246
$searchBuildType=array(''=>'物业类型',1=>'住宅',2=>'商铺',3=>'写字楼',4=>'别墅');
$searchPrice=array(''=>'价格范围',1=>'1万以下',2=>'1万－2万',3=>'2万－3万',4=>'3万－5万',5=>'5万以上');

//获取最新楼盘列表
$propertyListNew=null;
$where='where propertyState=1 ';
$order='order by propertyUpdateTime desc ';
$limit='limit 0,10';
$propertyListNew=$propertyService->getPropertyListForWeb($where, $order, $limit);
if(!empty($propertyListNew)){
	for($i=0;$i<count($propertyListNew);$i++){
		$propertyListNew[$i]['propertyAreaName']=$area->A[$propertyListNew[$i]['propertyProvince']][$propertyListNew[$i]['propertyCity']][$propertyListNew[$i]['propertyDistrict']][$propertyListNew[$i]['propertyArea']];
	}
}

//获取热门楼盘列表
$propertyListHot=null;
$where='where propertyState=1 and propertyIsHot=1';
$order='order by propertyUpdateTime desc ';
$limit='limit 0,10';
$propertyListHot=$propertyService->getPropertyListForWeb($where, $order, $limit);
if(!empty($propertyListHot)){
	for($i=0;$i<count($propertyListHot);$i++){
		$propertyListHot[$i]['propertyAreaName']=$area->A[$propertyListHot[$i]['propertyProvince']][$propertyListHot[$i]['propertyCity']][$propertyListHot[$i]['propertyDistrict']][$propertyListHot[$i]['propertyArea']];
	}
}

if($search==''){
	$search='搜索小区名、楼盘名、地址等';
}

$smarty->assign('propertyList',$propertyList);
$smarty->assign('searchModel',$searchModel);
$smarty->assign('searchArea',$searchArea);
$smarty->assign('searchBuildType',$searchBuildType);
$smarty->assign('searchPrice',$searchPrice);
$smarty->assign('search',$search);
$smarty->assign('propertyListNew',$propertyListNew);
$smarty->assign('propertyListHot',$propertyListHot);
$smarty->assign('p',$searchModel->p);
$smarty->assign('c',$searchModel->c);
$smarty->assign('d',$searchModel->d);
$smarty->assign('a',$searchModel->a);
$smarty->assign('t',$t);
$smarty->assign('pr',$pr);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>