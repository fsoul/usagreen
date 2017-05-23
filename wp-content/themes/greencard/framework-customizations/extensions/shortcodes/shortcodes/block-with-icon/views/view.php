<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['image'] ) ) {
	$image = fw_get_framework_directory_uri('/static/img/no-image.png');
} else {
	$image = $atts['image']['url'];
}
?>
<div class="fw-gc-icon-block <?php echo $atts['block_type_select']; ?>">

	<div class="fw-gc-icon-block-inner">
		<div class="fw-gc-icon-block-title">
		<?php if ( !empty( $atts['image'] ) ) { ?> 
			<div class="icon-wrap">
				<img src="<?php echo esc_attr($image); ?>" alt="<?php echo esc_attr($atts['name']); ?>"/>
			</div>
		<?php } ?>
			<h3><?php echo $atts['title']; ?></h3>
		</div>
		<div class="fw-gc-icon-block-text">
			<p><?php echo $atts['desc']; ?></p>
		</div>
	</div>

</div>