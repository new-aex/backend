<?php
/**
 * Theme Includes
 */
// main stuff and hooks
require_once locate_template('/lib/hooks.php');

// etc
require_once locate_template('/lib/custom_post_types.php');
require_once locate_template('/lib/custom_taxonomies.php');
require_once locate_template('/lib/custom.php');
require_once locate_template('/lib/acf.php');
require_once locate_template('/lib/forms.php');
require_once locate_template('/lib/admin_cols.php');

//api
require_once locate_template('/api/api.php');