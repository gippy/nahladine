<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'famufest2013');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'R0l4nd');

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
define('AUTH_KEY',         '/208l.JWT`PcAsHHeOVy)UY!rLYJg]D<6q?3b-p)%O,Jrj7zO0U~G]KXVM{H]oob');
define('SECURE_AUTH_KEY',  'hB)ev|8|@u~&BV-eNkmOR+8sjojU7XN]n/XpRmT!TA+Ax@r&Ib/3ogy}58k>R/Y@');
define('LOGGED_IN_KEY',    'N.Q6vJ2{O-y%Lx]Dea*9P7-K./ql<wenRn 0]r#bi^O|8C`W^oE/Q4.8z%ZB >,7');
define('NONCE_KEY',        '}Mb][:]Q=(9QbRFDP UswK9XB4VZw.m38C,{w;CBoa |cX)iAqC>!;s,/t(z:+`1');
define('AUTH_SALT',        '32A`]evw/] 8<^0g~B`^4SJ:Yt0fmRl}V;Lwne;:>a.?!`YT%ROZr_#F?fY;ntb*');
define('SECURE_AUTH_SALT', 'Hp2WkHomUxH}E^@7K{FR=jFO[y>N]MgW-^4}+<qmPngq^9#{B??d9ZlXu>@q8G?6');
define('LOGGED_IN_SALT',   '+;+dX>2vc61Z)S-s=X Y9eB{g]xcQ}~8/NKp|nbOu55/w#8q25$yH)nSzMf_C,5:');
define('NONCE_SALT',       '_N:r`smw,A3#&G6kme @NV3^+ywl7<VooY GW|r[X*soRR2-@SVsa.g5){hESM)p');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
