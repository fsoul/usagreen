<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php 
	$til_up = ( isset( $atts['title_uppercase'] ) && $atts['title_uppercase'] ) ? 'title-uppercase' : '';
	$stil_up = ( isset( $atts['subtitle_uppercase'] ) && $atts['subtitle_uppercase'] ) ? 'title-uppercase' : '';

	$heading = "<{$atts['heading']} class='fw-special-title {$atts['position_til']} {$til_up}'>{$atts['title']}</{$atts['heading']}>";
	$subtitle = "<{$atts['heading_stil']} class='fw-special-subtitle {$stil_up}'>{$atts['subtitle']}</{$atts['heading-stil']}>";
?>

<div class="fw-heading fw-heading-<?php echo esc_attr($atts['heading']); ?>">
	<?php if (!empty($atts['title'])): ?>	
		<?php echo $heading; ?>
	<?php endif; ?>
	<?php if (!empty($atts['subtitle'])): ?>	
		<div class="fw-special-subtitle <?php echo $atts['position_stil']; ?>">
			<?php echo $subtitle; ?>
		</div>
	<?php endif; ?>
	<?php echo !empty($atts['title_separator']) ? '<div class="separator"></div>' : ''; ?>
</div>