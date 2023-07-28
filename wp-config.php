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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'music' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         ']x>u.{&V05[:&0O9{A#69J0UT*NzGIXk13~qg{$^TMDG2{/9^&|/1o$-rZ/CN;zM' );
define( 'SECURE_AUTH_KEY',  'A#]2Vmdk1_l<_?U)>VdI7Ma&9JA5%0WC<#R7B.{8]^:mT{4I@x?.iRH9,XBi9c@^' );
define( 'LOGGED_IN_KEY',    'w`o=lnR%TN8>%_7!i<*J)I_0*JoZ8M%wMO+oGymD/&;6KkLtgA5S?$zZSc;9Nv`h' );
define( 'NONCE_KEY',        'S_tY67Ca&;v_ T5nPiZ?,m8XB/xI/P|E%d|aXPvh~]avoh+fTOMYo{+}GY[FzJ6Q' );
define( 'AUTH_SALT',        'Wd(@,mD_mr-AK8]3W*S:f`?C.noV#zrG-n`%UnSxXN`QEG]cw0)mT&?hV*yRZ{#S' );
define( 'SECURE_AUTH_SALT', 'L_xtDr{m^Ne/.C4Q~t/V$tYd&,3-mqCm9I#!i*D[BP%178 JRKc8!jN^K&Sg~gd#' );
define( 'LOGGED_IN_SALT',   'xU1G8@3^Zo1,wxH=5CbgkP=zN/s:*LscpAP-c)[xgy!}p:nLTNkN3zMykmA99& =' );
define( 'NONCE_SALT',       'MgI2P|<N-`>S8])m9%(`<4v!A_wsg.u/-FO+QQ]6g5mm<h JX;A!C_156Pl4dDI=' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
