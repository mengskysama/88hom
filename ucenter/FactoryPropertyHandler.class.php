<?php
require_once 'PropertyHandler.class.php';

class FactoryPropertyHandler extends PropertyHandler{
	private $db;
	private $factory;
	private $propertyService;
	
	function __construct($db,$factory){
		$this->db = $db;
		$this->factory = $factory;
		$this->propertyService = new SecondHandPropertyService($db);
	}

	public function handle(){
		$areaId = $this->factory['factoryAreaId'];
		//echo "areaId->".$areaId."|".explode("-", $areaId);
		if(empty($areaId) || count(explode("-", $areaId)) != 4) return false;
		
		$areas = explode("-", $areaId);
		$this->factory['factoryProvince'] = $areas[0];
		$this->factory['factoryCity'] = $areas[1];
		$this->factory['factoryDistrict'] = $areas[2];
		$this->factory['factoryArea'] = $areas[3];
		//echo "<br>";
		//print_r($areas);
		
		$result = false;
		if($this->factory['actionType'] == "update"){
			$result = $this->updateProperty();
		}else{
			$result = $this->createProperty();
		}
		if(!$result) return false;
		$this->factory['topPic']['picBuildId'] = $this->factory['factoryId'];
		return $this->handleTopPic($this->propertyService, $this->factory['topPic']);
	}
	
	private function updateProperty(){
		return $this->propertyService->updateFactory($this->factory);
	}
	
	private function createProperty(){
		$factoryId = $this->propertyService->saveFactory($this->factory);
		if(!$factoryId) return false;
	
		$this->factory['factoryId'] = $factoryId;
		return true;
	}
	
}