jQuery(document).ready(function(){

  jQuery('#cssmenu > ul > li:has(ul)').addClass("has-sub");

  jQuery('#cssmenu > ul > li > a').click(function() {
    var checkElement = jQuery(this).next();
    
    jQuery('#cssmenu li').removeClass('active');
    jQuery(this).closest('li').addClass('active');	
    
    
    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
      jQuery(this).closest('li').removeClass('active');
      checkElement.slideUp('normal');
    }
    
    if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
      jQuery('#cssmenu ul ul:visible').slideUp('normal');
      checkElement.slideDown('normal');
    }
    
    if (checkElement.is('ul')) {
      return false;
    } else {
      return true;	
    }		
  });

});