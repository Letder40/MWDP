<?php
$ip_pub = "ip_pub.addr";
session_start();
$logged_in = $_SESSION["logged_in"];

if($logged_in != true){
    header("Location: http://$ip_pub:8080");
}

/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
