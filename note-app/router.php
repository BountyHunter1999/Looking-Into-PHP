<?php

require "functions.php";

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

// if ($uri === "/") {
//     require "controllers/index.php";
// } else if($uri === "/about") {
//     require "controllers/about.php";
// } else if($uri === "/contact") {
//     require "controllers/contact.php";
// }

function abort($code = 404) {
    http_response_code($code);

    // echo "Sorry, Not Found.";
    require "views/{$code}.php";

    die();
}

function routeToController($uri, $routes){
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(404);
    }
}

$routes = [
    "/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/notes" => "controllers/notes.php",
    "/note" => "controllers/note.php",
    "/contact" => "controllers/contact.php"
];

routeToController($uri, $routes);