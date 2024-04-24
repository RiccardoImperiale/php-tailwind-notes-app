<?php
require 'functions.php';

$heading = 'Home';
$uri = $_SERVER['REQUEST_URI'];


if ($uri === '/laracast/php-for-beginner/') {
    require 'views/index.view.php';
} else if ($uri === '/laracast/php-for-beginner/about') {
    require 'views/about.view.php';
} else if ($uri === '/laracast/php-for-beginner/contact') {
    require 'views/contact.view.php';
}
