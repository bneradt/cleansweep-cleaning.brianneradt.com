<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

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
define('DB_NAME', 'cleansweep_cle_2tNYubHw');

/** MySQL database username */
define('DB_USER', 'cleansweep_cle_2tNYubHw');

/** MySQL database password */
define('DB_PASSWORD', 'M6ReB9RA8Vx4Q');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+

*/
define('AUTH_KEY',         ')>^+^Q%c<~XJ;p@^ui[iXOXt19i:Q4kyMyv41&#Mui@cLPb2LmUO2c4$:s@RFRu7');
define('SECURE_AUTH_KEY',  'K~9O$:Zz 0N(uESs|FgYH]7FYYw{w<HYxi|L^TpkO@TP`-p1r{()Rrf-G$.e62@^');
define('LOGGED_IN_KEY',    '1^tjR0:6`CS|}2On,TbG1`* p-X-adbU5SF).IDZ,xFdaRHZSCd1INjs#9J.h|MV');
define('NONCE_KEY',        '}YMYN{$zAFLg9`i|+)t_SJ|Mo~o{,KbCgWGbVM.B)z3mD0+ ${<F8En_]Y2jk*Hs');
define('AUTH_SALT',        'ZNm[M*+)7E(,UeI?J0mypD+FnGB=c!R+$a[?wOQ(Bs24Y|d$5y.8rA2uH&QSQ90E');
define('SECURE_AUTH_SALT', 'mrLF-04~oN25ZD0)oS*^}C(O_J$g?C)dJ{I)$Id,piJQb3O?-7ka8PG{&gHME6Cc');
define('LOGGED_IN_SALT',   'CrJI*$Ie1Zq~UB3~GI~wOr11:Nj bw>joxWx[c021qw2C@AHw+E4tkN3sT=KR>UN');
define('NONCE_SALT',       '|x#20J8p!?PyfF2g;N2dW5EnFdH$z%/NBB$r8(oAa]xp8LS2=7{cP;GJ>R[+1]]T');
/**#@-*/

//** Custom Settings **//
/** Set default theme **/
define( 'WP_DEFAULT_THEME', 'blueprint' );

/* Turns on auto updates */

define( 'WP_AUTO_UPDATE_CORE', true );

/*
 * Gravity Forms License, Public and Private Key 
 * This will automaticly add the License, Public and Private to any new site.
*/
define("GF_LICENSE_KEY", "057a2645229bbdf53dfa94e0b4a2822e");

/** Define WordPress.com API Key */
define('WPCOM_API_KEY','b0a948f2f59d');

/** Define AltText.ai API key **/
define('ATAI_API_KEY','6aba74de010c74f2b225defa0104b1ba');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'msh_wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
    
    if ( defined( 'WP_CLI' ) ) {
		$_SERVER['HTTP_HOST'] = 'localhost';
	}
