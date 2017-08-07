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
//$current_lang = get_locale();
//var_dump($user);
//echo '<hr>';
//var_dump($user_meta);
//echo '<hr>';
//
//var_dump(get_user_meta( $user_id, 'marit_status', true));
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( "wp_enqueue_scripts", "load_my_styles" );

wp_enqueue_script( 'edit-validation', get_template_directory_uri() . '/assets/javascript/edit-validation.js', array('jquery'));

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-wide">
		<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-wide">
		<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>
	<div class="clear"></div>

    <!--  user meta data #~# -->
    <?php
    $field = new FIELDS_DATABASE();
    $options = $field->get_total_field_options( 'birth_country' );
    ?>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide radio-indent">
        <label for="marit_status"><?php _e( 'Marital Status', 'foundationpress' ); ?></label>
        <?php
        $marit = $field->get_total_field_options( 'marit_status' );
        if( !empty( $marit ) ){
            foreach( $marit as $object ){
                $value1 = $object->field_name;
                ?>
                <input <?php if($value1 == esc_attr( $user_meta['marit_status'][0] )) echo 'checked';?> type="radio" name="marit_status" class="csds_input" value="<?php echo trim( $value1 );?>" /><?php _e( $value1, 'foundationpress' ); ?>
                <?php
            }
        }else{
            ?>
            <?php _e( 'No Options for This Field at This Time!', 'user-registration-aide' ); ?>
            <?php
        }
        ?>
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="birth_country"><?php _e( 'Country of Birth', 'foundationpress' ); ?></label>
        <select name="birth_country" id="birth_country">
            <?php
            if( !empty( $options ) ){
                foreach( $options as $object ){
                    $value1 = $object->field_name;
                    if( $value1 == esc_attr( $user_meta['birth_country'][0]) ){
                        $selected = "selected=\"selected\"";
                    }else{
                        $selected = NULL;
                    }
                    ?>
                    <option value="<?php echo trim( $value1 );?>" <?php echo $selected ;?> ><?php _e( trim( $value1 ), 'woocommerce' );?></option>
                    <?php
                }
            }else{
                ?>
                <option value="no_value"><?php _e( 'No Options for This Field at This Time!', 'user-registration-aide' ); ?></option>
                <?php
            }
            ?>
        </select>
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="country_resid"><?php _e( 'Country of Residence', 'foundationpress' ); ?></label>
        <select name="country_resid" id="country_resid">
            <?php
            if( !empty( $options ) ){
                foreach( $options as $object ){
                    $value1 = $object->field_name;
                    if( $value1 == esc_attr( $user_meta['country_resid'][0]) ){
                        $selected = "selected=\"selected\"";
                    }else{
                        $selected = NULL;
                    }
                    ?>
                    <option value="<?php echo trim( $value1 );?>" <?php echo $selected ;?> ><?php _e( trim( $value1 ), 'woocommerce' );?></option>
                    <?php
                }
            }else{
                ?>
                <option value="no_value"><?php _e( 'No Options for This Field at This Time!', 'user-registration-aide' ); ?></option>
                <?php
            }
            ?>
        </select>
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide radio-indent">
        <label for="working"><?php _e( 'I`m currently working', 'foundationpress' ); ?></label>
        <?php
        $working = $field->get_total_field_options( 'working' );
        if( !empty( $working ) ){
            foreach( $working as $object ){
                $value1 = $object->field_name;
                ?>
                <input <?php if($value1 == esc_attr( $user_meta['working'][0] )) echo 'checked';?> type="radio" name="working" class="csds_input" value="<?php echo trim( $value1 );?>" /><?php _e( ucfirst($value1), 'woocommerce' ); ?>
                <?php
            }
        }else{
            ?>
            <?php _e( 'No Options for This Field at This Time!', 'user-registration-aide' ); ?>
            <?php
        }
        ?>
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide radio-indent">
        <label for="h_school"><?php _e( 'I`m a High School Graduate', 'foundationpress' ); ?></label>

        <?php
        $h_school = $field->get_total_field_options( 'h_school' );
        if( !empty( $h_school ) ){
            foreach( $h_school as $object ){
                $value1 = $object->field_name;
                ?>
                <input <?php if($value1 == esc_attr( $user_meta['h_school'][0] )) echo 'checked';?> type="radio" name="h_school" class="csds_input" value="<?php echo trim( $value1 );?>" /><?php _e( ucfirst($value1), 'woocommerce' ); ?>
                <?php
            }
        }else{
            ?>
            <?php _e( 'No Options for This Field at This Time!', 'user-registration-aide' ); ?>
            <?php
        }
        ?>
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
        <input type="tel" class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="phone" value="<?php echo esc_attr( $user_meta['phone'][0] ); ?>" />
    </p>

    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
        <label for="mobile"><?php _e( 'Mobile', 'woocommerce' ); ?></label>
        <input type="tel" class="woocommerce-Input woocommerce-Input--text input-text" name="mobile" id="mobile" value="<?php echo esc_attr( $user_meta['mobile'][0] ); ?>" />
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
