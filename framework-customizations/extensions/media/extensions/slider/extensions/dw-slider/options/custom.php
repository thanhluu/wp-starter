<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'align' => array(
		'type' => 'group',
		'options' => array(
			'img-align' =>array(
				'type'  => 'short-select',
				'label' => __('Image Alignment', 'wp-starter'),
				'choices' => array(
					'left' => __('Left', 'wp-starter'),
					'right' => __('Right', 'wp-starter'),
				),
				'no-validate' => false,
			),
			'text-align'=>array(
				'type'  => 'short-select',
				'label' => __('Text Alignment', 'wp-starter'),
				'choices' => array(
					'left' => __('Left', 'wp-starter'),
					'center' => __('Center', 'wp-starter'),
					'right' => __('Right', 'wp-starter'),
				),

				'no-validate' => false,
			),
		),

	),

	'header_button_1'=>array(
		'type'  => 'html',
		'label' => __(' ', 'wp-starter'),
		'html'  => '<hr>',
	),
	'group_button_1' => array(
		'type' => 'group',
		'options' => array(
			'button_1' =>array(
				'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'value' => 'hide',
				'picker' => array(
					'status' => array(
						'label' => __('Button 1', 'wp-starter'),
						'type'  => 'switch',
						'left-choice' => array(
							'value' => 'hide',
							'label' => __('Hide', 'wp-starter')
						),
						'right-choice' => array(
							'value' => 'show',
							'label' => __('Show', 'wp-starter')
						),
					)
				),
				'choices' => array(
					'show' => array(
						'text_button' => array(
							'type' => 'text',
							'label' => __('Button Text', 'wp-starter'),
							'value' => ''
						),
						'url_button' => array(
							'type' => 'text',
							'label' => __('Button URL', 'wp-starter'),
							'value' => ''
						),
						'button_style'=>array(
							'type'  => 'short-select',
							'value' => 'default',
							'label' => __('Button Style', 'wp-starter'),
							'choices' => array(
								'default' => __('Default', 'wp-starter'),
								'primary' => __('Primary', 'wp-starter'),
								'success' => __('Success', 'wp-starter'),
								'info' => __('Info', 'wp-starter'),
								'warning' => __('Warning', 'wp-starter'),
								'danger' => __('Danger', 'wp-starter'),
							),
							'no-validate' => false,
						),
						'button_size'=>array(
							'type'  => 'short-select',
							'value' => 'Default',
							'label' => __('Button Size', 'wp-starter'),
							'choices' => array(
								'btn-lg' => __('Large', 'wp-starter'),
								'btn-md' => __('Medium', 'wp-starter'),
								'btn-sm' => __('Small', 'wp-starter'),
								'btn-xs' => __('Extra Small', 'wp-starter'),
							),
							'no-validate' => false,
						)
					)
				),
				'show_borders' => true,
			),
		),
	),

	'header_button_2'=>array(
		'type'  => 'html',
		'label' => __(' ', 'wp-starter'),
		'html'  => '<hr>',
	),
	'group_button_2' => array(
		'type' => 'group',
		'options' => array(
			'button_2' =>array(
				'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'value' => 'hide',
				'picker' => array(
					'status' => array(
						'label' => __('Button 2', 'wp-starter'),
						'type'  => 'switch',
						'left-choice' => array(
							'value' => 'hide',
							'label' => __('Hide', 'wp-starter')
						),
						'right-choice' => array(
							'value' => 'show',
							'label' => __('Show', 'wp-starter')
						),
					)
				),
				'choices' => array(
					'show' => array(
						'text_button' => array(
							'type' => 'text',
							'label' => __('Button Text', 'wp-starter'),
							'value' => ''
						),
						'url_button' => array(
							'type' => 'text',
							'label' => __('Button URL', 'wp-starter'),
							'value' => ''
						),
						'button_style'=>array(
							'type'  => 'short-select',
							'value' => 'default',
							'label' => __('Button Style', 'wp-starter'),
							'choices' => array(
								'default' => __('Default', 'wp-starter'),
								'primary' => __('Primary', 'wp-starter'),
								'success' => __('Success', 'wp-starter'),
								'info' => __('Info', 'wp-starter'),
								'warning' => __('Warning', 'wp-starter'),
								'danger' => __('Danger', 'wp-starter'),
							),
							'no-validate' => false,
						),
						'button_size'=>array(
							'type'  => 'short-select',
							'value' => 'Default',
							'label' => __('Button Style', 'wp-starter'),
							'choices' => array(
								'btn-lg' => __('Large', 'wp-starter'),
								'btn-md' => __('Medium', 'wp-starter'),
								'btn-sm' => __('Small', 'wp-starter'),
								'btn-xs' => __('Extra Small', 'wp-starter'),
							),
							'no-validate' => false,
						)
					)
				),
				'show_borders' => true,
			),
		),
	),

	'header_background'=>array(
		'type'  => 'html',
		'label' => __(' ', 'wp-starter'),
		'html'  => '<hr>',
	),
	'group_background' => array(
		'type' => 'group',
		'options' => array(
			'bg_color' => array(
				'type'  => 'rgba-color-picker',
				'value' => '#fff',
				'label' => __('Background Color', 'wp-starter'),
			),
			'bg_image'=>array(
				'type'  => 'upload',
				'value' => false,
				'label' => __('Background Image', 'wp-starter'),
				'images_only' => true,
			),
			'bg_repeat'=>array(
				'type'  => 'short-select',
				'label' => __('Background Repeat', 'wp-starter'),
				'choices' => array(
					'repeat' => __('repeat', 'wp-starter'),
					'repeat-x' => __('repeat-x', 'wp-starter'),
					'repeat-y' => __('repeat-y', 'wp-starter'),
					'no-repeat' => __('no-repeat', 'wp-starter'),
					'initial' => __('initial', 'wp-starter'),
					'inherit' => __('inherit', 'wp-starter'),
				),

				'no-validate' => false,
			),
			'bg_position'=>array(
				'type'  => 'short-select',
				'label' => __('Background Position', 'wp-starter'),
				'choices' => array(
					'left top' => __('left top', 'wp-starter'),
					'left bottom' => __('left bottom', 'wp-starter'),
					'left center' => __('left center', 'wp-starter'),
					'right top' => __('right top', 'wp-starter'),
					'right bottom' => __('right bottom', 'wp-starter'),
					'right center' => __('right center', 'wp-starter'),
					'center top' => __('center top', 'wp-starter'),
					'center bottom' => __('center bottom', 'wp-starter'),
					'center center' => __('center center', 'wp-starter'),

				),
				'no-validate' => false,
			),
			'bg_size'=>array(
				'type'  => 'short-text',
				'label' => __('Background Size', 'wp-starter'),
			)
		),
	),

	'group_css' => array(
		'type' => 'group',
		'options' => array(
			'custom_css'=>array(
				'type'  => 'textarea',
				'label' => __('Custom CSS', 'wp-starter'),
			)
		),
	),

	'group_overlay' => array(
		'type' => 'group',
		'options' => array(
			'overlay' =>array(
				'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'value' => 'off',
				'picker' => array(
					'status' => array(
						'label' => __('Overlay', 'wp-starter'),
						'type'  => 'switch',
						'left-choice' => array(
							'value' => 'off',
							'label' => __('Off', 'wp-starter')
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => __('On', 'wp-starter')
						),
					)
				),
				'choices' => array(
					'on' => array(
						'overlay_color' => array(
							'type'  => 'rgba-color-picker',
							'value' => '#000',
							'label' => __('Overlay Color', 'wp-starter'),
						),
						'overlay_opacity'=>array(
							'type'  => 'slider',
							'value' => 0,
							'properties' => array(

								'min' => 0,
								'max' => 1,
								'step' => 0.1,

							),
							'label' => __('Overlay Opacity', 'wp-starter'),
						)
					)
				),
				'show_borders' => true,
			),
		),
	),


);

