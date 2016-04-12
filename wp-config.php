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
define('DB_NAME', 'skylite');

/** MySQL database username */
define('DB_USER', 'root');

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
define('AUTH_KEY',         '4G;Jr[`Xjblh%MT~mkn5_^=o$0]on,iF6e~AA%YsWid5eP>[7Sb0,OaymUbpt^SM');
define('SECURE_AUTH_KEY',  '03#,Gy!ip<C@vcOh,6uq7SZ0&D;ug<(eI#z!O=OSJc94LqZE7),XTB)W=l-lEO><');
define('LOGGED_IN_KEY',    '?GXf|~[ZNC((Aw0-CScH.#)J/[()b:KM->;m!HRuQ|yk^NV!%](#BeMpN{(?>`2|');
define('NONCE_KEY',        'e4z*Ix7c!>lheDwRXYP8;I5+*]B+3?762j.}H)%57yB^9K|8s0`%3W>CEJ2Y[_+^');
define('AUTH_SALT',        'KXsX:Fwc-h !.)3:%a|8w7a91@9|}luG5[g6Mj%}S+Co_+[{EnT46?m-z_2!~<jk');
define('SECURE_AUTH_SALT', ':2uWRzf }@_3{fh3wHY40gFST6tD|;]KBK,Wf:UC<clEZk^=]vR5oJ5j{:vCk}g_');
define('LOGGED_IN_SALT',   'es=v${H}G5%Z=-H_<!$IAu#o(kOAGf22/&Jh2&,I?s4@1!:q?U+m={o|CD/cwBxI');
define('NONCE_SALT',       '~vJb|VMASIdRA$anb $t@eb{2!YfB>+Hl-j2zkHUr.W{?sJX^Sg{Ox/]|NQ+4vyh');

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

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
