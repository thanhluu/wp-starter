<?php
if ( ! defined( 'FW' ) ) :
	function _filter_fw_framework_plugin_directory_uri() {
		return get_template_directory_uri() . '/framework';
	}
	add_filter( 'fw_framework_directory_uri', '_filter_fw_framework_plugin_directory_uri' );
	require get_template_directory() . '/framework/bootstrap.php';
endif;
require get_template_directory() . '/inc/installer/theme-installer.php';
require get_template_directory() . '/inc/init.php';
require get_template_directory() . '/inc/scripts.php';
require get_template_directory() . '/inc/nav.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
