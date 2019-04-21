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
define( 'DB_NAME', 'test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'O] 2f-}lv5tw|3;jtr+PB]?]BmN6v]lKIMc436 a_LM&FplrOi-Xd~bCq>JkC,t(' );
define( 'SECURE_AUTH_KEY',  '^?Jb>^LH0tBA:C?3v2%X 89@!a^]]|r_xvpY^e13$PeF!5@x^0p4@OlFV?d_?x0y' );
define( 'LOGGED_IN_KEY',    '&3AEo)/P!OevPRU3Q3f ]/9w<4(Yf+-cUia6?V=8Ph;Fd[gp)3NC/yv_;LMC}M*g' );
define( 'NONCE_KEY',        'su(xMj@N`4EM.|_;)f.@:s/B+s.GS<PYSK8CV{.[@;daGv=J<ZB+X.4<R;S2^.^2' );
define( 'AUTH_SALT',        '|Y6Aab-=M$>YD!k@sc3w7@t3Und?~rp!5k8,Vk W[zOz1?k+oo*:i2sih@6os`;D' );
define( 'SECURE_AUTH_SALT', 'P{Wc/}mQl*z5k)|HW(UV4GD|c9j{5Y;Ac|XZY8]79UWEp.|PvO<x@zt^L2iR.yK/' );
define( 'LOGGED_IN_SALT',   'fC&&BI2dFLQokNLr b:Hm*}Km,?:dYT{.>HYufe1_:[I(f(WW%<BW.!y$%/WnM8Q' );
define( 'NONCE_SALT',       'WF#fOgLcl:@sVixP,}vSXSN#R>LAJ_UhR+[3Q4kBjDmggS$]O<D%@ZI7Rz$bTS.L' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
