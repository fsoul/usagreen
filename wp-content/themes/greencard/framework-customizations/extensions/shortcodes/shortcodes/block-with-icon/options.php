<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

  'block_type_select' => array(
      'label'   => __('Block type select', '{domain}'),
      'desc'    => __('Select Block type', '{domain}'),
      'type'    => 'select',
      'choices' => array(
      		'block-style-0'  => __('Without icon', '{domain}'),
          'block-style-1'  => __('Icon inline of the title', '{domain}'),
          'block-style-2'  => __('Icon top of the title', '{domain}'),
          'block-style-3'  => __('Icon inline of the red title', '{domain}'),
          'block-style-4'  => __('Big Icon guarantee', '{domain}'),
      ),
      'value'   => 'block-style-2'
  ),

	'image' => array(
		'label' => __( 'Icon Image', 'fw' ),
		'desc'  => __( 'Upload icon', 'fw' ),
		'type'  => 'upload'
	),

	'title'  => array(
		'label' => __( 'Title', 'fw' ),
		'desc'  => __( 'Title of the block', 'fw' ),
		'type'  => 'text',
		'value' => ''
	),

	'desc'  => array(
		'label' => __( 'Description', 'fw' ),
		'desc'  => __( 'Block description', 'fw' ),
		'type'  => 'textarea',
		'value' => ''
	)
);