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
}
?>