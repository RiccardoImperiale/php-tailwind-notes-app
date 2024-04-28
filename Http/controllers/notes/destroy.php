<?php
// remove a note from the db

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['email'];

$currentId = $db->query('SELECT id FROM users WHERE email = :currentUser', [
    ':currentUser' => $currentUser
])->find();

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    ':id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentId['id']);

$db->query('DELETE FROM notes WHERE id = :id', [
    ':id' => $_POST['id']
]);

header('Location: ./notes');
