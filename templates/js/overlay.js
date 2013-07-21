
//继承覆盖Overlay类，并重定义方法 new DeOverlayC  -- @todo要不要封装
function DeOverlayC(point, html)
{
	this._point = point;
	this._html = html;
}
//继承类
DeOverlayC.prototype = new BMap.Overlay();
DeOverlayC.prototype.initialize = function(map)
{
	this._map = map;
	var div = this._div = document.createElement("div");
	if (document.all)
	{
		this._div.className = 'qu';
	} else {
		this._div.setAttribute('class', 'qu');
	}

	div.innerHTML = this._html;
	div.onmouseover = function() {
		var child = $(this).find('div:first');
		var type = $(child).attr('type');
		if(type != 'speical'){//如果非快速定位,触发滑过效果
			child.addClass('on');
			$(this).css('z-index', '100');
			if(type != 'sum')//不是汇总
				$(this).find('.value').css('display', 'inline');	//值显示
		}
	};

    div.onmouseout = function() {
    	var child = $(this).find('div:first');
		var type = $(child).attr('type');
		if(type != 'speical'){//如果非快速定位,触发滑过效果
			child.removeClass('on');
			$(this).css('z-index', '-1');
			if(type != 'sum')//不是汇总
				$(this).find('.value').css('display', 'none');//值隐藏	
		}

    };
	$(div).click(function(e){
		var child = $(this).find('div:first');
		var type = $(child).attr('type');
		var id = $(child).attr('id');
		if(type != 'speical'){//如果非快速定位,点击事件
			if(type == 'sum')//不是汇总
			{
				var lng = $(child).attr('lng');//经度
				var lat = $(child).attr('lat');//纬度
				var point = new BMap.Point(lng,lat);
				objMap.centerAndZoom(point, 14);		
			}
			else{
				var position = reSetNewBlockPosition(getMousePosition(e));//在此位置打开信息面板
				 if(type == 'sell' || type == 'rent'){
					 showSecondHand(id,position);//显示二手房或租房
				 }
				 else
				{
					 showProperty(id,position);//显示新盘
				}	 
			}
		}
	});
	objMap.getPanes().labelPane.appendChild(div);
	return div;
}

DeOverlayC.prototype.draw = function()
{
	  var map = this._map;
	  var pixel = map.pointToOverlayPixel(this._point);
	  this._div.style.left = pixel.x  + 'px';
	  this._div.style.top  = pixel.y  - 38 + 'px';
	  this._div.style.position = "absolute";
}
