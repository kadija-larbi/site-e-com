<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/init.php';




include_once ROOT . 'views/includes/header.php';
?>

<body>

    <?php include_once ROOT . 'views/includes/navbar.php'; ?>

    <div class="container my-5">
    <h1 class="text-center">Ajouter une marque</h1>
    <form action="<?= URL ?>src/Controller/MarqueController.php?param=addMarque" method="post">
      <div class="form-group">
        <label for="name">Nom de la marque</label>
        <input type="text" class="form-control" name="name" id="name" required>
      </div>
      <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
    </form>
  </div>

  <div class="text-center my-3">
  <a href="<?= URL ?>src/Controller/MarqueController.php?param=liste" class="btn btn-primary"><i class="fa-solid fa-rotate-left"></i></a>
</div>


    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>