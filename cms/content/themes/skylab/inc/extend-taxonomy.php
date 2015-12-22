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
//   $name   = 'Taxonomy';

//   /**
//    * Labels for taxonomy
//    * @var array  pass $name, $singluar, $plural to label_factory
//    */
//   $labels = PostTypes\label_factory($name, 'Taxonomy', 'Taxonomies');

//   /**
//    * Rewrite
//    * @var array
//    */
//   $rewrite = array(
//     'slug'                       => 'taxonomy',
//     'with_front'                 => true,
//     'hierarchical'               => false,
//   );
//   /**
//    * Taxonomy Arguments
//    * @var array
//    */
//   $args = array(
//     'labels'                     => $labels,
//     'hierarchical'               => true,
//     'public'                     => true,
//     'show_ui'                    => true,
//     'show_admin_column'          => true,
//     'show_in_nav_menus'          => false,
//     'show_tagcloud'              => true,
//     'rewrite'                    => $rewrite,
//   );

//   register_taxonomy( 'gemini_tax_name', array( 'gemini_cpt_type_name' ), $args );

// }
// add_action( 'init', __NAMESPACE__ . '\Gemini_Tax', 0 );




