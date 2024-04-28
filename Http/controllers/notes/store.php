<?php
// store the note after the form to create a note is submitted

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$currentUser = $_SESSION['user']['email'];

$currentId = $db->query('SELECT id FROM users WHERE email = :currentUser', [
    ':currentUser' => $currentUser
])->find();

$errors = [];

if (!Validator::string($_POST['body'], 1, 500)) {
    $errors['body'] = 'A body of no more than 500 characters is required';
}

if (!empty($errors)) {
    view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    ':body' => $_POST['body'],
    ':user_id' => $currentId['id']
]);

header('location: ./notes');
die();
