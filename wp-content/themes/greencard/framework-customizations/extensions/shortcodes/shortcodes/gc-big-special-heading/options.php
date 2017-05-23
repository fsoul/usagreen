<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'    => array(
		'type'  => 'text',
		'label' => __( 'Heading Title', 'fw' ),
		'desc'  => __( 'Write the heading title content', 'fw' ),
	),

	'heading' => array(
		'type'    => 'select',
		'label'   => __('Heading Size', 'fw'),
		'choices' => array(
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'h5' => 'H5',
			'h6' => 'H6',
		)
	),

  'position_til' => array(
      'label'   => __('Title position', 'fw'),
      'type'    => 'select',
      'choices' => array(
          'title-pos-left'  => __('Left', 'fw'),
          'title-pos-center'  => __('Center', 'fw'),
          'title-pos-right'  => __('Right', 'fw'),
      ),
      'value'   => 'title-pos-right'
  ),

	'title_uppercase' => array(
		'type'    => 'switch',
		'label'   => __('Title uppercase', 'fw'),
	),

	'subtitle' => array(
		'type'  => 'text',
		'label' => __( 'Heading Subtitle', 'fw' ),
		'desc'  => __( 'Write the heading subtitle content', 'fw' ),
	),	

	'heading_stil' => array(
		'type'    => 'select',
		'label'   => __('Heading Subtitle Size', 'fw'),
		'choices' => array(
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'h5' => 'H5',
			'h6' => 'H6',
		),
		'value'   => 'h3'
	),

  'position_stil' => array(
    'label'   => __('Title subtitle', 'fw'),
    'type'    => 'select',
    'choices' => array(
        'title-pos-left'  => __('Left', 'fw'),
        'title-pos-center'  => __('Center', 'fw'),
        'title-pos-right'  => __('Right', 'fw'),
    ),
    'value'   => 'title-pos-right'
  ),

  'subtitle_uppercase' => array(
		'type'    => 'switch',
		'label'   => __('Subtitle uppercase', 'fw'),
	),

  'title_separator' => array(
		'type'    => 'switch',
		'label'   => __('Separator', 'fw'),
	)

);
