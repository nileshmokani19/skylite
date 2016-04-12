jQuery(document).ready(function(){
	jQuery("#gsForm").validate({						
		submitHandler: function(form) 
		{
		jQuery.ajax({
			type: "POST",			
			dataType: "json",	
			url:MyAjax, 
			data:{
				action: 'gs_action', 
				gsfdata : jQuery(document.formValidate).serialize()
			},
			beforeSend: function() {
				// setting a timeout
				jQuery('#submit').hide();
				jQuery('.loader').show();
			},
			success:function(response) {
				jQuery('#submit').show();
				jQuery('.loader').hide();
				if(response == 1) {
					jQuery(".gsmsg").slideDown(function() {
						jQuery('html, body').animate({scrollTop: (jQuery(".gsmsg").offset().top)},'slow');
						jQuery(this).show().delay(8000).slideUp("slow")
					});
					document.getElementById('gsForm').reset();							
					jQuery(".input-xlarge").removeClass("valid");
					jQuery(".input-xlarge").next('label.valid').remove();											
				} else if(response == 2) {											
					jQuery(".gsmsg").slideDown(function() {
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