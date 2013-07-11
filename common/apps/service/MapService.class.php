<?php 
/**
 * 
 * 地图服务类
 * @author Sam(semovy@gmail.com)
 * @since 2013-07-8
 */
class MapService{
	private $db=null;
	private $picDAO = null;

	public function __construct($db){
		$this->db=$db;
		$this->picDAO = new PicDAO($db);
	}
	public function getFurnitureDesignPicById($id){
		
	}
	//返回家居装修设计图库某大类下某小类的json格式
	public function getSubPicTypeJsonByParentId($id){
		global $cfg;
		$arr = $cfg['arr_pic']['furnitureDesignPicSubType'][$id];
		$str = '[';
		
		$len = 0;
		foreach ($arr as $key=>$value)
		{
			if($len != count($arr)-1)
			$str .='{id:'.$key.',text:"'.$value.'"},';
			else 
			$str .='{id:'.$key.',text:"'.$value.'"}';
			$len++;
		}

		$str.=']';
		return $str;
	}
	//根据省下标，市下标，获取区域新盘数目json列表,以区域分组
	public function getPropertyCountJsonByPronvinceAndCityIndex($provinceIndex,$cityIndex){
		$sql = "select concat(count(*),'个') as value ,'sum' as type,propertyProvince provinceIndex,propertyCity cityIndex,propertyDistrict districtIndex
		  from ecms_property  where propertyProvince=$provinceIndex and  propertyCity=$cityIndex  and propertyState=1 group by propertyDistrict";
		return  $this->db->getQueryArray($sql);
	}
	//根据经纬度，等条件获取新盘
	public function getPropertyJson($where){
		$sql = "SELECT propertyId id ,propertyName  name,'sellingProperty' as type ,propertyCompanyAddress ,
				propertyOpenPrice price,propertyIsHouseType,propertyIsBusinessType,propertyIsOfficeType,propertyIsVillaType, 
				case when propertyOpenPrice=0 then '暂无均价' else concat('均价',propertyOpenPrice,'/㎡') end as value,propertyMapX lng,propertyMapY lat  ,t_pic.* FROM ecms_property property 
				left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where pic.picBuildFatherType=2 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				
				on property.propertyId=t_pic.picBuildId where $where ";
		return  $this->db->getQueryArray($sql);
	}
	//根据id获取新盘
	public function getPropertyJsonById($id){
		$sql = "SELECT propertyId id ,propertyName  name,propertyDevCompany,propertyHotline,propertyOpenTime,propertyIsHouseType,propertyIsBusinessType,propertyIsOfficeType,propertyIsVillaType,case when propertyOpenPrice=0 then '暂无均价' else concat('均价',propertyOpenPrice,'/㎡') end as price,t_pic.* FROM ecms_property property 
				left join 
				(
					select pic.picBuildId,pic.picThumb from ecms_pic as pic where pic.picBuildFatherType=2 and pictypeId=3 group by pic.picBuildId order by pic.picLayer desc
				) as t_pic 
				
				on property.propertyId=t_pic.picBuildId where propertyId=$id";
		return  $this->db->getQueryValue($sql);
	}
}

?>