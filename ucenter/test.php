<?php
require 'path.inc.php';
$name = "laofan";
$userService = new UserService($db);
$toUser = $userService->getUserByUserName($name,-1);
echo 'toUser->'.$toUser."<br/>";
		if($toUser == ""){
			echo "{\"err\":\"error\",\"msg\":\"不存在用户".$name."\"}";
			return;
		}
?>