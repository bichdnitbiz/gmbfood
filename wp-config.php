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
define('DB_NAME', 'gmbfood');

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
define('AUTH_KEY',         'wJ*KTixK2V{0 &u>mt;Se7T0:PodvJ[Amt(#LIQBABE0GB/H?e-g^tra] fhee_-');
define('SECURE_AUTH_KEY',  'Ns!>Z&tm!v~WYI9/JcZF!G]dV$alHAkvU={C9|<]JzUsq[s)+ze/sx(wpk?ea27a');
define('LOGGED_IN_KEY',    'n|91J(0t^eUzWFJNc- RtvAdq4{HRp/Z:-&DMC1k04xg}/(^{3T3W&E4f?_$GI~x');
define('NONCE_KEY',        'oEvX&it?2+0^p3`*1&h,f;n9(~Qt8/g#;gtKV>3-|g1BWm~3yB)H-ou)nqLCB9e9');
define('AUTH_SALT',        'MsB@r$tV&xyR>mGN$]4);nFlM%;[V4~2u|mi!I}TLx(1Y<u:]{v9T6LlMFt(@/z;');
define('SECURE_AUTH_SALT', 'T-m-W}thAc8Bt,<u}=KxO)Jb62=o?L~7~5#[=;j;0fPAvaQc4FR|uk}ElkN)vh$R');
define('LOGGED_IN_SALT',   'd[jgC274{M%!:Tm@2l{~_X_dcQ5&1].PMY4Ko*~W4/ ?7>VHK(/H6|rPwo cO5eh');
define('NONCE_SALT',       '.xVRgqZ5*E,DD.) ~2:/:p<55mI #lcxABV5IxepaxmsdDFKDTLjx)?FTjH6N_{z');

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
