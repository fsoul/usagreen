<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
                <script>                    
                    var homeurl = "<?php echo site_url(); ?>";
                </script>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>


	<div class="top-line">
		<div class="row">

			<div class="fw-col-lg-3 fw-col-md-5 fw-col-sm-6 fw-col-xs-12">
				<?php show_easylogo(); ?>
			</div>

			<div class="fw-col-lg-9 fw-col-md-7 fw-col-sm-6 fw-col-xs-12">
					<div class="social_block">
<a href="#" class="skype"><img src="/wp-content/themes/greencard/assets/images/skype_circle_color-67.png"></a>
<a href="#" class="phone"><img src="/wp-content/themes/greencard/assets/images/phone.png"></a>
					</div>
				<div class="top-right-wraper">
					<?php do_action( 'foundationpress_before_top-right' ); ?>

						<?php if (get_current_user_id()) :
							dynamic_sidebar( 'top_reg_sideb' );
						else :
                            dynamic_sidebar( 'top-right-widgets' );
                            dynamic_sidebar( 'top_notreg_sideb' );
						endif;
						?>
						
					<?php do_action( 'foundationpress_after_top-right' ); ?>

					<?php /* language btn */ ?>
					<div class="button polylang-dropdown" type="button" data-toggle="lang-dropdown">
						<ul class="flags">
							<?php pll_the_languages(array('show_flags'=>1,'show_names'=>0, 'current_lang' => true, 'no_translation' => true, 'url' => '')); ?>
						</ul>
						<i class="fa fa-caret-down" aria-hidden="true"></i>
					</div>
					<div class="dropdown-pane polylang-pane" id="lang-dropdown" data-dropdown data-hover-pane="true">
						<ul>
							<?php pll_the_languages(array('show_flags'=>1,'show_names'=>0)); ?>
						</ul>
					</div>

				</div>
			
			</div>	

		</div>
	</div>

	<header id="masthead" class="site-header" role="banner">

		<div class="title-bar" data-responsive-toggle="site-navigation">
			<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation top-bar fw-container" role="navigation">
	
			<div class="top-bar-left">
				<ul class="menu">
					<li class="home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></li>
				</ul>
			</div>
		
			<div class="top-bar-center">
				<?php foundationpress_top_bar_r(); ?>
				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>
		
	</header>

	<section class="page-container">
		<?php do_action( 'foundationpress_after_header' );
