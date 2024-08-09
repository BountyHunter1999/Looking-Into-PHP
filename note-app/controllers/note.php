<?php

$config = require("config.php");

// get variables passed to the endpointr
// dd($_GET['id']);

$DB_USER = $_ENV["DB_USER"] ?? "hariom";
$DB_PASSWORD = $_ENV["DB_PASSWORD"] ?? "om123!";
$db = New Database($config["database"], username: $DB_USER, password: $DB_PASSWORD);

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" =>  $_GET['id']])->fetch();

$heading = "Note";

require "views/note.view.php";