<?php require("partials/head.php") ?>
<?php require("partials/nav.php") ?>
<?php require("partials/banner.php") ?>


<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <h1 class="text-2xl font-bold">Hello, This is my notes page</h1>
      <!-- <?php foreach ($notes as $note) : ?>
        <li><? $note["body"] ?></li>
      <?php endforeach; ?> -->
      <?php foreach ($notes as $note) {
        echo "<li>" . $note['body'] . "</li>";
      }
      ?>
  </div>
</main>
<?php require("partials/footer.php") ?>
