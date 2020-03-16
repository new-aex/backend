<?php
/**
 * Custom Backend functions
 */




/**
* Remove Update Core
**/
// add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

/**
* Replace Howdy
**/
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );


/**
* Clean Adminbar
**/
function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

/**
* clear Edito menu
**/
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}

add_action('_admin_menu', 'remove_editor_menu', 1);
/**
* clear admin colours
**/
function admin_color_scheme() {
   global $_wp_admin_css_colors;
   $_wp_admin_css_colors = 0;
}
add_action('admin_head', 'admin_color_scheme');

/**
* Custom Login LogoURL
**/
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return '#';
}
/**
* Custom Footer
**/

function change_footer_version() {
  return '';
}
add_filter( 'update_footer', 'change_footer_version', 9999 );
/**
* Clear Dashboard
**/
// Create the function to use in the action hook
function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
        remove_action( 'welcome_panel', 'wp_welcome_panel' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );

/**
* Remove Pages
**/
add_action( 'admin_menu', 'remove_links_menu' );
function remove_links_menu() {
    remove_menu_page('link-manager.php'); // Links
    // remove_menu_page('tools.php'); // Tools
    // remove_menu_page('edit.php'); // Blogs
    //remove_menu_page('options-general.php'); // options-general
    // remove_menu_page('plugins.php'); // Plugins
    // remove_submenu_page( 'index.php', 'update-core.php' );
    remove_submenu_page( 'themes.php', 'themes.php?page=admin-bar' );
    //remove_submenu_page( 'themes.php', 'widgets.php' );
    remove_submenu_page( 'themes.php', 'customize.php' );
    // remove_submenu_page( 'themes.php', 'themes.php' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
    //remove_menu_page('themes.php'); // Themes 
    // remove_menu_page('edit.php?post_type=page'); // pages
    remove_menu_page('edit.php'); // pages
    remove_menu_page('edit-comments.php'); // comments
       
}


/**
* Default no link
**/
function wpb_imagelink_setup() {
$image_set = get_option( 'image_default_link_type' );
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);
