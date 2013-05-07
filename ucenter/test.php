<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>test</title>
<script language="JavaScript" type="text/javascript" src="/88hom/templates/js/jquery-1.6.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function() {

    $("#button2").click(function() {
    	//var is_agree = $("#agree").attr("checked");
        $("#button2").attr("disabled", true);
    	alert($("#agree").prop("checked"));
    	var isSelected = $("#agree").prop("checked"); 
    });
});
</script>
</head>
<body>
<form id="testform" action="#" method="post">
<div class="zcjz"><input id="agree" name="agree" type="checkbox" class="message_t01" value="yes" /><span class="message_t02">同意</span></div>
<div class="dlmm"><input name="button2" type="button" class="denglu" id="button2" value="测试" /></div>
</form>
</body>
</html>