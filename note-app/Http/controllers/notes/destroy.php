<?php

use Core\App;

$config = require base_path("config.php");

$currentUserId = 1;

$db = App::resolve(\Core\Database::class);
$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" =>  $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", ["id" => $_POST["id"]]);

header('location: /notes');
exit(); // ensure redirect happens cleanly and no unintended code execution occurs afterward.
