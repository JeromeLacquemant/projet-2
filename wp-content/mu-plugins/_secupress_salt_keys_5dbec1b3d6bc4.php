<?php
/**
 * Plugin Name: SecuPress Salt Keys
 * Description: Good Security Keys for each of your blogs of your network (multisite only), auto-reseting each month.
 * Version: 1.0.1
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright 2012-2016 SecuPress
 */

defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'SECUPRESS_SALT_KEYS_ACTIVE', true );
global $blog_id;

$hash_1     = '}.dfcKR2idji@&POVcDu[ll%v:4Iz$[U!b|i&/dgd}]h8^_gFEE4VMh,c{Qu1Q68';
$hash_2     = '$]v=r5,b9#?,px<ii%t*))~/v8b.+srVZ>#J/$CFluT}!*h>}doOb;z2G8BSb|%N';
$file_str   = __FILE__ . date( 'Ym' );
$hash_1    .= $hash_2;
$file_str  .= $hash_2;
$main_keys  = array( 'AUTH_KEY', 'SECURE_AUTH_KEY', 'LOGGED_IN_KEY', 'NONCE_KEY', 'AUTH_SALT', 'SECURE_AUTH_SALT', 'LOGGED_IN_SALT', 'NONCE_SALT', );

foreach ( $main_keys as $main_key ) {
	if( ! defined( $main_key ) ) {
		define( $main_key, sha1( 'secupress' . $main_key . md5( $main_key . $file_str ) ) . md5( $main_key . $file_str ) );
	}
}

unset( $file_str, $main_key, $main_keys, $hash_1, $hash_2 );
