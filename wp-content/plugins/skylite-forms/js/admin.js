jQuery(function($) {	
	jQuery("#gsuserlist a.iframe").colorbox({
		maxWidth	: 1500,
		maxHeight	: 500,
		width		: '50%',
		height		: '100%',
		iframe 		: true,
	});
	
	$('#gsalluser').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.gsuserid').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        } else {
            $('.gsuserid').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });
	
	jQuery("#bsuserlist a.iframe").colorbox({
		maxWidth	: 1500,
		maxHeight	: 500,
		width		: '50%',
		height		: '100%',
		iframe 		: true,
	});
	
	$('#bsalluser').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.bsuserid').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        } else {
            $('.bsuserid').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });
	
	jQuery("#cuuserlist a.iframe").colorbox({
		maxWidth	: 1500,
		maxHeight	: 500,
		width		: '50%',
		height		: '100%',
		iframe 		: true,
	});
	
	$('#cualluser').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.cuuserid').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        } else {
            $('.cuuserid').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });
	
});