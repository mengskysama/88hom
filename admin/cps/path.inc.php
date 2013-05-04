<?php
require '../../path.inc.php';
$tpl_dir = 'admin/cps/';
$smarty->caching = false;
$smarty->compile_check = true;
$html->addJs('jquery-1.6.js');
$html->addJs('jquery.uploadify.min.js');
$html->addJs('common.js');
$html->addJs('admin.js');
$html->addCss('common/uploadify/uploadify.css');
$html->addCss('admin/css.css');
?>