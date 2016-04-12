<?php
	global $wpdb;
	$table_name = $wpdb->prefix . "sf_bottle_list";
	$info=$_GET["info"];
	if(!empty($info)){
		if($info=="del")
		{
			$delid = sanitize_title_for_query($_GET["did"]);
			if(!empty($delid)){
				$wpdb->query( $wpdb->prepare( "delete from ".$table_name." where `bs_user_id`= %s", $delid) );
				echo "<div style='clear:both;'></div><div class='updated' id='message'><p><strong>:".__('User Record Deleted.','skyliteforms')."</strong>.</p></div>";
			}
			
		}
	}
	
	$Action = $_GET["Action"];
	if($Action == "delall") {
		if(isset($_POST['delete'])) {
			$delete_id = $_POST['bsuserid'];
			$id = count($delete_id );
			if (count($id) > 0 && !empty($delete_id)) {
				foreach ($delete_id as $id_d) {
					$delete = $wpdb->query("delete from ".$table_name." where `bs_user_id`=".$id_d);
				}
			}
			if($delete) {
				echo "<div style='clear:both;'></div><div class='updated' id='message'><p><strong>".__('Selected Guest Service Request Deleted.')."</strong>.</p></div>";
			}
		}
	}
	
?>
<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

</style>
<div class="wrap"> 
	<h2><?php _e('Bottle Service : List of User Records','skyliteforms');?>
		<a class="button add-new-h2 dateshow" href="#"><?php _e('Export User Records','skyliteforms');?></a>
	</h2>
	<form method="post" name="bsexportdate" id="bsexportdateform" action="<?php echo plugins_url();?>/skylite-forms/include/sf_bottle_userlist_export.php" >	
         <div id="bsdateexport" style="display:none;width:100%;margin-bottom:10px;">
             <div class="form-wrap">
             <div style="float:left;">
           		  <label><?php _e('From Date','skyliteforms');?></label><input type="text" name="bsstart_date" id="bsstartdate" class="input-txt" value=""/><br/><?php _e('(Format: MM-DD-YYYY)','skyliteforms');?>
             </div>
			 <div style="float:left;margin-left:50px;">
	             <label><?php _e('To Date','skyliteforms');?></label><input type="text" name="bsend_date" id="bsenddate" class="input-txt" value=""/><br/><?php _e('(Format: MM-DD-YYYY)','skyliteforms');?>
             </div>
             <div style="float:left;margin-left:50px;margin-top:22px;">
	             <input type="submit" value="<?php _e('Go','skyliteforms');?>" class="button add-new-h2 checkdate" id="bssubmit" name="submit"/>
	             <a class="button add-new-h2 checkcancel" href="#"><?php _e('Cancel','skyliteforms');?></a>
           	 </div>             
             </div>
         </div>
  	</form>
			<?php settings_fields( 'bs-fields' ); ?>
			<form name="sfbform" method="post" action="admin.php?page=sf_bottle_user_lists&Action=delall">	
			<table class="wp-list-table widefat fixed display" id="bsuserlist">
			<caption style="color:#9CC;"><?php _e('Please click on column\'s title to sort the data according to specific column !!!','skyliteforms');?> </caption>
				<thead style="cursor: pointer;">
					<tr>
						<th style="width:20px;text-align:left;background:none"><input type="checkbox" id="bsalluser" /></th>
						<th style="width:50px;text-align:left;"><u><?php _e('Sr. No','skyliteforms');?></u></th>
						<th style="width:150px;text-align:left;"><u><?php _e('Username','skyliteforms');?></u></th> 
						<th style="width:200px;text-align:left;"><u><?php _e('Email Address','skyliteforms');?></u></th>                        <th style="width:70px;text-align:left;"><u><?php _e('Phone No.','skyliteforms');?></u></th>
						<th style="width:100px;text-align:left;"><u><?php _e('Venue','skyliteforms');?></u></th>
						<th style="width:50px;text-align:left;"><u><?php _e('Date','skyliteforms');?></u></th>
						<th style="width:100px;text-align:left;"><u><?php _e('Details','skyliteforms');?></u></th> 
						<th style="width:60px;text-align:left;"><u><?php _e('Request Date','skyliteforms');?></u></th>                        <th style="width:50px;text-align:center;"><?php _e('Action','skyliteforms');?></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th style="width:20px;text-align:left;background:none"><input type="checkbox" id="bsalluser" /></th>
						<th style="width:50px;text-align:left;"><u><?php _e('Sr. No','skyliteforms');?></u></th>
						<th style="width:150px;text-align:left;"><u><?php _e('Username','skyliteforms');?></u></th> 
						<th style="width:200px;text-align:left;"><u><?php _e('Email Address','skyliteforms');?></u></th>                        <th style="width:70px;text-align:left;"><u><?php _e('Phone No.','skyliteforms');?></u></th>
						<th style="width:100px;text-align:left;"><u><?php _e('Venue','skyliteforms');?></u></th>
						<th style="width:50px;text-align:left;"><u><?php _e('Date','skyliteforms');?></u></th>
						<th style="width:100px;text-align:left;"><u><?php _e('Details','skyliteforms');?></u></th> 
						<th style="width:60px;text-align:left;"><u><?php _e('Request Date','skyliteforms');?></u></th>                        <th style="width:50px;text-align:center;"><?php _e('Action','skyliteforms');?></th>
					</tr>
				</tfoot>
				<tbody>				     
					<?php
					
					$sql = $wpdb->get_results( "select * from ".$table_name." order by bs_user_id ASC" );								
					$no = 1;
					if ( ! empty( $sql ) ) { ?>
						<script type="text/javascript">
							/* <![CDATA[ */
							jQuery(document).ready(function(){
								
								// Setup - add a text input to each footer cell
								jQuery('#bsuserlist tfoot th').each( function () {
									var title = jQuery(this).text();
									jQuery(this).html( '<input type="text" placeholder="Search '+title+'" />' );
								} );
								
								
								var table = jQuery('#bsuserlist').DataTable({
									 "aaSorting": [[ 0, "desc" ]],
									  "pageLength": 10,
									 dom: 'Bfrtip',
									 buttons: [
											'copy', 'csv', 'excel', 'pdf', 'print'
									 ],
									 initComplete: function ()
									{
									  var r = jQuery('#bsuserlist tfoot tr');
									  r.find('th').each(function(){
										jQuery(this).css('padding', 8);
									  });
									  r.find('input').each(function(){
										jQuery(this).css('width', '100%');
									  });
									  jQuery('#bsuserlist thead').append(r);
									  jQuery('#search_0').css('text-align', 'center');
									},
								});
								
								
								
								// Apply the search
								table.columns().every( function () {
									var that = this;
							 
									jQuery( 'input', this.footer() ).on( 'keyup change', function () {
										if ( that.search() !== this.value ) {
											that
												.search( this.value )
												.draw();
										}
									} );
								} );
	
								jQuery( "#bsstartdate").datepicker();
								jQuery( "#bsenddate").datepicker();
							});
							jQuery('.dateshow').click(function(){
								jQuery('#bsdateexport').show();
							});
							jQuery('.checkdate').click(function(){
								if(jQuery('#bsstartdate').val() == '' || jQuery('#bsenddate').val() == '')
								{
									alert("please select the date");
									return false;
								}
							});
							jQuery('.checkcancel').click(function(){
								var str='';
								jQuery('#bsdateexport').hide();
								jQuery('#bsstartdate').val(str);
								jQuery('#bsenddate').val(str);
							});
							/* ]]> */						
						</script><?php
						foreach ( $sql as $user ) {
							$bs_user_id        = $user->bs_user_id;
							$bs_username  	   = $user->bs_username;
							$bs_email_id       = $user->bs_email_id;
							$bs_phoneno        = $user->bs_phoneno;
							$bs_venue          = $user->bs_venue;
							$bs_date           = $user->bs_date;
							$bs_details        = $user->bs_details;
							$bs_insert_date    = $user->bs_insert_date; ?>
							<tr>
								<th style="width:20px;text-align:center;" ><input class="bsuserid" type="checkbox" name="bsuserid[]" id="bsuserid" value="<?php echo $bs_user_id; ?>" /></th>
								<td style="width:40px;text-align:center;"><?php echo $no; ?></td>
								<td nowrap><?php echo urldecode($bs_username); ?></td>
								<td nowrap><?php echo $bs_email_id; ?></td>
								<td nowrap><?php echo $bs_phoneno; ?></td>
								<td nowrap><?php echo $bs_venue; ?></td>
								<td nowrap><?php echo date('d M Y', strtotime($bs_date)); ?></td> 
								<td><?php echo $bs_details; ?></td> 
								<td style="text-align:center;"><?php echo date('d M Y', strtotime($bs_insert_date)); ?></td>                
								<td style="width:40px;text-align:center;">								
									<a onclick="javascript:return confirm('Are you sure, want to delete record of <?php echo $bs_username; ?>?')" href="admin.php?page=sf_bottle_user_lists&info=del&did=<?php echo $bs_user_id;?>">
									<img src="<?php echo plugins_url(); ?>/skylite-forms/images/delete.png" title="Delete" alt="Delete" style="height:18px;" />
									</a>&nbsp;
									<a href="<?php echo admin_url('admin-ajax.php') ?>?action=sf-bottle-view&Id=<?php echo $bs_user_id;?>" class="iframe">
									<img src="<?php echo plugins_url(); ?>/skylite-forms/images/view.jpg" title="View" alt="View" />
								</a>
								</td>                
							</tr>
						<?php $no += 1;							
						}
					} else {
						echo __('<tr><td colspan="7">No User Records Found !!!</td></tr>','skyliteforms');
					} ?>					
				</tbody>
			</table>
			<?php if ( ! empty( $sql ) ) { ?>
			<p>
				<input type="submit" name="delete" class="add-new-h2 button-secondary" onclick="javascript:return confirm('Are you sure, want to delete all checked record?')" value="<?php _e('Delete');  ?>">
			</p>
			<?php }?>
			</form>
</div>			