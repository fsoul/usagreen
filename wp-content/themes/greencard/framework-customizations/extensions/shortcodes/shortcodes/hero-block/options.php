<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'title'  => array(
		'label' => __( 'Title', 'fw' ),
		'desc'  => __( 'Title of the hero block', 'fw' ),
		'type'  => 'text',
		'value' => ''
	),

	'desc'  => array(
		'label' => __( 'Description', 'fw' ),
		'desc'  => __( 'Block description', 'fw' ),
		'type'  => 'textarea',
		'value' => ''
	),

	'btntext'  => array(
		'label' => __( 'Button text', 'fw' ),
		'desc'  => __( 'put text', 'fw' ),
		'type'  => 'text',
		'value' => ''
	),

	'btn'  => array(
		'label' => __( 'link', 'fw' ),
		'desc'  => __( 'put url', 'fw' ),
		'type'  => 'text',
		'value' => ''
	),

);