<?php
//**

function tinymce_paste_as_text( $init ) {
  $init['paste_as_text'] = true;
  return $init;
}

add_filter('tiny_mce_before_init', 'tinymce_paste_as_text');

/**
 * Add "Styles" drop-down
 */
add_filter( 'mce_buttons_2', 'tuts_mce_editor_buttons' );
 
function tuts_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

 
/**
 * Add styles/classes to the "Styles" drop-down
 */
add_filter( 'tiny_mce_before_init', 'tuts_mce_before_init' );
 
function tuts_mce_before_init( $settings ) {
    
    /* Default Style Formats */
    $default_style_formats = array(
        array(
            'title'   => 'Headings',
            'items' => array(
                array(
                    'title'   => 'Heading 1',
                    'format'  => 'h1',
                ),
                array(
                    'title'   => 'Heading 2',
                    'format'  => 'h2',
                )
            )
        )
    );
    
    $style_formats = array(
        array(
            'title' => 'List: Numbers',
            'selector' => 'ul',
            'classes' => 'list-numbers'
        ),
        array(
            'title' => 'List: Letters',
            'selector' => 'ul',
            'classes' => 'list-letters',
        )
    );
    
    $new_style_formats = array_merge( $default_style_formats, $style_formats );

    $settings['style_formats'] = json_encode( $new_style_formats );
 
    return $settings;
 
}


//** ACF START
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
	$toolbars['Copy'] = array();
	$toolbars['Copy'][1] = array('styleselect', 'link', 'unlink', 'bullist', 'undo', 'redo','removeformat' );

    $toolbars['simple'] = array();
	$toolbars['simple'][1] = array('link', 'unlink', 'undo', 'redo','removeformat' );


	return $toolbars;
}



// ACF

if( function_exists('acf_add_options_page') ) {
    $page = acf_add_options_page(array(
        'page_title'    => 'Frontend Options',
        'menu_title'    => 'Frontend',
        'menu_slug'     => 'frontend',
        'capability'    => 'edit_posts',
        'redirect'  => false,
        'position' => 2
    ));

    $page2 = acf_add_options_page(array(
        'page_title'    => 'Backend Options',
        'menu_title'    => 'Backend',
        'menu_slug'     => 'backend',
        'capability'    => 'edit_posts',
        'redirect'  => false,
        'position' => 2
    ));
}

// if( function_exists('acf_add_options_page') ) {
//     $page = acf_add_options_page(array(
//         'page_title'    => 'Homepage',
//         'menu_title'    => 'Homepage',
//         'menu_slug'     => 'homepage',
//         'capability'    => 'edit_posts',
//         'redirect'  => false,
//         'position' => 3
//     ));
// }

