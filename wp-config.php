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
define('DB_NAME', 'AbilityTrip');

/** MySQL database username */
define('DB_USER', 'rob');

/** MySQL database password */
define('DB_PASSWORD', 'jimijames.12');

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
define('AUTH_KEY',         '/z2}.3r]xTsLXNu/Y>,/_J%Dz9$%ao-J+p2<9G}b*XRc.THJRzvC{2f% <|5Q.j0');
define('SECURE_AUTH_KEY',  '#HiNC%~8JgiA*5%j=Pbz3[7QxrA!})MK-{!t%KIhWIe+`+zmndKe;bc#kFC%qx7{');
define('LOGGED_IN_KEY',    'iN7Zy,Oy |F88rls*QY(JD;2O9UXy=nIdd{8bfiSLj,O2+wh[MsfE $NcyOH-8U^');
define('NONCE_KEY',        'G7O<A:mZodGnPUsdo[BKX@m`L^I+(mEEOCY/EJ)sHQZ}=dTpfI@Cf0;<0r4>1)YX');
define('AUTH_SALT',        '2dRqlOy.%8F@HK,eI)zS%uYhmh+`w% +euR(mw&J|bDm(j*Cd^L|P` p]ugCmw5b');
define('SECURE_AUTH_SALT', 'Za5j]g`y}w1Qy+2x++j&2+O5<.tlm8/W-ld>#-Vpe_oX&dJT_B#@RolAk0 ml`-y');
define('LOGGED_IN_SALT',   ' L:@OTxWTIvfL&7zH7uT{q-T .ZbXHRLcsYe6N*%V3p4+`>0aa#z.NO 2Fy%!k]k');
define('NONCE_SALT',       '|C7^k0<<&6`;lVX==vsIH2NM5<(p]S[m.s)~tPR~mc`Z/O1a^F+mCm11<`cZo?<x');

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

define( 'WP_DEBUG', true ); // Or false
if ( WP_DEBUG ) {
    define( 'WP_DEBUG_LOG', true );
    define( 'WP_DEBUG_DISPLAY', true );
    @ini_set( 'display_errors', 0 );
}

