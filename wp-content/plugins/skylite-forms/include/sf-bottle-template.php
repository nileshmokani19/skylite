<?php
function sfBottleShortcode(){ 
	
	wp_enqueue_script( 'bs-ajax-request', plugins_url('/skylite-forms/js/bs-ajax.js'), array( 'jquery' ));
	wp_enqueue_style( 'bs-contact',  plugins_url('/skylite-forms/css/bscontact.css'));
	
    // Enqueued script with localized data.
		
	wp_head();?> 
	<script type="text/javascript">var MyAjax = "<?php echo home_url(); ?>/wp-admin/admin-ajax.php";</script>
	<?php
	// Guest service
	$bs_custom_css = get_option('bs_custom_css');
	if($bs_custom_css) { ?><style><?php echo $bs_custom_css; ?></style><?php }//end of if for style tag
	
	$data = '<div class="row"><div class=" col-md-offset-2 col-md-7">';
	$data .= '<div class="bsmsg"  style="display:none"></div>';		 
	$data .= '<form class="form-horizontal bs-form"" name="formValidate" id="bsForm" method="post" >';
	
	// Name
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="bs_name">'.__('Name','skyliteforms').'<span class="req">*</span></label>
				<div class="controls col-md-9">
					<input id="bs_name" name="bs_name" maxlength="50" title="'.__('Name','skyliteforms').'" type="text"  class="form-control text required" placeholder="Your Name">
				</div>
			  </div>';

	//Email		     
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="bs_email">'.__('Email ID','skyliteforms').'<span class="req">*</span></label>
				<div class="controls col-md-9">
					<input id="bs_email" maxlength="255" name="bs_email" title="'.__('Email ID','skyliteforms').'" type="text" class="form-control email required" placeholder="you@server.com">
				</div>
			  </div>'; 
	
	//Venue
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="bs_venue">'.__('Venue','skyliteforms').'</label>
				<div class="controls col-md-9">
					 <select class="form-control" id="bs_venue" name="bs_venue">
						<option value="TORO TORO">TORO TORO</option>
						<option value="ELCENTRO 14TH ST.">ELCENTRO 14TH ST.</option>
						<option value="ELCENTRO GEORGETOWN">ELCENTRO GEORGETOWN</option>
						<option value="MASA 14">MASA 14</option>
					 </select>
				</div>
			  </div>';

	//Date
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="bs_date">Date<span class="req">*</span></label>
        		<div class="controls col-md-9">
					<input type="text" id="bs_date" name="bs_date" class="input-xlarge form-control datepicker required"  data-provide="datepicker" placeholder="YYYY-MM-DD"/> 
				</div>	
    		 </div>';	
	
	//Phone no		 
	$data .= '<div class="control-group row">
					<label class="control-label col-md-3" for="bs_phoneno">'.__('Phone No.','skyliteforms').'<span class="req">*</span></label>
					<div class="controls col-md-9">
						<input id="bs_phoneno" maxlength="15" name="bs_phoneno" title="'.__('Phone No.','skyliteforms').'" type="text" class="form-control phone required"  placeholder="XXX-XXX-XXXX">
					</div>
			</div>';
			 		  
	//Details			     
	$data .= '<div class="control-group row">
				<label class="control-label col-md-3" for="bs_details">'.__('Details','skyliteforms').'</label>
				<div class="controls col-md-9">					
					<textarea id="bs_details" class="form-control" name="bs_details" title="'.__('Details','skyliteforms').'" rows="5" ></textarea>
				</div>
			  </div>';
	
	//Submit			
	$data .= '<div class="control-group text-right">
					<img src="'.plugins_url('/skylite-forms/images/ajax-loader.gif').'" class="bloader"/>
					<button id="bsubmit" name="submit" title="'.__('Click to submit the form','skyliteforms').'" class="btn btn-default" ><i class="fa fa-paper-plane-o"></i>'.__('Submit','skyliteforms').'</button>
				</div>			
		</form>';
		
	$data .= '<div class="alert alert-success bsmsg"  style="display:none">'.__("<strong>Succeed :</strong>Your details are submitted successfully!","skyliteforms").'</div>';	
	
	$data .= '</div></div>';
	return $data;
}
?>