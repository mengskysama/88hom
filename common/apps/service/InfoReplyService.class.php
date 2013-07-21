<?php 
/**
 * 
 * 资讯回复服务类
 * @author Sam(semovy@gmail.com)
 * @since 2013-07-18
 */
class InfoReplyService{
	private $db=null;

	public function __construct($db){
		$this->db=$db;
	}
	//通过某资讯id获取，已审或待审回复列表,用于后台
	public function getInfoReplyList($infoId,$state,$limit=''){
		$sql = "select inforeplyId,userUsername,userdetailName,userdetailPicThumb,inforeplyCreateTime,inforeplyContent 
				from ecms_info_reply r,ecms_user u,ecms_user_detail d where r.infoId=$infoId and r.userId=u.userId 
				and u.userId=d.userId and u.userType !=0 and inforeplyState=$state order by inforeplyCreateTime desc ".$limit;
		return $this->changeTime($this->db->getQueryArray($sql));
	}
	//通过某资讯id获取，已审或待审回复列表,用于后台
	public function countInfoReplyList($infoId,$state){
		$sql = "select count(inforeplyId) as counts
				from ecms_info_reply r,ecms_user u,ecms_user_detail d where r.infoId=$infoId and r.userId=u.userId 
				and u.userId=d.userId and u.userType !=0 and inforeplyState=$state ";
		return $this->db->getQueryValue($sql);
	}
	//某条资讯回复，通过审核或当前用户自己没审的回复列表,用于前台
	public function getInfoReplyListForPage($infoId,$userId,$limit=''){
		$sql = '';
		if($userId != '')
		{
			$sql = "select inforeplyId,userUsername,userdetailName,userdetailPicThumb,inforeplyCreateTime,inforeplyContent 
				from ecms_info_reply r,ecms_user u,ecms_user_detail d where r.infoId=$infoId and r.userId=u.userId and u.userId=d.userId 
				and u.userType !=0 and (inforeplyState=1 or (u.userId=$userId and inforeplyState=0)) order by inforeplyCreateTime desc ".$limit;
		}
		else{
			$sql = "select inforeplyId,userUsername,userdetailName,userdetailPicThumb,inforeplyCreateTime,inforeplyContent 
				from ecms_info_reply r,ecms_user u,ecms_user_detail d where r.infoId=$infoId and r.userId=u.userId and u.userId=d.userId 
				and u.userType !=0 and inforeplyState=1 order by inforeplyCreateTime desc ".$limit;
		}	
		return $this->changeTime($this->db->getQueryArray($sql));
	}
	//某条资讯回复，通过审核或当前用户自己没审的回复列表数目,用于前台
	public  function  countInfoReplyListForPage($infoId,$userId){
		$sql = '';
		if($userId != '')
		{
			$sql = "select count(inforeplyId) as counts 
				from ecms_info_reply r,ecms_user u,ecms_user_detail d where r.infoId=$infoId and r.userId=u.userId and u.userId=d.userId 
				and u.userType !=0 and (inforeplyState=1 or (u.userId=$userId and inforeplyState=0)) ";
		}
		else{
			$sql = "select count(inforeplyId) as counts 
				from ecms_info_reply r,ecms_user u,ecms_user_detail d where r.infoId=$infoId and r.userId=u.userId and u.userId=d.userId 
				and u.userType !=0 and inforeplyState=1  ";
		}	
		return $this->db->getQueryValue($sql);
	}
	//给出时间与当前时间差距的中文表达
	public function changeTime2Text($time){
		$subTime = time() - $time;
		if($subTime<60)
		return '刚刚';
		else if($subTime > 60 && $subTime<60*60)
		return (floor($subTime/60)).'分钟前';
		else if($subTime > 60*60 && $subTime<24*60*60)
		return (floor($subTime/(60*60))).'小时前';
		else if($subTime > 24*60*60 && $subTime<24*60*60*7)
		return (floor($subTime/(24*60*60))).'天前';
		else if($subTime > 24*60*60*7 && $subTime<24*60*60*30)
		return (floor($subTime/(24*60*60*7))).'周前';
		else if($subTime > 24*60*60*30 && $subTime<24*60*60*30*12)
		return (floor($subTime/(24*60*60*30))).'个月前';
		else 
		return (floor($subTime/(24*60*60*30*12))).'年前';
	}
	public function changeTime($list){
		for($i=0;$i<count($list);$i++)
		$list[$i]['inforeplyCreateTime']=$this->changeTime2Text($list[$i]['inforeplyCreateTime']);
		return $list;
	}
}

?>