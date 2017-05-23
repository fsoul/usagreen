<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['image'] ) ) {
	$image = fw_get_framework_directory_uri('/static/img/no-image.png');
} else {
	$image = $atts['image']['url'];
}
?>

<header id="front-hero" role="banner">

	<div class="front-hero-header">
		<h1><?php echo $atts['title']; ?></h1>
	</div>

	<div class="row">

		<div class="large-5 columns"></div>

		<div class="large-7 columns">
			<h4 class="subheader">
				<?php echo $atts['desc']; ?>
			</h4>
			<div class="btn-container">
				<a role="button" class="click-here-for-register" href="<?php echo $atts['btn']; ?>"><?php echo $atts['btntext']; ?></a>
			</div>
		</div>

	</div>

</header>