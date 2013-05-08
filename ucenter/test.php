<?php 
$user['id'] = 1234;
//$user['name'] = "";
echo $user['id']."|";
if(isset($user['name'])){
	echo $user['name'];
}else{
	echo 'is not set yet';
}

if(empty($user['name'])){
	echo "empty name";
}
?>