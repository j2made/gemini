<?php

namespace Gemini\Inc\Taxonomy;
use Gemini\Inc\PostTypes;

/**
 * Register a custom taxonomy.
 *
 * Uses label factory from `inc/extend-post-types`
 * Uncomment to use.
 * Replace `Gemini_Tax()` with `YourTaxname_Tax()`
 * Replace `gemini_tax_name` with your Taxonomy name
 * Replace `gemini_cpt_type_name` with linked CPT name
 *
 * @wp_hook   init
 * @since     1.0.0
 */

// function Gemini_Tax() {

//   /**
//    * Name of taxonmy
//    * @var string
//    */
//   $name     = 'Tax Name';
//   $name_alt = strtolower($name);
//   $name_alt = preg_replace("/[^a-z0-9_\s-]/", "", $name_alt);
//   $name_alt = preg_replace("/[\s-]+/", " ", $name_alt);
//   $name_alt = preg_replace("/[\s_]/", "-", $name_alt);

//   /**
//    * Labels for taxonomy
//    * @var array  pass $name, $singluar, $plural to Label_Factory
//    */
//   $labels = PostTypes\Label_Factory($name);

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
//     'rest_base'                   => strtolower($name_alt),
//     'rest_controller_class'       => 'WP_REST_Terms_Controller',
//   );

//   register_taxonomy( 'destination_details', array( 'locations' ), $args );

// }
// add_action( 'init', __NAMESPACE__ . '\\Gemini_Tax', 0 );




