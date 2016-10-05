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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '#?j |#7iPr-BmG=O^@t5}y~/|d}YG&pxD0>j:sIf*vyoCA~jd?!~H^!!6Cl+o87(');
define('SECURE_AUTH_KEY',  'HV}@q^/G:db]{dYE`)jT5y(?8V$?DG>5<;oB|zRfrm*EX{!_j.SsQaw!;z7Uiz{H');
define('LOGGED_IN_KEY',    'FIl2JK76-kM(~,0E&cWMn>]6<N L%Ry.Z*im16kJF=%ab%kvc NR_bNQGD>WPRTy');
define('NONCE_KEY',        'FnV$mdnWq_!Rb@l]^0|h]NJ+(3NI<%|x~TD#Qoz6uY~BzbKCQq{L!KL8yL@rJqX~');
define('AUTH_SALT',        'N/^jb]tSS6P|40ouV[2*z1nYr-W gx@87.oE`Q4ylh2B5m] 0dSuxdF?kw:4A/w#');
define('SECURE_AUTH_SALT', 'gIRng[iDtpU0RNKT)xKLz|OV^az!We(-cTNfM;yxE3)f/&INv/s5UW#sbe%p2`,b');
define('LOGGED_IN_SALT',   'F[xy9=K)~2dUHmD$e#fta;nYE~:d@|jJAv_KE.T{To49BZ<-o?<jQM^bBiJHf+ez');
define('NONCE_SALT',       '5a7czb8@1Bg3EV!Km4Hg^uzz^/+^)#JPOW]=2Ck^Ja)NII7` +jk98ut$K5{$RMj');

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
