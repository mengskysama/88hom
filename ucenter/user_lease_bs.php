<?php
require 'prop_input_path.inc.php';
require 'check_login.php';
require 'check_auth_user.php';
$tpl_name = $tpl_dir.'user_lease_bs.tpl';
$smarty->display($tpl_name);
?>