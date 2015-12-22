<?php
  $link = str_replace('/cms', '', get_bloginfo('url') );
?>

<!DOCTYPE html>
<html>
<head>
  <title><?= get_bloginfo('name') ?></title>
  <style>
    html, body { width: 100%; height: 100%; min-height: 100%; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-weight: 400; margin: 0; padding: 0;}
    body { background: url("<?= get_bloginfo('template_directory') ?>/img/gemini.jpg") no-repeat center; background-size: cover; }
    div { text-align: center; position: absolute; top: 50%; left: 50%; -webkit-transform: translate(-50%, -60%); -ms-transform: translate(-50%, -60%); transform: translate(-50%, -60%); padding: 30px; background: #e8e8e8; }
    h2 { font-weight: 400; }
  </style>
</head>
<body>
  <div>
    <h1>Hello my future user.</h1>
    <p>Please redirect to <a href="<?= $link ?>"><?= $link ?></a></p>
    <h2>Thanks for stopping by.</h2>
  </div>
</body>
</html>