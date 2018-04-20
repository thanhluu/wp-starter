<?php
function wp_starter_customize_register( $wp_customize ) {
}
add_action( 'customize_register', 'wp_starter_customize_register' );

function wp_starter_get_theme_option( $option_name, $default = '' ) {
  $options = get_option( 'wp_starter_theme_options' );
  if( isset($options[$option_name]) ) {
    return $options[$option_name];
  }
  return $default;
}
