<?php

$config = require 'config.php';
define('BASE_URL', $config['app']['BASE_URL']);

$router->get(BASE_URL . '/', 'index.php');
$router->get(BASE_URL . '/about', 'about.php');
$router->get(BASE_URL . '/contact', 'contact.php');

$router->get(BASE_URL . '/notes', 'notes/index.php')->only('auth');
$router->get(BASE_URL . '/note', 'notes/show.php');
$router->delete(BASE_URL . '/note', 'notes/destroy.php');

$router->get(BASE_URL . '/note/edit', 'notes/edit.php');
$router->patch(BASE_URL . '/note', 'notes/update.php');

$router->get(BASE_URL . '/notes/create', 'notes/create.php');
$router->post(BASE_URL . '/notes', 'notes/store.php');

$router->get(BASE_URL . '/register', 'registration/create.php')->only('guest');
$router->post(BASE_URL . '/register', 'registration/store.php');

$router->get(BASE_URL . '/login', 'session/create.php')->only('guest');
$router->post(BASE_URL . '/login', 'session/store.php')->only('guest');

$router->delete(BASE_URL . '/session', 'session/destroy.php')->only('auth');
