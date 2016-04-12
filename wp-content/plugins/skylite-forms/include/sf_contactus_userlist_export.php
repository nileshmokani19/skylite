<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
global $wpdb;
$table_name = $wpdb->prefix . "sf_contactus_list";
$act=$_REQUEST["act"];	
	$startdate=$_POST['custart_date'];
	$enddate=$_POST['cuend_date'];	
	$stdateold=explode("/",$startdate);
	$stdatenew=$stdateold[2]."-".$stdateold[0]."-".$stdateold[1];
	$endateold=explode("/",$enddate);
	$endatenew=$endateold[2]."-".$endateold[0]."-".$endateold[1];
	$export_result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE cu_insert_date >= %s and cu_insert_date <= %s order by cu_user_id ASC", $stdatenew, $endatenew ) );
	$rs =' 
		<table border="1" cellspacing="1" cellpadding="0">
			<tr>
				<th align="center" valign="middle" colspan="4">'.__('List Of Users Contacted Site','skyliteforms').'</th>				
			</tr>
			<tr>
				<th align="left" valign="middle">'.__('User ID','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Username','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Email Address','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Message','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Contact Date','skyliteforms').'</th>
			</tr>';
			foreach($export_result as $row)
			{ 								  
				$rs.= '<tr>
					<td align="left" valign="middle">'.$row->cu_user_id.'</td>
					<td align="left" valign="middle">'.$row->cu_username.'</td>
					<td align="left" valign="middle">'.$row->cu_email_id.'</td>
					<td align="left" valign="middle">'.$row->cu_message.'</td>
					<td align="left" valign="middle">'.$row->cu_insert_date.'</td>
				</tr>';
			}
		$rs.= '</table>';
	$filename = "ContactUS User-list" . date('Y-m-d g-i');
	header("Content-type: application/vnd.ms-excel");
	header("Content-disposition: xls" . date("Y-m-d") . ".xls");
	header( "Content-disposition: filename=".$filename.".xls");
	echo $rs;
	exit;	
?>