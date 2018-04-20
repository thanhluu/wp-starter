<?php
// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://www.designwall.com',
		'item_name' => 'WP Starter',
		'theme_slug' => 'wp-starter',
		'version' => '1.0.0',
		'author' => 'DesignWall',
		'download_id' => '',
		'renew_url' => ''
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'License Manager', 'wp-starter' ),
		'enter-key' => __( 'Enter your theme license key.', 'wp-starter' ),
		'license-key' => __( 'License Key', 'wp-starter' ),
		'license-action' => __( 'License Action', 'wp-starter' ),
		'deactivate-license' => __( 'Deactivate License', 'wp-starter' ),
		'activate-license' => __( 'Activate License', 'wp-starter' ),
		'license-unknown' => __( 'License status is unknown.', 'wp-starter' ),
		'renew' => __( 'Renew?', 'wp-starter' ),
		'unlimited' => __( 'unlimited', 'wp-starter' ),
		'license-key-is-active' => __( 'License key is active.', 'wp-starter' ),
		'expires%s' => __( 'Expires %s.', 'wp-starter' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'wp-starter' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'wp-starter' ),
		'license-key-expired' => __( 'License key has expired.', 'wp-starter' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'wp-starter' ),
		'wn-license-keys-do-not-match' => __( 'License keys do not match. %3$sCheck your license key here%4$s', 'wp-starter' ),
		'wn-license-is-inactive' => __( 'License is inactive. %3$sCheck your license key here%4$s', 'wp-starter' ),
		'wn-license-key-is-disabled' => __( 'License key is disabled. %3$sCheck your license key here%4$s', 'wp-starter' ),
		'site-is-inactive' => __( 'License is inactive', 'wp-starter' ),
		'wn-site-is-inactive' => __( 'License is inactive. Please %1$sactivate your license%2$s', 'wp-starter' ),
		'license-status-unknown' => __( 'License status is unknown. %3$sCheck your license key here%4$s', 'wp-starter' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'wp-starter' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'wp-starter' ),
	)

);
