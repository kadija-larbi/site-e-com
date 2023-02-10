<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/init.php';




include_once ROOT .'views/includes/header.php';
?>




<body>
    
<?php include_once ROOT .'views/includes/navbar.php';?>


<div class="container my-5">
  <div class="d-flex justify-content-between mb-3">
    <a href="<?= URL ?>src/Controller/ProduitController.php?param=addProduit" class="btn btn-success btn-sm">Ajouter un produit</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
      <th>id</th>
      <th>Name</th>
      <th>ref</th>
      <th>Prix</th>
      <th>Quantité</th>
        <th>Marque_id</th>
        <th>Image</th>

        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach($produits as $produit): ?>
        <tr>
        <td><?= $produit->id ?></td>
          <td><?= $produit->name ?></td>
          <td><?= $produit->ref ?></td>
          <td><?= $produit->prix_unit ?></td>
          <td><?= $produit->quantity ?></td>
          <td><?= $produit->marque_id ?></td>
          <td><?= $produit->image ?></td>

          <td>
            <a href="<?= URL ?>src/Controller/ProduitController.php?param=showProduit&id=<?= $produit->id ?>" class="btn btn-secondary btn-sm mr-2"><i class="fa-solid fa-eye"></i></a>
            <a href="<?= URL ?>src/Controller/ProduitController.php?param=editProduit&id=<?= $produit->id ?>" class="btn btn-secondary btn-sm mr-2"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="<?= URL ?>src/Controller/ProduitController.php?param=deleteProduit&id=<?= $produit->id ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>






<?php include_once ROOT .'views/includes/footer.php';?>
</body>
</html>