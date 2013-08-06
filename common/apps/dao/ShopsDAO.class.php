<?php
class ShopsDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//added by Cheneil
	public function release($info){
		$sql="insert into ecms_shops(shopsName,shopsAddress,shopsTitle,shopsContent,shopsType,shopsSellPrice,shopsRentPrice,
			  shopsRentPriceUnit,shopsRentState,shopsPayment,shopsPayDetailY,shopsPayDetailF,shopsBuildArea,shopsFloor,shopsAllFloor,shopsDivision,
			  shopsFitment,shopsBaseService,shopsAimOperastion,shopsIncludFee,shopsPropFee,shopsTransfer,shopsTransferFee,shopsNumber,shopsSellRentType,
			  shopsMapX,shopsMapY,shopsState,shopsUserId,shopsCommunityId,shopsTraffic,shopsSet,shopsCreateTime,shopsUpdateTime) 
			  values('".(empty($info['shopsName'])?'':$info['shopsName'])."',
			  '".(empty($info['shopsAddress'])?'':$info['shopsAddress'])."',
			  '".(empty($info['shopsTitle'])?'':$info['shopsTitle'])."',
			  '".(empty($info['shopsContent'])?'':$info['shopsContent'])."',
			  ".(empty($info['shopsType'])?0:$info['shopsType']).",
			  ".(empty($info['shopsSellPrice'])?0:$info['shopsSellPrice']).",
			  ".(empty($info['shopsRentPrice'])?0:$info['shopsRentPrice']).",
			  ".(empty($info['shopsRentPriceUnit'])?0:$info['shopsRentPriceUnit']).",
			  ".(empty($info['shopsRentState'])?0:$info['shopsRentState']).",
			  ".(empty($info['shopsPayment'])?0:$info['shopsPayment']).",
			  ".(empty($info['shopsPayDetailY'])?0:$info['shopsPayDetailY']).",
			  ".(empty($info['shopsPayDetailF'])?0:$info['shopsPayDetailF']).",
			  ".(empty($info['shopsBuildArea'])?0:$info['shopsBuildArea']).",
			  ".(empty($info['shopsFloor'])?0:$info['shopsFloor']).",
			  ".(empty($info['shopsAllFloor'])?0:$info['shopsAllFloor']).",
			  ".(empty($info['shopsDivision'])?0:$info['shopsDivision']).",
			  ".(empty($info['shopsFitment'])?0:$info['shopsFitment']).",
			  '".(empty($info['shopsBaseService'])?'':$info['shopsBaseService'])."',
			  '".(empty($info['shopsAimOperastion'])?'':$info['shopsAimOperastion'])."',
			  ".(empty($info['shopsIncludFee'])?0:$info['shopsIncludFee']).",
			  ".(empty($info['shopsPropFee'])?0:$info['shopsPropFee']).",
			  ".(empty($info['shopsTransfer'])?0:$info['shopsTransfer']).",
			  '".(empty($info['shopsTransferFee'])?'':$info['shopsTransferFee'])."',
			  '".(empty($info['shopsNumber'])?'':$info['shopsNumber'])."',
			  ".(empty($info['shopsSellRentType'])?0:$info['shopsSellRentType']).",
			  ".(empty($info['shopsMapX'])?0:$info['shopsMapX']).",
			  ".(empty($info['shopsMapY'])?0:$info['shopsMapY']).",
			  ".(empty($info['shopsState'])?0:$info['shopsState']).",
			  ".(empty($info['shopsUserId'])?0:$info['shopsUserId']).",
			  ".(empty($info['shopsCommunityId'])?0:$info['shopsCommunityId']).",
			  '".(empty($info['shopsTraffic'])?'':$info['shopsTraffic'])."',
			  '".(empty($info['shopsSet'])?'':$info['shopsSet'])."',".time().",".time().")";
		
		$this->db->query($sql);
		$shopId = $this->db->getInsertNum();
		return $shopId;					
	}

	public function countProperty($userId,$state,$txType=1){
		$sql = "select count(shopsId) as propTotal from ecms_shops where shopsUserId=".$userId." and shopsSellRentType=".$txType;
		if($state == 1){
			$sql .= " and shopsState in(1,5)";
		}else{
			$sql .= " and shopsState=".$state;
		}
		$result = $this->db->getQueryValue($sql);
		return $result['propTotal'];
	}

	public function delete($shopsId){
		$sql="update ecms_shops set shopsState=2 where shopsId=".$shopsId;
		return $this->db->getQueryExecute($sql);
	}

	public function getPropertyById($userId,$propId){
		$sql = "select shopsName,shopsAddress,shopsTitle,shopsContent,shopsType,shopsSellPrice,shopsRentPrice,".
			   "shopsRentPriceUnit,shopsRentState,shopsPayment,shopsPayDetailY,shopsPayDetailF,shopsBuildArea,shopsFloor,shopsAllFloor,shopsDivision,".
			   "shopsFitment,shopsBaseService,shopsAimOperastion,shopsIncludFee,shopsPropFee,shopsTransfer,shopsTransferFee,shopsNumber,shopsSellRentType,(select communityName from ecms_community where communityId=shopsCommunityId) as propName,".
			   "shopsMapX,shopsMapY,shopsState,shopsUserId,shopsCommunityId,shopsTraffic,shopsSet,picId,picURl as propPhoto,shopsCreateTime,shopsUpdateTime ". 
				"from ecms_shops prop left join ecms_pic pic on picBuildType=2 and picBuildId=shopsId and picState=1 ".
				"where shopsId=".$propId;
		if($userId > 0){
			$sql .= " and shopsUserId=".$userId;
		}
		return $this->db->getQueryValue($sql);
	}
	public function modify($info){
		$sql = "update ecms_shops set ";
		if(isset($info['shopsAddress'])){
			$sql .= "shopsAddress='".$info['shopsAddress']."',";
		}
		if(isset($info['shopsTitle'])){
			$sql .= "shopsTitle='".$info['shopsTitle']."',";
		} 
		if(isset($info['shopsContent'])){
			$sql .= "shopsContent='".$info['shopsContent']."',";
		} 
		if(isset($info['shopsType']) && $info['shopsType'] > 0){
			$sql .= "shopsType=".$info['shopsType'].",";
		} 
		if(isset($info['shopsSellPrice']) && $info['shopsSellPrice']>0){
			$sql .= "shopsSellPrice=".$info['shopsSellPrice'].",";
		} 
		if(isset($info['shopsBuildArea'])){
			$sql .= "shopsBuildArea=".$info['shopsBuildArea'].",";
		} 
		if(isset($info['shopsFloor'])){
			$sql .= "shopsFloor=".$info['shopsFloor'].",";
		} 
		if(isset($info['shopsAllFloor'])){
			$sql .= "shopsAllFloor=".$info['shopsAllFloor'].",";
		} 
		if(isset($info['shopsDivision'])){
			$sql .= "shopsDivision=".$info['shopsDivision'].",";
		} 
		if(isset($info['shopsFitment'])){
			$sql .= "shopsFitment=".$info['shopsFitment'].",";
		} 
		if(isset($info['shopsBaseService'])){
			$sql .= "shopsBaseService='".$info['shopsBaseService']."',";
		}
		if(isset($info['shopsAimOperastion'])){
			$sql .= "shopsAimOperastion='".$info['shopsAimOperastion']."',";
		}
		if(isset($info['shopsIncludFee']) && $info['shopsIncludFee']>0){
			$sql .= "shopsIncludFee=".$info['shopsIncludFee'].",";
		}
		if(isset($info['shopsPropFee']) && $info['shopsPropFee']>0){
			$sql .= "shopsPropFee=".$info['shopsPropFee'].",";
		}
		if(isset($info['shopsTransfer']) && $info['shopsTransfer']>0){
			$sql .= "shopsTransfer=".$info['shopsTransfer'].",";
		}
		if(isset($info['shopsTransferFee']) && $info['shopsTransferFee']>0){
			$sql .= "shopsTransferFee=".$info['shopsTransferFee'].",";
		}
		if(isset($info['shopsRentState']) && $info['shopsRentState']>0){
			$sql .= "shopsRentState=".$info['shopsRentState'].",";
		}
		if(isset($info['shopsPayment']) && $info['shopsPayment']>0){
			$sql .= "shopsPayment=".$info['shopsPayment'].",";
		}
		if(isset($info['shopsPayDetailY'])){
			$sql .= "shopsPayDetailY=".$info['shopsPayDetailY'].",";
		}
		if(isset($info['shopsPayDetailF'])){
			$sql .= "shopsPayDetailF=".$info['shopsPayDetailF'].",";
		}
		if(isset($info['shopsNumber'])){
			$sql .= "shopsNumber='".$info['shopsNumber']."',";
		}
		if(isset($info['shopsState'])){
			$sql .= "shopsState=".$info['shopsState'].",";
		}
		if(isset($info['shopsRentPrice']) && $info['shopsRentPrice']>0){
			$sql .= "shopsRentPrice=".$info['shopsRentPrice'].",";
		}
		if(isset($info['shopsRentPriceUnit'])){
			$sql .= "shopsRentPriceUnit=".$info['shopsRentPriceUnit'].",";
		}
		if(isset($info['shopsTraffic'])){
			$sql .= "shopsTraffic='".$info['shopsTraffic']."',";
		}
		if(isset($info['shopsSet'])){
			$sql .= "shopsSet='".$info['shopsSet']."',";
		}
		$sql .= "shopsUpdateTime=".time()." where shopsId=".$info['shopId'];
		return $this->db->getQueryExeCute($sql);
	}
	public function refresh($propId){
		$sql = "update ecms_shops set shopsUpdateTime=".time()." where villaId=".$propId;
		return $this->db->getQueryExeCute($sql);
	}
	//end to be added by Cheneil
	public function getDetail(){
		
	}
	//added by david 
	//搜索查询获取商铺出售列表信息
	public function getShopsSellListForSearch($where='',$group='',$order='',$limit=''){
		if($where!=''){
			$where.=' AND s.shopsSellRentType=1 AND ud.userdetailState=2';
		}else{
			$where='WHERE s.shopsSellRentType=1 AND ud.userdetailState=2';
		}
		$sql="SELECT s.*,c.communityId,c.communityName,c.communityAddress,c.communityProvince,c.communityCity,
			  c.communityDistrict,c.communityArea,u.userId,ud.userdetailName,i.imcpId,i.imcpShortName,p.picUrl,p.picThumb,p.picInfo 
			  FROM ecms_shops AS s 
			  INNER JOIN ecms_community AS c ON s.shopsCommunityId=c.communityId AND s.shopsState=5 AND c.communityState=1 
			  INNER JOIN ecms_user AS u ON s.shopsUserId=u.userId AND u.userState=1 AND u.userType<>0 
			  LEFT JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId AND i.imcpState=1 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=s.shopsId AND p.picState=1 AND p.pictypeId=1 AND p.picBuildType=2 AND p.picSellRent=1 
			  $where 
			  $group 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	//搜索查询获取商铺出售总数信息
	public function getShopsSellCountForSearch($where='',$group=''){
		if($where!=''){
			$where.=' AND s.shopsSellRentType=1 AND ud.userdetailState=2';
		}else{
			$where='WHERE s.shopsSellRentType=1 AND ud.userdetailState=2';
		}
		$sql="SELECT COUNT(*) AS counts FROM (SELECT s.shopsId FROM ecms_shops AS s 
			  INNER JOIN ecms_community AS c ON s.shopsCommunityId=c.communityId AND s.shopsState=5 AND c.communityState=1 
			  INNER JOIN ecms_user AS u ON s.shopsUserId=u.userId AND u.userState=1 AND u.userType<>0 
			  LEFT JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId AND i.imcpState=1 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=s.shopsId AND p.picState=1 AND p.pictypeId=1 AND p.picBuildType=2 AND p.picSellRent=1 
			  $where 
			  $group) as tb_new";
		return $this->db->getQueryValue($sql);
	}
	//搜索查询获取商铺出租列表信息
	public function getShopsRentListForSearch($where='',$group='',$order='',$limit=''){
		if($where!=''){
			$where.=' AND s.shopsSellRentType=2 AND ud.userdetailState=2';
		}else{
			$where='WHERE s.shopsSellRentType=2 AND ud.userdetailState=2';
		}
		$sql="SELECT s.*,c.communityId,c.communityName,c.communityAddress,c.communityProvince,c.communityCity,
			  c.communityDistrict,c.communityArea,u.userId,ud.userdetailName,i.imcpId,i.imcpShortName,p.picUrl,p.picThumb,p.picInfo 
			  FROM ecms_shops AS s 
			  INNER JOIN ecms_community AS c ON s.shopsCommunityId=c.communityId AND s.shopsState=5 AND c.communityState=1 
			  INNER JOIN ecms_user AS u ON s.shopsUserId=u.userId AND u.userState=1 AND u.userType<>0 
			  LEFT JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId AND i.imcpState=1 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=s.shopsId AND p.picState=1 AND p.pictypeId=1 AND p.picBuildType=2 AND p.picSellRent=2 
			  $where 
			  $group 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	//搜索查询获取商铺出租总数信息
	public function getShopsRentCountForSearch($where='',$group=''){
		if($where!=''){
			$where.=' AND s.shopsSellRentType=2 AND ud.userdetailState=2';
		}else{
			$where='WHERE s.shopsSellRentType=2 AND ud.userdetailState=2';
		}
		$sql="SELECT COUNT(*) AS counts FROM (SELECT s.shopsId FROM ecms_shops AS s 
			  INNER JOIN ecms_community AS c ON s.shopsCommunityId=c.communityId AND s.shopsState=5 AND c.communityState=1 
			  INNER JOIN ecms_user AS u ON s.shopsUserId=u.userId AND u.userState=1 AND u.userType<>0 
			  LEFT JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId AND i.imcpState=1 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=s.shopsId AND p.picState=1 AND p.pictypeId=1 AND p.picBuildType=2 AND p.picSellRent=2 
			  $where 
			  $group) as tb_new";
		return $this->db->getQueryValue($sql);
	}
	//点击统计
	public function clickCount($id){
		$sql="update ecms_shops set shopsClickCount=shopsClickCount+1 where shopsId=$id";
		return $this->db->getQueryExecute($sql);
	}
	//end to be added by david
}
?>