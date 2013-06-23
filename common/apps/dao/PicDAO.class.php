<?php
/**
 * 
 * 图片
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-11
 */
class PicDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布图片
	public function release($pic){
		$sql="insert into ecms_pic(picBuildId,pictypeId,picBuildType,picSellRent,picUrl,picThumb,picState,picCreateTime,picUpdateTime) values("
										.(empty($pic['picBuildId'])?'':$pic['picBuildId'])
										.",".(empty($pic['pictypeId'])?0:$pic['pictypeId'])
										.",".(empty($pic['picBuildType'])?0:$pic['picBuildType'])
										.",".(empty($pic['picSellRent'])?0:$pic['picSellRent'])
										.",'".(empty($pic['picUrl'])?0:$pic['picUrl'])
										."','".(empty($pic['picThumb'])?0:$pic['picThumb'])
										."',".(empty($pic['picState'])?0:$pic['picState'])
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改图片
	public function modify($pic){
		$sql="update ecms_pic set picBuildId="
			.empty($pic['picBuildId'])?0:$pic['picBuildId']
			.",picId=".empty($pic['picId'])?0:$pic['picId']
			.",picBuildType=".empty($pic['picBuildType'])?0:$pic['picBuildType']
			.",picSellRent=".empty($pic['picSellRent'])?0:$pic['picSellRent']
			.",picUrl='".empty($pic['picUrl'])?'':$pic['picUrl']
			."',picThumb='".empty($pic['picThumb'])?'':$pic['picThumb']
			."',picIsdelete=".empty($pic['picIsdelete'])?0:$pic['picIsdelete']
			.",picState=".empty($pic['picState'])?0:$pic['picState']
			.",picUpdateTime=".time()
			." where picId=".$pic['picId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除图片
	public function delPicById($id){
		$sql="delete from  ecms_pic where picId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取图片
	 * @param string $where 
	 * @return array
	 */
	public function getPicById($id) {
		$sql="select * from ecms_pic where picId=$id";
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
	public function getPicList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_pic $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改图片
	 * @param string $state 状态
	 * @param string $picId	主键
	 * @return boolean
	 */
	public function changeState($state,$picId){
		$sql="update ecms_pic set picState=$state,picUpdateTime=".time()." where picId=$picId";
		return $this->db->getQueryExecute($sql);
	}
	//计算图片条数
	public function countPic($where = ''){
		$sql="select count(*) as counts from ecms_pic $where";
		return $this->db->getQueryValue($sql);
	}

}


?>