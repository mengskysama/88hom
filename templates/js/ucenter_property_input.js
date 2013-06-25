
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

function check(){
	return true;
}

function CheckBuildingArea(KeyName,flag)
{
    if(!flag) return false;
    
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    
    if(value==''){
    	alert("请填写建筑面积");
        return false;
    }
        
    if(check_float(KeyName)){
    	if(parseFloat(value)<=2||parseFloat(value)>=10000){
    		alert("建筑面积必须大于2且小于10000");
    		return false;
    	}
    	return true;
	}else{
        alert("只能填写数字");
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
            return false;
		}
		return true;
	}else{
    	alert("只能填写数字");
        return false;
    }
}

function CheckCreateTime(KeyName,flag)
{
    if(!flag) return false;
    
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value = document.getElementById(KeyName).value;
    
    if(trim(value) == "" || !IsInt(KeyName) || value < 1000 || value>= 10000){
    	alert("请填写4位数字 如：2008");
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

	if(value==""||valueAll==""){
    	alert("请填写楼层");
        return false;
	}else if(!IsInt(KeyName) || !IsInt(KeyNameAll)){
        alert("只能填写数字");
        return false;
	}else if(valueAll<=0){
        alert("总楼层不能为0或负数");
        return false;
    }else if(parseFloat(value)>parseFloat(valueAll)){
    	alert("所在楼层不能大于总楼层");
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
        if(value=="")
        {
            alert("请填写标题");
            return false;
        }
        return true;
    }
}
function CheckRoom(KeyName,flag)
{
    var value = document.getElementById(KeyName).value;
    if(flag){
        if(value==""){
            alert("请填写户型");
            return
        }

        if(!CheckInput(value)) {
        	alert("只能填写数字");
        }
    }
}
function CheckInput(val) {
    var reg = /^[0-9]*$/;
    if (!reg.test(trim(val))) {
        return false;
    }
    else {
        return true;
    }
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
        if(value!="" && !check_length(KeyName, 12)){
        	alert("请填写12位数字");
        }
    }
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
        	return;
        }

        if(check_float(KeyName)){
        	if(type=='CS'){
        		if(parseFloat(value)<=2||parseFloat(value)>=100000){
        			alert("售价要大于2万元小于10亿元");
                }
        	}else{
        		if(parseFloat(value)<=100||parseFloat(value)>=300000){
                }
            }
        }else{
        	alert("只能填写数字");
        }
    }
}

function check_float(objname,tipname)
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
