<?php
/**
 * ��Ʒ����ҵ�������
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class ProductService{
	private $db=null;
	private $productDAO=null;
	private $linkService=null;
	public function __construct($db){
		$this->db=$db;
		$this->productDAO=new ProductDAO($db);
		$this->linkService=new LinkService($db);
	}
//=================================��Ʒ����=============================
	/**
	 * ������Ʒ
	 * @param array $product ��Ʒ���� 
	 * @return boolean
	 */
	public function release($product){
		$msg=true;
		$this->db->begin();//����ʼ
		try {
			if(empty($product['content'])){
				throw new Exception ( '������ϸ��Ϣ����Ϊ�գ�' );
			}
			//$product['content']=$this->linkService->addInnerLink($product['content']);//�������������
			$result = $this->productDAO->release ( $product );
			if ($result < 0)
				throw new Exception ( '������Ʒʧ�ܣ�' );
			$productId = $this->db->getInsertNum ();
			//�����ƷͼƬ
			if(!empty($product['picUrl'])){
				foreach($product['picUrl'] as $key=>$value){
					$result=$this->productDAO->insertProductPic($product['picUrl'][$key],$product['picThumb'][$key],$product['picDesc'][$key],$productId);
					if($result<0) throw new Exception('������ƷͼƬʧ�ܣ�');
				}
			}
			//��Ʒ��������
			$exList=$this->productDAO->getExList();
			foreach($exList as $key=>$item){
				if(!empty($product['property_'.$item['en']])){
					$result=$this->productDAO->insertExinfo($productId,$item['id'],$product['property_'.$item['en']]);
					if($result<0) throw new Exception('������Ʒ��������ʧ�ܣ�');
				}
			}
//			$keyword=$product['keyword'];//��������б�
//			if($keyword){
//				$result=$this->linkService->releaseUrlKeyWord($keyword,ECMS_WEB_URL.'product/d-'.$productId.'.htm',2);
//				if($result<0)throw new Exception('�����ؼ�������ʧ�ܣ�');
//			}
			$this->db->commit();//�����ύ
		}catch(Exception $e){
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();//�������
		return $msg;
	}
	/**
	 * �޸Ĳ�Ʒ
	 * @param array $product
	 * @return bool
	 **/
	public function saveProduct($product){
		$msg=true;
		$this->db->begin();//����ʼ
		try {
			if(empty($product['content'])){
				throw new Exception ( '������ϸ��Ϣ����Ϊ�գ�' );
			}
			//$product['content']=$this->linkService->addInnerLink($product['content']);
			$result=$this->productDAO->saveProduct($product);
			if($result<0) throw new Exception('�޸Ĳ�Ʒʧ�ܣ�');
			//ɾ����ƷͼƬ
			$result=$this->productDAO->delProductPic($product['id']);
			if($result<0) throw new Exception('ɾ����ƷͼƬʧ�ܣ�');
			//�����ƷͼƬ
			if(!empty($product['picUrl'])){
				foreach($product['picUrl'] as $key=>$value){
					$result=$this->productDAO->insertProductPic($product['picUrl'][$key],$product['picThumb'][$key],$product['picDesc'][$key],$product['id']);
					if($result<0) throw new Exception('�����ƷͼƬʧ�ܣ�');
				}
			}
			//��Ʒ����������ɾ��
			$result=$this->productDAO->delProductExInfo($product['id']);
			if($result<0) throw new Exception('ɾ����Ʒ����ʧ�ܣ�');
			//��Ʒ��������
			$exList=$this->productDAO->getExList();
			foreach($exList as $key=>$item){
				if(!empty($product['property_'.$item['en']])){
					$result=$this->productDAO->insertExinfo($product['id'],$item['id'],$product['property_'.$item['en']]);
					if($result<0) throw new Exception('�����Ʒ����ʧ�ܣ�');
				}
			}
			$this->db->commit();//�����ύ
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();//�������
		return $msg;
	}
	/**
	 * ���ݲ�ƷIDɾ����Ʒ��Ϣ
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delProductById($id){
		$msg=true;
		$this->db->begin();//����ʼ
		try {
			$result=$this->productDAO->delProduct($id);
			if($result<0) throw new Exception('��Ʒ��Ϣɾ��ʧ�ܣ�');
			$result=$this->productDAO->delProductPic($id);
			if($result<0) throw new Exception('��Ʒ��ϢͼƬɾ��ʧ�ܣ�');
			$result=$this->productDAO->delProductExInfo($id);
			if($result<0) throw new Exception('��Ʒ��Ϣ����ɾ��ʧ�ܣ�');
			$this->db->commit();//�����ύ
		}catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();//�������
		return $msg;
	}
	/**
	 * ���ݲ�ƷID���Ĳ�Ʒ״̬
	 * @access public
	 * @param string $state ״̬
	 * @param string $id
	 * @return bool
	 **/
	public function changeState($state,$id){
		$msg=true;
		$result=$this->productDAO->changeState($state,$id);
		if($result<0)$msg='��Ʒ״̬����ʧ�ܣ�';
		return $msg;
	}
	/**
	 * ���ݲ�ƷID��ȡ��Ʒ����
	 * @access public
	 * @param string $productId ��ƷID
	 * @param string $field �ֶ�
	 * @return Array
	 **/
	public function getProductDetailByProductId($productId,$type='web'){
		return $this->productDAO->getProductDetailByProductId($productId,$type);
	}
	public function getProductDetail($where=''){
		return $this->productDAO->getProductDetail($where);
	}
	/**
	 * ��ȡ��Ʒ�б�
	 * @param string $field
	 * @param string $where
	 * @param string $order
	 * @param string $limit
	 * @return array
	 **/
	public function getProductList($field = '*',$where='',$order='',$limit=''){
		return $this->productDAO->getProductList($field,$where,$order,$limit);
	}
//=================================��ƷͼƬ����=============================
	/**
	 * ���ݲ�ƷID��ȡ��ƷͼƬ�б�
	 * @param array $productId
	 * @return bool
	 **/
	public function getProductPicListByProductId($productId){
		return $this->productDAO->getProductPicListByProductId($productId);
	}
//=================================��Ʒ������=============================
	/**
	 * ������Ʒ���
	 * @param array $productType
	 * @return bool
	 **/
	public function releaseProductType($productType){
		$msg=true;
		$checkUnique=$this->productDAO->checkProductTypeUnique($productType['typeName']);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='��Ʒ������Ʋ����ظ���';
		}else{
			$result=$this->productDAO->releaseProductType($productType);
			if($result<0)$msg='��Ʒ��𷢲�ʧ�ܣ�';
			else $this->productDAO->cache($productType['fid']);
		}
		return $msg;
	}
	public function releaseProductTypeSearch($productTypeSearch){
		$msg=true;
		if(!empty($productTypeSearch['typeSearch'])){
			$typeSearchList=$this->getProductTypeSearch();
			$typeSearch=$productTypeSearch['typeSearch'];
			$typeSearchName=$productTypeSearch['typeSearchName'];
			$productTypeList=$this->getProductTypeListByCache(0);
			$typeStrId='';
			$typeStrName='';
			$typeSearchObj=array();
			for($i=0;$i<count($typeSearch);$i++){
				if(($i+1)==count($typeSearch)){
					$typeStrId.='l-'.$typeSearch[$i].'-l';
					$typeStrName.=$productTypeList[$typeSearch[$i]];
				}else{
					$typeStrId.='l-'.$typeSearch[$i].'-l'.',';
					$typeStrName.=$productTypeList[$typeSearch[$i]].'/';
				}
			}
			$typeSearchObj=array('id'=>$typeStrId,'name'=>$typeStrName);
			$typeSearchList[$typeStrId]=array('name'=>$typeSearchName,'typeSearch'=>$typeSearchObj);
			$this->cacheProductTypeSearch($typeSearchList);
		}else{
			$msg='��ѡ��Ҫ�������������';	
		}
		return $msg;
	}
	//�ݹ��ҳ���һ�����
	public function getProductFirstType($id){
		$typeInfo=$this->productDAO->getProductTypeInfo($id);
		if(!empty($typeInfo)){
			if($typeInfo['type_father_id']==0){
				return $typeInfo['id'];
			}else{
				return $this->getProductFirstType($typeInfo['type_father_id']);
			}
		}else{
			return $id;
		}
	}
	public function cacheProductTypeSearch($typeSearchList){
		$fp = fopen(ECMS_PATH_CONF . 'product/typeSearch.php', 'w');
		fputs($fp, '<?php return '.var_export($typeSearchList, true) . '; ?>');
		fclose($fp);
	}
	public function getProductTypeSearch(){
		if(file_exists(ECMS_PATH_CONF . 'product/typeSearch.php')){
			return require(ECMS_PATH_CONF . 'product/typeSearch.php');
		}else{
			return null;
		}
	}
	/**
	 * �޸Ĳ�Ʒ���
	 * @param array $productType
	 * @return bool
	 **/
	public function saveProductType($productType){
		$msg=true;
		$resultProductType=$this->productDAO->getProductTypeInfo($productType['id']);
		if($productType['typeName']==$resultProductType['type_name']){
			$result=$this->productDAO->saveProductType($productType);
			if($result<0)$msg='��Ʒ����޸�ʧ�ܣ�';
			else $this->productDAO->cache($productType['fid']);
		}else{
			$checkUnique=$this->productDAO->checkProductTypeUnique($productType['typeName']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				$msg='��Ʒ������Ʋ����ظ���';
			}else{
				$result=$this->productDAO->saveProductType($productType);
				if($result<0)$msg='��Ʒ����޸�ʧ�ܣ�';
				else $this->productDAO->cache($productType['fid']);
			}
		}
		return $msg;
	}
	public function saveProductTypeSearch($productTypeSearch,$typeSearchName,$id){
		$msg=true;
		$typeSearchList=$this->getProductTypeSearch();
		$productTypeList=$this->getProductTypeListByCache(0);
		$typeSearchListNew='';
		foreach ($typeSearchList as $key=>$value){
			if($key!=$id){
				$typeSearchListNew[$key]=$value;
			}
		}
		$typeStrId='';
		$typeStrName='';
		$typeSearchObj=array();
		for($i=0;$i<count($productTypeSearch);$i++){
			if(($i+1)==count($productTypeSearch)){
				$typeStrId.='l-'.$productTypeSearch[$i].'-l';
				$typeStrName.=$productTypeList[$productTypeSearch[$i]];
			}else{
				$typeStrId.='l-'.$productTypeSearch[$i].'-l'.',';
				$typeStrName.=$productTypeList[$productTypeSearch[$i]].'/';
			}
		}
		$typeSearchObj=array('id'=>$typeStrId,'name'=>$typeStrName);
		$typeSearchListNew[$typeStrId]=array('name'=>$typeSearchName,'typeSearch'=>$typeSearchObj);
		$this->cacheProductTypeSearch($typeSearchListNew);
		return $msg;
	}
	/**
	 * ɾ����Ʒ���
	 * @param int $id
	 * @return bool
	 **/
	public function delProductTypeById($id,$fid){
		$msg=true;
		$result=$this->productDAO->delProductType($id);
		if($result<0)$msg='��Ʒ���ɾ��ʧ�ܣ�';
		else $this->productDAO->cache($fid);
		return $msg;
	}
	public function delProductTypeSearchById($id){
		$msg=true;
		$typeSearchList=$this->getProductTypeSearch();
		$typeSearchListNew='';
		foreach ($typeSearchList as $key=>$value){
			if($key!=$id){
				$typeSearchListNew[$key]=$value;
			}
		}
		$this->cacheProductTypeSearch($typeSearchListNew);
		return $msg;
	}
	/**
	 * ����ɾ����Ʒ���
	 * @param array $arrId
	 * @return bool
	 **/
	public function delProductType($arrId,$fid){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->productDAO->delProductType($id);
				if($result<0)throw new Exception('���ɾ������');
			}
			$this->db->commit();//�����ύ
			$this->productDAO->cache($fid);
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * ��Ʒ�������
	 * @param array $typeLayer
	 * @return bool
	 **/
	public function orderProductType($typeLayer,$fid){
		$msg=true;
		$this->db->begin();
		try {
			foreach($typeLayer as $id=>$layer){
				$result=$this->productDAO->changeProductTypeLayer($layer,$id);
				if($result<0)throw new Exception('����������');
			}
			$this->db->commit();//�����ύ
			$this->productDAO->cache($fid);
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * ���ݲ�ƷID��ȡ��Ʒ�������
	 * @access public
	 * @param string $id
	 * @return array
	 **/
	public function getProductTypeDetailById($id){
		return $this->productDAO->getProductTypeInfo($id);
	}
	/**
	 * ��ȡ��Ʒ����б�
	 * @param int $typeFatherId �����ƷID
	 * @access public
	 * @return array
	 */
	public function getProductTypeList($typeFatherId=1) {
		return $this->productDAO->getProductTypeList($typeFatherId);
	}
	/**
	 * ��ȡ��Ʒ����б�(cache)
	 * @param int $typeFatherId �����ƷID
	 * @access public
	 * @return array
	 */
	public function getProductTypeListByCache($typeFatherId=1) {
		return $this->productDAO->getArray($typeFatherId);
	}
//=================================��Ʒ����������=============================
	/**
	 * ��ȡ��Ʒ��������б�
	 * @access public
	 * @return array
	 */
	public function getProductPropertyList(){
		return $this->productDAO->getExList();
	}
	/**
	 * ��ȡ��Ʒ��������б�
	 * @access public
	 * @return array
	 */
	public function getProductExInfoList($id){
		return $this->productDAO->getProductExInfoList($id);
	}
	/**
	 * ���ݲ�ƷID��ȡ��Ʒ��������
	 * @access public
	 * @param string $id
	 * @return array
	 **/
	public function getProductPropertyDetailById($id){
		return $this->productDAO->getProductPropertyById($id);
	}
	/**
	 * ������Ʒ����
	 * @param array $productProperty
	 * @return bool
	 **/
	public function releaseProductProperty($productProperty){
		$msg=true;
		$checkUnique=$this->productDAO->checkProductExUnique($productProperty);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='��Ʒ�������Ʋ����ظ���';
		}else{
			$result=$this->productDAO->releaseProductProperty($productProperty);
			if($result<0)$msg='��Ʒ���Է���ʧ�ܣ�';
		}
		return $msg;
	}
	/**
	 * �޸Ĳ�Ʒ����
	 * @param array $productProperty
	 * @return bool
	 **/
	public function saveProductProperty($productProperty){
		$msg=true;
		$productProperty['en']='';
		$checkUnique=$this->productDAO->checkProductExUnique($productProperty);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='��Ʒ�������Ʋ����ظ���';
		}else{
			$result=$this->productDAO->saveProductProperty($productProperty);
			if($result<0)$msg='��Ʒ�����޸�ʧ�ܣ�';
		}
		return $msg;
	}
	/**
	 * ɾ����Ʒ�������
	 * @param int $id
	 * @return bool
	 **/
	public function delProductPropertyById($id){
		$msg=true;
		$result=$this->productDAO->delProductExProperty($id);
		if($result<0)$msg='��Ʒ�������ɾ��ʧ�ܣ�';
		return $msg;
	}
	/**
	 * ����ɾ����Ʒ�������
	 * @param array $arrId
	 * @return bool
	 **/
	public function delProductProperty($arrId){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->productDAO->delProductExProperty($id);
				if($result<0)throw new Exception('����ɾ������');
			}
			$this->db->commit();//�����ύ
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * ��Ʒ�����������
	 * @param array $propertyLayer
	 * @return bool
	 **/
	public function orderProductProperty($propertyLayer){
		$msg=true;
		$this->db->begin();
		try {
			foreach($propertyLayer as $id=>$layer){
				$result=$this->productDAO->changeProductExLayer($layer,$id);
				if($result<0)throw new Exception('����������');
			}
			$this->db->commit();//�����ύ
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();
		return $msg;
	}
}
?>