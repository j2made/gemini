<?php

namespace Gemini\Inc\Taxonomy;
use Gemini\Inc\PostTypes;

/**
 * Register a custom taxonomy.
 *
 * Uses label factory from `inc/extend-post-types`
 * Uncomment to use.
 *
 * @package Gemini
 * @version 1.0.0
 * @since  1.0.0
 *
 */

// function Gemini_Tax() {

//   $name     = 'TAXONOMY NAME';
//   $name_alt = strtolower($name);
//   $name_alt = preg_replace("/[^a-z0-9_\s-]/", "", $name_alt);
//   $name_alt = preg_replace("/[\s-]+/", " ", $name_alt);
//   $name_alt = preg_replace("/[\s_]/", "-", $name_alt);

//   /**
//    * Labels
//    * @var array  pass $name, $singluar, $plural to Label_Factory
//    */
//   $labels = Label_Factory($name);

//   /**
//    * Rewrite
//    * @var array
//    */
//   $rewrite = array(
//     'slug'                       => $name_alt,
//     'with_front'                 => true,
//     'hierarchical'               => false,
//   );
//   /**
//    * Taxonomy Arguments
//    * @var array
//    */
//   $args = array(
//     'labels'                      => $labels,
//     'hierarchical'                => true,
//     'public'                      => true,
//     'show_ui'                     => true,
//     'show_admin_column'           => true,
//     'show_in_nav_menus'           => false,
//     'show_tagcloud'               => true,
//     'rewrite'                     => $rewrite,
//     'show_in_rest'                => true,
//     'rest_base'                   => $name_alt,
//     'rest_controller_class'       => 'WP_REST_Terms_Controller',
//   );

//   register_taxonomy( $name_alt, array( 'ASSOCIATED POST TYPE' ), $args );

// }

// add_action( 'init', __NAMESPACE__ . '\\Gemini_Tax', 0 );




