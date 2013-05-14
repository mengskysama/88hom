<?php
/**
 * ��Ϣ����ҵ�������
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
//=================================��Ϣ����=============================
	public function release($message){
		$msg=true;
		$result=$this->messageDAO->release($message);
		if($result<=0)$msg='��������ʧ�ܣ�';
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
		if($result<0)$msg='��Ϣ״̬���ʧ�ܣ�';
		return $msg;
	}
	public function delMessageById($id){
		$msg=true;
		$result=$this->messageDAO->delMessageById($id);
		if($result<0)$msg='��Ϣɾ��ʧ�ܣ�';
		return $msg;
	}
	//added by Cheneil
	public function updateBatchMessageState($state,$ids){
		return $this->messageDAO->updateBatchMessageState($state,$ids);
	}
	//end to be added by Cheneil
}
?>