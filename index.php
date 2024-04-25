<?php
require 'functions.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// parse_url() parse a URL and return path and query 

$routes = [
    '/laracast/php-for-beginner/' => 'controllers/index.php',
    '/laracast/php-for-beginner/about' => 'controllers/about.php',
    '/laracast/php-for-beginner/contact' => 'controllers/contact.php',
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    require 'views/404.php';

    die();
}
