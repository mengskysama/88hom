<?php
/**
 * 
 * 信息
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-10
 */
class MessageDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布信息
	public function release($message){
		$sql="insert into ecms_message(messageTitle,messageContent,messageToUserId,messageFromUserId,messagetypeId,messageState,messageCreateTime,messageUpdateTime) values('"
										.(isset($message['messageTitle'])?$message['messageTitle']:"")
										."','".(isset($message['messageContent'])?$message['messageContent']:"")
										."',".(isset($message['messageToUserId'])?$message['messageToUserId']:0)
										.",".(isset($message['messageFromUserId'])?$message['messageFromUserId']:0)
										.",".(isset($message['messagetypeId'])?$message['messagetypeId']:3)
										.",".(isset($message['messageState'])?$message['messageState']:0)
										.",".time()
										.",".time()
										.")";
		
			return $this->db->getQueryExecute($sql);						
	}
	//修改信息
	public function modify($messageType){
		$sql="update ecms_message set messageTitle='"
			.empty($messageType['messageTitle'])?'':$messageType['messageTitle']
			."',messageContent='".empty($messageType['messageContent'])?'':$messageType['messageContent']
			."',messageToUserId=".empty($messageType['messageToUserId'])?0:$messageType['messageToUserId']
			.",messageFromUserId=".empty($messageType['messageFromUserId'])?0:$messageType['messageFromUserId']
			.",messagetypeId=".empty($messageType['messagetypeId'])?0:$messageType['messagetypeId']
			.",messageState=".empty($messageType['messageState'])?0:$messageType['messageState']
			.",messageUpdateTime=".time()
			." where messageId=".$messageType['messageId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除信息
	public function delMessageById($id){
		$sql="delete from ecms_message where messageId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	//added by Cheneil
	public function updateBatchMessageState($state,$ids){
		$sql="update ecms_message set messageState=$state,messageUpdateTime=UNIX_TIMESTAMP() where messageId in(".$ids.")";
		return $this->db->getQueryExecute($sql);
	}
	//end to be added by Cheneil
	
	/**
	 * 获取信息
	 * @param string $where 
	 * @return array
	 */
	public function getMessageById($id) {
		$sql="select * from ecms_message where messageId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取信息列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getMessageList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_message $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改信息状态
	 * @param string $state 状态
	 * @param string $messageId	主键
	 * @return boolean
	 */
	public function changeState($state,$messageId){
		$sql="update ecms_message set messageState=$state,propertyUpdateTime=".time()." where messageId=$messageId";
		return $this->db->getQueryExecute($sql);
	}
	public function countMessage($where = ''){
		$sql="select count(*) as counts from ecms_message $where";
		$result = $this->db->getQueryValue($sql);
		return $result['counts'];
	}

}


?>