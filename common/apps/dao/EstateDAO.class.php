<?php
class EstateDAO{
	private $db = null;
	public function __construct($db){
		$this->db = $db;
	}
		
	public function getEstatesByLikeName($estName){
		$sql = "select communityId,communityName from ecms_community where communityState=1 and communityName like '".$estName."%'";
		return $this->db->getQueryArray($sql);
	}
	
	public function getEstateByName($estName){
		$sql = "select * from ecms_community where communityName='".$estName."' and communityState=1";
		return $this->db->getQueryValue($sql);
	}
	
	public function getEstateById($estId){
		$sql = "select * from ecms_community where communityId=".$estId;
		return $this->db->getQueryValue($sql);
	}
	
	public function saveEstate($estate){
		$fields = "insert into ecms_community(communityName,";
		$values = "values('".$estate['communityName']."',";
		

		if(isset($estate['communityIsHouseType'])){
			$fields .= "communityIsHouseType,";
			$values .= $estate['communityIsHouseType'].",";
		}

		if(isset($estate['communityIsBusinessType'])){
			$fields .= "communityIsBusinessType,";
			$values .= $estate['communityIsBusinessType'].",";
		}

		if(isset($estate['communityIsOfficeType'])){
			$fields .= "communityIsOfficeType,";
			$values .= $estate['communityIsOfficeType'].",";
		}

		if(isset($estate['communityIsVillaType'])){
			$fields .= "communityIsVillaType,";
			$values .= $estate['communityIsVillaType'].",";
		}

		if(isset($estate['communityAddress'])){
			$fields .= "communityAddress,";
			$values .= "'".$estate['communityAddress']."',";
		}

		if(isset($estate['communityTraffic'])){
			$fields .= "communityTraffic,";
			$values .= "'".$estate['communityTraffic']."',";
		}

		if(isset($estate['communityPeriInfo'])){
			$fields .= "communityPeriInfo,";
			$values .= "'".$estate['communityPeriInfo']."',";
		}

		if(isset($estate['communityProvince'])){
			$fields .= "communityProvince,";
			$values .= $estate['communityProvince'].",";
		}

		if(isset($estate['communityCity'])){
			$fields .= "communityCity,";
			$values .= $estate['communityCity'].",";
		}

		if(isset($estate['communityDistrict'])){
			$fields .= "communityDistrict,";
			$values .= $estate['communityDistrict'].",";
		}

		if(isset($estate['communityArea'])){
			$fields .= "communityArea,";
			$values .= $estate['communityArea'].",";
		}

		if(isset($estate['communityState'])){
			$fields .= "communityState,";
			$values .= $estate['communityState'].",";
		}

		if(isset($estate['communityUserId'])){
			$fields .= "communityUserId,";
			$values .= $estate['communityUserId'].",";
		}
		$fields .= "communityCreateTime) ";
		$values .= "UNIX_TIMESTAMP())";
		
		$sql = $fields.$values;
		$this->db->query($sql);
		$estId = $this->db->getInsertNum();
		return $estId;
	}
}
?>