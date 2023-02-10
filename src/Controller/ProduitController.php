<?php

use App\Model\Repository\MarqueRepository;
use App\Model\Repository\ProduitRepository;
use App\Model\Repository\TvaRepository;


$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/init.php';
include_once $path . '/src/Model/Repository/ProduitRepository.php';
include_once $path . '/src/Model/Repository/TvaRepository.php';
include_once $path . '/src/Model/Repository/MarqueRepository.php';


$produitRepo = new ProduitRepository();
$marqRepo = new MarqueRepository();
$tvaRepo = new TvaRepository();
//je recup le param passé dans l'url

if ($_GET['param']) {
    $param = $_GET['param'];
}

//je teste le param passé dans l'url
switch ($param) {
    //param = liste donc j'affiche la liste de marques
case 'liste':
    $produits = $produitRepo->findAll();
    include_once ROOT . 'views/produit/produit.php';
  break;

  case 'addProduit':
    $marques = $marqRepo->findAll();
    $tvas = $tvaRepo->findAll();
    if ($_POST) {
        $produitRepo->add($_POST);
        header("location: ProduitController.php?param=liste");
    }
    include_once ROOT . 'views/produit/addProduit.php';
    break;
}
