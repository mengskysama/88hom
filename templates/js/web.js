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
function exeWebCheersbuddysRelease(){
	var reg=new RegExps();
	var name=$.trim($('#name').val());
	var tel=$.trim($('#tel').val());
	var address=$.trim($('#address').val());
	var pCount=$.trim($('#pCount').val());
	if(null==name || name==''){
		alert('姓名不能为空！');
		$('#name').focus();
		return false;
	}
	if(null==tel || tel==''){
		alert('电话不能为空！');
		$('#tel').focus();
		return false;
	}
	if(null==address || address==''){
		alert('地址不能为空！');
		$('#address').focus();
		return false;
	}
	if(null==pCount || pCount==''){
		alert('数量不能为空！');
		$('#pCount').focus();
		return false;
	}else if(!reg.isInt.exec(pCount)){
		alert('请填写整数数量！');
		$('#pCount').focus();
		return false;
	}
	$('#name').val(name);
	$('#tel').val(tel);
	$('#address').val(address);
	$('#pCount').val(pCount);
	$('#releaseForm').submit();
}
function exeWebMessageRelease(){
	var reg=new RegExps();
	var name=$.trim($('#name').val());
	var post=$.trim($('#post').val());
	var companyName=$.trim($('#companyName').val());
	var tel=$.trim($('#tel').val());
	var email=$.trim($('#email').val());
	var address=$.trim($('#address').val());
	var companyAddress=$.trim($('#companyAddress').val());
	if(null==name || name==''){
		alert('姓名不能为空！');
		$('#name').focus();
		return false;
	}
//	if(null==post || post==''){
//		alert('职位不能为空！');
//		$('#post').focus();
//		return false;
//	}
	if(null==companyName || companyName==''){
		alert('公司名称不能为空！');
		$('#companyName').focus();
		return false;
	}
	if(null==tel || tel==''){
		alert('电话不能为空！');
		$('#tel').focus();
		return false;
	}
//	if(null==email || email==''){
//		alert('E-mail不能为空！');
//		$('#email').focus();
//		return false;
//	}
//	if(null==address || address==''){
//		alert('地址不能为空！');
//		$('#address').focus();
//		return false;
//	}

	$('#name').val(name);
	$('#post').val(post);
	$('#companyName').val(companyName);
	$('#tel').val(tel);
	$('#email').val(email);
	$('#address').val(address);

	return true;
}
function exeWebMediaLogin(){
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
	$('#mediaLoginForm').submit();
}