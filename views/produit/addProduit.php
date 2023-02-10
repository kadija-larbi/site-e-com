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
        <h1 class="text-center">Ajouter un produit</h1>
        <form action="<?= URL ?>src/Controller/ProduitController.php?param=addProduit" method="post">
            <div class="form-group">
                <label for="name">Nom du produit</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php if (isset($name)) {
                                                                                            echo $name;
                                                                                        } ?>">

<label for="description">Description du produit</label>
                <input type="text" class="form-control" name="description" id="description" value="<?php if (isset($description)) {
                                                                                            echo $description;
                                                                                        } ?>">

<label for="ref">Référence</label>
                <input type="text" class="form-control" name="ref" id="ref" value="<?php if (isset($ref)) {
                                                                                            echo $ref;
                                                                                        } ?>">
                <label for="image">Image principale du produit</label>
                <input type="file" class="form-control"  name="image" id="image" >

                <select name="marque_id" id="marque" class="form-control">
                    <?php if (isset($marque_id)) : ?>
                        <option value="<?= $marque_id ?>"><?= $marque_id ?></option>
                    <?php endif ?>
                    <?php foreach ($marques as $marque) : ?>
                        <option value="<?= $marque->id ?>"><?= $marque->id ?></option>
                    <?php endforeach ?>
                </select>

                <select name="tva_id" id="tva" class="form-control">
                    <?php foreach ($tvas as $tva) : ?>
                        <option value="<?= $tva->id ?>"><?= $tva->id ?></option>
                    <?php endforeach ?>
                </select>

                <label for="prix">Prix</label>
                <input type="number" step="0.01" name="prix_unit" id="prix_unit" class="form-control" value="<?php if(isset($prix_unit)) {echo $prix_unit; } ?> ">

                <label for="quantity" class="label-control">Quantité </label>

<input type="number"  name="quantity" id="quantity" class="form-control" value="<?php if (isset($quantity)) {echo $quantity;} ?>">

<label for="ram" class="label-control">Ram</label>

<input type="text" value="<?php if (isset($ram)) {echo $ram;} ?>" name="ram" id="ram" class="form-control">

            </div>
            <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
        </form>
    </div>

    <div class="text-center my-3">
        <a href="<?= URL ?>src/Controller/ProduitController.php?param=liste" class="btn btn-primary"><i class="fa-solid fa-rotate-left"></i></a>
    </div>


    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>