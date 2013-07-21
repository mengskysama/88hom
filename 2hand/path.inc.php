<?php
require_once '../path.inc.php';
$smarty->setTemplateDir(ECMS_SMARTY_TEMPLATES.'web/');
$tpl_dir = '2hand/';

$html->addJs('jquery-1.9.1.min.js');
$html->addJs('jquery_ui_1.10.3/jquery.ui.core.js');
$html->addJs('jquery_ui_1.10.3/jquery.ui.widget.js');
$html->addJs('jquery_ui_1.10.3/jquery.ui.position.js');
$html->addJs('jquery_ui_1.10.3/jquery.ui.menu.js');
$html->addJs('jquery_ui_1.10.3/jquery.ui.autocomplete.js');
$html->addJs('jquery.base64.js');
$html->addJs('common.js');
$html->addJs('web.js');
$html->addCss('common/jquery_ui_1.10.3/base/jquery.ui.all.css');

$smarty->assign('header',$tpl_dir.'header.tpl');
$smarty->assign('sellSearchHeader',$tpl_dir.'sellSearchHeader.tpl');
$smarty->assign('rentSearchHeader',$tpl_dir.'rentSearchHeader.tpl');
$smarty->assign('footer',$tpl_dir.'footer.tpl');
?>