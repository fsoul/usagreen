<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

$user_id = get_current_user_id();
$user  = get_userdata($user_id);
$user_meta = get_user_meta( $user_id );
//var_dump($user);
//echo '<hr>';
//var_dump($user_meta);
//echo '<hr>';
//
//var_dump(get_user_meta( $user_id, 'marit_status', true));
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-wide">
		<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-wide">
		<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>
	<div class="clear"></div>

	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
		<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	</p>

    <!--  user meta data #~# -->
    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="phone" value="<?php echo esc_attr( $user_meta['phone'][0] ); ?>" />
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="mobile"><?php _e( 'Mobile', 'woocommerce' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="mobile" id="mobile" value="<?php echo esc_attr( $user_meta['mobile'][0] ); ?>" />
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="marit_status"><?php _e( 'Marital Status', 'foundationpress' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="marit_status" id="marit_status" value="<?php echo esc_attr( $user_meta['marit_status'][0] ); ?>" />
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="birth_country"><?php _e( 'Country of Birth', 'foundationpress' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="birth_country" id="birth_country" value="<?php echo esc_attr( $user_meta['birth_country'][0] ); ?>" />
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="country_resid"><?php _e( 'Country of Residence', 'foundationpress' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="country_resid" id="country_resid" value="<?php echo esc_attr( $user_meta['country_resid'][0] ); ?>" />
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="working"><?php _e( 'I`m currently working:', 'foundationpress' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="working" id="working" value="<?php echo esc_attr( $user_meta['working'][0] ); ?>" />
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="h_school"><?php _e( 'I`m a High Shcool Graduate:', 'foundationpress' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="h_school" id="h_school" value="<?php echo esc_attr( $user_meta['h_school'][0] ); ?>" />
    </p>
    <!-- user meta data end -->

    <hr>

    <fieldset>
		<legend><?php _e( 'Password Change', 'woocommerce' ); ?></legend>

		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<label for="password_current"><?php _e( 'Current Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" />
		</p>
		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<label for="password_1"><?php _e( 'New Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" />
		</p>
		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<label for="password_2"><?php _e( 'Confirm New Password', 'woocommerce' ); ?></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" />
		</p>
	</fieldset>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
