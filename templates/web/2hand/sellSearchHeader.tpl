<style>
.ui-autocomplete-loading {
	background: white url('<!--{$cfg.web_images}-->common/ui-anim_basic_16x16.gif') right center no-repeat;
}
.ui-autocomplete {
	max-height: 200px;
	max-width:400px;
	overflow-y: auto;
	/* prevent horizontal scrollbar */
	overflow-x: hidden;
}
/* IE 6 doesn't support max-height
 * we use height instead, but this forces the menu to always be this tall
 */
* html .ui-autocomplete {
	width:400px;
	height: 200px;
}
</style>
<script type="text/javascript">
$(function() {
	function search( search ) {
		$.base64.utf8encode = true;
		search=$.base64.btoa(search);
		var p=$('#p').val();
		var c=$('#c').val();
		var d=$('#d').val();
		var a=$('#a').val();
		var rt=$('#rt').val();
		var bt=$('#bt').val();
		var st=$('#st').val();
		var bYear=$('#bYear').val();
		var forward=$('#forward').val();
		var floor=$('#floor').val();
		var fitment=$('#fitment').val();
		var at=$('#searchArea').val();
		var t=$('#searchBuildType').val();
		var pt=$('#searchPrice').val();
		
		location.href='sellSearch.php?t='+t+'&p='+p+'&c='+c+'&d='+d+'&a='+a+'&pt='+pt+'&rt='+rt+'&at='+at+'&bt='+bt+'&st='+st+'&bYear='+bYear+'&forward='+forward+'&floor='+floor+'&fitment='+fitment+'&search='+search;
	}
	$( "#search" ).autocomplete({
		source: function( request, response ) {
			$.ajax({
				type:'GET',
				async:true,
				cache:false,
				url:domain+'community/action.php?action.php',
				dataType:'json',
				data:{
					action:'searchForCommunityAutoComplete',
					search:request.term
				},
				success:function (data){
					var obj=eval(data);//返回json数组
					if(obj.length==undefined){
						response();	
					}else{
						response( $.map( obj, function( item ) {
							return {
								label: item.communityName,
								value: item.communityName
							}
						}));	
					}
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			search( ui.item ? ui.item.label : this.value);
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
});
function doSearch(){
	if($('#search').val()=='搜索小区名、楼盘名、地址等') 
		$('#search').val('');
	var search=$.trim($('#search').val());
	if(search!=''){
		$.base64.utf8encode = true;
		search=$.base64.btoa(search);
	}
	var p=$('#p').val();
	var c=$('#c').val();
	var d=$('#d').val();
	var a=$('#a').val();
	var rt=$('#rt').val();
	var bt=$('#bt').val();
	var bYear=$('#bYear').val();
	var forward=$('#forward').val();
	var floor=$('#floor').val();
	var fitment=$('#fitment').val();
	var at=$('#searchArea').val();
	var t=$('#searchBuildType').val();
	var pt=$('#searchPrice').val();
	
	//alert('search_'+searchArea+'_'+searchBuildType+'_'+searchPrice+'_'+search);
	location.href='sellSearch.php?t='+t+'&p='+p+'&c='+c+'&d='+d+'&a='+a+'&pt='+pt+'&rt='+rt+'&at='+at+'&bt='+bt+'&bYear='+bYear+'&forward='+forward+'&floor='+floor+'&fitment='+fitment+'&search='+search;
}
</script>
<!--主体头部面板-->
	<div class="layer_content_1">
		<div class="wrap_header">
			<div class="logo">
				<div class="a">
					<a href="index.html"><img src="<!--{$cfg.web_images}-->web/logo1.png"></a>
				</div>
				<div class="b">
					<a class="l" href="#">新房</a> <a href="#">[资讯]</a> <a href="#">[团购]</a><br/>
					<a class="l" href="#">家居</a> <a href="#">[装修]</a> <a href="#">[装饰]</a><br/>
					<a class="l" href="#">社区</a>
				</div>
			</div>
			<div class="info">
				<div class="a">
					<div class="a1">
						<a href="javascript:void(0);">新房</a><a class="current" href="javascript:void(0);">二手房</a><a href="javascript:void(0);">租房</a><a href="javascript:void(0);">家居</a>
					</div>
					<div class="a2">
						<div class="a21">
							<div class="a211">
								<a class="current" href="#">广告投放</a> | <a href="#">二手房</a> | <a href="#">家居</a> | <a href="#">社区</a>
								<!--返回顶部锚链-->
								<a name="top"></a>
							</div>
							<div class="a212">
								<a href="#">登陆</a>/<a href="#">注册</a>
							</div>
						</div>
					</div>
				</div>
				<div class="b">
					<div class="b1">
						<span class="b11"><input type="text" id="search" name="search" value="<!--{$search}-->" onmousedown="exeWebCommunitySearchDown(this.value);" onblur="exeWebCommunitySearchOut(this.value);"/></span>
						<span class="b12"><a href="javascript:void(0);" title="" onclick="doSearch();">搜 索</a></span>
					</div>
					<div class="b2">
						<select id="searchArea" name="searchArea">
							<!--{html_options options=$searchAreaNav selected=$searchModel.d}-->
						</select>
						<select id="searchBuildType" name="searchBuildType">
							<!--{html_options options=$searchBuildType selected=$t}-->
						</select>
						<select id="searchPrice" name="searchPrice">
							<!--{html_options options=$searchPrice selected=$pt}-->
						</select>
						<span class="b21">
							<a href="#">[地图找房]</a>
						</span>
						<span class="b22">
							<a href="#">[地铁找房]</a>
						</span>
					</div>
				</div>
				<div class="c">
					<div class="c1">
						<a href="#">今日头条</a>
						<a href="#">楼市要闻</a><br/>
						<a href="#">政策解读</a>
						<a href="#">行情数据</a>
					</div>
					<div class="s"></div>
					<div class="c5">
						<a href="#">出售房源</a>
						<a href="#">特价二手房</a><br/>
						<a href="#">出租房源</a>
						<a href="#">房不剩房王营</a>
					</div>
					<div class="s"></div>
					<div class="c3">
						<a href="#">设计修饰</a>
						<a href="#">促销团购</a><br/>
						<a href="#">家具卖场</a>
						<a href="#">装修指南</a>
					</div>
					<div class="s"></div>
					<div class="c4">
						<a href="#">业主论坛</a>
						<a href="#">论坛热贴</a><br/>
						<a href="#">人气板块</a>
					</div>
				</div>
			</div>
		</div>
	</div>