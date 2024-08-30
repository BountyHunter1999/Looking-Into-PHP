<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    $auth = new Authenticator();
    
    // if ((new Authenticator())->attempt($email, $password)) {
    // if we are not passing the constructor args we can omit the closing and opening parenthesis
    // if ((new Authenticator)->attempt($email, $password)) {
    if ($auth->attempt($email, $password)) {
        redirect("/");
    } 
    $form->error("email", "No matching account found for that email ann password");

}

// error should be flashed to the session and then immediately expire
// $_SESSION["_flash"]["errors"] = $form->getErrors();

Session::flash("errors", $form->getErrors());
Session::flash("old", [
    "email" => $email
]);

redirect("/login");

// return view("session/create.view.php", [
//     "errors" => $form->getErrors(),
// ]);


