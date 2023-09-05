<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'rm2GgO7RZNLUjjofSRTTPcGuAnpy7+QvJ7fjdCaQJHIv6896vL5oG4B9yqWuBYQtKJuylLvZhz4F/8MTI3Mx1Q==');
define('SECURE_AUTH_KEY',  'tBqHz77wk9u6O8ZfW/C+/KrdVsui12YDNPc1+4Ii82OWpTAAir+8mtRNPrKmJ/093pQnFUc/S61xjl1wo5vLAA==');
define('LOGGED_IN_KEY',    'MortwCKkFTp8cvRBk0meUxzIsv3wbIBRgVY1jzbOY2YIvZL/Au6/39QPV6kFYWEOYvtDfs0f1ycoJ9F8rMEbtw==');
define('NONCE_KEY',        'BoeDDdAv6I2tzAzJyDJ3yW1ROfeDFIZzYJ1TK4mLQI2IcQ46KEDSUTgDHC1ZqC2fyFWpQMMEW/Wp1l7Zed0Yaw==');
define('AUTH_SALT',        'A1jYZdl3S59hyjGD2j4JoPDwwenirYvhRCStUQnTUUBULD5Mug9QW7tQ8vkIz+C/oa6S2trmX+jzF+E4gw2bVA==');
define('SECURE_AUTH_SALT', 'AUEHGwQQRXWORpw3bQN96Drntg4sFB+I81uupRO7iiqiNXM/hpC4P+nMhgzptdiMww/o8L+p7cVDHi94uWNxig==');
define('LOGGED_IN_SALT',   'aQtIYvUcQF/NRDY6BrkwDtKwAjzcayql0InbTGSWTV5nkEOt4pSh6kk5MzW8cz9mwKwlkvq2SOqU5fcDHThXkw==');
define('NONCE_SALT',       'K9CyncSJGTa9EEP/9SA+hE6xrNalWqnksTicwvLnurpAC4FbFdQOn4URt2HGfZtyxuAnFlMxa6YueWpmiajiRg==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
