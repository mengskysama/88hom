function ShowTip(KeyName,flag,msg)
{
    var TipName=KeyName+"_tip";
    if(document.getElementById(TipName))
    {
        if(flag){
            if(msg!=undefined)
            {
                document.getElementById(TipName).innerHTML = msg;
            }
            document.getElementById(TipName).style.display="";
            ShowRight(KeyName,false);

        }else{
            document.getElementById(TipName).style.display="none";
        }
    }
}
function ShowRight(KeyName,flag,msg)
{
    var RightName=KeyName+"_right";
    if(document.getElementById(RightName))
    {
        if(flag){
            document.getElementById(RightName).innerHTML = "<img src='http://img.soufun.com/secondhouse/image/newesf/usercenter/reg_08.gif'/>"
            document.getElementById(RightName).style.display="";
            ShowTip(KeyName,false);
        }else{
            document.getElementById(RightName).style.display="none";
        }
    }
}
function CheckInfoCode(KeyName,flag)
{
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    if(flag){
        if(value!="")
        {
            if(check_length(KeyName, 'str_infocode_tipo', 12))
            {
                ShowRight(KeyName,true);
                document.getElementById('str_infocode_tipnull').style.display="none";
            }
            else
            {
                ShowRight(KeyName,false);
                document.getElementById('str_infocode_tipnull').style.display="none";
            }
        }
        else
        {
            if(agenttyperh=='True'&&cityName=="深圳")
            {
               document.getElementById('str_infocode_tipnull').style.display="";  
            }
            document.getElementById('str_infocode_tipo').style.display="none";
            ShowRight(KeyName,false);
        }
    }
}
function CheckInfoCodeBj(KeyName,flag)
{
//    HideTip(tipName);
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    if(flag){
        if(value!="")
        {
            if(check_length(KeyName, 'str_infocode_tipo', 7))
            {
                ShowRight(KeyName,true);
            }
            else
            {
                ShowRight(KeyName,false);
            }
        }
        else
        {
            document.getElementById('str_infocode_tipo').style.display="none";
            ShowRight(KeyName,false);
        }
    }
}
function CheckPrice(KeyName,flag,type)
{
//    if(cityName=="上海")
//        HideTip(tipName);
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    if(flag){
        if(value=='')
        {
            ShowTip(KeyName,true);
            document.getElementById(KeyName+"_tipNumber").style.display="none";
        }
        else
        {
           if(check_float(KeyName))
           {
               if(type=='CS')
               {
                   if(parseFloat(value)<=2||parseFloat(value)>=100000)
                   {
                        ShowTip(KeyName,false);
                        ShowRight(KeyName,false);
                        document.getElementById(KeyName+"_tipNumber").style.display="";
                   }
                   else
                   {
                        ShowRight(KeyName,true);
                        document.getElementById(KeyName+"_tipNumber").style.display="none";
                   }
               }
               else
               {
                   if(parseFloat(value)<=100||parseFloat(value)>=300000)
                   {
                        ShowTip(KeyName,false);
                        ShowRight(KeyName,false);
                        document.getElementById(KeyName+"_tipNumber").style.display="";
                   }
                   else
                   {
                        ShowRight(KeyName,true);
                        document.getElementById(KeyName+"_tipNumber").style.display="none";
                   }
               }
           }
           else
           {
               ShowRight(KeyName,false);
               ShowTip(KeyName,false);
               document.getElementById(KeyName+"_tipo").style.display="";
               document.getElementById(KeyName+"_tipNumber").style.display="none"

           }
        }
    }
}
function CheckBuildingArea(KeyName,flag)
{
//    HideTip(tipName);
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    if(flag){
        if(value=='')
        {
            ShowTip(KeyName,true);
            document.getElementById(KeyName+"_tip2").style.display="none";
            document.getElementById(KeyName + "_tipo").style.display = "none";
        }
        else
        {
            if(check_float(KeyName))
            {
               if(parseFloat(value)<=2||parseFloat(value)>=10000)
               {
                    ShowTip(KeyName,false);
                    ShowRight(KeyName,false);
                    document.getElementById(KeyName + "_tip2").style.display = "";

               }
               else
               {
                   document.getElementById(KeyName + "_tip2").style.display = "none";
                    ShowRight(KeyName,true);
               }
           }
           else
           {
               ShowRight(KeyName,false);
               ShowTip(KeyName,false);
               document.getElementById(KeyName+"_tipo").style.display="";
               document.getElementById(KeyName+"_tip2").style.display="none"
           }
        }
    }
}
function CheckLiveArea(KeyName,KeyName1,flag)
{
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    var value1 = document.getElementById(KeyName1).value;
    var i=0;
    var s = document.getElementById("input_str_HouseStructure").value;
    if(flag){
       if(check_float(KeyName))
       {
            if(parseFloat(value)<parseFloat(value1))
            {
                ShowRight(KeyName,true);
                document.getElementById(KeyName+"_tipo").style.display="none";
                document.getElementById(KeyName+"_Error").style.display="none";
            }
            else
            {
                ShowRight(KeyName,false);
                document.getElementById(KeyName + "_tipo").style.display = "none";
             
                if (value != "" && (s.indexOf("复式") == -1 && s.indexOf("跃层") == -1))
                    document.getElementById(KeyName+"_Error").style.display="";
                else
                    document.getElementById(KeyName+"_Error").style.display="none";
            }
       }
       else
       {
            ShowRight(KeyName,false);
            document.getElementById(KeyName+"_tipo").style.display="";
            document.getElementById(KeyName+"_Error").style.display="none"
       }
   }
}
function CheckHouseStructure(KeyName,KeyName1,flag)
{
    var value=document.getElementById(KeyName).value;
    if(value!="")
        CheckLiveArea(KeyName,KeyName1,true);
}
function CheckCreateTime(KeyName,flag)
{
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    if(flag){
        if(value>=10000||value<1000)
        {
            ShowRight(KeyName,false);
            document.getElementById(KeyName+"_tipo").style.display="none";
            if(value!="")
                ShowTip(KeyName,true,"请填写4位数字 如：2008");
            else
                ShowTip(KeyName,false);
            
        }
        else
        {
            ShowRight(KeyName,true);
            ShowTip(KeyName,false);
            document.getElementById(KeyName+"_tipo").style.display="none";
        }
   }
}
function CheckFloor(KeyName,KeyNameAll,flag)
{
//    HideTip(tipName);
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    document.getElementById(KeyNameAll).value = document.getElementById(KeyNameAll).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    var valueAll=document.getElementById(KeyNameAll).value;
    if(flag){
        if(value==""||valueAll=="")
        {
            ShowTip(KeyName,true,"请填写楼层");
            document.getElementById(KeyName+"_Error").style.display="none";
        }
        else if(valueAll<=0)
        {
            ShowTip(KeyName,true,"总楼层不能为0或负数");
            document.getElementById(KeyName+"_Error").style.display="none";
        }
        else if(parseFloat(value)>parseFloat(valueAll))
        {
            document.getElementById(KeyName+"_Error").style.display="";
            ShowTip(KeyName,false);
            ShowRight(KeyName,false);
        }
        else
        {
            ShowRight(KeyName,true);
            document.getElementById(KeyName+"_Error").style.display="none";
        }
    }
}
function CheckTitle(KeyName,flag)
{
//    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    document.getElementById(KeyName).value = document.getElementById(KeyName).value;

    var value=document.getElementById(KeyName).value;
    if(flag){
        if(value=="")
        {
            $("#"+titleid).val(initContent);
            $("#"+titleid).attr('class','gray');
            ShowTip(KeyName,true);
        }
        else
        {
            if(value!=initContent)
            {
                $("#"+titleid).removeAttr('class');
                ShowRight(KeyName,true);
            }
        }
    }
}
function CheckAddress(KeyName,flag)
{
    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    var value=document.getElementById(KeyName).value;
    if(isUseDic==false)
    {
        if(flag){
            if(value=="")
            {
                ShowTip(KeyName,true);
            }
            else
            {
                ShowRight(KeyName,true);
            }
        }
        else{
                ShowTip(KeyName,false);
                ShowRight(KeyName,false);
            }
      }

}
function CheckRoom(KeyName,flag)
{
    var value = $(KeyName).val();
    var vroom=$("#input_ROOM").val();
    var vhall=$("#input_HALL").val();
    var vtoilet=$("#input_TOILET").val();
    var vkitchen=$("#input_KITCHEN").val();
    var vbalcony=$("#input_BALCONY").val();
    if(flag){
        if(value=="")
        {
            ShowTip("input_ROOM",true);
        }
        else if (!CheckInput(vroom) || !CheckInput(vhall) || !CheckInput(vtoilet) || !CheckInput(vkitchen) || !CheckInput(vbalcony)) {
            document.getElementById('input_ROOM_tipo').style.display = "";
            ShowRight("input_ROOM", false);
        }
        else if (vroom != "" && vhall != "" && vtoilet != "" && vkitchen != "" && vbalcony != "" && CheckInput(vroom) && CheckInput(vhall) && CheckInput(vtoilet) && CheckInput(vkitchen) && CheckInput(vbalcony))
        {
            ShowRight("input_ROOM", true);
            document.getElementById('input_ROOM_tipo').style.display = "none";
        }
        else
        {
            ShowTip("input_ROOM", true);
            document.getElementById('input_ROOM_tipo').style.display = "none";
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
function check_length(objname,tipname,length)
{
    var tempname;
    if(!tipname){tempname=objname+"_tipo";}else{tempname=tipname;}
    var strPattern = '^\\d{' + length + '}$';
    var pattern = new RegExp(strPattern,"g"); 
    if(!pattern.test(document.getElementById(objname).value))
    {
        document.getElementById(tempname).style.display=""; 
        return false;
    }
   else
   {
      document.getElementById(tempname).style.display="none"; 
       return true;
   } 
}
function PopupTip(KeyName,tipName,flag)
{
    var tipname="#"+tipName;
    var keyname="#"+KeyName;
    var value = $(keyname).val();
    if(flag&&value==""){
    $(tipname).css("display","");
    }
}
function HideTip(tipName)
{
    var tipname="#"+tipName;
    $(tipname).css("display","none");
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
function ModifyTitleClass(KeyName,flag)
{
//    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    document.getElementById(KeyName).value = document.getElementById(KeyName).value;
    var value=document.getElementById(KeyName).value;
    if(flag){
        if(value=="")
        {
            $("#"+titleid).val(initContent);
            $("#"+titleid).attr('class','gray');
        }
        else
        {
            if(value!=initContent)
            {
                $("#"+titleid).removeAttr('class');
            }
        }
    }
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

function CheckSwatchPrice(KeyNamePrice, KeyNameArea, KeyNameSwatch, KeyNameLimit) {
    document.getElementById(KeyNamePrice).value = document.getElementById(KeyNamePrice).value.toLowerCase();
    document.getElementById(KeyNameArea).value = document.getElementById(KeyNameArea).value.toLowerCase();
    document.getElementById(KeyNameSwatch).value = document.getElementById(KeyNameSwatch).value.toLowerCase();
    document.getElementById(KeyNameLimit).value = document.getElementById(KeyNameLimit).value.toLowerCase();
    var valuePrice = document.getElementById(KeyNamePrice).value;
    var valueArea = document.getElementById(KeyNameArea).value;
    var valueSwatch = document.getElementById(KeyNameSwatch).value;
    var valueLimit = document.getElementById(KeyNameLimit).value;
    if (valuePrice != '' && valueArea != '' && KeyNameSwatch != '' && KeyNameLimit != '' && check_float(KeyNamePrice) && check_float(KeyNameArea) && limitcity.indexOf(cityName) > -1) {

        if ((valuePrice * 10000 / valueArea) < (valueSwatch * valueLimit / 100) ) {
            document.getElementById("price_nogood").style.display = "";
            if (document.getElementById("salesentry_00") != null) {
                document.getElementById("salesentry_00").style.display = "none";
            }
            if (document.getElementById("salesentry_000") != null) {
                document.getElementById("salesentry_000").style.display = "none";
            }
            ShowRight(KeyNameArea, false, "")
            return false;
        }
        else {
            document.getElementById("price_nogood").style.display = "none";
            if (document.getElementById("salesentry_00") != null) {
                document.getElementById("salesentry_00").style.display = "";
            }
            if (document.getElementById("salesentry_000") != null) {
                document.getElementById("salesentry_000").style.display = "";
            }
            ShowRight(KeyNameArea, true, "")
            return true;
        }
    }
    else {
        document.getElementById("price_nogood").style.display = "none";
        if (document.getElementById("salesentry_00") != null) {
            document.getElementById("salesentry_00").style.display = "";
        }
        if (document.getElementById("salesentry_000") != null) {
            document.getElementById("salesentry_000").style.display = "";
        }
        return true;
    }
}


function ClearTranfer(KeyName, flag) {
    var content = $("#" + KeyName).val();
    content = trim(content);
    if (content == "面议")
        $("#" + KeyName).val("");
    if (content == "")
        $("#" + KeyName).val("面议");
}
function ModifyTranferClass(KeyName, flag) {
    //    document.getElementById(KeyName).value = document.getElementById(KeyName).value.toLowerCase();
    document.getElementById(KeyName).value = document.getElementById(KeyName).value;
    var value = document.getElementById(KeyName).value;
    if (flag) {
        if (value == "") {
            $("#" + KeyName).val("面议");
            $("#" + KeyName).attr('class', 'gray');
        }
        else {
            if (value != "面议") {
                $("#" + KeyName).removeAttr('class');
            }
        }
    }
}
function CheckSwatchPriceOffice(KeyNamePrice, KeyNameSwatch, KeyNameLimit) {
    document.getElementById(KeyNamePrice).value = document.getElementById(KeyNamePrice).value.toLowerCase();
    document.getElementById(KeyNameSwatch).value = document.getElementById(KeyNameSwatch).value.toLowerCase();
    document.getElementById(KeyNameLimit).value = document.getElementById(KeyNameLimit).value.toLowerCase();
    var valuePrice = document.getElementById(KeyNamePrice).value;
    var valueSwatch = document.getElementById(KeyNameSwatch).value;
    var valueLimit = document.getElementById(KeyNameLimit).value;
    if (valuePrice != '' && KeyNameSwatch != '' && KeyNameLimit != '' && check_float(KeyNamePrice) && limitcity.indexOf(cityName) > -1) {

        if (valuePrice < (valueSwatch * valueLimit / 100)) {
            document.getElementById("price_nogood").style.display = "";
            if (document.getElementById("salesentry_00") != null) {
                document.getElementById("salesentry_00").style.display = "none";
            }
            if (document.getElementById("salesentry_000") != null) {
                document.getElementById("salesentry_000").style.display = "none";
            }
            return false;
        }
        else {
            document.getElementById("price_nogood").style.display = "none";
            if (document.getElementById("salesentry_00") != null) {
                document.getElementById("salesentry_00").style.display = "";
            }
            if (document.getElementById("salesentry_000") != null) {
                document.getElementById("salesentry_000").style.display = "";
            }
            return true;
        }
    }
    else {
        document.getElementById("price_nogood").style.display = "none";
        if (document.getElementById("salesentry_00") != null) {
            document.getElementById("salesentry_00").style.display = "";
        }
        if (document.getElementById("salesentry_000") != null) {
            document.getElementById("salesentry_000").style.display = "";
        }
        return true;
    }
}
function changepaydetail() {
    if (document.getElementById("input_y_str_PAYDETAIL4").checked == true) {
        document.getElementById("input_y_str_PAYDETAIL_Y").value = "";
        document.getElementById("input_y_str_PAYDETAIL_F").value = "";
        document.getElementById("input_y_str_PAYDETAIL_Y").disabled = "disabled"
        document.getElementById("input_y_str_PAYDETAIL_F").disabled = "disabled"
    }
    else {
        document.getElementById("input_y_str_PAYDETAIL_Y").disabled = ""
        document.getElementById("input_y_str_PAYDETAIL_F").disabled = ""
    }
}
function checkpaydetail() {
    if (document.getElementById("input_y_str_PAYDETAIL4").checked == true) {
        document.getElementById("input_y_str_PAYDETAIL_sp").style.display = "none";
    }
    else {
        if (document.getElementById("input_y_str_PAYDETAIL_Y").value != "" && document.getElementById("input_y_str_PAYDETAIL_F").value != "") {
            document.getElementById("input_y_str_PAYDETAIL_sp").style.display = "none";
        }
        else {
            document.getElementById("input_y_str_PAYDETAIL_sp").style.display = "";
        }
    }
}
function DisplayAimOperastion() {
    if (document.getElementById("input_n_str_AimOperastion_check").checked == true) {
        document.getElementById("input_n_str_AimOperastion_OtherTxt").style.display = "";
    }
    else {
        document.getElementById("input_n_str_AimOperastion_Other").value = "";
        document.getElementById("input_n_str_AimOperastion_OtherTxt").style.display = "none";
    }
}
function ClearAimOperastion() {
    if (document.getElementById("input_n_str_AimOperastion_Other").value == "可填写八个汉字") {
        document.getElementById("input_n_str_AimOperastion_Other").value = "";
    }
}
//设置page中的值
function SetAimOperastionValue(objName, ovalue) {
    var objList = document.getElementsByName(objName);
    var len = objList.length;
    for (var i = 0; i < len; i++) {
        if (ovalue.indexOf(objList[i].value) > -1)
            objList[i].checked = true;
    }
    if (ovalue.indexOf("其他") > -1) {
        document.getElementById("input_n_str_AimOperastion_OtherTxt").style.display = "";
        document.getElementById(objName + "_Other").value = ovalue.substring(ovalue.indexOf("(") + 1, ovalue.indexOf(")"));
    }
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