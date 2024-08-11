<?php

use Core\App;

$config = require base_path("config.php");

$currentUserId = 1;

$db = App::resolve(\Core\Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" =>  $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require view("notes/show.view.php", [
    "heading" => "Note",
    "note" => $note
]);

header("location: /notes");
exit();
