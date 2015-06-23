<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'okebrok1_wp1');

/** MySQL database username */
define('DB_USER', 'okebrok1_wp1');

/** MySQL database password */
define('DB_PASSWORD', 'Q*n@3E5Uqp27(#0');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'YD159QSNnrBHZiwklXkFWKI8rR4SNDOjfcHNgwQ226NVoLuTF5ljFyQCwq7NhcMC');
define('SECURE_AUTH_KEY',  'y3pB9O99O84PJ8DFlh5vQ3FNt8mKDyZsCdfUx365h2tpcsNzI4IKmyQAhMtKIl2Z');
define('LOGGED_IN_KEY',    'p7rZdiWXq0t0H7Icpai4Er8c6XV6p2prwJYYmMk0QbBcMvBh4L5xXZ85CARohkHl');
define('NONCE_KEY',        'aQAINRndFcv2k44Pdz1xPj0plJqcKcWrh4faT4OFbDnf24XVYLETOUFdRu3hHDXz');
define('AUTH_SALT',        'cnY4qI6JWCHELiyWBypbE81dVZkEkT2SoghNb3mF6wQRQBGYl0U1ZNVwsn8AS4eF');
define('SECURE_AUTH_SALT', '1zFQ8EQ1CJugMABzMeSDl1CUSM8bXpHk9Ytf3eK28GJa53kXh1fJL4r2oVl7UbTn');
define('LOGGED_IN_SALT',   'UQwjqBm0zjUGf338tXGmMdS4TJIywIhrg8b08tY7PCa0D8A7kCh99UHWoGIX8tx9');
define('NONCE_SALT',       'fFzc7TEzxBCc4HDl5xBs8l2Nn4btfNQX1JIoqZBJp0BeOdsbFmh4FWQLl94e3QmQ');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');