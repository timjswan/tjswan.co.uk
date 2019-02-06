$(document).ready(function(){
	$("#gallery")
		.cycle({
			timeout: 0, //no auto transition
			fx: 'fade',
			pager: '#cyclePager', //div to use as pager
			pagerAnchorBuilder: function(idx){
				//produces the pager links below the slideshow
				return '<a href="#" id="pagerLink' + (idx + 1) + '" title="Pager '+ (idx + 1) + '" class="pagerLink">&nbsp;</a>';			
			}
		});
	
	//hover events for the checkout shopping cart
	$(".cartWrapper").hover(
		function(){
			//mouse in
			$(this).find(".cart").fadeIn("fast");
		},
		function(){
			//mouse out
			$(this).find(".cart").fadeOut("fast");
		}
	);
	
	//click event for subscribe button. gets value from email input and sends it off to 
	//newsletter subscription PHP and comes back whether the email is valid or not
	$(".subscribe button[type='submit']").click(function(e){
		e.preventDefault();
		var emailVal = $(this).parents().find("#subscribeMail").val(),
		results = $(".subscribeResult .subscribeStatus"),
		loading = $(".subscribeResult .loading"),
		valid = $(".subscribeResult .success"),
		fail = $(".subscribeResult .fail");
		
		results.hide(); //if user has made a mistake and resubmitted the email
		loading.show(); //show loading
		
		$.ajax({
			url: "scripts/subscribe.php",
			data: {
				email: emailVal
			},
			success: function(response){
				results.hide();
				if(response === "valid"){
					valid.show();
				}
				if(response === "invalid"){
					fail.show();
				}
			}
		});
	});
	
});