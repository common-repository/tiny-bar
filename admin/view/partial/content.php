<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
//print_r( $hmtbContentSettings );
foreach ( $hmtbContentSettings as $option_name => $option_value ) {
    if ( isset( $hmtbContentSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
if ( null != get_option( 'hmtb_message_content' ) ) {
    $hmtb_message_content = get_option( 'hmtb_message_content' );
}
if ( null != get_option( 'hmtb_button_text' ) ) {
    $hmtb_button_text = get_option( 'hmtb_button_text' );
}
?>
<form name="hmtb-temp-settings-form" role="form" class="form-horizontal" method="post" action="" id="hmtb-temp-settings-form-id">
	<table class="hmtb-table-content">
		<tr>
			<th scope="row">
				<label for="hmtb_hide_on_mobile"><?php 
_e( 'Background Image', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<?php 
?>
					<span><?php 
echo  '<a href="' . tb_fs()->get_upgrade_url() . '">' . __( 'Please Upgrade Now', HMTB_TEXT_DOMAIN ) . '</a>' ;
?></span>
					<?php 
?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Message / Content', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<div style="width:700px;">
					<?php 
wp_editor( wp_kses_post( $hmtb_message_content ), 'hmtb_message_content', array(
    'media_buttons' => true,
    'textarea_rows' => '10',
) );
?>
				</div>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Button Text', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input type="text" name="hmtb_button_text" class="hmtb_button_text" id="hmtb_button_text" value="<?php 
esc_attr_e( $hmtb_button_text );
?>">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Button URL', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input type="text" name="hmtb_uri" id="hmtb_uri" class="regular-text code" value="<?php 
esc_attr_e( $hmtb_uri );
?>">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="hmtb_url_is_external"><?php 
_e( 'Button URL New Tab?', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input type="checkbox" name="hmtb_url_is_external" id="hmtb_url_is_external" <?php 
echo  ( $hmtb_url_is_external ? 'checked' : '' ) ;
?>>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="hmtb_url_nofollow"><?php 
_e( 'Button URL Nofollow?', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input type="checkbox" name="hmtb_url_nofollow" id="hmtb_url_nofollow" <?php 
echo  ( $hmtb_url_nofollow ? 'checked' : '' ) ;
?>>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Countdown Time', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<?php 
?>
					<span><?php 
echo  '<a href="' . tb_fs()->get_upgrade_url() . '">' . __( 'Please Upgrade Now', HMTB_TEXT_DOMAIN ) . '</a>' ;
?></span>
					<?php 
?>
			</td>
		</tr>
	</table>
	<p class="submit">
		<button id="updateContentSettings" name="updateContentSettings" class="button button-primary hmtb-button">
			<i class="fa-solid fa-circle-check"></i>&nbsp;<?php 
_e( 'Save Settings', HMTB_TEXT_DOMAIN );
?>
		</button>
	</p>
</form>