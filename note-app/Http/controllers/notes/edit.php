<?php

use Core\App;

$config = require base_path("config.php");

$currentUserId = 1;
$errors = [];

$db = App::resolve(\Core\Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" =>  $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/edit.view.php", [
    "heading" => "Edit Note",
    "errors" => $errors,
    "note" => $note
]);