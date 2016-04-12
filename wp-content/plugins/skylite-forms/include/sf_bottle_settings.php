<style>
.icon32 { display: block; float: left; margin-right: 10px; vertical-align: middle; }
.wrap h3 { margin-bottom:0; color: #222; border:0; }
#form-settings { border-top: 5px solid #dfdfdf; }
#form-settings .field-name { font-weight: bold; width: 60px; text-align:right; }
#form-settings .field-status { width: 60px; text-align:center; }
#email-settings { border-top: 5px solid #dfdfdf; }
#email-settings th { width: 162px; }
</style>

<div class="wrap"> 
	
	<h2><?php _e('Bottle Service Settings','skyliteforms'); ?></h2>
	<form method="post" action="options.php" name="BSGolbalSiteOptions">
		<?php settings_fields( 'bs-fields' ); ?>
		<h3 class="title"><?php _e('Mail Settings','skyliteforms'); ?></h3>
		<table class="form-table" id="email-settings">
			<tbody>
				<tr>
					<th scope="row"><label for="bs_email_address_setting">
					<?php _e('Email Address:','skyliteforms');?>
					</label></th>
					<td><input type="text" name="bs_email_address_setting" class="regular-text" value="<?php echo esc_attr(get_option('bs_email_address_setting'));?>"></td>
					<td><?php _e('<strong>Note:</strong> You can add multiple email addresses seperated by comma, to send email to multiple users and recevie mail to admin.','skyliteforms');?></td>
				</tr>
				<tr>
					<th scope="row"><label for="bs_subject_text">
					<?php _e('Subject Text:','skyliteforms');?>
					</label></th>
					<td><input type="text" name="bs_subject_text" class="regular-text" value="<?php echo esc_attr(get_option('bs_subject_text'));?>"></td>
					<td><?php _e('<strong>Note:</strong> Default subject text " Skylite DC " will be used.','skyliteforms');?></td>
				</tr>
				<tr>
					<th scope="row"><label for="bs_reply_user_message">
					<?php _e('Reply Message for User:','skyliteforms');?>
					</label></th>
					<td>
					<textarea name="bs_reply_user_message" rows="5" cols="49" class="regular-text"><?php echo esc_attr(get_option('bs_reply_user_message'));?></textarea></td>
					<td><?php _e('<strong>Note:</strong> Default Reply Message " Thank you for contacting us...We will get back to you soon... " will be used.','skyliteforms');?></td>
				</tr>
				<tr>
					<th scope="row"><label for="bs_custom_css">
					<?php _e('Custom Css:','skyliteforms');?>
					</label></th>
					<td><textarea name="bs_custom_css" rows="5" cols="49" class="regular-text"><?php echo esc_attr(get_option('bs_custom_css'));?></textarea></td>
					<td><?php _e('<strong>Note:</strong> this CSS overrite to our plugin CSS And Also please use <strong>!important</strong> with your CSS property.','skyliteforms');?></td>
				</tr>
				<tr>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="3"><input class="button-primary" type="submit" value="<?php _e('Save All Changes','skyliteforms');?>"></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><p><?php _e('<strong>Note:</strong> You can add <strong> [sf_bottle_service] </strong> shortcode where you want to display form in pages.','skyliteforms');?>
					<?php  _e(' <br/> OR  You can add <strong> &lt;&#63;php do_shortcode("[sf_bottle_service]"); &#63;&gt;</strong> shortcode in any template.','skyliteforms');?>
					<?php  _e(' <br/> OR  You can add <strong> &lt;&#63;php echo do_shortcode("[sf_bottle_service]"); &#63;&gt;</strong> shortcode in any template.','skyliteforms');?></p></td>
				</tr>
				<tr>
					<td colspan="3"></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
