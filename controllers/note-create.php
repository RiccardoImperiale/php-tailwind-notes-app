<?php

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
}

require 'views/note-create.view.php';
