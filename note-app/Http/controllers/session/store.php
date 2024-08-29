<?php

use Core\Authenticator;
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


return view("session/create.view.php", [
    "errors" => $form->getErrors(),
]);


