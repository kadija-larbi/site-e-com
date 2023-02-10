<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/init.php';




include_once ROOT . 'views/includes/header.php';
?>

<body>

    <?php include_once ROOT . 'views/includes/navbar.php'; ?>
    <?php if ($error) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif ?>
    <div class="container my-5">
    <h1 class="text-center">Ajouter une TVA</h1>
    <form action="<?= URL ?>src/Controller/TvaController.php?param=addTva" method="post">
      <div class="form-group">
        <label for="name">Nom de la TVA</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($name)){echo $name;} ?>">
        <label for="taux">Taux de la TVA</label>
        <input type="number" step="0.01" name="taux" id="taux" class="form-control">
        <p>exemple : pour une TVA à 10% entrez 10</p>
      </div>
      <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
    </form>
  </div>

  <div class="text-center my-3">
  <a href="<?= URL ?>src/Controller/TvaController.php?param=liste" class="btn btn-primary"><i class="fa-solid fa-rotate-left"></i></a>
</div>


    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>