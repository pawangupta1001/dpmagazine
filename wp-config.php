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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dpmagazine' );

/** MySQL database username */
define( 'DB_USER', 'dpmagazin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'dpmagazin@1!@#$%' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ueUS24lL2nnRPFQWdGcsH9tbLHfwO4DI3SErczHUtkxGxuutrKu9366XBY0bNTae');
define('SECURE_AUTH_KEY',  'W6w7fnY9WghydcBno2BGdcBN9hOmhPnxNBtSiTpMFyXZclggDphKEiKCK60j8WRn');
define('LOGGED_IN_KEY',    'DskMTAYA4sGP0nkI1XbQO2Bg5R8sQaD7fWjDDOL3x8ptdUu4UAYyiTS8SWStkCzj');
define('NONCE_KEY',        'PdGmwb0aAvHLcdkA1tITXMiQwlzpGt9CeganIl2ZUO1ujhJXJQDrDbbEkrRMUTlj');
define('AUTH_SALT',        'LoAZRfWwjVuRUQwIlCKB5nocNAUhmDTA15pdF7KfVZMHAhCaEoURSboiQptL1DDL');
define('SECURE_AUTH_SALT', 'MSoewcmy26MMcSWP3OYvYdUQ5FAVh5rdQDObkdK5VEyJsEpmJLPh8nYPhR6TY2tN');
define('LOGGED_IN_SALT',   '7s6LvsxcdlnUHHt7uVfRImfHHPBVTl7Ut2Cxs3K7yu0C8mRkOriJO2t7wIj0By7t');
define('NONCE_SALT',       'kMrKbl6sqxAawytDBxE8VtIe1M1UrUnEhcmfakPflv7Xe5ZXMLP0GCwdpyy38Ajj');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dpmagazin_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
