<?php

function get_image($postID){
    $media = get_field('image', $postID);

    $item = $media['image'];
    $caption = $media['caption'];
    
    $data = [
        'id' => $item['id'],
        'url' => $item['url'],
        'width' => $item['width'],
        'height' => $item['height'],
        // 'sizes' => $item['sizes'],
        'caption' =>  $caption
    ];
    return $data;
}


//single event
function get_single_event($post) {
    if(!$post) {
        return [];
    }
    
    $data = [];

    $data['id'] = $post->ID;
    $data['slug'] = $post->post_name;
    $data['name'] = $post->post_title;

    $dates = get_field('dates', $post->ID);
    $dateStart = explode(" ", $dates['start']);
    $dateEnd = explode(" ", $dates['end']);


    $data['dates_start'] = date("d-m-Y", strtotime($dateStart[0]));
    $data['time_start'] = $dateStart[1];
    $data['dates_end'] = date("d-m-Y", strtotime($dateEnd[0]));
    $data['time_end'] = $dateEnd[1] ;

    $data['initiator'] = get_field('initiator', $post->ID);
    $data['streaming'] = get_field('streaming', $post->ID);
    $data['image'] = get_image($post->ID);
    $data['description'] = get_field('text', $post->ID);
    $data['donate'] = get_field('donate', $post->ID) && get_field('donate', $post->ID);
    
    return $data;
}

// GET EVENTS
function get_events($request) {
    $today = date('Ymd H:i');
    $args = [
        'numberposts' => -1,
        'post_type' => 'events',
        'order' => ASC,
        'orderby' => 'meta_value',
        'meta_key' => 'dates_start',
    ];

    $posts = get_posts($args);

    $data = [];
    $i = 0;

    foreach($posts as $post){
        $data[$i] = get_single_event($post);
        $i++;
    }

    return $data;
}

function get_event($slug) {
    $args = [
        'name' => $slug['slug'],
        'post_type' => 'events'
    ];

    $post = get_posts($args)[0];
    $data = get_single_event($post);

    return $data;
}

// Options
function get_options($request) {
    $data = get_field('website_options', 'options');
    return $data;
}

// MAIN
function get_all($request) {
    $data = [
        'options' => false,
        'events' => false,
    ];

    $data['options'] = get_options(false);
    $data['events'] = get_events(false);

    return $data;
}


// Rest API
add_action('rest_api_init', function () {
    register_rest_route( 'api', 'all', array(
        'methods'  => 'GET',
        'callback' => 'get_all'
    ));
    register_rest_route( 'api', 'options', array(
        'methods'  => 'GET',
        'callback' => 'get_options'
    ));
    register_rest_route( 'api', 'events', array(
        'methods'  => 'GET',
        'callback' => 'get_events'
    ));
    register_rest_route( 'api', 'events/(?P<slug>[a-zA-Z0-9-]+)', array(
        'methods'  => 'GET',
        'callback' => 'get_event'
    ));
});