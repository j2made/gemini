<?php
// DO NOT EDIT THIS FILE

/**
 * Enviornment Definition
 * Definition used as conditional in theme.
 *
 * Options:
 * * development
 * * staging
 * * production
 *
 */
define("GEMINI_ENV", "development");


/**
 * Database Definitions
 */
define("DB_NAME", "db_name");
define("DB_USER", "db_user");
define("DB_PASSWORD", "db_pass");
define("DB_HOST", "localhost");

/**
 * Site URL Definitions
 */
define("WP_HOME", "http://cms.example.com/");
define("WP_SITEURL", "http://cms.example.com/wp");


/**
 * Salts - Grab some here:
 *
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 *
 */




/******************************************************************************
 * STOP EDITTING
 * From here on out, it's all Gemini.
 *****************************************************************************/

require_once( dirname(__DIR__) . '/lib/vendor/autoload.php'); // Composer Autoloads
require_once( 'lib/cms_config.php' );                         // WP & env defs
require_once( ABSPATH . 'wp-settings.php' );                  // Boot WP
