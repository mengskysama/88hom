<?php
/**
 * �ִ�ϵͳ����
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class LogisticsDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//=================================�ŵ���Ϣ����======================================
	//¼���ŵ���Ϣ
	public function releaseStores($stores){
		$sql="insert into ecms_logistics_stores(stores_no,stores_name,city_name,address,tel_one,tel_two,tel_three,create_time,update_time) 
			  values('".$stores['storesNo']."','".$stores['storesName']."','".$stores['cityName']."','".$stores['address']."','".$stores['telOne']."','".$stores['telTwo']."','".$stores['telThree']."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	//�ŵ���Ϣ�޸� 
	public function saveStores($stores){
		$sql="update ecms_logistics_stores set stores_name='".$stores['storesName']."',city_name='".$stores['cityName']."',address='".$stores['address']."',tel_one='".$stores['telOne']."',tel_two='".$stores['telTwo']."',tel_three='".$stores['telThree']."',update_time=".time()." 
			  where stores_no='".$stores['storesNo']."'";
		return $this->db->getQueryExecute($sql);
	}
	//ɾ���ŵ�
	public function delStoresByNo($storesNo){
		$sql="delete from ecms_logistics_stores where stores_no='".$storesNo."'";
		return $this->db->getQueryExecute($sql);
	}
	//��ȡ�ŵ��б�
	public function getStoresList($field='*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_logistics_stores $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//����ID��ȡ�ŵ���Ϣ
	public function getStoresDetailById($id){
		$sql="select * from ecms_logistics_stores where id=$id";
		return $this->db->getQueryValue($sql);
	}
	//����StoresNo��ȡ�ŵ���Ϣ
	public function getStoresDetailByStoresNo($storesNo){
		$sql="select * from ecms_logistics_stores where stores_no='".$storesNo."'";
		return $this->db->getQueryValue($sql);
	}
	//================================��Ӧ����Ϣ����=====================================
	//¼�빩Ӧ����Ϣ
	public function releaseSuppliers($suppliers){
		$sql="insert into ecms_logistics_suppliers(suppliers_no,suppliers_name,create_time,update_time) 
			  values('".$suppliers['suppliersNo']."','".$suppliers['suppliersName']."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	//�޸Ĺ�Ӧ����Ϣ
	public function saveSuppliers($suppliers){
		$sql="update ecms_logistics_suppliers set suppliers_name='".$suppliers['suppliersName']."',update_time=".time()." where suppliers_no='".$suppliers['suppliersNo']."'";
		return $this->db->getQueryExecute($sql);
	}
	//ɾ����Ӧ����Ϣ
	public function delSuppliersByNo($suppliersNo){
		$sql="delete from ecms_logistics_suppliers where suppliers_no='".$suppliersNo."'";
		return $this->db->getQueryExecute($sql);
	}
	//��ȡ��Ӧ���б�
	public function getSuppliersList($field='*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_logistics_suppliers $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//����ID��ȡ��Ӧ����Ϣ
	public function getSuppliersDetailById($id){
		$sql="select * from ecms_logistics_suppliers where id=$id";
		return $this->db->getQueryValue($sql);
	}
	//����SuppliersNo��ȡ��Ӧ����Ϣ
	public function getSuppliersDetailBySuppliersNo($suppliersNo){
		$sql="select * from ecms_logistics_suppliers where suppliers_no='".$suppliersNo."'";
		return $this->db->getQueryValue($sql);
	}
	//=================================��Ʒ��Ϣ����==========================================
	//¼����Ʒ��Ϣ
	public function releaseGoods($goods){
		$sql="insert into ecms_logistics_goods(goods_no,goods_name,goods_upc,goods_vq,goods_type,suppliers_no,create_time,update_time) 
			  values('".$goods['goodsNo']."','".$goods['goodsName']."','".$goods['goodsUpc']."','".$goods['goodsVq']."',".$goods['goodsType'].",'".$goods['suppliersNo']."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	//�޸���Ʒ��Ϣ
	public function saveGoods($goods){
		$sql="update ecms_logistics_goods set goods_name='".$goods['goodsName']."',goods_upc='".$goods['goodsUpc']."',goods_vq='".$goods['goodsVq']."',goods_type=".$goods['goodsType'].",suppliers_no='".$goods['suppliersNo']."',update_time=".time()." 
			  where goods_no='".$goods['goodsNo']."'";
		return $this->db->getQueryExecute($sql);
	}
	//��ȡ��Ʒ��Ϣ�б�
	public function getGoodsList($where='',$order='',$limit=''){
		$sql="select goods.*,suppliers.suppliers_name from ecms_logistics_goods as goods inner join ecms_logistics_suppliers as suppliers on goods.suppliers_no=suppliers.suppliers_no 
			  $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//����ID��ȡ��Ʒ��Ϣ
	public function getGoodsDetailById($id){
		$sql="select * from ecms_logistics_goods where id=$id";
		return $this->db->getQueryValue($sql);
	}
	//����goodsNo��ȡ��Ʒ��Ϣ
	public function getGoodsDetailByGoodsNo($goodsNo){
		$sql="select * from ecms_logistics_goods where goods_no='".$goodsNo."'";
		return $this->db->getQueryValue($sql);
	}
	//=================================��Ӧ����Ʒ������==========================================
	//¼��ԤԼ��Ʒ���
	public function releaseStorage($storage){
		$sql="insert into ecms_logistics_storage(storage_po,stores_no,suppliers_no,goods_no,goods_weight,goods_cbm,storage_num,storage_time,create_time,update_time) 
			  values('".$storage['storagePo']."','".$storage['storesNo']."','".$storage['suppliersNo']."','".$storage['goodsNo']."',".$storage['goodsWeight'].",".$storage['goodsCbm'].",".$storage['storageNum'].",'".$storage['storageTime']."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	//�޸�����ԤԼ��Ʒ
	public function saveStorage($storage){
		$sql="update ecms_logistics_storage set storage_po='".$storage['storagePo']."',stores_no='".$storage['storesNo']."',suppliers_no='".$storage['suppliersNo']."',
			  goods_no='".$storage['goodsNo']."',goods_weight=".$storage['goodsWeight'].",goods_cbm=".$storage['goodsCbm'].",storage_num=".$storage['storageNum'].",
			  storage_time='".$storage['storageTime']."',update_time=".time()." 
			  where id=".$storage['id'];
		return $this->db->getQueryExecute($sql);
	}
	//��ȡ����ԤԼ��Ʒ�б�
	public function getStorageList($where='',$order='',$limit=''){
		$sql="select storage.id,storage_po,storage_num,storage_time,storage.create_time,storage.update_time,storage.goods_no,goods_name,goods_upc,goods_vq,goods_type,goods_weight,goods_cbm, 
			  storage.suppliers_no,suppliers_name,storage.stores_no,stores_name,city_name,address,tel_one,tel_two,tel_three 
			  from ecms_logistics_storage as storage inner join ecms_logistics_suppliers as suppliers on storage.suppliers_no=suppliers.suppliers_no 
			  inner join ecms_logistics_stores as stores on storage.stores_no=stores.stores_no inner join ecms_logistics_goods as goods on storage.goods_no=goods.goods_no 
			  $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//����Ӧ�̺����ʱ�����ԤԼ��Ʒ����
	public function getStorageGoodsListBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		$sql="SELECT storage_po,storage.goods_no,goods_name,goods_upc,goods_vq,goods_type,
			  SUM(storage_num) AS storage_num,SUM(storage.goods_weight) AS goods_weight,SUM(storage.goods_cbm) AS goods_cbm,
			  ROUND(SUM(storage.goods_weight)/SUM(storage_num),3) AS goods_weight_avg,ROUND(SUM(storage.goods_cbm)/SUM(storage_num),3) AS goods_cbm_avg
			  FROM ecms_logistics_storage AS STORAGE INNER JOIN ecms_logistics_suppliers AS suppliers ON storage.suppliers_no=suppliers.suppliers_no 
			  INNER JOIN ecms_logistics_stores AS stores ON storage.stores_no=stores.stores_no INNER JOIN ecms_logistics_goods AS goods ON storage.goods_no=goods.goods_no 
			  WHERE storage.suppliers_no='".$suppliersNo."' and storage_time='".$storageTime."' and goods_type=$goodsType GROUP BY storage.goods_no,storage_po";
		return $this->db->getQueryArray($sql);
	}
	//����Ӧ�̺����ʱ�����ԤԼ�ŵ����
	public function getStorageStoresListBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		$sql="SELECT storage.stores_no,stores_name
			  FROM ecms_logistics_storage AS storage INNER JOIN ecms_logistics_suppliers AS suppliers ON storage.suppliers_no=suppliers.suppliers_no 
			  INNER JOIN ecms_logistics_stores AS stores ON storage.stores_no=stores.stores_no INNER JOIN ecms_logistics_goods AS goods ON storage.goods_no=goods.goods_no 
			  WHERE storage.suppliers_no='".$suppliersNo."' and storage_time='".$storageTime."' and goods_type=$goodsType GROUP BY storage.stores_no";
		return $this->db->getQueryArray($sql);
	}
	//����Ӧ�̣�ԤԼ�ŵ꣬�����ʱ�����ԤԼ��Ʒ����
	public function getStorageStoresGoodsByStoresNoAndSuppliersNo($storesNo,$suppliersNo,$storageTime,$goodsType){
		$sql="SELECT storage_po,storage_num,storage.goods_no
			  FROM ecms_logistics_storage AS storage INNER JOIN ecms_logistics_suppliers AS suppliers ON storage.suppliers_no=suppliers.suppliers_no 
			  INNER JOIN ecms_logistics_stores AS stores ON storage.stores_no=stores.stores_no INNER JOIN ecms_logistics_goods AS goods ON storage.goods_no=goods.goods_no 
			  WHERE storage.stores_no='".$storesNo."' and storage.suppliers_no='".$suppliersNo."' and storage_time='".$storageTime."' and goods_type=$goodsType";
		return $this->db->getQueryArray($sql);
	}
	//��ȡԤԼ���ܹ�Ӧ���б�
	public function getStorageSuppliersList($storageTime,$goodsType){
		$sql="SELECT storage.suppliers_no,suppliers_name,SUM(storage_num) AS storage_num,SUM(goods_weight) AS goods_weight 
			  FROM ecms_logistics_storage AS storage 
			  INNER JOIN ecms_logistics_suppliers AS suppliers ON storage.suppliers_no=suppliers.suppliers_no 
			  INNER JOIN ecms_logistics_stores AS stores ON storage.stores_no=stores.stores_no 
			  INNER JOIN ecms_logistics_goods AS goods ON storage.goods_no=goods.goods_no 
			  WHERE storage_time='".$storageTime."' AND goods_type=$goodsType 
			  GROUP BY storage.suppliers_no";
		return $this->db->getQueryArray($sql);
	}
	//���ݹ�Ӧ�̻�ȡ�������б� 
	public function getStorageStoragePoBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		$sql="SELECT storage_po
			  FROM ecms_logistics_storage AS storage 
			  INNER JOIN ecms_logistics_suppliers AS suppliers ON storage.suppliers_no=suppliers.suppliers_no 
			  INNER JOIN ecms_logistics_stores AS stores ON storage.stores_no=stores.stores_no 
			  INNER JOIN ecms_logistics_goods AS goods ON storage.goods_no=goods.goods_no 
			  WHERE storage_time='".$storageTime."' AND goods_type=$goodsType AND storage.suppliers_no='".$suppliersNo."'
			  GROUP BY storage_po";
		return $this->db->getQueryArray($sql);
	}
	//�����ŵ��ȡ���ص���Ϣ�б�
	public function getStorageListByStoresNo($storesNo,$storageTime,$goodsType){
		$sql="select storage.id,storage_po,storage_num,storage_time,storage.create_time,storage.update_time,storage.goods_no,goods_name,goods_upc,goods_vq,goods_type,goods_weight,goods_cbm, 
			  storage.suppliers_no,suppliers_name,storage.stores_no,stores_name,city_name,address,tel_one,tel_two,tel_three 
			  from ecms_logistics_storage as storage inner join ecms_logistics_suppliers as suppliers on storage.suppliers_no=suppliers.suppliers_no 
			  inner join ecms_logistics_stores as stores on storage.stores_no=stores.stores_no inner join ecms_logistics_goods as goods on storage.goods_no=goods.goods_no 
			  WHERE storage.stores_no='".$storesNo."' AND goods_type=$goodsType AND storage_time='".$storageTime."'";
		return $this->db->getQueryArray($sql);
	}
	//����ID��ȡ����ԤԼ��Ʒ��Ϣ
	public function getStorageDetailById($id){
		$sql="select storage.id,storage_po,storage_num,storage_time,storage.create_time,storage.update_time,storage.goods_no,goods_name,goods_upc,goods_vq,goods_type,goods_weight,goods_cbm, 
			  storage.suppliers_no,suppliers_name,storage.stores_no,stores_name,city_name,address,tel_one,tel_two,tel_three 
			  from ecms_logistics_storage as storage inner join ecms_logistics_suppliers as suppliers on storage.suppliers_no=suppliers.suppliers_no 
			  inner join ecms_logistics_stores as stores on storage.stores_no=stores.stores_no inner join ecms_logistics_goods as goods on storage.goods_no=goods.goods_no 
			  where storage.id=$id";
		return $this->db->getQueryValue($sql);
	}
	//����IDɾ������ԤԼ��Ʒ��Ϣ
	public function delStorageById($id){
		$sql="delete from ecms_logistics_storage where id=$id";
		return $this->db->getQueryExecute($sql);
	}
}
?>