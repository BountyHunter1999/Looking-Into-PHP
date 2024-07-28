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
      "One Piece",
      "My Hero Academia",
      "Hunter_x_Hunter",
      "JoJo"
    ];

    ?>
    <ul>
      <?php foreach ($mangas as $manga) : ?>
        <li><?= $manga; ?></li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>
