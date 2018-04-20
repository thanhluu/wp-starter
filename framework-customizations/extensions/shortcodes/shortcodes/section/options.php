<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => __('Full Width', 'wp-starter'),
		'type'         => 'switch',
	),
	'remove_columns_gutter' => array(
		'label'        => __('Remove Columns Gutter', 'wp-starter'),
		'desc'         => __('Remove space between columns?', 'wp-starter'),
		'type'         => 'switch'
	),
	'background_color' => array(
		'label' => __('Background Color', 'wp-starter'),
		'desc'  => __('Please select the background color', 'wp-starter'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'wp-starter'),
		'desc'    => __('Please select the background image', 'wp-starter'),
		'type'    => 'background-image',
		'choices' => array(
		)
	),
	'background_position' => array(
		'label'        => __('Background Position', 'wp-starter'),
		'type'         => 'select',
		'choices' => array(
			'top left' => 'top left',
			'top right' => 'top right',
			'top center' => 'top center',
			'center' => 'center',
			'bottom left' => 'bottom left',
			'bottom right' => 'bottom right',
			'bottom center' => 'bottom center',
		)
	),
	'background_size' => array(
		'label'        => __('Background Size', 'wp-starter'),
		'type'         => 'select',
		'choices' => array(
			'auto' => 'auto',
			'cover' => 'cover',
			'contain' => 'contain',
		)
	),
	'video' => array(
		'label' => __('Background Video', 'wp-starter'),
		'desc'  => __('Insert Video URL to embed this video', 'wp-starter'),
		'type'  => 'text',
	),
	'margin' => array(
		'label'        => __('Margin', 'wp-starter'),
		'type'         => 'text'
	),
	'padding' => array(
		'label'        => __('Padding', 'wp-starter'),
		'type'         => 'text'
	),
	'class' => array(
		'label'        => __('Custom Class', 'wp-starter'),
		'type'         => 'text'
	),
);
