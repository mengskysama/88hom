<?php
require '../path.inc.php';
$smarty->setTemplateDir(ECMS_SMARTY_TEMPLATES.'web/'.LANG.'/');
$tpl_dir = 'service/';
$html->addJs('jquery.min1.js');
$html->addJs('initPage.js');
$html->addJs('common.js');
$html->addJs('web.js');
$html->addCss('web/'.LANG.'/css.css');
?>