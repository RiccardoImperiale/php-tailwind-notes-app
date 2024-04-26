<?php

$base_url = '/notes-app/public';

return [
    "$base_url/" => 'controllers/index.php',
    "$base_url/about" => 'controllers/about.php',
    "$base_url/notes" => 'controllers/notes/index.php',
    "$base_url/note" => 'controllers/notes/show.php',
    "$base_url/notes/create" => 'controllers/notes/create.php',
    "$base_url/contact" => 'controllers/contact.php',
];
