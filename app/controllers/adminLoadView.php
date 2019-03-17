<?php
$template = '../app/views/administrators/AdminNavigation.php';
$navigation = loadTemplate($template, []);

$template = '../app/templates/UserTemplate.php';
$contents = [
  'title'=>$title,
  'navigation'=>$navigation,
  'content'=>$content
];
$content = loadTemplate($template, $contents);

$this->view($content);


?>