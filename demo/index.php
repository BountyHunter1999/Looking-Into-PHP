<?php

require "functions.php";
require "Database.php";
$config = require "config.php";

// dd($_ENV);
$DB_USER = $_ENV["DB_USER"] ?? "hariom";
$DB_PASSWORD = $_ENV["DB_PASSWORD"] ?? "om123!";
$db = New Database($config["database"], username: $DB_USER, password: $DB_PASSWORD);
$posts = $db->query("SELECT * FROM posts;");



foreach ($posts as $post) {
    echo "<li>". $post["title"] ."</li>";
}