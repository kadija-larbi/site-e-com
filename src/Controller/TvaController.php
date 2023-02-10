<?php

use App\Model\Repository\TvaRepository;

$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/init.php';
include_once $path . '/src/Model/Repository/TvaRepository.php';

$tvaRepo = new TvaRepository();
//je recup le param passé dans l'url

if ($_GET['param']) {
    $param = $_GET['param'];
}

//je teste le param passé dans l'url
switch ($param) {
        //param = liste donc j'affiche la liste des tva
    case 'liste':
        $tvas = $tvaRepo->findAll();
        include_once ROOT . 'views/tva/tva.php';
        break;

    case 'addTva':
        $error = "";
        if ($_POST) {
            extract($_POST);
            $taux = (float) $_POST['taux'];
            if (!$_POST['name']) {
                $error .= "entrez un nom pour votre TVA";
            }
            if (!$taux or !is_float($taux)) {
                $error .= "entrez un taux decimal";
            }
            if (!$error) {
                $_POST['taux'] = $_POST['taux'] / 100;
                $tvaRepo->add($_POST);
                header("location: TvaController.php?param=liste");
            }
        }
        include_once ROOT . 'views/tva/addTva.php';
        break;

    case 'deleteTva':
        $id = $_GET['id'];
        $tvaRepo->delete($id);
        header("location: TvaController.php?param=liste");

        break;

    case 'showTva':
        $id = $_GET['id'];
        $tva = $tvaRepo->find($id);
        include_once ROOT . 'views/tva/showTva.php';
        break;

    case 'editTva':
        $error = "";
        $id = $_GET['id'];
        //je récupere l'enregistrement à modifier pour completer les inputs du formulaire sur editTva.php
        $tva = $tvaRepo->find($id);
        //la récupération se fait avant la modification
        if ($_POST) {
            $taux = (float) $_POST['taux'];
            if (!$_POST['name']) {
                $error .= "entrez un nom pour votre TVA";
            }
            //je teste que le taux exusste et qu'il est bien type float
            if (!$taux or !is_float($taux)) {
                $error .= "entrez un taux decimal";
            }
            //je teste la variable error si elle est vide j'enregistre les modif
            if (!$error) {
                $_POST['taux'] = $_POST['taux'] / 100;
                $tvaRepo->edit($_POST, $id);
                header("location: TvaController.php?param=liste");
            }
        }
        include_once ROOT . 'views/tva/editTva.php';
        break;
}
