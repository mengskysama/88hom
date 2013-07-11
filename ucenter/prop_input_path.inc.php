<?php
require 'path.inc.php';
$html->addJs('jquery.uploadify.min.js');
$html->addJs('jquery-ui-1.8.21.custom.min.js');
$html->addJs('ucenter_property_input.js');
$html->addCss('common/uploadify/uploadify.css');
$html->addCss('ucenter/jquery-ui.css');
$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('ckeditLib','../common/libs/fck/ckeditor/ckeditor.js');
?>