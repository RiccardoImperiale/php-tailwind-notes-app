<?php
// update the note after the form to edit a note is submitted

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['email'];

$currentId = $db->query('SELECT id FROM users WHERE email = :currentUser', [
    ':currentUser' => $currentUser
])->find();

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    ':id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentId['id']);

$errors = [];

if (!Validator::string($_POST['body'], 1, 500)) {
    $errors['body'] = 'A body of no more than 500 characters is required';
}

if (!empty($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    ':id' => $_POST['id'],
    ':body' => $_POST['body']
]);

header('location: ./notes');
die();
