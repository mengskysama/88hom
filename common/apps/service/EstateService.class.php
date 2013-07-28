<?php
class EstateService{
	private $db = null;
	private $estateDAO = null;
	private $picDAO = null;
	
	public function __construct($db){
		$this->db = $db;
		$this->estateDAO = new EstateDAO($db);
		$this->picDAO = new PicDAO($db);
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
		$estId = $this->estateDAO->saveEstate($estate);
		if(!$estId) return false;
		
		if(!empty($estate['photos'])){
			$photos = $estate['photos'];
			$len = count($photos);
			for($key=0; $key<$len; $key++){
				$pic['picBuildId'] = $estId;
				$pic['picBuildType'] =  $photos[$key]['picBuildType'];
				$pic['pictypeId'] = $photos[$key]['pictypeId'];
				$pic['picSellRent'] = $photos[$key]['picSellRent'];
				$pic['picUrl'] = $photos[$key]['picUrl'];
				$pic['picThumb'] = $photos[$key]['picThumb'];
				$pic['picInfo'] = $photos[$key]['picInfo'];
				$pic['picLayer'] = $photos[$key]['picLayer'];
				$pic['picState'] = $photos[$key]['picState'];
				$pic['picBuildFatherType'] = 1;
				
		
				$this->picDAO->release($pic);
			}
		}
		return $estId;
	}
}
?>