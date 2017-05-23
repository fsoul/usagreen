<?php 


if ( ! function_exists( 'top_button_user_wp_sidebars' ) ) :
function top_button_user_wp_sidebars() {
 
	register_sidebar(
		array(
			'id' => 'top_notreg_sideb', // уникальный id
			'name' => 'Верхний сайдбар для незарегистрированных пользователей', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="notregistr_user widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>'
		)
	);
 
	register_sidebar(
		array(
			'id' => 'top_reg_sideb',
			'name' => 'Верхний сайдбар для зарегистрированных пользователей', // название сайдбара
			'before_widget' => '<div id="%1$s" class="registr_user widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}
 
add_action( 'widgets_init', 'top_button_user_wp_sidebars' );
endif;

function load_my_styles() {
  global $is_iphone; //loading global var here
  if( ! $is_iphone ) {
	wp_enqueue_script( 'inputmask', get_template_directory_uri() . '/assets/javascript/inputmask.min.js', array('jquery'), '1', true );
	wp_enqueue_script( 'inputmask_extensions', get_template_directory_uri() . '/assets/javascript/inputmask.phone.extensions.min.js', array('jquery'), '1', true );
	wp_enqueue_script( 'jq_inputmask', get_template_directory_uri() . '/assets/javascript/jquery.inputmask.min.js', array('jquery'), '1', true );
	wp_enqueue_script( 'phone_codes', get_template_directory_uri() . '/assets/javascript/phone-codes.js', array('jquery'), '1', true );
  }
}
add_action( "wp_enqueue_scripts", "load_my_styles" );

/*
wp_enqueue_script( 'knockout', 'https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-min.js', array('jquery'), '1', true );
wp_enqueue_script( 'knockout_valid', 'https://cdnjs.cloudflare.com/ajax/libs/knockout-validation/2.0.3/knockout.validation.min.js', array('jquery'), '1', true );
wp_enqueue_script( 'jq_inputmask', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.7/jquery.inputmask.bundle.min.js', array('jquery'), '1', true );
wp_enqueue_script( 'phone_codes', 'https://bowercdn.net/c/jquery.inputmask-3.2.5/extra/phone-codes/phone-codes.js', array('jquery'), '1', true );
*/

add_filter( 'logout_url', 'my_logout_url' );
function my_logout_url( $url ) {
	if (!is_admin_bar_showing()) {
		wp_logout();
	}
    return get_bloginfo('siteurl');
}
?>
