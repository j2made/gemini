<?php

namespace Gemini\Inc\ACF;

/**
 * Functions to extend the admin presentation of ACF
 * http://www.advancedcustomfields.com/
 *
 * If there are alterations to ACF inregard to the REST API,
 * all code should be includec in `inc/extend-rest-api.php`
 *
 * @package Gemini
 * @version 1.0.0
 * @since  1.0.0
 *
 */


/**
 * Add ACF Options Pages
 */
if(function_exists("acf_add_options_page")) {
  acf_add_options_page();
}

if(function_exists("register_options_page")) {
  register_options_page('Global Options');
  // register_options_page('Page Options');
}



/**
 * Customize ACF Admin Display.
 * Removes WYSIWYG buttons from default ACF WYSIWYG
 *
 * @return    array     array of allowed buttons in toolbars
 * @since  1.0.0
 */
add_filter( 'acf/fields/wysiwyg/toolbars', __NAMESPACE__ . '\\ACF_WYSIWYG_Toolbars' );

function ACF_WYSIWYG_Toolbars( $toolbars ) {

  $toolbar_options = array(
    'bold',
    'italic',
    'undo',
    'redo',
    'link',
    'unlink',
    'removeformat',
    'fullscreen'
  );

  $toolbars['Full'][1] = $toolbar_options;

  return $toolbars;
}

