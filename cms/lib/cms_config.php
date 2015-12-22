<?php

// Defs you may want to edit
// =========================

// DB Stuffs
$table_prefix  = 'wp_';
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('DB_PREFIX', $table_prefix);

// Enviornment Based Definitions
if ( GEMINI_ENV === 'development' ) :
  define('SAVEQUERIES', true);
  define('WP_DEBUG', true);
  define('SCRIPT_DEBUG', true);

else :
  /**
   * Allow adding `?debug=debug` to the url to display errors
   * in non-development enviornments
   */
  if ( isset( $_GET['debug'] ) && 'true' === $_GET['debug'] ) :
    define( 'WP_DEBUG', true );
    define( 'SCRIPT_DEBUG', true );

  else :
    ini_set('display_errors', 0);
    define('WP_DEBUG_DISPLAY', false);
    define('SCRIPT_DEBUG', false);
    define('DISALLOW_FILE_MODS', true);

    /**
     * Enviornment Specific Conditionals here
     *
     *
     *
     * if ( GEMINI_ENV === 'staging' ) {
     *   // conditionals here
     * }
     *
     * if ( GEMINI_ENV === 'production' ) {
     *   // conditionals here
     * }
     *
    */

  endif;

endif;

/******************************************************************************
 * Gemini specific defs
 * DO NOT CHANGE, unless you know what you're doing.
 *****************************************************************************/

$cms_dir = dirname(__DIR__);


/**
 * Apollo Defs
 */
define ('CONTENT_DIR', '/content');
define ('WP_CONTENT_DIR', $cms_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);


/**
 * Absolute path to WP directory
 */
if ( !defined('ABSPATH') ) {
  define('ABSPATH', $cms_dir . '/wp/');
}

