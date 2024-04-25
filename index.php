<?php

require 'functions.php';
require 'Database.php';
// require 'router.php';

$config = require 'config.php';

$db = new Database($config['database']);


$id = $_GET['id'];

$query = "SELECT * FROM posts WHERE id = ?";


// $posts = $db->query($query)->fetchAll(PDO::FETCH_ASSOC); // format result into assoc array to remove indexes
$post = $db->query($query, [$id])->fetch();

var_dump($post);
// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }
