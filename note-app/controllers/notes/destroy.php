<?php

use Core\Database;

$config = require base_path("config.php");

$currentUserId = 1;

$DB_USER = $_ENV["DB_USER"] ?? "hariom";
$DB_PASSWORD = $_ENV["DB_PASSWORD"] ?? "om123!";
$db = New Database($config["database"], username: $DB_USER, password: $DB_PASSWORD);


$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" =>  $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", ["id" => $_POST["id"]]);

header('location: /notes');
exit(); // ensure redirect happens cleanly and no unintended code execution occurs afterward.
