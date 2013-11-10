jQuery(document).ready(function () {
	 
	if(window.Attachments != "undefined"){	
		window.Attachments.init();      
	}

	jQuery('#printed').live('click',function() {
		Review.popupCenter("get_certified_attachment_printed.php","",1000,500);
	});
	
});