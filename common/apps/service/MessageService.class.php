<?php
/**
 * 信息管理业务操作类
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class MessageService{
	private $db=null;
	private $messageDAO=null;
	public function __construct($db){
		$this->db=$db;
		$this->messageDAO=new MessageDAO($db);
	}
//=================================信息操作=============================
	public function release($message){
		$msg=true;
		$result=$this->messageDAO->release($message);
		if($result<=0)$msg='申请试用失败！';
		return $msg;
	}
	public function getMessageList($field = '*',$where='',$order='',$limit=''){
		return $this->messageDAO->getMessageList($field,$where,$order,$limit);
	}
	public function countMessage($where){
		return $this->messageDAO->countMessage($where);
	}
	public function changeState($state,$id){
		$msg=true;
		$result=$this->messageDAO->changeState($state,$id);
		if($result<0)$msg='消息状态更改失败！';
		return $msg;
	}
	public function delMessageById($id){
		$msg=true;
		$result=$this->messageDAO->delMessageById($id);
		if($result<0)$msg='消息删除失败！';
		return $msg;
	}
}
?>