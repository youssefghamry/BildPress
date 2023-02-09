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
define( 'DB_NAME', 'BildPress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'HR(&W:$Zh=NA+T0q-CV.zC#8Y#9V2[ ~t~Zk7.nES0BZsdZ8E%x%jz&^A]bgiV!W' );
define( 'SECURE_AUTH_KEY',  'cV<Va=i<UH<H)ZZ?J=ZK*(G,48N.D1ORk%KkegNb.)dNEl$.UnvfzN@C{c7@k(qS' );
define( 'LOGGED_IN_KEY',    '9WDv;Mu!(~3((E2~E<a>b<*<.4!c.7Sf,$rb*LU[8u:4Zb^d(+vKmkdpi~84>.h ' );
define( 'NONCE_KEY',        '5cQ $,V]A?t(8F[Szx<LtY)CDi@UGs{D]8))e~$s_lU0lVS5~e8)+W?O(9tBqRnx' );
define( 'AUTH_SALT',        '2#3&t<|q8}`BzH@rmU.^sxi D,aU6o:b5{fRN`:w6-[_qWVHoMiknmE,4jxF:?7J' );
define( 'SECURE_AUTH_SALT', ':QzWBJV3P+D<FG2_dTMdE`M Sc[-e^.G`{1 rTD%yajWyLQU@]~J]<`d~0IT[Ta}' );
define( 'LOGGED_IN_SALT',   'HBXa5R=k2D%r`snB]CdCU%Q~8QN$Bth`S0Ma6@!(Sa:c%ZT{#U%{c/3R]=cT4&$[' );
define( 'NONCE_SALT',       '~<F~qiuTMB=pLqWcB1Zo%Di2RPzia6jh6>XmqZ1eORXy0T*!+%cfLH9!VEgX,RL{' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_BildPress';

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
