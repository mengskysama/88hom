<?php
return array(
	'info' => array(
		'caption' => '信息管理',
		'sub' => array(
			'info' => array('caption' => '信息管理', 'url' => 'info/info_manager.php')
		)
	),
	'property'	=> array(
		'caption' => '新盘管理',
		'sub' => array(
			'propertyRelease' => array('caption' => '新盘发布', 'url' => 'property/release.php'),
			'propertyModify' => array('caption' => '新盘管理', 'url' => 'property/list.php'),
		),
	),
	'community' => array(
		'caption' => '小区管理',
		'sub' => array(
			'community' => array('caption' => '小区管理', 'url' => 'community/community_manager.php')
		)
	),
	'ad'	=> array(
		'caption' => '广告管理',
		'sub' => array(
			'ad' => array('caption' => '广告管理', 'url' => 'ad/ad_manager.php'),
			'adType' => array('caption' => '广告类别', 'url' => 'ad/type_manager.php')
		),
	),
	'furniture' => array(
		'caption' => '家居管理',
		'sub' => array(
			'furnitureStore' => array('caption' => '家居卖场', 'url' => 'furniture/furnitureStore_manager.php'),
			'furnitureDesignPic' => array('caption' => '装修设计图库', 'url' => 'furniture/furniture_design_pic_manager.php'),
			'furnitureBrand' => array('caption' => '家居品牌馆', 'url' => 'furniture/furniture_brand_manager.php')
		)
	),
	'trend'	=> array(
		'caption' => '走势图',
		'sub' => array(
			'trend_category' => array('caption' => '类别管理', 'url' => 'trend/trend_category_manager.php'),
			'trend_area' => array('caption' => '区域/项目', 'url' => 'trend/trend_area_manager.php'),
			'trend_data' => array('caption' => '数据管理', 'url' => 'trend/trend_data_manager.php'),
			'trend_chart' => array('caption' => '走势图管理', 'url' => 'trend/trend_chart_manager.php')
		),
	),
	'complex' => array(
		'caption' => '综合管理',
		'sub' => array(
			'complexImcpManage' => array('caption' => '中介公司管理', 'url' => 'complex/complexImcpList.php'),
			'complexTgManage' => array('caption' => '团购审核管理', 'url' => 'complex/complexTgList.php'),
			'complexCommunityManage' => array('caption' => '小区审核管理', 'url' => 'complex/complexCommunityList.php'),
			'complexHouseManage' => array('caption' => '住宅审核管理', 'url' => 'complex/complexHouseList.php'),
			'complexShopsManage' => array('caption' => '商铺审核管理', 'url' => 'complex/complexShopsList.php'),
			'complexOfficeManage' => array('caption' => '写字楼审核管理', 'url' => 'complex/complexOfficeList.php'),
			'complexVillaManage' => array('caption' => '别墅审核管理', 'url' => 'complex/complexVillaList.php'),
			'complexFactoryManage' => array('caption' => '厂房审核管理', 'url' => 'complex/complexFactoryList.php'),
		)
	),
	'system' => array(
		'caption' => '系统管理',
		'sub' => array(
			'user' => array('caption' => '系统用户管理', 'url' => 'system/systemUser.php'),
			'group' => array('caption' => '用户组管理', 'url' => 'system/group.php'),
			'webset' => array('caption' => '网站配置', 'url' => 'system/webset.php'),
			'link' => array('caption' => '友情链接', 'url' => 'system/link.php'),
//			'link2' => array('caption' => '合作客户', 'url' => 'system/link2.php'),
//			'spider' => array('caption' => '蜘蛛统计', 'url' => 'system/spider.php'),
//			'outlink' => array('caption' => '网站外链', 'url' => 'system/outlink.php'),
//			'sitemap' => array('caption' => 'SiteMap', 'url' => 'system/sitemap.php'),
			'editpwd' => array('caption' => '修改密码', 'url' => 'system/editpwd.php'),
		),
	),
); 
?>