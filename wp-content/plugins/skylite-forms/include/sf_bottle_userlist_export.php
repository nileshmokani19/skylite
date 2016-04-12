<?php
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );
	global $wpdb;
	$table_name = $wpdb->prefix . "sf_bottle_list";
	$act=$_REQUEST["act"];	
	$startdate=$_POST['bsstart_date'];
	$enddate=$_POST['bsend_date'];	
	$stdateold=explode("/",$startdate);
	$stdatenew=$stdateold[2]."-".$stdateold[0]."-".$stdateold[1];
	$endateold=explode("/",$enddate);
	$endatenew=$endateold[2]."-".$endateold[0]."-".$endateold[1];
	$export_result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE bs_insert_date >= %s and bs_insert_date <= %s order by bs_user_id ASC", $stdatenew, $endatenew ) );
	$rs =' 
		<table border="1" cellspacing="1" cellpadding="0">
			<tr>
				<th align="center" valign="middle" colspan="4">'.__('List Of Users Contacted Site','skyliteforms').'</th>				
			</tr>
			<tr>
				<th align="left" valign="middle">'.__('User ID','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Username','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Email Address','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Phone No.','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Venue','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Date','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Details','skyliteforms').'</th>
				<th align="left" valign="middle">'.__('Contact Date','skyliteforms').'</th>
			</tr>';
			foreach($export_result as $row)
			{ 								  
				$rs.= '<tr>
					<td align="left" valign="middle">'.$row->bs_user_id.'</td>
					<td align="left" valign="middle">'.$row->bs_username.'</td>
					<td align="left" valign="middle">'.$row->bs_email_id.'</td>
					<td align="left" valign="middle">'.$row->bs_phoneno.'</td>
					<td align="left" valign="middle">'.$row->bs_venue.'</td>
					<td align="left" valign="middle">'.$row->bs_date.'</td>
					<td align="left" valign="middle">'.$row->bs_details.'</td>
					<td align="left" valign="middle">'.$row->bs_insert_date.'</td>
				</tr>';
			}
		$rs.= '</table>';
	$filename = "Bottle User-list" . date('Y-m-d g-i');
	header("Content-type: application/vnd.ms-excel");
	header("Content-disposition: xls" . date("Y-m-d") . ".xls");
	header( "Content-disposition: filename=".$filename.".xls");
	echo $rs;
	exit;	
?>