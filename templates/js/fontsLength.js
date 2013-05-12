$.fn.extend({
    InitFontLength: function(outputId, maxNum) {
        var _self = $(this);
        var _outputObj = $(outputId).closest("div");
        _outputObj.show();
        var getFontLength = function() {
            var newVal = _self.val().replace(/[^\x00-\xff]/g, "**");
            var count = newVal.length;
            if (count <= maxNum) { $(outputId).html(maxNum - count); }
            else { _self.val(subFontLength(_self.val())) }
            $(outputId).html(maxNum - _self.val().replace(/[^\x00-\xff]/g, "**").length);
        }
        var subFontLength = function(str) {
            var m = 0;
            var ary = str.split("");
            var length = ary.length;
            var returnstr = "";
            for (var i = 0; i < length; i++) {
                var temp = returnstr;
                temp += ary[i];
                if (temp.replace(/[^\x00-\xff]/g, "**").length > maxNum) {
                    return returnstr;
                }
                else {
                    returnstr = temp;
                }
            }
            return returnstr;
        }
        _self.change(function() {
            if (_self.val().replace(/[^\x00-\xff]/g, "**").length > maxNum) {
                var maxstr = subFontLength(_self.val());
                _self.val(maxstr);
            }
            getFontLength();
        }).keyup(function() {
            if (_self.val().replace(/[^\x00-\xff]/g, "**").length > maxNum) {
                var maxstr = subFontLength(_self.val());
                _self.val(maxstr);
                if (_self.attr('type') == 'textarea') {
                }
            }
            getFontLength();
        }).focus(function() {
            getFontLength();
            _outputObj.show();
        });//.blur(function() {
           // _outputObj.hide();
        //});
    }
});