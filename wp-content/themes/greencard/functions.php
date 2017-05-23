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

/**
 * Sending lead data
 */
function send_lead(){
    if(!empty($_REQUEST['mobile'])){
        $phone = $_REQUEST['mobile'];
        $name = $_REQUEST['first_name'];
        $email = $_REQUEST['email'];

        $to = get_option('show_email');
        $subj = 'New Client Lead';
        $mess = "Name: {$name}\n";
        $mess .= "Email: {$email}\n";
        $mess .= "Phone: {$phone}\n";

        wp_mail($to, $subj, $mess);
    }
}
add_action('lead_hook', 'send_lead');

add_action('admin_init', 'lead_initialize_options');
function lead_initialize_options() {
    add_settings_section(
        'general_settings_section',
        'Lead Email Options',
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
    echo '<p>Provide lead emails</p>';
}

function email_callback($args) {
    $html = '<input title="'.$args[0].'" type="text" name="show_email" id="show_email" value="'.get_option('show_email').'"/>';
    $html .= '<p class="description" id="lead-email-description">Email адреса для лид рассылки. Вводить через запятую</p>';
    echo $html;
}