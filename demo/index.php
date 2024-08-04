<?php

require "functions.php";
// require "router.php";

// dd($_ENV);

$DB_HOST = $_ENV["DB_HOST"] ?? "localhost";
$DB_USER = $_ENV["DB_USER"] ?? "hariom";
$DB_PASSWORD = $_ENV["DB_PASSWORD"] ?? "om123!";
$DB_NAME = $_ENV["DB_NAME"] ?? "testdb";
$DB_PORT = $_ENV["DB_PORT"] ?? 3306;

$dsn = "mysql:host=$DB_HOST;port=$DB_PORT;dbname=noicedb;charset=utf8mb4";

// dd($dsn);

$pdo = new PDO($dsn, username: $DB_USER, password: $DB_PASSWORD);

$statement = $pdo->prepare("SELECT * FROM posts;");

$statement->execute();

$posts = $statement -> fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>". $post["title"] ."</li>";
}