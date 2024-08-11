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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', '2wsx#EDC' );

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
define( 'AUTH_KEY',         'H_p}W8nmZk/4lNU}VD^@iC5dpduX#UO^.d%Lq+:@X=a$ExymhE<ne%h`ZUZ;5ZC0' );
define( 'SECURE_AUTH_KEY',  '}(xC;,%VL1<T9NyK0[nS1_12^WERJ!Z-Nk*%O7PE,F$*${l0#_w]$f@uS2 1`Lhu' );
define( 'LOGGED_IN_KEY',    'X*uDMuk=&V[zf4k:o3ca<LDel?k!aYudg)Dl#/RAk::6BRMZmJr50l$@Ayb5[199' );
define( 'NONCE_KEY',        '}nM$RJLM](f,.cQm(sMFX4zn$*l[YmoOA]e:!eqF|n/&l#j@KtW>OR%OLWB[ybCk' );
define( 'AUTH_SALT',        '>XdIeo{v<@u+fRXO1w#Ows%oys~>V^0)NrIQ|3m HV=GP]3BhC`sV*HGBR+e>d[N' );
define( 'SECURE_AUTH_SALT', 'O|=<trRQ6dg?zHc,gr1gEh+d9%o{vplPt@ve8!:e54h _>|=Y2H]sVZ{IYNYSNEz' );
define( 'LOGGED_IN_SALT',   '+;^4~|NG.Wkt;!5zKx}q| b=t8hFaX`tlS~$I9pw4^1unld,pc{HH-)9NSi)wX7B' );
define( 'NONCE_SALT',       'z=7Zbi~O(bwOY.Km}STN_^bk3<Pu7L!zyY$+~BWh4D@fYQ2^2##1,#`8G,#>mOwA' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
