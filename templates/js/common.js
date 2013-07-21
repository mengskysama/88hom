/**
 * 通用JS
 */

var domain = getDomain();
function getDomain() {
	if (window.location.host == 'localhost' || window.location.host =='127.0.0.1' || window.location.host =='192.168.0.27') {
		return 'http://' + window.location.host + '/88hom/';
	} else {
		return 'http://' + window.location.host + '/';
	}
}
function showad(src,width,height,num,top,distance){
	var dw=width/num;
	height=height/2;
	distance=distance/2;
	var left=($(document).width()-width)/(num+1);
	var leftl=left*(num+1)/2;
	var $l=new Array();
	var $t=new Array();
	$('html,body').animate({scrollTop: 0});
	$('<div></div>',{
		id:'hBg',
		css:{
			width:'100%',
			height:$(document).height(),
			background:'#000',
			display:'none',
			position:'absolute',
			left:0,
			top:0,
			zIndex:998
		}
	}).appendTo(document.body).fadeTo("slow", 0.8,function(){
		for(var i=0;i<2;i++){
			for(var m=0;m<num;m++){
				var l=left*(m+1)+dw*m;
				var t=top-distance+i*(height+2*distance);
				var url=new Array('http://www.google.com/chrome/','http://www.mozilla.com/','http://www.opera.com/','http://www.apple.com/safari/');
				if(i==1){
					$('<div></div>',{
						id:'adb'+(m+(i*num)),
						width:dw,
						height:height,
						css:{
							position:'absolute',
							background:'#000 url(\''+src+'\') no-repeat '+m*(-dw)+'px '+(-i*height)+'px',
							display:'none',
							zIndex:'999',
							left:l,
							top:t
						}
					}).appendTo(document.body).animate({left:leftl+dw*m,top:top+height*i,opacity:'show'},'slow').html('<a href="'+url[m]+'" style="display:block;width:100%;height:100%" rel="nofollow" target="_brank"></a>');
				}else{
					$('<div></div>',{
						id:'adb'+(m+(i*num)),
						width:dw,
						height:height,
						css:{
							position:'absolute',
							background:'#000 url(\''+src+'\') no-repeat '+m*(-dw)+'px '+(-i*height)+'px',
							display:'none',
							zIndex:'999',
							left:l,
							top:t
						}
					}).appendTo(document.body).animate({left:leftl+dw*m,top:top+height*i,opacity:'show'},'slow');
				}
				$l.push(l);
				$t.push(t);
			}
		}
	}).click(function(){
		num=num*2;
		for(var i=0;i<num;i++){
			$('#adb'+i).stop().animate({left:$l[i],top:$t[i],opacity:'hide'},'1000',function(){
				$(this).remove();
			});
		}
		$(this).remove();
	});
}
function RegExps(){
	this.isEnglish = /^[A-Za-z]+$/;
	this.isMoney   = /^\d+(\.\d+)?$/;
	this.isEmail   = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;
	this.isInt 	   = /^[-\+]?\d+$/;
}