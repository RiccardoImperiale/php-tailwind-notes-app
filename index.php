<?php

require 'functions.php';
// require 'router.php';

// connect to our MySql database
$dsn = "mysql:host=localhost;port=8889;dbname=php_tailwind_app;user=root;password=root;charset=utf8mb4";

$pdo = new PDO($dsn);

$statement = $pdo->prepare("select * from posts");
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC); // format result into assoc array to remove indexes

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}
