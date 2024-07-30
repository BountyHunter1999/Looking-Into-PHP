<?php

$mangas = [
    [
        "name" => "One Piece",
        "author" => "Eiichiro Oda",
        "releaseYear" => 1997,
        "link" => "https://www.viz.com/one-piece"
    ],
    [
        "name" => "Hunter x Hunter",
        "author" => "Yoshihiro Togashi",
        "releaseYear" => 1998,
        "link" => "https://www.viz.com/hunter-x-hunter"
    ],
    [
        "name" => "Dragon Ball Z",
        "author" => "Akira Toriyama",
        "releaseYear" => 1989,
        "link" => "https://www.viz.com/dragon-ball"
    ],
    [
    "name" => "Dr. Slump",
    "author" => "Akira Toriyama",
    "releaseYear" => 1980,
    "link" => "https://www.viz.com/dr-slump"
    ]
];

$filter = function ($items, $fn) {
    $filteredItems = [];
    foreach ($items as $item) {
        if ($fn($item)) {
        $filteredItems[] = $item;
        }
    }
    return $filteredItems;
};

$filteredItems = $filter($mangas, function ($manga) {
    return $manga['releaseYear'] >= 1980 and $manga['releaseYear'] <= 1997;
});

require "index.view.php";