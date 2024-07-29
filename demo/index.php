<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Demo</title>
    <!-- <style>
      body {
        display: grid;
        place-items: center;
        height: 100vh;
        margin: 0;
        font-family: sans-serif;
      }
    </style> -->
  </head>
  <body>
    <h1>Recommended Mangas</h1>
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

      function filterByAuthor($mangas, $author) {
        $filteredMangas = [];
        foreach ($mangas as $manga) {
          if ($manga['author'] === $author) {
            $filteredMangas[] = $manga;
          }
        }
          return $filteredMangas;
      }
    ?>
    <ul>
      <?php foreach (filterByAuthor($mangas, "Akira Toriyama") as $manga) : ?>
        <?php if ($manga['author'] === "Akira Toriyama") : ?>
          <li><?= "{$manga['author']} wrote {$manga['name']} at {$manga['releaseYear']}"; ?></li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </body>
</html>
