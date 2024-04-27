<?php

use Core\Response;

function urlIs($value)
{
    $currentUrl = $_SERVER['REQUEST_URI'];
    $prefix = BASE_URL;
    if (strpos($currentUrl, $prefix) === 0) {
        $currentUrl = substr($currentUrl, strlen($prefix));
    }
    // Check for an exact match between the modified current URL and the provided value
    return $currentUrl === $value;
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/$code.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
}

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
