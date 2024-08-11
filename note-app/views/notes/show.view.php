<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>


<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <p class="mb-6">
      <a href="/notes" class="text-2xl font-bold underline">Go Back</a>
    </p>

    <h1 class="text-2xl font-bold">Hello, This is my note #<?= $note['id'] ?></h1>
    <p class="text-lg mt-6 italic"><?= $note['body'] ?></p>
  </div>
</main>
<?php require base_path("views/partials/footer.php") ?>
 