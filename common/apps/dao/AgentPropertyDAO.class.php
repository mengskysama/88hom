<?php
class AgentPropertyDAO{

	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	
	public function save($prop){
		$sql = "insert into ecms_agent_property(propUserId,agentUserId,propName,txType,propPrice,remarks,contactName,contactGender,contactMobile,propState,createTime) ".
				"values(".$prop['propUserId'].",".$prop['agentUserId'].",'".$prop['propName']."',".$prop['txType'].",".$prop['propPrice'].",'"
						.$prop['remarks']."','".$prop['contactName']."',".$prop['contactGender'].",'".$prop['contactMobile']."',".$prop['propState'].",UNIX_TIMESTAMP())";
		$this->db->query($sql);
		$propId = $this->db->getInsertNum();
		return $propId;
	}
	
	public function agentProperty($prop){
		$sql = "update ecms_agent_property set agentUserId=".$prop['agentUserId']." where propId=".$prop['propId'];
		return $this->db->getQueryExecute($sql);
	}
}