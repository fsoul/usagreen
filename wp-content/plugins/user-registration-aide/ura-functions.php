<?php

// filter to modify front end menu and remove our custom template pages
//wp_die( 'HELLO' );
//add_filter( 'wp_nav_menu_objects', 'ura_menu_exclude_pages', 10, 2 );
add_filter( 'get_pages', 'ura_menu_exclude_custom_pages', 10, 1 );
add_action( 'register_new_user', 'remove_default_password_nag', 10, 1 );

/**
 * function ura_menu_exclude_custom_pages
 * Removes custom page templates from front end menus so user doesn't have to
 * @since 1.5.3.0
 * @updated 1.5.3.0
 * @access public
 * @params array $pages List of pages to retrieve.
 * @returns array $pages The page menu items, with ura custom template pages removed
*/

function ura_menu_exclude_custom_pages( $pages ){
	$tc = new URA_TEMPLATE_CONTROLLER();
	$ids = $tc->page_ids();
	$page_length = count( $pages );
	for ( $i = 0; $i < $page_length; $i++ ) {
		$page = & $pages[$i];
		if ( in_array( $page->ID, $ids ) ) {
			unset( $pages[$i] );
		}
	}
	return $pages;
}

/**
 * function ura_menu_exclude_pages
 * Removes custom page templates from front end menus so user doesn't have to
 * @since 1.5.3.0
 * @updated 1.5.3.0
 * @access public
 * @params array $items The menu items, sorted by each menu item's menu order.
 * @params object $args An object containing wp_nav_menu() arguments.
 * @returns array $items The menu items, with ura custom templates removed
*/

function ura_menu_exclude_pages( $items, $args ){
	$tc = new URA_TEMPLATE_CONTROLLER();
	$ids = $tc->get_custom_templates_menu_ids();
	foreach( $items as $i => $object ){
		if( in_array( $object->ID, $ids ) ){
			unset( $items[$i] );
		}
	}
	return $items;
}

/**	
 * Function remove_default_password_nag
 * Remove default password message if user entered own password
 * @since 1.0.0
 * @updated 1.5.3.0
 * @access public
 * @params int    $user_id ID of the newly created user.
 * @params string $notify  Type of notification that should happen. See {@see wp_send_new_user_notifications()}
 *                        for more information on possible values.
 * @returns int $user_id
 */

function remove_default_password_nag( $user_id ) {
	global $wpdb;
	$reg_fields = get_option( 'csds_userRegAide_registrationFields' );
	if( empty( $reg_fields ) ){
		return $user_id;
	}else{
		$table = $wpdb->prefix . "usermeta";
		$data = array(
			'meta_value'	=>	0
		);
		$where = array(
			'user_id'			=>	$user_id,
			'meta_key'			=>	'default_password_nag'
		);
	
		if( array_key_exists( 'user_pass', $reg_fields ) ){
			$delete = $wpdb->delete( $table, $where );
		}
	}
	return $user_id;
}	

add_action( 'init', 'ura_update_template_slugs' );

/** 
 * function ura_update_template_slugs
 * updates template slugs to help ensure no duplicates and resulting issues
 * @since 1.5.3.2
 * @updated 1.5.3.2
 * @access public
 * @params 
 * @returns 
*/

function ura_update_template_slugs(){
	global $wpdb;
	$options = get_option( 'csds_userRegAide_Options' );
	$updated = ( int ) 0;
	if( !array_key_exists( 'template_slug_change', $options ) || $options['template_slug_change'] == 2 ){
		$templates = ura_old_template_array();
		$url = get_site_url();
		$table = $wpdb->prefix . 'posts';
		foreach( $templates as $key	=> $title ){
			$data = array(
				'post_name'		=>	'ura-'.$key,
				'guid'			=>	$url.'/'.'ura-'.$key.'/'
			);
			$where = array(
				'post_name'			=>	$key,
				'ura_post_type'		=>	'ura-page'
			);
			$results = $wpdb->update( $table, $data, $where );
			if( $results === false ){
				$updated++;
			}elseif( $results === 0 ){
				$updated++;
			}
		}
		if( $updated >= 1 ){
			$tc = new URA_TEMPLATE_CONTROLLER();
			$tc->csds_pages_setup();	
		}
		$options['template_slug_change'] = 1;
		update_option( 'csds_userRegAide_Options', $options );
	}
	
}

/**
 * function ura_old_template_array
 * Returns array of old custom URA template slugs-titles for updating to new slugs
 * @category function
 * @since 1.5.3.2
 * @updated 1.5.3.2
 * @access public
 * @params
 * @returns array $templates prior custom URA page templates
*/

function ura_old_template_array(){
	$templates = array(
		'account-locked-out'								=>	'Account Locked Out',
		'email-confirm'										=>	'Email Confirm',
		'update-password'									=>	'Update Password',
		'lost-password'										=>	'Lost Password',
		'reset-password'									=>	'Reset Password'
	);
	return $templates;
}