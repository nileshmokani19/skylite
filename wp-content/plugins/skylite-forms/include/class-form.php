<?php
/**
* Get MailChimp Lists to subscribe to
* 
* @return array Array of selected MailChimp lists
*/
// Guest service
function gs_get_lists(){
	require_once('AIMCAPI.class.php');
	
	$apikey = esc_attr(get_option('sf_api_key'));
	
	$api = new AIMCAPI($apikey);
	
    $lists = $api->lists();

	return $lists;
	
}
//Bottle Service
function bs_get_lists(){
	require_once('AIMCAPI.class.php');
	
	$apikey = esc_attr(get_option('sf_api_key'));
	
	$api = new AIMCAPI($apikey);
	
    $lists = $api->lists();

	return $lists;
	
}

//Contactus 
function cu_get_lists(){
	require_once('AIMCAPI.class.php');
	
	$apikey = esc_attr(get_option('sf_api_key'));
	
	$api = new AIMCAPI($apikey);
	
    $lists = $api->lists();

	return $lists;
	
}
?>
