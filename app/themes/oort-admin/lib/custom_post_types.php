<?php

// function register_instagram() {
//     $labels = array(
//         'name'               => _x( 'Instagram', 'post type general name', 'oortadmin' ),
//         'singular_name'      => _x( 'Instagram', 'post type singular name', 'oortadmin' ),
//         'menu_name'          => _x( 'Instagram', 'admin menu', 'oortadmin' ),
//         'name_admin_bar'     => _x( 'Instagram', 'add new on admin bar', 'oortadmin' ),
//         'add_new'            => _x( 'Add New', 'add post', 'oortadmin' ),
//         'add_new_item'       => __( 'Add New Instagram', 'oortadmin' ),
//         'new_item'           => __( 'New Instagram', 'oortadmin' ),
//         'edit_item'          => __( 'Edit Instagram', 'oortadmin' ),
//         'view_item'          => __( 'View Instagram', 'oortadmin' ),
//         'all_items'          => __( 'All Instagram', 'oortadmin' ),
//         'search_items'       => __( 'Search Instagram', 'oortadmin' ),
//         'parent_item_colon'  => __( 'Parent Instagram:', 'oortadmin' ),
//         'not_found'          => __( 'No Instagram found.', 'oortadmin' ),
//         'not_found_in_trash' => __( 'No Instagram found in Trash.', 'oortadmin' ),
//     );

//     $args = array(
//         'labels'        => $labels,
//         'description'   => __('Instagram', 'oortadmin'),
//         'public'        => true,
//         'menu_position' => 4,
//         'supports'      => array('title', 'thumbnail', 'editor', 'custom-fields'),
//         'has_archive'   => true,
//         'menu_icon'     => 'dashicons-format-image',
//         'rewrite'       => array(
//             'slug'       => 'instagram', 'with_front' => false
//         )
//     );

//     register_post_type('instagram', $args);
// }

// add_action( 'init', 'register_instagram', 0 );


//events
function register_events() {
    $labels = array(
        'name'               => _x( 'Events', 'post type general name', 'oortadmin' ),
        'singular_name'      => _x( 'Event', 'post type singular name', 'oortadmin' ),
        'menu_name'          => _x( 'Events', 'admin menu', 'oortadmin' ),
        'name_admin_bar'     => _x( 'Event', 'add new on admin bar', 'oortadmin' ),
        'add_new'            => _x( 'Add New', 'add post', 'oortadmin' ),
        'add_new_item'       => __( 'Add New Event', 'oortadmin' ),
        'new_item'           => __( 'New Event', 'oortadmin' ),
        'edit_item'          => __( 'Edit Event', 'oortadmin' ),
        'view_item'          => __( 'View Event', 'oortadmin' ),
        'all_items'          => __( 'All Events', 'oortadmin' ),
        'search_items'       => __( 'Search Evenst', 'oortadmin' ),
        'parent_item_colon'  => __( 'Parent Event:', 'oortadmin' ),
        'not_found'          => __( 'No Event found.', 'oortadmin' ),
        'not_found_in_trash' => __( 'No Event found in Trash.', 'oortadmin' ),
    );

    $args = array(
        'labels'        => $labels,
        'description'   => __('Events', 'oortadmin'),
        'public'        => true,
        'menu_position' => 4,
        'supports'      => array('title',),
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-flag',
        'rewrite'       => array(
            'slug'       => 'events', 'with_front' => false
        )
    );

    register_post_type('events', $args);
}

add_action( 'init', 'register_events', 0 );
