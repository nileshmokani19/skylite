jQuery(document).ready(function(){
	jQuery("#bsForm").validate({						
		submitHandler: function(form) 
		{
		jQuery.ajax({
			type: "POST",			
			dataType: "json",	
			url:MyAjax, 
			data:{
				action: 'bs_action', 
				bsfdata : jQuery(document.formValidate).serialize()
			},
			beforeSend: function() {
				// setting a timeout
				jQuery('#bsubmit').hide();
				jQuery('.bloader').show();
			},
			success:function(response) {
				jQuery('#bsubmit').show();
				jQuery('.bloader').hide();
				if(response == 1) {
					jQuery(".bsmsg").slideDown(function() {
						jQuery('html, body').animate({scrollTop: (jQuery(".bsmsg").offset().top)},'slow');
						jQuery(this).show().delay(8000).slideUp("fast")
					});
					document.getElementById('bsForm').reset();							
					jQuery(".input-xlarge").removeClass("valid");
					jQuery(".input-xlarge").next('label.valid').remove();											
				} else if(response == 2) {											
					jQuery(".bsmsg").slideDown(function() {
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