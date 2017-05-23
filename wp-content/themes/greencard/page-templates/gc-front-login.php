<?php
/*
Template Name: GreenCard Login
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
				<div class="row">
				<?php the_content(); ?>
				</div>
			</div>


	<div class="row">

	<?php wc_print_notices(); ?>

	<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

	<div class="large-5 medium-6 columns" id="customer_login">

		<h2><?php _e( 'Login', 'woocommerce' ); ?></h2>

		<form method="post" class="login">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
			</p>
			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
				<label for="rememberme" class="inline">
					<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
				</label>
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

	<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
	</div>

	</div>

<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
