<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/init.php';




include_once ROOT .'views/includes/header.php';
?>




<body>
    
<?php include_once ROOT .'views/includes/navbar.php';?>


<div class="container my-5">
  <div class="d-flex justify-content-between mb-3">
    <a href="<?= URL ?>src/Controller/MarqueController.php?param=addMarque" class="btn btn-success btn-sm">Ajouter une marque</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nom de la marque</th>
        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach($marques as $marque): ?>
        <tr>
          <td><?= $marque->name ?></td>
          <td>
            <a href="<?= URL ?>src/Controller/MarqueController.php?param=showMarque&id=<?= $marque->id ?>" class="btn btn-secondary btn-sm mr-2"><i class="fa-solid fa-eye"></i></a>
            <a href="<?= URL ?>src/Controller/MarqueController.php?param=editMarque&id=<?= $marque->id ?>" class="btn btn-secondary btn-sm mr-2"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="<?= URL ?>src/Controller/MarqueController.php?param=deleteMarque&id=<?= $marque->id ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>






<?php include_once ROOT .'views/includes/footer.php';?>
</body>
</html>