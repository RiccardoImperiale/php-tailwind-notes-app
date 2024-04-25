<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// parse_url() parse a URL and return path and query 

$routes = [
    '/laracast/php-for-beginner/' => 'controllers/index.php',
    '/laracast/php-for-beginner/about' => 'controllers/about.php',
    '/laracast/php-for-beginner/contact' => 'controllers/contact.php',
];


function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

routeToController($uri, $routes);


function abort($code = 404)
{
    http_response_code($code);
    require "views/$code.php";

    die();
}
