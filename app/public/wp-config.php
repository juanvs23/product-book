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
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'F:\user\Local Sites\produ-book\app\public\wp-content\plugins\wp-super-cache/' );
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


define('AUTH_KEY',         'gPFAkENBvNUJsF51yColXsWuutaYD6afJLy/5ODNv7j5oZZZQv4/mX+Gnnz8Q37jJKjROO4RyDhs9wMFLtV5yg==');
define('SECURE_AUTH_KEY',  'N6QwbvwQZGPUh3nC/cGqMUZ4ClJf2w68ApRmH1Jbk5icYbazcRQ3V2NNapkREIym3werMNqvse9VKKU86DdMFg==');
define('LOGGED_IN_KEY',    '6OSBW5u5SWy96YWv8QoEK9TlO/LW0ZaS54/yi6KEn+ioBR2Qcb+/BVWmd0rZxbRvWfi8DGyykITT8awjhgkGVw==');
define('NONCE_KEY',        '3nzklP4T+WbLF83+5p459KqPtYsCXVxGGzKOiiJmpgh+IGqMWVBgkE73ux9mwrG8AV2bpk2oS7QdUZykox8T9g==');
define('AUTH_SALT',        'FKRNRL67YX2wiNXxBKamOknRKAR08rZb2NVgSBtOgtRhm+N6kcr44HU1S1g6l92O8lZQSr1BqNE20SYA5Bveaw==');
define('SECURE_AUTH_SALT', '1IVO4YY0hGZpNwIh0ON1CYngUBk+sU66aVP7GXVQaXlnTX9n5sOqFe92ZGAO/hZNvRs5aOjqDeR6U2hJSgjnqQ==');
define('LOGGED_IN_SALT',   'rs+89SMAZFkh1VGOQ5chI/ms6cpymTkOjBeqXbi6Z6oairue8bJa74bKHd/HGEK3IyBzQdfc0XgQVrP8+z7SKw==');
define('NONCE_SALT',       '7QcGgl2JIn8w6hJI8j5A/u82kXGdehoVKE8Tgg0AGhVB4JyybxTsrU07rityc6VjeQOWS47mLE1qV+FvCsOnKg==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
