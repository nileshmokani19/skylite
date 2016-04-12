jQuery(document).ready(function(){
	jQuery("#cuForm").validate({						
		submitHandler: function(form) 
		{
		jQuery.ajax({
			type: "POST",			
			dataType: "json",	
			url:MyAjax, 
			data:{
				action: 'cu_action', 
				cufdata : jQuery(document.formValidate).serialize()
			},
			beforeSend: function() {
				// setting a timeout
				jQuery('#cusubmit').hide();
				jQuery('.cloader').show();
			},
			success:function(response) {
				jQuery('#cusubmit').show();
				jQuery('.cloader').hide();
				if(response == 1) {
					jQuery(".cumsg").slideDown(function() {
						jQuery('html, body').animate({scrollTop: (jQuery(".cumsg").offset().top)},'slow');
						jQuery(this).show().delay(8000).slideUp("slow")
					});
					document.getElementById('cuForm').reset();							
					jQuery(".input-xlarge").removeClass("valid");
					jQuery(".input-xlarge").next('label.valid').remove();											
				} else if(response == 2) {											
					jQuery(".cumsg").slideDown(function() {
						jQuery(this).show().delay(8000).slideUp("fast")
					});										
				} else {
					alert(response);
				}
				
			}
			});	
		}			
	});
});