
$(function() {   
	$("#estName").autocomplete({
      source: "ajax_get_prop_name.php",
      select: function(e, ui) {
      	  $("#estId").val(ui.item.id);    
	      document.getElementById("dis_est_alert").style.display="none";
      }
    });
    
	$("#estName").blur(function () {
      	  if($("#estId").val() == ""){
	    	document.getElementById("dis_est_alert").style.display="block";	 
      	  }else{
	    	document.getElementById("dis_est_alert").style.display="none";	 
      	  }
    });
});
function emptyEstId(){
	$("#estId").val("");    
}
function deletePic(picId){
	if(!confirm("确认删除这张照片？")) return false;
    	
	var option={action:"delPic",picId:picId};
    $.ajax({
		url:"property_handler.php",
		dataType:"json",
        data:option,
        type:"post",
        success:function(msg){
			if(msg.result=="success"){
				alert("删除成功!");
                //window.setTimeout(function(){location.reload();}, 1000);
                $("#showPic").css("display","none");
			}else{
            	alert("删除失败!");
			}
        },
        error:function(){
        	alert("提示:删除失败!");
        }
	})
}
function deleteProp(propId){
	
	if(!confirm("确认删除房源？")) return false;
    	
	var option={action:"delProp",propIds:propId+","};
    $.ajax({
		url:"property_handler.php",
		dataType:"json",
        data:option,
        type:"post",
        success:function(msg){
			if(msg.result=="success"){
				alert("删除成功!");
                window.setTimeout(function(){location.reload();}, 1000);
			}else{
            	alert("删除失败!");
			}
        },
        error:function(){
        	alert("提示:删除失败!");
        }
	})
}

function textCounter(input,countfield,maxlimit)
{ 
   var n=0; 
   var k=0;
   var count=0;
   var myArray=new Array();
   for(var i=0;i<input.value.length;i++)
   { 
     if(input.value.charCodeAt(i)<256)
     {   
        n=n+0.5;   
     }   
     else
     {   
        n=n+1;   
     } 
     if(n<=maxlimit)
        k++;
   } 
    if(n>maxlimit)
	{
		input.value=input.value.substring(0,k);
		countfield.innerHTML = "0";		
	}
	else
	{
		count = String(maxlimit-n);
		if(count.indexOf('.')>-1)
		{
		  myArray=count.split('.'); 
		  countfield.innerHTML=myArray[0];
		}
		else
		  countfield.innerHTML=count;
	}	
}

function CheckGardenArea(keyName,flag){
	if(!flag) return false;
    
    document.getElementById(keyName).value = document.getElementById(keyName).value.toLowerCase();
    var value=document.getElementById(keyName).value;
    
    if(value==''){
    	alert("请填写花园面积");
		$("#"+keyName).focus();
        return false;
    }
        
    if(check_float(keyName)){
    	if(parseFloat(value)<=2||parseFloat(value)>=10000){
    		alert("花园面积必须大于2且小于10000");
    		$("#"+keyName).focus();
    		return false;
    	}
    	return true;
	}else{
        alert("只能填写数字");
		$("#"+keyName).focus();
        return false;
	}
}
function CheckCellarArea(keyName,flag){
	if(!flag) return false;
    
    document.getElementById(keyName).value = document.getElementById(keyName).value.toLowerCase();
    var value=document.getElementById(keyName).value;
    
    if(value==''){
    	alert("请填写地下室面积");
		$("#"+keyName).focus();
        return false;
    }
        
    if(check_float(keyName)){
    	if(parseFloat(value)<=2||parseFloat(value)>=10000){
    		alert("地下室面积必须大于2且小于10000");
    		$("#"+keyName).focus();
    		return false;
    	}
    	return true;
	}else{
        alert("只能填写数字");
		$("#"+keyName).focus();
        return false;
	}
}
function CheckBuildingArea(KeyName,flag)
{
    if(!flag) return false;
    
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    
    if(value==''){
    	alert("请填写建筑面积");
		$("#"+KeyName).focus();
        return false;
    }
        
    if(check_float(KeyName)){
    	if(parseFloat(value)<=2||parseFloat(value)>=10000){
    		alert("建筑面积必须大于2且小于10000");
    		$("#"+KeyName).focus();
    		return false;
    	}
    	return true;
	}else{
        alert("只能填写数字");
		$("#"+KeyName).focus();
        return false;
	}
}
function CheckRentArea(KeyName,flag)
{
    if(!flag) return false;
    
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    
    if(value==''){
    	alert("请填写出租面积");
		$("#"+KeyName).focus();
        return false;
    }
        
    if(check_float(KeyName)){
    	if(parseFloat(value)<=2||parseFloat(value)>=10000){
    		alert("出租面积必须大于2且小于10000");
    		$("#"+KeyName).focus();
    		return false;
    	}
    	return true;
	}else{
        alert("只能填写数字");
		$("#"+KeyName).focus();
        return false;
	}
}

function checkArea(KeyName,KeyValue,chkEmpty){
    var value=document.getElementById(KeyName).value;
    
    if(chkEmpty == true && value==''){
    	alert("请填写" + KeyValue);
		$("#"+KeyName).focus();
        return false;
    }
        
    if(check_float(KeyName)){
    	if(parseFloat(value)<=2||parseFloat(value)>=10000){
    		alert(KeyValue + "必须大于2且小于10000");
    		$("#"+KeyName).focus();
    		return false;
    	}
    	return true;
	}else{
        alert("只能填写数字");
		$("#"+KeyName).focus();
        return false;
	}
}

function CheckLiveArea(KeyName,KeyName1,flag)
{
    if(!flag) return false;
    
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value = document.getElementById(KeyName).value;
    var value1 = document.getElementById(KeyName1).value;

	if(check_float(KeyName)){
		if(parseFloat(value)>=parseFloat(value1)){
			alert("使用面积应该小于建筑面积");
    		$("#"+KeyName).focus();
            return false;
		}
		return true;
	}else{
    	alert("只能填写数字");
		$("#"+KeyName).focus();
        return false;
    }
}

function CheckCreateTime(KeyName,flag)
{
    if(!flag) return false;
    
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value = document.getElementById(KeyName).value;
    
    if(trim(value) != "" && (!IsInt(KeyName) || value < 1000 || value>= 10000 )){
    	alert("请填写4位数字 如：2008");
		$("#"+KeyName).focus();
    	return false;
    }
    return true;

}
function CheckFloor(KeyName,KeyNameAll,flag)
{
    if(!flag) return false;
    
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    document.getElementById(KeyNameAll).value = document.getElementById(KeyNameAll).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    var valueAll=document.getElementById(KeyNameAll).value;
    
    if(trim(valueAll) == ""){
    	alert("请填写总楼层");
		$("#"+KeyNameAll).focus();
        return false;
    }else if(!IsInt(KeyNameAll)){
        alert("只能填写数字");
		$("#"+KeyNameAll).focus();
        return false;
    }else if(valueAll<=0){
        alert("总楼层不能为0或负数");
		$("#"+KeyNameAll).focus();
        return false;
    }
    
	if(trim(value) == ""){
    	alert("请填写楼层");
		$("#"+KeyName).focus();
        return false;
	}else if(!IsInt(KeyName)){
        alert("只能填写数字");
		$("#"+KeyName).focus();
        return false;
	}else if(parseFloat(value)>parseFloat(valueAll)){
    	alert("所在楼层不能大于总楼层");
		$("#"+KeyName).focus();
    	return false;
    }else{
       return true;
    }

}
function CheckTitle(KeyName,flag)
{
    document.getElementById(KeyName).value = document.getElementById(KeyName).value;

    var value=document.getElementById(KeyName).value;
    if(flag){
        if(trim(value) == ""){
            alert("请填写标题");
    		$("#"+KeyName).focus();
            return false;
        }
        return true;
    }
    return true;
}
function CheckRoom(KeyName,flag)
{
    var value = document.getElementById(KeyName).value;
    if(flag){
        if(trim(value)==""){
            alert("请填写户型");
    		$("#"+KeyName).focus();
            return false;
        }

        if(!CheckInput(value)) {
        	alert("只能填写数字");
    		$("#"+KeyName).focus();
        	return false;
        }
    }
    return true;
}
function CheckInput(val) {
    var reg = /^[0-9]*$/;
    if (!reg.test(trim(val))) return false;
    return true;
}

function SelAllClick(obj,sourceName)
{    
    if($(obj).html()=="[全部取消]")
    {
         SetValue("escall",sourceName);
         $(obj).html("[全选]");
    }
    else
    {
        SetValue("all",sourceName);
        $(obj).html("[全部取消]");
    }     
    return false;
}
function ClearContent(KeyName,flag)
{
   var content = $("#"+KeyName).val();
   content = trim(content);
   if(content == initContent)
      $("#"+KeyName).val("");
   if(content == "")
      $("#"+KeyName).val(initContent);
}
function FilterKeywords(KeyName,flag)
{
	var value = $("#"+KeyName).val();
	if(flag){
	    xmlhttp = new DefineRequest();
	    xmlhttp.open('POST', '/Magent/House/AjaxCheckHouseTitle.aspx?action=filter&title='+escape(value),false);
	    xmlhttp.send(null);
	    if(xmlhttp.responseText == "Ero")
	    {
	            alert('提交的数据中含有非法信息');
	            $("#"+KeyName).val("");
	            document.getElementById(KeyName).focus();
	            ModifyTitleClass(KeyName,true);
	            $('#alert1').html("20");
	            ShowTip(KeyName,true);
	            return false;
	    }
	    else
	    {
	        return true;
	    }
   }
}

function CheckInfoCode(KeyName,flag)
{
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    if(flag){
        if(trim(value) != "" && !check_length(KeyName, 12)){
        	alert("请填写12位数字");
    		$("#"+KeyName).focus();
        	return false;
        }
    }
    return true;
}

function check_length(objname,length)
{
    var strPattern = '^\\d{' + length + '}$';
    var pattern = new RegExp(strPattern,"g"); 
    if(!pattern.test(document.getElementById(objname).value)) return false;
    return true;
}

function CheckPrice(KeyName,flag,type)
{
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    if(flag){
        if(value==''){
        	alert("请填写售价");
    		$("#"+KeyName).focus();
        	return false;
        }

        if(check_float(KeyName)){
        	if(type=='CS'){
        		if(parseFloat(value)<=2||parseFloat(value)>=100000){
        			alert("售价要大于2万元小于10亿元");
            		$("#"+KeyName).focus();
        			return false;
                }
        	}else{
        		if(parseFloat(value)<=100||parseFloat(value)>=300000){
                }
            }
        	return true;
        }else{
        	alert("只能填写数字");
    		$("#"+KeyName).focus();
        	return false;
        }
    }
    return true;
}

function checkPropFee(KeyName,flag){
	
	var value = document.getElementById(KeyName).value;
	if(trim(value) == "" && flag) {
    	alert("请填写物业费");
		$("#"+KeyName).focus();
    	return false;
	}
	
	if(check_float(KeyName)){
		if(parseFloat(value)<0 || parseFloat(value)>=1000000){
			alert("物业费要小于100万元");
            return false;
    		$("#"+KeyName).focus();
		}
		return true;
    }else{
    	alert("只能填写数字");
		$("#"+KeyName).focus();
    	return false;
    }

}

function CheckSwatchPriceOffice(KeyNamePrice) {
    document.getElementById(KeyNamePrice).value = document.getElementById(KeyNamePrice).value.toLowerCase();
    var valuePrice = document.getElementById(KeyNamePrice).value;
    if(trim(valuePrice) == ''){
    	alert("请填写单价");
		$("#"+KeyNamePrice).focus();
    	return false;
    }
    
    if(check_float(KeyNamePrice)){
    	if(parseFloat(valuePrice)<=0 || parseFloat(valuePrice)>200000){
    		alert("单价要大于0元小于200000元");
    		$("#"+KeyNamePrice).focus();
    		return false;
    	}
    	return true;
    }else{
    	alert("只能填写数字");
		$("#"+KeyNamePrice).focus();
    	return false;
    }
}

function check_float(objname)
{  
    if(!IsFloat(objname)) return false; 
    return true;
}
//整数或小数
function IsFloat(val)
{
  var s = document.getElementById(val);
  if(s.value!='' && (isNaN(s.value) || s.value<-1)) return false;
  return true;
}

//是否为数字
function IsInt(o)
{
    var s = document.getElementById(o);
	var reg =/^[0-9]*$/;
	if(!reg.test(trim(s.value))) return false;
	return true;
}

function LTrim(str)
{
    var whitespace = new String(" \t\n\r");
    var s = new String(str);
    if (whitespace.indexOf(s.charAt(0)) != -1)
    {
        var j=0, i = s.length;
        while (j < i && whitespace.indexOf(s.charAt(j)) != -1)
        {
            j++;
        }
        s = s.substring(j, i);
    }
    return s;
}

function RTrim(str)
{
    var whitespace = new String(" \t\n\r");
    var s = new String(str);
    if (whitespace.indexOf(s.charAt(s.length-1)) != -1)
    {
        var i = s.length - 1;
        while (i >= 0 && whitespace.indexOf(s.charAt(i)) != -1)
        {
            i--;
        }
        s = s.substring(0, i+1);
    }
    return s;
}
//去空格
function trim(str)
{
  return RTrim(LTrim(str));
}
function SetValue(type,objName,ovalue)
{   type=type.toLowerCase()
    if(type=="group")
    {
        var objList=document.getElementsByName(objName);
        var len=objList.length;
        for(var i=0;i<len;i++)
        {
            if(ovalue.indexOf(objList[i].value)>-1)
                objList[i].checked=true;
        }
    }
    else if(type=="single")
    {
        var objList=document.getElementsByName(objName);
        var len=objList.length;
        for(var i=0;i<len;i++)
        {
            if(objList[i].value==ovalue)
               {
                    objList[i].checked=true;
                    break;
                }
        }
    }
    else if(type=="selectchild")
    {
        var objList=document.getElementById(objName);
        var len=objList.length;
        for(var i=0;i<len;i++)
        {
            if(objList.options[i].value==ovalue)
            {
                objList.options[i].selected = true;
                break;
            }
        }
    }
    else if(type=="all")
    {
        var objList=document.getElementsByName(objName);
        var len=objList.length;
        for(var i=0;i<len;i++)
        {            
           objList[i].checked=true;
        }        
    }
    else if(type=="escall")
    {
       var objList=document.getElementsByName(objName);
        var len=objList.length;
        for(var i=0;i<len;i++)
        {            
           objList[i].checked=false;
        }          
    }
    return false;
}
function refreshProp(propKind, propId){	
		
	var option={"action":"refreshProp","propKind":propKind,"propId":propId};
    $.ajax({
			url:"property_handler.php",
			dataType:"json",
            data:option,
            type:"post",
            success:function(msg){
				if(msg.result=="success"){
					alert("刷新成功!");
                }else{
                    alert("刷新失败!");
                }
            },
            error:function(){
				alert("刷新失败!");
            }
    })
}