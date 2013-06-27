<?php
require_once 'PropertyHandler.class.php';
class ShopPropertyHandler extends PropertyHandler{
	private $db;
	private $estId;
	private $estName;
	private $shopsAddress;
	private $shopsType;
	private $shopsAreaId;
	private $shopsNumber;
	private $shopsSellPrice;
	private $shopsPropFee;
	private $shopsBuildArea;
	private $shopsFloor;
	private $shopsAllFloor;
	private $shopsDivision;
	private $shopsFitment;
	private $shopsBaseService;
	private $shopsAimOperastion;
	private $shopPhoto;
	private $shopsTitle;
	private $shopsContent;
	private $shopUserId;
	private $shopsState;
	
	private $estateService;
	private $propertyService;
	
	function __construct($db,$estId,$estName,$shopsAddress,$shopsType,$shopsAreaId,$shopsNumber,
						$shopsSellPrice,$shopsPropFee,$shopsBuildArea,$shopsFloor,$shopsAllFloor,$shopsDivision,
						$shopsFitment,$shopsBaseService,$shopsAimOperastion,$shopPhoto,$shopsTitle,
						$shopContent,$shopUserId,$shopsState){
		
		$this->db = $db;
		$this->estId = $estId;
		$this->estName = $estName;
		$this->shopsAddress = $shopsAddress;
		$this->shopsType = $shopsType;
		$this->shopsAreaId = $shopsAreaId;
		$this->shopsNumber = $shopsNumber;
		$this->shopsSellPrice = $shopsSellPrice;
		$this->shopsPropFee = $shopsPropFee;
		$this->shopsBuildArea = $shopsBuildArea;
		$this->shopsFloor = $shopsFloor;
		$this->shopsAllFloor = $shopsAllFloor;
		$this->shopsDivision = $shopsDivision;
		$this->shopsFitment = $shopsFitment;
		$this->shopsBaseService = $shopsBaseService;
		$this->shopsAimOperastion = $shopsAimOperastion;
		$this->shopPhoto = $shopPhoto;
		$this->shopsTitle = $shopsTitle;
		$this->shopsContent = $shopContent;
		$this->shopUserId = $shopUserId;
		$this->shopsState = $shopsState;
		
		$this->estateService = new EstateService($db);
		$this->propertyService = new SecondHandPropertyService($db);
	}
	
	public function handle(){
		$photoName = $this->uploadPhoto($this->shopPhoto,$this->shopUserId);
		if(!$photoName) return false;
		
		$realEstId = $this->getRealEstateId($this->estateService,$this->estId,$this->estName);
		if(!$realEstId) return false;
		
		//save the property
		$shopsBaseService = "";
		if(!empty($this->shopsBaseService)){
			$shopsBaseService = ",";
			$len = count($this->shopsBaseService);
			for($i=0; $i<$len; $i++){
				$shopsBaseService .= $this->shopsBaseService[$i].","; 
			}			
		}
		$shopsAimOperastion = "";
		if(!empty($this->shopsAimOperastion)){
			$shopsAimOperastion = ",";
			$len = count($this->shopsAimOperastion);
			for($i=0; $i<$len; $i++){
				$shopsAimOperastion .= $this->shopsAimOperastion[$i].","; 
			}			
		}
		
		$shop['shopsName'] = $this->estName;
		$shop['shopsAddress'] = $this->shopsAddress;
		$shop['shopsTitle'] = $this->shopsTitle;
		$shop['shopsContent'] = $this->shopsContent;
		$shop['shopsType'] = $this->shopsType;
		$shop['shopsSellPrice'] = $this->shopsSellPrice;
		$shop['shopsRentPrice'] = 0;
		$shop['shopsRentPriceUnit'] = 0;
		$shop['shopsRentState'] = 0;
		$shop['shopsPayment'] = 0;
		$shop['shopsPayDetailY'] = 0;
		$shop['shopsPayDetailF'] = 0;
		$shop['shopsBuildArea'] = $this->shopsBuildArea;
		$shop['shopsFloor'] = $this->shopsFloor;
		$shop['shopsAllFloor'] = $this->shopsAllFloor;
		$shop['shopsDivision'] = $this->shopsDivision;
		$shop['shopsFitment'] = $this->shopsFitment;
		$shop['shopsBaseService'] = $shopsBaseService;
		$shop['shopsAimOperasion'] = $shopsAimOperastion;
		$shop['shopsIncludFee'] = 0;
		$shop['shopsPropFee'] = $this->shopsPropFee;
		$shop['shopsTransferFee'] = 0;
		$shop['shopsNumber'] = $this->shopsNumber;
		$shop['shopsSellRentType'] = 1;
		$shop['shopsMapX'] = 0;
		$shop['shopsMapY'] = 0;
		$shop['shopsState'] = $this->shopsState;
		$shop['shopsUserId'] = $this->shopUserId;
		$shop['shopsCommunityId'] = $realEstId;

		$shop['propertyPhoto']['picBuildType'] = 1;
		$shop['propertyPhoto']['picSellRent'] = 1;
		$shop['propertyPhoto']['picUrl'] = $photoName;		
				
		$shopId = $this->propertyService->saveShop($shop);
		if(!$shopId) return false;
		return true;
	} 
}
?>