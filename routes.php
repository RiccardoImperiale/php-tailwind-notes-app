<?php

$config = require 'config.php';
define('BASE_URL', $config['app']['BASE_URL']);

$router->get(BASE_URL . '/', 'controllers/index.php');
$router->get(BASE_URL . '/about', 'controllers/about.php');
$router->get(BASE_URL . '/contact', 'controllers/contact.php');

$router->get(BASE_URL . '/notes', 'controllers/notes/index.php');
$router->get(BASE_URL . '/note', 'controllers/notes/show.php');
$router->delete(BASE_URL . '/note', 'controllers/notes/destroy.php');

$router->get(BASE_URL . '/note/edit', 'controllers/notes/edit.php');
$router->patch(BASE_URL . '/note', 'controllers/notes/update.php');

$router->get(BASE_URL . '/notes/create', 'controllers/notes/create.php');
$router->post(BASE_URL . '/notes', 'controllers/notes/store.php');
