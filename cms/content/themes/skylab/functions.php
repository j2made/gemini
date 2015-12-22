<?php

namespace Gemini\Inc;

$base = '/inc/';

$gemini_incs = [
  'config-settings.php',
  'extend-admin.php',
  'extend-core.php',
  'extend-post-types.php',
  'extend-taxonomy.php',
  'extend-rest-api.php',

  // 'extend-acf'
];

foreach ($gemini_incs as $file) {
  if(locate_template($base . $file)) {
    require_once( TEMPLATEPATH . $base . $file );
  }
}