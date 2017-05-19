<?php

namespace Gemini\Inc\Admin;

/**
 * Functions to alter the default experience of the WP Admin
 *
 * If there are alterations to the WP Admin in regard to the
 * REST API, that code should be includec in `inc/extend-rest-api.php`
 *
 * @package Gemini
 * @version 1.0.0
 * @since  1.0.0
 *
 */

/**
 * Hide the admin bar in the dev enviornment
 *
 * @since  1.0.0
 */
if ( GEMINI_ENV === 'development' ) {

  add_filter( 'show_admin_bar', '__return_false' );

}


