<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme initialization
 * 
 * Functions and actions needed before anything else, initializing
 * admin functionality of the theme.
 */

/**
 * Unset WordPress cookies for non-logged-in users
 * Any users who had these cookies set before we tightened down
 * Varnish caching will keep getting cache misses until the cookies
 * expire (up to 1 year...) so we pre-emptively clear them here.
 */
add_action('init', function() {
  if (!is_user_logged_in() and isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
      $parts = explode('=', $cookie);
      $name = trim($parts[0]);
      setcookie($name, '', time()-1000);
      setcookie($name, '', time()-1000, '/');
    }
  }
});

/**
 * Add support for post thumbnails
 */
add_theme_support( 'post-thumbnails' );
