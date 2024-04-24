<?php
// var_dump($_SERVER);

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}
