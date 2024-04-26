<?php

const BASE_URL = '/notes-app/public';

$router->get(BASE_URL . '/', 'controllers/index.php');
$router->get(BASE_URL . '/about', 'controllers/about.php');
$router->get(BASE_URL . '/notes', 'controllers/notes/index.php');
$router->get(BASE_URL . '/note', 'controllers/notes/show.php');
$router->get(BASE_URL . '/notes/create', 'controllers/notes/create.php');
$router->get(BASE_URL . '/contact', 'controllers/contact.php');
