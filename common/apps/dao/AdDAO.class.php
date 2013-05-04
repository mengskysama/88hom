<?php
/**
 * 
 * 图片
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-11
 */
class AdDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布图片
	public function release($ad){
		$sql="insert into ecms_ad(adtypeId,adTitle,adUrl,adPic,adFiles,adLayer,adSite,adSiteDesc,adEId,adEClass,width,height,adState,adCreateTime,adUpdateTime) values("
										.(empty($ad['adtypeId'])?'':$ad['adtypeId'])
										.",'".(empty($ad['adTitle'])?'':$ad['adTitle'])
										."','".((empty($ad['adUrl'])||$ad['adUrl']=='')?'#':$ad['adUrl'])
										."','".(empty($ad['adPic'])?'':$ad['adPic'])
										."','".(empty($ad['adFiles'])?'':$ad['adFiles'])
										."',".(empty($ad['adLayer'])?1:$ad['adLayer'])
										.",".(empty($ad['adSite'])?0:$ad['adSite'])
										.",'".(empty($ad['adSiteDesc'])?'':$ad['adSiteDesc'])
										."','".(empty($ad['adEId'])?'':$ad['adEId'])
										."','".(empty($ad['adEClass'])?'':$ad['adEClass'])
										."',".(empty($ad['width'])?'':$ad['width'])
										.",".(empty($ad['height'])?'':$ad['height'])
										.",".(empty($ad['adState'])?1:$ad['adState'])
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改图片
	public function modify($ad){
		$sql="update ecms_ad set adtypeId="
			.(empty($ad['adtypeId'])?'':$ad['adtypeId'])
			.",adTitle='".(empty($ad['adTitle'])?'':$ad['adTitle'])
			."',adUrl='".((empty($ad['adUrl'])||$ad['adUrl']=='')?'#':$ad['adUrl'])
			."',adPic='".(empty($ad['adPic'])?'':$ad['adPic'])
			."',adFiles='".(empty($ad['adFiles'])?'':$ad['adFiles'])
			."',adLayer=".(empty($ad['adLayer'])?1:$ad['adLayer'])
			.",adSite=".(empty($ad['adSite'])?0:$ad['adSite'])
			.",adSiteDesc='".(empty($ad['adSiteDesc'])?'':$ad['adSiteDesc'])
			."',adEId='".(empty($ad['adEId'])?'':$ad['adEId'])
			."',adEClass='".(empty($ad['adEClass'])?'':$ad['adEClass'])
			."',width=".(empty($ad['width'])?'':$ad['width'])
			.",height=".(empty($ad['height'])?'':$ad['height'])
			.",adState=".(empty($ad['adState'])?1:$ad['adState'])
			.",adUpdateTime=".time()
			." where adId=".$ad['adId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除图片
	public function delAdById($id){
		$sql="delete from  ecms_ad where adId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取图片
	 * @param string $where 
	 * @return array
	 */
	public function getAdById($id) {
		$sql="select * from ecms_ad where adId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取图片列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getAdList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_ad $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改图片
	 * @param string $state 状态
	 * @param string $adId	主键
	 * @return boolean
	 */
	public function changeState($state,$adId){
		$sql="update ecms_ad set adState=$state,adUpdateTime=".time()." where adId=$adId";
		return $this->db->getQueryExecute($sql);
	}
	//计算图片条数
	public function countAd($where = ''){
		$sql="select count(*) as counts from ecms_ad $where";
		return $this->db->getQueryValue($sql);
	}

}


?>