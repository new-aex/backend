<?php

/**
 * Get rid of tags on posts.
 */
function unregister_taxonomies() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
    unregister_taxonomy_for_object_type( 'category', 'post' );
}
add_action( 'init', 'unregister_taxonomies' );


// add_action( 'init', 'custom_taxonomies', 0 );

// function custom_taxonomies() {
//     register_values();
// }

// function register_values() {
//     $labels = array(
//      'name'              => _x( 'Value', 'taxonomy general name', 'oortadmin' ),
//      'singular_name'     => _x( 'Value', 'taxonomy singular name', 'oortadmin' ),
//      'search_items'      => __( 'Search Values', 'oortadmin' ),
//      'all_items'         => __( 'All Values', 'oortadmin' ),
//      'parent_item'       => __( 'Parent Value', 'oortadmin' ),
//      'parent_item_colon' => __( 'Parent Value:', 'oortadmin' ),
//      'edit_item'         => __( 'Edit Value', 'oortadmin' ),
//      'update_item'       => __( 'Update Value', 'oortadmin' ),
//      'add_new_item'      => __( 'Add New Value', 'oortadmin' ),
//      'new_item_name'     => __( 'New Value Name', 'oortadmin' ),
//      'menu_name'         => __( 'Values', 'oortadmin' )
//     );

//     register_taxonomy('value', 'post', array(
//         'hierarchical'      => true,
//         'labels'            => $labels,
//         'show_ui'           => true,
//         'show_admin_column' => true,
//         'query_var'         => true,
//         'rewrite'           => array(
//             'slug' => 'value'
//         )
//     ));
// }