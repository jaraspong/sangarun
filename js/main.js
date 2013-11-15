window.Setting = {
	webSiteApi : 'api/',
	lang 	   : 'en',
	imagePath  : 'images/upload/'
};
	

window.fixIE = {
	init : function(){

		if($.browser.msie){ 
			//fix css
			$('#footermenu ul').css({'width':'580px'});
		}
	}
}