<?php
class UserDetailDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	public function release($user){
		$sql="insert into ecms_user_detail(userdetailName,userdetailGender,userdetailPic,userdetailPicThumb,userdetailTel,userdetailQQ,userdetailMSN,areaId,
		cardtypeId,imcpstoreId,userdetailCardNumber,userdetailIdCard,userdetailIdCardPic,userdetailIdCardPicThumb,userdetailCardPic,userdetailCardPicThumb,
		userdetailCredNumber,userdetailCredPic,userdetailCredPicThumb,userdetailCreateTime,userdetailUpdateTime) 
			  values('".(empty($user['userdetailName'])?'':$user['userdetailName'])."',
			  ".(empty($user['userdetailGender'])?0:$user['userdetailGender'])."',
			  '".(empty($user['userdetailPic'])?'':$user['userdetailPic'])."',
			  '".(empty($user['userdetailPicThumb'])?0:$user['userdetailPicThumb'])."',
			  '".(empty($user['userdetailTel'])?'':$user['userdetailTel'])."',
			  '".(empty($user['userdetailQQ'])?'':$user['userdetailQQ'])."',
			  '".(empty($user['userdetailMSN'])?'':$user['userdetailMSN'])."',
			  ".(empty($user['areaId'])?0:$user['areaId']).",
			   ".(empty($user['cardtypeId'])?0:$user['cardtypeId']).",
			   ".(empty($user['imcpstoreId'])?0:$user['imcpstoreId']).",
			   '".(empty($user['userdetailCardNumber'])?'':$user['userdetailCardNumber'])."',
			   '".(empty($user['userdetailIdCard'])?'':$user['userdetailIdCard'])."',
			   '".(empty($user['userdetailIdCardPic'])?'':$user['userdetailIdCardPic'])."',
			   '".(empty($user['userdetailCredPicThumb'])?'':$user['userdetailCredPicThumb'])."',
			   '".(empty($user['userdetailCardPic'])?'':$user['userdetailCardPic']).",
			   ".(empty($user['userdetailCardPicThumb'])?'':$user['userdetailCardPicThumb'])."',
			   '".(empty($user['userdetailCredNumber'])?'':$user['userdetailCredNumber'])."',
			   '".(empty($user['userdetailCredPic'])?'':$user['userdetailCredPic'])."',
			   '".(empty($user['userdetailCredPicThumb'])?'':$user['userdetailCredPicThumb'])."',
			  ".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	public function modify($user){
		$sql="update ecms_user_detail set 
			  userdetailName='".(empty($user['userdetailName'])?'':$user['userdetailName'])."',
			  userdetailGender='".(empty($user['userdetailGender'])?'':$user['userdetailGender'])."',
			  userdetailPic='".(empty($user['userdetailPic'])?'':$user['userdetailPic'])."',
			  userdetailPicThumb='".(empty($user['userdetailPicThumb'])?'':$user['userdetailPicThumb'])."',
			  userdetailTel='".(empty($user['userdetailTel'])?'':$user['userdetailTel'])."',
			  userdetailQQ='".(empty($user['userdetailQQ'])?'':$user['userdetailQQ'])."',
			  userdetailMSN='".(empty($user['userdetailMSN'])?'':$user['userdetailMSN'])."',
			  areaId=".(empty($user['areaId'])?0:$user['areaId']).",
			  cardtypeId=".(empty($user['cardtypeId'])?0:$user['cardtypeId']).",
			  userdetailCardNumber='".(empty($user['userdetailCardNumber'])?'':$user['userdetailCardNumber'])."',
			  userdetailIdCard='".(empty($user['userdetailIdCard'])?'':$user['userdetailIdCard'])."',
			  userdetailIdCardPic='".(empty($user['userdetailIdCardPic'])?'':$user['userdetailIdCardPic'])."',
			  userdetailIdCardPicThumb='".(empty($user['userdetailIdCardPicThumb'])?'':$user['userdetailIdCardPicThumb'])."',
			  userdetailCardPic='".(empty($user['userdetailCardPic'])?'':$user['userdetailCardPic'])."',
			  userdetailCardPicThumb='".(empty($user['userdetailCardPicThumb'])?'':$user['userdetailCardPicThumb'])."',
			  userdetailCredNumber='".(empty($user['userdetailCredNumber'])?'':$user['userdetailCredNumber'])."',
			  userdetailCredPic='".(empty($user['userdetailCredPic'])?'':$user['userdetailCredPic'])."',
			  userdetailCredPicThumb='".(empty($user['userdetailCredPicThumb'])?'':$user['userdetailCredPicThumb'])."',
			  userdetailUpdateTime=".time().",
			  where userdetailId=".$user['userdetailId'];
		return $this->db->getQueryExecute($sql);
	}
	//updated by Cheneil
	public function getUserDetail($userId){
		$sql = "select * from ecms_user_detail where userId=".$userId;
		return $this->db->getQueryValue($sql);
	}
	
	public function saveUserDetail($user){
		$fields = "insert into ecms_user_detail(userId,";
		$values = "values(".$user['userId'].",";
		if(isset($user['userdetailName'])){
			$fields .= "userdetailName,";
			$values .= "'".$user['userdetailName']."',";
		}
		if(isset($user['userdetailGender'])){
			$fields .= "userdetailGender,";
			$values .= $user['userdetailGender'].",";
		}
		if(isset($user['userdetailPic'])){
			$fields .= "userdetailPic,";
			$values .= "'".$user['userdetailPic']."',";
		}
		if(isset($user['userdetailPicThumb'])){
			$fields .= "userdetailPicThumb,";
			$values .= "'".$user['userdetailPicThumb']."',";
		}
		if(isset($user['userdetailTel'])){
			$fields .= "userdetailTel,";
			$values .= "'".$user['userdetailTel']."',";
		}
		if(isset($user['userdetailAddr'])){
			$fields .= "userdetailAddr,";
			$values .= "'".$user['userdetailAddr']."',";
		}
		if(isset($user['userdetailPostCode'])){
			$fields .= "userdetailPostCode,";
			$values .= "'".$user['userdetailPostCode']."',";
		}
		if(isset($user['userdetailQQ'])){
			$fields .= "userdetailQQ,";
			$values .= "'".$user['userdetailQQ']."',";
		}
		if(isset($user['userdetailMSN'])){
			$fields .= "userdetailMSN,";
			$values .= "'".$user['userdetailMSN']."',";
		}
		if(isset($user['userdetailProvince'])){
			$fields .= "userdetailProvince,";
			$values .= $user['userdetailProvince'].",";
		}
		if(isset($user['userdetailCity'])){
			$fields .= "userdetailCity,";
			$values .= $user['userdetailCity'].",";
		}
		if(isset($user['userdetailDistrict'])){
			$fields .= "userdetailDistrict,";
			$values .= $user['userdetailDistrict'].",";
		}
		if(isset($user['userdetailArea'])){
			$fields .= "userdetailArea,";
			$values .= $user['userdetailArea'].",";
		}
		if(isset($user['cardtypeId'])){
			$fields .= "cardtypeId,";
			$values .= $user['cardtypeId'].",";
		}
		if(isset($user['imcpstoreId'])){
			$fields .= "imcpstoreId,";
			$values .= $user['imcpstoreId'].",";
		}
		
		if(isset($user['userdetailCardNumber'])){
			$fields .= "userdetailCardNumber,";
			$values .= "'".$user['userdetailCardNumber']."',";
		}
		if(isset($user['userdetailIdCard'])){
			$fields .= "userdetailIdCard,";
			$values .= "'".$user['userdetailIdCard']."',";
		}
		if(isset($user['userdetailIdCardPic'])){
			$fields .= "userdetailIdCardPic,";
			$values .= "'".$user['userdetailIdCardPic']."',";
		}
		if(isset($user['userdetailIdCardPicThumb'])){
			$fields .= "userdetailIdCardPicThumb,";
			$values .= "'".$user['userdetailIdCardPicThumb']."',";
		}
		if(isset($user['userdetailCardPic'])){
			$fields .= "userdetailCardPic,";
			$values .= "'".$user['userdetailCardPic']."',";
		}
		if(isset($user['userdetailCardPicThumb'])){
			$fields .= "userdetailCardPicThumb,";
			$values .= "'".$user['userdetailCardPicThumb']."',";
		}
		if(isset($user['userdetailCredNumber'])){
			$fields .= "userdetailCredNumber,";
			$values .= "'".$user['userdetailCredNumber']."',";
		}
		if(isset($user['userdetailCredPic'])){
			$fields .= "userdetailCredPic,";
			$values .= "'".$user['userdetailCredPic']."',";
		}
		if(isset($user['userdetailCredPicThumb'])){
			$fields .= "userdetailCredPicThumb,";
			$values .= "'".$user['userdetailCredPicThumb']."',";
		}
		if(isset($user['userdetailState'])){
			$fields .= "userdetailState,";
			$values .= $user['userdetailState'].",";
		}
		$fields .= "userdetailCreateTime,userdetailUpdateTime)";
		$values .= "UNIX_TIMESTAMP(),UNIX_TIMESTAMP())";
		
		$sql = $fields." ".$values;
		return $this->db->getQueryExecute($sql);	
	}
	
	public function updateUserDetail($user){

		$fields = "update ecms_user_detail set ";
		if(isset($user['userdetailName'])){
			$fields .= "userdetailName='".$user['userdetailName']."',";
		}
		if(isset($user['userdetailGender'])){
			$fields .= "userdetailGender=".$user['userdetailGender'].",";
		}
		if(isset($user['userdetailPic'])){
			$fields .= "userdetailPic='".$user['userdetailPic']."',";
		}
		if(isset($user['userdetailPicThumb'])){
			$fields .= "userdetailPicThumb='".$user['userdetailPicThumb']."',";
		}
		if(isset($user['userdetailTel'])){
			$fields .= "userdetailTel='".$user['userdetailTel']."',";
		}
		if(isset($user['userdetailAddr'])){
			$fields .= "userdetailAddr='".$user['userdetailAddr']."',";
		}
		if(isset($user['userdetailPostCode'])){
			$fields .= "userdetailPostCode='".$user['userdetailPostCode']."',";
		}
		if(isset($user['userdetailQQ'])){
			$fields .= "userdetailQQ='".$user['userdetailQQ']."',";
		}
		if(isset($user['userdetailMSN'])){
			$fields .= "userdetailMSN='".$user['userdetailMSN']."',";
		}
		if(isset($user['userdetailProvince'])){
			$fields .= "userdetailProvince=".$user['userdetailProvince'].",";
		}
		if(isset($user['userdetailCity'])){
			$fields .= "userdetailCity=".$user['userdetailCity'].",";
		}
		if(isset($user['userdetailDistrict'])){
			$fields .= "userdetailDistrict=".$user['userdetailDistrict'].",";
		}
		if(isset($user['userdetailArea'])){
			$fields .= "userdetailArea=".$user['userdetailArea'].",";
		}
		if(isset($user['cardtypeId'])){
			$fields .= "cardtypeId=".$user['cardtypeId'].",";
		}
		if(isset($user['imcpstoreId'])){
			$fields .= "imcpstoreId=".$user['imcpstoreId'].",";
		}
		
		if(isset($user['userdetailCardNumber'])){
			$fields .= "userdetailCardNumber='".$user['userdetailCardNumber']."',";
		}
		if(isset($user['userdetailIdCard'])){
			$fields .= "userdetailIdCard='".$user['userdetailIdCard']."',";
		}
		if(isset($user['userdetailIdCardPic'])){
			$fields .= "userdetailIdCardPic='".$user['userdetailIdCardPic']."',";
		}
		if(isset($user['userdetailIdCardPicThumb'])){
			$fields .= "userdetailIdCardPicThumb='".$user['userdetailIdCardPicThumb']."',";
		}
		if(isset($user['userdetailCardPic'])){
			$fields .= "userdetailCardPic='".$user['userdetailCardPic']."',";
		}
		if(isset($user['userdetailCardPicThumb'])){
			$fields .= "userdetailCardPicThumb='".$user['userdetailCardPicThumb']."',";
		}
		if(isset($user['userdetailCredNumber'])){
			$fields .= "userdetailCredNumber='".$user['userdetailCredNumber']."',";
		}
		if(isset($user['userdetailCredPic'])){
			$fields .= "userdetailCredPic='".$user['userdetailCredPic']."',";
		}
		if(isset($user['userdetailCredPicThumb'])){
			$fields .= "userdetailCredPicThumb='".$user['userdetailCredPicThumb']."',";
		}
		if(isset($user['userdetailState'])){
			$fields .= "userdetailState=".$user['userdetailState'].",";
		}
		$fields .= "userdetailUpdateTime=UNIX_TIMESTAMP() where userId=".$user['userId'];
		
		return $this->db->getQueryExecute($fields);
	}
	public function countAgents($where){
		$sql = "select count(a.userId) as total from ecms_user_detail a inner join ecms_user b on a.userId=b.userId ".$where;
		$result = $this->db->getQueryValue($sql);
		return $result['total'];
	}
	public function getAgentList($fields,$where,$order,$limit){
		$sql = "select ".$fields." from ecms_user_detail a inner join ecms_user b on a.userId=b.userId ".$where." ".$order." ".$limit;
		//echo $sql;
		return $this->db->getQueryArray($sql);
	}
	//end to update by Cheneil
}
?>