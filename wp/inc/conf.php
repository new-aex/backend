<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(Zs/:)o/O-hxaqhb;fkeA7GK{uRGX1^0En;#<?;Jp~Hm>2~5b g=t/D%F/Lg-.:]');
define('SECURE_AUTH_KEY',  'UKWiGqlw(+|N-%=0wx/$c?Gdm-+4sDoiVc!9(qwGT(kkW_^x}}}nof96,R,Wr8iT');
define('LOGGED_IN_KEY',    'b+g/}uE$sl=m`-RRY[QK-ni_pY|6$>G#_}0Wtwr^Rv3p2fJWNRK2maY1-7NnD<e;');
define('NONCE_KEY',        '{y%Hab?>j+>9QH8EQ|AH<7DH9ASL.s^zv3/^V4@)~[G7]wh,ulb_vcq#Fm*o9K x');
define('AUTH_SALT',        'JlaOGN/ClV/AA> ozV:sO<rT|[]H:we.7yJ%Z9o[_5!xE|5(3+9w_+0XLt>}]LvL');
define('SECURE_AUTH_SALT', 'F&P}MfuNpJo+nP;p>3oQuc8RL+h|]58+D*<5=Sp/g/O-+W=&3%sFD!JO7@FT6uTO');
define('LOGGED_IN_SALT',   'T>)ChZ(co(o?R}WmLhug3-+}Tf#-KVv66H-{S`0|64rl2qqPSq8@iFNG%~)3_uw,');
define('NONCE_SALT',       ':rMlte&;MO +dHo5ijcR]mpZEkevN;eFu4|qJ^y^P~5@T+iOlMOnl=@_%_{ujDEJ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/***********************
*** EDIT
***********************/

$domain = '';

define('WP_SITEURL', $domain . '/wp');
define('WP_HOME', $domain);


define( 'WP_CONTENT_DIR', ABSPATH . '../app' );
define( 'WP_CONTENT_URL', $domain . '/app' );

define( 'WP_PLUGIN_DIR', ABSPATH . '../app/plugins' );
define( 'WP_PLUGIN_URL', $domain . '/app/plugins' );
define( 'WPMU_PLUGIN_URL', $domain . '/app/mu-plugins' );

define('WP_POST_REVISIONS', 5);
define('DISALLOW_FILE_EDIT', true);

define('WP_MEMORY_LIMIT', '400M');

// define('FORCE_SSL_ADMIN', true);

define( 'MEDIA_TRASH', true );