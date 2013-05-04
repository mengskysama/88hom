<?php
require '../../path.inc.php';
$tpl_dir = 'admin/statements/';
$smarty->caching = false;
$smarty->compile_check = true;
$html->addJs('jquery-1.6.js');
$html->addJs('common.js');
$html->addJs('admin.js');
$html->addCss('admin/css.css');
?>