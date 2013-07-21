<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->"/>
<meta name="keywords" content="<!--{$cfg.web_page.keyword}-->" />
<meta name="description" content="<!--{$cfg.web_page.description}-->" />
<title><!--{$cfg.web_page.title}--></title> 
<!--{$cssFiles}-->
<!--{$jsFiles}-->
<script type="text/javascript">
$(function() {
	function log( message ) {
		$( "<div>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
	}
	$( "#search" ).autocomplete({
		source: function( request, response ) {
//			$.ajax({
//				url: "http://ws.geonames.org/searchJSON",
//				dataType: "json",
//				data: {
//					featureClass: "P",
//					style: "full",
//					maxRows: 12,
//					name_startsWith: request.term
//				},
//				success: function( data ) {
//					response( $.map( data.geonames, function( item ) {
//						return {
//							label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
//							value: item.name
//						}
//					}));
//				}
//			});
			$.ajax({
				type:'GET',
				async:true,
				cache:false,
				url:domain+'action.php?action.php',
				dataType:'json',
				data:{
					action:'searchForCommunity',
					search:request.term
				},
				success:function (data){
					//alert(data);
					var obj=eval(data);//返回json数组
//					alert(obj);
//					alert(obj['search']);
//					alert(obj[0]['attrs']['communityname']);
//					return false;
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
			log( ui.item ?
				"Selected: " + ui.item.label :
				"Nothing selected, input was " + this.value);
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
});
</script>
<style>
.ui-autocomplete-loading {
	background: white url('<!--{$cfg.web_images}-->common/ui-anim_basic_16x16.gif') right center no-repeat;
}
.ui-autocomplete {
	max-height: 200px;
	overflow-y: auto;
	/* prevent horizontal scrollbar */
	overflow-x: hidden;
}
/* IE 6 doesn't support max-height
 * we use height instead, but this forces the menu to always be this tall
 */
* html .ui-autocomplete {
	height: 200px;
}
</style>
</head>
<body>
<div class="ui-widget">
	<label for="search">小区: </label>
	<input id="search"/>
</div>
<div class="ui-widget" style="margin-top:2em; font-family:Arial">
	Result:
	<div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
</div>
</body>
</html>