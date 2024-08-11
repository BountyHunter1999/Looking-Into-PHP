<?php

use \Core\App;
use \Core\Container;
use \Core\Database;

$container = new Container();

$container->bind("Core\Database", function () {
    $config = require base_path("config.php");
    $DB_USER = $_ENV["DB_USER"] ?? "hariom";
    $DB_PASSWORD = $_ENV["DB_PASSWORD"] ?? "om123!";
    return new Database($config["database"], username: $DB_USER, password: $DB_PASSWORD);
});


App::setContainer($container);