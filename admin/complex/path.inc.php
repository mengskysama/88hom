<?php
require '../../path.inc.php';
$tpl_dir = 'admin/complex/';
$smarty->caching = false;
$smarty->compile_check = true;
$html->addJs('jquery-1.9.1.min.js');
$html->addJs('jquery.uploadify.min.js');
$html->addJs('common.js');
$html->addJs('admin.js');
$html->addJs('area.js');
$html->addJs('processArea.js');
$html->addCss('common/uploadify/uploadify.css');
$html->addCss('admin/css.css');
$html->addCss('admin/area.css');
?>