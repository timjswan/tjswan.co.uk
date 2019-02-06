$(document).ready(function(){
	$(".closeImg").click(function(){
		$(this).parent().hide();
	});
	
	$(".displayBookQ").click(function(){
		$("#bookQ").show();
	});
});