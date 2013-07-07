<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'user_lease_sp.tpl';

$html->addJs('jquery-ui-1.8.21.custom.min.js');
$html->addJs('ucenter_property_input.js');
$html->addJs('ucenter_root_ComboBox.js');
$html->addCss('ucenter/jquery-ui.css');
$html->addCss('ucenter/public.css');
$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('ckeditLib','../common/libs/fck/ckeditor/ckeditor.js');
$smarty->display($tpl_name);
?>