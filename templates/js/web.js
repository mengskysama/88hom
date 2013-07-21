/**
 * 
 */
// 头部导航切换
function switchNavigation(id) {
	$('#'+id).addClass("current");
}
function exeWebLogin(){
	var username=$.trim($('#username').val());
	var password=$.trim($('#password').val());
	var valideCode=$.trim($('#valideCode').val());
	if(null==username || username==''){
		alert('用户名不能为空！');
		$('#username').focus();
		return false;
	}
	if(null==password || password==''){
		alert('密码不能为空！');
		$('#password').focus();
		return false;
	}
	if(null==valideCode || valideCode==''){
		alert('请输入验证码！');
		$('#valideCode').focus();
		return false;
	}
	$('#username').val(username);
	$('#password').val(password);
	$('#valideCode').val(valideCode);
	$.ajax({
		type:'POST',
		async:false,
		cache:false,
		url:domain+'action.php?action=webLogin',
		data:'username='+username+'&password='+password+'&valideCode='+valideCode+'&timer='+(new Date().getTime()),
		dataType:'json',
		success:function (data){
			if(data!=''){
				var obj=eval(data);//返回json数组
				if(obj.result=='success'){
					location.reload();
				}else{
					alert(obj.msg);
				}
			}
		}
	});
}
function exeWebCheckLogin(){
	$.ajax({
		type:'POST',
		async:false,
		cache:false,
		url:domain+'action.php?action=webCheckLogin',
		dataType:'json',
		success:function (data){
			if(data!=''){
				var obj=eval(data);//返回json数组
				if(obj.result=='success'){
					location.href=domain+'bbs/index.htm';
				}else{
					$('#bnt').click();
				}
			}
		}
	});
}
function exeWebBbsRelease(){
	var title=$.trim($('#title').val());
	var content=editor.document.getBody().getText(); //取得纯文本
	if(null==title || title==''){
		alert('标题不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==content || content==''){
		alert('内容不能为空！');
		return false;
	}
	$('#title').val(title);
	$('#releaseForm').submit();
}
function exeWebBbsReply(){
	var content=editor.document.getBody().getText(); //取得纯文本
	if(null==content || content==''){
		alert('内容不能为空！');
		return false;
	}
	$('#replyForm').submit();
}
function exeWebSupportWorks(id){
	$.ajax({
		type:'GET',
		async:true,
		cache:false,
		url:domain+'join/action.php?action=clickCountWorks&id='+id,
		dataType:'json',
		success:function (data){
			if(data!=''){
				var obj=eval(data);//返回json数组
				$('#span_'+id).html(obj.click_count);
			}
		}
	});
}
function exeWebChangeTypeSearch(){
	var typeSearch=$.trim($('#typeSearch').val());
	if(typeSearch!=''){
		$.ajax({
			type:'GET',
			async:true,
			cache:false,
			url:domain+'shops/action.php?action=ajaxChangeTypeSearch&typeSearch='+typeSearch,
			dataType:'json',
			success:function (data){
				if(data!=null&&data!=''){
					var obj=eval(data);//返回json数组
					//alert(obj[0][2]);
					$('#food-list-moreshop1').empty();
					for(var i=0;i<obj.length;i++){
						$('#food-list-moreshop1').append('<li><a href="'+domain+'shops/d-'+obj[i].location+'.htm">'+obj[i].p_name+'</a></li>');
					}
				}else{
					$('#food-list-moreshop1').empty();
				}
			}
		});
	}
}
function exeWebShowSearch(type,id){
	if(type!=''&&id!=''){
		$.ajax({
			type:'GET',
			async:true,
			cache:false,
			url:domain+'shops/action.php?action=ajaxShowSearch&type='+type+'&id='+id,
			dataType:'json',
			success:function (data){
				if(data!=null&&data!=''){
					var obj=eval(data);//返回json数组
					$('#show_search').html('');
					var html='';
					for(var i=0;i<obj.length;i++){
						html+='<tr align="center">';
						html+='<td width="25%">'+obj[i].p_name+'</td>';
						html+='<td width="25%">'+obj[i].location+'</td>';
						html+='<td width="25%">'+obj[i].service_phone+'</td>';
						html+='<td width="25%">'+obj[i].type_name+'</td>';
						html+='</tr>';
					}
					alert(html);
					$('#show_search').html(html);
				}else{
					$('#show_search').html('');
				}
			}
		});
	}
}
function exeWebSearch(){
	$('#header_search').submit();
}
function exeWebChangeFriends(){
	var select=$('#select').val();
	if(select!=""){
		window.open(select);
	}
}
function exeWebPropertySearchDown(value){
	if(value=='搜索小区名、楼盘名、地址等'){
		$('#search').val('');
	}
}
function exeWebPropertySearchOut(value){
	if(value==''){
		$('#search').val('搜索小区名、楼盘名、地址等');
	}
}
function exeWebCommunitySearchDown(value){
	if(value=='搜索小区名、楼盘名、地址等'){
		$('#search').val('');
	}
}
function exeWebCommunitySearchOut(value){
	if(value==''){
		$('#search').val('搜索小区名、楼盘名、地址等');
	}
}
function exeWebHouseSellSearch(name,val){
	if($('#search').val()=='搜索小区名、楼盘名、地址等') 
		$('#search').val('');
	var search=$.trim($('#search').val());
	if(search!=''){
		$.base64.utf8encode = true;
		search=$.base64.btoa(search);
	}
	var t=$('#t').val();
	var p=$('#p').val();
	var c=$('#c').val();
	var d=$('#d').val();
	var a=$('#a').val();
	var pt=$('#pt').val();
	var rt=$('#rt').val();
	var at=$('#at').val();
	var bt=$('#bt').val();
	var st=$('#st').val();
	var bYear=$('#bYear').val();
	var forward=$('#forward').val();
	var floor=$('#floor').val();
	var fitment=$('#fitment').val();
	var orderPrice=$('#orderPrice').val();
	var orderArea=$('#orderArea').val();

	if(name=='d'){
		d=val;
	}else if(name=='pt'){
		pt=val;
	}else if(name=='rt'){
		rt=val;
	}else if(name=='at'){
		at=val;
	}else if(name=='bt'){
		bt=val;
	}else if(name=='st'){
		st=val;
	}else if(name=='bYear'){
		bYear=val;
	}else if(name=='forward'){
		forward=val;
	}else if(name=='floor'){
		floor=val;
	}else if(name=='fitment'){
		fitment=val;
	}else if(name=='orderPrice'){
		orderArea='';
		if(orderPrice==''){
			orderPrice=1;
		}else if(orderPrice==1){
			orderPrice=2;
		}else if(orderPrice==2){
			orderPrice=1;
		}
	}else if(name=='orderArea'){
		orderPrice='';
		if(orderArea==''){
			orderArea=1;
		}else if(orderArea==1){
			orderArea=2;
		}else if(orderArea==2){
			orderArea=1;
		}
	}
	//alert('sellSearch.php?t='+t+'&p='+p+'&c='+c+'&d='+d+'&a='+a+'&pt='+pt+'&rt='+rt+'&at='+at+'&bt='+bt+'&st='+st+'&bYear='+bYear+'&forward='+forward+'&floor='+floor+'&fitment='+fitment+'&orderPrice='+orderPrice+'&orderArea='+orderArea+'&search='+search);
	location.href='sellSearch.php?t='+t+'&p='+p+'&c='+c+'&d='+d+'&a='+a+'&pt='+pt+'&rt='+rt+'&at='+at+'&bt='+bt+'&st='+st+'&bYear='+bYear+'&forward='+forward+'&floor='+floor+'&fitment='+fitment+'&orderPrice='+orderPrice+'&orderArea='+orderArea+'&search='+search;
}
