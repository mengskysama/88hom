<?php
/**
 * 
 * 家居品牌馆
 * @author Sam(semovy@gmail.com)
 * @since 2013-06-20
 */
class FurnitureBrandDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布家居品牌馆
	public function release($furnitureBrand){
		$sql="insert into ecms_furniture_brand(typeId,name,url,pic,picThumb,orderNum,state,updateTime) values("
										.(empty($furnitureBrand['typeId'])?0:$furnitureBrand['typeId'])
										.",'".(empty($furnitureBrand['name'])?'':$furnitureBrand['name'])
										."','".(empty($furnitureBrand['url'])?'':$furnitureBrand['url'])
										."','".(empty($furnitureBrand['pic'])?'':$furnitureBrand['pic'])
										."','".(empty($furnitureBrand['picThumb'])?'':$furnitureBrand['picThumb'])
										."',".(empty($furnitureBrand['orderNum'])?0:$furnitureBrand['orderNum'])
										.",".(empty($furnitureBrand['state'])?0:$furnitureBrand['state'])
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改家居品牌馆
	public function modify($furnitureBrand){
		$sql="update ecms_furniture_brand set typeId="
			.(empty($furnitureBrand['typeId'])?0:$furnitureBrand['typeId'])
			.",name='".(empty($furnitureBrand['name'])?'':$furnitureBrand['name'])
			."',url='".(empty($furnitureBrand['url'])?'':$furnitureBrand['url'])
			."',pic='".(empty($furnitureBrand['pic'])?'':$furnitureBrand['pic'])
			."',picThumb='".(empty($furnitureBrand['picThumb'])?'':$furnitureBrand['picThumb'])
			."',orderNum=".(empty($furnitureBrand['orderNum'])?0:$furnitureBrand['orderNum'])
			.",state=".(empty($furnitureBrand['state'])?0:$furnitureBrand['state'])
			.",updateTime=".time()
			." where id=".$furnitureBrand['id'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除家居品牌馆
	public function delFurnitureBrandById($id){
		$sql="delete from  ecms_furniture_brand where id=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取家居品牌馆
	 * @param string $where 
	 * @return array
	 */
	public function getFurnitureBrandById($id) {
		$sql="select * from ecms_furniture_brand where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取家居品牌馆列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getFurnitureBrandList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_furniture_brand $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改家居品牌馆
	 * @param string $state 状态
	 * @param string $id	主键
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_furniture_brand set state=$state,updateTime=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	//计算家居品牌馆条数
	public function countFurnitureBrand($where = ''){
		$sql="select count(*) as counts from ecms_furniture_brand $where";
		return $this->db->getQueryValue($sql);
	}

}


?>