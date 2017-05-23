<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<div class="fw-step-heading">

	<?php if (!empty($atts['step_num'])): ?>
		<div class="step-num-wrap">		
			<h6 class="step_num"><?php echo $atts['step_num']; ?></h6>
		</div>
	<?php endif; ?>

	<?php if (!empty($atts['step_title'])): ?>	
		<h4><?php echo $atts['step_title']; ?></h4>
	<?php endif; ?>
	

</div>