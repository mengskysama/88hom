function initPage(){
	//初始化菜单
	initMenu();
	//左右页面框架同高
	setTimeout(function(){
		$('.left .menu').css({height:($('.right').height()-95)+'px'});
	},2000);
	//底部沉底
//	if($(window).height()>$('.layer_content:first').height())
//	$('.foot_wrap:first').css({
//		"margin-top":($(window).height()-$('.layer_content:first').height()+20)+"px"
//	});
	/*友情链接打开*/
	$('#friendliks').change(function(){
		if($(this).val() != '')
		window.open($(this).val());
	});
}
var menu_current_css = [
	'm_index_current',
	'm_about_current',
	'm_core_current',
	'm_project_current',
	'm_news_current',
	'm_service_current',
	'm_jobs_current',
	'm_contact_current'
	];
//初始化菜单
function initMenu(){
	$('.menu').hover(function(){
		$('.sub_menu:first').stop(true).animate({ width: "260" }, 500).animate({ width: "260px" }, 500);//子菜单展开
	},
	function(){
		$('.sub_menu:first').stop(true).animate({ width: "0" }, 0).animate({ width: "0px" }, 0);//子菜单闭合
	});
	$('.menu ul:first li').hover(function(){
		$('.sub_menu:first li').eq($(this).index()).addClass('inner_current');//添加当前子菜单对应的主菜单的式样
	},function(){
		$('.sub_menu:first li').eq($(this).index()).removeClass('inner_current');//删除当前子菜单对应的主菜单的式样
	});
	//当前主菜单元素
	var current = $('.current:first');
	//当前子菜单式样
	$('.sub_menu li').hover(function(){
		$(this).addClass('inner_current');
		$($('.menu ul:first li a').eq($(this).index())).addClass(menu_current_css[$(this).index()]);
	},function(){
		$(this).removeClass('inner_current');
		if($(current).attr('class').split(' ')[1] != menu_current_css[$(this).index()])
		$($('.menu ul:first li a').eq($(this).index())).removeClass(menu_current_css[$(this).index()]);
	});
	//当前子菜单链接式样
	$('.sub_menu li a').hover(function(){
		$(this).addClass('hover');
	},function(){
		$(this).removeClass('hover');
	});	
}