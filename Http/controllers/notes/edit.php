<?php
// shows a form to edit the note

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['email'];

$currentId = $db->query('SELECT id FROM users WHERE email = :currentUser', [
    ':currentUser' => $currentUser
])->find();

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    ':id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentId['id']);


view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);
