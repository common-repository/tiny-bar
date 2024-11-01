<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hmtbTabCls = '';
$hmtbPage = 'General';
$hmtbFaIcon = 'cogs';
if ( $tab === 'content' ) {
    $hmtbPage = 'Content';
    $hmtbFaIcon = 'pencil';
}
if ( $tab === 'styles' ) {
    $hmtbPage = 'Styles';
    $hmtbFaIcon = 'paint-brush';
}
?>
<div id="wph-wrap-all" class="wrap hmtb-settings-page">

    <div class="settings-banner">
        <h2><i class="fa fa-<?php esc_attr_e( $hmtbFaIcon ); ?>" aria-hidden="true"></i>&nbsp;<?php echo esc_html($hmtbPage) . '&nbsp;' . __('Settings', HMTB_TEXT_DOMAIN); ?></h2>
    </div>

    <?php 
    if ( $hmtbNotiMessage ) { 
        $this->hmtb_display_notification('success', 'Your information updated successfully.'); 
    } 
    ?>

    <div class="hmtb-wrap">

        <nav class="nav-tab-wrapper">
            <a href="?page=hmtb-settings" class="nav-tab hmtb-tab <?php if ( $tab == '' ) { ?>hmtb-tab-active<?php } ?>">
                <i class="fa fa-cogs" aria-hidden="true">&nbsp;</i><?php _e('General', HMTB_TEXT_DOMAIN); ?>
            </a>
            <a href="?page=hmtb-settings&tab=content" class="nav-tab hmtb-tab <?php if ( $tab === 'content' ) { ?>hmtb-tab-active<?php } ?>">
                <i class="fa fa-pencil" aria-hidden="true">&nbsp;</i><?php _e('Content', HMTB_TEXT_DOMAIN); ?>
            </a>
            <a href="?page=hmtb-settings&tab=styles" class="nav-tab hmtb-tab <?php if ( $tab === 'styles' ) { ?>hmtb-tab-active<?php } ?>">
                <i class="fa fa-paint-brush" aria-hidden="true"></i>&nbsp;<?php _e('Styles', HMTB_TEXT_DOMAIN); ?>
            </a>
        </nav>

        <div class="hmtb_personal_wrap hmtb_personal_help" style="width: 75%; float: left;">
            
            <div class="tab-content">
                <?php 
                switch ( $tab ) {
                    case 'content':
                        include_once HMTB_PATH . 'admin/view/partial/content.php';
                        break;

                    case 'styles':
                        include_once HMTB_PATH . 'admin/view/partial/styles.php';
                        break;

                    default:
                        include_once HMTB_PATH . 'admin/view/partial/general.php';
                        break;
                } 
                ?>
            </div>
        </div>

        <?php $this->load_admin_sidebar(); ?>

    </div>

</div>