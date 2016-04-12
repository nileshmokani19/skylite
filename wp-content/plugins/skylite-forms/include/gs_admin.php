<div class="wrap">
<h2>MailChimp Settings</h2>

<form action="options.php" method="post">	

<?php settings_fields( 'gs-settings-group' ); ?>
<?php do_settings_sections( 'gs-settings-group' ); ?>

<table class="form-table">
	<tbody>
		<tr valign="top">
			<th scope="row">
				<label><?php _e( 'Mailchimp API Key', 'skyliteforms' );?></label>
			</th>
			<td>
				<input type="text" id="sf_api_key" name="sf_api_key" value="<?php _e(esc_attr(get_option('sf_api_key')));?>" size="80"/>
		    </td>
		</tr>
	</tbody>
</table>
<h2>Guest Service MailChimp Settings</h2>
<table class="form-table">
	<tbody>	
		<tr valign="top">
			<th scope="row">MailChimp list(s)</th>
		<?php if(empty($gslists)) { ?>
			<td colspan="2">No lists found, are you connected to MailChimp?</td><?php
		} else { ?>
			<td>
				<ul id="sfmc-lists">
			<?php 
			$options="";
			$options =  get_option('gsmclists') ; 
			foreach($gslists['data'] as $list) {?>
				<li>
					<label>
						<input type="checkbox" name="gsmclists[<?php echo esc_attr($list['id']); ?>]" value="1" <?php if($options!=""):checked( 1 == $options[$list['id']] ); endif ?> /><?php echo $list['name'];?>
					</label>
				</li>
			<?php } ?>
			   </ul>
			   <p>Select the list(s) to which people who tick the checkbox should be subscribed.</p>
		  </td>

	 <?php } ?>
	 </tr>	
	
	</tbody>
</table>

<h2>Bottle Service MailChimp Settings</h2>
<table class="form-table">
	<tbody>	
		<tr valign="top">
			<th scope="row">MailChimp list(s)</th>
		<?php if(empty($bslists)) { ?>
			<td colspan="2">No lists found, are you connected to MailChimp?</td><?php
		} else { ?>
			<td>
				<ul id="sfmc-lists">
			<?php 
			$boptions="";
			$boptions =  get_option('bsmclists') ; 
			foreach($bslists['data'] as $list) {?>
				<li>
					<label>
						<input type="checkbox" name="bsmclists[<?php echo esc_attr($list['id']); ?>]" value="1" <?php if($boptions!=""):checked( 1 == $boptions[$list['id']] ); endif ?> /><?php echo $list['name'];?>
					</label>
				</li>
			<?php } ?>
			   </ul>
			   <p>Select the list(s) to which people who tick the checkbox should be subscribed.</p>
		  </td>

	 <?php } ?>
	 </tr>	
	
	</tbody>
</table>
<h2>ContactUS MailChimp Settings</h2>
<table class="form-table">
	<tbody>	
		<tr valign="top">
			<th scope="row">MailChimp list(s)</th>
		<?php if(empty($culists)) { ?>
			<td colspan="2">No lists found, are you connected to MailChimp?</td><?php
		} else { ?>
			<td>
				<ul id="sfmc-lists">
			<?php 
			$options="";
			$options =  get_option('cumclists') ; 
			foreach($culists['data'] as $list) {?>
				<li>
					<label>
						<input type="checkbox" name="cumclists[<?php echo esc_attr($list['id']); ?>]" value="1" <?php if($options!=""):checked( 1 == $options[$list['id']] ); endif ?> /><?php echo $list['name'];?>
					</label>
				</li>
			<?php } ?>
			   </ul>
			   <p>Select the list(s) to which people who tick the checkbox should be subscribed.</p>
		  </td>

	 <?php } ?>
	 </tr>	
	
	</tbody>
</table>

<table class="form-table">
	<tbody>	
	<tr valign="top">
		<td colspan="2">
			<?php submit_button( 'Submit' );?>
		</td>
	</tr>	
	</tbody>
</table>	
</form>
</div>