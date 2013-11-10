window.FancyLoader ={    
    loading : null, 
    loadingTimer : null, 
    loadingFrame : 1,	
    init : function(){
      jQuery(document.body).append(
        this.loading =  jQuery('<div class=\"loading\"><div></div></div>')
      );    	
    },
    addLoader : function(){
      var that = this;
      clearInterval(that.loadingTimer);
      that.loading.show();
      that.loadingTimer = setInterval(that.animateLoading, 66);
    },
    removeLoader : function(){
      var that = this;
      that.loading.hide();
    },
    animateLoading : function() {
      if (!FancyLoader.loading.is(':visible')){
        clearInterval(FancyLoader.loadingTimer);
        return false;
      }
      jQuery('div', FancyLoader.loading).css('top', (FancyLoader.loadingFrame * -40) + 'px');
      FancyLoader.loadingFrame = (FancyLoader.loadingFrame + 1) % 12;
    }	
};