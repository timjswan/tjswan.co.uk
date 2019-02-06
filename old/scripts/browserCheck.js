function browserCheck(){
	if(navigator.appVersion.indexOf("MSIE 6.0") > -1 || navigator.appVersion.indexOf("MSIE 7.0") > -1 || navigator.appVersion.indexOf("MSIE 8.0") > -1){
		document.getElementById('wrap').style.background = "url(images/no_css3_back.png) no-repeat";
		document.getElementById('wrap').style.borderBottom = "solid 1px #000";
		document.getElementById('banner').style.background = "none";	
	}
	else if (navigator.userAgent.indexOf("Firefox/2.0") > -1){
		document.getElementById('wrap').style.background = "url(images/no_css3_back.png) no-repeat";
		document.getElementById('wrap').style.borderBottom = "solid 1px #000";
		document.getElementById('banner').style.background = "none";
	}
}

$(document).ready(function(){
	browserCheck();
});