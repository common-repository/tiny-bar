<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
//print_r( $hmtbStylesSettings );
foreach ( $hmtbStylesSettings as $option_name => $option_value ) {
    if ( isset( $hmtbStylesSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="hmtb-temp-settings-form" role="form" class="form-horizontal" method="post" action="" id="hmtb-temp-settings-form-id">
	<table class="hmtb-table-styles">
		<tr><th colspan="4"><hr><?php 
_e( 'Bar Container', HMTB_TEXT_DOMAIN );
?><hr></th></tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Background Color', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class="hmtb-wp-color" type="text" name="hmtb_background_color" id="hmtb_background_color" value="<?php 
esc_attr_e( $hmtb_background_color );
?>" >
				<div id="colorpicker"></div>
			</td>
			<th scope="row">
				<label><?php 
_e( 'Second Color', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class="hmtb-wp-color" type="text" name="hmtb_background_color2" id="hmtb_background_color2" value="<?php 
esc_attr_e( $hmtb_background_color2 );
?>" >
				<div id="colorpicker"></div>
			</td>
		</tr>
		<tr><th colspan="4"><hr><?php 
_e( 'Message', HMTB_TEXT_DOMAIN );
?><hr></th></tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Font Color', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class="hmtb-wp-color" type="text" name="hmtb_message_color" id="hmtb_message_color" value="<?php 
esc_attr_e( $hmtb_message_color );
?>">
				<div id="colorpicker"></div>
			</td>
			<th scope="row">
				<label><?php 
_e( 'Font Size', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class="small-text" type="number" min="10" max="48" step="1" name="hmtb_msg_font_size" value="<?php 
esc_attr_e( $hmtb_msg_font_size );
?>">&nbsp;px
			</td>
		</tr>
		<tr><th colspan="4"><hr><?php 
_e( 'Button', HMTB_TEXT_DOMAIN );
?><hr></th></tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Background Color', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class='hmtb-wp-color' type='text' name='hmtb_button_color' id='hmtb_button_color' value='<?php 
esc_attr_e( $hmtb_button_color );
?>'>
				<div id='colorpicker'></div>
			</td>
			<th scope="row">
				<label><?php 
_e( 'Font Color', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class="hmtb-wp-color" type="text" name="hmtb_button_font_color" id="hmtb_button_font_color" value="<?php 
esc_attr_e( $hmtb_button_font_color );
?>">
				<div id='colorpicker'></div>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Font Size', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class="small-text" type="number" min="10" max="28" step="1" name="hmtb_button_text_size" value="<?php 
esc_attr_e( $hmtb_button_text_size );
?>">&nbsp;px
			</td>
			<th scope="row">
				<label><?php 
_e( 'Font Weight', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<select name="hmtb_button_font_weight" class="hmtb_button_font_weight" id="hmtb_button_font_weight">
					<option value="normal" <?php 
echo  ( 'noraml' == $hmtb_button_font_weight ? 'selected' : '' ) ;
?> ><?php 
_e( 'Normal' );
?></option>
					<option value="bold" <?php 
echo  ( 'bold' === $hmtb_button_font_weight ? 'selected' : '' ) ;
?> ><?php 
_e( 'Bold' );
?></option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Border Radius', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td colspan="3">
			<?php 
?>
					<span><?php 
echo  '<a href="' . tb_fs()->get_upgrade_url() . '">' . __( 'Please Upgrade Now', HMTB_TEXT_DOMAIN ) . '</a>' ;
?></span>
					<?php 
?>
			</td>
		</tr>
		<tr><th colspan="4"><hr><?php 
_e( 'Button Hover', HMTB_TEXT_DOMAIN );
?><hr></th></tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Background Color', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class='hmtb-wp-color' type='text' name='hmtb_button_hvr_color' id='hmtb_button_hvr_color' value='<?php 
esc_attr_e( $hmtb_button_hvr_color );
?>'>
				<div id='colorpicker'></div>
			</td>
			<th scope="row">
				<label><?php 
_e( 'Font Color', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class="hmtb-wp-color" type="text" name="hmtb_button_hvr_font_color" id="hmtb_button_hvr_font_color" value="<?php 
esc_attr_e( $hmtb_button_hvr_font_color );
?>">
				<div id='colorpicker'></div>
			</td>
		</tr>
		<tr><th colspan="4"><hr><?php 
_e( 'Close Icon', HMTB_TEXT_DOMAIN );
?><hr></th></tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Color', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td colspan="3">
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
_e( 'Hover Color', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td colspan="3">
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
		<button id="updateStylesSettings" name="updateStylesSettings" class="button button-primary hmtb-button">
			<i class="fa-solid fa-circle-check"></i>&nbsp;<?php 
_e( 'Save Settings', HMTB_TEXT_DOMAIN );
?>
		</button>
	</p>
</form>