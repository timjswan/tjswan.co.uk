$(document).ready(function(){	
	//I believe that any form of social icon should be hidden from view until someone seeks it out. 
	//I don't like web pages that look like someone vomited social media over them.
	if(!ltie8){
		$('#details').after('<div id="socialButtons"><div class="socialButton" id="facebook"><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.tjswan.co.uk%2F&amp;layout=button_count&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;height=21&amp;width=85" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div><div class="socialButton" id="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-url="http://tjswan.co.uk/" data-text="Examples of work by Tim Swan" data-count="horizontal" data-via="timjackswan">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div></div>');	
		var socialButtons = $('#contact #socialButtons'), showHideTxt;
		$('#contact').hover(
			function(){
				socialButtons.show();
			},
			function(){
				socialButtons.hide();				
			}
		);
	}
});