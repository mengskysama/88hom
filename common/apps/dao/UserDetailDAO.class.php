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
	
	public function getUserDetail($userId){
		$sql = "select * from ecms_user_detail where userId=".$userId;
		return $this->db->getQueryValue($sql);
	}
}
?>