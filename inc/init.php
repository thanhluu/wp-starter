<?php
if ( ! isset( $content_width ) ) {
	$content_width = 750;
}

if ( ! function_exists( 'wp_starter_setup' ) ) :
function wp_starter_setup() {
	load_theme_textdomain( 'wp-starter', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wp-starter' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

}
endif;
add_action( 'after_setup_theme', 'wp_starter_setup' );

function wp_starter_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wp-starter' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s my-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title h6">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wp_starter_widgets_init' );

function wp_starter_search_form_modify( $html ) {
	$html = str_replace( '<label', '<label class="sr-only"', $html );
	$html = str_replace( '</label>', '', $html );
	$html = str_replace( '</span>', '</span></label>', $html );
	$html = str_replace( 'screen-reader-text', 'sr-only', $html );
	$html = str_replace( 'search-field', 'form-control', $html );
	$html = str_replace( 'search-submit', 'sr-only', $html );
	return $html;
}
add_filter( 'get_search_form', 'wp_starter_search_form_modify' );
