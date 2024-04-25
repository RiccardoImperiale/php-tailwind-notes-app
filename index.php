<?php

require 'functions.php';
require 'Database.php';
// require 'router.php';

$config = require 'config.php';

$db = new Database($config['database']);


$id = $_GET['id'];
echo $id;

// $posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC); // format result into assoc array to remove indexes
$post = $db->query("SELECT * FROM posts WHERE id = 1")->fetch();

var_dump($post);
// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }
