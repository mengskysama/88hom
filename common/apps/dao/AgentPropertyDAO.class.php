<?php
class AgentPropertyDAO{

	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	
	public function save($prop){
		$sql = "insert into ecms_agent_property(propUserId,propName,txType,propPrice,remarks,contactName,contactGender,contactMobile,propState,createTime) ".
				"values(".$prop['propUserId'].",'".$prop['propName']."',".$prop['txType'].",".$prop['propPrice'].",'"
						.$prop['remarks']."','".$prop['contactName']."',".$prop['contactGender'].",'".$prop['contactMobile']."',".$prop['propState'].",UNIX_TIMESTAMP())";
		$this->db->query($sql);
		$propId = $this->db->getInsertNum();
		return $propId;
	}
	
	public function agentProperty($prop){
		$sql = "insert into ems_agent_property_user(agent_property_id,userId) value(".$prop['propId'].",".$prop['agentUserId'].")";
		return $this->db->getQueryExecute($sql);
	}
		
	public function chkAgentProp($propId,$userId){
		$sql = "select count(*) as total from ems_agent_property_user where agent_property_id=".$propId." and userId=".$userId;
		return $this->db->getQueryValue($sql);		
	}
}