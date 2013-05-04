<?php
/**
 * 
 * 信息类别
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-10
 */
class MessageTypeDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布信息类别
	public function release($messageType){
		$sql="insert into ecms_message_type(messagetypeName,messagetypeState,messagetypeCreateTime,messagetypeUpdateTime) values('"
										.empty($messageType['messagetypeName'])?'':$messageType['messagetypeName']
										."',".empty($messageType['messagetypeState'])?0:$messageType['messagetypeState']
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改信息类别
	public function modify($messageType){
		$sql="update ecms_message_type set messagetypeName='"
			.empty($messageType['messagetypeName'])?'':$messageType['messagetypeName']
			."',messagetypeState=".empty($messageType['messagetypeState'])?0:$messageType['messagetypeState']
			.",messagetypeUpdateTime=".time()
			." where messagetypeId=".$messageType['messagetypeId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除信息类别
	public function delMessageTypeById($id){
		$sql="delete from  ecms_message_type where messagetypeId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取信息类别
	 * @param string $where 
	 * @return array
	 */
	public function getMessageTypeById($id) {
		$sql="select * from ecms_message_type where messagetypeId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取信息类别列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getMessageTypeList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_message_type $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改信息类别状态
	 * @param string $state 状态
	 * @param string $messageTypeId	主键
	 * @return boolean
	 */
	public function changeState($state,$messageTypeId){
		$sql="update ecms_message_type set messagetypeState=$state,propertyUpdateTime=".time()." where messagetypeId=$messageTypeId";
		return $this->db->getQueryExecute($sql);
	}

}


?>