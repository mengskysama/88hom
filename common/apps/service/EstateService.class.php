<?php
class EstateService{
	private $db = null;
	private $estateDAO = null;
	
	public function __construct($db){
		$this->db = $db;
		$this->estateDAO = new EstateDAO($db);
	}
	
	public function getEstatesByLikeName($estName){
		return $this->estateDAO->getEstatesByLikeName($estName);
	}
	
	public function getEstateByName($estName){
		return $this->estateDAO->getEstateByName($estName);
	}
	
	public function getEstateById($estId){
		return $this->estateDAO->getEstateById($estId);
	}
	
	public function saveEstate($estate){
		return $this->estateDAO->saveEstate($estate);
	}
}
?>