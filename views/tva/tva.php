<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/init.php';




include_once ROOT .'views/includes/header.php';
?>




<body>
    
<?php include_once ROOT .'views/includes/navbar.php';?>


<div class="container my-5">
  <div class="d-flex justify-content-between mb-3">
    <a href="<?= URL ?>src/Controller/TvaController.php?param=addTva" class="btn btn-success btn-sm">Ajouter une tva</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
      <th>id</th>
      <th>name</th>
        <th>taux</th>
        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach($tvas as $tva): ?>
        <tr>
        <td><?= $tva->id ?></td>
          <td><?= $tva->name ?></td>
          <td><?= $tva->taux ?></td>

          <td>
            <a href="<?= URL ?>src/Controller/TvaController.php?param=showTva&id=<?= $tva->id ?>" class="btn btn-secondary btn-sm mr-2"><i class="fa-solid fa-eye"></i></a>
            <a href="<?= URL ?>src/Controller/TvaController.php?param=editTva&id=<?= $tva->id ?>" class="btn btn-secondary btn-sm mr-2"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="<?= URL ?>src/Controller/TvaController.php?param=deleteTva&id=<?= $tva->id ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>






<?php include_once ROOT .'views/includes/footer.php';?>
</body>
</html>