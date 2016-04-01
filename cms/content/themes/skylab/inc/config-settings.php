<?php

namespace Gemini\Inc\Settings;

/**
 * Theme Configuration Settings
 *
 * @package Gemini
 * @version 1.0.0
 * @since   1.0.0
 *
 */



/**
 * If enviornment is not defined, define default enviornment
 * as `production`
 */
if (!defined('GEMINI_ENV')) {
  define('GEMINI_ENV', 'production');
}

/**
 * Assign Directory path
 */
if ( GEMINI_ENV === 'development' ) {
  define('DIST_DIR', 'src/');
} else {
  define('DIST_DIR', 'dist/');
}



/**
 * Theme Support Settings
 *
 * @wp_hook   after_setup_theme
 * @since     1.0.0
 */
function Theme_Setup() {

  /**
   * Register Nav Menu
   * https://developer.wordpress.org/reference/functions/register_nav_menus
   *
   * Register additional Nav Menus within this function
   *
   * @since  1.0.0
   */
  register_nav_menus([
    'primary_navigation' => 'Primary Navigation'
  ]);

  /**
   * Add Theme Support:
   *
   * Title Tag          http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
   * Post Thumbnails    https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   * HTML5              https://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
   *
   * @since  1.0.0
   */
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support( 'html5', [
    'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'
  ] );
  // add_editor_style( TEMPLATEPATH . 'styles.css');

  /**
   * Post Formats
   * https://codex.wordpress.org/Post_Formats
   *
   * Uncomment to use.
   *
   * @since 1.0.0
   */
  // add_theme_support('post-formats', [
  //  'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'
  // ]);
}

add_action('after_setup_theme', __NAMESPACE__ . '\\Theme_Setup');



/**
 * Disable XML-RPC
 *
 * @since 1.0.0
 */
add_filter('xmlrpc_enabled', '__return_false');




