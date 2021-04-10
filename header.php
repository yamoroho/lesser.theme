<!DOCTYPE html>
<html <?php language_attributes() ?> >
<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
  <?php wp_body_open(); ?>
  <div id="fh5co-page">
    <header id="fh5co-header" role="banner">
      <div class="container">
        <div class="header-inner">
          <?php            
            if( is_front_page() ){
              echo '<h1><i class="sl-icon-energy"></i>';
              bloginfo('name');
              echo '</h1>';
            } else {
              echo '<h1><i class="sl-icon-energy"></i><a href="'.get_home_url().'">';
              echo bloginfo('name');
              echo '</a></h1>';
            }            
          ?>

          <?php
            wp_nav_menu( [
              'theme_location'  => 'header_menu',
              'container'       => 'nav', 
              'container_class' => 'navigation', 
              'echo'            => true,
            ] );
          ?>
        </div>
      </div>
    </header>
  
