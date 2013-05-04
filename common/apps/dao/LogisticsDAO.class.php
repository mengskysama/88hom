<?php
/**
 * 仓储系统管理
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class LogisticsDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//=================================门店信息管理======================================
	//录入门店信息
	public function releaseStores($stores){
		$sql="insert into ecms_logistics_stores(stores_no,stores_name,city_name,address,tel_one,tel_two,tel_three,create_time,update_time) 
			  values('".$stores['storesNo']."','".$stores['storesName']."','".$stores['cityName']."','".$stores['address']."','".$stores['telOne']."','".$stores['telTwo']."','".$stores['telThree']."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	//门店信息修改 
	public function saveStores($stores){
		$sql="update ecms_logistics_stores set stores_name='".$stores['storesName']."',city_name='".$stores['cityName']."',address='".$stores['address']."',tel_one='".$stores['telOne']."',tel_two='".$stores['telTwo']."',tel_three='".$stores['telThree']."',update_time=".time()." 
			  where stores_no='".$stores['storesNo']."'";
		return $this->db->getQueryExecute($sql);
	}
	//删除门店
	public function delStoresByNo($storesNo){
		$sql="delete from ecms_logistics_stores where stores_no='".$storesNo."'";
		return $this->db->getQueryExecute($sql);
	}
	//获取门店列表
	public function getStoresList($field='*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_logistics_stores $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//根据ID获取门店信息
	public function getStoresDetailById($id){
		$sql="select * from ecms_logistics_stores where id=$id";
		return $this->db->getQueryValue($sql);
	}
	//根据StoresNo获取门店信息
	public function getStoresDetailByStoresNo($storesNo){
		$sql="select * from ecms_logistics_stores where stores_no='".$storesNo."'";
		return $this->db->getQueryValue($sql);
	}
	//================================供应商信息管理=====================================
	//录入供应商信息
	public function releaseSuppliers($suppliers){
		$sql="insert into ecms_logistics_suppliers(suppliers_no,suppliers_name,create_time,update_time) 
			  values('".$suppliers['suppliersNo']."','".$suppliers['suppliersName']."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	//修改供应商信息
	public function saveSuppliers($suppliers){
		$sql="update ecms_logistics_suppliers set suppliers_name='".$suppliers['suppliersName']."',update_time=".time()." where suppliers_no='".$suppliers['suppliersNo']."'";
		return $this->db->getQueryExecute($sql);
	}
	//删除供应商信息
	public function delSuppliersByNo($suppliersNo){
		$sql="delete from ecms_logistics_suppliers where suppliers_no='".$suppliersNo."'";
		return $this->db->getQueryExecute($sql);
	}
	//获取供应商列表
	public function getSuppliersList($field='*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_logistics_suppliers $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//根据ID获取供应商信息
	public function getSuppliersDetailById($id){
		$sql="select * from ecms_logistics_suppliers where id=$id";
		return $this->db->getQueryValue($sql);
	}
	//根据SuppliersNo获取供应商信息
	public function getSuppliersDetailBySuppliersNo($suppliersNo){
		$sql="select * from ecms_logistics_suppliers where suppliers_no='".$suppliersNo."'";
		return $this->db->getQueryValue($sql);
	}
	//=================================商品信息管理==========================================
	//录入商品信息
	public function releaseGoods($goods){
		$sql="insert into ecms_logistics_goods(goods_no,goods_name,goods_upc,goods_vq,goods_type,suppliers_no,create_time,update_time) 
			  values('".$goods['goodsNo']."','".$goods['goodsName']."','".$goods['goodsUpc']."','".$goods['goodsVq']."',".$goods['goodsType'].",'".$goods['suppliersNo']."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	//修改商品信息
	public function saveGoods($goods){
		$sql="update ecms_logistics_goods set goods_name='".$goods['goodsName']."',goods_upc='".$goods['goodsUpc']."',goods_vq='".$goods['goodsVq']."',goods_type=".$goods['goodsType'].",suppliers_no='".$goods['suppliersNo']."',update_time=".time()." 
			  where goods_no='".$goods['goodsNo']."'";
		return $this->db->getQueryExecute($sql);
	}
	//获取商品信息列表
	public function getGoodsList($where='',$order='',$limit=''){
		$sql="select goods.*,suppliers.suppliers_name from ecms_logistics_goods as goods inner join ecms_logistics_suppliers as suppliers on goods.suppliers_no=suppliers.suppliers_no 
			  $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//根据ID获取商品信息
	public function getGoodsDetailById($id){
		$sql="select * from ecms_logistics_goods where id=$id";
		return $this->db->getQueryValue($sql);
	}
	//根据goodsNo获取商品信息
	public function getGoodsDetailByGoodsNo($goodsNo){
		$sql="select * from ecms_logistics_goods where goods_no='".$goodsNo."'";
		return $this->db->getQueryValue($sql);
	}
	//=================================供应商商品入库管理==========================================
	//录入预约商品入库
	public function releaseStorage($storage){
		$sql="insert into ecms_logistics_storage(storage_po,stores_no,suppliers_no,goods_no,goods_weight,goods_cbm,storage_num,storage_time,create_time,update_time) 
			  values('".$storage['storagePo']."','".$storage['storesNo']."','".$storage['suppliersNo']."','".$storage['goodsNo']."',".$storage['goodsWeight'].",".$storage['goodsCbm'].",".$storage['storageNum'].",'".$storage['storageTime']."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	//修改入库的预约商品
	public function saveStorage($storage){
		$sql="update ecms_logistics_storage set storage_po='".$storage['storagePo']."',stores_no='".$storage['storesNo']."',suppliers_no='".$storage['suppliersNo']."',
			  goods_no='".$storage['goodsNo']."',goods_weight=".$storage['goodsWeight'].",goods_cbm=".$storage['goodsCbm'].",storage_num=".$storage['storageNum'].",
			  storage_time='".$storage['storageTime']."',update_time=".time()." 
			  where id=".$storage['id'];
		return $this->db->getQueryExecute($sql);
	}
	//获取入库的预约商品列表
	public function getStorageList($where='',$order='',$limit=''){
		$sql="select storage.id,storage_po,storage_num,storage_time,storage.create_time,storage.update_time,storage.goods_no,goods_name,goods_upc,goods_vq,goods_type,goods_weight,goods_cbm, 
			  storage.suppliers_no,suppliers_name,storage.stores_no,stores_name,city_name,address,tel_one,tel_two,tel_three 
			  from ecms_logistics_storage as storage inner join ecms_logistics_suppliers as suppliers on storage.suppliers_no=suppliers.suppliers_no 
			  inner join ecms_logistics_stores as stores on storage.stores_no=stores.stores_no inner join ecms_logistics_goods as goods on storage.goods_no=goods.goods_no 
			  $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//按供应商和入库时间进行预约商品汇总
	public function getStorageGoodsListBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		$sql="SELECT storage_po,storage.goods_no,goods_name,goods_upc,goods_vq,goods_type,
			  SUM(storage_num) AS storage_num,SUM(storage.goods_weight) AS goods_weight,SUM(storage.goods_cbm) AS goods_cbm,
			  ROUND(SUM(storage.goods_weight)/SUM(storage_num),3) AS goods_weight_avg,ROUND(SUM(storage.goods_cbm)/SUM(storage_num),3) AS goods_cbm_avg
			  FROM ecms_logistics_storage AS STORAGE INNER JOIN ecms_logistics_suppliers AS suppliers ON storage.suppliers_no=suppliers.suppliers_no 
			  INNER JOIN ecms_logistics_stores AS stores ON storage.stores_no=stores.stores_no INNER JOIN ecms_logistics_goods AS goods ON storage.goods_no=goods.goods_no 
			  WHERE storage.suppliers_no='".$suppliersNo."' and storage_time='".$storageTime."' and goods_type=$goodsType GROUP BY storage.goods_no,storage_po";
		return $this->db->getQueryArray($sql);
	}
	//按供应商和入库时间进行预约门店汇总
	public function getStorageStoresListBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		$sql="SELECT storage.stores_no,stores_name
			  FROM ecms_logistics_storage AS storage INNER JOIN ecms_logistics_suppliers AS suppliers ON storage.suppliers_no=suppliers.suppliers_no 
			  INNER JOIN ecms_logistics_stores AS stores ON storage.stores_no=stores.stores_no INNER JOIN ecms_logistics_goods AS goods ON storage.goods_no=goods.goods_no 
			  WHERE storage.suppliers_no='".$suppliersNo."' and storage_time='".$storageTime."' and goods_type=$goodsType GROUP BY storage.stores_no";
		return $this->db->getQueryArray($sql);
	}
	//按供应商，预约门店，和入库时间进行预约商品汇总
	public function getStorageStoresGoodsByStoresNoAndSuppliersNo($storesNo,$suppliersNo,$storageTime,$goodsType){
		$sql="SELECT storage_po,storage_num,storage.goods_no
			  FROM ecms_logistics_storage AS storage INNER JOIN ecms_logistics_suppliers AS suppliers ON storage.suppliers_no=suppliers.suppliers_no 
			  INNER JOIN ecms_logistics_stores AS stores ON storage.stores_no=stores.stores_no INNER JOIN ecms_logistics_goods AS goods ON storage.goods_no=goods.goods_no 
			  WHERE storage.stores_no='".$storesNo."' and storage.suppliers_no='".$suppliersNo."' and storage_time='".$storageTime."' and goods_type=$goodsType";
		return $this->db->getQueryArray($sql);
	}
	//获取预约汇总供应商列表
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
	//根据供应商获取订单号列表 
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
	//根据门店获取配载单信息列表
	public function getStorageListByStoresNo($storesNo,$storageTime,$goodsType){
		$sql="select storage.id,storage_po,storage_num,storage_time,storage.create_time,storage.update_time,storage.goods_no,goods_name,goods_upc,goods_vq,goods_type,goods_weight,goods_cbm, 
			  storage.suppliers_no,suppliers_name,storage.stores_no,stores_name,city_name,address,tel_one,tel_two,tel_three 
			  from ecms_logistics_storage as storage inner join ecms_logistics_suppliers as suppliers on storage.suppliers_no=suppliers.suppliers_no 
			  inner join ecms_logistics_stores as stores on storage.stores_no=stores.stores_no inner join ecms_logistics_goods as goods on storage.goods_no=goods.goods_no 
			  WHERE storage.stores_no='".$storesNo."' AND goods_type=$goodsType AND storage_time='".$storageTime."'";
		return $this->db->getQueryArray($sql);
	}
	//根据ID获取入库的预约商品信息
	public function getStorageDetailById($id){
		$sql="select storage.id,storage_po,storage_num,storage_time,storage.create_time,storage.update_time,storage.goods_no,goods_name,goods_upc,goods_vq,goods_type,goods_weight,goods_cbm, 
			  storage.suppliers_no,suppliers_name,storage.stores_no,stores_name,city_name,address,tel_one,tel_two,tel_three 
			  from ecms_logistics_storage as storage inner join ecms_logistics_suppliers as suppliers on storage.suppliers_no=suppliers.suppliers_no 
			  inner join ecms_logistics_stores as stores on storage.stores_no=stores.stores_no inner join ecms_logistics_goods as goods on storage.goods_no=goods.goods_no 
			  where storage.id=$id";
		return $this->db->getQueryValue($sql);
	}
	//根据ID删除入库的预约商品信息
	public function delStorageById($id){
		$sql="delete from ecms_logistics_storage where id=$id";
		return $this->db->getQueryExecute($sql);
	}
}
?>