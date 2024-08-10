<?php

$config = require("config.php");
$DB_USER = $_ENV["DB_USER"] ?? "hariom";
$DB_PASSWORD = $_ENV["DB_PASSWORD"] ?? "om123!";
$db = New Database($config["database"], username: $DB_USER, password: $DB_PASSWORD);

$heading = "Create Note";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = [];

    if (strlen($_POST['body']) === 0 ) {
        $errors['body'] = 'A body is required';
    }

    if (strlen($_POST['body']) > 1000 ) {
        $errors['body'] = 'A body cannot be more than 1000 characters';
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes(body, user_id) VALUES (:body, :user_id)", [
            "body" => $_POST['body'],
            "user_id" => 1
        ]);
    } 
}

require "views/note-create.view.php";