var isOpen = true;//右侧面板展开标志
var objMap = null;//地图对象
var myIcon = {};//图标
var pageType = null;//页面类型，新盘或二手房或租房
var propertyList = null;//新盘列表
var secondHandList = null;//二手房或租 房
var secondHandHouseList = null;//二手房源列表，包括租售
var fitment=['','豪华装修','精装修','中等装修','简装修','毛坯'];     

var pagingPropertyObj = {//新盘分页配置对象
		totalNum:0,
		pageSize:5,
		currentPage:1,
		action:'rollingPropertyList'
};
var pagingSecondHandObj = {//二手房或租 房分页配置对象
		totalNum:0,
		pageSize:10,
		currentPage:1,
		action:'rollingSecondHandList'
};
var pagingSecondHandHouseObj = {//二手房或租 房分页配置对象
		totalNum:0,
		pageSize:5,
		currentPage:1,
		action:'rollingSecondHandHouseList'
};
//初始化搜索条件事件
function initSearchConditionEvent(){
	$('#buildType a').click(function(){
		$('#buildType a').removeClass('bx');
		$(this).addClass('bx');
		if((pageType == 'sell' || pageType == 'rent') && ($(this).attr('val') == '2' || $(this).attr('val') == '3'))//如果物业类型是商铺或写字楼，则没有房型,从表面上隐藏掉
			$('#houseType').hide();
		else
			$('#houseType').show();
		
		requestData();
			
	});
	$('#price a').click(function(){
		$('#price a').removeClass('bx');
		$(this).addClass('bx');
		requestData();
	});
	$('#houseType a').click(function(){
		$('#houseType a').removeClass('bx');
		$(this).addClass('bx');
		requestData();
	});
	$('#area a').click(function(){
		$('#area a').removeClass('bx');
		$(this).addClass('bx');
		requestData();
	});
	$('#propertyState input').click(function(){
		if($('#propertyState input:checked').length<=0){
			alert('请至少选择一种楼盘状态！');
			$('#propertyState [value="1"]').attr('checked','true');
		}
		requestData();
	});
}
//请求数据
function requestData()
{
	if(pageType == 'property'){//请求数据
		if(objMap.getZoom()<=12)
		{
			$('[type="sum"]').parent().remove();//删除汇总
			getPropertySum();
			getProperty();
		}
		else
		{
			getProperty();
		}	
	}
	if(pageType == 'sell' || pageType == 'rent'){//请求数据
		if(objMap.getZoom()<=12)
		{
			$('[type="sum"]').parent().remove();//删除汇总
			getSecondHandSum();
			getSecondHand();
		}
		else
		{
			getSecondHand();
		}	
	}
}
//获取搜索条件参数,@pageType页面类别
function getSearchCondition(){
	return {
		buildType:$('#buildType .bx').attr('val'),
		price:$('#price .bx').attr('val'),
		houseType:$('#houseType .bx').attr('val'),
		area:$('#area .bx').attr('val'),
		propertyState:getPropertyStateValue()
	};
}
//获取新盘楼盘状态值，以|隔开,1|2|
function getPropertyStateValue(){
	var val = '';
	$.each($('#propertyState input:checked'),function(index,obj){
		val += $(obj).val()+'|';
	});
	return val;
}
//新盘初始
function initProperty(){
	pageType = 'property';
	$('.menu ul li').eq(0).addClass('over');//新盘tab高亮
	initEventListener();//事件初始化
	getPropertySum();//获取新盘汇总
	getProperty();//新盘列表
	
	//alert($('#propertyState input:checked').length);
}
//二手房初始
function initSell(){
	pageType = 'sell';
	$('.menu ul li').eq(1).addClass('over');//二手房tab高亮
	initEventListener();//事件初始化
	getSecondHandSum();
	getSecondHand();
}
//租房初始
function initRent(){
	pageType = 'rent';
	$('.menu ul li').eq(2).addClass('over');//租房tab高亮
	initEventListener();//事件初始化
	getSecondHandSum();
	getSecondHand();
}
//获取汇总,深圳各区的,新盘或二手房或租房
function getSum(url,param){
	$.ajax({
		url:url,
		data:param,
		dataType:'json',
		success:function(result){
			$.each(result,function(index,obj){
				drawObj(translateDistrict(obj));
			});
		},
		error:function(error){
			alert('error');
		}
	});
}
//获取新盘汇总
function getPropertySum(){
	var url = 'index.php';
	var param = {
			'action':'getPropertyCountJson',
			'provinceIndex':4,
			'cityIndex':8
		};
	$.extend(param,getSearchCondition());//合并参数
	getSum(url,param);
}
//获取二手房或租房汇总
function getSecondHandSum(){
	var url = '';
	var type = '';
	if(pageType == 'sell')
	{
		url = 'sell.php';
		type = 'sell';
	}	
	else
	{
		url = 'rent.php';
		type = 'rent';
	}	
	
	var param = {
			'action':'getSecondHandCountJson',
			'provinceIndex':4,
			'cityIndex':8,
			'type':type
		};
	$.extend(param,getSearchCondition());//合并参数
	getSum(url,param);
}
//获取新盘列表
function getProperty(){
	var bounds = objMap.getBounds();
	var southWest = bounds.getSouthWest();
	var northEast = bounds.getNorthEast();
	
	var param = {
			'action':'getPropertyJson',
			'min_lng':southWest.lng,
			'min_lat':southWest.lat,
			'max_lng':northEast.lng,
			'max_lat':northEast.lat
		};
	$.extend(param,getSearchCondition());//合并参数
	$.ajax({
		url:'index.php',
		data:param,
		dataType:'json',
		beforeSend:function(){//
			$('.mr_ms').html('<img src="../templates/images/web/loading.gif"/>努力查找中...');
			$('.mr_px a').removeClass('asc');
			$('.mr_px a').removeClass('desc');
		},
		success:function(result){
			propertyList = result;//把结果赋于新盘列表
			rollingPropertyList(1);
			if(objMap.getZoom() > 12){//如果地图缩放级数大于12，则画到地图中
				clearProperty();//把旧的新盘删除
				$.each(result,function(index,obj){
					drawObj(obj);
				});
			}
			$('.mr_ms').html('在当前图区内找到<b class="red01">'+result.length+'</b>个新盘');
		},
		error:function(request,error){
			$('.mr_ms').html('很遗憾,查找失败!');
		}
	});
}
//获取二手房或租房列表
function getSecondHand(){
	var bounds = objMap.getBounds();
	var southWest = bounds.getSouthWest();
	var northEast = bounds.getNorthEast();
	
	var param = {
			'action':'getSecondHandJson',
			'min_lng':southWest.lng,
			'min_lat':southWest.lat,
			'max_lng':northEast.lng,
			'max_lat':northEast.lat,
			'type':(pageType=='sell'?'sell':'rent')
		};
	$.extend(param,getSearchCondition());//合并参数
	$.ajax({
		url:(pageType=='sell'?'sell.php':'rent.php'),
		data:param,
		dataType:'json',
		beforeSend:function(){//
			$('.mr_ms').html('<img src="../templates/images/web/loading.gif"/>努力查找中...');
			$('.mr_px a').removeClass('asc');
			$('.mr_px a').removeClass('desc');
		},
		success:function(result){
			secondHandList = result;//把结果赋于二手房或租房删除列表
			rollingSecondHandList(1);
			if(objMap.getZoom() > 12){//如果地图缩放级数大于12，则画到地图中
				clearSecondHand();//把旧的二手房或租房删除
				$.each(result,function(index,obj){
					drawObj(obj);
				});
			}
			$('.mr_ms').html('在当前图区内找到<b class="red01">'+result.length+'</b>个小区');
		},
		error:function(request,error){
			$('.mr_ms').html('很遗憾,查找失败!');
		}
	});
}
//新盘删除
function clearProperty(){
	$('[type="sellingProperty"],[type="toSellProperty"],[type="selledProperty"],[type="rentingProperty"],[type="newProperty"]').parent().remove();
}
//二手房或租房列表删除
function clearSecondHand(){
	$('[type="sell"],[type="rent"]').parent().remove();
}
function showInRightPanel(list){
	$('.mr_nr .list').empty();
	$.each(list,function(index,obj){
		html = '<table val="'+obj.id+'" border="0" cellpadding="0" cellspacing="0">'
			+'<tr>'
			+'	<td colspan="2" align="center"><b class="t_title">'+obj.name+'</b></td>'
			+'</tr>'
			+'<tr>'
			+'	<td rowspan="3" width="130"><img width="125" height="100" src="../uploads/'+obj.picThumb+'"</td><td><label>'+(pageType=='property'?obj.value:obj.value1)+'</label></td>'
			+'</tr>'
			+'<tr>'
			+'	<td>物类类别：'+(obj.isHouseType==1?'住宅 ':'')+(obj.isBusinessType==1?'商铺 ':'')+(obj.isOfficeType==1?'写字楼 ':'')+(obj.isVillaType==1?'别墅 ':'')+'</td>'
			+'</tr>'
			+'<tr>'
			+'	<td>地址：'+obj.address+'</td>'
			+'</tr>'
			+'<tr>'
			+'	<td colspan="2"><a href="#">楼盘详情</a> <a class="around_link" href="javascript:;">周边</a> <a class="driveLine_link2" href="javascript:;">驾车</a></td>'
			+'</tr>'
			+'</table>';
		$('.mr_nr .list').append($(html));
	});
	initRightListHover();//初始化右则列表滑过效果
	initRightListDriveLineAroundEvent();//初始化右则周边，驾车事件
}
//新盘翻页
function rollingPropertyList(page){
	pagingPropertyObj.totalNum = propertyList.length;
	pagingPropertyObj.currentPage = page;
	var startIndex = (pagingPropertyObj.currentPage -1)*pagingPropertyObj.pageSize;
	var endIndex = pagingPropertyObj.currentPage*pagingPropertyObj.pageSize;
	var list = propertyList.slice(startIndex,endIndex);
	showInRightPanel(list);
	if(pagingPropertyObj.totalNum >0)
		$('.pageList .pagingPanel').html(sysPageInfo(pagingPropertyObj.totalNum,pagingPropertyObj.pageSize,pagingPropertyObj.currentPage,pagingPropertyObj.action,'params'));
	else
		$('.pageList .pagingPanel').html('');
}
//小区翻页
function rollingSecondHandList(page){
	pagingSecondHandObj.totalNum = secondHandList.length;
	pagingSecondHandObj.currentPage = page;
	var startIndex = (pagingSecondHandObj.currentPage -1)*pagingSecondHandObj.pageSize;
	var endIndex = pagingSecondHandObj.currentPage*pagingSecondHandObj.pageSize;
	var list = secondHandList.slice(startIndex,endIndex);
	showInRightPanel(list);
	if(pagingSecondHandObj.totalNum >0)
		$('.pageList .pagingPanel').html(sysPageInfo(pagingSecondHandObj.totalNum,pagingSecondHandObj.pageSize,pagingSecondHandObj.currentPage,pagingSecondHandObj.action,'params'));
	else
		$('.pageList .pagingPanel').html('');
}
//房源翻页
function rollingSecondHandHouseList(page){
	pagingSecondHandHouseObj.totalNum = secondHandHouseList.length;
	pagingSecondHandHouseObj.currentPage = page;
	var startIndex = (pagingSecondHandHouseObj.currentPage -1)*pagingSecondHandHouseObj.pageSize;
	var endIndex = pagingSecondHandHouseObj.currentPage*pagingSecondHandHouseObj.pageSize;
	var list = secondHandHouseList.slice(startIndex,endIndex);
	showSecondHandHouseList(list);
	if(pagingSecondHandHouseObj.totalNum >0)
		$('.link .pagingPanel').html(sysPageInfo(pagingSecondHandHouseObj.totalNum,pagingSecondHandHouseObj.pageSize,pagingSecondHandHouseObj.currentPage,pagingSecondHandHouseObj.action,'params'));
	else
		$('.link .pagingPanel').html('');
}
//排序
function sortList(){
	if(!$('.mr_px a').hasClass('asc') && !$('.mr_px a').hasClass('desc'))
	{
		$('.mr_px a').addClass('asc');
		$('.mr_px a').attr('title','均价从大到小排序');
		if(pageType == 'property'){
			sort(propertyList,ascCompare);
			rollingPropertyList(1);
		}
		else{
			sort(secondHandList,ascCompare);
			rollingSecondHandList(1);
		}
	}
	else if($('.mr_px a').hasClass('asc')){
		$('.mr_px a').removeClass('asc');
		$('.mr_px a').addClass('desc');
		$('.mr_px a').attr('title','均价从小到大排序');
		if(pageType == 'property'){
			sort(propertyList,descCompare);
			rollingPropertyList(1);
		}
		else{
			sort(secondHandList,descCompare);
			rollingSecondHandList(1);
		}
	}
	else if($('.mr_px a').hasClass('desc')){
		$('.mr_px a').removeClass('desc');
		$('.mr_px a').addClass('asc');
		$('.mr_px a').attr('title','均价从大到小排序');
		if(pageType == 'property'){
			sort(propertyList,ascCompare);
			rollingPropertyList(1);
		}
		else{
			sort(secondHandList,ascCompare);
			rollingSecondHandList(1);
		}
	}
}
function ascCompare(o1,o2){
	return o1.price - o2.price;
}
function descCompare(o1,o2){
	return o2.price - o1.price;
}
function sort(list,compare){
	list.sort(compare);
}
//显示新盘
function showProperty(id,position){
	$.ajax({
		url:'index.php',
		data:{
			id:id,
			action:'getPropertyJsonById'
		},
		dataType:'json',
		beforeSend:function(){
			$('.new_block_box').css({'display':'block','left':position.x,'top':position.y});
			$('.new_block_box .title .a').html('<img src="../templates/images/web/loading.gif"/>努力加载中...');
		},
		success:function(data){
			$('.new_block_box .title .a').html('<font class="t_title">'+(data.name.length>25?data.name.substring(0,22)+'...':data.name)+'</font><font id="state">(在售)</font>');
			$('.new_block_box .content .pic').html('<a href="#" title="'+data.name+'"><img width="167" height="134" src="../uploads/'+data.picThumb+'"/></a>');
			$('.new_block_box li').eq(0).html('均价： <label>'+data.price+'</label>');
			$('.new_block_box li').eq(1).html('物业类型：'+(data.propertyIsHouseType==1?'住宅 ':'')+(data.propertyIsBusinessType==1?'商铺 ':'')+(data.propertyIsOfficeType==1?'写字楼 ':'')+(data.propertyIsVillaType==1?'别墅 ':''));
			$('.new_block_box li').eq(2).html('开盘时间：'+data.propertyOpenTime);
			$('.new_block_box li').eq(3).html('开发商：'+data.propertyDevCompany);
			$('.new_block_box li').eq(4).html('楼盘销售电话：<label>'+data.propertyHotline+'</label>');
			$('.new_block_box li').eq(5).html('<a href="#" >查看楼盘详情 >></a>');
		},
		error:function(){
			$('.new_block_box .title .a').html('很遗憾，加载失败...');
		}
	});
	
}
//显示二手房或租房
function showSecondHand(id,position){
	$.ajax({
		url:(pageType=='sell'?'sell.php':'rent.php'),
		data:{
			id:id,
			action:'getSecondHandJsonById'
		},
		dataType:'json',
		beforeSend:function(){
			$('.secondHand_block_box').css({'display':'block','left':position.x,'top':position.y});
			$('.secondHand_block_box .title .a').html('<img src="../templates/images/web/loading.gif"/>努力加载中...');
		},
		success:function(data){
			$('.secondHand_block_box .title .a').html('<font class="t_title">'+(data.communityName.length>25?data.communityName.substring(0,22)+'...':data.communityName)+'</font>');
			$('.secondHand_block_box .content .pic').html('<a href="#" title="'+data.communityName+'"><img width="84" height="64" src="../uploads/'+data.picThumb+'"/></a>');
			if(pageType=='sell' && getSearchCondition().buildType==1)
				$('.secondHand_block_box li').eq(0).html(' <label>'+data.communityRefPrice+'</label>');
			else
				$('.secondHand_block_box li').eq(0).hide();
			$('.secondHand_block_box li').eq(1).html('物业类型：'+(data.communityIsHouseType==1?'住宅 ':'')+(data.communityIsBusinessType==1?'商铺 ':'')+(data.communityIsOfficeType==1?'写字楼 ':'')+(data.communityIsVillaType==1?'别墅 ':''));
			$('.secondHand_block_box li').eq(2).html('地址：'+data.communityAddress);
			
			getSecondHandHouseList(id);//显示某小区下的房源列表
		},
		error:function(){
			$('.secondHand_block_box .title .a').html('很遗憾，加载失败...');
		}
	});
	
	
}
//获取某小区下的房源列表
function getSecondHandHouseList(id){
	var action = '';
	var buildType = getSearchCondition().buildType;//物业类型
	var info = '';
	if(pageType=='sell')//出售
	{
		info = '出售';
		if(buildType == 1)//住宅
			action = 'getSellHouseListByCommunityId';
		else if(buildType == 2)//商铺
			action = 'getSellShopsListByCommunityId';
		else if(buildType == 3)//写字楼
			action = 'getSellOfficeListByCommunityId';
		else if(buildType == 4)//别墅
			action = 'getSellVillaListByCommunityId';
	}
	else//出租
	{
		info = '出租';
		if(buildType == 1)//住宅
			action = 'getRentHouseListByCommunityId';
		else if(buildType == 2)//商铺
			action = 'getRentShopsListByCommunityId';
		else if(buildType == 3)//写字楼
			action = 'getRentOfficeListByCommunityId';
		else if(buildType == 4)//别墅
			action = 'getRentVillaListByCommunityId';
	}
	if(buildType == 1)//住宅
		info += '住宅';
	else if(buildType == 2)//商铺
		info += '商铺';
	else if(buildType == 3)//写字楼
		info += '写字楼';
	else if(buildType == 4)//别墅
		info += '别墅';

	$.ajax({
		url:(pageType=='sell'?'sell.php':'rent.php'),
		data:{
			id:id,
			action:action
		},
		dataType:'json',
		beforeSend:function(){
			$('#houseListCountInfo').html('<img src="../templates/images/web/loading.gif"/>努力加载中...');
		},
		success:function(data){
			secondHandHouseList = data;
			$('#houseListCountInfo').html('共有<font color="red"><b>'+data.length+'</b></font>套'+info+'房源');
			rollingSecondHandHouseList(1);
			
		},
		error:function(){
			$('#houseListCountInfo').html('很遗憾，加载失败...');
		}
	});
}
//显示房源
function showSecondHandHouseList(list){
	var buildType = getSearchCondition().buildType;//物业类型
	$('#houseListPanel').empty();
	$.each(list,function(index,obj){
		var priceInfo = '';
		if(pageType=='sell')
		{
			if(buildType==3)
				priceInfo = obj.price+'元/㎡';	
			else
				priceInfo = obj.price+'万';
		}	
		else{
			priceInfo = obj.price+'元/月';
		}
		var info = fitment[obj.fitment]+', ' + obj.floor+'层/共'+obj.allFloor+'层, '+((buildType==1||buildType==4)?(obj.room+'居-'+obj.hall+'厅-'+obj.toilet+'卫'):'');
		html = '<table cellpadding="0" cellspacing="0" width="550" height="45">'
			+'<tr>'
			+'<td rowspan="2" width="68"><a target="_blank" href="#"><img width="63" height="45" src="../uploads/'+obj.picThumb+'"></a></td>'
			+'<td><a target="_blank"  href="#"><b>'+obj.name+'</b></td>'
			+'<td rowspan="2" width="60" align="center">'+obj.area+'㎡</td>'
			+'<td rowspan="2" width="90" align="center">'+priceInfo+'</td>'
			+'</tr>'
			+'<tr>'
			+'<td>'+info+'</td>'
			+'</tr>'
			+'</table>';
		$('#houseListPanel').append($(html));
	});
}
//通用分页
function sysPageInfo(totalNum,pageSize,currentPage,url,params){
		//当前页 
		currentPage=(currentPage == null ? 1 : currentPage);
		//总页数
		totalPage = totalNum%pageSize==0?totalNum/pageSize:(parseInt(totalNum/pageSize)+1);
		//如果当前页大于总页则取总页数,否则不变
		currentPage = currentPage > totalPage?totalPage:currentPage;
		//参数
		params = params==null?'':'&'.params;
		//页段,上8页,下8页
		pageParagraph = Math.ceil(currentPage/8);
		//最大页段
		maxPageParagraph = Math.ceil(totalPage/8);
		//页信息
		pageInfo = '<!--<label class="pagingInfo">'+currentPage+'/'+totalPage+',&nbsp;'+pageSize+'/页,&nbsp;&nbsp;共:&nbsp;'+totalNum
		+'&nbsp;&nbsp;</label>--><a class="pointer" href="javascript:'+url+'(1);" title="首页"><<</a>';
		if(pageParagraph > 1)
			pageInfo += '<a class="pointer" href="javascript:'+url+'('+((pageParagraph - 1) * 8)+');" title="前8页"><&nbsp;</a>';
			 
		startPage = (pageParagraph - 1)*8 +1 ;
		endPage = pageParagraph*8 + 1;
		for(var i=startPage;i<endPage;i++){
			if(i == currentPage)
			{
				pageInfo+='<a class="currentPage">'+i+'</a>';
			}else{
				if(i <= totalPage){
					pageInfo += '<a href="javascript:'+url+'('+i+');">'+i+'</a>';
				}
			}
		}
		
		if(pageParagraph < maxPageParagraph)
		{
			pageInfo += '<a class="pointer" href="javascript:'+url+'('+(pageParagraph *8+1)+');" title="下8页">&nbsp;></a>';
		}
		pageInfo += '<a class="pointer" href="javascript:'+url+'('+totalPage+');" title="末页">>></a>';
		return pageInfo;
}
//初始化右则列表滑过效果
function initRightListHover(){
	$('.mr_nr .list table').hover(function(){
		$(this).addClass('on');
		var overlay = $('.qu div[id="'+$(this).attr('val')+'"]');
			overlay.addClass('on');
			overlay.parent().css('z-index', '100');
			overlay.find('.value').css('display', 'inline');	//值显示
	},function(){
		$(this).removeClass('on');
		var overlay = $('.qu div[id="'+$(this).attr('val')+'"]');
		overlay.removeClass('on');
		overlay.parent().css('z-index', '-1');
		overlay.find('.value').css('display', 'none');	//隐藏显示
	});
}
//初始化右则周边，驾车事件
function initRightListDriveLineAroundEvent(){
	$(".around_link").click(function(){
		 $('.tool_panel').show();
		$("#drive").hide();
		$("#drive_form").hide();
		$('#drive_end').hide();
		$('#around_panel').show(); 
		clearAround();
	 });
	$(".driveLine_link2").click(function(){
		$('#start').focus();
		$('#end').val($(this).parent().parent().parent().find('.t_title:first').html());
		$('.tool_panel').show();
		$("#drive").show();
		$("#drive_form").show();
		$('#drive_end').hide();
		$('#around_panel').hide(); 		
	 });
}
//事件初始化
function initEventListener(){
	initSearchConditionEvent();//搜索条件行为
	initSearchInput();//初始化搜索框行为
	initPanleSize();//初始化面板框架尺寸
	$(window).resize(resizeWindow);//窗口重置事件
	expanderEvent();//右侧面板展开事件
	initMap();//初始化地图对象
	initQuickLoc();//快速定位
	initDrawMetro();//初始化画地铁事件
	initDrawDistrict();//初始化画区事件
	initTool();//初始化工具
	initClosePropertyBox();//初始化新盘信息框
	initCloseSecondHandBox();//初始化二房盘信息框
	$('.mr_px a').click(sortList);//列表排序事件
}
//初始化搜索框行为
function initSearchInput(){
	$('.input01').hover(//滑过事件
		function(){
				$(this).focus();
				$(this).select();
		},
		function(){
			if($(this).val()=='')
			{
				$(this).val('请输入地址、楼盘、小区名称');
				$(this).blur();
			}
		}
	);
	$('.input01').click(function(){//单击事件
		if($(this).val()=='请输入地址、楼盘、小区名称')
		{
			$(this).val('');
		}
	});
	$('.input01').keydown(function(e){//回车
		if(e.keyCode==13 && ($(this).val()!='请输入地址、楼盘、小区名称' && $(this).val()!='')){
		   alert('搜索..'); 
		}
	});
	$('#searchBnt').bind('click',function(){//搜索按钮点击事件
		if($('.input01').val()!='请输入地址、楼盘、小区名称' && $('.input01').val()!=''){
			   alert('搜索..'); 
		}
	});
}
function initClosePropertyBox(){
	$('.new_block_box .title .b a').click(function(){//关闭新盘框
		$('.new_block_box').hide();
	});
}
function initCloseSecondHandBox(){
	$('.secondHand_block_box .title .b a').click(function(){//关闭二手盘框
		$('.secondHand_block_box').hide();
	});
}
//窗口重置
function resizeWindow(){
	initPanleSize();
}
//初始化地图对象
function initMap(){
	objMap  = new BMap.Map("allMap");
	objMap.centerAndZoom(new BMap.Point(114.067943,22.656827), 12);
	objMap.addControl(new BMap.NavigationControl());  
	objMap.addControl(new BMap.ScaleControl()); 
	objMap.addControl(new BMap.OverviewMapControl());              //添加默认缩略地图控件
	objMap.addControl(new BMap.OverviewMapControl({isOpen:true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT}));   //右上角，打开
	objMap.enableScrollWheelZoom();
	initMapEvent();//地图事件
  
}
function initMapEvent(){//地图事件
	objMap.addEventListener("zoomend", function(e) {//缩放
			
			if(this.getZoom() > 12)
			{
				$('[type="sum"]').parent().remove();//超过12级，删除汇总
				
				//新盘页
				if(pageType == 'property')
				{
					getProperty();//获取并添加新盘
				}	
				//二手房或租房
				if(pageType == 'sell' || pageType == 'rent')
				{
					getSecondHand();//获取并添加二手房或租房
				}	
			}
			else{
				//小于等于12级，获取汇总
				if(pageType == 'property' && $('[type="sum"]').length == 0)
				{
					getPropertySum();
					
				}
				if(pageType == 'property'){
					clearProperty();
					getProperty();
				}
				
				if((pageType == 'sell' || pageType == 'rent') && $('[type="sum"]').length == 0)
				{
					getSecondHandSum();
				}
				if(pageType == 'sell' || pageType == 'rent')
				{
					clearSecondHand();//把二手房盘删除
					getSecondHand();
				}	
			}
		}); 
	objMap.addEventListener("dragend", function(e) {//拖动
		//新盘页
		if(pageType == 'property')
		{
			getProperty();//获取并添加新盘
		}
		if(pageType == 'sell' || pageType == 'rent')
		{
			getSecondHand();//获取并添加二手房
		}
	}); 
}
//右侧面板单击事件
function expanderEvent(){
	$('.expander a').click(expander);
	$('.expander a').focus(function(){
		$(this).blur();
	});
}
//初始化面板框架尺寸
function initPanleSize(){
	var height = $(window).height()-170;
	var width = $(window).width()-$('.pageboxRight').width()-1;

	$('.pageboxLeft').css({'width':width,'height':height});
	$('.pageboxRight').css({'height':height});
	$('.top_tip').css({'width':width});
	$('.map').css({'width':width,'height':height-30});
	$('.allMap').css({'width':width,'height':height-30});
	$('.expander').css({'padding-top':(height-80)/2});
	$('.mr_nr .list').css({'height':$('.pageboxRight').height()-160});
	
}
//右侧面板单击方法
function expander(){
	var pixelsw = objMap.pointToPixel(objMap.getCenter());
	var pointsw = null;
	if(isOpen)
	{
		$('.expander a').addClass('open');
		$('.expander a').removeClass('close');
		$('.pageboxRight').hide();
		$('.expander').css({'right':isIE6()?-1:0});
		$('.top_tip').css({'width':$(window).width()});
		$('.map').css({'width':$(window).width()});
		$('.allMap').css({'width':$(window).width()});
		pointsw = objMap.pixelToPoint(new BMap.Pixel(pixelsw.x - 170, pixelsw.y ));
		isOpen = false;
	}
	else{
		var width = $(window).width()-$('.pageboxRight').width()-1;
		$('.expander a').addClass('close');
		$('.expander a').removeClass('open');
		$('.expander').css({'right':isIE6()?339:340});
		$('.top_tip').css({'width':width});
		$('.map').css({'width':width});
		$('.allMap').css({'width':width});
		$('.pageboxRight').show();
		pointsw = objMap.pixelToPoint(new BMap.Pixel(pixelsw.x + 170, pixelsw.y ));
		isOpen = true;
	}
	objMap.panTo(new BMap.Point(pointsw.lng, pointsw.lat));
}
//快速定位
function initQuickLoc(){
	$('.quick_loc .b').hover(function(){
		$('.quick_loc .b .b1').addClass('b1_hover');
		$('.quick_loc .b .b2').addClass('b2_hover');
	},function(){
		$('.quick_loc .b .b1').removeClass('b1_hover');
		$('.quick_loc .b .b2').removeClass('b2_hover');
	});
	$('.quick_loc .c').hover(function(){
		$('.quick_loc .c .c1').addClass('b1_hover');
		$('.quick_loc .c .c2').addClass('b2_hover');
	},function(){
		$('.quick_loc .c .c1').removeClass('b1_hover');
		$('.quick_loc .c .c2').removeClass('b2_hover');
	});
}
//判断是否是ie6
function isIE6(){
	return $.browser.msie && ($.browser.version == "6.0") && !$.support.style ;
}
//转换成百度的点集合
function toBMapPoint(line){
	var t = new Array();
	for(var i=0;i<line.length;i++)
	{	
		t.push(new BMap.Point(line[i].lng,line[i].lat));
	}
	return t;
}
//初始化画地铁事件
function initDrawMetro(){
	$.each($('.quick_loc .c .c2 a'),function(i,el){
		$(el).click(function(){
			if($(this).attr('val') == 'none')
			{
				clearMapFinding();
				objMap.reset();
			}
			else
			{
				clearMapFinding();
				drawMetro(eval('metro.'+$(this).attr('val')));
			}
			$('.quick_loc .b .b1').html('选择地铁');
			$('.quick_loc .c .c1').html($(this).html());
			$('.quick_loc .c .c1').removeClass('b1_hover');
			$('.quick_loc .c .c2').removeClass('b2_hover');
		});
	});
}
//画地铁
function drawMetro(arrMetorPoint)
{
		var html = '';
		for(var i in arrMetorPoint) {
			 html = '<div class="mapfinding" type="speical"><table  border="0" cellspacing="0" cellpadding="0">'
				 + '<tr><td class="qul">&nbsp;</td><td class="qum" ><img src="../templates/images/web/icon005.gif" />&nbsp;<font color="#333333">'
				 + arrMetorPoint[i].name + '站</font></td><td class="qur" width="5">&nbsp;</td> </tr>' 
				 + '<tr><td class="sanjiao" colspan="3">&nbsp;</td></tr> </table></div>'; 
			var myOverlay = new DeOverlayC(new BMap.Point(arrMetorPoint[i].lng, arrMetorPoint[i].lat), html);
			objMap.addOverlay(myOverlay);	 
		}
		$('.mapfinding').parent().css('z-index', '50');
		objMap.setViewport(toBMapPoint(arrMetorPoint));
}
function clearMapFinding(){
	$('.mapfinding').parent().remove();
}
//初始化画区事件
function initDrawDistrict(){
	$.each($('.quick_loc .b .b2 a'),function(i,el){
		$(el).click(function(){
			if($(this).html() == '不限')//复位
			{
				clearMapFinding();
				objMap.reset();
			}
			else
			{
				clearMapFinding();
				var temp = null;
				for(var i=0;i<district.length;i++)
				{
					if(district[i].name==$(this).html())
					{
						temp = district[i];
						break;
					}	
				}
				drawDistrict(temp);
			}
			$('.quick_loc .c .c1').html('选择区域');
			$('.quick_loc .b .b1').html($(this).html());
			$('.quick_loc .b .b1').removeClass('b1_hover');
			$('.quick_loc .b .b2').removeClass('b2_hover');
		});
	});
}
//定位到区
function drawDistrict(point)
{
		var html = '';
			html = '<div class="mapfinding" type="speical"><table  border="0" cellspacing="0" cellpadding="0">'
				 + '<tr><td class="qul">&nbsp;</td><td class="qum" ><img src="../templates/images/web/icon004.gif" />&nbsp;<font color="#333333">'
				 + point.name + '区</font></td><td class="qur" width="5">&nbsp;</td> </tr>' 
				 + '<tr><td class="sanjiao" colspan="3">&nbsp;</td></tr> </table></div>'; 
			var myOverlay = new DeOverlayC(new BMap.Point(point.lng, point.lat), html);
			objMap.addOverlay(myOverlay);	 

		$('.mapfinding').parent().css('z-index', '50');
		objMap.centerAndZoom(new BMap.Point(point.lng, point.lat), 14);
}
//写汇总或楼盘
function drawObj(obj){
	var cls = '';
	if(obj.type=='sum' || obj.type=='sell' || obj.type=='rent' || obj.type=='sellingProperty')//如果是汇总或二手房，或租房，或在售新盘，用蓝色覆盖物,通用类usual
	{
		cls = 'usual';
	}
	else if(obj.type == 'newProperty')//新盘
	{
		cls = 'newProperty';
	}
	else if(obj.type == 'toSellProperty')//待售
	{
		cls = 'toSellProperty';
	}
	else if(obj.type == 'selledProperty')//售完
	{
		cls = 'selledProperty';
	}
	else if(obj.type == 'rentingProperty')//在租
	{
		cls = 'rentingProperty';
	}
	
	var attr = 'class="' + cls + '" type="' + obj.type + '" id="'+ obj.id + '"';
	var value = '<span class="value"> | ' + obj.value + '</span>';
	if(obj.type=='sum')//如果是汇总，增加区域下标属性
	{
		attr += ' lng="'+obj.lng+'" lat="' + obj.lat +'" ';
		value = '<span> | ' + obj.value + '</span>';
	}	
	html = '<div ' + attr + '><table  border="0" cellspacing="0" cellpadding="0">'
				 + '<tr><td class="qul">&nbsp;</td><td class="qum" >' + obj.name + value
				 + '</td><td class="qur" width="5">&nbsp;</td> </tr>' 
				 + '<tr><td class="sanjiao" colspan="3">&nbsp;</td></tr> </table></div>'; 
	var myOverlay = new DeOverlayC(new BMap.Point(obj.lng, obj.lat), html);
	objMap.addOverlay(myOverlay);
}
//区域转换成含id,经纬度，名称的对象
function translateDistrict(oldObj){
	var newObj = {
			id:0,
			type:'sum',
			name:'未知',
			value:'未知',
			lng:0,
			lat:0,
			provinceIndex:0,
			cityIndex:0,
			districtIndex:0
	};
	for(var i=0;i<district.length;i++)
	{
		if(D[oldObj.provinceIndex][oldObj.cityIndex][oldObj.districtIndex]==district[i].name)
		{
			newObj = {
					id:0,
					type:oldObj.type,
					name:district[i].name+'区',
					value:oldObj.value,
					lng:district[i].lng,
					lat:district[i].lat,
					provinceIndex:oldObj.provinceIndex,
					cityIndex:oldObj.cityIndex,
					districtIndex:oldObj.districtIndex
			};
			break;
		}	
	}	
	return newObj;
}
//初始化工具
function initTool(){
		//拉框
		$('#rectangleZoom').bind('click', function() {
			if ($('#rectangleZoom').html() == '拉框操作')
			{
				MyDrag = new BMapLib.RectangleZoom(objMap, {followText: "拖拽鼠标进行操作"});
				MyDrag.open();
				$('#rectangleZoom').html('清空拉框');
			} else {
				MyDrag.close();
				$('#rectangleZoom').html('拉框操作');
			}
		});
		//测距
		$('#distanceTool').bind('click', function() {
			MyDis = new BMapLib.DistanceTool(objMap);
			MyDis.open();
		});
		
		$('#close_drive_bnt,#close_around_bnt').click(function(){
			$('.tool_panel').hide();
			clearAround();
		});
		
		$("#driveLine").click(function(){
			$('.tool_panel').show();
			$("#drive").show();
			$("#drive_form").show();
			$('#drive_end').hide();
			$('#around_panel').hide(); 		
		 });
		$(".driveLine_link1").click(function(){
			$('#start').focus();
			$('#end').val($(this).parent().parent().find('.t_title:first').html());
			$('.tool_panel').show();
			$("#drive").show();
			$("#drive_form").show();
			$('#drive_end').hide();
			$('#around_panel').hide(); 		
		 });
		 $("#around,.around_link").click(function(){
			 $('.tool_panel').show();
			$("#drive").hide();
			$("#drive_form").hide();
			$('#drive_end').hide();
			$('#around_panel').show(); 
			clearAround();
		 });

		 //公交搜索
		 $('#drive_bnt').bind('click', function() {
			 var start = $('#start').val();
			 var end = $('#end').val();
			 if (start == '')
			 {
				 alert('请输入起始地点');
				 $('#start').focus();
				 return false;
			 }
			 if (end == '')
			 {
				 alert('请输入终点地点');
				 $('#end').focus();
				 return false;
			 }
			 displayCarLine(start, end);
		 });
		 
		 $(".othersearch").bind("click",function() {//周边配套搜索
			var strKeyWords = $(this).next().html();
			var strPic = $(this).attr('searchtype');
			if ($(this).attr('checked'))
			{
				//自定义搜索回调数据  
				myIcon[strPic] = [];
				var options = {
					selectFirstResult : true,
					autoViewport : true,
					onSearchComplete: function(results) {   
						var objMark = {};
						if (local.getStatus() == BMAP_STATUS_SUCCESS) {    
							for (var i = 0; i < results.getCurrentNumPois(); i++) {   
								objMark = results.getPoi(i);
								addMark(objMark, strPic);
							}
						}     
					}
				}; 
				var local = new BMap.LocalSearch(objMap, options); 
				//local.searchNearby(strKeyWords, new BMap.Point(Draw.config.lng, Draw.config.lat));
				local.searchNearby(strKeyWords, objMap.getCenter());
				//local.search(strKeyWords);
			} else {
				clearAroundOverlay(strPic);
			}
		});
}
	//清除所有周边标注,包括打勾控件
	function clearAround(){
		$(".othersearch").removeAttr('checked');
		var aroundIndexArr = ['bus','hotel','bank','supermarket','shop','school','hospital','furniture','decoration','gasstation'];
		for(var i=0;i<aroundIndexArr.length;i++)
		{
			if(myIcon[aroundIndexArr[i]])
			clearAroundOverlay(aroundIndexArr[i]);
		}
	}
	//清除地图上的某类周边标注
	function clearAroundOverlay(strPic){
		for(var i=0; i< myIcon[strPic].length; i++) {
					objMap.removeOverlay(myIcon[strPic][i]); 
		}
	}
	var transit = null;//全局路线
	function displayCarLine(strTxtStart, strTxtEnd)//用百度地图api描绘自驾路线
	{
		$('#start').val(strTxtStart);
		$('#end').val(strTxtEnd);
	    var searchComplete = function (results){
		if (transit.getStatus() != BMAP_STATUS_SUCCESS){
		  return ;
		} }
		if(!transit)//如果没有，则创建路线
		transit = new BMap.DrivingRoute(objMap, {
			renderOptions: {
							map: objMap,
							autoViewport: true,
							panel: "drive_end"
						},            
			onMarkersSet: function(pois){
				var start = pois[0].marker, end = pois[1].marker;
				start.enableDragging();
				end.enableDragging();
				start.addEventListener("dragend",function(e){                   
					//objMap.clearOverlays();
					transit.search(e.point,end.getPosition());                   
				});
				end.addEventListener("dragend",function(e){                    
					//objMap.clearOverlays();                      
					transit.search(start.getPosition(),e.point);                  
				});
			}
		});
		
		if(transit)//清除上一次查询路线
		transit.clearResults();
		
		transit.search(strTxtStart, strTxtEnd);
		$('#drive_end').show();
		$('#drive_form').hide();
	}
	//poi标注
	function addMark(poi, index)
	{
		var icon = new BMap.Icon('../templates/images/web/icon_' + index + '.gif', new BMap.Size(16, 16), {    
		   offset: new BMap.Size(-11, -31) 
		 });    
		 var marker = new BMap.Marker(poi.point, {icon: icon}); 
		 myIcon[index].push(marker);
		 objMap.addOverlay(marker);  
		 addInfoWindow(marker,poi);
	}
	//poi标注弹出窗口
	// 添加信息窗口
	function addInfoWindow(marker,poi){
		// infowindow的标题
		var infoWindowTitle = '<div style="margin-top:10px;font-weight:bold;color:#CE5521;font-size:14px">'+poi.title+'</div>';
		// infowindow的显示信息
		var infoWindowHtml = [];
		infoWindowHtml.push('<table cellspacing="0" style="table-layout:fixed;width:100%;font:12px arial,simsun,sans-serif"><tbody>');
		infoWindowHtml.push('<tr>');
		//infoWindowHtml.push('<td style="vertical-align:top;line-height:16px;width:38px;white-space:nowrap;word-break:keep-all">' + poi.name + '</td>');
		infoWindowHtml.push('<td style="vertical-align:top;line-height:16px">地址：' + poi.address + ' </td>');
		infoWindowHtml.push('</tr>');
		infoWindowHtml.push('</tbody></table>');
		var infoWindow = new BMap.InfoWindow(infoWindowHtml.join(""),{title:infoWindowTitle,width:200}); 
		marker.addEventListener("click", function(){
			this.openInfoWindow(infoWindow);
		});
	}
	//获取鼠标位置
	function getMousePosition(e){
		var x,y;
		if($.browser.msie){//ie
			x = e.originalEvent.x || e.originalEvent.layerX || 0; 
			y = e.originalEvent.y || e.originalEvent.layerY || 0; 
		}
		else{
			x=e.pageX;
			y=e.pageY;
		}
		return {x:x,y:y};
	}
	//重置新盘信息框
	function reSetNewBlockPosition(position){
		var wWidth = $(window).width();
		var wHeight = $(window).height();
		var cls = (pageType == 'property'?'.new_block_box':'.secondHand_block_box');
		var bWidth = $(cls).width();
		var bHeight = $(cls).height();
		var x = position.x;
		var y = position.y;
		if($.browser.msie){//ie
			y = y + bHeight/2-20;
		}
//		else{
//			y -= bHeight;
//		}	
		if((x+bWidth) > wWidth-10)
			x = x - bWidth - 20;
		else
			x += 20;
		
		if((y+bHeight) > wHeight)
			y = wHeight - bHeight - 20;
		else
			y -= 20;	
		
		return {x:x,y:y};	
	}