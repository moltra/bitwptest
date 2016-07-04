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
define('DB_NAME', 'bitnami_blog2');

/** MySQL database username */
define('DB_USER', 'bn_blog2');

/** MySQL database password */
define('DB_PASSWORD', '5421283f19');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '3adad89b195df1a3d9480f9bdf4bd6a82544e800e521f5e52c660007b16fb12b');
define('SECURE_AUTH_KEY',  'b2eafd388ba95a49a0ae06a5f61b89ce7476a30dbf5709f79f6c38444bfb3ffc');
define('LOGGED_IN_KEY',    '4d5f341b7f4886e378c06d95a2fe77774a4fe971fb2181aa4d0aabd4c6dbc41d');
define('NONCE_KEY',        '577bfe88e5caf33e81a115d489ea9beb95ff233cda249b301fee94af70564f9b');
define('AUTH_SALT',        '9ae94a8f03c13bcf4b674206c73b008040a34046338924241886bfe21a5c12ce');
define('SECURE_AUTH_SALT', 'a7acc91ce3ba4ac9eb0ab4f93598b85490a93afb3ba8c94f638adef49cbae28a');
define('LOGGED_IN_SALT',   'de4fd099f18099fc605ba1675e8165395f63122e30d1a4c7da1547fed94c832d');
define('NONCE_SALT',       'e20fb5dbac40c43c7548528759aac4bd4deb3175067ba3c822ae4c2ee2659c8a');

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

/* That's all, stop editing! Happy blogging. */
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
*/

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/blog2');
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/blog2');


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', '/opt/bitnami/apps/blog2/tmp');


define('FS_METHOD', 'ftpext');
define('FTP_BASE', '/opt/bitnami/apps/blog2/htdocs/');
define('FTP_USER', 'bitnamiftp');
/*define('FTP_PASS', 'bitnamiftp');*/
define('FTP_HOST', '127.0.0.1');
define('FTP_SSL', false);



//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks
//  More info at: https://wiki.bitnami.com/Applications/Bitnami_Wordpress#XMLRPC_and_Pingback

// remove x-pingback HTTP header
add_filter('wp_headers', function($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});
// disable pingbacks
add_filter( 'xmlrpc_methods', function( $methods ) {
        unset( $methods['pingback.ping'] );
        return $methods;
});
