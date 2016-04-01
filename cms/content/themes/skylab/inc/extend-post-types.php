<?php

namespace Gemini\Inc\PostTypes;

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
 * Create labels needed for CPT or Taxonomy
 *
 * @param  string $name     Name of CPT/Taxonomy
 * @param  string $singular Singular form of name, defaults to $name
 * @param  string $plural   Plural form of name, defaults to $name with 's'
 * @return array            array of labels
 */
function label_factory($name, $singular = '', $plural = '' ) {
  if( empty($singular) )
    $plural = $name;

  if( empty($plural) )
    $plural = $singular . 's';

  $labels = array(
    'name'                  => $name,
    'singular_name'         => $singular,
    'menu_name'             => $name,
    'name_admin_bar'        => $name,
    'parent_item_colon'     => 'Parent ' . $singular . ':',
    'all_items'             => 'All ' . $plural,
    'add_new_item'          => 'Add New ' . $singular,
    'add_new'               => 'Add New',
    'new_item'              => 'New ' . $singular,
    'edit_item'             => 'Edit ' . $singular,
    'update_item'           => 'Update ' . $singular,
    'view_item'             => 'View ' . $singular,
    'search_items'          => 'Search ' . $singular,
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'items_list'            => $plural . ' list',
    'items_list_navigation' => $plural . ' list navigation',
    'filter_items_list'     => 'Filter ' . $plural . ' list'
  );

  return $labels;
}




/**
 * Register a custom post type.
 *
 * Uncomment to use.
 * Replace `Gemini_CPT()` with `YourCPTname_CPT()`
 * Replace `Name` with your CPT name
 *
 * @wp_hook   init
 * @since  1.0.0
 */
function Gemini_CPT() {

  /**
   * Name of CPT
   * @var string
   */
  $name = 'Name';
  $name_alt = strtolower($name);
  $name_alt = preg_replace("/[^a-z0-9_\s-]/", "", $name_alt);
  $name_alt = preg_replace("/[\s-]+/", " ", $name_alt);
  $name_alt = preg_replace("/[\s_]/", "-", $name_alt);

  /**
   * Labels
   * @var array  pass $name, $singluar, $plural to label_factory
   */
  $labels = label_factory($name);

  /**
   * Custom Post Type Args
   * @var array
   */
  $args = array(
    'label'                 => $name,
    'labels'                => $labels,
    // 'supports'              => array( 'title', ),
    // 'taxonomies'            => array( 'taxonomy' ),
    'hierarchical'          => true,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 20,
    'menu_icon'             => 'dashicons-admin-post',
    // 'rewrite'               => array( 'slug' => $name_alt ),
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => false,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'show_in_rest'          => true,
    'rest_base'             => $name_alt,
    'rest_controller_class' => 'WP_REST_Posts_Controller'
  );

  register_post_type( 'locations', $args );

}
add_action( 'init', __NAMESPACE__ . '\\Gemini_CPT', 0 );


