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
define( 'DB_NAME', 'shuyiscrave' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'b(lM Q:ZNZ4[*/wg`e-!]z?.U,W#I[k|eB2O{f$ *1L/I+SF_)_irg#J?p+.5U?J' );
define( 'SECURE_AUTH_KEY',  'W:Fkt:7N>@A*/T{/9~[|0&-X{9RCpK}}B3*R`t0bBAKcoL*aDS~Se8E4zWzW7E%c' );
define( 'LOGGED_IN_KEY',    'A@c5AQvrY~K={Dru%uwF0rs87F/th6`8%=Jp~M2~_n#Su;RsWny/j<ZvHEn@L|fX' );
define( 'NONCE_KEY',        'jQw$dDJpSG!7$kqO[P}4f fS)ccbD*j#rQ7.9_JdB*cp=b+$QdM7-#7^D+A435|X' );
define( 'AUTH_SALT',        '1qL>savWa+)/$;>/LG]X&D){d2z&g>+df.y<4o;B(Kd,8}z@SMQay3^J?vo_G5J:' );
define( 'SECURE_AUTH_SALT', 'U-Rv{N[S~=81`,H.|&=Q TqMe0U+NCcKv?LtDVA0)m9c`[sY5X`jNi>|ndXNn]k%' );
define( 'LOGGED_IN_SALT',   'OC1Li7w%!/|HC/FGYHvVJ+wYF(XL#E5HvADGtQ;o8]?c!zI~|PuoN`FOCD5?+^ke' );
define( 'NONCE_SALT',       'SnvrShPL]5]+Al}%ymJOz-ew{|.C5#]P2[]gy1Wn#&0l-5rZ[iHY:nH&]i#wN`/h' );

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
