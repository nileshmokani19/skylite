<?php
function sfContactusShortcode(){ 
	
	wp_enqueue_script( 'cu-ajax-request', plugins_url('/skylite-forms/js/cu-ajax.js'), array( 'jquery' ));
	wp_enqueue_style( 'cuwp-contact',  plugins_url('/skylite-forms/css/cucontact.css'));
	
    // Enqueued script with localized data.
		
	wp_head(); ?>
	<script type="text/javascript">
		var MyAjax = "<?php echo home_url(); ?>/wp-admin/admin-ajax.php";''
	</script>
	<?php
	// Guest service
	$cu_custom_css = get_option('cu_custom_css');
	if($cu_custom_css) { ?><style><?php echo $cu_custom_css; ?></style><?php }//end of if for style tag
	
	$data = '<div class="row">
	  			<div class="col-md-offset-2 col-md-7">';
				
	$data .= '<div class="cumsg"  style="display:none"></div>';	
			 
	$data .= '<form class="form-horizontal cu-form" name="formValidate" id="cuForm" method="post" >';
	
	// Name
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="cu_name">'.__('Name','skyliteforms').'<span class="req">*</span></label>
				<div class="controls col-md-9">
					<input id="cu_name" name="cu_name" maxlength="50" title="'.__('Name','skyliteforms').'" type="text"  class="input-xlarge form-control text required" placeholder="Your Name">
				</div>
			  </div>';

							
	//Email		     
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="cu_email">'.__('Email ID','skyliteforms').'<span class="req">*</span></label>
				<div class="controls col-md-9">
					<input id="cu_email" maxlength="255" name="cu_email" title="'.__('Email ID','skyliteforms').'" type="text" class="input-xlarge form-control email required" placeholder="you@server.com">
				</div>
			  </div>'; 
										  
	//Message			     
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="cu_message">'.__('Message','skyliteforms').'</label>
				<div class="controls col-md-9">					
					<textarea id="cu_message" name="cu_message" title="'.__('Message','skyliteforms').'"  class=" form-control" rows="5"></textarea>
				</div>
			  </div>';	

			  							
	//Submit			
	$data .= '<div class="control-group text-right">
				<img src="'.plugins_url('/skylite-forms/images/ajax-loader.gif').'" class="cloader"/>
				<button id="cusubmit" name="submit" title="'.__('Click to submit the form','skyliteforms').'" class="btn btn-default" ><i class="fa fa-paper-plane-o"></i>'.__('Submit','skyliteforms').'</button>
			  </div>
		</form>';
	
	$data .= '<div class="alert alert-success cumsg"  style="display:none" data-dismiss="alert">'.__("<strong>Succeed :</strong>Your details are submitted successfully!","skyliteforms").'</div>';		
	
	$data .= '</div></div>';
	return $data;
}
?>