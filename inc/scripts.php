<?php
function wp_starter_scripts() {
	global $wp_version;
	$version = wp_get_theme( wp_get_theme()->template )->get( 'Version' );

	if ( defined( 'WP_ENV' ) && 'development' === WP_ENV ) {
		$assets = array(
			'css' => '/assets/css/wp-starter.css',
			'js'  => '/assets/js/wp-starter.js',
		);
	} else {
		$assets = array(
			'css' => '/assets/css/wp-starter.min.css',
			'js'  => '/assets/js/wp-starter.min.js',
		);
	}

	wp_enqueue_style( 'wp-starter-main', get_template_directory_uri() . $assets['css'], array(), $version );
	wp_enqueue_style( 'wp-starter-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wp-starter-print', get_template_directory_uri() . '/assets/css/print.css', array(), $version, 'print' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'wp-starter-script', get_template_directory_uri() . $assets['js'], array( 'jquery' ), $version, true );
}
add_action( 'wp_enqueue_scripts', 'wp_starter_scripts' );
