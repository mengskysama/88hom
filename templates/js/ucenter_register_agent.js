var HotCityName;
var cityArray = new Array();
var citydata;
var MobilCityName;
var isRealUserNameValid = false;
$(document).ready(function () {
    HotCityName = "北京|bj|beijing,上海|sh|shanghai,广州|gz|guangzhou,深圳|sz|shenzhen,成都|cd|chengdu,天津|tj|tianjin,重庆|cq|chongqing,苏州|sz|suzhou,杭州|hz|hangzhou,南京|nj|nanjing,武汉|wh|wuhan,大连|dl|dalian,青岛|qd|qingdao,南昌|nc|nanchang,东莞|dg|dongguan,济南|jn|jinan,石家庄|sjz|shijiazhuang,无锡|wx|wuxi,昆明|km|kunming,西安|xa|xian,郑州|zz|zhengzhou";
    citydata = $("#hidden_citys").val();
    cityArray = citydata.split(',');

    $("#userRealName").blur(function() { 
    	var realName = $("#userRealName").val(); 
    	if(!checkChinese(realName)){
            ShowWrong($("#userRealName"), "姓名只能为汉字", "");
            isRealUserNameValid = false;
    	}else{
    		ShowWrong($("#userRealName"), "", "");
    		isRealUserNameValid = true;
    	}
    });
    
    $("#txtUserPhone").blur(function() { 
    	checkUserPhone();
    	ajax_mobile();
    });
    

    $("#agentRegForm").submit(function() {
    	if (check()) {
            return true;
        } else {
            return false;
        }
    });

    $("#agent_reg_confirm").click(function() {
        $("#agent_reg_confirm").attr("disabled", true);
        if (check()) {
            document.getElementById("agentRegForm").submit();
        } else {
            $("#agent_reg_confirm").removeAttr("disabled");
        }
    });
    
});

function check() {
    check_pass($("#userPassword"));
    check_pass1($("#confirmUserPass"));

    if ($("#userEmail").val() == '') {
        ShowWrong($("#userEmail"), "请输入邮箱地址", "");
        isemaivalid = false;
        return false;
    }

    check_mobilebase();
    if (isMobileValid) {
        check_mobile(this);
    }
    if (!isMobileValid) return false;
    
    check_code($("#phoneCert"));
    if(!isCodeValid) return false;
    
    ajax_email();
    if(!isemaivalid) return false;
    
    if (!$("#agree_ucenter").prop("checked")) {
        alert("请先选中同意《服务条款》和《隐私权相关政策》");
        return false;
    }

    if (!(isNameValid && isPassValid && isPassConfirmValid && isMobileValid && isemaivalid && isRealUserNameValid)) {
        alert("请按照页面的提示重新填写信息。");
        return false;
    }

    return true;
}

//验证是否是中文
function checkChinese(str) {
	var pattern = "^[\\u4E00-\\u9FA5\\uF900-\\uFA2D]+$";
	var reg = new RegExp(pattern);
	return reg.test(str);
};


function ShowWrong(obj, message, className) {
	var showObject = $("#div_err_msg");
	showObject.html("<div class=\"" + className + "\">" + message + "</div>");
}

//城市切换
var city1ID = '';
function city1(id) {
    var city1Obj = document.getElementById('c' + city1ID);
    if (city1Obj) {
        city1Obj.style.display = 'none';
        document.getElementById('d' + city1ID).className = 'option2';
    }
    var obj = document.getElementById('c' + id);
    document.getElementById('d' + id).className = 'option1';
    obj.style.display = '';
    city1ID = id;
}
//获得热门城市
function GetIndex() {
    var ShowIndexCity = "";
    var HotCityArray = new Array();
    HotCityArray = HotCityName.split(',');
    for (var i = 0; i < HotCityArray.length; i++) {
        var HotCityInfo = new Array();
        HotCityInfo = HotCityArray[i].split('|');
        ShowIndexCity += "<li onclick=ClickCity('" + HotCityInfo[0] + "')>" + HotCityInfo[0] + "</li>";
    }
    $("#c1").html(ShowIndexCity);
    $("#tab_select").show();
}
//获得列表数据(按字母检索)
function GetHotCity(e, where) {
    if ($("#c" + e).html().replace(/^\s+|\s+$/g, "") == "") {
        var ReturnCity = new Array();
        var WhereArray = new Array();
        WhereArray = where.split(',');
        var SortCityHtml = "";
        for (var i = 0; i < cityArray.length; i++) {
            var CityInfo = new Array();
            CityInfo = cityArray[i].split('|');
            if (CityInfo.toString() != "") {
                var sortarray = CityInfo[1].substring(0, 1) + "," + CityInfo[0];
                ReturnCity.push(sortarray);
            }
        }
        ReturnCity.sort();
        var liHtml = "";
        for (var i = 0; i < WhereArray.length; i++) {
            for (var k = 0; k < ReturnCity.length; k++) {
                var CityInfo = new Array();
                CityInfo = ReturnCity[k].split(',');
                if (WhereArray[i] == CityInfo[0]) {
                    liHtml += "<li onclick=ClickCity('" + CityInfo[1] + "')>" + CityInfo[1] + "</li>";
                }
            }
            if (liHtml == "" || liHtml.length < 1) {
                //liHtml += "<li>无数据</li>";
            }
            if (liHtml == "") {

            } else {
                SortCityHtml += "<div class='zimu'>" + WhereArray[i].toUpperCase() + "：</div><div class='city'><ul>" + liHtml + "</ul></div>";
                liHtml = "";
            }
        }
        $("#c" + e).html(SortCityHtml);
    }
}
//Table中选中城市
function ClickCity(e) {
    $('#txtCity').val(e);
    $('#tab_select').hide();
    $("#search_select").hide();
    $("#txtDistrict").val("选择区县");
    $("#txtComareas").val("选择商圈          (商圈不能为空)");
    //ShowCityInfo(e);
    //FillCompany(); //加载公司
    MobilCityName = e;
}
//选择区县
function ClickDistrict(e,v) {
	//$("#valDistrict").val(v);
    $("#txtDistrict").val(e);
    $("#txtComareas").val("选择商圈          (商圈不能为空)");
    $("#search_d").hide();
    if (e != "") {
        $("#txtDistrict").removeClass("input_error");
    }
}
//选择商圈
function ClickComareas(e,v) {
	$('#areaIndex').val(v);//省，市，区域，片区下标,以"-"隔开
    $("#txtComareas").val(e);
    $("#search_c").hide();
    if (e != "") {
        $("#txtComareasTip").html("<span class='onCorrect'></span>");
        $("#txtComareas").removeClass("input_error");
    }
}
//控件失去焦点，隐藏下拉
function HideBox(ids) {
    setTimeout("$('#" + ids + "').hide();", 300);
}

function SelectCity(e) {
    $('#tab_select').hide();
    $('#search_select').show();
    if (e != "") {
        $("#SearchKey").html("<dt>" + e + "</dt>");
    }
    var HtmlTD = "";
    var HtmlTable = "";
    for (var i = 0; i < cityArray.length; i++) {
        if (cityArray[i].indexOf(e.toLowerCase()) > -1) {
            var NewCitySort = new Array();
            NewCitySort = cityArray[i].split('|');
            if (NewCitySort[0].indexOf(e) > -1) {
                switch (e.length) {
                    case 1:
                        if (NewCitySort[0].substring(0, 1) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    case 2:
                        if (NewCitySort[0].substring(0, 2) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    case 3:
                        if (NewCitySort[0].substring(0, 3) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    case 4:
                        if (NewCitySort[0].substring(0, 4) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    default:
                        if (NewCitySort[0].indexOf(e.toLowerCase()) > -1) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                }
                //HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
            }
            else if (NewCitySort[1].indexOf(e.toLowerCase()) > -1) {
                switch (e.length) {
                    case 1:
                        if (NewCitySort[1].substring(0, 1) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    case 2:
                        if (NewCitySort[1].substring(0, 2) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    case 3:
                        if (NewCitySort[1].substring(0, 3) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    case 4:
                        if (NewCitySort[1].substring(0, 4) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    default:
                        if (NewCitySort[1].indexOf(e.toLowerCase()) > -1) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                }
                //                if (e.length == 1) {
                //                    if (NewCitySort[1].substring(0, 1) == e.toLowerCase()) {
                //                        HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                //                    }
                //                }
                //                HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
            } else if (NewCitySort[2].indexOf(e.toLowerCase() > -1)) {
                switch (e.length) {
                    case 1:
                        if (NewCitySort[2].substring(0, 1) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    case 2:
                        if (NewCitySort[2].substring(0, 2) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    case 3:
                        if (NewCitySort[2].substring(0, 3) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    case 4:
                        if (NewCitySort[2].substring(0, 4) == e.toLowerCase()) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                    default:
                        if (NewCitySort[2].indexOf(e.toLowerCase()) > -1) {
                            HtmlTD = "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>" + HtmlTD;
                        }
                        break;
                }
            }
            //else {
            //                HtmlTD = HtmlTD + "<dd id='sdd" + i + "' name='sdd" + i + "' onclick=ClickCity('" + NewCitySort[0] + "')><span class='floatl'>" + NewCitySort[0] + "</span><span class='floatr'>" + NewCitySort[2] + "</span></dd>";
            //            }
            HtmlTable = HtmlTD;
        }
    }
    if (HtmlTD.length > 0) {
        $("#SearchValue").html(HtmlTable);
        $("#SearchValue").show();
        //判断选项的多少确定样式
        if ($("#SearchValue").children("dd").length > 8) {
            $("#search_select").removeClass("search_select");
            $("#search_select").addClass("search_select0");
        } else {
            $("#search_select").removeClass("search_select0");
            $("#search_select").addClass("search_select");
        }
    } else {
        var error = "";
        error = e.length > 10 ? e.substring(0, 9) + ".." : e;
        $("#SearchKey").html("<dt>对不起，找不到 " + error + "</dt>");
        $("#SearchValue").html("");
        $("#SearchValue").hide();
    }
    if (e == "") {
        $("#SearchValue").hide();
    }
}
//首次单击时清空输入框
function ClearInput() {
    $("#txtCity").val("");
    //    if ($("#txtCity").val().replace(/^\s+|\s+$/g, "") == "选择或输入中文/拼音") {
    //        $("#txtCity").val("");
    //    }
}

//控制键盘箭头
function onKey(e, id) {
    if (id == "search_select") {
        if ($.trim($("#txtCity").val()) == "" || $.trim($("#txtCity").val()) == "选择城市") {
            return;
        }
    }
    e = e ? e : window.event;
    var keyCode = e.which ? e.which : e.keyCode;
    //在搜索框显示的情况下
    GetSelectCityID(id, keyCode);
}
//选中某一项
function SelectonKeyDown(t, e, id) {
    e = e ? e : window.event;
    var keyCode = e.which ? e.which : e.keyCode;
    if (!$("#" + id).is(":hidden")) {
        if (keyCode == 13) {
            if ($.trim($("#nowSelectID").val()) != "") {
                $("#" + t).val($("#" + $("#nowSelectID").val() + " .floatl").text());
                $("#" + id).hide();
                if (id == "search_select") {
                   // ShowCityInfo($("#" + $("#nowSelectID").val() + " .floatl").text());
                    $("#txtDistrict").val("选择区县");
                    $("#txtComareas").val("选择商圈           (商圈不能为空)");
                    //FillCompany(); //加载公司
                }
                if (id == "search_d") {
                    $("#txtComareas").val("选择商圈           (商圈不能为空)");
                    $("#txtDistrict").removeClass("input_error");
                }
                if (id == "select_company") {
                    //获取图片
                    var img = $("#" + $("#nowSelectID").val() + " .filoatimg").text();
                    var val = $("#" + $("#nowSelectID").val() + " .floatl").text();
                    ClickCompany(img, val);
                }
            }
        }
    }
}
window.document.onkeydown = function (e) {
    e = e ? e : window.event;
    var keyCode = e.which ? e.which : e.keyCode;
    if (keyCode == 13) {
        if ($.trim($("#nowSelectID").val()) == "") {
            return false;
        }
        if ($("#search_select").is(":hidden") && $("#search_d").is(":hidden") && $("#search_c").is(":hidden") && $("#select_company").is(":hidden")) {
            return false;
        }
    }
}
function onkeydownEnter(e) {
    e = e ? e : window.event;
    var keyCode = e.which ? e.which : e.keyCode;
    if (keyCode == 13) {
        return false;
    }
}
function GetSelectCityID(id, keyCode) {
    if (!$("#" + id).is(":hidden")) {
        if (keyCode == 38) {
            if ($("#nowSelectID").val() == "") {
                $("#nowSelectID").val($("#" + id + " dl dd").eq(0).attr("id") == null ? $("#" + id + " dl dd").eq(1).attr("id") : $("#" + id + " dl dd").eq(0).attr("id"));
                $("#" + $("#nowSelectID").val()).addClass("dd1");
            } else {
                $("#" + $("#nowSelectID").val()).prev("dd").addClass("dd1");
                $("#" + $("#nowSelectID").val()).removeClass("dd1");
                $("#nowSelectID").val($("#" + $("#nowSelectID").val()).prev("dd").attr("id"));

            }
        }
        if (keyCode == 40) {
            if ($("#nowSelectID").val() == "") {
                $("#nowSelectID").val($("#" + id + " dl dd").eq(0).attr("id") == null ? $("#" + id + " dl dd").eq(1).attr("id") : $("#" + id + " dl dd").eq(0).attr("id"));
                $("#" + $("#nowSelectID").val()).addClass("dd1");
            } else {
                $("#" + $("#nowSelectID").val()).next("dd").addClass("dd1");
                $("#" + $("#nowSelectID").val()).removeClass("dd1");
                $("#nowSelectID").val($("#" + $("#nowSelectID").val()).next("dd").attr("id"));
            }
        }
        if (keyCode != 38 && keyCode != 40 && keyCode != 13) {
            $("#nowSelectID").val("");
        }
    }
}
//显示区县列表
function ShowDistrict() {
    var city = $("#txtCity").val();
    $("#txtDistrict").focus();
    FillDistrict(city);
    if ($('#search_d dl dd').length > 0) {
        $('#search_d').show();
        $("#nowSelectID").val("");
        if ($('#search_d dl dd').length > 8) {
            $("#search_d").removeClass("search_select01 left133");
            $("#search_d").addClass("search_select001 left133");
        } else {
            $("#search_d").removeClass("search_select001 left133");
            $("#search_d").addClass("search_select01 left133");
        }
    } else {
        $("#search_d_value").html("<dd>请选择城市</dd>");
    }
}
//显示商圈列表
function ShowComareas() {
    var city = $("#txtCity").val();
    var District = $("#txtDistrict").val();
    $("#txtComareas").focus();
    FillComareas(city, District);
    if ($('#search_c dl dd').length > 0) {
        $('#search_c').show();
        $("#nowSelectID").val("");
        if ($('#search_c dl dd').length > 8) {
            $("#search_c").removeClass("search_select01 left133");
            $("#search_c").addClass("search_select001 left133");
        } else {
            $("#search_c").removeClass("search_select001 left133");
            $("#search_c").addClass("search_select01 left133");
        }
    } else {
        $("#search_c_value").html("<dd>请选择区县</dd>");
    }
}


//——————————————————加载区县商圈——————————————//
function FillDistrict(City) {
    $("#txtDistrict").val("");
    var DistrictSelect = "";
    var ready = false;
    var addi = 0;
    for (var i in P) {
        if (ready == true) break;
        for (var j in C[i]) {
            if (C[i][j] == City) {
                for (var k in D[i][j]) {
                    if (D[i][j][k] != "不限")//=======================================================k 代表区下标
                        DistrictSelect += "<dd name='dsdd" + addi + "' id='dsdd" + addi + "' onclick=ClickDistrict('" + D[i][j][k] + "')><span class='floatl'>" + D[i][j][k] + "</span></dd>"; //  sel.options.add(new Option(D[i][j][k], D[i][j][k]));
                    addi = addi + 1;
                }
                ready = true;
                break;
            }
        }
    }
    $("#search_d_value").html(DistrictSelect);
}
//填充片区
function FillComareas(City, District) {
    $("#txtComareas").val(""); ;
    var ComareasSelect = "";
    var ready = false;
    var addi = 0;
    for (var i in P) {
        if (ready == true) break;
        for (var j in C[i]) {
            if (C[i][j] == City) {
                for (var k in D[i][j]) {
                    if (D[i][j][k] == District) {
                        for (var x in A[i][j][k]) {
                            if (A[i][j][k][x] != "不限")//============================================================================(i+'-'+'j'+'-'+k+'-'+x)i j k x 代表下标
                                ComareasSelect += "<dd name='csdd" + addi + "' id='csdd" + addi + "' onclick=ClickComareas('" + A[i][j][k][x] + "','"+(i+'-'+j+'-'+k+'-'+x)+"')><span class='floatl'>" + A[i][j][k][x] + "</span></dd>"; //sel.options.add(new Option(A[i][j][k][x], A[i][j][k][x]));
                            addi = addi + 1;
                        }
                        ready = true;
                        break;
                    }
                }
                ready = true;
                break;
            }
        }
    }
    $("#search_c_value").html(ComareasSelect);
}

function ClickDivShow(divid) {
    $("#txtCity").focus();
}

//区县为空时，清空商圈
function ClearComareas() {
    if ($.trim($("#txtDistrict").val()) == "") {
        $("#txtComareas").val("");
        //var returnObj = $.formValidator.oneIsValid("txtComareas");
        //$.formValidator.showMessage(returnObj);
    }
}



