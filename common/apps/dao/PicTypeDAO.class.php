<?php
/**
 * 
 * 图片类别
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-11
 */
class PicTypeDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布图片类别
	public function release($picType){
		$sql="insert into ecms_pic_type(pictypeName,pictypeLayer,pictypeState,pictypeCreateTime,pictypeUpdateTime) values('"
										.empty($picType['pictypeName'])?'':$picType['pictypeName']
										."',".empty($picType['pictypeLayer'])?0:$picType['pictypeLayer']
										.",".empty($picType['pictypeState'])?0:$picType['pictypeState']
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改图片类别
	public function modify($picType){
		$sql="update ecms_pic_type set pictypeName='"
			.empty($picType['pictypeName'])?'':$picType['pictypeName']
			."',pictypeLayer=".empty($picType['pictypeLayer'])?0:$picType['pictypeLayer']
			.",pictypeState=".empty($picType['pictypeState'])?0:$picType['pictypeState']
			.",pictypeUpdateTime=".time()
			." where pictypeId=".$picType['pictypeId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除图片类别
	public function delPicTypeById($id){
		$sql="delete from  ecms_pic_type where pictypeId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取图片类别
	 * @param string $where 
	 * @return array
	 */
	public function getPicTypeById($id) {
		$sql="select * from ecms_pic_type where pictypeId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取图片类别列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getPicTypeList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_pic_type $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改图片类别
	 * @param string $state 状态
	 * @param string $picTypeId	主键
	 * @return boolean
	 */
	public function changeState($state,$picTypeId){
		$sql="update ecms_pic_type set pictypeState=$state,pictypeUpdateTime=".time()." where pictypeId=$picTypeId";
		return $this->db->getQueryExecute($sql);
	}
	//计算图片类别条数
	public function countPicType($where = ''){
		$sql="select count(*) as counts from ecms_pic_type $where";
		return $this->db->getQueryValue($sql);
	}

}


?>