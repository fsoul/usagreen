<?php
/*
Template Name: GreenCard Page
*/
get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<div class="fp-intro">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content">
				<div class="row row-breadcrumbs">
					<?php if( function_exists('fw_ext_breadcrumbs') ) { fw_ext_breadcrumbs(); } ?>
				</div>
				<?php the_content(); ?>
			</div>
		</div>
	</div>

<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
