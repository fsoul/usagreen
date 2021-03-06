<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** Load TGM Plugins */
require_once( 'tgm/greencard.php' );

/** Load includes/custom-function.php */
require_once( 'includes/custom-function.php' );

//wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/javascript/custom.js', array('jquery'), '1', true );
//wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/javascript/custom.js', array('jquery'), '1', true );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );
wp_enqueue_style( 'style', get_stylesheet_uri() );

function restrict_admin()
{
     if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
                wp_redirect( site_url() );
     }
}

add_action( 'admin_init', 'restrict_admin', 1 );

/* redirect to checkout_url if added product to cart */

add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
function redirect_to_checkout() {
 return WC()->cart->get_checkout_url();
}

/* remove product link */
add_action('woocommerce_before_shop_loop_item', 'remove_link', 1);
function remove_link() {
    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
}

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
function woo_archive_custom_cart_button_text() {
        return __( 'Buy', 'woocommerce' );
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
function woo_custom_cart_button_text() {
        return __( 'Buy', 'woocommerce' );
}


/** ------------------------------------------------------------------------ *
 * Custom lead options
 * ------------------------------------------------------------------------ */


add_action('admin_init', 'lead_initialize_options');
function lead_initialize_options() {
    add_settings_section(
        'general_settings_section',
        'Настройка лид генерации',
        'lead_callback',
        'general'
    );

    add_settings_field(
        'show_email',                      // ID used to identify the field throughout the theme
        'Email',                           // The label to the left of the option interface element
        'email_callback',   // The name of the function responsible for rendering the option interface
        'general',                          // The page on which this option will be displayed
        'general_settings_section',         // The name of the section to which this field belongs
        array(                              // The array of arguments to pass to the callback. In this case, just a description.
            'Add all emails by comma'
        )
    );

    register_setting(
        'general',
        'show_email'
    );
}

function lead_callback() {
    echo '<p>Адреса можно вводить через запятую</p>';
}

function email_callback($args) {
    $html = '<input class="regular-text" title="'.$args[0].'" type="text" name="show_email" id="show_email" value="'.get_option('show_email').'"/>';
    $html .= '<p class="description" id="lead-email-description">Email адреса для лид рассылки</p>';
    echo $html;
}

function sendLead($user_id){
    if($_POST['register']){
        $to = get_option('show_email');
        $subject = "Новый лид с сайта usagreenc.com";
        $domain = "usagreenc.com";
        $from = "no-reply@". $domain;
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: ". $from . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $template_data = "<tr><td>user_id: </td><td>$user_id</td></tr>";
        unset($_POST['email_2']);
        unset($_POST['userRegAide_RegFormNonce']);
        unset($_POST['woocommerce-register-nonce']);
        unset($_POST['_wp_http_referer']);
        unset($_POST['lead_email']);
        unset($_POST['register']);

        foreach ($_POST as $key => $val){
            $val = htmlentities($val);
            $template_data .= "<tr><td>{$key}:</td><td>$val</td></tr>";
        }
        $template_mail = "<html><body><table>$template_data</table></body></html>";
        $result = mail($to, $subject, $template_mail, $headers);
    }
}

add_action( 'user_register', 'sendLead', 10, 1 );

add_action( 'woocommerce_save_account_details', 'my_woocommerce_save_account_details' );
function my_woocommerce_save_account_details( $user_id ) {

    $fieldsToUpdate = array(
        "phone",
        "mobile",
        "h_school",
        "working",
        "country_resid",
        "birth_country",
        "marit_status",
    );

    foreach ($fieldsToUpdate as $field){
        update_user_meta( $user_id, $field, htmlentities( $_POST[ $field ] ) );
    }
}
//add_action('init', 'pl');

function pl(){
    error_reporting(E_ALL); ini_set('display_errors', 1);
    $plugins = array(
      "polylang/polylang.php ",
      "akeebabackupwp/akeebabackupwp.php",
      "black-studio-tinymce-widget/black-studio-tinymce-widget.php",
      "buttons-shortcode-and-widget/otw_content_manager.php",
      "easy-modal/easy-modal.php",
      "contact-form-7/wp-contact-form-7.php",
      "easylogo/easylogo.php",
      "enhanced-media-library/enhanced-media-library.php",
      "image-widget/image-widget.php",
      "loco-translate/loco.php",
      "tinymce-advanced/tinymce-advanced.php",
      "tutsplus-product-archive-short-descriptions.php1_/tutsplus-product-archive-short-descriptions.php",
      "unyson/unyson.php",
      "user-registration-aide/user-registration-aide.php",
      "woo-checkout-field-editor-pro/checkout-form-designer.php",
      "woo-login-redirect/redirect.php",
      "woo-poly-integration/__init__.php",
      "woocommerce-gateway-paypal-express-checkout/woocommerce-gateway-paypal-express-checkout.php",
      "woocommerce-gateway-stripe/woocommerce-gateway-stripe.php",
      "woocommerce-polylang-integration/woocommerce-polylang-integration.php",
      "woocommerce-product-price-based-on-countries/woocommerce-product-price-based-on-countries.php",
      "authorizenet-woocommerce-addon/authorize.net-woocommerce-addon.php",
    );
    foreach ($plugins as $plugin){
        $file = explode("/", $plugin);
        $plugin_path = "/{$plugin}/{$file[2]}.php";

        activate_plugin($plugin_path);
    }
    echo 'done';
}

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
    wp_redirect( home_url() );
    exit();
}
