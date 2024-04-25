<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// parse_url() parse a URL and return path and query 
$base_url = '/laracast/php-for-beginner';

$routes = [
    "$base_url/" => 'controllers/index.php',
    "$base_url/about" => 'controllers/about.php',
    "$base_url/notes" => 'controllers/notes.php',
    "$base_url/contact" => 'controllers/contact.php',
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
