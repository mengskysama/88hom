<?php
define('ECMS_PATH_ROOT', str_replace('\\','/',dirname ( __FILE__ )).'/'); //root物理路径
require ECMS_PATH_ROOT.'includes/common.inc.php';
$smarty->caching = false;
$smarty->compile_check = true;
?>