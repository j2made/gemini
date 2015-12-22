<?php

/**
 * Enviornment Definition
 * Definition used as conditional in theme.
 *
 * Options:
 * * development
 * * staging
 * * production
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
 * Should point to the `/cms` directory
 */
define("WP_HOME", "http://gemini.dev/cms");
define("WP_SITEURL", "http://gemini.dev/cms/wp");

// Salts - Grab some here:
// https://api.wordpress.org/secret-key/1.1/salt/