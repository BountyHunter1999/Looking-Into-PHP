<?php

$config = require base_path("config.php");


$DB_USER = $_ENV["DB_USER"] ?? "hariom";
$DB_PASSWORD = $_ENV["DB_PASSWORD"] ?? "om123!";
$db = New Database($config["database"], username: $DB_USER, password: $DB_PASSWORD);

$notes = $db->query("SELECT * FROM notes WHERE user_id = :id;", ["id" => 1])->get();

require view("notes/index.view.php", [
    "heading" => "My Notes",
    "notes" => $notes
]);