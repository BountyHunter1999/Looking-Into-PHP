<?php

use Core\App;

$config = require base_path("config.php");

$db = App::resolve(\Core\Database::class);

$notes = $db->query("SELECT * FROM notes WHERE user_id = :id;", ["id" => 1])->get();

view("notes/index.view.php", [
    "heading" => "My Notes",
    "notes" => $notes
]);

