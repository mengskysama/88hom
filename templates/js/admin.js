/**
 * 后台管理专用js文件
 */

function exeAdminLogin(){
	var result='error';
	var username=$.trim($('#username').val());
	var password=$.trim($('#password').val());
	var vadideCode=$.trim($('#vadideCode').val());

	if(null==username||username==''){
		alert('用户名不能为空！');
		$('#username').focus();
		return false;
	}else if(null==password||password==''){
		alert('密码不能为空！');
		$('#password').focus();
		return false;
	}else if(null==vadideCode||vadideCode==''){
		alert('验证码不能为空！');
		$('#vadideCode').focus();
		return false;
	}
	$('#username').val(username);
	$('#password').val(password);
	$('#vadideCode').val(vadideCode);
	$.ajax({
		type:'POST',
		async:false,
		cache:false,
		url:domain+'admin/login.php',
		data:'username='+username+'&password='+password+'&vadideCode='+vadideCode+'&timer='+(new Date().getTime()),
		dataType:'json',
		success:function (data){
			var obj=eval(data);//返回json数组
			if(obj.result=='error'&&obj.error==1){
				alert(obj.msg);
				$('#username').select();
				$('#vadideCode').val('');
				$('#codeImg').attr('src',domain+'common/libs/api/codeadmin.php?timer='+(new Date().getTime()));
			}else if(obj.result=='error'&&obj.error==2){
				alert(obj.msg);
				$('#vadideCode').val('').focus();
				$('#codeImg').attr('src',domain+'common/libs/api/codeadmin.php?timer='+(new Date().getTime()));
			}else{
				result='success';
			}
		}
	});
	if(result=='error'){
		return false;
	}else{
		return true;
	}
}
//发布产品信息
function exeAdminProductRelease(){
	var reg=new RegExps();
	var pName=$.trim($('#title').val());
	var keyword=$.trim($('#keyword').val());
	var typeId=$.trim($('#typeId').val());
//	var mPrice=$.trim($('#mPrice').val());
//	var price=$.trim($('#price').val());
//	var floor=$.trim($('#floor').val());
//	var location=$.trim($('#location').val());
//	var openTime=$.trim($('#openTime').val());
//	var servicePhone=$.trim($('#servicePhone').val());
//	var website=$.trim($('#website').val());
	if(null==pName || pName==''){
		alert('产品名称不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==typeId || typeId==''){
		alert('请选择类别！');
		return false;
	}
//	if(null==floor || floor==''){
//		alert('请选择楼层！');
//		return false;
//	}
//	if(null!=mPrice&&mPrice!=''){
//		if(!reg.isMoney.exec(mPrice)){
//			alert('市场价格请输入数字！');
//			$('#mPrice').select();
//			return false;
//		}
//	}
//	if(null!=price&&price!=''){
//		if(!reg.isMoney.exec(price)){
//			alert('会员价格请输入数字！');
//			$('#price').select();
//			return false;
//		}
//	}
	$('#title').val(pName);
	$('#keyword').val(keyword);
//	$('#location').val(location);
//	$('#openTime').val(openTime);
//	$('#servicePhone').val(servicePhone);
//	$('#website').val(website);

	return true;
	
}
//修改产品信息
function exeAdminProductModify(){
	var reg=new RegExps();
	var pName=$.trim($('#title').val());
	var keyword=$.trim($('#keyword').val());
	var typeId=$.trim($('#typeId').val());
//	var location=$.trim($('#location').val());
//	var openTime=$.trim($('#openTime').val());
//	var servicePhone=$.trim($('#servicePhone').val());
//	var website=$.trim($('#website').val());
	if(null==pName || pName==''){
		alert('产品名称不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==typeId || typeId==''){
		alert('请选择类别！');
		return false;
	}
//	if(null==floor || floor==''){
//		alert('请选择楼层！');
//		return false;
//	}
	
	$('#title').val(pName);
	$('#keyword').val(keyword);
//	$('#openTime').val(openTime);
//	$('#servicePhone').val(servicePhone);
//	$('#website').val(website);

	return true;
}
//发布产品类别
function exeAdminProductTypeRelease(){
	var typeName=$.trim($('#typeName').val());
	if(null==typeName || typeName==''){
		alert('产品类别不能为空！');
		return false;
	}
	$('#typeName').val(typeName);
	return true;
}
function exeAdminProductTypeSearchRelease(){
	var typeSearchName=$.trim($('#typeSearchName').val());
	if(null==typeSearchName || typeSearchName==''){
		alert('搜索类别名称不能为空！');
		$('#typeSearchName').focus();
		return false;
	}
	$('#typeSearchName').val(typeSearchName);
	return true;
}
function exeAdminChangeProductType(){
	var typeId=$.trim($('#typeId').val());
	if(typeId!=''){
		$.ajax({
			type:'GET',
			async:true,
			cache:false,
			url:'action.php?action=ajaxChangeProductType&typeId='+typeId,
			dataType:'json',
			success:function (data){
				if(data!=null&&data!=''){
					var obj=eval(data);//返回json数组
					//alert(obj[0][2]);
					$('#typeId').empty();
					$('#typeId').append('<option value="">请选择产品类别</option>');
					for(var i=0;i<obj.length;i++){
						$('#typeId').append('<option value="'+obj[i].id+'">'+obj[i].type_name+'</option>');
					}
					$('#span_typeId').show();
					$('#a_typeId').attr('href','javascript:exeAdminBackProductType('+typeId+');');
				}
			}
		});
	}
}
function exeAdminBackProductType(typeId){
	if(typeId!=''){
		$.ajax({
			type:'GET',
			async:true,
			cache:false,
			url:'action.php?action=ajaxBackProductType&typeId='+typeId,
			dataType:'json',
			success:function (data){
				if(data!=null&&data!=''){
					var obj=eval(data);//返回json数组
					//alert(obj[0][2]);
					$('#typeId').empty();
					$('#typeId').append('<option value="">请选择产品类别</option>');
					for(var i=0;i<obj.length;i++){
						$('#typeId').append('<option value="'+obj[i].id+'">'+obj[i].type_name+'</option>');
					}
					if(obj[0].type_father_id==0){
						$('#span_typeId').hide();
					}else{
						$('#span_typeId').show();
						$('#a_typeId').attr('href','javascript:exeAdminBackProductType('+obj[0].type_father_id+');');
					}
				}
			}
		});
	}
}
//发布产品属性
function exeAdminProductPropertyRelease(){
	var reg=new RegExps();
	var property=$.trim($('#property').val());
	var en=$.trim($('#en').val());
	if(null==property||property==''){
		alert('产品属性名称不能为空！');
		return false;
	}else if(null==en||en==''){
		alert('产品属性英文简写不能为空！');
		return false;
	}else if(!reg.isEnglish.exec(en)){
		alert('产品属性英文简写必须为英文！');
		return false;
	}
	$('#property').val(property);
	$('#en').val(en);
	$('#releaseForm').submit();
}
//
function exeAdminDelMessage(url) {
	var msg = confirm('信息删除，不能恢复，请确认!');
	if (msg) {
		window.location.href = url;
	}
}
//============================================信息管理============================================
//发布信息
function exeAdminInfoRelease(){
	var title=$.trim($('#title').val());
	var typeId=$.trim($('#typeId').val());
	if(null==title || title==''){
		alert('标题不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==typeId || typeId==''){
		alert('请选择类别！');
		return false;
	}
	$('#title').val(title);
	return true;
}
function exeAdminMediaRelease(){
	var title=$.trim($('#title').val());
	var path=$.trim($('#file_path').val());
	if(null==title || title==''){
		alert('标题不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==path || path==''){
		alert('请上传文件！');
		return false;
	}
	$('#title').val(title);
	return true;
}
function exeAdminCpsRelease(){
	var title=$.trim($('#title').val());
	var pic_path=$.trim($('#pic_path').val());
	var file_path=$.trim($('#file_path').val());
	if(null==title || title==''){
		alert('标题不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==pic_path || pic_path==''){
		alert('请上传外观图！');
		return false;
	}
	if(null==file_path || file_path==''){
		alert('请上传文件！');
		return false;
	}
	$('#title').val(title);
	return true;
}
function exeAdminNewsRelease(){
	var title=$.trim($('#title').val());
	var content=editor.document.getBody().getText(); //取得Text内容
	var time=$.trim($('#time').val());
	if(null==title || title==''){
		alert('标题不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==content || content==''){
		alert('内容不能为空！');
		return false;
	}
	if(null==time || time==''){
		alert('发布时间不能为空！');
		return false;
	}
	$('#title').val(title);
	$('#time').val(time);
	return true;
}
//修改信息
function exeAdminInfoModify(){
	var title=$.trim($('#title').val());
	var typeId=$.trim($('#typeId').val());
	if(null==title || title==''){
		alert('标题不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==typeId || typeId==''){
		alert('请选择类别！');
		return false;
	}
	$('#title').val(title);
	return true;
}
function exeAdminMediaModify(){
	var title=$.trim($('#title').val());
	var path=$.trim($('#file_path').val());
	if(null==title || title==''){
		alert('标题不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==path || path==''){
		alert('请上传文件！');
		return false;
	}
	$('#title').val(title);
	return true;
}
function exeAdminCpsModify(){
	var title=$.trim($('#title').val());
	var pic_path=$.trim($('#pic_path').val());
	var file_path=$.trim($('#file_path').val());
	if(null==title || title==''){
		alert('标题不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==pic_path || pic_path==''){
		alert('请上传外观图！');
		return false;
	}
	if(null==file_path || file_path==''){
		alert('请上传文件！');
		return false;
	}
	$('#title').val(title);
	return true;
}
function exeAdminNewsModify(){
	var title=$.trim($('#title').val());
	var content=editor.document.getBody().getText(); //取得Text内容
	var time=$.trim($('#time').val());
	if(null==title || title==''){
		alert('标题不能为空！');
		$('#title').focus();
		return false;
	}
	if(null==content || content==''){
		alert('内容不能为空！');
		return false;
	}
	if(null==time || time==''){
		alert('发布时间不能为空！');
		return false;
	}
	$('#title').val(title);
	$('#time').val(time);
	return true;
}
//发布信息类别
function exeAdminInfoTypeRelease(){
	var typeName=$.trim($('#typeName').val());
	if(null==typeName || typeName==''){
		alert('信息类别不能为空！');
		$('#typeName').focus();
		return false;
	}
	$('#typeName').val(typeName);
	$('#releaseForm').submit();
}
function exeAdminChangeInfoType(){
	var typeId=$.trim($('#typeId').val());
	if(typeId!=''){
		$.ajax({
			type:'GET',
			async:true,
			cache:false,
			url:'action.php?action=ajaxChangeInfoType&typeId='+typeId,
			dataType:'json',
			success:function (data){
				if(data!=null&&data!=''){
					var obj=eval(data);//返回json数组
					//alert('fuck');
					//alert(obj[0].first);
					//alert(obj[1][0].type_name);
					$('#typeId').empty();
					if(obj[0].first=='yes'){
						$('#typeId').append('<option value="">请选择信息类别</option>');
					}
					for(var i=0;i<obj[1].length;i++){
						$('#typeId').append('<option value="'+obj[1][i].id+'">'+obj[1][i].type_name+'</option>');
					}
					$('#span_typeId').show();
					$('#a_typeId').attr('href','javascript:exeAdminBackInfoType('+typeId+');');
				}
			}
		});
	}
}
function exeAdminBackInfoType(typeId){
	if(typeId!=''){
		$.ajax({
			type:'GET',
			async:true,
			cache:false,
			url:'action.php?action=ajaxBackInfoType&typeId='+typeId,
			dataType:'json',
			success:function (data){
				if(data!=null&&data!=''){
					var obj=eval(data);//返回json数组
					//alert(obj[0][2]);
					$('#typeId').empty();
					$('#typeId').append('<option value="">请选择信息类别</option>');
					for(var i=0;i<obj.length;i++){
						$('#typeId').append('<option value="'+obj[i].id+'">'+obj[i].type_name+'</option>');
					}
					if(obj[0].type_father_id==0){
						$('#span_typeId').hide();
					}else{
						$('#span_typeId').show();
						$('#a_typeId').attr('href','javascript:exeAdminBackInfoType('+obj[0].type_father_id+');');
					}
				}
			}
		});
	}
}
//============================================友情链接管理============================================
//发布友情链接
function exeAdminLinkRelease(){
	var name=$.trim($('#name').val());
	var url=$.trim($('#url').val());
	if(null==name || name==''){
		alert('友情链接名称不能为空！');
		$('#name').focus();
		return false;
	}else if(null==url || url==''){
		alert('友情链接URL不能为空！');
		$('#url').focus();
		return false;
	}
	var temp=url.substr(0,7);
	if(temp!='http://'){
		url='http://'+url;
	}
	$('#name').val(name);
	$('#url').val(url);
	$('#releaseForm').submit();
}
//============================================系统组别管理============================================
//发布系统组别
function exeAdminGroupRelease(){
	var groupName=$.trim($('#groupName').val());
	if(null==groupName || groupName==''){
		alert('组名不能为空！');
		$('#groupName').focus();
		return false;
	}
	$('#groupName').val(groupName);
	$('#releaseForm').submit();
}
//系统组别权限发布
function exeAdminSystemUserRelease(){
	var reg=new RegExps();
	var username=$.trim($('#username').val());
	var pwd=$.trim($('#pwd').val());
	var password=$.trim($('#password').val());
	var email=$.trim($('#email').val());
	var groupId=$.trim($('#groupId').val());
	if(null==username || username==''){
		alert('用户名不能为空！');
		$('#username').focus();
		return false;
	}else if(null==pwd || pwd==''){
		alert('密码不能为空！');
		$('#pwd').focus();
		return false;
	}else if(null==password ||  password==''){
		alert('确认密码不能为空！');
		$('#password').focus();
		return false;
	}else if(pwd!=password){
		alert('两次密码不一致！');
		$('#password').select();
		return false;
	}else if(null==email || email==''){
		alert('邮箱不能为空！');
		$('#email').focus();
		return false;
	}else if(!reg.isEmail.exec(email)){
		alert('邮箱格式不正确！');
		$('#email').focus();
		return false;
	}else if(null==groupId || groupId==''){
		alert('请给予分配权限组！');
		return false;
	}
	$('#username').val(username);
	$('#pwd').val(pwd);
	$('#password').val(password);
	$('#email').val(email);
	$('#username').val(username);
	$('#pwd').val(pwd);
	$('#releaseForm').submit();
}
//系统用户修改密码
function exeAdminSystemUserPwd(){
	var pwdOld=$.trim($('#pwdOld').val());
	var pwdNew=$.trim($('#pwdNew').val());
	var pwdNewTwo=$.trim($('#pwdNewTwo').val());
	if(null==pwdOld || pwdOld==''){
		alert('请填写旧密码！');
		$('#pwdOld').focus();
		return false;
	}else if(null==pwdNew || pwdNew==''){
		alert('请填写新密码！');
		$('#pwdNew').focus();
		return false;
	}else if(null==pwdNewTwo || pwdNewTwo==''){
		alert('请填写确认密码！');
		$('#pwdNewTwo').focus();
		return false;
	}else if(pwdNew!=pwdNewTwo){
		alert('确认密码不正确！');
		$('#pwdNewTwo').focus();
		return false;
	}
	$('#pwdOld').val(pwdOld);
	$('#pwdNew').val(pwdNew);
	$('#pwdNewTwo').val(pwdNewTwo);
	$('#releaseForm').submit();
}
function exeAdminOutLink(type){
	var outlinkName=$.trim($('#outlinkName').val());
	if(null==outlinkName || outlinkName==''){
		alert('请输入外链地址！');
		$('#outlinkName').focus();
		return false;
	}
	$('#outlinkName').val(outlinkName);
	$("#releaseForm").attr("action", "action.php?action="+type);
	$('#releaseForm').submit();
}
function exeAdminExeLink(type){
	var exelinkName=$.trim($('#exelinkName').val());
	if(null==exelinkName || exelinkName==''){
		alert('请输入执行地址！');
		$('#exelinkName').focus();
		return false;
	}
	return false;
	$('#exelinkName').val(exelinkName);
	$("#releaseForm").attr("action", "action.php?action="+type);
	$('#releaseForm').submit();
}
//模仿浏览器访问外链url地址
function exeAdminOutLinkByUrl(id,action,url){
	//alert(id+action+url);
	$.ajax({
		type:'GET',
		async:true,
		cache:false,
		url:domain+'admin/system/action.php?action='+action+'&id='+id+'&url='+url,
		dataType:'json',
		success:function (data){
			var obj=eval(data);//返回json数组
			$('#'+id).html(obj.msg);
		}
	});
}
//=======================招聘管理==============================
//发布招聘信息
function exeAdminRmRelease(){
	var reg=new RegExps();
	var persons=$.trim($('#persons').val());
	var expired=$.trim($('#expired').val());
	var dept=$.trim($('#dept').val());
	var address=$.trim($('#address').val());
	var typeId=$.trim($('#typeId').val());
	if(null==persons || persons==''){
		alert('招聘人数不能为空！');
		$('#persons').focus();
		return false;
	}else if(null==expired||expired==''){
		alert('过期天数不能为空！');
		$('#expired').focus();
		return false;
	}else if(!reg.isInt.exec(expired)){
		alert('请输入正确的过期时间，必须为整数！');
		$('#expired').select();
		return false;
	}else if(expired<1 || expired>365){
		alert('过期时间必须大于等于一天，小于365天(一年)');
		$('#expired').select();
		return false;
	}else if(null==typeId || typeId==''){
		alert('请选择招聘职位！');
		return false;
	}
	$('#persons').val(persons);
	$('#expired').val(expired);
	$('#dept').val(dept);
	$('#address').val(address);
	$('#releaseForm').submit();
}
//修改招聘信息
function exeAdminRmModify(){
	var reg=new RegExps();
	var persons=$.trim($('#persons').val());
	var expired=$.trim($('#expired').val());
	var dept=$.trim($('#dept').val());
	var address=$.trim($('#address').val());
	var typeId=$.trim($('#typeId').val());
	if(null==persons || persons==''){
		alert('招聘人数不能为空！');
		$('#persons').focus();
		return false;
	}else if(null==expired||expired==''){
		alert('过期天数不能为空！');
		$('#expired').focus();
		return false;
	}else if(!reg.isInt.exec(expired)){
		alert('请输入正确的过期时间，必须为整数！');
		$('#expired').select();
		return false;
	}else if(expired<1 || expired>365){
		alert('过期时间必须大于等于一天，小于365天(一年)');
		$('#expired').select();
		return false;
	}else if(null==typeId || typeId==''){
		alert('请选择招聘职位！');
		return false;
	}
	$('#persons').val(persons);
	$('#expired').val(expired);
	$('#dept').val(dept);
	$('#address').val(address);
	$('#modifyForm').submit();
}
//发布招聘信息类别
function exeAdminRmTypeRelease(){
	var typeName=$.trim($('#typeName').val());
	if(null==typeName || typeName==''){
		alert('招聘信息类别不能为空！');
		$('#typeName').focus();
		return false;
	}
	$('#typeName').val(typeName);
	$('#releaseForm').submit();
}
//=============================仓储系统管理=======================================
//门店信息发布
function exeAdminStoresRelease(){
	var storesNo=$.trim($('#storesNo').val());
	var storesName=$.trim($('#storesName').val());
	var cityName=$.trim($('#cityName').val());
	var address=$.trim($('#address').val());
	var telThree=$.trim($('#telThree').val());
	var telOne=$.trim($('#telOne').val());
	var telTwo=$.trim($('#telTwo').val());
	if(null==storesNo || storesNo==''){
		alert('商场标号不能为空！');
		$('#storesNo').focus();
		return false;
	}
	if(null==storesName || storesName==''){
		alert('商场名称不能为空！');
		$('#storesName').focus();
		return false;
	}
	if(null==cityName || cityName==''){
		alert('所属城市区域不能为空！');
		$('#cityName').focus();
		return false;
	}
	if(null==address || address==''){
		alert('地址不能为空！');
		$('#address').focus();
		return false;
	}
	if(null==telThree || telThree==''){
		alert('收货部电话不能为空！');
		$('#telThree').focus();
		return false;
	}
	
	$('#storesNo').val(storesNo);
	$('#storesName').val(storesName);
	$('#cityName').val(cityName);
	$('#address').val(address);
	$('#telThree').val(telThree);
	
	return true;
}
//门店信息修改
function exeAdminStoresModify(){
	var storesNo=$.trim($('#storesNo').val());
	var storesName=$.trim($('#storesName').val());
	var cityName=$.trim($('#cityName').val());
	var address=$.trim($('#address').val());
	var telThree=$.trim($('#telThree').val());
	var telOne=$.trim($('#telOne').val());
	var telTwo=$.trim($('#telTwo').val());
	if(null==storesNo || storesNo==''){
		alert('商场标号不能为空！');
		$('#storesNo').focus();
		return false;
	}
	if(null==storesName || storesName==''){
		alert('商场名称不能为空！');
		$('#storesName').focus();
		return false;
	}
	if(null==cityName || cityName==''){
		alert('所属城市区域不能为空！');
		$('#cityName').focus();
		return false;
	}
	if(null==address || address==''){
		alert('地址不能为空！');
		$('#address').focus();
		return false;
	}
	if(null==telThree || telThree==''){
		alert('收货部电话不能为空！');
		$('#telThree').focus();
		return false;
	}
	
	$('#storesNo').val(storesNo);
	$('#storesName').val(storesName);
	$('#cityName').val(cityName);
	$('#address').val(address);
	$('#telThree').val(telThree);
	
	return true;
}
//供应商发布
function exeAdminSuppliersRelease(){
	var suppliersNo=$.trim($('#suppliersNo').val());
	var suppliersName=$.trim($('#suppliersName').val());
	if(null==suppliersNo || suppliersNo==''){
		alert('供应商标号不能为空！');
		$('#suppliersNo').focus();
		return false;
	}
	if(null==suppliersName || suppliersName==''){
		alert('供应商名称不能为空！');
		$('#suppliersName').focus();
		return false;
	}
	
	$('#suppliersNo').val(suppliersNo);
	$('#suppliersName').val(suppliersName);
	return true;
}
//供应商信息修改
function exeAdminSuppliersModify(){
	var suppliersNo=$.trim($('#suppliersNo').val());
	var suppliersName=$.trim($('#suppliersName').val());
	if(null==suppliersNo || suppliersNo==''){
		alert('供应商标号不能为空！');
		$('#suppliersNo').focus();
		return false;
	}
	if(null==suppliersName || suppliersName==''){
		alert('供应商名称不能为空！');
		$('#suppliersName').focus();
		return false;
	}
	
	$('#suppliersNo').val(suppliersNo);
	$('#suppliersName').val(suppliersName);
	return true;
}
//商品信息发布
function exeAdminGoodsRelease(){
	var goodsNo=$.trim($('#goodsNo').val());
	var goodsName=$.trim($('#goodsName').val());
	var goodsUpc=$.trim($('#goodsUpc').val());
	var goodsVq=$.trim($('#goodsVq').val());
	var suppliersNo=$.trim($('#suppliersNo').val());
	
	if(null==goodsNo || goodsNo==''){
		alert('商品编号不能为空！');
		$('#goodsNo').focus();
		return false;
	}
	if(null==goodsName || goodsName==''){
		alert('商品名称不能为空！');
		$('#goodsName').focus();
		return false;
	}
	if(null==suppliersNo || suppliersNo==''){
		alert('请选择商品供应商！');
		return false;
	}
	
	$('#goodsNo').val(goodsNo);
	$('#goodsName').val(goodsName);
	$('#goodsUpc').val(goodsUpc);
	$('#goodsVq').val(goodsVq);
	
	return true;
}
//商品信息修改
function exeAdminGoodsModify(){
	var goodsName=$.trim($('#goodsName').val());
	var goodsUpc=$.trim($('#goodsUpc').val());
	var goodsVq=$.trim($('#goodsVq').val());
	var suppliersNo=$.trim($('#suppliersNo').val());
	
	if(null==goodsName || goodsName==''){
		alert('商品名称不能为空！');
		$('#goodsName').focus();
		return false;
	}
	if(null==suppliersNo || suppliersNo==''){
		alert('请选择商品供应商！');
		return false;
	}
	
	$('#goodsNo').val(goodsNo);
	$('#goodsName').val(goodsName);
	$('#goodsUpc').val(goodsUpc);
	$('#goodsVq').val(goodsVq);
	
	return true;
}
//
function exeAdminSuppliersChange(){
	var suppliersNo=$.trim($('#suppliersNo').val());
	//alert(suppliersNo);
	$.ajax({
		type:'GET',
		async:true,
		cache:false,
		url:'action.php?action=ajaxGoodsBySuppliersNo&suppliersNo='+suppliersNo,
		dataType:'json',
		success:function (data){
			if(null==data||data==''){
				//alert('无返回数据');
				$('#goodsNo').empty();
				$('#goodsNo').append('<option value="">请选择商品</option>');
			}else{
				var obj=eval(data);//返回json数组
				//alert(obj[0][2]);
				$('#goodsNo').empty();
				$('#goodsNo').append('<option value="">请选择商品</option>');
				for(var i=0;i<obj.length;i++){
					$('#goodsNo').append('<option value="'+obj[i].goods_no+'">'+obj[i].goods_name+'</option>');
				}
			}
		}
	});
}
function exeAdminStorageRelease(){
	var storagePo=$.trim($('#storagePo').val());
	var storesNo=$.trim($('#storesNo').val());
	var suppliersNo=$.trim($('#suppliersNo').val());
	var goodsNo=$.trim($('#goodsNo').val());
	var goodsWeight=$.trim($('#goodsWeight').val());
	var goodsCbm=$.trim($('#goodsCbm').val());
	var storageNum=$.trim($('#storageNum').val());
	var storageTime=$.trim($('#datepicker').val());
	
	if(null==storagePo || storagePo==''){
		alert('订单编号不能为空！');
		$('#storagePo').focus();
		return false;
	}
	if(null==storesNo || storesNo==''){
		alert('请选择预约门店！');
		return false;
	}
	if(null==suppliersNo || suppliersNo==''){
		alert('请选择商品供应商！');
		return false;
	}
	if(null==goodsNo || goodsNo==''){
		alert('请选择商品！');
		return false;
	}
	if(null==goodsWeight || goodsWeight==''){
		alert('请输入商品重量！');
		$('#goodsWeight').focus();
		return false;
	}
	if(null==goodsCbm || goodsCbm==''){
		alert('请输入商品体积！');
		$('#goodsCbm').focus();
		return false;
	}
	if(null==storageNum || storageNum==''){
		alert('请输入商品箱数！');
		$('#storageNum').focus();
		return false;
	}
	if(null==storageTime || storageTime==''){
		alert('请输入入库日期！');
		$('#datepicker').focus();
		return false;
	}
	
	$('#storagePo').val(storagePo);
	$('#goodsWeight').val(goodsWeight);
	$('#goodsCbm').val(goodsCbm);
	$('#storageNum').val(storageNum);
	$('#datepicker').val(storageTime);
	
	return true;
}
function exeAdminStorageModify(){
	var storagePo=$.trim($('#storagePo').val());
	var storesNo=$.trim($('#storesNo').val());
	var suppliersNo=$.trim($('#suppliersNo').val());
	var goodsNo=$.trim($('#goodsNo').val());
	var goodsWeight=$.trim($('#goodsWeight').val());
	var goodsCbm=$.trim($('#goodsCbm').val());
	var storageNum=$.trim($('#storageNum').val());
	var storageTime=$.trim($('#datepicker').val());
	
	if(null==storagePo || storagePo==''){
		alert('订单编号不能为空！');
		$('#storagePo').focus();
		return false;
	}
	if(null==storesNo || storesNo==''){
		alert('请选择预约门店！');
		return false;
	}
	if(null==suppliersNo || suppliersNo==''){
		alert('请选择商品供应商！');
		return false;
	}
	if(null==goodsNo || goodsNo==''){
		alert('请选择商品！');
		return false;
	}
	if(null==goodsWeight || goodsWeight==''){
		alert('请输入商品重量！');
		$('#goodsWeight').focus();
		return false;
	}
	if(null==goodsCbm || goodsCbm==''){
		alert('请输入商品体积！');
		$('#goodsCbm').focus();
		return false;
	}
	if(null==storageNum || storageNum==''){
		alert('请输入商品箱数！');
		$('#storageNum').focus();
		return false;
	}
	if(null==storageTime || storageTime==''){
		alert('请输入入库日期！');
		$('#datepicker').focus();
		return false;
	}
	
	$('#storagePo').val(storagePo);
	$('#goodsWeight').val(goodsWeight);
	$('#goodsCbm').val(goodsCbm);
	$('#storageNum').val(storageNum);
	$('#datepicker').val(storageTime);
	
	return true;
}
function exeAdminStorageSearchByStorageTime(){
	var storageTime=$.trim($('#datepicker').val());
	var suppliersNo=$.trim($('#suppliersNo').val());
	if(null!=storageTime && storageTime!=''){
		window.location="storageList.php?storageTime="+storageTime+"&suppliersNo="+suppliersNo;
	}else{
		alert('请输入入库时间！');
	}		
}
function exeAdminYyhzLDSearchByStorageTime(){
	var storageTime=$.trim($('#datepicker').val());
	var suppliersNo=$.trim($('#suppliersNo').val());
	if(null!=storageTime && storageTime!=''){
		window.location="yyhzLDManage.php?storageTime="+storageTime+"&suppliersNo="+suppliersNo;
	}else{
		alert('请输入入库时间！');
	}		
}
function exeAdminYyhzLCSearchByStorageTime(){
	var storageTime=$.trim($('#datepicker').val());
	var suppliersNo=$.trim($('#suppliersNo').val());
	if(null!=storageTime && storageTime!=''){
		window.location="yyhzLCManage.php?storageTime="+storageTime+"&suppliersNo="+suppliersNo;
	}else{
		alert('请输入入库时间！');
	}	
}
function exeAdminPzLDSearchByStorageTime(){
	var storageTime=$.trim($('#datepicker').val());
	var storesNo=$.trim($('#storesNo').val());
	if(null!=storageTime && storageTime!=''){
		window.location="pzLDManage.php?storageTime="+storageTime+"&storesNo="+storesNo;
	}else{
		alert('请输入入库时间！');
	}	
}
function exeAdminPzLCSearchByStorageTime(){
	var storageTime=$.trim($('#datepicker').val());
	var storesNo=$.trim($('#storesNo').val());
	if(null!=storageTime && storageTime!=''){
		window.location="pzLCManage.php?storageTime="+storageTime+"&storesNo="+storesNo;
	}else{
		alert('请输入入库时间！');
	}	
}
function exeAdminAdRelease(){
	var title=$.trim($('#title').val());
	var url=$.trim($('#url').val());
	var typeId=$.trim($('#typeId').val());
	var path=$.trim($('#path').val());
	if(null==typeId || typeId==''){
		alert('请选择类别！');
		return false;
	}
	if(null==path && path==''){
		alert('请选择广告图片！');
		return false;
	}
	
	return true;
}
function exeAdminAdModify(){
	var title=$.trim($('#title').val());
	var url=$.trim($('#url').val());
	var typeId=$.trim($('#typeId').val());
	var path=$.trim($('#path').val());
	if(null==typeId || typeId==''){
		alert('请选择类别！');
		return false;
	}
	if(null==path && path==''){
		alert('请选择广告图片！');
		return false;
	}
	
	return true;
}
function exeAdminAdTypeRelease(){
	var name=$.trim($('#name').val());
	var size=$.trim($('#size').val());
	if(null==name || name==''){
		alert('广告类别不能为空！');
		return false;
	}
	$('#name').val(name);
	$('#size').val(size);
	return true;
}
function exeAdminAreaRelease(){
	var name=$.trim($('#name').val());
	if(null==name || name==''){
		alert('区域不能为空！');
		return false;
	}
	$('#name').val(name);
	return true;
}
//发布信息
function exeAdminShopRelease(){
	var shopId=$.trim($('#shopId').val());
	var shopName=$.trim($('#shopName').val());
	var areaId=$.trim($('#areaId').val());
	if(null==shopId || shopId==''){
		alert('店铺编号不能为空！');
		$('#shopId').focus();
		return false;
	}
	if(null==shopName || shopName==''){
		alert('店铺名称不能为空！');
		$('#shopName').focus();
		return false;
	}
	if(null==areaId || areaId==''){
		alert('请选择区域！');
		return false;
	}
	$('#shopId').val(shopId);
	$('#shopName').val(shopName);
	return true;
}
function exeAdminShopModify(){
	var shopId=$.trim($('#shopId').val());
	var shopName=$.trim($('#shopName').val());
	var areaId=$.trim($('#areaId').val());
	if(null==shopId || shopId==''){
		alert('店铺编号不能为空！');
		$('#shopId').focus();
		return false;
	}
	if(null==shopName || shopName==''){
		alert('店铺名称不能为空！');
		$('#shopName').focus();
		return false;
	}
	if(null==areaId || areaId==''){
		alert('请选择区域！');
		return false;
	}
	$('#shopId').val(shopId);
	$('#shopName').val(shopName);
	return true;
}
function exeAdminChangeArea(){
	var areaId=$.trim($('#areaId').val());
	if(areaId!=''){
		$.ajax({
			type:'GET',
			async:true,
			cache:false,
			url:domain+'admin/area/action.php?action=ajaxChangeArea&areaId='+areaId,
			dataType:'json',
			success:function (data){
				if(data!=null&&data!=''){
					var obj=eval(data);//返回json数组
					//alert(obj[0][2]);
					$('#areaId').empty();
					$('#areaId').append('<option value="">请选择区域</option>');
					for(var i=0;i<obj.length;i++){
						$('#areaId').append('<option value="'+obj[i].id+'">'+obj[i].name+'</option>');
					}
					$('#span_areaId').show();
					$('#a_areaId').attr('href','javascript:exeAdminBackArea('+areaId+');');
				}
			}
		});
	}
}
function exeAdminBackArea(areaId){
	if(areaId!=''){
		$.ajax({
			type:'GET',
			async:true,
			cache:false,
			url:domain+'admin/area/action.php?action=ajaxBackArea&areaId='+areaId,
			dataType:'json',
			success:function (data){
				if(data!=null&&data!=''){
					var obj=eval(data);//返回json数组
					//alert(obj[0][2]);
					$('#areaId').empty();
					$('#areaId').append('<option value="">请选择信息类别</option>');
					for(var i=0;i<obj.length;i++){
						$('#areaId').append('<option value="'+obj[i].id+'">'+obj[i].name+'</option>');
					}
					if(obj[0].fatherId==0){
						$('#span_areaId').hide();
					}else{
						$('#span_areaId').show();
						$('#a_areaId').attr('href','javascript:exeAdminBackArea('+obj[0].fatherId+');');
					}
				}
			}
		});
	}
}
function exeAdminUserRelease(){
	var username=$.trim($('#username').val());
	var groupId=$.trim($('#groupId').val());
	if(null==username || username==''){
		alert('用户名不能为空！');
		$('#username').focus();
		return false;
	}
	if(null==groupId || groupId==''){
		alert('请选择用户权限组！');
		return false;
	}
	$('#username').val(username);
	return true;
}
function exeAdminUserModify(){
	var password=$.trim($('#password').val());
	var groupId=$.trim($('#groupId').val());
	if(null==password || password==''){
		alert('密码不能为空！');
		$('#password').focus();
		return false;
	}
	if(null==groupId || groupId==''){
		alert('请选择用户权限组！');
		return false;
	}
	$('#username').val(username);
	$('#password').val(password);
	return true;
}
function exeAdminPropertyRelease(){
	var propertyId=$.trim($('#propertyId').val());
	var propertyName=$.trim($('#propertyName').val());
	var areaId=$.trim($('#areaId').val());
	if(null==propertyId || propertyId==''){
		alert('楼盘编号不能为空！');
		$('#propertyId').focus();
		return false;
	}
	if(null==propertyName || propertyName==''){
		alert('楼盘名称不能为空！');
		$('#propertyName').focus();
		return false;
	}
	if(null==areaId || areaId==''){
		alert('请选择楼盘区域！');
		return false;
	}
	$('#propertyId').val(propertyId);
	$('#propertyName').val(propertyName);
	return true;
}
function exeAdminPropertyModify(){
	var propertyId=$.trim($('#propertyId').val());
	var propertyName=$.trim($('#propertyName').val());
	var areaId=$.trim($('#areaId').val());
	if(null==propertyId || propertyId==''){
		alert('楼盘编号不能为空！');
		$('#propertyId').focus();
		return false;
	}
	if(null==propertyName || propertyName==''){
		alert('楼盘名称不能为空！');
		$('#propertyName').focus();
		return false;
	}
	if(null==areaId || areaId==''){
		alert('请选择楼盘区域！');
		return false;
	}
	$('#propertyId').val(propertyId);
	$('#propertyName').val(propertyName);
	return true;
}
function exeAdminChangeAreaForShop(){
	var shopAreaId=$.trim($('#shopAreaId').val());
	if(shopAreaId!=''){
		$.ajax({
			type:'GET',
			async:true,
			cache:false,
			url:domain+'admin/area/action.php?action=ajaxChangeAreaForShop&shopAreaId='+shopAreaId,
			dataType:'json',
			success:function (data){
				if(data!=null&&data!=''){
					var obj=eval(data);//返回json数组
					//alert(obj[0][2]);
					$('#shopId').empty();
					$('#shopId').append('<option value="">请选择店铺</option>');
					for(var i=0;i<obj.length;i++){
						$('#shopId').append('<option value="'+obj[i].id+'">'+obj[i].name+'-'+obj[i].shopName+'</option>');
					}
				}else{
					$('#shopId').empty();
					$('#shopId').append('<option value="">请选择店铺</option>');
				}
			}
		});
	}
}
function exeAdminChangeAreaForProperty(){
	var propertyAreaId=$.trim($('#propertyAreaId').val());
	if(propertyAreaId!=''){
		$.ajax({
			type:'GET',
			async:true,
			cache:false,
			url:domain+'admin/area/action.php?action=ajaxChangeAreaForProperty&propertyAreaId='+propertyAreaId,
			dataType:'json',
			success:function (data){
				if(data!=null&&data!=''){
					var obj=eval(data);//返回json数组
					//alert(obj[0][2]);
					$('#propertyId').empty();
					$('#propertyId').append('<option value="">请选择楼盘</option>');
					for(var i=0;i<obj.length;i++){
						$('#propertyId').append('<option value="'+obj[i].id+'">'+obj[i].name+'-'+obj[i].propertyName+'</option>');
					}
				}else{
					$('#propertyId').empty();
					$('#propertyId').append('<option value="">请选择楼盘</option>');
				}
			}
		});
	}
}
function exeAdminStatementsRelease(){
	var shopId=$.trim($('#shopId').val());
	var propertyId=$.trim($('#propertyId').val());
	if(null==shopId || shopId==''){
		alert('请选择店铺！');
		return false;
	}
	if(null==propertyId || propertyId==''){
		alert('请选择楼盘！');
		return false;
	}
	return true;
}
function exeAdminStatementsModify(){
	var shopId=$.trim($('#shopId').val());
	var propertyId=$.trim($('#propertyId').val());
	if(null==shopId || shopId==''){
		alert('请选择店铺！');
		return false;
	}
	if(null==propertyId || propertyId==''){
		alert('请选择楼盘！');
		return false;
	}
	return true;
}
function exeAdminWebUserRelease(){
	var username=$.trim($('#username').val());
	var password=$.trim($('#password').val());
	var password_=$.trim($('#password_').val());
	var uname=$.trim($('#uname').val());
	if(null==password || password==''){
		alert('密码不能为空！');
		$('#password').focus();
		return false;
	}
	if(null==password_ || password_==''){
		alert('确认密码不能为空！');
		$('#password_').focus();
		return false;
	}
	if(password!=password_){
		alert('两次密码不一致！');
		$('#password_').focus();
		return false;
	}
	if(null==username || username==''){
		alert('用户名不能为空！');
		$('#username').focus();
		return false;
	}
	if(null==uname || uname==''){
		alert('姓名不能为空！');
		$('#uname').focus();
		return false;
	}
	$('#username').val(username);
	$('#password').val(password);
	$('#uname').val(uname);
	return true;
}
function exeAdminManageRelease(){
	var username=$.trim($('#username').val());
	var password=$.trim($('#password').val());
	var password_=$.trim($('#password_').val());
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
	if(null==password_ || password_==''){
		alert('确认密码不能为空！');
		$('#password_').focus();
		return false;
	}
	if(password!=password_){
		alert('两次密码不一致！');
		$('#password_').focus();
		return false;
	}
	$('#username').val(username);
	$('#password').val(password);
	return true;
}
function exeAdminWebUserModify(){
	var password=$.trim($('#password').val());
	var password_=$.trim($('#password_').val());
	var uname=$.trim($('#uname').val());
	if(null==password || password==''){
		alert('密码不能为空！');
		$('#password').focus();
		return false;
	}
	if(null==password_ || password_==''){
		alert('确认密码不能为空！');
		$('#password_').focus();
		return false;
	}
	if(password!=password_){
		alert('两次密码不一致！');
		$('#password_').focus();
		return false;
	}
	if(null==uname || uname==''){
		alert('姓名不能为空！');
		$('#uname').focus();
		return false;
	}
	$('#password').val(password);
	$('#uname').val(uname);
	return true;
}