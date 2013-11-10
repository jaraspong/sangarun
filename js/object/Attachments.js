var Attachments = {
	url  			: 'api/attachments',
	filesContainerID 	: '#get_certified', 
	init 	: function() {
		var self = this;
	
	    // Enable iframe cross-domain access via redirect option:
	    jQuery(self.filesContainerID).fileupload({
	        url: self.url,
	        dataType: 'json',
	        autoUpload: false,
	        acceptFileTypes: /(\.|\/)(rtf|txt|ppt|xlsx|xls|pdf|doc|docx|gif|jpe?g|png)$/i,
	        maxFileSize: 5000000 // 5 MB
	    });

		self.loadExistingFiles();
	},
	loadExistingFiles : function() {
		var self = this;
		
		// add loader
		jQuery(self.filesContainerID).addClass('fileupload-processing');
		
		//call ajax request to server
		jQuery.ajax({
		    url: jQuery(self.filesContainerID).fileupload('option', 'url'),
		    dataType: 'json',
		    context: jQuery(self.filesContainerID)[0]
		}).always(function (result) {
		    jQuery(this).removeClass('fileupload-processing');
		}).done(function (result) {
		    jQuery(this).fileupload('option', 'done')
		        .call(this, null, {result: result});
		});
	
	},
	loadAttachmentPrintedData : function() {
		var self = this;

        //Send Save command Asynchronous to server
        jQuery.ajax({
            type 		:'GET',
            url 		: 'api/application',
            dataType 	: 'json',     
            success 	: function(response){
            	if(response != null && typeof response !='undefined'){
            		self.loadAttachmentCallback(response);
            	}
            }	
        });	

	
	},
	loadAttachmentCallback : function(response) {
		jQuery('#appid').html(response.applicant_data.id);
		jQuery('#phone').html(response.firstStep.phone);
		jQuery('#email').html(response.applicant_data.email);
		
		var name = response.applicant_data.firstname + " " + response.applicant_data.lastname;
		if(response.applicant_data.suffix != null || response.applicant_data.suffix != ""){
			name += "," + response.applicant_data.suffix;
		}
		
		//var data = name + " applicant ID : " + response.applicant_data.id + ",name : " + response.applicant_data.phone + ",email :" + response.applicant_data.email;
		var data = name + " " + response.applicant_data.id;
		var googleQR = "https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl="+encodeURI(data);
		
		jQuery('#qr img').attr('src',googleQR);
	}
};