<?php
class UserDAO1{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	public function release($user){
		$sql="insert into ecms_user(userUsername,userPassword,userPhone,userPhoneState,userEmail,userEmailState,
			  userdetailId,userType,userGroupId,userState,userCreateTime,userUpdateTime) 
			  values('".(empty($user['userUsername'])?'':$user['userUsername'])."',
			  '".(empty($user['userPassword'])?'':$user['userPassword'])."',
			  '".(empty($user['userPhone'])?'':$user['userPhone'])."',
			  ".(empty($user['userPhoneState'])?0:$user['userPhoneState']).",
			  '".(empty($user['userEmail'])?'':$user['userEmail'])."',
			  ".(empty($user['userEmailState'])?0:$user['userEmailState']).",
			  ".(empty($user['userdetailId'])?0:$user['userdetailId']).",
			  ".(empty($user['userType'])?0:$user['userType']).",
			   ".(empty($user['userGroupId'])?0:$user['userGroupId']).",
			  ".(empty($user['userState'])?0:$user['userState']).",
			  ".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	public function modify($user){
		$sql="update ecms_user set 
			  userUsername='".(empty($user['userUsername'])?'':$user['userUsername'])."',
			  userPassword='".(empty($user['userPassword'])?'':$user['userPassword'])."',
			  userPhone='".(empty($user['userPhone'])?'':$user['userPhone'])."',
			  userPhoneState=".(empty($user['userPhoneState'])?0:$user['userPhoneState']).",
			  userEmail='".(empty($user['userEmail'])?'':$user['userEmail'])."',
			  userEmailState=".(empty($user['userEmailState'])?0:$user['userEmailState']).",
			  userdetailId=".(empty($user['userdetailId'])?0:$user['userdetailId']).",
			  userType=".(empty($user['userType'])?0:$user['userType']).",
			  userGroupId=".(empty($user['userGroupId'])?0:$user['userGroupId']).",
			  userState=".(empty($user['userState'])?0:$user['userState']).",
			  areaUpdateTime=".time().",
			  where userId=".$user['userId'];
		return $this->db->getQueryExecute($sql);
	}
}
?>