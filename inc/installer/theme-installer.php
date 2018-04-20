<?php
function wp_starter_admin_menu( $data ) {
	if ( defined( 'WP_ENV' ) && 'development' === WP_ENV ) {
		$content_callback = $data['content_callback'];
	} else {
		$content_callback = 'wp_starter_intro';
	}
	add_menu_page(
		__( 'WP Starter', 'wp-starter' ),
		__( 'WP Starter', 'wp-starter' ),
		'manage_options',
		$data['slug'],
		$content_callback,
		get_template_directory_uri() . '/assets/img/dw-favicon.png',
		'59.5'
	);
}
add_action( 'fw_backend_add_custom_extensions_menu', 'wp_starter_admin_menu' );

function wp_starter_admin_menu_style() {
	echo '<style type="text/css">#adminmenu .toplevel_page_fw-extensions .wp-menu-image img{padding-top:7px} .toplevel_page_fw-extensions > .wp-menu-image:before{display:none}</style>';
}
add_action( 'admin_head', 'wp_starter_admin_menu_style' );

function wp_starter_intro() {
	$current_theme = wp_get_theme(); ?>
	<div class="wrap about-wrap">
		<h1><?php printf( __( 'Welcome to %1s %2s', 'wp-starter' ), $current_theme->get( 'Name' ), $current_theme->get( 'Version' ) ); ?></h1>
		<p class="about-text"><?php _e( 'Thank you for purchasing our WordPress theme. If you have any question about this theme, please submit to our <a href="https://www.designwall.com/question/">Q&A section</a>.', 'wp-starter' ); ?></p>
		<h2 class="nav-tab-wrapper" id="dw-tabs"><a class="nav-tab nav-tab-active" href="#top#getting-started" id="getting-started-tab"><?php _e( 'Getting Started', 'wp-starter' ); ?></a></h2>
		<div id="getting-started" class="active">
			<p class="about-description"><?php printf( __( 'Use the tips below to get started using %s. You will be up and running in no time!', 'wp-starter' ), $current_theme->get( 'Name' ) ); ?></p>
			<br>
			<h2><?php _e( '1. Install Required & Recommended Plugins', 'wp-starter' ); ?></h2>
			<p><?php _e( 'In order to bring more features to the theme, we provide a list of recommended plugins. This makes the theme look and work better. All the plugins are tested to be fully compatible with the theme.', 'wp-starter' ); ?></p>
			<p><a href="admin.php?page=wp-starter-install-plugins" target="_blank" class="button button-primary"><?php _e( 'Click here to install plugins &rarr;', 'wp-starter' ); ?></a></p>
			<br>
			<h2><?php _e( '2. Install Demo Content', 'wp-starter' ); ?></h2>
			<p><?php _e( 'Installing demo content makes your site look exactly like our demo site. It deletes the content you are currently having on your website. However, we have created a backup of your current content in (<a href="tools.php?page=fw-backups">Tools > Backup</a>). You can restore the backup here at any time.', 'wp-starter' ); ?></p>
			<p><a href="admin.php?page=fw-backups-demo-content" target="_blank" class="button button-primary"><?php _e( 'Click here to install demo content &rarr;', 'wp-starter' ); ?></a></p>
			<br>
			<h2><?php _e( '3. Input Your Theme License', 'wp-starter' ); ?></h2>
			<p><?php _e( 'The theme license key is just aimed at making the update easier with the one-click-update feature. Once you enter the theme license key, your website is constantly updating the patch without logging in to DesignWall website. If you haven’t had the theme license yet, <a href="https://www.designwall.com/my-account/" target="_blank">click here</a>.', 'wp-starter' ); ?></p>
			<p><a href="admin.php?page=wp-starter-license" target="_blank" class="button button-primary"><?php _e( 'Click here to input your license &rarr;', 'wp-starter' ); ?></a></p>
		</div>
		<div
	</div>
	<?php
}
