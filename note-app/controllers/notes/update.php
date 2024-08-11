<?php

use Core\App;
use Core\Validator;

$config = require base_path("config.php");

$currentUserId = 1;

$db = App::resolve(\Core\Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" =>  $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of not more than 1,000 characters is required';
    }

if (count($errors)){
    return view("notes/edit.view.php", [
        "heading" => "Edit Note",
        "errors" => $errors,
        "note" => $note
    ]);
}


$db->query("UPDATE notes SET  body=:body WHERE id = :id", [
    "id"=> $_POST["id"],
    "body"=> $_POST["body"],
]);


header("location: /notes");
die();

