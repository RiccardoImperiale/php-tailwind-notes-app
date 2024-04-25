<?php

function urlIs($value)
{
    // Remove the prefix '/laracast/php-for-beginner' from the current URL
    $currentUrl = $_SERVER['REQUEST_URI'];
    $prefix = '/laracast/php-for-beginner';
    if (strpos($currentUrl, $prefix) === 0) {
        $currentUrl = substr($currentUrl, strlen($prefix));
    }
    // Check for an exact match between the modified current URL and the provided value
    return $currentUrl === $value;
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}
