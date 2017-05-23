<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'questions' => array(
		'label'         => __( 'Questions', 'fw' ),
		'popup-title'   => __( 'Add/Edit question', 'fw' ),
		'desc'          => __( 'Here you can add, remove and edit your question.', 'fw' ),
		'type'          => 'addable-popup',
		'template'      => '{{=question_text}}',
		'popup-options' => array(

			'question_text'   => array(
				'label' => __( 'Question', 'fw' ),
				'desc'  => __( 'Enter Question', 'fw' ),
				'type'  => 'text'
			),

			'answer_text'   => array(
				'label' => __( 'Answer', 'fw' ),
				'desc'  => __( 'Enter Answer', 'fw' ),
				'type'  => 'textarea'
			),

		)
	)
);