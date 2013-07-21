//首页js效果
function index_init(){
	//新房，二手房/租房,家居式样切换
	$('.wrap_header .info .a1 a').click(function(){
		$(this).parent().find('a').removeClass('current');
		$(this).addClass('current');
		$(this).blur();
	});
	//搜索框效果
	$('#keyWords').hover(function(){
		$(this).select();
	},function(){
		$(this).blur();
	});
	$('#keyWords').blur(function(){
		if($(this).val()=='')
		$(this).val('搜索小区名、中介、经纪人、网店等');
	});
	$('#keyWords').click(function(){
		if($(this).val()=='搜索小区名、中介、经纪人、网店等')
		$(this).val('');
	});
	//新房推荐滚动效果
	$('.wrap_house').cycle({
		fx:     'scrollHorz',//'scrollRight',
		//fx:	'turnDown',
		speed:  'slow',
		timeout: 5000,
		pause:1,
		pauseOnPagerHover:1,
		pager:'#nav'
	});
	
	//新房品牌馆滚动效果
	$('.branch_list ul').cycle({
		fx:     'scrollHorz',//'scrollRight',
		//fx:	'turnDown',
		speed:  'slow',
		timeout: 5000,
		pause:1,
		pauseOnPagerHover:1,
		prev:'#prev',
		next:'#next'
	});
	//楼市要闻，专家观点切换
	$('.info .tab span').hover(function(){
		$(this).parent().find('span').removeClass('current');
		$(this).addClass('current');
		$('.info .tab_content span').removeClass('current');
		$('.info .tab_content span').eq($(this).index()).addClass('current');
	},function(){
		
	});
	//热卖楼盘切换
	$('.hot_house .nav1 label').hover(function(){
		$(this).parent().find('label').removeClass('current');
		$(this).addClass('current');
		$('.hot_house .hot_house_list').removeClass('current');
		$('.hot_house .hot_house_list').eq($(this).index()).addClass('current');
	},function(){
		
	});	
	//人气排行切换
	$('.hot_sort .nav label').hover(function(){
		$(this).parent().find('label').removeClass('current');
		$(this).addClass('current');
		$('.hot_sort .wrap_sort_list .sort_list').removeClass('current');
		$('.hot_sort .wrap_sort_list .sort_list').eq($(this).index()).addClass('current');
	},function(){
		
	});
	//房价趋势图切换
	$('.data_chart .nav label').hover(function(){
		$(this).parent().find('label').removeClass('current');
		$(this).addClass('current');
		$('.data_chart .chart').removeClass('current');
		$('.data_chart .chart').eq($(this).index()).addClass('current');
	},function(){
		
	});
	//访谈切换
	$('.forum_panel .right .nav span').hover(function(){
		$(this).parent().find('span').removeClass('current');
		$(this).addClass('current');
		$('.forum_panel .right .list').removeClass('current');
		$('.forum_panel .right .list').eq($(this).index()).addClass('current');
	},function(){
		
	});
	//样板间切换
	$('.sample_room .right .nav label').hover(function(){
		$(this).parent().find('label').removeClass('current');
		$(this).addClass('current');
		$('.sample_room .right .list').removeClass('current');
		$('.sample_room .right .list').eq($(this).index()).addClass('current');
	},function(){
		
	});
}
//家居首页js效果
function furniture_index_init(){
	$('.hdcx_nr:first').show();//显示第一个活动页
	//促销活动切换
	$('.hdcx_tit li').hover(function(){
		$(this).parent().find('li').removeClass('over');
		$(this).addClass('over');
		$('.hdcx_nr').hide();
		$('.hdcx_nr').eq($(this).index()).show();
	},function(){
		
	});
}
//资讯首页js效果
function info_index_init(){
	$('.bdyw div').eq(1).hide();//隐藏本地要闻
	//本地要闻,国内要闻切换
	$('.bdyw .szkp_tit .titbg').hover(function(){
		$(this).parent().find('.titbg').removeClass('sel1');
		$(this).addClass('sel1');
		$('.bdyw div').hide();
		$('.bdyw div').eq($(this).index()).show();
	},function(){
		
	});
	

	$('.zzjy .zzjy_nr').eq(1).hide();//隐藏土地交易情报
	//住宅交易情报,土地交易情报切换
	$('.zzjy .szkp_tit .titbg').hover(function(){
		$(this).parent().find('.titbg').removeClass('sel1');
		$(this).addClass('sel1');
		$('.zzjy .zzjy_nr').hide();
		$('.zzjy .zzjy_nr').eq($(this).index()).show();
	},function(){
		
	});
	
}
//资讯列表js效果
function info_list_init(){
	
}
//资讯详细
function info_detail_init(){
	$('#verifyCodeImg,#verifyCodeLink').click(function(){//切换验证码
		$('#verifyCodeImg').attr('src',$('#verifyCodeImg').attr('src')+'?&time='+Math.random());
	});
	
	$('#commentBnt').click(function(){//提交
		if($('#commnet').val()=='')
		{
			alert('评论内容不能为空！');
			$('#commnet').focus();
			return;
		}
		if($('#verifyCode').val()=='')
		{
			alert('请输入验证码！');
			$('#verifyCode').focus();
			return;
		}
		$.ajax({//验证是否已登陆
			url:'info_detail.php',
			data:{
				action:'isLogin'
			},
			dataType:'json',
			success:function(result){
				if(result.msg)
				{
					$.ajax({//验证码是否正确
						url:'info_detail.php',
						data:{
							action:'isVerifyCode',
							verifyCode:$('#verifyCode').val()
						},
						dataType:'json',
						success:function(result){
							if(result.msg)
							{
								$('form:first').submit();
							}	
							else{
								alert('亲，你的验证码不正确哦！');
								$('#verifyCode').focus();
							}
						},
						error:function()
						{
							alert('请求失败！');
						}
					});
				}	
				else{
					alert('亲，你还没登陆，登陆后才能评论！');
					location.href='../ucenter';
				}
			},
			error:function()
			{
				alert('请求失败！');
			}
		});
	});
}