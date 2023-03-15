<?php
/**
 * Custom WordPress configurations on "wp-config.php" file.
 *
 * This file has the following configurations: MySQL settings, Table Prefix, Secret Keys, WordPress Language, ABSPATH and more.
 * For more information visit {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php} Codex page.
 * Created using {@link http://generatewp.com/wp-config/ wp-config.php File Generator} on GenerateWP.com.
 *
 * @package WordPress
 * @generator GenerateWP.com
 */


/* MySQL settings */
define( 'DB_NAME', getenv('WP_DATABASE'));
define( 'DB_USER', getenv('MYSQL_USER'));
define(	'DB_PASSWORD', getenv('MYSQL_PASSWORD'));
define(	'DB_HOST', 'mariadb');
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );


/* MySQL database table prefix. */
$table_prefix = 'wp_';


/* Authentication Unique Keys and Salts. */
/* https://api.wordpress.org/secret-key/1.1/salt/ */
define('AUTH_KEY',         'q-s0E 2*nJRkbQ70!w>Km6Q%M,;L+wZPf>VtYo%c#zU)W]%!5uI*|X$OfgL}Lkm#');
define('SECURE_AUTH_KEY',  '{A!E!0|R!-_z-.nTd)8Z=5WQA6-C| [MW/Br}gq,O$SS0tFrVXj9XnxXG8L]ADcl');
define('LOGGED_IN_KEY',    'ddHPr~KQT62!swMbHLJO4@M6]%~I{~rrOQ^IYA0~S=2a@4z;evPRuBJ]&$]oD/(?');
define('NONCE_KEY',        '2+7 Am_B6FGTAt28RW//K+Y7,xjI-shC`S1bw#v3E,t9AcqW5ld;1OdG;~j]oni|');
define('AUTH_SALT',        'v,EbGz@ ltjN*3e!>Lzo !X/I%-S-!f&bJV)@M~f01U=nB.%P3wT^;KoUI+dKFL=');
define('SECURE_AUTH_SALT', '|f[G?.R~[AaE8e50.?P4-ex%PY)T?5(Z?9[wM8@+9wv$~F|S$S:(F8 o|xmy.O1U');
define('LOGGED_IN_SALT',   'jXv7)~c]1f)Kfg3AwbK[}{Hw9k3KRtjEMO,xh+oGlI1pAgepXa$p+ }Df#pz-{8~');
define('NONCE_SALT',       ']Ll|oi}xBR!mY,4TsVm& L8{&hj/pm~A3R!FE.:]WWJ|a/+r}h!ZHjJMgir;Y@;-');


/* Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/* Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');