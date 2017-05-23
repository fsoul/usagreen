<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php 
	$t = $atts['style']['ruler_type'];
	if ( $t === 'space' ) { ?>
	<div class="fw-divider-space" style="padding-top: <?php echo (int) $atts['style']['space']['height']; ?>px;"></div>
<?php } else { ?>
   <div class="fw-divider-line"><hr/></div>
<?php } ?>