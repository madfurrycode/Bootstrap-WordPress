<?php

/**
 * Enqueue all the stylesheets and javascript files.
 *
 * @package BootstrapWP
 * @author Tristan Elliott
 * @version 1.0
 */

function bootstrapwp_scripts()
{
  wp_enqueue_style( 'bootstrapwp-style', get_stylesheet_uri() );
  wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/dist/css/bootstrap.min.css', array(), '4.1', 'all' );
  wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/dist/fonts/font-awesome.min.css', array(), '4.1', 'all' );
  wp_enqueue_style( 'ion-css', get_template_directory_uri() . '/assets/dist/fonts/ionicons.min.css', array(), '4.2', 'all' );
  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/dist/js/bootstrap.min.js', array( 'jquery' ), '4.1', true );
  wp_enqueue_script( 'bootstrap-offcanvas', get_template_directory_uri() . '/assets/dist/js/bs-custom.js', array( 'jquery' ), '4.0', true );
}

add_action( 'wp_enqueue_scripts', 'bootstrapwp_scripts' );
