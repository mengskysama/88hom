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
		$result = false;
		if($this->factory['actionType'] == "update"){
			$result = $this->updateProperty();
		}else{
			$result = $this->createProperty();
		}
		if(!$result) return false;
	
		$this->factory['topPic']['picBuildId'] = $this->facotry['factoryId'];
		return $this->handleTopPic($this->propertyService, $this->factory['topPic']);
	}
	
	private function updateProperty(){
		return $this->propertyService->updateFactory($this->factory);
	}
	
	private function createProperty(){
		$factoryId = $this->propertyService->saveFactory($this->factory);
		if(!$factoryId) return false;
	
		$this->facotry['factoryId'] = $factoryId;
		return true;
	}
	
}