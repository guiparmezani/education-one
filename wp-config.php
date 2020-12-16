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
define('DB_NAME', 'educationone');
/** MySQL database username */
define('DB_USER', 'web');
/** MySQL database password */
define('DB_PASSWORD', 'web');
/** MySQL hostname */
define('DB_HOST', 'localhost');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', 'http://educationone.sites.parmezani.fmaustin.com/');
define('WP_SITEURL', 'http://educationone.sites.parmezani.fmaustin.com/');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'I^wQrC}c0p}aF_4!IzQ5OtbNM*dVTmvgw6S})EoAir^mq2|7YpOFZ3?Z:wT1ExKK');
define('SECURE_AUTH_KEY',  ';BjbGe9!RG7%342_FU&!#1!^%eV r2$C7!<u37R_VUQD$9L@pj4@bHn3`V6LFs++');
define('LOGGED_IN_KEY',    '}j<WBP]Cl{@X?` |3zAkLQ&!NX*?J7*~1Xj=@?,(-W:]q*5>j06VWDuo!zxEt]|g');
define('NONCE_KEY',        't0~6gAw~~HH3H^G=c0kjeyi/Zxa PC^.^Oc7X;5DrbpZeC|Xd[7b<JU4W>Iiqx23');
define('AUTH_SALT',        'X8AI?/!Y4&S|yw9>1CR9CNa=N4{r}%S$L^gF|a#>Sk%_ZC:gkS=BFtD>CNycYP~,');
define('SECURE_AUTH_SALT', 'T_eK.X%{,Z_95lc5kaK$sE4@i?1N7d7ZM8P[WHWsOxWOjbXtyaT~=tYycTk,-?jO');
define('LOGGED_IN_SALT',   '={D/!yqT FN/LCACKNk]E:8#!f,DurK@Y@D:z<m3?sF0e.[si!g@AIv!-]*V{=3B');
define('NONCE_SALT',       '*U>Lt`z(;q(z,7,79NI{xa?$nu&Cv+8iB/F]cZFNB}j!z2y+O5EeI]gT4S~,7q4}');
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
