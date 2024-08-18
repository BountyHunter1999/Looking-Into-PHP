<?php

use Core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    die();
    echo "</pre>";
}

// // dd($SERVER);
// if ($_SERVER['REQUEST_URI'] === "/") {
//     echo 'bg-gray-900 text-white';
// } else {
//     echo "text-gray-300";
// }

function urlIs($value) {
    return $_SERVER["REQUEST_URI"] === $value;
}

function abort($code = 404) {
    http_response_code($code);

    // echo "Sorry, Not Found.";
    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status=Response::FORBIDDEN) {
    if (! $condition){
        abort($status);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    // import variables into the current symbol table from an array
    extract($attributes);
    require base_path("views/" . $path);
}

function login($user) {
    $_SESSION['user'] = [
        "email" => $user['email'],
    ];
}