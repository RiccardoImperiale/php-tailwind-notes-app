<?php

require 'functions.php';
require 'Database.php';
require 'router.php';






// question mark way
// $query = "SELECT * FROM posts WHERE id = ?";
// $post = $db->query($query, [$id])->fetch();

// :key way
// $query = "SELECT * FROM posts WHERE id = :id";
// $post = $db->query($query, [':id' => $id])->fetch();
// $posts = $db->query($query)->fetchAll(PDO::FETCH_ASSOC); // format result into assoc array to remove indexes


// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }
