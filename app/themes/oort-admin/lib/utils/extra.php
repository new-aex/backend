<?php

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove the REST API endpoint.
// remove_action('rest_api_init', 'wp_oembed_register_route');

// Turn off oEmbed auto discovery.
// Don't filter oEmbed results.
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

// Remove oEmbed discovery links.
remove_action('wp_head', 'wp_oembed_add_discovery_links');

// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action('wp_head', 'wp_oembed_add_host_js');


function hooks() {

    /** Reset */

    // hides the admin bar when you are logged in and on the website
    show_admin_bar(false);

    // remove emoticon styles
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // remove unused links from header
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');


}

//call hooks
hooks();
