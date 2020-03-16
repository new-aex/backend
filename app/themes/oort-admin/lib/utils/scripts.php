<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.0.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.7.0.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function oortadmin_scripts() {
  wp_enqueue_style('oortadmin_main', get_template_directory_uri() . '/assets/css/main.min.css', false, '70da3a079a0e04cfb89a2afd51d10627');

  wp_register_script('oortadmin_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), 'b057b3e8c36f47bea9fca75b9b25af96', true);
  wp_enqueue_script('oortadmin_scripts');
}
add_action('wp_enqueue_scripts', 'oortadmin_scripts', 100);