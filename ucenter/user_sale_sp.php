<?php
require 'prop_input_path.inc.php';
require 'check_login.php';
require 'check_auth_user.php';
$tpl_name = $tpl_dir.'user_sale_sp.tpl';
$smarty->display($tpl_name);
?>