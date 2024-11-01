<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
//print_r( $hmtbGeneralSettings );
foreach ( $hmtbGeneralSettings as $option_name => $option_value ) {
    if ( isset( $hmtbGeneralSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
update_option( 'hmtb_display_type', $hmtb_display_type );
update_option( 'hmtb_display_option', $hmtb_display_option );
?>
<form name="hmtb-temp-settings-form" role="form" class="form-horizontal" method="post" action="" id="hmtb-temp-settings-form-id">
	<table class="form-table hmtb-table-content1">
		<tr>
			<th scope="row">
				<label for="hmtb_disable_tinybar"><?php 
_e( 'Disable Bar', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input type="checkbox" name="hmtb_disable_tinybar" id="hmtb_disable_tinybar" <?php 
echo  ( $hmtb_disable_tinybar ? 'checked' : '' ) ;
?>>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Display Position', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input type="radio" name="hmtb_display_option" id="hmtb_display_option_top" value="top" <?php 
echo  ( 'top' === $hmtb_display_option ? 'checked' : '' ) ;
?> >
				<label for="hmtb_display_option_top"><span></span><?php 
_e( 'Top', HMTB_TEXT_DOMAIN );
?></label>
					&nbsp;&nbsp;
				<input type="radio" name="hmtb_display_option" id="hmtb_display_option_bottom" value="bottom" <?php 
echo  ( 'bottom' === $hmtb_display_option ? 'checked' : '' ) ;
?> >
				<label for="hmtb_display_option_bottom"><span></span><?php 
_e( 'Bottom', HMTB_TEXT_DOMAIN );
?></label>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Fixed at Position', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input type="radio" name="hmtb_display_type" id="hmtb_display_type_fixed" value="hmtb-fixed" <?php 
echo  ( 'hmtb-overlap' !== $hmtb_display_type ? 'checked' : '' ) ;
?> >
				<label for="hmtb_display_type_fixed"><span></span><?php 
_e( 'Fixed', HMTB_TEXT_DOMAIN );
?></label>
				&nbsp;&nbsp;
				<input type="radio" name="hmtb_display_type" id="hmtb_display_type_overlap" value="hmtb-overlap" <?php 
echo  ( 'hmtb-overlap' === $hmtb_display_type ? 'checked' : '' ) ;
?> >
				<label for="hmtb_display_type_overlap"><span></span><?php 
_e( 'Overlap', HMTB_TEXT_DOMAIN );
?></label>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="hmtb_scroll_hide"><?php 
_e( 'Hide When Scroll?', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input type="checkbox" name="hmtb_scroll_hide" id="hmtb_scroll_hide" <?php 
echo  ( $hmtb_scroll_hide ? 'checked' : '' ) ;
?> >
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Bar Height', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class="small-text" type="number" min="50" max="150" step="1" name="hmtb_bar_height" value="<?php 
esc_attr_e( $hmtb_bar_height );
?>">&nbsp;px
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Content Width', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input class="small-text" type="number" min="300" max="1500" step="1" name="hmtb_content_width" value="<?php 
esc_attr_e( $hmtb_content_width );
?>">&nbsp;px
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Background Type', HMTB_TEXT_DOMAIN );
?></label>
			</th>
			<td>
				<input type="radio" name="hmtb_bar_bg_type" id="hmtb_bar_bg_type_c" value="c" <?php 
if ( $hmtb_bar_bg_type == "c" ) {
    echo  'checked' ;
}
?>>
				<label for="hmtb_bar_bg_type_c"><span></span><?php 
esc_attr_e( 'Single Color', HMTB_TEXT_DOMAIN );
?></label>
				<?php 
?>
					<span><?php 
echo  '<a href="' . tb_fs()->get_upgrade_url() . '">' . __( 'For image or gradient background upgrade now!', HMTB_TEXT_DOMAIN ) . '</a>' ;
?></span>
					<?php 
?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label><?php 
_e( 'Display Close Icon', HMTB_TEXT_DOMAIN );
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
				<label for="hmtb_hide_on_mobile"><?php 
_e( 'Hide on Mobile', HMTB_TEXT_DOMAIN );
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
				<label for="hmtb_hide_button"><?php 
_e( 'Hide Button', HMTB_TEXT_DOMAIN );
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
				<label for="hmtb_button_width"><?php 
_e( 'Button Width', HMTB_TEXT_DOMAIN );
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
_e( 'Message Alignment', HMTB_TEXT_DOMAIN );
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
				<label for="hmtb_display_countdown_timer"><?php 
_e( 'Display Countdown Timer', HMTB_TEXT_DOMAIN );
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
_e( 'Display on Pages', HMTB_TEXT_DOMAIN );
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
		<button id="updateGeneralSettings" name="updateGeneralSettings" class="button button-primary hmtb-button">
			<i class="fa-solid fa-circle-check"></i>&nbsp;<?php 
_e( 'Save Settings', HMTB_TEXT_DOMAIN );
?>
		</button>
	</p>
</form>