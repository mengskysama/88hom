<?php
require '../../path.inc.php';
$tpl_dir = 'admin/info/';
$smarty->caching = false;
$smarty->compile_check = true;
$html->addJs('jquery-1.6.js');
$html->addJs('jquery_ui/jquery.ui.core.js');
$html->addJs('jquery_ui/jquery.ui.widget.js');
$html->addJs('jquery_ui/jquery.ui.datepicker.js');
$html->addJs('common.js');
$html->addJs('admin.js');
$html->addCss('common/jquery_ui/jquery.ui.all.css');
$html->addCss('admin/css.css');
?>