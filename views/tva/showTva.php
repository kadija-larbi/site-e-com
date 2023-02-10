<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/init.php';

include_once ROOT .'views/includes/header.php';
?>

<body>
    
<?php include_once ROOT .'views/includes/navbar.php';?>


<div class="container my-5">
    <h1 class="text-center">Détails de la TVA</h1>
    <div class="card">
      <div class="card-body">
        <h5 class="text-center">NOM: <?= $tva->name ?></h5>
        <h5 class="text-center">TAUX: <?= $tva->taux ?></h5>

      </div>
    </div>
  </div>


  <div class="text-center my-3">
  <a href="<?= URL ?>src/Controller/TvaController.php?param=liste" class="btn btn-primary"><i class="fa-solid fa-rotate-left"></i></a>
</div>





<?php include_once ROOT .'views/includes/footer.php';?>
</body>
</html>