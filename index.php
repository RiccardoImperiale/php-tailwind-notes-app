<?php

require 'functions.php';
// require 'router.php';

// connect to database and execute a query
class Database
{
    public function query($query): array
    {
        $dsn = "mysql:host=localhost;port=8889;dbname=php_tailwind_app;user=root;password=root;charset=utf8mb4";

        $pdo = new PDO($dsn);
        $statement = $pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC); // format result into assoc array to remove indexes

    }
}

$db = new Database();

$posts = $db->query("SELECT * FROM posts WHERE id > 1");


foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}
