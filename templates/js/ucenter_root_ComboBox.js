document.comboBoxes = new Array();
document.comboBox = null;
var $images = 'http://img.soufun.com/secondhouse/image/';
ComboBox = function(id)
{
	this.id = id;
	this.width = 'auto';
	this.frameWidth = null;
	this.columns = 1;
	this.labelPosition = 'top'; 
	this.text = '';
	this.value = '';
	this.groupClass = '';
	this.itemClass = '';
	this.itemOverClass = '';
	this.itemSelectedClass = '';
	this.groups = [];
	this.tips = {frameTop:null, frameBottom:null};
}
ComboBox.prototype.element = null;ComboBox.prototype.textBox = null;ComboBox.prototype.hiddenField = null;ComboBox.prototype.arrow = null;ComboBox.prototype.frame = null;ComboBox.prototype.frameTable = null;
ComboBox.prototype.__overItem = null;ComboBox.prototype.__focusItem = null;
ComboBox.prototype.selectedItem = null;ComboBox.prototype.selectedIndex = '';
ComboBox.prototype.onselect = null;
ComboBox.prototype.clear = function()
{
	this.groups.length = 0;
	var div = ComboBox.createElement('DIV', {innerHTML:'&nbsp;'}, {width:this.frameTable.offsetWidth + 'px'});
	this.frameTable.parentNode.appendChild(div);
	var rows = this.frameTable.tBodies[0].childNodes;
	for (var i=rows.length-1; i>=0; i--)
	{
		rows[i].parentNode.removeChild(rows[i]);	
	}
	this.text = '';
	this.value = '';	
	this.textBox.value = '';
	this.hiddenField.value = '';
	this.__balanceFrameSize();
}
ComboBox.prototype.initialize = function()
{
	var element = document.getElementById(this.id);
	var childNodes = element.childNodes;
	var position;
	var group, items, item, propertyValue;
	for (var i=0; i<childNodes.length; i++)
	{
		if (childNodes[i].nodeType == 1)
		{
			if (childNodes[i].getAttribute('type') == 'tip')
			{
				position = childNodes[i].getAttribute('position');
				if (position == null) position = 'frameTop';
				position = position.replace('top', 'Top');
				position = position.replace('bottom', 'Bottom');
				this.tips[position] = childNodes[i].innerHTML;
			}
			else if (childNodes[i].getAttribute('type') == 'group')
			{
				group = new ComboBox.Group();
				group.label = childNodes[i].getAttribute('label');
				group.normalClass = childNodes[i].getAttribute('normalClass');
				items = childNodes[i].childNodes;
				for (var j=0; j<items.length; j++)
				{
					if (items[j].nodeType == 1)
					{
						item = new ComboBox.Item();						
						for (var name in item)
						{
							propertyValue = items[j].getAttribute(name);
							if (propertyValue != null) item[name] = propertyValue;														
						}
						group.items[group.items.length] = item;
					}
				}
				this.groups[this.groups.length] = group;
			}
		}
	}
	if (/^\d+$/.test(this.width)) this.width += 'px';
	if (this.value == null) this.value = this.text;
	this.labelPosition = this.labelPosition.toLowerCase();
	if (this.labelPosition != 'left' && this.labelPosition != 'top') this.labelPosition = 'top';
	if (this.itemOverClass == '') this.itemOverClass = this.itemClass;
	if (this.itemSelectedClass == '') this.itemSelectedClass = this.itemOverClass;
	for (var tipName in this.tips)
	{
		if (this.tips[tipName] == '') this.tips[tipName] = null;
	}
	var table, tbody, tr, td;
	table = ComboBox.createElement('TABLE', {cellPadding:0, cellSpacing:0, border:0}, {width:this.width, border:'1px solid #A5A4BA', backgroundImage:'url(' + $images + 'control-bg.png)', backgroundPosition:'bottom', backgroundRepeat:'repeat-x'});	
	tbody = ComboBox.createElement('TBODY');
	tr = ComboBox.createElement('TR');
	td = ComboBox.createElement('TD', null);
	var textBox = ComboBox.createElement('INPUT', {type:'text', value:this.text, readOnly:true}, {width:'98%', paddingLeft:'3px', lineHeight:'14px', fontSize:'12px', fontFamily:'Tahoma', border:'none', background:'none', cursor:'default'});
	td.appendChild(textBox);
	var hiddenField = ComboBox.createElement('INPUT', {type:'hidden', name:this.id, value:this.value});
	td.appendChild(hiddenField);
	tr.appendChild(td);
	td = ComboBox.createElement('TD', {align:'right'}, {padding:'1px'});
	var img = ComboBox.createElement('IMG', {src:$images + 'arrow0.gif'});	
	td.style.width = img.offsetWidth + 2 + 'px';
	td.appendChild(img);
	tr.appendChild(td);
	tbody.appendChild(tr);
	table.appendChild(tbody);
	element.parentNode.insertBefore(table, element);
	element.parentNode.removeChild(element);
	table.id = this.id;
	this.element = table;
	this.textBox = textBox;
	this.hiddenField = hiddenField;
	this.arrow = img;	
	var frameDiv = ComboBox.createElement('DIV', {id:this.id + '_FrameDiv'}, {position:'absolute', zIndex:1, display:'none', visibility:'hidden', border:'1px solid #B3B3B3', padding:'0px', backgroundColor:'#FFFFFF'});
	var slideDiv = ComboBox.createElement('DIV', {id:this.id + '_FrameSlideDiv'});
	var topTipDiv = ComboBox.createElement('DIV', {id:this.id + '_FrameTopTipDiv'}, {backgroundImage:'url(' + $images + 'toptip-bg.gif)', backgroundPosition:'bottom', backgroundRepeat:'repeat-x', borderBottom:'1px solid #D5D5D5'});
	if (this.tips.frameTop != null)
	{
		topTipDiv.innerHTML = this.tips.frameTop;
	}
	else
	{
		topTipDiv.style.display = 'none';
	}
	slideDiv.appendChild(topTipDiv); 
	var tableDiv = ComboBox.createElement('DIV', null, {padding:'1px'});
	var frameTable = ComboBox.createElement('TABLE', {id:this.id + '_Items', cellPadding:0, cellSpacing:0, border:0}, {backgroundColor:'#FFFFFF', cursor:'default'});
	tbody = ComboBox.createElement('TBODY');
	frameTable.appendChild(tbody);
	tableDiv.appendChild(frameTable);
	slideDiv.appendChild(tableDiv);
	var bottomTipDiv = ComboBox.createElement('DIV', {id:this.id + '_FrameBottomTipDiv'}, {borderTop:'1px solid #D5D5D5', backgroundImage:'url(' + $images + 'bottomtip-bg.png)', backgroundPosition:'bottom', backgroundRepeat:'repeat-x'})
	if (this.tips.frameBottom != null)
	{
		bottomTipDiv.innerHTML = this.tips.frameBottom;
	}
	else
	{
		bottomTipDiv.style.display = 'none';
	}	
	slideDiv.appendChild(bottomTipDiv);
	frameDiv.appendChild(slideDiv);
	if (this.element.nextSibling == null)
	{
		this.element.parentNode.appendChild(frameDiv);
	}
	else
	{
		this.element.parentNode.insertBefore(frameDiv, this.element.nextSibling);
	}
	this.frame = frameDiv;
	this.tips.frameTop = topTipDiv;
	this.frameTable = frameTable;
	this.tips.frameBottom = bottomTipDiv;
	for (var i=0; i<this.groups.length; i++)
	{
		this.__appendGroup(this.groups[i], i);	
	}
	if (this.groups.length == 0) this.__balanceFrameSize();
	var comboBox = this;
	this.arrow.onmouseover = function()
	{
		comboBox.__mouseOver();
	}
	this.arrow.onmouseout = function()
	{
		comboBox.__mouseOut();
	}
	this.arrow.onclick = function()
	{
		comboBox.__click();
	}
	this.textBox.onmouseover = function()
	{
		if (this.readOnly)
		{
			comboBox.__mouseOver();	
		}
	}
	this.textBox.onmouseout = function()
	{
		if (this.readOnly)
		{
			comboBox.__mouseOut();	
		}
	}
	this.textBox.onclick = function()
	{
		if (this.readOnly)
		{
			comboBox.__click();	
		}
	}
	this.frameTable.onmousemove = function(ev)
	{
		ev = ev || window.event;
		var target = ev.target || ev.srcElement;
		if (target.nodeName == 'TD' && target.getAttribute('index') != null)
		{
			if (comboBox.__overItem != target && comboBox.__focusItem != target)
			{
				if (comboBox.__overItem != null) comboBox.__overItem.className = comboBox.__overItem.getAttribute('normalClass');
				target.className = target.getAttribute('overClass');
				comboBox.__overItem = target;
			}
		}
	}
	this.frameTable.onmouseout = function()
	{
		if (comboBox.__overItem != null)
		{
			comboBox.__overItem.className = comboBox.__overItem.getAttribute('normalClass');	
			comboBox.__overItem = null;
		}
	}
	this.frameTable.onclick = function(ev)
	{
		ev = ev || window.event;
		var target = ev.target || ev.srcElement;
		if (target.nodeName == 'TD' && target.getAttribute('index') != null)
		{
			if (comboBox.__focusItem != null) comboBox.__focusItem.className = comboBox.__focusItem.getAttribute('normalClass');
			target.className = target.getAttribute('selectedClass');
			comboBox.__focusItem = target;
			comboBox.__overItem = null;
			comboBox.selectedIndex = target.getAttribute('index');
			var index = comboBox.selectedIndex.split(',');
			comboBox.selectedItem = comboBox.groups[parseInt(index[0])].items[parseInt(index[1])];
			comboBox.textBox.value = comboBox.selectedItem.text;
			comboBox.hiddenField.value = (comboBox.selectedItem.value != null ? comboBox.selectedItem.value : comboBox.selectedItem.text);
			comboBox.text = comboBox.selectedItem.text;
			comboBox.value = comboBox.hiddenField.value;
			comboBox.__executeEvent('onselect');
		}
	}
	var bodies = [document, document.body, document.documentElement];
	for (var i=0; i<bodies.length; i++)
	{
		if (bodies[i].onclick == null)
		{
			bodies[i].onclick = function(ev)
			{
			    try{
				if (document.comboBox != null)
				{
					ev = ev || window.event;
					var target = ev.target || ev.srcElement;
					if (target != document.comboBox.arrow
							&& target != document.comboBox.textBox
							&& !ComboBox.__isTipInput(target)
						)
					{
						document.comboBox.hideFrame();
					}
				}
				}
				catch(error)
				{
				    alert(error);
				}
			}
			break;
		}
	}
	document.comboBoxes[this.id] = this;
}
ComboBox.prototype.__mouseOver = function()
{
	if (this.arrow.src.indexOf('arrow0.gif') > -1)
	{
		this.arrow.src = $images + 'arrow2.gif';
		this.element.style.borderColor = '#FF9100';
	}
}
ComboBox.prototype.__mouseOut = function()
{
	if (this.arrow.src.indexOf('arrow2.gif') > -1)
	{
		this.arrow.src = $images + 'arrow0.gif';	
		this.element.style.borderColor = '#999999';
	}
}
ComboBox.prototype.__click = function()
{

	if (this.arrow.src.indexOf('arrow1.gif') == -1)
	{
		this.showFrame();
	}
	else
	{
		this.hideFrame();	
	}
}
ComboBox.__isTipInput = function(target)
{
	if (target.nodeName == 'INPUT' && target.type == 'text')
	{
		var tip = target.parentNode;
		var isTip = false;
		while (tip.nodeName != 'BODY' && tip.nodeName != 'HTML')
		{
			if (/TipDiv$/.test(tip.id))
			{
				isTip = true;
				break;
			}
			else
			{
				tip = tip.parentNode;	
			}
		}
		return isTip;
	}
	else
	{
		return false;	
	}
}
ComboBox.prototype.showFrame = function()
{

	if (document.comboBox != null) document.comboBox.hideFrame();
	this.arrow.src = $images + 'arrow1.gif';
	this.element.style.borderColor = '#FF9100';
	this.element.style.borderBottomWidth = '0px';
	this.frame.style.display = '';
	this.frame.style.visibility = 'visible';
	document.comboBox = this;
}
ComboBox.prototype.hideFrame = function()
{
	this.arrow.src = $images + 'arrow0.gif';
	this.element.style.borderColor = '#999999';
	this.element.style.borderBottomWidth = '1px';
	this.frame.style.visibility = 'hidden';
	this.frame.style.display = 'none';
	document.comboBox = null;
}
ComboBox.prototype.addGroup = function(group)
{
	var i = this.groups.length;
	this.groups[i] = group;	
	this.__appendGroup(group, i);
};
ComboBox.prototype.__appendGroup = function(group, i)
{
	var tbody = this.frameTable.tBodies[0];
	var tr, td;
	if (group.label == null) group.label = '';
	var columns = this.__EvaluateNumericPropertyValue('columns', 1);
	if (columns < 1) columns = 1;
	if (this.labelPosition == 'top' && group.label != '')
	{
		tr = ComboBox.createElement('TR');
		td = ComboBox.createElement('TD', {className:this.groupClass, innerHTML:group.label, colSpan:columns});
		tr.appendChild(td);
		tbody.appendChild(tr);
	}
	var rows = Math.floor(group.items.length / columns);
	if (group.items.length % columns > 0) rows ++;
	if (rows == 0 && this.labelPosition == 'left' && group.label != '')
	{
		rows = 1;
	}
	var index, item;
	for (var j=0; j<rows; j++)
	{
		tr = ComboBox.createElement('TR');
		if (this.labelPosition == 'left' && group.label != '')
		{
			td = ComboBox.createElement('TD', {className:this.groupClass, innerHTML:'&nbsp;'});
			if (j == 0) td.innerHTML = group.label;
			tr.appendChild(td);
		}
		for (var k=0; k<columns; k++)
		{
			td = ComboBox.createElement('TD', {nowrap:'nowrap'});
			index = columns * j + k;
			if (index < group.items.length)
			{
				item = group.items[index];
				td.innerHTML = item.text;
				td.setAttribute('index', i + ',' + index);
				if (item.normalClass == '') item.normalClass = this.itemClass;
				td.className = item.normalClass;
				if (item.overClass == '') item.overClass = this.itemOverClass;
				if (item.selectedClass == '') item.selectedClass = this.itemSelectedClass;
				td.setAttribute('normalClass', item.normalClass);
				td.setAttribute('overClass', item.overClass);
				td.setAttribute('selectedClass', item.selectedClass);
			}
			else
			{
				td.innerHTML = '&nbsp;';
			}
			tr.appendChild(td);
		}
		tbody.appendChild(tr);
	}
	if (this.frameTable.nextSibling != null) this.frameTable.parentNode.removeChild(this.frameTable.nextSibling);
	this.__balanceFrameSize();
}
ComboBox.prototype.updateTip = function(tipName, html)
{
};
ComboBox.Group = function(label)
{
	this.label = label;
	this.items = [];
}
ComboBox.Group.prototype.add = function(item)
{
	this.items[this.items.length] = item;
};
ComboBox.Group.prototype.remove = function(item)
{
};
ComboBox.Item = function(text, value)
{
	this.text = text;
	this.value = value;
	this.spell = '';
	this.initial = '';
	this.normalClass = '';
	this.overClass = '';
	this.selectedClass = '';
}
ComboBox.createElement = function(nodeName, properties, styles)
{
	var element = document.createElement(nodeName);
	if (properties != null)
	{
		for (var property in properties)
		{
			element[property] = properties[property];
		}
	}
	if (styles != null)
	{
		for (var style in styles)
		{
			element.style[style] = styles[style];
		}
	}
	return element;
}
ComboBox.prototype.__parseBoolean = function(propertyName, defaultValue)
{
	var propertyValue = this[propertyName];
	if (propertyValue == null) propertyValue = defaultValue;
	if (typeof(propertyValue) == 'string')
	{
		if(/^true$/i.test(propertyValue) || /^false$/i.test(propertyValue))
		{
			propertyValue = propertyValue.toLowerCase();
		}
		propertyValue = eval(propertyValue);		
	}
	if (propertyValue != true && propertyValue != false) propertyValue = defaultValue;
	this[propertyName] = propertyValue;
}
ComboBox.prototype.__EvaluateNumericPropertyValue = function(propertyName, defaultValue)
{
	var propertyValue = this[propertyName];
	if (propertyValue == null) propertyValue = defaultValue;
	if (typeof(propertyValue) == 'string')
	{
		propertyValue = eval(propertyValue);		
	}
	else if (typeof(propertyValue) == 'function')
	{
		propertyValue = propertyValue();
	}
	if (typeof(propertyValue) != 'number') propertyValue = defaultValue;
	return propertyValue;
}
ComboBox.prototype.__resetFrameSize = function()
{
	this.frame.style.width = null;		
	this.frameTable.style.width = null;
	this.frameTable.parentNode.style.height = null;
}
ComboBox.prototype.__balanceFrameSize = function()
{
	if (this.frameWidth != null)
	{
		var width = parseInt(this.frameWidth);
		this.frame.style.width = width + 'px';
		this.frame.firstChild.style.width = width + 'px';
		this.tips.frameTop.style.width = width - 2 + 'px';
		this.tips.frameBottom.style.width = width - 2 + 'px';
		this.frameTable.style.width = width - 4 + 'px';
		this.frameTable.parentNode.style.width = width - 2 + 'px';
	}
	else
	{
		this.__resetFrameSize();
		this.frame.style.display = '';
		var width;
		if (this.frame.offsetWidth < this.element.offsetWidth)
		{
			width = this.element.offsetWidth;		
			this.frame.style.width = width - 2 + 'px';		
			this.frameTable.style.width = width - 4  + 'px';
		}
		else
		{
			if (this.frameTable.offsetWidth < this.tips.frameTop.offsetWidth - 2) this.frameTable.style.width = this.tips.frameTop.offsetWidth - 2 + 'px';
			if (this.frameTable.offsetWidth < this.tips.frameBottom.offsetWidth - 2) this.frameTable.style.width = this.tips.frameBottom.offsetWidth - 2 + 'px';
		}
		this.frame.style.display = 'none';
	}
}
ComboBox.prototype.__executeEvent = function(eventName, argument)
{
	if(this[eventName] != null)
	{
		if(typeof(this[eventName]) == 'function')
		{
			this[eventName](argument);
		}
		else if(typeof(this[eventName]) == 'string')
		{
			var ev;
			eval('ev = function(){' + this[eventName] + '}');							
			ev.call(this, argument);			
		}
	}	
}
function __InitializeComboBoxes()
{
	var comboBoxes = document.getElementsByTagName('ComboBox');
	var ids = new Array(comboBoxes.length);
	for (var i=0; i<comboBoxes.length; i++)
	{
		if (comboBoxes[i].id == '') treeViews[i].id = '__ComboBox_' + i;
		ids[i] = comboBoxes[i].id;
	}
	var parentNode, html;
	for (var i=0; i<ids.length; i++)
	{
		parentNode = document.getElementById(ids[i]).parentNode;
		html = parentNode.innerHTML;
		html = html.replace(/<combobox/i, '<div');
		html = html.replace(/<\/combobox>/i, '</div>');
		while (/<tip/i.test(html))
		{
			html = html.replace(/<tip/i, '<span type="tip"');
		}
		while (/<\/tip>/i.test(html))
		{
			html = html.replace(/<\/tip>/i, '</span>');
		}
		while (/<group/i.test(html))
		{
			html = html.replace(/<group/i, '<span type="group"');
		}
		while (/<\/group>/i.test(html))
		{
			html = html.replace(/<\/group>/i, '</span>');
		}
		while (/<item/i.test(html))
		{
			html = html.replace(/<item/i, '<span');
		}
		while (/<\/item>/i.test(html))
		{
			html = html.replace(/<\/item>/i, '</span>');
		}
		parentNode.innerHTML = html;
	}	
	var comboBox;
	var properties = ['width','frameWidth','columns','labelPosition','text','value','groupClass','itemClass','itemOverClass','itemSelectedClass','onselect'];
	var element, propertyValue;
	for (var i=0; i<ids.length; i++)
	{
		comboBox = new ComboBox(ids[i]);
		element = document.getElementById(ids[i]);
		for (var j=0; j<properties.length; j++)
		{
			propertyValue = element.getAttribute(properties[j]);
			if (propertyValue != null) comboBox[properties[j]] = propertyValue;
		}
		comboBox.initialize();
	}	
}
__InitializeComboBoxes();