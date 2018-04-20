<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'  => array(
		'label' => __( 'Button Label', 'wp-starter' ),
		'desc'  => __( 'This is the text that appears on your button', 'wp-starter' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'link'   => array(
		'label' => __( 'Button Link', 'wp-starter' ),
		'desc'  => __( 'Where should your button link to', 'wp-starter' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target' => array(
		'type'  => 'switch',
		'label'   => __( 'Open Link in New Window', 'wp-starter' ),
		'desc'    => __( 'Select here if you want to open the linked page in a new window', 'wp-starter' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => __('Yes', 'wp-starter'),
		),
		'left-choice' => array(
			'value' => '_self',
			'label' => __('No', 'wp-starter'),
		),
	),
	'is_fullwidth' => array(
		'type'  => 'switch',
		'label'   => __( 'Full Width', 'wp-starter' )
	),
	'style'  => array(
		'label'   => __( 'Button Style', 'wp-starter' ),
		'desc'    => __( 'Choose a style for your button', 'wp-starter' ),
		'type'    => 'select',
		'choices' => array(
			'btn-default'      => __( 'Default', 'wp-starter'),
			'btn-primary' => __( 'Primary', 'wp-starter' ),
			'btn-success'  => __( 'Success', 'wp-starter' ),
			'btn-info' => __( 'Info', 'wp-starter' ),
			'btn-warning'   => __( 'Warning', 'wp-starter' ),
			'btn-danger'   => __( 'Danger', 'wp-starter' ),
		)
	),
	'size'  => array(
		'label'   => __( 'Button Size', 'wp-starter' ),
		'desc'    => __( 'Choose a size for your button', 'wp-starter' ),
		'type'    => 'select',
		'choices' => array(
			''      => __( 'Medium', 'wp-starter'),
			'btn-lg' => __( 'Large', 'wp-starter' ),
			'btn-sm'  => __( 'Small', 'wp-starter' ),
			'btn-xs' => __( 'Extra Small', 'wp-starter' ),
		)
	),
);
