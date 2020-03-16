<?php

// MAIN

$title = 'New AEX';
$credits = '<p>Made by: <a href="http://oort.network" target="_blank">Oort</a></p>';

$footer = 'Oort &copy; 2019-';

$logo = '';
$logo_w = '120px';
$logo_h = '20px';

// POSTS NAMES

// $post_singular = 'Project';
// $post_plural = 'Projects';

// PAGES

$pages_remove_id = '';


// ETC

function svg($name){
    $file = get_template_directory();
    $file .= "/assets/img/" . $name . ".svg";
    include($file);
}


function get_dates($start, $end){
    $date1 = $start;
    $date2 = $end;

    if($date1 == $date2){
        $date1 = $start;
        $t1 = strtotime($date1);
        $d1 = getdate($t1);

        // three possible formats for the first date
        $long = "j F Y";
        printf("%s\n", date($long, $t1));
    } else {
        $t1 = strtotime($date1);
        $t2 = strtotime($date2);

        // get date and time information from timestamps
        $d1 = getdate($t1);
        $d2 = getdate($t2);

        // three possible formats for the first date
        $long = "j F Y";
        $medium = "j F";
        $short = "j";

        // decide which format to use
        if ($d1["year"] != $d2["year"]) {
            $first_format = $long;
        } elseif ($d1["mon"] != $d2["mon"]) {
            $first_format = $medium;
        } else {
            $first_format = $short;
        }

        printf("%s—%s\n", date($first_format, $t1), date($long, $t2));
    }
    
}

function get_single_date($singledate){
    $date1 = $singledate;
    $t1 = strtotime($date1);
    $d1 = getdate($t1);

    // three possible formats for the first date
    $long = "j F Y";
    printf("%s\n", date($long, $t1));
}


//////////////////////////////////////


/**
* Add Dashboard Widget
**/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
global $title;

wp_add_dashboard_widget('custom_help_widget', $title, 'custom_dashboard_help');
}

function custom_dashboard_help() {
global $credits;
echo $credits;
}


/**
* exclude pages from admin
**/
add_filter( 'parse_query', 'exclude_pages_from_admin' );
function exclude_pages_from_admin($query) {
global $pages_remove_id;

    global $pagenow,$post_type;
    if (is_admin() && $pagenow=='edit.php' && $post_type =='page') {
        $query->query_vars['post__not_in'] = array($pages_remove_id);
    }
}



/**
* Change name of Posts
**/
if($post_singular){
    function revcon_change_post_label() {
        global $post_plural;
        global $post_singular;
        global $menu;
        global $submenu;
        $menu[5][0] = $post_plural;
        $submenu['edit.php'][5][0] = $post_plural;
        $submenu['edit.php'][10][0] = 'Add '.$post_singular;
        echo '';
    }
    function revcon_change_post_object() {
        global $post_plural;
        global $post_singular;
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = $post_plural;
        $labels->singular_name = $post_singular;
        $labels->add_new = 'Add '.$post_singular;
        $labels->add_new_item = 'Add '.$post_singular;
        $labels->edit_item = 'Edit '.$post_singular;
        $labels->new_item = 'New P'.$post_singular;
        $labels->view_item = 'View '.$post_singular;
        $labels->search_items = 'Search '.$post_plural;
        $labels->not_found = 'No '.$post_plural.' found';
        $labels->not_found_in_trash = 'No '.$post_plural.' found in Trash';
        $labels->all_items = 'All '.$post_plural;
        $labels->menu_name = $post_plural;
        $labels->name_admin_bar = $post_plural;
    }
     
    add_action( 'admin_menu', 'revcon_change_post_label' );
    add_action( 'init', 'revcon_change_post_object' );
}

/**
* Custom Login
**/
function my_custom_login_logo() {
	global $logo;
	global $logo_w;
	global $logo_h;
    echo '<style type="text/css">
    body.login {
        background-color: #fff;
    }
    h1 a {
        background-image:url('.get_bloginfo('template_url').'/assets/img/'.$logo.') !important;
        background-size: '.$logo_w.' '.$logo_h.'!important;
        width:100% !important;
        height: '.$logo_h.' !important;
    }
    .login form {
        background:transparent !important;
        border:0px !important;
        -moz-box-shadow: rgba(200,200,200,0) 0 0px 0px 0px;
        -webkit-box-shadow: rgba(255, 255, 255, 0) 0 0px 0px 0px;
        box-shadow: rgba(200, 200, 200, 0) 0 0px 0px 0px;
    }
    .login form .input,
    .login input[type="text"] {
        background:#fff !important;
    }
    .login #nav a,
    .login #backtoblog a {
        color:#000 !important;
        text-shadow: none !important;
    }
    .login #nav a:hover,
    .login #backtoblog a:hover {
        color:#ccc !important;
    }
    input.button-primary,
    button.button-primary,
    a.button-primary {
        border-color: #000 !important;
        background: #000 !important;
        color:#fff !important;
        text-shadow: rgba(0, 0, 0, 0) 0 0px 0 !important;
        -webkit-box-shadow: inset 0 0px 0 rgba(120,200,230,0.0) !important;
        box-shadow: inset 0 0px 0 rgba(120,200,230,0.0) !important;
    }
    input.button-primary:hover,
    button.button-primary:hover,
    a.button-primary:hover {
        border-color: #ccc !important;
        background: #ccc !important;
        color:#0c0c0c !important;
        text-shadow: rgba(0, 0, 0, 0) 0 0px 0 !important;
    }
    .login label {
        color: #000 !important;
        font-size: 14px;
    }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

// Custom WordPress Footer
function remove_footer_admin () {
	global $footer;
    echo $footer;
    echo date("Y");
}
add_filter('admin_footer_text', 'remove_footer_admin');
