<?php

use Core\Database;

$config = require base_path("config.php");

$currentUserId = 1;



// get variables passed to the endpointr
// dd($_GET['id']);

$DB_USER = $_ENV["DB_USER"] ?? "hariom";
$DB_PASSWORD = $_ENV["DB_PASSWORD"] ?? "om123!";
$db = New Database($config["database"], username: $DB_USER, password: $DB_PASSWORD);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" =>  $_GET['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query("DELETE FROM notes WHERE id = :id", ["id" => $_POST["id"]]);

    header('location: /notes');
    exit();
} else {
    $note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" =>  $_GET['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    require view("notes/show.view.php", [
        "heading" => "Note",
        "note" => $note
    ]);
}