<?php
require '../path.inc.php';
$smarty->setTemplateDir(ECMS_SMARTY_TEMPLATES.'web/');
$tpl_dir = 'map/';
$html->addJs('jquery-1.6.js');
$html->addJs('jquery_ui_1.10.3/jquery.ui.core.js');
$html->addJs('jquery_ui_1.10.3/jquery.ui.widget.js');
$html->addJs('jquery_ui_1.10.3/jquery.ui.position.js');
$html->addJs('jquery_ui_1.10.3/jquery.ui.menu.js');
$html->addJs('jquery_ui_1.10.3/jquery.ui.autocomplete.js');
$html->addJs('jquery.base64.js');
$html->addJs('common.js');
$html->addJs('web.js');
$html->addJs('area.js'); 
$html->addJs('map.js');
$html->addJs('data.js');
$html->addJs('overlay.js');
$html->addCss('web/map.css');
$html->addCss('common/jquery_ui_1.10.3/base/jquery.ui.all.css');
//$html->addCss('web/public.css');

?>