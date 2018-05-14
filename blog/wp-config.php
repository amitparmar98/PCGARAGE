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
define('DB_NAME', 'pcgarage_ci_pcgarage_blog');

/** MySQL database username */
define('DB_USER', 'pcgarage_avis');

/** MySQL database password */
define('DB_PASSWORD', 'AbasesFrizzHadingLynxes61');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'BU;HK +ha%;3h&l!:#JWNXcf1>q(HYeE@9{r~qu@=^{Bqc]DPOk`=:]_/}%<V0>-');
define('SECURE_AUTH_KEY',  '?i7tg/J$X]w)C5ZexRs:R4o`G7Jc!Qn!0l;$@>q:{&A q4--t:]ZT!D] x2Y$Mby');
define('LOGGED_IN_KEY',    'M96{!lzM;N/)!,+wVg~4T$cuIPMwxSeyIrJOQciH2h7<e~c2R`7QBWzQ@Tm])p$(');
define('NONCE_KEY',        'wQuf7i_po;lH6pkL-V`L!*pIu47snI|)+u>9oOwbFj;c/,4-}ryBj3wMt?c:49}t');
define('AUTH_SALT',        '$(IbZg-9}_rw56J#^P9zB=0{OTP5N)=R@^=0rBa*km&F98BwjHo].@%=rRW^N,[E');
define('SECURE_AUTH_SALT', 'C[J Xfj?Xl)~OI|I~U~&Y$PkZ`rC$}3m,w%i[HJo@i8vd){B[Gajo8tTFr7+D7<p');
define('LOGGED_IN_SALT',   'fNE48Nzx>[z8=U6 *k8.YiptjuhMKB9{DMI&epm:QE3_FgyY@`@T$lVu&7^VfvF<');
define('NONCE_SALT',       '^=~0Y<=RFg+SThkkhx!(M6UWvvUE9jN$_dFYbL q@=xo_$Hk[~Bb%Q8=VmQ:]ey]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
