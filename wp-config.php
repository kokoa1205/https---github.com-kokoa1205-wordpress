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
define( 'DB_NAME', 'wp_grazia' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:8889' );

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
define( 'AUTH_KEY',         '<ggD9VVkll{JM-`,|5/NCOzS>[Jis1j`?HepcP;P(46QT3d<sj_gicK@EG3k4-(v' );
define( 'SECURE_AUTH_KEY',  'Ia|v=pryM$:rhE4=Gizb o_^NyNqjTx>9s.2u]-J5_4q[ZZxN]#y0^u)hzp#:@jT' );
define( 'LOGGED_IN_KEY',    '8c&.EK,=JU;/yjFsXYc6 |g|ocn,3#N7`PWNc`qX4e1Ok.A%E=E5uZ&@CzVh7rC@' );
define( 'NONCE_KEY',        'q^9Uu^&0;uqROSZZaz]Y=-@v(T~J[~SMp90;mI<SGmRDz!3uMiG!AYRL.*Y<l@G<' );
define( 'AUTH_SALT',        'o),OdmEHCl6qNI99XK*13,/x(Y65xJN=2aHw1FK5-tNAN,:{ #y{0Ze+GZNEN()o' );
define( 'SECURE_AUTH_SALT', 'SI_,pmMn;dvV)/lLu<0s+G8|I7MwMN`raw!0Dgrs9b^`U7YFeQ&,-y {JZsJM:M^' );
define( 'LOGGED_IN_SALT',   '9![JkcO~S4~#e,VY~qst44Sh:@!85NM}}7qr+TJO35wF6MR_JjDm/U+x1+?$q<j^' );
define( 'NONCE_SALT',       '.<azt4;goxLKBY%&K%4W<8}%5lVJLQ3D@aTY!?.&57;892`A5Ws#$7t#Ev(]ZFei' );

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
