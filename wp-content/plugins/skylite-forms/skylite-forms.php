<?php
/*
Plugin Name: Skylite Forms
Plugin URI: 
Description: Add  Form to your WordPress website.
Version: 1.0
Text Domain: skyliteforms
Author: Techgigs
Author URI: 
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
define('SF_PDIR_PATH', plugin_dir_path(__FILE__ ));
add_action('plugins_loaded', 'sf_init');


/* Activate Hook Plugin */
register_activation_hook(__FILE__,'sf_add_table');

# Load the language files
function sf_init(){
	load_plugin_textdomain( 'skyliteforms', false, plugin_basename( dirname( __FILE__ )  . '/languages/' ));
}

/*install Hook Plugin */
add_action('admin_init', 'sf_register_fields' );
function sf_register_fields(){
	
	include_once( get_home_path().'/wp-load.php' );
	//Guest service
	register_setting( 'gs-fields', 'gs_email_address_setting' );
	register_setting( 'gs-fields', 'gs_subject_text' );
	register_setting( 'gs-fields', 'gs_reply_user_message' );	
	register_setting( 'gs-fields', 'gs_custom_css' );
	
	//Bottle Service
	register_setting( 'bs-fields', 'bs_email_address_setting' );
	register_setting( 'bs-fields', 'bs_subject_text' );
	register_setting( 'bs-fields', 'bs_reply_user_message' );	
	register_setting( 'bs-fields', 'bs_custom_css' );
	
	//Contact us Service
	register_setting( 'cu-fields', 'cu_email_address_setting' );
	register_setting( 'cu-fields', 'cu_subject_text' );
	register_setting( 'cu-fields', 'cu_reply_user_message' );	
	register_setting( 'cu-fields', 'cu_custom_css' );
	
	//Mailchimp
	register_setting( 'gs-settings-group', 'sf_api_key' );
	register_setting( 'gs-settings-group', 'gsmclists' );	
	register_setting( 'gs-settings-group', 'bsmclists' );
	register_setting( 'gs-settings-group', 'cumclists' );
}

/*Uninstall Hook Plugin */

if( function_exists('register_uninstall_hook') ){
	register_uninstall_hook(__FILE__,'sf_forms_uninstall');			
}

function sf_forms_uninstall(){ 
	//Guest service
	delete_option('gs_email_address_setting');
	delete_option('gs_subject_text');
	delete_option('gs_reply_user_message');	
	delete_option('gs_custom_css' );	
	
	//Bottle Service
	delete_option('bs_email_address_setting');
	delete_option('bs_subject_text');
	delete_option('bs_reply_user_message');	
	delete_option('bs_custom_css' );
	
	//Contact us Service
	delete_option('cu_email_address_setting' );
	delete_option('cu_subject_text' );
	delete_option('cu_reply_user_message' );	
	delete_option('cu_custom_css' );
	 
	//Mailchimp 
	delete_option('sf_api_key');
	delete_option('gsmclists');
	delete_option('bsmclists');
	delete_option('cumclists');
	
	global $wpdb;
	//Guest service	
	$sf_guest_drop = $wpdb->prefix . "sf_guest_list";  
	$wpdb->query("DROP TABLE IF EXISTS ".$sf_guest_drop);
	
	//Bottle Service
	$sf_bottle_drop = $wpdb->prefix . "sf_bottle_list";  
	$wpdb->query("DROP TABLE IF EXISTS ".$sf_bottle_drop);
	
	//Contact us Service
	$sf_contact_list = $wpdb->prefix . "sf_contactus_list";  
	$wpdb->query("DROP TABLE IF EXISTS ".$sf_contact_list);
}

//Guest Service Shortcode
add_shortcode('sf_guest_service', 'sf_guest_service_shortcode');
function sf_guest_service_shortcode(){
	include_once('include/sf-guest-template.php');
	return sfGuestShortcode();
}

//Bottle Service Shortcode
add_shortcode('sf_bottle_service', 'sf_bottle_service_shortcode');
function sf_bottle_service_shortcode(){
	include_once('include/sf-bottle-template.php');
	return sfBottleShortcode();
}

//Contact us Service
add_shortcode('sf_contactus_service', 'sf_contactus_service_shortcode');
function sf_contactus_service_shortcode(){
	include_once('include/sf-contactus-template.php');
	return sfContactusShortcode();
}

/* Make SF Settings in Admin Menu Item*/
add_action('admin_menu','sf_setting');

/*
* Setup Admin menu item
*/
function sf_setting(){
	//Guest service
	add_menu_page(__('Guest Service','skyliteforms'),__('Guest Service','skyliteforms'),'manage_options','sf_guest','sf_guest_settings','','79.5');
	
	global $page_options;
	$page_options = add_submenu_page('sf_guest', __('Guest User List','skyliteforms'), __('Guest User List','skyliteforms'),'manage_options', 'sf_guest_user_lists', 'sf_guest_user_lists');
	
	add_submenu_page('sf_guest', __('Guest MailChimp Settings','skyliteforms'), __('Guest MailChimp Settings','skyliteforms'), 'manage_options', 'sf_mailchimp', 'sf_mailchimp_display_admin_page' );
	
	
	//Bottle Service
	add_menu_page(__('Bottle Service','skyliteforms'),__('Bottle Service','skyliteforms'),'manage_options','sf_bottle','sf_bottle_settings','','79.5');
	
	$page_options = add_submenu_page('sf_bottle', __('Bottle User List','skyliteforms'), __('Bottle User List','skyliteforms'),'manage_options', 'sf_bottle_user_lists', 'sf_bottle_user_lists');
	
	add_submenu_page('sf_bottle', __('Bottle MailChimp Settings','skyliteforms'), __('Bottle MailChimp Settings','skyliteforms'), 'manage_options', 'sf_mailchimp', 'sf_mailchimp_display_admin_page' );
	
	//Contactus Service
	add_menu_page(__('ContactUs','skyliteforms'),__('ContactUs','skyliteforms'),'manage_options','sf_contactus','sf_contactus_settings','','79.5');
	
	$page_options = add_submenu_page('sf_contactus', __('ContactUs User List','skyliteforms'), __('ContactUs User List','skyliteforms'),'manage_options', 'sf_contactus_user_lists', 'sf_contactus_user_lists');
	
	add_submenu_page('sf_contactus', __('ContactUs MailChimp Settings','skyliteforms'), __('ContactUs MailChimp Settings','skyliteforms'), 'manage_options', 'sf_mailchimp', 'sf_mailchimp_display_admin_page' );
	 
}

/*
* Admin menu icons
*/
add_action( 'admin_head', 'sf_cf_add_menu_icons_styles' );
function sf_cf_add_menu_icons_styles() { ?>
	<style type="text/css" media="screen">
		#adminmenu .toplevel_page_sf_guest div.wp-menu-image:before {
			content: '\f314';
		}
		#adminmenu .toplevel_page_sf_bottle div.wp-menu-image:before {
			content: '\f314';
		}
		#adminmenu .toplevel_page_sf_contactus div.wp-menu-image:before {
			content: '\f314';
		}
	</style>
<?php }

add_action('admin_enqueue_scripts', 'sf_load_admin_scripts');
function sf_load_admin_scripts($hook) {
	global $page_options;
	if( $hook != $page_options )
		return;
	wp_register_style( 'jquery-ui',  '//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' );	
	wp_enqueue_style('jquery-ui');
}


add_action( 'wp_footer', 'sf_footer_jquery' );
function sf_footer_jquery() {
  wp_enqueue_style( 'bootstrap-datepickercss',  plugins_url('/skylite-forms/css/datepicker.css'));
  wp_register_script( 'jquery.validate', plugins_url().'/skylite-forms/js/jquery.validate.js', array('jquery'));
  wp_enqueue_script( 'jquery.validate' );	
  wp_enqueue_script( 'bootstrap-datepickerjs', plugins_url().'/skylite-forms/js/bootstrap-datepicker.js', array('jquery'));
?>
 <script type="text/javascript">
 	jQuery(document).ready(function() {
	    jQuery('#gs_date').datepicker({
        	format : 'yyyy-mm-dd',
			todayHighlight: true,
			autoclose: true, 
			startDate: '0'
   		});
		
		jQuery('#bs_date').datepicker({
        	format : 'yyyy-mm-dd',
			todayHighlight: true,
			autoclose: true, 
			startDate: '0'
   		});
	});
</script>
<?php }

function sf_add_table(){	
	global $wpdb;
	
	//Guest service
	$sf_guest_list_table = $wpdb->prefix . "sf_guest_list";			
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');	  
	
	$wpdb->query("DROP TABLE IF EXISTS ".$sf_guest_list_table);

	$sf_sql_guest = "CREATE TABLE IF NOT EXISTS $sf_guest_list_table (
		gs_user_id int(10) NOT NULL AUTO_INCREMENT,
		gs_username varchar(50) NULL,
		gs_email_id varchar(255) NULL,	
		gs_venue varchar(150) NULL,
		gs_date date NULL,
		gs_comment varchar(2000) NULL,
		gs_insert_date date NULL,
		PRIMARY KEY (`gs_user_id`)
	) ";

	dbDelta($sf_sql_guest);
	
	//Bottle Service
	$sf_bottle_list_table = $wpdb->prefix . "sf_bottle_list";	  
	
	$wpdb->query("DROP TABLE IF EXISTS ".$sf_bottle_list_table);

	$sf_sql_bottle = "CREATE TABLE IF NOT EXISTS $sf_bottle_list_table (
		bs_user_id int(10) NOT NULL AUTO_INCREMENT,
		bs_username varchar(50) NULL,
		bs_email_id varchar(255) NULL,	
		bs_venue varchar(150) NULL,
		bs_date date NULL,
		bs_phoneno varchar(12) NULL,
		bs_details varchar(2000) NULL,
		bs_insert_date date NULL,
		PRIMARY KEY (`bs_user_id`)
	) ";

	dbDelta($sf_sql_bottle);
	
	//Contactus Service
	$sf_contactus_list_table = $wpdb->prefix . "sf_contactus_list";	  
	
	$wpdb->query("DROP TABLE IF EXISTS ".$sf_contactus_list_table);

	$sf_sql_contactus = "CREATE TABLE IF NOT EXISTS $sf_contactus_list_table (
		cu_user_id int(10) NOT NULL AUTO_INCREMENT,
		cu_username varchar(50) NULL,
		cu_email_id varchar(255) NULL,
		cu_message varchar(2000) NULL,
		cu_insert_date date NULL,
		PRIMARY KEY (`cu_user_id`)
	) ";

	dbDelta($sf_sql_contactus);
	

}

// S: Guest service
function sf_guest_settings(){
	include SF_PDIR_PATH."/include/sf_guest_settings.php";
}

function sf_guest_user_lists(){
	include SF_PDIR_PATH."/include/sf_guest_user_lists.php";
}

function sf_mailchimp_display_admin_page() {
		require_once(SF_PDIR_PATH.'/include/class-form.php');
		$gslists = gs_get_lists();
		$bslists = bs_get_lists();
		$culists = cu_get_lists();
		include_once(SF_PDIR_PATH.'/include/gs_admin.php' );
		
}
// E: Guest service

// S: Bottle Service
function sf_bottle_settings (){
	include SF_PDIR_PATH."/include/sf_bottle_settings.php";
}
function sf_bottle_user_lists(){
	include SF_PDIR_PATH."/include/sf_bottle_user_lists.php";
}

// E: Bottle Service


// S: Contactus Service
function sf_contactus_settings (){
	include SF_PDIR_PATH."/include/sf_contactus_settings.php";
}
function sf_contactus_user_lists(){
	include SF_PDIR_PATH."/include/sf_contactus_user_lists.php";
}

// E: Contactus Service

function sf_scripts(){
	if(isset($_GET['page']) && preg_match('/^sf_/', @$_GET['page']) ){	
	
		wp_enqueue_script( 'colorbox-main',  plugins_url('/js/jquery.colorbox-min.js' , __FILE__), array(), '1.0', true );
		wp_enqueue_style( 'colorbox-css', plugins_url('/skylite-forms/css/colorbox.css'), array(), null );
			
		wp_enqueue_script( 'sf_script_table', plugins_url('/js/jquery.dataTables.js' , __FILE__), array( 'jquery' ) );
		wp_enqueue_script( 'sf_script_buttons', plugins_url('/js/dataTables.buttons.min.js' , __FILE__), array( 'jquery' ) );
		
		wp_enqueue_script( 'sf_script_flash', plugins_url('/js/buttons.flash.min.js' , __FILE__), array( 'jquery' ) );
		wp_enqueue_script( 'sf_script_jszip', plugins_url('/js/jszip.min.js' , __FILE__), array( 'jquery' ) );
		wp_enqueue_script( 'sf_script_pdfmake', plugins_url('/js/pdfmake.min.js' , __FILE__), array( 'jquery' ) );
		wp_enqueue_script( 'sf_script_fonts', plugins_url('/js/vfs_fonts.js' , __FILE__), array( 'jquery' ) );
		wp_enqueue_script( 'sf_script_buttonshtml5', plugins_url('/js/buttons.html5.min.js' , __FILE__), array( 'jquery' ) );
		
		wp_enqueue_script( 'sf_script_print', plugins_url('/js/buttons.print.min.js' , __FILE__), array( 'jquery' ) );
		wp_enqueue_script( 'jquery-ui', plugins_url('/js/jquery-ui.js' , __FILE__), array( 'jquery' ) );
		wp_enqueue_style('wp-buttons-css', plugins_url('/skylite-forms/css/buttons.dataTables.min.css'));
		wp_enqueue_style('wp-datatable', plugins_url('/skylite-forms/css/data_table.css'));
		wp_enqueue_script( 'colorbox-admin',  plugins_url('/js/admin.js' , __FILE__), array(), '1.0', true );
		
		//wp_enqueue_style('jquery-ui');
	}
}  
add_action( 'admin_enqueue_scripts', 'sf_scripts' );

if(!is_admin()){
	wp_localize_script( 'my-ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );	
}

// S: Guest service
add_action('wp_ajax_gs_action', 'gs_action_call');
add_action('wp_ajax_nopriv_gs_action', 'gs_action_call');

function gs_action_call(){	
	global $wpdb;
	$data = $_POST['gsfdata'];
	$returndata = array();
	if(empty($data)) return;
	$strArray = explode("&", $data);
	$i = 0;

	foreach($strArray as $item){
		$array = explode("=", $item);
		$returndata[$array[0]] = $array[1];
	}
	
	foreach($returndata as $key => $val){
		if($key == 'gs_name'){
			$gs_name = sanitize_text_field(urldecode($val));
		} elseif($key == 'gs_email') {
			$gs_email =  sanitize_email(urldecode($val));
		} elseif($key == 'gs_date') {
			$gs_date = $val;
		} elseif($key == 'gs_venue') {
			$gs_venue = sanitize_text_field(urldecode($val));
		} elseif($key == 'gs_comment') {
			$gs_comment = sanitize_text_field(urldecode($val));
		} 		
	}

	if(get_option('gs_email_address_setting')==''){
		$gs_emailadmin = sanitize_email(get_option('admin_email'));	

	} else {
		$gs_emailadmin = get_option('gs_email_address_setting');
	}
        
	if(get_option('gs_subject_text')==''){
		$gs_subtext = __('Skylite DC','skyliteforms');
	} else {
		$gs_subtext = get_option('gs_subject_text');
	}

	if(get_option('gs_reply_user_message')==''){
		$gs_reply_msg = __('Thank you for contacting us...We will get back to you soon...','skyliteforms');
	} else {
		$gs_reply_msg = get_option('gs_reply_user_message');
	}	

	$arr = 1;
	

	// settings for mail received by user
	$gs_subject_mail = __('Reply : ','skyliteforms').$gs_subtext;	
	$gs_headers = "MIME-Version: 1.0\n";
	$gs_headers .= "Content-type: text/html; charset=UTF-8\n";
	$gs_headers .= "From:".get_bloginfo('name')." <".$gs_emailadmin.">\n";
	$gs_headers .= "Message-Id: <".time()."@".$_SERVER['SERVER_NAME'].">\n";
	$gs_headers .= "X-Mailer: php-mail-function-0.2\n";

	// settings for mail received by admin			
	$gs_admin_usermsg = "<table><tr><td colspan='2'><b>".__('Guest Service User Details','skyliteforms')."</b></td><tr/><tr><td colspan='2' height='40%'></td></tr>";

	if($gs_name != ''){
		$gs_admin_usermsg .= "<tr><td align='left' width='80px'>".__('Name :','skyliteforms')."</td><td>".$gs_name."</td></tr>";
	} 

	$gs_admin_usermsg .= "<tr><td align='left' width='80px'>".__('Email ID :','skyliteforms')." </td><td>".$gs_email."</td></tr>";

	if($gs_venue != ''){
		$gs_admin_usermsg .= "<tr><td align='left' width='70px'>".__('Venue :','skyliteforms')."</td><td>".$gs_venue."</td></tr>";
	}

	if($gs_date != ''){
		$gs_admin_usermsg .= "<tr><td align='left' width='80px'>".__('Date :','skyliteforms')."</td><td>".$gs_date."</td></tr>";
	}

	if( $gs_comment != ''){ 
		$gs_admin_usermsg .= "<tr><td align='left' valign='top' width='70px'>".__('Comment : ','skyliteforms')."</td><td>".$gs_comment."</td></tr></table>";		
	}

	if($gs_name == '') {	
		$gs_name = 'User';
	}
	$gs_admin_subject = 'Guest Service : '.$gs_name.__(' has contacted us','skyliteforms');
	$gs_admin_headers = "MIME-Version: 1.0\n";
	$gs_admin_headers .= "Content-type: text/html; charset=UTF-8\n";	
	$gs_admin_headers .= "From: ".$gs_name." <".$gs_email.">\n";
	$gs_admin_headers .= "Message-Id: <".time()."@".$_SERVER['SERVER_NAME'].">\n";
	$gs_admin_headers .= "X-Mailer: php-mail-function-0.2\n";
   
	if($arr == 1) {		
		wp_mail($gs_email, $gs_subject_mail, $gs_reply_msg, $gs_headers);
		wp_mail($gs_emailadmin, $gs_admin_subject, $gs_admin_usermsg, $gs_admin_headers);
		$date = date("Y-m-d");
		$table_name = $wpdb->prefix."sf_guest_list";
		$date = current_time( 'mysql' );
		
		// Inserted User data into database.		
		if($gs_name != 'User' && $gs_name != '') {
				$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name(  gs_username , gs_email_id ,gs_venue ,gs_date , gs_comment , gs_insert_date )VALUES ( %s, %s, %s,  %s, %s, %s )",  array( $gs_name, $gs_email, $gs_venue ,$gs_date ,$gs_comment, $date ) ) );
		} else {
				$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name(  gs_email_id ,gs_venue ,gs_date , gs_comment , gs_insert_date )VALUES (  %s, %s,  %s, %s, %s )",  array( $gs_email, $gs_venue ,$gs_date ,$gs_comment, $date ) ) );
		}
				
		//Added  request data into mailchimp database 
		
			$apikey = esc_attr(get_option('sf_api_key'));
			if($apikey !=''){
				$active_mail_chimp =  get_option('gsmclists') ;		
				require_once( SF_PDIR_PATH.'/include/AIMCAPI.class.php');		
				$storedata = new AIMCAPI($apikey);
				if($gs_name != 'User' && $gs_name != '') {
					$gs_merge_vars = array('FNAME'=>$gs_name);
				} else {
					$gs_merge_vars = array();
				}
				if($active_mail_chimp) {
					foreach($active_mail_chimp as $list_id => $list_val) {			
						$storedata->listSubscribe($list_id, $gs_email, $gs_merge_vars);
					}
					if ($storedata->errorCode) {
						echo $storedata->errorMessage;
					}
				}	
			}
	}
	echo json_encode($arr);	
	die(); 	
}


add_action('wp_ajax_nopriv_sf-guest-view', 'sf_guest_view');
add_action('wp_ajax_sf-guest-view', 'sf_guest_view');
function sf_guest_view() {
	global $wpdb;
	$table_name = $wpdb->prefix . "sf_guest_list";
	$param = '';
	$today = date('Y-m-d');

	if($_GET['Id']) {
		$records = $wpdb->get_results( $wpdb->prepare( "select * from ".$table_name." where gs_user_id=%d order by gs_user_id DESC", $_GET['Id'] ));
		$view = '<table class="wp-list-table widefat fixed display" id="userlist_view" width="100%">
			<tbody>
				<tr><th colspan="2"><h3>'.__('Guest Service Request Details').'</h3></th></tr>
				<tr><th align="left" valign="top">'.__('Username').'</th><td>'.$records[0]->gs_username.'</td></tr>
				<tr><th align="left" valign="top">'.__('Email Address').'</th><td>'.$records[0]->gs_email_id.'</td></tr>
				<tr><th align="left" valign="top">'.__('Venue').'</th><td>'.$records[0]->gs_venue.'</td></tr>
				<tr><th align="left" valign="top">'.__('Date').'</th><td>'.date('d M Y', strtotime($records[0]->gs_date)).'</td></tr>
				<tr><th align="left" valign="top">'.__('Comment').'</th><td>'.$records[0]->gs_comment.'</td></tr>
				<tr><th align="left" valign="top">'.__('Request Date').'</th><td>'.date('d M Y', strtotime($records[0]->gs_insert_date)).'</td></tr>
			</tbody>
		</table>';
		echo $view;
	} else {
		_e('No Guest Service Request Found');
	}
	die();
}


// E: Guest service



// S: Bottle Service
add_action('wp_ajax_bs_action', 'bs_action_call');
add_action('wp_ajax_nopriv_bs_action', 'bs_action_call');

function bs_action_call(){	
	global $wpdb;
	$data = $_POST['bsfdata'];
	$returndata = array();
	if(empty($data)) return;
	$strArray = explode("&", $data);
	$i = 0;

	foreach($strArray as $item){
		$array = explode("=", $item);
		$returndata[$array[0]] = $array[1];
	}
	
	foreach($returndata as $key => $val){
		if($key == 'bs_name'){
			$bs_name = sanitize_text_field(urldecode($val));
		} elseif($key == 'bs_email') {
			$bs_email =  sanitize_email(urldecode($val));
		} elseif($key == 'bs_date') {
			$bs_date = $val;
		} elseif($key == 'bs_venue') {
			$bs_venue = sanitize_text_field(urldecode($val));
		} elseif($key == 'bs_details') {
			$bs_details = sanitize_text_field(urldecode($val));
		}elseif($key == 'bs_phoneno') {
			$bs_phoneno = urldecode($val);
		}  		
	}

	if(get_option('bs_email_address_setting')==''){
		$bs_emailadmin = sanitize_email(get_option('admin_email'));	

	} else {
		$bs_emailadmin = get_option('bs_email_address_setting');
	}
        
	if(get_option('bs_subject_text')==''){
		$bs_subtext = __('Skylite DC','skyliteforms');
	} else {
		$bs_subtext = get_option('bs_subject_text');
	}

	if(get_option('bs_reply_user_message')==''){
		$bs_reply_msg = __('Thank you for contacting us...We will get back to you soon...','skyliteforms');
	} else {
		$bs_reply_msg = get_option('bs_reply_user_message');
	}	

	$arr = 1;
	

	// settings for mail received by user
	$bs_subject_mail = __('Reply : ','skyliteforms').$bs_subtext;	
	$bs_headers = "MIME-Version: 1.0\n";
	$bs_headers .= "Content-type: text/html; charset=UTF-8\n";
	$bs_headers .= "From:".get_bloginfo('name')." <".$bs_emailadmin.">\n";
	$bs_headers .= "Message-Id: <".time()."@".$_SERVER['SERVER_NAME'].">\n";
	$bs_headers .= "X-Mailer: php-mail-function-0.2\n";

	// settings for mail received by admin			
	$bs_admin_usermsg = "<table><tr><td colspan='2'><b>".__('Bottle Service User Details','skyliteforms')."</b></td><tr/><tr><td colspan='2' height='40%'></td></tr>";

	if($bs_name != ''){
		$bs_admin_usermsg .= "<tr><td align='left' width='80px'>".__('Name :','skyliteforms')."</td><td>".$bs_name."</td></tr>";
	} 

	$bs_admin_usermsg .= "<tr><td align='left' width='80px'>".__('Email ID :','skyliteforms')." </td><td>".$bs_email."</td></tr>";

	if($bs_venue != ''){
		$bs_admin_usermsg .= "<tr><td align='left' width='70px'>".__('Venue :','skyliteforms')."</td><td>".$bs_venue."</td></tr>";
	}

	if($bs_date != ''){
		$bs_admin_usermsg .= "<tr><td align='left' width='80px'>".__('Date :','skyliteforms')."</td><td>".$bs_date."</td></tr>";
	}
	
	if( $bs_phoneno != ''){
		$bs_admin_usermsg .= "<tr><td align='left' width='70px'>".__('Phone No. :','skyliteforms')."</td><td>".$bs_phoneno."</td></tr>";
	}

	if( $bs_details != ''){ 
		$bs_admin_usermsg .= "<tr><td align='left' valign='top' width='70px'>".__('Details : ','skyliteforms')."</td><td>".$bs_details."</td></tr></table>";		
	}

	if($bs_name == '') {	
		$bs_name = 'User';
	}
	$bs_admin_subject = 'Bottle Service : '.$bs_name.__(' has contacted us','skyliteforms');
	$bs_admin_headers = "MIME-Version: 1.0\n";
	$bs_admin_headers .= "Content-type: text/html; charset=UTF-8\n";	
	$bs_admin_headers .= "From: ".$bs_name." <".$bs_email.">\n";
	$bs_admin_headers .= "Message-Id: <".time()."@".$_SERVER['SERVER_NAME'].">\n";
	$bs_admin_headers .= "X-Mailer: php-mail-function-0.2\n";
   
	if($arr == 1) {		
		wp_mail($bs_email, $bs_subject_mail, $bs_reply_msg, $bs_headers);
		wp_mail($bs_emailadmin, $bs_admin_subject, $bs_admin_usermsg, $bs_admin_headers);
		$date = date("Y-m-d");
		$table_name = $wpdb->prefix."sf_bottle_list";
		$date = current_time( 'mysql' );
		
		// Inserted User data into database.		
		if($bs_name != 'User' && $bs_name != '') {
				$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name(  bs_username  , bs_email_id  ,bs_venue  ,bs_date  ,bs_phoneno , bs_details  , bs_insert_date  )VALUES ( %s, %s, %s,  %s, %s, %s, %s )",  array( $bs_name, $bs_email, $bs_venue ,$bs_date ,$bs_phoneno,$bs_details, $date ) ) );
		} else {
				$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name( bs_email_id  ,bs_venue  ,bs_date  ,bs_phoneno , bs_details  , bs_insert_date )VALUES (  %s, %s, %s, %s, %s, %s )",  array( $bs_email, $bs_venue ,$bs_date ,$bs_phoneno,$bs_details, $date ) ) );
		}
				
		//Added  request data into mailchimp database 
		
			$apikey = esc_attr(get_option('sf_api_key'));
			if($apikey !=''){
				$active_mail_chimp =  get_option('bsmclists') ;		
				require_once( SF_PDIR_PATH.'/include/AIMCAPI.class.php');		
				$storedata = new AIMCAPI($apikey);
				if($bs_name != 'User' && $bs_name != '') {
					$bs_merge_vars = array('FNAME'=>$bs_name);
				} else {
					$bs_merge_vars = array();
				}
				if($active_mail_chimp) {
					foreach($active_mail_chimp as $list_id => $list_val) {			
						$storedata->listSubscribe($list_id, $bs_email, $bs_merge_vars);
					}
					if ($storedata->errorCode) {
						echo $storedata->errorMessage;
					}
				}	
			}
	}
	echo json_encode($arr);	
	die(); 	
}


add_action('wp_ajax_nopriv_sf-bottle-view', 'sf_bottle_view');
add_action('wp_ajax_sf-bottle-view', 'sf_bottle_view');
function sf_bottle_view() {
	global $wpdb;
	$table_name = $wpdb->prefix . "sf_bottle_list";
	$param = '';
	$today = date('Y-m-d');

	if($_GET['Id']) {
		$records = $wpdb->get_results( $wpdb->prepare( "select * from ".$table_name." where bs_user_id=%d order by bs_user_id DESC", $_GET['Id'] ));
		$view = '<table class="wp-list-table widefat fixed display" id="userlist_view" width="100%">
			<tbody>
				<tr><th colspan="2"><h3>'.__('Bottle Service Request Details').'</h3></th></tr>
				<tr><th align="left" valign="top">'.__('Username').'</th><td>'.$records[0]->bs_username.'</td></tr>
				<tr><th align="left" valign="top">'.__('Email Address').'</th><td>'.$records[0]->bs_email_id.'</td></tr>
				<tr><th align="left" valign="top">'.__('Venue').'</th><td>'.$records[0]->bs_venue.'</td></tr>
				<tr><th align="left" valign="top">'.__('Phone No.').'</th><td>'.$records[0]->bs_phoneno.'</td></tr>
				<tr><th align="left" valign="top">'.__('Date').'</th><td>'.date('d M Y', strtotime($records[0]->bs_date)).'</td></tr>
				<tr><th align="left" valign="top">'.__('Details').'</th><td>'.$records[0]->bs_details.'</td></tr>
				<tr><th align="left" valign="top">'.__('Request Date').'</th><td>'.date('d M Y', strtotime($records[0]->bs_insert_date)).'</td></tr>
			</tbody>
		</table>';
		echo $view;
	} else {
		_e('No Bottle Service Request Found');
	}
	die();
}


// E: Bottle Service



// S: Contact Us
add_action('wp_ajax_cu_action', 'cu_action_call');
add_action('wp_ajax_nopriv_cu_action', 'cu_action_call');

function cu_action_call(){	
	global $wpdb;
	$data = $_POST['cufdata'];
	$returndata = array();
	if(empty($data)) return;
	$strArray = explode("&", $data);
	$i = 0;

	foreach($strArray as $item){
		$array = explode("=", $item);
		$returndata[$array[0]] = $array[1];
	}
	
	foreach($returndata as $key => $val){
		if($key == 'cu_name'){
			$cu_name = sanitize_text_field(urldecode($val));
		} elseif($key == 'cu_email') {
			$cu_email =  sanitize_email(urldecode($val));
		} elseif($key == 'cu_message') {
			$cu_message = sanitize_text_field(urldecode($val));
		} 		
	}

	if(get_option('cu_email_address_setting')==''){
		$cu_emailadmin = sanitize_email(get_option('admin_email'));	

	} else {
		$cu_emailadmin = get_option('cu_email_address_setting');
	}
        
	if(get_option('cu_subject_text')==''){
		$cu_subtext = __('Skylite DC','skyliteforms');
	} else {
		$cu_subtext = get_option('cu_subject_text');
	}

	if(get_option('cu_reply_user_message')==''){
		$cu_reply_msg = __('Thank you for contacting us...We will get back to you soon...','skyliteforms');
	} else {
		$cu_reply_msg = get_option('cu_reply_user_message');
	}	

	$arr = 1;
	

	// settings for mail received by user
	$cu_subject_mail = __('Reply : ','skyliteforms').$cu_subtext;	
	$cu_headers = "MIME-Version: 1.0\n";
	$cu_headers .= "Content-type: text/html; charset=UTF-8\n";
	$cu_headers .= "From:".get_bloginfo('name')." <".$cu_emailadmin.">\n";
	$cu_headers .= "Message-Id: <".time()."@".$_SERVER['SERVER_NAME'].">\n";
	$cu_headers .= "X-Mailer: php-mail-function-0.2\n";

	// settings for mail received by admin			
	$cu_admin_usermsg = "<table><tr><td colspan='2'><b>".__('ContactUs User Details','skyliteforms')."</b></td><tr/><tr><td colspan='2' height='40%'></td></tr>";

	if($cu_name != ''){
		$cu_admin_usermsg .= "<tr><td align='left' width='80px'>".__('Name :','skyliteforms')."</td><td>".$cu_name."</td></tr>";
	} 

	$cu_admin_usermsg .= "<tr><td align='left' width='80px'>".__('Email ID :','skyliteforms')." </td><td>".$cu_email."</td></tr>";

	if( $cu_message != ''){ 
		$cu_admin_usermsg .= "<tr><td align='left' valign='top' width='70px'>".__('Message : ','skyliteforms')."</td><td>".$cu_message."</td></tr></table>";		
	}

	if($cu_name == '') {	
		$cu_name = 'User';
	}
	$cu_admin_subject = 'ContactUS : '.$cu_name.__(' has contacted us','skyliteforms');
	$cu_admin_headers = "MIME-Version: 1.0\n";
	$cu_admin_headers .= "Content-type: text/html; charset=UTF-8\n";	
	$cu_admin_headers .= "From: ".$cu_name." <".$cu_email.">\n";
	$cu_admin_headers .= "Message-Id: <".time()."@".$_SERVER['SERVER_NAME'].">\n";
	$cu_admin_headers .= "X-Mailer: php-mail-function-0.2\n";
   
	if($arr == 1) {		
		wp_mail($cu_email, $cu_subject_mail, $cu_reply_msg, $cu_headers);
		wp_mail($cu_emailadmin, $cu_admin_subject, $cu_admin_usermsg, $cu_admin_headers);
		$date = date("Y-m-d");
		$table_name = $wpdb->prefix."sf_contactus_list";
		$date = current_time( 'mysql' );
		
		// Inserted User data into database.		
		if($cu_name != 'User' && $cu_name != '') {
				$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name(  cu_username , cu_email_id ,cu_message ,cu_insert_date )VALUES ( %s, %s, %s, %s)",  array( $cu_name, $cu_email, $cu_message , $date ) ) );
		} else {
				$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name(  cu_email_id ,cu_message ,cu_insert_date )VALUES ( %s, %s,  %s)",  array( $cu_email, $cu_message , $date ) ) );
		}
				
		//Added  request data into mailchimp database 
		
			$apikey = esc_attr(get_option('sf_api_key'));
			if($apikey !=''){
				$active_mail_chimp =  get_option('cumclists') ;		
				require_once( SF_PDIR_PATH.'/include/AIMCAPI.class.php');		
				$storedata = new AIMCAPI($apikey);
				if($cu_name != 'User' && $cu_name != '') {
					$cu_merge_vars = array('FNAME'=>$cu_name);
				} else {
					$cu_merge_vars = array();
				}
				if($active_mail_chimp) {
					foreach($active_mail_chimp as $list_id => $list_val) {			
						$storedata->listSubscribe($list_id, $cu_email, $cu_merge_vars);
					}
					if ($storedata->errorCode) {
						echo $storedata->errorMessage;
					}
				}	
			}
	}
	echo json_encode($arr);	
	die(); 	
}


add_action('wp_ajax_nopriv_sf-contactus-view', 'sf_contactus_view');
add_action('wp_ajax_sf-contactus-view', 'sf_contactus_view');
function sf_contactus_view() {
	global $wpdb;
	$table_name = $wpdb->prefix . "sf_contactus_list";
	$param = '';
	$today = date('Y-m-d');

	if($_GET['Id']) {
		$records = $wpdb->get_results( $wpdb->prepare( "select * from ".$table_name." where cu_user_id =%d order by cu_user_id  DESC", $_GET['Id'] ));
		$view = '<table class="wp-list-table widefat fixed display" id="userlist_view" width="100%">
			<tbody>
				<tr><th colspan="2"><h3>'.__('ContactUs Request Details').'</h3></th></tr>
				<tr><th align="left" valign="top">'.__('Username').'</th><td>'.$records[0]->cu_username.'</td></tr>
				<tr><th align="left" valign="top">'.__('Email Address').'</th><td>'.$records[0]->cu_email_id.'</td></tr>	
				<tr><th align="left" valign="top">'.__('Message').'</th><td>'.$records[0]->cu_message.'</td></tr>
				<tr><th align="left" valign="top">'.__('Request Date').'</th><td>'.date('d M Y', strtotime($records[0]->cu_insert_date)).'</td></tr>
			</tbody>
		</table>';
		echo $view;
	} else {
		_e('No ContactUs Request Found');
	}
	die();
}
// E: Contact Us
?>