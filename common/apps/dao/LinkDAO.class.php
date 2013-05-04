<?php
class LinkDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * 发布友情链接
	 * @param array $link 链接对象
	 * @access public
	 * @return void
	 */
	public function release($link) {
		$link['layer']=$this->getMaxLinkLayer();
		$sql="insert into ecms_link(name,url,path,path_thumb,create_time,update_time,layer,lang)
			  values('".$link['name']."','".$link['url']."','".$link['path']."','".$link['pathThumb']."',".time().",".time().",".$link['layer'].",'".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取友情链接排序layer的下一个序号
	 * @return int
	 */
	public function getMaxLinkLayer(){
		$sql="select max(layer) as layer from ecms_link where lang='".LANG."'";
		$result=$this->db->getQueryValue($sql);
		if(empty($result)){
			$result=1;
		}else{
			$result=$result['layer']+1;
		}
		return $result;
	}
	/**
	 * 修改友情链接
	 * @param array $link 链接对象
	 * @access public
	 * @return void
	 */
	public function saveLink($link) {
		$sql="update ecms_link set url='".$link['url']."',name='".$link['name']."',path='".$link['path']."',path_thumb='".$link['pathThumb']."',update_time=".time()." 
			  where id=".$link['id'];
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 修改友情链接
	 * @param int $id
	 * @access public
	 * @return void
	 */
	public function delLink($id){
		$sql="delete from ecms_link where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 根据ID获取友情链接详情
	 * @access public
	 * @return array
	 */
	public function getLinkInfo($id){
		$sql="select * from ecms_link where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取友情链接列表
	 * @access public
	 * @return array
	 */
	public function getLinkList($type){
		if($type=='web'){
			$sql="select * from ecms_link where lang='".LANG."' and state=1 order by layer";
		}else{
			$sql="select * from ecms_link where lang='".LANG."' order by layer";
		}
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改友情链接排序
	 * @param int $layer 排序编号
	 * @param int $id ID
	 * @return bool
	 */
	public function changeLinkLayer($layer,$id){
		$sql="update ecms_link set layer=$layer where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 修改友情链接状态
	 * @param string $state 状态
	 * @param string $id	主键
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_link set state=$state,update_time=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 缓存友情链接信息
	 * @return void
	 */
	public function cache() {
		$sql="select id,name,url,path,path_thumb from ecms_link where state=1 order by layer";
		$result=$this->db->getQueryArray($sql);
		$fp = fopen(ECMS_PATH_CONF . 'link/link_'.LANG.'.php', 'w');
		fputs($fp, '<?php return '.var_export($result, true) . '; ?>');
		fclose($fp);
	}
	/**
	 * 取类别项数组
	 * @param string $name 字典名
	 * @return array
	 */
	public function getArray() {
		return require(ECMS_PATH_CONF.'link/link_'.LANG.'.php');
	}
	/**
	 * 生成一条URL-关键字对照记录
	 * @param unknown_type $postInfo
	 * @param string $id 主键
	 * @param string $prefixURL URL前缀
	 * @param string $suffixUrl URL后缀
	 * @param string $type 类型 1是新闻,2是产品
	 * @return boolean
	 */
	public function releaseUrlKeyWord($keyword,$url,$type){
		$sql="insert into ecms_link_keyword(key_word,url,type,lang) 
			  values('".$keyword."','".$url."',$type,'".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	public function getKeywordLinkList(){
		$sql="select distinct key_word from ecms_link_keyword where lang='".LANG."'";
		return $this->db->getQueryArray($sql);
	}
	/**
	 *	通过关键字获取URL
	 * @param string $keyWord 关键字
	 * @param string $prefixURL URL前缀
	 * @param string $suffixUrl URL后缀
	 * @return string
	 */
	public function getURLByKeyWord($keyWord){
		$sql="select url from ecms_link_keyword where key_word='".$keyWord."' and lang='".LANG."'";
		return $this->db->getQueryValue($sql);
	}
}
?>