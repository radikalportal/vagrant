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
define('DB_NAME', 'radikalportal');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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

define('FS_METHOD','direct');
define('AUTH_KEY',         '([K#?N@KvR%HM4g{@y=YvpUd)`_i}eK+woiCV061e)u`e0bZS(HG+)3{<;cNcf5b');
define('SECURE_AUTH_KEY',  '1XWT{(4m=u#Htss6}r=Z{ff}>3dlEf(y?-gIR:6;Zd m%P|+i6~${]F^arKQvVK+');
define('LOGGED_IN_KEY',    'lQ8K8m#+W^s#({=|=?-g1_y|~s:xMCJG&,UCVB!Y}Zxjx*00No2LrBu84wE]?g_3');
define('NONCE_KEY',        'S!#4A|yp0X0YAAP=7!Cy#yv*=v@@o$F_i%f-<3M>7cis2>|syS^^@XS[M5sb%k $');
define('AUTH_SALT',        'aQ17uO`j~S86`B4S0-Y-2f.22NZ&6.FFM=Y>:DYB8+2AO&t17<xQlB@.h2HQt~c>');
define('SECURE_AUTH_SALT', 'e1}Rac.E|_>&b0iu9nl_Vswz-0aC4r )QpOq=$5T%:cGp|%11IQR|=D+Y(5nkL|g');
define('LOGGED_IN_SALT',   'GH)D3x&wH5Log9iw|pPiY_/nJTRKPsRe&jT1?sGS7VTAN0kN]rk] c+,iyZ tRpX');
define('NONCE_SALT',       'RX0HOxG{v0]@+Ra4-<S3E{O mX?1bq<^S=Q3oY:uHJ5]bfnoz{fy^v+9v#$Ikb1!');

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
define('WPLANG', 'nb_NO');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

$envs = array(
    'utvikling' => 'http://dev.radikalportal',
    'produksjon'  => 'http://radikalportal.no'
);
define('ENVIRONMENTS', serialize($envs));

define('WP_ENV', 'utvikling');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
