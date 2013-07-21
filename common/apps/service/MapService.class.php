<?php 
/**
 * 
 * 地图服务类
 * @author Sam(semovy@gmail.com)
 * @since 2013-07-8
 */
class MapService{
	private $db=null;

	public function __construct($db){
		$this->db=$db;
	}

	//根据省下标，市下标，获取区域新盘数目json列表,以区域分组
	public function getPropertyCountJson($param){
		$where = '';
		if($param['buildType'] != 0)
		{
			if($param['buildType'] == 1)
				$where = ' and propertyIsHouseType=1 ';
			else if($param['buildType'] == 2)
				$where = ' and propertyIsBusinessType=1 ';
			else if($param['buildType'] == 3)
				$where = ' and propertyIsOfficeType=1 ';
			else if($param['buildType'] == 4)
				$where = ' and propertyIsVillaType=1 ';		
		}
		if($param['price'] != 0)
		{
			if($param['price'] == 1)
				$where .= ' and propertyOpenPrice between 0 and 7000 ';
			else if($param['price'] == 2)
				$where .= ' and propertyOpenPrice between 7000 and 10000  ';
			else if($param['price'] == 3)
				$where .= ' and propertyOpenPrice between 10000 and 15000  ';
			else if($param['price'] == 4)
				$where .= ' and propertyOpenPrice between 15000 and 20000  ';		
			else if($param['price'] == 5)
				$where .= ' and propertyOpenPrice between 20000 and 25000  ';	
			else if($param['price'] == 6)
				$where .= ' and propertyOpenPrice between 25000 and 30000  ';	
			else if($param['price'] == 7)
				$where .= ' and propertyOpenPrice > 30000  ';				
		}
		$propertyStateArr =  explode('|', $param['propertyState']);
		
		$sql = "select concat(count(*),'个') as value ,'sum' as type,propertyProvince provinceIndex,propertyCity cityIndex,propertyDistrict districtIndex
		  from ecms_property  where propertyProvince=".$param['provinceIndex']." and  propertyCity=".$param['cityIndex']."  and propertyState=1 $where group by propertyDistrict";
		return  $this->db->getQueryArray($sql);
	}
	//根据省下标，市下标，获取小区售房源数目json列表,以区域分组
	public function getSecondHandCountJson($param){
		$subQuery ="";
		
		if($param['buildType'] == 1)//住宅
		{
			$where = '';
			
			if($param['price'] != 0)
			{
				if($param['type'] == 'sell'){//出售
					if($param['price'] == 1)
						$where .= ' and houseSellPrice between 0 and 1000000 ';
					else if($param['price'] == 2)
						$where .= ' and houseSellPrice between 1000000 and 1500000  ';
					else if($param['price'] == 3)
						$where .= ' and houseSellPrice between 1500000 and 2000000  ';
					else if($param['price'] == 4)
						$where .= ' and houseSellPrice between 2000000 and 3000000  ';		
					else if($param['price'] == 5)
						$where .= ' and houseSellPrice between 3000000 and 5000000  ';	
					else if($param['price'] == 6)
						$where .= ' and houseSellPrice between 5000000 and 10000000  ';	
					else if($param['price'] == 7)
						$where .= ' and houseSellPrice > 10000000  ';
				}
				else{//出租
					if($param['price'] == 1)
						$where .= ' and houseSellPrice between 0 and 500 ';
					else if($param['price'] == 2)
						$where .= ' and houseSellPrice between 500 and 1000  ';
					else if($param['price'] == 3)
						$where .= ' and houseSellPrice between 1000 and 2000  ';
					else if($param['price'] == 4)
						$where .= ' and houseSellPrice between 2000 and 3000  ';		
					else if($param['price'] == 5)
						$where .= ' and houseSellPrice between 3000 and 5000  ';	
					else if($param['price'] == 6)
						$where .= ' and houseSellPrice between 5000 and 8000  ';	
					else if($param['price'] == 7)
						$where .= ' and houseSellPrice > 8000  ';
				}
			}
			if($param['houseType'] != 0){//房型
				if($param['houseType'] == 1)
					$where .= ' and houseRoom = 1 ';
				else if($param['houseType'] == 2)
					$where .= ' and houseRoom = 2 ';
				else if($param['houseType'] == 3)
					$where .= ' and houseRoom = 3 ';
				else if($param['houseType'] == 4)
					$where .= ' and houseRoom = 4 ';
				else if($param['houseType'] == 5)
					$where .= ' and houseRoom = 5 ';
				else if($param['houseType'] == 6)
					$where .= ' and houseRoom > 5 ';					
			}
			if($param['area'] != 0){//面积
				if($param['area'] == 1)
					$where .= ' and houseBuildArea between 0 and 50 ';
				else if($param['area'] == 2)
					$where .= ' and houseBuildArea between 50 and 70  ';
				else if($param['area'] == 3)
					$where .= ' and houseBuildArea between 70 and 90  ';
				else if($param['area'] == 4)
					$where .= ' and houseBuildArea between 90 and 110  ';		
				else if($param['area'] == 5)
					$where .= ' and houseBuildArea between 110 and 130  ';	
				else if($param['area'] == 6)
					$where .= ' and houseBuildArea between 130 and 150  ';
				else if($param['area'] == 7)
					$where .= ' and houseBuildArea between 150 and 200  ';
				else if($param['area'] == 8)
					$where .= ' and houseBuildArea between 200 and 300  ';			
				else if($param['area'] == 9)
					$where .= ' and houseBuildArea > 300  ';
			}	
			
			if($param['type'] == 'sell'){
				$where .= ' and houseSellRentType=1 ';
			}
			else 
			{
				$where .= ' and houseSellRentType=2 ';
			}
			$where .= ' and houseState=5 ';
			$subQuery ="sum((select count(*) from ecms_house  where houseCommunityId=c.communityId $where))";
		}
		else if($param['buildType'] == 2)//商铺
		{
			$where = '';
			
			if($param['price'] != 0)
			{
				if($param['type'] == 'sell'){//出售
					if($param['price'] == 1)
						$where .= ' and shopsSellPrice between 0 and 1000000 ';
					else if($param['price'] == 2)
						$where .= ' and shopsSellPrice between 1000000 and 1500000  ';
					else if($param['price'] == 3)
						$where .= ' and shopsSellPrice between 1500000 and 2000000  ';
					else if($param['price'] == 4)
						$where .= ' and shopsSellPrice between 2000000 and 3000000  ';		
					else if($param['price'] == 5)
						$where .= ' and shopsSellPrice between 3000000 and 5000000  ';	
					else if($param['price'] == 6)
						$where .= ' and shopsSellPrice between 5000000 and 10000000  ';	
					else if($param['price'] == 7)
						$where .= ' and shopsSellPrice > 10000000  ';
				}
				else{//出租
					if($param['price'] == 1)
						$where .= ' and shopsRentPrice between 0 and 500 ';
					else if($param['price'] == 2)
						$where .= ' and shopsRentPrice between 500 and 1000  ';
					else if($param['price'] == 3)
						$where .= ' and shopsRentPrice between 1000 and 2000  ';
					else if($param['price'] == 4)
						$where .= ' and shopsRentPrice between 2000 and 3000  ';		
					else if($param['price'] == 5)
						$where .= ' and shopsRentPrice between 3000 and 5000  ';	
					else if($param['price'] == 6)
						$where .= ' and shopsRentPrice between 5000 and 8000  ';	
					else if($param['price'] == 7)
						$where .= ' and shopsRentPrice > 8000  ';
				}
			}
			if($param['area'] != 0){//面积
				if($param['area'] == 1)
					$where .= ' and shopsBuildArea between 0 and 50 ';
				else if($param['area'] == 2)
					$where .= ' and shopsBuildArea between 50 and 70  ';
				else if($param['area'] == 3)
					$where .= ' and shopsBuildArea between 70 and 90  ';
				else if($param['area'] == 4)
					$where .= ' and shopsBuildArea between 90 and 110  ';		
				else if($param['area'] == 5)
					$where .= ' and shopsBuildArea between 110 and 130  ';	
				else if($param['area'] == 6)
					$where .= ' and shopsBuildArea between 130 and 150  ';
				else if($param['area'] == 7)
					$where .= ' and shopsBuildArea between 150 and 200  ';
				else if($param['area'] == 8)
					$where .= ' and shopsBuildArea between 200 and 300  ';			
				else if($param['area'] == 9)
					$where .= ' and shopsBuildArea > 300  ';
			}
			if($param['type'] == 'sell'){
				$where .= ' and shopsSellRentType=1 ';
			}
			else 
			{
				$where .= ' and shopsSellRentType=2 ';
			}
			$where .= ' and shopsState=5 ';	
			$subQuery ="sum((select count(*) from ecms_shops  where shopsCommunityId=c.communityId $where))";
		}
		else if($param['buildType'] == 3)//写字楼
		{
			$where = '';
			
			if($param['price'] != 0)
			{
				if($param['type'] == 'sell'){//出售
					if($param['price'] == 1)
						$where .= ' and officeSellPrice between 0 and 1000000 ';
					else if($param['price'] == 2)
						$where .= ' and officeSellPrice between 1000000 and 1500000  ';
					else if($param['price'] == 3)
						$where .= ' and officeSellPrice between 1500000 and 2000000  ';
					else if($param['price'] == 4)
						$where .= ' and officeSellPrice between 2000000 and 3000000  ';		
					else if($param['price'] == 5)
						$where .= ' and officeSellPrice between 3000000 and 5000000  ';	
					else if($param['price'] == 6)
						$where .= ' and officeSellPrice between 5000000 and 10000000  ';	
					else if($param['price'] == 7)
						$where .= ' and officeSellPrice > 10000000  ';
				}
				else{//出租
					if($param['price'] == 1)
						$where .= ' and officeRentPrice between 0 and 500 ';
					else if($param['price'] == 2)
						$where .= ' and officeRentPrice between 500 and 1000  ';
					else if($param['price'] == 3)
						$where .= ' and officeRentPrice between 1000 and 2000  ';
					else if($param['price'] == 4)
						$where .= ' and officeRentPrice between 2000 and 3000  ';		
					else if($param['price'] == 5)
						$where .= ' and officeRentPrice between 3000 and 5000  ';	
					else if($param['price'] == 6)
						$where .= ' and officeRentPrice between 5000 and 8000  ';	
					else if($param['price'] == 7)
						$where .= ' and officeRentPrice > 8000  ';
				}
			}
			if($param['area'] != 0){//面积
				if($param['area'] == 1)
					$where .= ' and officeBuildArea between 0 and 50 ';
				else if($param['area'] == 2)
					$where .= ' and officeBuildArea between 50 and 70  ';
				else if($param['area'] == 3)
					$where .= ' and officeBuildArea between 70 and 90  ';
				else if($param['area'] == 4)
					$where .= ' and officeBuildArea between 90 and 110  ';		
				else if($param['area'] == 5)
					$where .= ' and officeBuildArea between 110 and 130  ';	
				else if($param['area'] == 6)
					$where .= ' and officeBuildArea between 130 and 150  ';
				else if($param['area'] == 7)
					$where .= ' and officeBuildArea between 150 and 200  ';
				else if($param['area'] == 8)
					$where .= ' and officeBuildArea between 200 and 300  ';			
				else if($param['area'] == 9)
					$where .= ' and officeBuildArea > 300  ';
			}
			if($param['type'] == 'sell'){
				$where .= ' and officeSellRentType=1 ';
			}
			else 
			{
				$where .= ' and officeSellRentType=2 ';
			}
			$where .= ' and officeState=5 ';
			$subQuery ="sum((select count(*) from ecms_office  where officeCommunityId=c.communityId $where))";
		}
		else if($param['buildType'] == 4)//别墅
		{
			$where = '';
			
			if($param['price'] != 0)
			{
				if($param['type'] == 'sell'){//出售
					if($param['price'] == 1)
						$where .= ' and villaSellPrice between 0 and 1000000 ';
					else if($param['price'] == 2)
						$where .= ' and villaSellPrice between 1000000 and 1500000  ';
					else if($param['price'] == 3)
						$where .= ' and villaSellPrice between 1500000 and 2000000  ';
					else if($param['price'] == 4)
						$where .= ' and villaSellPrice between 2000000 and 3000000  ';		
					else if($param['price'] == 5)
						$where .= ' and villaSellPrice between 3000000 and 5000000  ';	
					else if($param['price'] == 6)
						$where .= ' and villaSellPrice between 5000000 and 10000000  ';	
					else if($param['price'] == 7)
						$where .= ' and villaSellPrice > 10000000  ';
				}
				else{//出租
					if($param['price'] == 1)
						$where .= ' and villaRentPrice between 0 and 500 ';
					else if($param['price'] == 2)
						$where .= ' and villaRentPrice between 500 and 1000  ';
					else if($param['price'] == 3)
						$where .= ' and villaRentPrice between 1000 and 2000  ';
					else if($param['price'] == 4)
						$where .= ' and villaRentPrice between 2000 and 3000  ';		
					else if($param['price'] == 5)
						$where .= ' and villaRentPrice between 3000 and 5000  ';	
					else if($param['price'] == 6)
						$where .= ' and villaRentPrice between 5000 and 8000  ';	
					else if($param['price'] == 7)
						$where .= ' and villaRentPrice > 8000  ';
				}
			}
			if($param['houseType'] != 0){//房型
				if($param['houseType'] == 1)
					$where .= ' and villaRoom = 1 ';
				else if($param['houseType'] == 2)
					$where .= ' and villaRoom = 2 ';
				else if($param['houseType'] == 3)
					$where .= ' and villaRoom = 3 ';
				else if($param['houseType'] == 4)
					$where .= ' and villaRoom = 4 ';
				else if($param['houseType'] == 5)
					$where .= ' and villaRoom = 5 ';
				else if($param['houseType'] == 6)
					$where .= ' and villaRoom > 5 ';					
			}
			if($param['area'] != 0){//面积
				if($param['area'] == 1)
					$where .= ' and villaBuildArea between 0 and 50 ';
				else if($param['area'] == 2)
					$where .= ' and villaBuildArea between 50 and 70  ';
				else if($param['area'] == 3)
					$where .= ' and villaBuildArea between 70 and 90  ';
				else if($param['area'] == 4)
					$where .= ' and villaBuildArea between 90 and 110  ';		
				else if($param['area'] == 5)
					$where .= ' and villaBuildArea between 110 and 130  ';	
				else if($param['area'] == 6)
					$where .= ' and villaBuildArea between 130 and 150  ';
				else if($param['area'] == 7)
					$where .= ' and villaBuildArea between 150 and 200  ';
				else if($param['area'] == 8)
					$where .= ' and villaBuildArea between 200 and 300  ';			
				else if($param['area'] == 9)
					$where .= ' and villaBuildArea > 300  ';
			}
			if($param['type'] == 'sell'){
				$where .= ' and villaSellRentType=1 ';
			}
			else 
			{
				$where .= ' and villaSellRentType=2 ';
			}
			$where .= ' and villaState=5 ';	
			$subQuery ="sum((select count(*) from ecms_villa  where villaCommunityId=c.communityId $where))";
		}	
		
		$sql = "select concat(($subQuery),'套') 
				as value ,'sum' as type,communityProvince provinceIndex,communityCity cityIndex,communityDistrict districtIndex from ecms_community c 
				where communityProvince=".$param['provinceIndex']." and  communityCity=".$param['cityIndex']."  and communityState=1 group by communityDistrict	";
		
		return  $this->db->getQueryArray($sql);
	}
	//根据经纬度，获取小区售房源数目json列表
	public function getSecondHandJson($param){
		$subQuery ="";
		
		if($param['buildType'] == 1)//住宅
		{
			$subQuery ="select count(*) from ecms_house  where houseCommunityId=c.communityId ";
			
			$where = '';
			
			if($param['price'] != 0)
			{
				if($param['type'] == 'sell'){//出售
					if($param['price'] == 1)
						$where .= ' and houseSellPrice between 0 and 1000000 ';
					else if($param['price'] == 2)
						$where .= ' and houseSellPrice between 1000000 and 1500000  ';
					else if($param['price'] == 3)
						$where .= ' and houseSellPrice between 1500000 and 2000000  ';
					else if($param['price'] == 4)
						$where .= ' and houseSellPrice between 2000000 and 3000000  ';		
					else if($param['price'] == 5)
						$where .= ' and houseSellPrice between 3000000 and 5000000  ';	
					else if($param['price'] == 6)
						$where .= ' and houseSellPrice between 5000000 and 10000000  ';	
					else if($param['price'] == 7)
						$where .= ' and houseSellPrice > 10000000  ';
				}
				else{//出租
					if($param['price'] == 1)
						$where .= ' and houseSellPrice between 0 and 500 ';
					else if($param['price'] == 2)
						$where .= ' and houseSellPrice between 500 and 1000  ';
					else if($param['price'] == 3)
						$where .= ' and houseSellPrice between 1000 and 2000  ';
					else if($param['price'] == 4)
						$where .= ' and houseSellPrice between 2000 and 3000  ';		
					else if($param['price'] == 5)
						$where .= ' and houseSellPrice between 3000 and 5000  ';	
					else if($param['price'] == 6)
						$where .= ' and houseSellPrice between 5000 and 8000  ';	
					else if($param['price'] == 7)
						$where .= ' and houseSellPrice > 8000  ';
				}
			}
			if($param['houseType'] != 0){//房型
				if($param['houseType'] == 1)
					$where .= ' and houseRoom = 1 ';
				else if($param['houseType'] == 2)
					$where .= ' and houseRoom = 2 ';
				else if($param['houseType'] == 3)
					$where .= ' and houseRoom = 3 ';
				else if($param['houseType'] == 4)
					$where .= ' and houseRoom = 4 ';
				else if($param['houseType'] == 5)
					$where .= ' and houseRoom = 5 ';
				else if($param['houseType'] == 6)
					$where .= ' and houseRoom > 5 ';					
			}
			if($param['area'] != 0){//面积
				if($param['area'] == 1)
					$where .= ' and houseBuildArea between 0 and 50 ';
				else if($param['area'] == 2)
					$where .= ' and houseBuildArea between 50 and 70  ';
				else if($param['area'] == 3)
					$where .= ' and houseBuildArea between 70 and 90  ';
				else if($param['area'] == 4)
					$where .= ' and houseBuildArea between 90 and 110  ';		
				else if($param['area'] == 5)
					$where .= ' and houseBuildArea between 110 and 130  ';	
				else if($param['area'] == 6)
					$where .= ' and houseBuildArea between 130 and 150  ';
				else if($param['area'] == 7)
					$where .= ' and houseBuildArea between 150 and 200  ';
				else if($param['area'] == 8)
					$where .= ' and houseBuildArea between 200 and 300  ';			
				else if($param['area'] == 9)
					$where .= ' and houseBuildArea > 300  ';
			}	
			
			if($param['type'] == 'sell'){
				$where .= ' and houseSellRentType=1 ';
			}
			else 
			{
				$where .= ' and houseSellRentType=2 ';
			}
			$where .= ' and houseState=5 ';
			$subQuery .= $where;
		}
		else if($param['buildType'] == 2)//商铺
		{
			$subQuery ="select count(*) from ecms_shops  where shopsCommunityId=c.communityId ";
			
			$where = '';
			
			if($param['price'] != 0)
			{
				if($param['type'] == 'sell'){//出售
					if($param['price'] == 1)
						$where .= ' and shopsSellPrice between 0 and 1000000 ';
					else if($param['price'] == 2)
						$where .= ' and shopsSellPrice between 1000000 and 1500000  ';
					else if($param['price'] == 3)
						$where .= ' and shopsSellPrice between 1500000 and 2000000  ';
					else if($param['price'] == 4)
						$where .= ' and shopsSellPrice between 2000000 and 3000000  ';		
					else if($param['price'] == 5)
						$where .= ' and shopsSellPrice between 3000000 and 5000000  ';	
					else if($param['price'] == 6)
						$where .= ' and shopsSellPrice between 5000000 and 10000000  ';	
					else if($param['price'] == 7)
						$where .= ' and shopsSellPrice > 10000000  ';
				}
				else{//出租
					if($param['price'] == 1)
						$where .= ' and shopsRentPrice between 0 and 500 ';
					else if($param['price'] == 2)
						$where .= ' and shopsRentPrice between 500 and 1000  ';
					else if($param['price'] == 3)
						$where .= ' and shopsRentPrice between 1000 and 2000  ';
					else if($param['price'] == 4)
						$where .= ' and shopsRentPrice between 2000 and 3000  ';		
					else if($param['price'] == 5)
						$where .= ' and shopsRentPrice between 3000 and 5000  ';	
					else if($param['price'] == 6)
						$where .= ' and shopsRentPrice between 5000 and 8000  ';	
					else if($param['price'] == 7)
						$where .= ' and shopsRentPrice > 8000  ';
				}
			}
			if($param['area'] != 0){//面积
				if($param['area'] == 1)
					$where .= ' and shopsBuildArea between 0 and 50 ';
				else if($param['area'] == 2)
					$where .= ' and shopsBuildArea between 50 and 70  ';
				else if($param['area'] == 3)
					$where .= ' and shopsBuildArea between 70 and 90  ';
				else if($param['area'] == 4)
					$where .= ' and shopsBuildArea between 90 and 110  ';		
				else if($param['area'] == 5)
					$where .= ' and shopsBuildArea between 110 and 130  ';	
				else if($param['area'] == 6)
					$where .= ' and shopsBuildArea between 130 and 150  ';
				else if($param['area'] == 7)
					$where .= ' and shopsBuildArea between 150 and 200  ';
				else if($param['area'] == 8)
					$where .= ' and shopsBuildArea between 200 and 300  ';			
				else if($param['area'] == 9)
					$where .= ' and shopsBuildArea > 300  ';
			}
			if($param['type'] == 'sell'){
				$where .= ' and shopsSellRentType=1 ';
			}
			else 
			{
				$where .= ' and shopsSellRentType=2 ';
			}	
			$where .= ' and shopsState=5 ';
			$subQuery .= $where;
		}
		else if($param['buildType'] == 3)//写字楼
		{
			$subQuery ="select count(*) from ecms_office  where officeCommunityId=c.communityId ";
			
			$where = '';
			
			if($param['price'] != 0)
			{
				if($param['type'] == 'sell'){//出售
					if($param['price'] == 1)
						$where .= ' and officeSellPrice between 0 and 1000000 ';
					else if($param['price'] == 2)
						$where .= ' and officeSellPrice between 1000000 and 1500000  ';
					else if($param['price'] == 3)
						$where .= ' and officeSellPrice between 1500000 and 2000000  ';
					else if($param['price'] == 4)
						$where .= ' and officeSellPrice between 2000000 and 3000000  ';		
					else if($param['price'] == 5)
						$where .= ' and officeSellPrice between 3000000 and 5000000  ';	
					else if($param['price'] == 6)
						$where .= ' and officeSellPrice between 5000000 and 10000000  ';	
					else if($param['price'] == 7)
						$where .= ' and officeSellPrice > 10000000  ';
				}
				else{//出租
					if($param['price'] == 1)
						$where .= ' and officeRentPrice between 0 and 500 ';
					else if($param['price'] == 2)
						$where .= ' and officeRentPrice between 500 and 1000  ';
					else if($param['price'] == 3)
						$where .= ' and officeRentPrice between 1000 and 2000  ';
					else if($param['price'] == 4)
						$where .= ' and officeRentPrice between 2000 and 3000  ';		
					else if($param['price'] == 5)
						$where .= ' and officeRentPrice between 3000 and 5000  ';	
					else if($param['price'] == 6)
						$where .= ' and officeRentPrice between 5000 and 8000  ';	
					else if($param['price'] == 7)
						$where .= ' and officeRentPrice > 8000  ';
				}
			}
			if($param['area'] != 0){//面积
				if($param['area'] == 1)
					$where .= ' and officeBuildArea between 0 and 50 ';
				else if($param['area'] == 2)
					$where .= ' and officeBuildArea between 50 and 70  ';
				else if($param['area'] == 3)
					$where .= ' and officeBuildArea between 70 and 90  ';
				else if($param['area'] == 4)
					$where .= ' and officeBuildArea between 90 and 110  ';		
				else if($param['area'] == 5)
					$where .= ' and officeBuildArea between 110 and 130  ';	
				else if($param['area'] == 6)
					$where .= ' and officeBuildArea between 130 and 150  ';
				else if($param['area'] == 7)
					$where .= ' and officeBuildArea between 150 and 200  ';
				else if($param['area'] == 8)
					$where .= ' and officeBuildArea between 200 and 300  ';			
				else if($param['area'] == 9)
					$where .= ' and officeBuildArea > 300  ';
			}
			if($param['type'] == 'sell'){
				$where .= ' and officeSellRentType=1 ';
			}
			else 
			{
				$where .= ' and officeSellRentType=2 ';
			}
			$where .= ' and officeState=5 ';
			$subQuery .= $where;
		}
		else if($param['buildType'] == 4)//别墅
		{
			$subQuery ="select count(*) from ecms_villa  where villaCommunityId=c.communityId ";
			
			$where = '';
			
			if($param['price'] != 0)
			{
				if($param['type'] == 'sell'){//出售
					if($param['price'] == 1)
						$where .= ' and villaSellPrice between 0 and 1000000 ';
					else if($param['price'] == 2)
						$where .= ' and villaSellPrice between 1000000 and 1500000  ';
					else if($param['price'] == 3)
						$where .= ' and villaSellPrice between 1500000 and 2000000  ';
					else if($param['price'] == 4)
						$where .= ' and villaSellPrice between 2000000 and 3000000  ';		
					else if($param['price'] == 5)
						$where .= ' and villaSellPrice between 3000000 and 5000000  ';	
					else if($param['price'] == 6)
						$where .= ' and villaSellPrice between 5000000 and 10000000  ';	
					else if($param['price'] == 7)
						$where .= ' and villaSellPrice > 10000000  ';
				}
				else{//出租
					if($param['price'] == 1)
						$where .= ' and villaRentPrice between 0 and 500 ';
					else if($param['price'] == 2)
						$where .= ' and villaRentPrice between 500 and 1000  ';
					else if($param['price'] == 3)
						$where .= ' and villaRentPrice between 1000 and 2000  ';
					else if($param['price'] == 4)
						$where .= ' and villaRentPrice between 2000 and 3000  ';		
					else if($param['price'] == 5)
						$where .= ' and villaRentPrice between 3000 and 5000  ';	
					else if($param['price'] == 6)
						$where .= ' and villaRentPrice between 5000 and 8000  ';	
					else if($param['price'] == 7)
						$where .= ' and villaRentPrice > 8000  ';
				}
			}
			if($param['houseType'] != 0){//房型
				if($param['houseType'] == 1)
					$where .= ' and villaRoom = 1 ';
				else if($param['houseType'] == 2)
					$where .= ' and villaRoom = 2 ';
				else if($param['houseType'] == 3)
					$where .= ' and villaRoom = 3 ';
				else if($param['houseType'] == 4)
					$where .= ' and villaRoom = 4 ';
				else if($param['houseType'] == 5)
					$where .= ' and villaRoom = 5 ';
				else if($param['houseType'] == 6)
					$where .= ' and villaRoom > 5 ';					
			}
			if($param['area'] != 0){//面积
				if($param['area'] == 1)
					$where .= ' and villaBuildArea between 0 and 50 ';
				else if($param['area'] == 2)
					$where .= ' and villaBuildArea between 50 and 70  ';
				else if($param['area'] == 3)
					$where .= ' and villaBuildArea between 70 and 90  ';
				else if($param['area'] == 4)
					$where .= ' and villaBuildArea between 90 and 110  ';		
				else if($param['area'] == 5)
					$where .= ' and villaBuildArea between 110 and 130  ';	
				else if($param['area'] == 6)
					$where .= ' and villaBuildArea between 130 and 150  ';
				else if($param['area'] == 7)
					$where .= ' and villaBuildArea between 150 and 200  ';
				else if($param['area'] == 8)
					$where .= ' and villaBuildArea between 200 and 300  ';			
				else if($param['area'] == 9)
					$where .= ' and villaBuildArea > 300  ';
			}
			if($param['type'] == 'sell'){
				$where .= ' and villaSellRentType=1 ';
			}
			else 
			{
				$where .= ' and villaSellRentType=2 ';
			}	
			$where .= ' and villaState=5 ';
			$subQuery .= $where;
		}	
		
		$min_lng = $param['min_lng'];
		$min_lat = $param['min_lat'];
		$max_lng = $param['max_lng'];
		$max_lat = $param['max_lat'];
		
		$condition = "communityMapX>=$min_lng and communityMapY>=$min_lat and  communityMapX<=$max_lng and communityMapY<=$max_lat  and communityState=1";
		
		$sql = "select concat(($subQuery),'套') as value , '".$param['type']."' as type,communityId id ,communityName  name,'sell' as type ,communityAddress address ,communityRefPrice price,communityIsHouseType isHouseType,communityIsBusinessType isBusinessType,communityIsOfficeType isOfficeType,communityIsVillaType isVillaType, 
					case when communityRefPrice=0 then   '暂无均价'  else concat('均价',communityRefPrice,'/㎡') end as value1,communityMapX lng,communityMapY lat  ,t_pic.* FROM ecms_community c 
				left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where pic.picBuildFatherType=1 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				
				on c.communityId=t_pic.picBuildId where $condition";
		return  $this->db->getQueryArray($sql);
	}
	//根据经纬度，等条件获取新盘
	public function getPropertyJson($param){
		$where = '';
		if($param['buildType'] != 0)
		{
			if($param['buildType'] == 1)
				$where = ' and propertyIsHouseType=1 ';
			else if($param['buildType'] == 2)
				$where = ' and propertyIsBusinessType=1 ';
			else if($param['buildType'] == 3)
				$where = ' and propertyIsOfficeType=1 ';
			else if($param['buildType'] == 4)
				$where = ' and propertyIsVillaType=1 ';		
		}
		if($param['price'] != 0)
		{
			if($param['price'] == 1)
				$where .= ' and propertyOpenPrice between 0 and 7000 ';
			else if($param['price'] == 2)
				$where .= ' and propertyOpenPrice between 7000 and 10000  ';
			else if($param['price'] == 3)
				$where .= ' and propertyOpenPrice between 10000 and 15000  ';
			else if($param['price'] == 4)
				$where .= ' and propertyOpenPrice between 15000 and 20000  ';		
			else if($param['price'] == 5)
				$where .= ' and propertyOpenPrice between 20000 and 25000  ';	
			else if($param['price'] == 6)
				$where .= ' and propertyOpenPrice between 25000 and 30000  ';	
			else if($param['price'] == 7)
				$where .= ' and propertyOpenPrice > 30000  ';				
		}
		$propertyStateArr =  explode('|', $param['propertyState']);
		
		$min_lng = $param['min_lng'];
		$min_lat = $param['min_lat'];
		$max_lng = $param['max_lng'];
		$max_lat = $param['max_lat'];
		$condition = "propertyMapX>=$min_lng and propertyMapY>=$min_lat and  propertyMapX<=$max_lng and propertyMapY<=$max_lat $where and propertyState=1";
		
		$sql = "SELECT propertyId id ,propertyName  name,'sellingProperty' as type ,propertyCompanyAddress address,
				propertyOpenPrice price,propertyIsHouseType isHouseType,propertyIsBusinessType isBusinessType,propertyIsOfficeType isOfficeType,propertyIsVillaType isVillaType, 
				case when propertyOpenPrice=0 then case  when propertyOpenPriceRemark='' then '暂无均价' else propertyOpenPriceRemark end else concat('均价',propertyOpenPrice,'/㎡') end as value,propertyMapX lng,propertyMapY lat  ,t_pic.* FROM ecms_property property 
				left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where pic.picBuildFatherType=2 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				
				on property.propertyId=t_pic.picBuildId where $condition ";
		return  $this->db->getQueryArray($sql);
	}
	//根据id获取新盘
	public function getPropertyJsonById($id){
		$sql = "SELECT propertyId id ,propertyName  name,propertyDevCompany,propertyHotline,propertyOpenTime,propertyIsHouseType,propertyIsBusinessType,propertyIsOfficeType,propertyIsVillaType,case when propertyOpenPrice=0 then case  when propertyOpenPriceRemark='' then '暂无均价' else propertyOpenPriceRemark end else concat('均价',propertyOpenPrice,'/㎡') end as price,t_pic.* FROM ecms_property property 
				left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where pic.picBuildFatherType=2 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				
				on property.propertyId=t_pic.picBuildId where propertyId=$id";
		return  $this->db->getQueryValue($sql);
	}
	//根据id获取二手房或租房的小区
	public function getSecondHandJsonById($id){
		$sql = "select communityId,communityName  ,communityAddress ,communityIsHouseType,communityIsBusinessType,communityIsOfficeType,communityIsVillaType, 
					case when communityRefPrice=0 then   '暂无均价'  else concat('均价',communityRefPrice,'/㎡') end as communityRefPrice  ,t_pic.* FROM ecms_community community 
				left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where pic.picBuildFatherType=1 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				on community.communityId=t_pic.picBuildId where  community.communityId=$id";
		return  $this->db->getQueryValue($sql);
	}
	//根据小区id获取出售住宅房源
	public function getSellHouseListByCommunityId($id){
		$sql = "select houseId id,houseTitle name,houseFitment fitment,houseRoom room,houseHall hall,houseToilet toilet,houseSellPrice price,houseBuildArea area,houseUseArea,houseType type,houseFloor floor,houseAllFloor allFloor  ,t_pic.* from ecms_house left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where picSellRent=1 and picBuildType=1 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				on houseId=t_pic.picBuildId where houseCommunityId=$id and houseSellRentType=1 and houseState=5 order by houseUpdateTime desc";
		return  $this->db->getQueryArray($sql);
	}
	//根据小区id获取出租住宅房源
	public function getRentHouseListByCommunityId($id){
		$sql = "select houseId id,houseTitle name,houseFitment fitment,houseRoom room,houseHall hall,houseToilet toilet,houseSellPrice price,houseBuildArea area,houseRentArea,houseRentType rentType,houseType type,houseFloor floor,houseAllFloor allFloor  ,t_pic.* from ecms_house left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where picSellRent=1 and picBuildType=1 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				on houseId=t_pic.picBuildId where houseCommunityId=$id and houseSellRentType=2 and houseState=5 order by houseUpdateTime desc";
		return  $this->db->getQueryArray($sql);
	}
	//根据小区id获取出售商铺房源
	public function getSellShopsListByCommunityId($id){
		$sql = "select shopsId id,shopsName name,shopsFitment fitment,shopsType type,shopsSellPrice price,shopsBuildArea area,shopsFloor floor,shopsAllFloor allFloor  ,t_pic.* from ecms_shops left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where picSellRent=1 and picBuildType=2 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				on shopsId=t_pic.picBuildId where shopsCommunityId=$id and shopsSellRentType=1 and shopsState=5 order by shopsUpdateTime desc";
		return  $this->db->getQueryArray($sql);
	}
	//根据小区id获取出租商铺房源
	public function getRentShopsListByCommunityId($id){
		$sql = "select shopsId id,shopsName name,shopsFitment fitment,shopsType type,shopsRentPrice price,shopsRentPriceUnit unit,shopsRentState,shopsBuildArea area,shopsFloor floor,shopsAllFloor allFloor  ,t_pic.* from ecms_shops left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where picSellRent=2 and picBuildType=2 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				on shopsId=t_pic.picBuildId where shopsCommunityId=$id and shopsSellRentType=2 and shopsState=5 order by shopsUpdateTime desc";
		return  $this->db->getQueryArray($sql);
	}
	//根据小区id获取出售写字楼房源
	public function getSellOfficeListByCommunityId($id){
		$sql = "select officeId id,officeTitle name ,officeLevel,officeNumber,officeFitment fitment,officeType type,officeSellPrice price,officeBuildArea area,officeFloor floor,officeAllFloor allFloor  ,t_pic.* from ecms_office left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where picSellRent=1 and picBuildType=3 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				on officeId=t_pic.picBuildId where officeCommunityId=$id and officeSellRentType=1 and officeState=5 order by officeUpdateTime desc";
		return  $this->db->getQueryArray($sql);
	}
	//根据小区id获取出租写字楼房源
	public function getRentOfficeListByCommunityId($id){
		$sql = "select officeId id,officeTitle name,officeLevel,officeNumber,officeFitment fitment,officeType type,officeRentPrice price,officeRentPriceUnit unit,officeBuildArea area,officeFloor floor,officeAllFloor allFloor  ,t_pic.* from ecms_office left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where picSellRent=2 and picBuildType=3 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				on officeId=t_pic.picBuildId where officeCommunityId=$id and officeSellRentType=2 and officeState=5 order by officeUpdateTime desc";
		return  $this->db->getQueryArray($sql);
	}
	//根据小区id获取出售别墅房源
	public function getSellVillaListByCommunityId($id){
		$sql = "select villaId id,villaTitle name,villaFitment fitment,villaSellPrice price,villaBuildArea area,villaUseArea,villaAllFloor allFloor,villaRoom room,villaHall hall,villaToilet toilet  ,t_pic.* from ecms_villa left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where picSellRent=1 and picBuildType=4 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				on villaId=t_pic.picBuildId where villaCommunityId=$id and villaSellRentType=1 and villaState=5 order by villaUpdateTime desc";
		return  $this->db->getQueryArray($sql);
	}
	//根据小区id获取出租别墅房源
	public function getRentVillaListByCommunityId($id){
		$sql = "select villaId id,villaTitle name,villaFitment fitment,villaRentPrice price,villaBuildArea area,villaUseArea,villaAllFloor allFloor,villaRoom room,villaHall hall,villaToilet toilet  ,t_pic.* from ecms_villa left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where picSellRent=2 and picBuildType=4 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				on villaId=t_pic.picBuildId where villaCommunityId=$id and villaSellRentType=2 and villaState=5 order by villaUpdateTime desc";
		return  $this->db->getQueryArray($sql);
	}
}

?>