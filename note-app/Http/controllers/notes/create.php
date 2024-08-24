<?php

$errors = [];

require view("notes/create.view.php", [
    "heading" => "Create Note",
    "errors" => $errors
]);