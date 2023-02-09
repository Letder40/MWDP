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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '122109F' );

/** Database hostname */
define( 'DB_HOST', 'ip.addr' );

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
define( 'AUTH_KEY',         'J}7&80l!L93x*z>o3zSImWSTi&v=Ug;;vI>&FbC]oDwf@33!!0?jer8!YSAJ`(;u' );
define( 'SECURE_AUTH_KEY',  '~JtTm33DtJ2~P%Xjv<57cd$I04%};&v~.u cKSV6AkRXHMYq)b_J{2h!XY_7-}D*' );
define( 'LOGGED_IN_KEY',    'pLPE60(vk{r W7`o~BfS}NcO)4B(ZL4N%f|PBS`1phN@/)n)G`ut@}+EqZfH-EP0' );
define( 'NONCE_KEY',        '8;<_]ZA<mQ8Ei)tT/9Gj-f9c|-57|&? 5noM%WxgGdr</}u4:Ad^:`DoKCz1</xT' );
define( 'AUTH_SALT',        '*`H(tHW)Eq.AEP)JtZ.A~0#Q~h1no3zjxykJA1Y7OMo$d}@srKSQW~W?f;Mr4O:*' );
define( 'SECURE_AUTH_SALT', 'L3qR:BqwX!@_b?pFZnR7m$F]/n:S$W$~BxryB#qwH@u]I%b 7;L9Yg<4Cpf(t7v^' );
define( 'LOGGED_IN_SALT',   'E!wYI%O<14>{e,6<yFXMiiu=>.AI|pGP2Pmt-:BR1mMn1E:SU*Zl.UWqKQaagK*3' );
define( 'NONCE_SALT',       '6G0#^$DhNZP}t/Amc/,4z/*iO^po/7gvs_F7(Me.ZWazB3s,v-QY$FwC67qw>vU5' );

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
