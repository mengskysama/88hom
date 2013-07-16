<?php
require 'path.inc.php';
$html->addJs('jquery.uploadify.min.js');
$html->addJs('jquery-ui-1.8.21.custom.min.js');
$html->addJs('ucenter_property_input.js');
$html->addJs('ucenter_upload_pic.js');
$html->addCss('common/uploadify/uploadify.css');
$html->addCss('ucenter/jquery-ui.css');
$html->addCss('ucenter/css.css');
//$html->addJs("ucenter_city.js");
//$html->addJs("ucenter_register_agent.js");
//$html->addCss("ucenter/city.css");
$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('ucenter_agent_header',$tpl_dir.'ucenter_agent_header.tpl');
$smarty->assign('ucenter_agent_left_menu',$tpl_dir.'ucenter_agent_left_menu.tpl');
$smarty->assign('ckeditLib','../common/libs/fck/ckeditor/ckeditor.js');

$timestamp=time();
$token=md5('unique_salt' . $timestamp);
$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
?>