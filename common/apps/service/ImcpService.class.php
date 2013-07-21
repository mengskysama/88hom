<?php
/**
 * 
 * 中介公司业务类
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-07-02
 */
class ImcpService{
	private $db=null;
	private $imcpDAO = null;

	public function __construct($db){
		$this->db=$db;
		$this->imcpDAO = new ImcpDAO($db);
	}
	//发布中介公司信息
	public function release($info){
		$msg=true;
		$result=$this->imcpDAO->release($info);
		if($result<0) $msg='信息发布失败！';
		return $msg;
	}
	//修改中介公司信息
	public function modify($info){
		$msg=true;
		$result=$this->imcpDAO->modify($info);
		if($result<0) $msg='信息修改失败！';
		return $msg;
	}
	//获取中介公司信息列表
	public function getImcpList($info){
		$field='imcp.*,user.userId,user.userUsername';
		$where='where 1=1 ';
		$order='order by imcp.imcpUpdateTime desc';
		$limit='limit '.$info['begin'].','.$info['step'];
		if($info['search']!='') $where.='and imcp.imcpState=1 and (imcp.imcpShortName like "%'.$info['search'].'%" or imcp.imcpName like "%'.$info['search'].'%")';
		$result=null;
		$result=$this->imcpDAO->getImcpList($field,$where,$order,$limit);
		return $result;
	}
	//获取中介公司总数配合列表分页
	public function countImcp($info){
		$where='where 1=1 ';
		if($info['search']!='') $where.='and imcp.imcpState=1 and (imcp.imcpShortName like "%'.$info['search'].'%" or imcp.imcpName like "%'.$info['search'].'%")';
		$result=$this->imcpDAO->countImcp($where);
		return $result;
	}
	//改变中介公司信息状态
	public function changeState($state,$imcpId){
		$msg=true;
		$result=$this->imcpDAO->changeState($state,$imcpId);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	//根据ID获取中介公司信息
	public function getImcpById($info){
		$where='where 1=1 ';
		if($info['type']=='admin'){
			$where.='and imcp.imcpId='.$info['id'];
		}else{
			$where.='and imcp.imcpState=1 and imcp.imcpId='.$info['id'];
		}
		return $this->imcpDAO->getImcpById($where);
	}
	//删除中介公司信息
	public function delImcpById($id){
		$msg=true;
		$result=$this->imcpDAO->delImcpById($id);
		if($result<0) $msg='信息删除失败！'; 
		return $msg;
	}
	//added by Cheneil
	public function getAgentCompanyList(){
		return $this->imcpDAO->getAgentCompanyList();
	}
	//end to be added by Cheneil
}
?>