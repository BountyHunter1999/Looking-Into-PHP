<?php

$heading = "Create Note";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // dd($_POST);
    $l = 1;
    // dd("You Submitted to the form ". $_POST);
}

require "views/note-create.view.php";