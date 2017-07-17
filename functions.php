<?php
/**
* Enqueue scripts and styles
*/

function scripts() {

	// load angular-material css
	wp_enqueue_style( 'angular-material', get_template_directory_uri() . '/node_modules/angular-material/angular-material.css' );

	// load Font Awesome css
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/includes/css/font-awesome.min.css', false, '4.1.0' );

	// load stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri() );

  //load angular
  wp_enqueue_script('angularjs', get_template_directory_uri() .'/node_modules/angular/angular.min.js');
  wp_enqueue_script('angularjs-route', get_template_directory_uri() .'/node_modules/angular-route/angular-route.min.js');
  wp_enqueue_script('angular-animate', get_template_directory_uri() .'/node_modules/angular-animate/angular-animate.min.js');
  wp_enqueue_script('angular-aria', get_template_directory_uri() .'/node_modules/angular-aria/angular-aria.min.js');
  wp_enqueue_script('angular-materialjs', get_template_directory_uri() .'/node_modules/angular-material/angular-material.min.js');
  wp_enqueue_script('angular-sanitize', get_template_directory_uri() .'/node_modules/angular-sanitize/angular-sanitize.min.js');

  wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/scripts/config.js');

	//classes

	//load services
		wp_enqueue_script('ListService', get_template_directory_uri() .'/scripts/services/ListService.js');

  //load controllers
		wp_enqueue_script('ToDoController', get_template_directory_uri() .'/scripts/controllers/ToDoController.js');
		wp_enqueue_scripts('DoneController', get_template_directory_uri() .'/scripts/controllers/DoneController.js');
		
  if ( is_user_logged_in() && current_user_can( 'edit_posts' ) ) {
    wp_localize_script('RunService', 'WPsettings', array(
      'root' => esc_url_raw( rest_url() ),
      'nonce' => wp_create_nonce( 'wp_rest' ),
      'current_ID' => get_the_ID(),
      'session_token' => wp_get_session_token(),
      'user_ID' => get_current_user_id()
    ));
  };

  // With get_stylesheet_directory_uri()
  wp_localize_script('scripts', 'localized',
  array(
		'partials' => get_stylesheet_directory_uri() . '/views/',
		'url' => get_stylesheet_directory_uri() . '/'
		));
}

add_action( 'wp_enqueue_scripts', 'scripts');

?>
