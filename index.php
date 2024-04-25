<?php

require 'functions.php';
require 'Database.php';
// require 'router.php';

$config = require 'config.php';

$db = new Database($config['database']);
$posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC); // format result into assoc array to remove indexes


foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}
