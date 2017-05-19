<?php

  /**
   * Redirect if valid app url is provided
   */
  if ( GEMINI_APP_URL ) {

    if ( filter_var( GEMINI_APP_URL, FILTER_VALIDATE_URL ) ) {
      wp_redirect( GEMINI_APP_URL );
    }

  }
?>

<!DOCTYPE html>
<html>
<head>
  <title><?= get_bloginfo('name') ?></title>
  <style>
    html, body { width: 100%; height: 100%; min-height: 100%; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-weight: 400; margin: 0; padding: 0;}
    body { background: url("<?= get_bloginfo('template_directory') ?>/img/gemini.jpg") no-repeat center; background-size: cover; }
  </style>
</head>
<body>
</body>
</html>