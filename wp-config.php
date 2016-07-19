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
define('DB_NAME', 'casadopao');

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
define('AUTH_KEY',         'GQY#UG8.E]r,*B-En4O{8J9#DHSzMo2f]>DKm8T<U9SH9z4RBh;QqOdf9d^G$ ]M');
define('SECURE_AUTH_KEY',  'w.C]V|  3Y_=O;L4@ANveA5t4d*s_S9dqsug%=Db5LJB*F_u(H)e*EoH,y$m=Qac');
define('LOGGED_IN_KEY',    '<f8<[p{88q+c7,Y*(h%+srB|*c}*D9X@gbJEG}e*BAy%,,~:8Tj:EoZ&7FQk?Y(2');
define('NONCE_KEY',        'TN.}K5jB[1lg.ln>[<P]6`-<dD6ez%.CnhQ4>g}/t!rW9^CG^tq6:S&V`I:|qD)s');
define('AUTH_SALT',        'Hq5SV0Tf&&z<J|Ob[};hikD-D1Bmx/Z%/]g1,{_R!#Gg}fWG[o @ZGW:j~t1z(7,');
define('SECURE_AUTH_SALT', 'gN=w~I$s{MdT-BkQML_;G>wC~+QJ{qX(E)9ot&c?S&4aI1Y b8BIV[N]{749^?4~');
define('LOGGED_IN_SALT',   'R90a;EqE+9AghvslrG2r>?<m[E2yeDu(`p1Y[;4V91lCIl-3JrFO)zt(JYL{yTx3');
define('NONCE_SALT',       'p#SDva[teyUW](??n{DfVtfi2Qy)CK:pVcDzRi&ex8H/{9H(%@L{YX7-+7:Q=ZN7');

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
