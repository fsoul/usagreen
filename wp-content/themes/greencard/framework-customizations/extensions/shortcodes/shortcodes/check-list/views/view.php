<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<div class="fw-gc-check-list">
	<ul>
		<?php foreach ($atts['lines'] as $line): ?>	
			<li><?php echo $line['line_text']; ?></li>
		<?php endforeach; ?>
	</ul>
</div>