<?php

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

function authorize($condition, $status=Response::FORBIDDEN) {
    if (! $condition){
        abort($status);
    }
}