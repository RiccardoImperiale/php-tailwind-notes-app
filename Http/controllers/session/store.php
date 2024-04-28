<?php

use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use Http\Forms\LoginForm;

try {
    $form = LoginForm::validate($attributes = [
        'email' =>  $_POST['email'],
        'password' => $_POST['password'],
    ]);
} catch (ValidationException $exception) {

    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect('./login');
}


if ((new Authenticator)->attemp($attributes['email'], $attributes['password'])) {
    redirect('./');
}

$form->error('email',  'No matching account found for that email address and password.');
