<?php

// any of the require syntax works
$config = require base_path("config.php");
$DB_USER = $_ENV["DB_USER"] ?? "hariom";
$DB_PASSWORD = $_ENV["DB_PASSWORD"] ?? "om123!";
$db = New Database($config["database"], username: $DB_USER, password: $DB_PASSWORD);

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of not more than 1,000 characters is required';
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes(body, user_id) VALUES (:body, :user_id)", [
            "body" => $_POST['body'],
            "user_id" => 1
        ]);
    } 
}

require view("notes/create.view.php", [
    "heading" => "Create Note",
    "errors" => $errors
]);