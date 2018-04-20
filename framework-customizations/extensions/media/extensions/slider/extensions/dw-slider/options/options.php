<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'group_switch' => array(
		'type' => 'group',
		'options' => array(
			'sw_indicators'=>array(
				'type'  => 'switch',
				'label' => __('Indicators', 'wp-starter'),
				'value' => 'show',
				'left-choice' => array(
					'value' => 'hide',
					'label' => __('Hide', 'wp-starter'),
				),
				'right-choice' => array(
					'value' => 'show',
					'label' => __('Show', 'wp-starter'),
				),
			),
			'sw_control'=>array(
				'type'  => 'switch',
				'label' => __('Carousel Control', 'wp-starter'),
				'value' => 'show',
				'left-choice' => array(
					'value' => 'hide',
					'label' => __('Hide', 'wp-starter'),
				),
				'right-choice' => array(
					'value' => 'show',
					'label' => __('Show', 'wp-starter'),
				),
			),
		),
	),
);
