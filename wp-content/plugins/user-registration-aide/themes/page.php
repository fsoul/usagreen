<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$confirmed = ( boolean ) false; 
get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		

		<?php
		
		$id = get_the_ID();
		$post = get_post( $id, OBJECT );
        $post_name = $post->post_name;

		$args = array(
			'post_type'=> 'page',
		);
		query_posts( $args );
		// Start the loop.
		if( $confirmed == false ){
			while ( have_posts() ) {
				the_post();

				// Include the page content template.
				
				$utc = new URA_TEMPLATE_CONTROLLER();
				$templates = $utc->template_array();
				//wp_die( print_r( $templates ) );
				// selects out template if it exists
				if( array_key_exists( $post_name, $templates ) ){
					if( $confirmed == false ){
						ura_get_template_part( $post_name, $post_name );
					}
					$confirmed = true;
					//break;
				}else{
					get_template_part( 'content', 'page' );
					//break;
				}

			// End the loop.
		
			}
		}
		?>

		</div><!-- .site-main -->
		<?php get_sidebar( 'content-bottom' ); ?>
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
