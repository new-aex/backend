<?php
/**
 * Custom Web functions
 */

/** remove img sizes  ***/
function paulund_remove_default_image_sizes( $sizes) {
    unset( $sizes['medium']);
    unset( $sizes['large']);
     
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'paulund_remove_default_image_sizes');



/** home**/

/**
* Highlight menu taxonomies
**/

/*remove blog*/
add_action( 'admin_menu', 'remove_admin_menus' );
add_action( 'wp_before_admin_bar_render', 'remove_toolbar_menus' );
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

function remove_admin_menus() {
    remove_menu_page( 'comments.php' );
}

function remove_toolbar_menus() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'comments' );
}

function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
}

unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);



/**
* Disable the emoji's
*/
function disable_emojis() {
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
* Filter function used to remove the tinymce emoji plugin.
* 
* @param array $plugins 
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
if ( is_array( $plugins ) ) {
return array_diff( $plugins, array( 'wpemoji' ) );
} else {
return array();
}
}

/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
if ( 'dns-prefetch' == $relation_type ) {
/** This filter is documented in wp-includes/formatting.php */
$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
}

return $urls;
}