<?php
require '../path.inc.php';

define('MESSAGE_CENTER_PAGE_SIZE',20);

$tpl_dir = 'ucenter/';
$smarty->caching = false;
$smarty->compile_check = true;
$html->addJs('jquery-1.6.js');
$html->addCss('ucenter/loading.css');
$html->addCss('ucenter/public.css');

$smarty->assign('header',$tpl_dir.'header.tpl');
$smarty->assign('footer',$tpl_dir.'footer.tpl');
?>