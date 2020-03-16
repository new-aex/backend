<?php
    


/*
* Add columns to exhibition post list
*/
function events_col_head ( $defaults ) {
	$post_type = get_post_type();
	
	unset($defaults['date']);
	if ( $post_type === 'events' ) {
		$defaults['dates'] = 'Dates';
	}
	
	return $defaults;
}

/*
* Add columns to exhibition post list
*/
function events_col_content ( $column_name, $post_ID ) {
	$post_type = get_post_type();

	if ( $post_type == 'events' && $column_name == 'dates' ) {
		$dates = get_field('dates');
		echo date("d/m/Y g:i a", strtotime($dates['start']));
		echo ' - ';
		echo date("d/m/Y g:i a", strtotime($dates['end']));
	}
	
	
	
}


add_filter('manage_posts_columns', 'events_col_head', 10);
add_action('manage_posts_custom_column', 'events_col_content', 10, 2);
