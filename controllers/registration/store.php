<?php

use Core\Validator;
use Core\Database;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form input
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
// check if the account already exists
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    ':email' => $email
])->find();

if ($user) {
    // if yes redirect to login page
    header('location: /');
    exit();
} else {
    // if not save one to the database and then log the user in and then redirect
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        ':email' => $email,
        ':password' => $password
    ]);

    //mark that the user has logged in
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}
