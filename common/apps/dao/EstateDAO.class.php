<?php
class EstateDAO{
	private $db = null;
	public function __construct($db){
		$this->db = $db;
	}
	
	public function getEstatesByLikeName($estName){
		$sql = "select communityId,communityName from ecms_community where communityName like '".$estName."%'";
		return $this->db->getQueryArray($sql);
	}
	
	public function getEstateById($estId){
		$sql = "select * from ecms_community where communityId=".$estId;
		return $this->db->getQueryValue($sql);
	}
	
	public function saveEstate($estate){
		$sql = "insert into ecms_community(communityName) values('".$estate['communityName']."')";
		$this->db->query($sql);
		$estId = $this->db->getInsertNum();
		return $estId;
	}
}
?>