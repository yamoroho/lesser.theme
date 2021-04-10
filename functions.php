<?php
// Добавление расширенных возможностей
if ( ! function_exists( 'universal_theme_setup' ) ) :
  function universal_theme_setup() {
    // Регистрация меню
    register_nav_menus( [
      'header_menu' => 'Menu in header',
      'footer_menu' => 'Menu in footer',      
    ] );    
  }
endif;
add_action( 'after_setup_theme', 'universal_theme_setup');

// Подключение стилей и скриптов
add_action( 'wp_enqueue_scripts', 'enqueue_lesser_style' );
function enqueue_lesser_style() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'Roboto', '//fonts.googleapis.com/css?family=Roboto:400,100,300,700,900');
  wp_enqueue_style( 'Playfair', '//fonts.googleapis.com/css?family=Playfair+Display:400,700');
  wp_enqueue_style( 'swiper-slider', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', 'style', time());
  wp_enqueue_style( 'lesser-theme', get_template_directory_uri() . '/assets/css/lesser-theme.css', 'style', time());
  wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', 'style', time());
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', 'style', time());
  wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/assets/css/icomoon.css', 'style', time());
  wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/assets/css/simple-line-icons.css', 'style', time());
  
  wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//code.jquery.com/jquery-3.6.0.min.js');
	wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', null, time(), true);
  wp_enqueue_script( 'google-map', get_template_directory_uri() . '/assets/js/google-map.js', null, time(), true);
  wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', 'jquery', time(), true); 
  wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', 'jquery', time(), true); 
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.6.2.min.js', null, time(), true); 
  wp_enqueue_script( 'respond', get_template_directory_uri() . '/assets/js/respond.min.js', null, time(), true); 
  wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', null, time(), true); 
}
