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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '~xipwrs:PZ?m(!uQKbs-O/IZORU`mwG+[f%K$M@LR43:7ZWZw~]|J?wS/aKk`]9(' );
define( 'SECURE_AUTH_KEY',   'AO[J0jZ5Q8*X a+882wAgfv&@+uBw(F,ZB:+/_faYYjE](9gge>n8T;hwDa1v1i4' );
define( 'LOGGED_IN_KEY',     'KW9a>=a-8_x[R4c50@~sOPdeUz{<g<o8LS@YFbWE#g4GKu,gaY0UAPgjv:;AV/|O' );
define( 'NONCE_KEY',         'lJ~g;R`d5p+>BzK{W)hd,OtCA.BX`V}$vhv_:o^P1Hx !MeWoss-`WmGZZ^I H:g' );
define( 'AUTH_SALT',         'J>*-l&+l)YCc}VMmV)rG5tj%*jl@!G74C~r?JG)v:@Xb/jU3..p^ubWE&:hJW@w}' );
define( 'SECURE_AUTH_SALT',  '$w/tDg^|E`~Y?@5!R][.U7fcVfh1Nsa?GpZRX.<zzHAOFcLL9Q;SIHu_ou1)?RC[' );
define( 'LOGGED_IN_SALT',    'qk>}h=P4: 6NUc!AS/:;PO6.^sS}(YR/+XUQLSPnq&.Mp2fd&(K/|y,A;#vt^b F' );
define( 'NONCE_SALT',        ':jA^t|hVR8V#-X$SbpE5uvN`!B#HWVWO_=E|RSf~MLrHj7VZj;JW~d6!!e)_HQIu' );
define( 'WP_CACHE_KEY_SALT', ' M![,t,A7?YwokB9eBxJ0xWC+YsfpIFpMQ9m@CETt%k.|8Tk<+hbbLgu0@sNP-U1' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
	define( 'WP_DEBUG_LOG', true );
	define( 'WP_DEBUG_DISPLAY', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
