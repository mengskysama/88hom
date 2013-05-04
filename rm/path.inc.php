<?php
require '../path.inc.php';
$smarty->setTemplateDir(ECMS_SMARTY_TEMPLATES.'web/'.LANG.'/');
$tpl_dir = 'rm/';
$html->addJs('jquery-1.6.js');
$html->addJs('jquery.cycle.all.js');
$html->addJs('common.js');
$html->addJs('web.js');
$html->addCss('web/'.LANG.'/css.css');
?>