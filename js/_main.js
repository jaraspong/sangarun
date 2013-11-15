window.Setting = {
	webSiteApi : 'api/',
	lang 	   : 'en',
	imagePath  : 'images/upload/'
};
	
// compile the markup as a named template
//menu template
jQuery.template("menuTemplate", '<li id="${id}"><a href="products.php#${id}">${name}</a></li>');
//products template
jQuery.template("productTemplate",'<div class="media">{{if thumbnail}}<a class="fancy pull-left" href="${thumbnail}"><img class="media-object" src="${thumbnail}"></a>{{/if}}<div class="media-body"><h4 class="media-heading">${title}</h4><div id="desc"></div></div></div>');
//youtube template
jQuery.template("youtubeTemplate",'<iframe width="300" height="180" src="//www.youtube.com/embed/${video_url}" frameborder="0" allowfullscreen></iframe>');

/*HTTP GET&URL Helper*/
window.URL = {
	/***HTTP GET Helper**/
	get : function(arg){
		//get query params
		var self = this,
		    o = this.getUriObject(window.self.location.href);
		if(typeof o.query != "undefined"){
		    var q = $(this.getQueryObject(o.query)),      
		    m = decodeURIComponent(q[0][arg]);
		    return m;
		}else{
		  return false;
		}          
	},
	getQueryObject: function(q) {
		var vars = q.split(/[&;]/);
		var rs = {};    
		if (vars.length) 
		jQuery.each(vars,function(i,val) {
		  var keys = val.split('=');
		  if (keys.length && keys.length == 2) {
		      rs[encodeURIComponent(keys[0])] = encodeURIComponent(keys[1]);
		  }
		});
		return rs;
	},
	getUriObject: function(u){
		var bits = u.match(/^(?:([^:\/?#.]+):)?(?:\/\/)?(([^:\/?#]*)(?::(\d*))?)((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[\?#]|$)))*\/?)?([^?#\/]*))?(?:\?([^#]*))?(?:#(.*))?/);    
		return (bits)
		  ? { uri : bits[0], scheme : bits[1], authority : bits[2], 
		      domain : bits[3], port : bits[4], path : bits[5], 
		      directory : bits[6], file : bits[7], query : bits[8], fragment : bits[9]}
		  : null;
	}
};

var	urlData  = window.URL.getUriObject(window.self.location.href);
window.page 	 = urlData.file;

/*Left Menu object*/
window.LeftMenu = {

	getData : function() {
		var self = this;
        
        //Send Save command Asynchronous to server
        jQuery.ajax({
            type 		:'GET',
            url 		: Setting.webSiteApi + 'products/categories',
            data 		: { lang : Setting.lang },
            dataType 	: 'json',     
            success 	: function(response){
            	
            	if(response != null && typeof response != "undefined"){
            		var menuContainer = jQuery('#productmenu');
					//clear existing data 					
					menuContainer.find('li.category').remove();
						
			    	jQuery.each(response,function(i,v){    	 
			    		var menuItem = jQuery.tmpl( "menuTemplate", v );

						menuItem.bind('click',function() {
							var categoryId = jQuery(this).attr('id');
							menuContainer.find('li.active').removeClass('active');
							jQuery(this).addClass('active');
							//send ajax to load product from category id
							self.getProductsFromCategoryID(categoryId);
						}).addClass('category');
	
						menuItem.appendTo(menuContainer);    	
						
			    	});
			    	
			    	if(window.page =="products.php"){
				    	if(urlData.fragment == "undefined" || urlData.fragment == null){
				    		 jQuery('#productmenu li.category:first').trigger('click');
				    		 
				    	}else{
				    		var categoryId = urlData.fragment;
				    		menuContainer.find('li.active').removeClass('active');
				    		menuContainer.find('li#'+categoryId).addClass('active');
				    		self.getProductsFromCategoryID(categoryId);
				    	}
			    	}
            	}
            }
        });
	},
	getProductsFromCategoryID : function(id) {
		//Send Save command Asynchronous to server
		jQuery.ajax({
		    type 		:'GET',
		    url 		: Setting.webSiteApi + 'products/categories/'+id,
		    data 		: {lang : Setting.lang },
		    dataType 	: 'json',     
		    success 	: function(response){
			var contentContainer = jQuery('#products');
				contentContainer.empty();
            	if(response != null && typeof response != "undefined"){

			    	jQuery.each(response,function(i,v){
                                        v.thumbnail = window.Setting.imagePath + v.thumbnail;
				    	var item = jQuery.tmpl( "productTemplate", v );
                                        item.find('#desc').html(v.description);
			    		item.appendTo(contentContainer);
			    		jQuery('a.fancy').fancybox();
			    	});
			    	
			    }
		    }
		 });
	}	

}

//Home
window.Home = {	
	init 		: function() {
		this.getHomeData();
	},
	getHomeData : function() {
		//Send Save command Asynchronous to server
		jQuery.ajax({
		    type 		:'GET',
		    url 		: Setting.webSiteApi + 'home',
		    data 		: {lang : Setting.lang },
		    dataType 	: 'json',     
		    success 	: function(response){
		    	if(response == null) return;
				var data = response[0];
				if(data != null || typeof data != "undefined"){
					var title = jQuery('h3#title'),
						desc  = jQuery('div#desc'),
						image = jQuery('img#image');
						
					title.html(data.title);
					desc.html(data.description);
					
					var item = jQuery.tmpl( "youtubeTemplate", data );
						item.appendTo(jQuery('div#youtube'));
					
					if(data.hide_image=="1"){
						image.hide();
					}else{
						image.attr('src', window.Setting.imagePath + data.image);
					}
				}
		    }
		 });
	},
	getFlash : function() {
		//Send Save command Asynchronous to server
		jQuery.ajax({
		    type 		:'GET',
		    url 		: Setting.webSiteApi + 'home/keyvisual',
		    dataType 	: 'json',     
		    success 	: function(response){
		    	if(response == null) return;
				var data = response[0];
				if(data != null || typeof data != "undefined"){
					var keyvisual = jQuery('div#keyvisual');
					/*background:  */
					if(data.flash == true){
						keyvisual.html('<object type="application/x-shockwave-flash" data="'+window.Setting.imagePath + data.keyvisual+'" width="960" height="260"> <param name="movie" value="'+window.Setting.imagePath + data.keyvisual+'" /> <param name="quality" value="high"/> <embed width="960" height="260" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="'+window.Setting.imagePath + data.keyvisual+'" ></object>');
					}else {
						keyvisual.css({'background':'url("'+window.Setting.imagePath + data.keyvisual+'") no-repeat center 10px'});
					}
						
				}
		    }
		 });
	
	}
};

//Company
window.Company = {
	
	init : function() {
		this.getCompanyData();
	},
	getCompanyData : function() {
		//Send Save command Asynchronous to server
		jQuery.ajax({
		    type 		:'GET',
		    url 		: Setting.webSiteApi + 'company',
		    data 		: {lang : Setting.lang },
		    dataType 	: 'json',     
		    success 	: function(response){
		    	if(response == null) return;
				var data = response[0];
				if(data != null || typeof data != "undefined"){
					var title = jQuery('h3#title'),
						desc  = jQuery('div#desc'),
						image = jQuery('img#bgImage');
					title.html(data.title);
					desc.html(data.description);

					if(data.hide_image=="1"){
						image.hide();
					}else{
						image.attr('src', window.Setting.imagePath + data.image);
					}

				}
		    }
		 });
	}
};

//Awards 
window.Awards = {
	init : function() {
		this.getAwardsData();
	},
	getAwardsData : function() {
		//Send Save command Asynchronous to server
		jQuery.ajax({
		    type 		:'GET',
		    url 		: Setting.webSiteApi + 'awards',
		    data 		: {lang : Setting.lang },
		    dataType 	: 'json',     
		    success 	: function(response){
		    	if(response == null) return;
				var data = response[0];
				if(data != null || typeof data != "undefined"){
					var title = jQuery('h3#title'),
						desc  = jQuery('div#desc'),
						image1 = jQuery('img#img1'),
						image2 = jQuery('img#img2'),
						image3 = jQuery('img#img3');
						
					title.html(data.title);
					desc.html(data.description);
					
					if(data.hide_image1=="1"){
						image1.hide();
					}else{
						image1.attr('src', window.Setting.imagePath + data.image1 );
					}
					if(data.hide_image2=="1"){
						image2.hide();
					}else{
						image2.attr('src', window.Setting.imagePath + data.image2 );
					}					
					if(data.hide_image3=="1"){
						image3.hide();
					}else{
						image3.attr('src', window.Setting.imagePath + data.image3 );
					}					

				}
		    }
		 });
	}

};

//Contact
window.Contact = {
	init : function() {
		this.getContactData();
	},
	getContactData : function() {
		//Send Save command Asynchronous to server
		jQuery.ajax({
		    type 		:'GET',
		    url 		: Setting.webSiteApi + 'contact',
		    data 		: {lang : Setting.lang },
		    dataType 	: 'json',     
		    success 	: function(response){
		    	if(response == null) return;
				var data = response[0];
				if(data != null || typeof data != "undefined"){
					var title = jQuery('h3#title'),
						desc  = jQuery('div#desc'),
						image = jQuery('img#contact');
					
					title.html(data.title);
					desc.html(data.description);
					image.attr('src', window.Setting.imagePath + data.image);
					jQuery('a#contact').attr('href', window.Setting.imagePath + data.image)
					jQuery('a.fancy').fancybox({ "autoScale": false ,"overlayShow" : false ,"padding" : "0","margin" : "0"});
				}
		    }
		 });
	}

};

window.News = {
	init : function() {
		this.getNewsCategories();
	},
	getNewsCategories : function() {
		var  self	= this;

		//Send Save command Asynchronous to server
		jQuery.ajax({
		    type 		:'GET',
		    url 		: Setting.webSiteApi + 'news/type',
		    data 		: {lang : Setting.lang },
		    dataType 	: 'json',     
		    success 	: function(response){
		    	//clear old content
		    	jQuery('#newsmenu').empty();
		    	if(response == null) return;
		    	jQuery.each(response,function(i,e) {
			    	var markUp = '<li class="nav" id="'+e.id+'"><a href="#"><div class="news-type-'+e.id+' news-type"><span>'+e.name+'</span></div></a></li>';
			    	jQuery('#newsmenu').append(markUp);
		    	});
		    	
		    	self.bindEvent();
		    }
		 });
	
	},
	bindEvent : function() {
		var self = this;
		jQuery('#newsmenu>li').on('click',function() {
			var nid = jQuery(this).attr('id');
			self.getNews(nid);	
		});
		
		jQuery('#newsmenu li:first').trigger('click');
	},
	getNews : function(id) {
		var self = this;
		//Send Save command Asynchronous to server
		jQuery.ajax({
		    type 		:'GET',
		    url 		: Setting.webSiteApi + 'news',
		    data 		: {lang : Setting.lang , id : id },
		    dataType 	: 'json',     
		    success 	: function(response){
		    	//clear old content
		    	jQuery('#newdetail').empty();
		    	if(response == null) return;
				self.render(response);
		    }
		 });
	},
	render : function(data) {
		var container 	= jQuery('div#newdetail'),
			title 		= jQuery('<h3 id="title" class="header"></h3>'),
			desc 		= jQuery('<div id="desc"></div>');

		jQuery.each(data,function(i,e) {
			var t = title.clone(),d = desc.clone();
				t.append(e.title);
				d.append(e.description);
			container.append(t);
			container.append(d);
		});
	
	}
};

//Careers
window.Careers = {
	init : function() {
		this.getCareers();
	},
	getCareers : function() {
		var self = this;
		//Send Save command Asynchronous to server
		jQuery.ajax({
		    type 		:'GET',
		    url 		: Setting.webSiteApi + 'careers',
		    data 		: {lang : Setting.lang },
		    dataType 	: 'json',     
		    success 	: function(response){
		    	if(response == null) return;
				self.render(response);
		    }
		 });
	},
	render : function(data) {
		
		if(data != null || typeof data != "undefined"){
			var careerMenu = jQuery('ul#careers');
			
			careerMenu.empty();
			var dHtml = ''; 
			jQuery.each(data,function(i,e) {
				var career = jQuery('<li class=""><a href="#">'+e.title+'</a></li>');
			
				career.on('click', function() {
					
					jQuery('span#title').html(e.title);
					jQuery('div#desc').html(e.description);
				
				});
			
				careerMenu.append(career);			
			});
			
			jQuery('ul#careers li:first').trigger('click');
		}
	
	}

};

//main
jQuery(document).ready(function(){
	
	//set default lang cookie
	if ($.cookie('current_lang')==null){ 
		$.cookie('current_lang','en',{expires:365});
	}else{
		window.Setting.lang = $.cookie('current_lang');
		//add class active
		jQuery('a.lang').removeClass('active');
		jQuery('a#'+window.Setting.lang).addClass('active');
	}
	
	jQuery('a.lang').on('click',function() {
		
		var lang = jQuery(this).attr('id');
		$.cookie('current_lang', lang ,{expires:365});
		window.Setting.lang = $.cookie('current_lang');
		
		if(window.page =="products.php"){
			jQuery('#productmenu li.category:first').trigger('click');
			LeftMenu.getData();
		}else{
			window.location.reload(true);
		}
		
		//add class active
		jQuery('a.lang').removeClass('active');
		jQuery('a#'+window.Setting.lang).addClass('active');
	});
	
	//console.log(window.page);
	
	window.Home.getFlash();
	
	switch (window.page) {
		case "" :
		case "index.php":
			window.Home.init();
		break;
		case "company.php":
			window.Company.init();
		break;
		case "certificate.php":
			window.Awards.init();
		break;
		case 'contact.php':
			window.Contact.init();
		break;
		case 'careers.php':
			window.Careers.init();
		break;
		case 'news.php':
			window.News.init();
		break;
		default: break;
	}
	
	LeftMenu.getData();		
	

});
