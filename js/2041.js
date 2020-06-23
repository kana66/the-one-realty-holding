$(function(){
	if(top.location.href.indexOf('http://demo.uemo.net/itemid/54886/')>-1){
		$("#header .nav .navitem:last a").css({"background-color":"#f96868",'color':"#fff"}).click(function(){
			window.open('http://demo.uemo.net/itemid/76158/');
			return false;
		});
	}
})