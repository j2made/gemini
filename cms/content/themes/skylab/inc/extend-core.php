<?php

namespace Gemini\Inc\Core;

/**
 * Functions that effect WP core or extend core hooks
 *
 * If there are alterations to WP in regard to the REST API,
 * all code should be includec in `inc/extend-rest-api.php`
 *
 * @package Gemini
 * @version 1.0.0
 * @since  1.0.0
 *
 */


/**
 * Add Image Sizes
 * https://developer.wordpress.org/reference/functions/add_image_size/
 *
 * @since  1.0.0
 */

// add_image_size( $name, $width, $height, $crop );



/**
 * Allow SVG Uploads
 * https://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/
 *
 * Uncomment to use
 *
 * @wp_hook upload_mimes
 * @since   1.0.0
 */

// function mime_types($mimes) {
//   $mimes['svg'] = 'image/svg+xml';
//   return $mimes;
// }
// add_filter('upload_mimes',  __NAMESPACE__ . '\\mime_types');


/**
 * Fix SVG Thumbnail display
 * https://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/
 *
 * Uncomment to use
 *
 * @wp_hook admin_head
 * @since   1.0.0
 */

// function fix_svg_thumb_display() {
//   echo '
//     <style type="text/css">
//       td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
//         width: 100% !important;
//         height: auto !important;
//       }
//     </style>
//   ';
// }

// add_action('admin_head',  __NAMESPACE__ . '\\fix_svg_thumb_display');


