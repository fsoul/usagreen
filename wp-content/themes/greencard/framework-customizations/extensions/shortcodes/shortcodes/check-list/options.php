<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'lines' => array(
		'label'         => __( 'Lines', 'fw' ),
		'popup-title'   => __( 'Add/Edit text', 'fw' ),
		'desc'          => __( 'Here you can add, remove and edit your text.', 'fw' ),
		'type'          => 'addable-popup',
		'template'      => '{{=line_text}}',
		'popup-options' => array(

			'line_text'   => array(
				'label' => __( 'Line text', 'fw' ),
				'desc'  => __( 'Enter text', 'fw' ),
				'type'  => 'text'
			),

		)
	)
);