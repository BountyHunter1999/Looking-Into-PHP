<?php

return [
    "database" => [
        'host' => $_ENV["DB_HOST"] ?? "localhost",
        "port" =>  $_ENV["DB_PORT"] ?? 3306,
        "dbname" => $_ENV["DB_NAME"] ?? "testdb",
        "charset" => $_ENv["CHARSET"] ?? "utf8mb4",
        // "username" => $_ENV["DB_USER"] ?? "hariom",
        // "password" => $_ENV["DB_PASSWORD"] ?? "om123!"
    ]
];