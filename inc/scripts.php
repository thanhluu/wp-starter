<?php
function wp_starter_scripts() {
	global $wp_version;
	$version = wp_get_theme( wp_get_theme()->template )->get( 'Version' );

	if ( defined( 'WP_ENV' ) && 'development' === WP_ENV ) {
		$assets = array(
			'css' => '/assets/css/theme.css',
			'js'  => '/assets/js/theme.js',
		);
	} else {
		$assets = array(
			'css' => '/assets/css/theme.min.css',
			'js'  => '/assets/js/theme.min.js',
		);
	}
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '5.11.2' );
	wp_enqueue_style( 'wp-starter-main', get_template_directory_uri() . $assets['css'], array(), $version );
	wp_enqueue_style( 'wp-starter-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array( 'jquery' ), '1.4.7', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
	wp_enqueue_script( 'wp-starter-script', get_template_directory_uri() . $assets['js'], array( 'jquery' ), $version, true );
}
add_action( 'wp_enqueue_scripts', 'wp_starter_scripts' );
