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
    <ul>
      <?php foreach ($filteredItems as $manga) : ?>
          <li><?= "{$manga['author']} wrote {$manga['name']} at {$manga['releaseYear']}"; ?></li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>
