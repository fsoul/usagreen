<?php
/*
Template Name: GreenCard Front
*/
get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<div class="fp-intro">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
