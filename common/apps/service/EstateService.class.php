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
}
?>