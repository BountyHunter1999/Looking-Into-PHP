<?php

use \Core\Validator;
use \Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
// validate forms input
if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (! empty($errors)) {
    return view("registration/create.view.php", ["errors"=> $errors]);
}

$db = App::resolve(\Core\Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", ["email"=> $email])->find();

if ($user) {
    header('location: /');
    exit(); // to ensure the script doesn't execute after the header
} else {
    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", ["email"=> $email, "password"=> password_hash($password, PASSWORD_BCRYPT)]);

    login([
        'email' => $email
    ]);
    header('location : /');
    exit();
}
// check if the account already exists
    // if yes, redirect to login page
    // if not, save on to the database, and then log the user in, and redirect
// view("registration/store.view.php");
