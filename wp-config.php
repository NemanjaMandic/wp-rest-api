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
define('DB_NAME', 'development');

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
define('AUTH_KEY',         'xo)xLAA0$vX]gS/@5BukwHgV^ Eu=9OZ+{;Zf3=GCpa%-c6IV8z/9v^+gr]cM&~2');
define('SECURE_AUTH_KEY',  'Kv`U#%EJSp}R?lsr:B40X,Zu@Ga=DkWm3&?i/J>bG|spPH]u)[K=:WJCR2-mT~#g');
define('LOGGED_IN_KEY',    'vd~U;.x^9>zCq+-G.T#iTs~oM0sIAHxpO7pUpIp#sCC]C/c# lkkrXo;Hx`U(Mxg');
define('NONCE_KEY',        '(;/<@wn=a2dG]+)sQQ>9ViOsXJk1=c@qRmg+jF_?>1vByJ@+*].)d8I3CaIauKY7');
define('AUTH_SALT',        ' D:sKz8[/(<5]3fZ;V`^1^c`QB#(/Qa:xz%~rrv dg~q}@Q%+)3r[s&&1J,!@}De');
define('SECURE_AUTH_SALT', '~S>;, F(|gSz;]=uy5+i#3sg$,eI GyPI(P^t1I|5~K{ekXax&qn!P8tO<9/OM h');
define('LOGGED_IN_SALT',   'bco$Y@kCX?n{.=dLFy(/vD5-%gM,Zr|gJUR8pE=Z=FH2n*R5SeaUV?U#u2ataAx9');
define('NONCE_SALT',       '<f--0JYS:RUP1NHj(==fgiOYL8x,%BhBagJC_/6^NGVuiM@N/p!i?|EL=](d7Sv1');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
