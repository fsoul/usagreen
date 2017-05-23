<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<div class="fw-gc-faq">


	<?php foreach ($atts['questions'] as $question): ?>	
	
		<div class="faq-question-wrap">
			<div class="faq-question">
				<h4><?php echo $question['question_text']; ?></h4>
			</div>
		</div>

		<div class="faq-answer">
			<?php echo $question['answer_text']; ?>
		</div>

	<?php endforeach; ?>
		
</div>