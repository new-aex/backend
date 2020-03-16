<?php



add_action('acf/init', 'my_acf_form_init');
function my_acf_form_init() {

    // Check function exists.
    if( function_exists('acf_register_form') ) {


        // Register form.
        acf_register_form(array(
            'id'       => 'new-event',
            'post_id'  => 'new_post',
            'new_post' => array(
                'post_type'   => 'events',
                'post_status' => 'pending'
            ),

            'field_groups' => ['group_5e2183998b20a'],
            'post_title'  => true,
            
            'submit_value'       => 'Submit',
            'updated_message'    => 'Saved!',

            'html_before_fields' => '',
            'html_after_fields'  => '',

            // 'uploader' => 'basic',
            
            
            'return'             => 'thank-you', // Redirect to new post url
        ));


    }
}