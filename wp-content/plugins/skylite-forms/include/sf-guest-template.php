<?php
function sfGuestShortcode(){ 
	
	wp_enqueue_script( 'my-ajax-request', plugins_url('/skylite-forms/js/gs-ajax.js'), array( 'jquery' ));
	wp_enqueue_style( 'wp-contact',  plugins_url('/skylite-forms/css/contact.css'));
	
    // Enqueued script with localized data.
		
	wp_head(); ?>
	<script type="text/javascript">var MyAjax = "<?php echo home_url(); ?>/wp-admin/admin-ajax.php";</script>
	<?php
	// Guest service
	$gs_custom_css = get_option('gs_custom_css');
	if($gs_custom_css) { ?><style><?php echo $gs_custom_css; ?></style><?php }//end of if for style tag
	
	$data = '<div class="row">
	  			<div class="col-md-offset-2 col-md-7">';
				
	$data .= '<div class="gsmsg"  style="display:none"></div>';	
			 
	$data .= '<form class="form-horizontal gs-form" name="formValidate" id="gsForm" method="post" >';
	
	// Name
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="gs_name">'.__('Name','skyliteforms').'<span class="req">*</span></label>
				<div class="controls col-md-9">
					<input id="gs_name" name="gs_name" maxlength="50" title="'.__('Name','skyliteforms').'" type="text"  class="input-xlarge form-control text required" placeholder="Your Name">
				</div>
			  </div>';

							
	//Email		     
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="gs_email">'.__('Email ID','skyliteforms').'<span class="req">*</span></label>
				<div class="controls col-md-9">
					<input id="gs_email" maxlength="255" name="gs_email" title="'.__('Email ID','skyliteforms').'" type="text" class="input-xlarge form-control email required" placeholder="you@server.com">
				</div>
			  </div>'; 

							
	//Venue
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="gs_venue">'.__('Venue','skyliteforms').'</label>
				<div class="controls col-md-9">
					 <select class="input-xlarge form-control" id="gs_venue" name="gs_venue">
						<option value="TORO TORO">TORO TORO</option>
						<option value="ELCENTRO 14TH ST.">ELCENTRO 14TH ST.</option>
						<option value="ELCENTRO GEORGETOWN">ELCENTRO GEORGETOWN</option>
						<option value="MASA 14">MASA 14</option>
					 </select>
				</div>
			  </div>';
	
	//Date
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="gs_date">Date<span class="req">*</span></label>
        		<div class="controls col-md-9">
					<input type="text" id="gs_date" name="gs_date" class="input-xlarge form-control datepicker required"  data-provide="datepicker" placeholder="YYYY-MM-DD"/> 
				</div>	
    		 </div>';	
									  
	//Comment			     
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="gs_comment">'.__('Comment','skyliteforms').'</label>
				<div class="controls col-md-9">					
					<textarea id="gs_comment" name="gs_comment" title="'.__('Comment','skyliteforms').'"  class=" form-control" rows="5"></textarea>
				</div>
			  </div>';
			  							
	//Submit			
	$data .= '<div class="control-group text-right">
				<img src="'.plugins_url('/skylite-forms/images/ajax-loader.gif').'" class="loader"/>
				<button id="submit" name="submit" title="'.__('Click to submit the form','skyliteforms').'" class="btn btn-default" ><i class="fa fa-paper-plane-o"></i>'.__('Submit','skyliteforms').'</button>
			  </div>
		</form>';
		
	$data .= '<div class="alert alert-success gsmsg"  style="display:none" data-dismiss="alert">'.__("<strong>Succeed :</strong>Your details are submitted successfully!","skyliteforms").'</div>';		
	
	
	$data .= '</div></div>';
	return $data;
}
?>