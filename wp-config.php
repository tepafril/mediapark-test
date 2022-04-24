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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mediapark_db' );

/** Database username */
define( 'DB_USER', 'mediapark_usr' );

/** Database password */
define( 'DB_PASSWORD', '!i693bLc' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '<v%c0g#;JG{=KFk^,}N?NzgVzm]CQ&J_)Lu%GABoIv9,W1r&rQC.E g!G5v=L-#!' );
define( 'SECURE_AUTH_KEY',  'Dqzb*Z]P9+*G:mY->OIu~}m$BIE,3g@d+/1G%+BUwTs}k#Q}|9uOv>w%B V>b6yS' );
define( 'LOGGED_IN_KEY',    'AzKui]E>KY@jSc=jfw[#4d%t;rZ?J>*WxyUp%bP.A,MU6m6U*]qy4,o)Xh; RI.~' );
define( 'NONCE_KEY',        '+pr^@JAvlzk?fD>HmM?0p|d[|+X~F@N1^?]Ms=gTP!leY|c!.1lFWNtJcWlNnPU_' );
define( 'AUTH_SALT',        '0^B.L3x0Ai]Ebr~&6TEA[v~.]iZS&:Uo(|Vawi7*Qy)E#J $4oy~G F&Y/;>E}lv' );
define( 'SECURE_AUTH_SALT', 'vMQd+eVq!f9QFP.P2[&``q76dBu(4j&k@`Jms,5izZR|U6$$]ZAi^TmO3r;XL?w@' );
define( 'LOGGED_IN_SALT',   'Zi]{L|9&kmGvs|c>-` y5pxlF _Q+2KRqo7Eu9Hq2+[cbl89Z+l>( 3QAajMD5p-' );
define( 'NONCE_SALT',       'O+w.&PHu=.9Js>*`gt1@rG[JT7-1Q2/;Aauk0cVs-BgLhDL68&<Y{zLuJDi)e(ED' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

define('FS_METHOD','direct');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
