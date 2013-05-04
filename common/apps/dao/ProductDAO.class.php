<?php
/**
 * ��Ʒ�������ݿ������
 * @author David chunliumang@gmail.com
 * @version 1.0
 */

class ProductDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
//========================��Ʒ����=================================
	/**
	 * ������Ʒ
	 * @param array $product ��Ʒ���� 
	 * @return boolean
	 */
	public function release($product){
		$sql="insert into ecms_product(p_name,first_en,m_price,price,discount,key_word,type_id,sub_type_id,path,path_thumb,text_content,logo,logo_thumb,floor,location,service_phone,website,open_time,type_str,type_str_name,join_type_str,type,create_time,update_time,lang) 
			  values('".$product['pName']."','".$product['firstEn']."',".(empty($product['mPrice'])?0:$product['mPrice']).",".(empty($product['price'])?0:$product['price']).",'".(empty($product['discount'])?'':$product['discount'])."'
			  ,'".(empty($product['keyword'])?'':$product['keyword'])."',".(empty($product['typeId'])?0:$product['typeId'])."
			  ,".(empty($product['subTypeId'])?0:$product['subTypeId']).",'".$product['path']."','".$product['pathThumb']."','".$product['content']."','".$product['logo']."','".$product['logoThumb']."'
			  ,'".(empty($product['floor'])?'':$product['floor'])."','".(empty($product['location'])?'':$product['location'])."','".(empty($product['servicePhone'])?'':$product['servicePhone'])."'
			  ,'".(empty($product['website'])?'':$product['website'])."','".(empty($product['openTime'])?'':$product['openTime'])."','".(empty($product['typeStr'])?'':$product['typeStr'])."','".(empty($product['typeStrName'])?'':$product['typeStrName'])."'
			  ,'".(empty($product['joinTypeStr'])?'':$product['joinTypeStr'])."',".(empty($product['type'])?1:$product['type']).",".time().",".time().",'".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �޸Ĳ�Ʒ
	 * @param array $product
	 * @return bool
	 **/
	public function saveProduct($product){
		$sql="update ecms_product set p_name='".$product['pName']."',first_en='".(empty($product['firstEn'])?'':$product['firstEn'])."',key_word='".(empty($product['keyword'])?'':$product['keyword'])."',
			  m_price=".(empty($product['mPrice'])?0:$product['mPrice']).",price=".(empty($product['price'])?0:$product['price']).",type_id=".(empty($product['typeId'])?0:$product['typeId']).",
			  discount='".(empty($product['discount'])?'':$product['discount'])."',type_str='".(empty($product['typeStr'])?'':$product['typeStr'])."',open_time='".(empty($product['openTime'])?'':$product['openTime'])."',
			  website='".(empty($product['website'])?'':$product['website'])."',service_phone='".(empty($product['servicePhone'])?'':$product['servicePhone'])."',
			  location='".(empty($product['location'])?'':$product['location'])."',floor='".(empty($product['floor'])?'':$product['floor'])."',type_str_name='".(empty($product['typeStrName'])?'':$product['typeStrName'])."',
			  logo='".$product['logo']."',logo_thumb='".$product['logoThumb']."',path='".$product['path']."',path_thumb='".$product['pathThumb']."',
			  join_type_str='".(empty($product['joinTypeStr'])?'':$product['joinTypeStr'])."',type=".(empty($product['type'])?1:$product['type']).",text_content='".$product['content']."',update_time=".time()." 
			  where id=".$product['id'];
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ��ȡ��Ʒ�б�
	 * @access public
	 * @param string $field ���ݿ��ֶ�
	 * @param string $where ��ѯ����
	 * @param string $order ����
	 * @param string $limit ��Ϣ����
	 * @return array
	 */
	public function getProductList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_product $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ���ݲ�ƷID��ȡ��Ʒ����
	 * @access public
	 * @param string $productId ��ƷID
	 * @param string $field �ֶ�
	 * @return Array
	 **/
	public function getProductDetailByProductId($productId,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_product where id=$productId and state=1";
		}else{
			$sql="select * from ecms_product where id=$productId";
		}
		return $this->db->getQueryValue($sql);
	}
	public function getProductDetail($where=''){
		$sql="select * from ecms_product $where";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ɾ����Ʒ
	 * @param string $productId
	 * @return bool
	 **/
	function delProduct($productId){
		$sql="delete from ecms_product where id=$productId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ȡ��һ����Ʒ
	 * @param string $productId ��ƷID
	 * @param string $field �ֶ�
	 * @param string $typeId ��Ʒ���
	 * @return array
	 */
	public function getNextInfo($productId, $typeId,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_product 
				  where id>$productId and type_id=$typeId and state=1 
				  order by id asc";
		}else{
			$sql="select * from ecms_product 
				  where id>$productId and type_id=$typeId 
				  order by id asc";
		}
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ȡ��һ����Ʒ
	 * @param string $productId ��ƷID
	 * @param string $field �ֶ�
	 * @param string $typeId ��Ʒ���
	 * @return array
	 */
	public function getPreInfo($productId, $typeId,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_product 
				  where id<$productId and type_id=$typeId and state=1 
				  order by id desc";
		}else{
			$sql="select * from ecms_product 
				  where id<$productId and type_id=$typeId 
				  order by id desc";
		}
		return $this->db->getQueryValue($sql);
	}
	/**
	 * �޸Ĳ�Ʒ״̬
	 * @param string $state ״̬
	 * @param string $id	����
	 * @return string
	 **/
	function changeState($state,$id){
		$sql="update ecms_product set state=$state,update_time=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ���ͳ��
	 * @access public
	 * @param string $productId ��ƷID
	 * @return Array
	 **/
	public function clickCount($productId){
		$sql="update ecms_product set click_count=click_count+1 where id=$productId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �����Ʒ����
	 * @access public
	 * @param string $where ��ѯ����
	 * @return int
	 */
	public function countProduct($where = ''){
		$sql="select count(*) as counts from ecms_product $where";
		return $this->db->getQueryValue($sql);
	}
//========================��Ʒ������=================================
	/**
	 * ������Ʒ���
	 * @param array $productType ��Ʒ������ 
	 * @return boolean
	 */
	public function releaseProductType($productType){
		$productType['typeLayer']=$this->getMaxProductTypeLayer($productType['fid']);
		$sql="insert into ecms_product_type(type_name,type_pic,type_pic_thumb,type_father_id,type_layer,lang) 
			  values('".$productType['typeName']."','".$productType['typePic']."','".$productType['typePicThumb']."',".$productType['fid'].",".$productType['typeLayer'].",'".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	
	/**
	 * ��ȡ��Ʒ�������layer����һ�����
	 * @param array $fid ��Ʒ�����id 
	 * @return boolean
	 */
	public function getMaxProductTypeLayer($fid){
		$sql="select max(type_layer) as layer from ecms_product_type where type_father_id=$fid and lang='".LANG."'";
		$result=$this->db->getQueryValue($sql);
		if(empty($result)){
			$result=1;
		}else{
			$result=$result['layer']+1;
		}
		return $result;
	}
	/**
	 * ȡ��Ʒ���
	 * @param int $typeFatherId �����ƷID
	 * @access public
	 * @return array
	 */
	public function getProductTypeList($typeFatherId=1) {
		$sql="select * from ecms_product_type 
			  where type_father_id=$typeFatherId 
			  and lang='".LANG."' 
			  order by type_layer";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ���ݲ�ƷID��ȡ��Ʒ�������
	 * @access public
	 * @param string $id
	 * @return array
	 **/
	public function getProductTypeInfo($id){
		$sql="select * from ecms_product_type where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * �޸Ĳ�Ʒ���
	 * @param array $product �ֵ����Ʒ
	 * @access public
	 * @return void
	 */
	public function saveProductType($productType) {
		$sql="update ecms_product_type set type_name='".$productType['typeName']."',type_pic='".$productType['typePic']."',type_pic_thumb='".$productType['typePicThumb']."' where id=".$productType['id'];
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ɾ����Ʒ���
	 * @param int $id ��Ʒ���ID
	 * @return bool
	 */
	public function delProductType($id) {
		$sql="delete from ecms_product_type where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �޸Ĳ�Ʒ�������
	 * @param int $typeLayer ��Ʒ���������
	 * @param int $id ��Ʒ���ID
	 * @return bool
	 */
	public function changeProductTypeLayer($typeLayer,$id){
		$sql="update ecms_product_type set type_layer=$typeLayer where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ����Ʒ���Ψһ��
	 * @param int $product �ֵ����Ʒ
	 * @return array
	 */
	public function checkProductTypeUnique($typeName) {
		$sql="select count(*) as counts from ecms_product_type where type_name='".$typeName."' and lang='".LANG."'";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * �����Ʒ���
	 * @param int $fid ��ID
	 * @return void
	 */
	public function cache($fid) {
		$sql="select id,type_name from ecms_product_type where type_father_id=$fid order by type_layer";
		$result=$this->db->getQueryHash($sql);
		$fp = fopen(ECMS_PATH_CONF . 'product/' .$fid.'_'.LANG.'.php', 'w');
		fputs($fp, '<?php return '.var_export($result, true) . '; ?>');
		fclose($fp);
	}
	/**
	 * ȡ���������(cache)
	 * @param string $name �ֵ���
	 * @return array
	 */
	public function getArray($name) {
		return require(ECMS_PATH_CONF . 'product/'.$name.'_'.LANG.'.php');
	}
//========================��ƷͼƬ����=================================
	/**
	 * �����ƷͼƬ
	 * @param unknown_type $postInfo
	 * @param string $productId ��Ʒ������ID
	 * @return void
	 */
	public function insertProductPic($picUrl,$picThumb,$picDesc,$productId){
		$sql="insert into ecms_product_pic(pic_url,pic_thumb,pic_desc,product_id,addtime,lang)
			  values('".$picUrl."','".$picThumb."','".$picDesc."',$productId,".time().",'".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ɾ����ƷͼƬ
	 * @param unknown_type $postInfo
	 * @param string $productId ��ƷID
	 * @return boolean
	 */
	public function delProductPic($productId){
		$sql="delete from ecms_product_pic where product_id=$productId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ȡ��ƷͼƬ
	 * @param string $prouctId ��ƷId
	 * @return array
	 */
	public function getProductPicListByProductId($productId){
		$sql="select * from ecms_product_pic where product_id=$productId";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ͳ�Ʋ�ƷͼƬ����
	 * @param string $prouctId ��ƷId
	 * @return array
	 */
	function countProductPicByProductId($productId){
		$sql="select count(*) as counts from ecms_product_pic where product_id=$productId";
		return $this->db->getQueryValue($sql);
	}
//========================��Ʒ��չ���Բ���=================================
	/**
	 * ������Ʒ����
	 * @param array $property ��Ʒ���Զ���
	 * @return boolean
	 */
	public function releaseProductProperty($property){
		$property['property_layer']=$this->getMaxProductPropertyLayer();
		$sql="insert into ecms_product_ex_property(property,en,property_layer,lang) 
		      values('".$property['property']."','".$property['en']."',".$property['property_layer'].",'".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ��ȡ��Ʒ��������layer����һ�����
	 * @param array $fid ��Ʒ�����id 
	 * @return boolean
	 */
	public function getMaxProductPropertyLayer(){
		$sql="select max(property_layer) as layer from ecms_product_ex_property where lang='".LANG."'";
		$result=$this->db->getQueryValue($sql);
		if(empty($result)){
			$result=1;
		}else{
			$result=$result['layer']+1;
		}
		return $result;
	}
	/**
	 * �޸Ĳ�Ʒ����
	 * @param array $productProperty ��Ʒ���Զ���
	 * @access public
	 * @return bloon
	 */
	public function saveProductProperty($productProperty) {
		$sql="update ecms_product_ex_property set property='".$productProperty['property']."' where id=".$productProperty['id'];
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ������չ��Ʒ����
	 * @param string $productId ��ƷId
	 * @param string $property_id ����ID
	 * @param string $property_value ����ֵ
	 * @return boolean
	 **/
	public function insertExinfo($productId,$property_id,$property_value){
		$sql="insert into ecms_product_ex_info(product_id,property_id,property_value,lang) 
			  values($productId,$property_id,'".$property_value."','".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ���ݲ�ƷId��ȡ��Ʒ��������
	 * @param string $productId
	 * @return array
	 **/
	function getProductExInfoList($productId){
		$sql="select property_id,property,property_value,en from ecms_product_ex_property as epep
			  left join ecms_product_ex_info as epei  
			  on epei.property_id=epep.id 
			  where epei.product_id=$productId and epep.lang='".LANG."' 
			  order by epep.property_layer";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ��ȡ��������
	 * @param string $productId
	 * @return array
	 **/
	public function getExList(){
		$sql="select * from ecms_product_ex_property where lang='".LANG."' order by property_layer";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ����ID��ȡ���������������
	 * @param string $productId
	 * @return array
	 **/
	public function getProductPropertyById($id){
		$sql="select * from ecms_product_ex_property where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ɾ����Ʒ��������
	 * @param string $productId
	 **/
	public function delProductExInfo($productId){
		$sql="delete from ecms_product_ex_info where product_id=$productId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ����Ʒ����Ψһ��
	 * @param string $property ����������
	 * @param string $en ����Ӣ����
	 * @return array
	 */
	public function checkProductExUnique($property) {
		$sql="select count(*) as counts from ecms_product_ex_property where property='".$property['property']."' or en='".$property['en']."' and lang='".LANG."'";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * �޸Ĳ�Ʒ��������
	 * @param int $typeLayer ��Ʒ���������
	 * @param int $id ��Ʒ���ID
	 * @return bool
	 */
	public function changeProductExLayer($propertyLayer,$id){
		$sql="update ecms_product_ex_property set property_layer=$propertyLayer where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ɾ����Ʒ�������
	 * @param int $id
	 * @return bool
	 */
	public function delProductExProperty($id) {
		$sql="delete from ecms_product_ex_property where id=$id";
		return $this->db->getQueryExecute($sql);
	}
}
?>