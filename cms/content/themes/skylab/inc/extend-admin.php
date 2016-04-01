<?php

namespace Gemini\Inc\Admin;

/**
 * Functions to alter the appearance of WP admin pages
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
 * Hide Features in Editor based on Custom Post Type
 *
 * @since  1.0.0
 */
add_action( 'init', __NAMESPACE__ . '\\Change_Default_Support', 10 );

function Change_Default_Support() {
	/**
	 * An array of post types, each with an array of features
	 * to hide on screen.
	 *
	 * Features can be found here:
	 * https://codex.wordpress.org/Function_Reference/remove_post_type_support
	 *
	 * @var array
	 */
	$config_args = array(
		'page' => array('editor', 'thumbnail'),
		'post' => array('editor')
	);

	foreach($config_args as $post_type => $features) {
		foreach($features as $feature) {
			remove_post_type_support( $post_type, $feature );
		}
	}
}



/**
 * Hide the admin bar in the dev enviornment
 *
 * @since  1.0.0
 */
if(GEMINI_ENV === 'development') :
  add_filter('show_admin_bar', '__return_false');
endif;



/**
 * Reload Browsersync if in available
 * Via https://github.com/whatwedo/gulp-wp-theme/issues/25
 *
 * @since  1.0.0
 */
function Reload_Browsersync() {
  if( WP_ENV === 'development') {
    $url = "http://localhost:3000/__browser_sync__?method=reload";
    $headers = @get_headers($url);

    if( strpos($headers[0],'404') !== false ) {
      file_get_contents($url);
    }
  }
}
add_action( 'save_post', __NAMESPACE__ . '\\Reload_Browsersync');



