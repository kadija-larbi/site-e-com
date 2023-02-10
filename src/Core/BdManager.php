<?php

namespace App\Core;

use PDO;

class BdManager
{
    private $dsn = "mysql:host=localhost;dbname=bd_site_tel";
    private $userName = "root";
    private $password = "";

    public function getConnect()
    {
        $pdo = new PDO($this->dsn, $this->userName, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public function nettoiFormulaire($string)
    {
        $string = htmlspecialchars(strip_tags($string));
        return $string;
    }

    private function requet($sql, array $param = null)
    {

        //je récup une connexion à la bdd
        $con = $this->getConnect();
        if ($param !== null) {
            //si le tableau n'est pas vide
            //pour se protéger d'une attaque par injection sql
            $stmt = $con->prepare($sql);
            $stmt->execute($param);
            return $stmt;
        } else {
            //si y a pas de param j'éxecute une requette query
            return $con->query($sql);
        }
    }

    public function findAll($table)
    {
        //la requette sql pour récuperer tout les enregistrements d'une table
        $sql = "SELECT * FROM $table";
        //j'éxecute la requette non préparée
        $stmt = $this->requet($sql);
        //je récup les enregistrements en mode objet et non tableau associatif
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function add(array $tableau, string $table)
    { //premier tableau vide pour stocker les keys qui representent les colonnes
        $colonne = [];
        //tableau pour stocker les valeurs à inserer dans la bdd
        $valeurs = [];
        //tableau pour stocker les parametres
        $params = [];

        foreach ($tableau as $key => $value) {
            $colonne[] = $key;
            $valeurs[] = '?';
            $params[] = $this->nettoiFormulaire($value); //je nettoie l'entrée du formulaire
        }
        //je transforme le tableau $colonne en string
        $string_colonne = implode(",", $colonne);
        //je transforme le tableau $valeurs en string
        $string_valeurs = implode(",", $valeurs);
        //je crée la requette sql
        $sql = "INSERT INTO $table (" . $string_colonne . ") VALUES ( " . $string_valeurs . " )";

        return $this->requet($sql, $params);
    }

    public function delete($table, $id)
    {
        $id = $this->nettoiFormulaire($id);
        $sql = "DELETE FROM $table WHERE id = $id";
        $this->requet($sql);
    }

    public function find($table, $id)
    {
        $id = $this->nettoiFormulaire($id);
        $sql = "SELECT * FROM $table WHERE id = $id";
        $stmt = $this->requet($sql);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function edit(array $tableau, string $table, $id)
    {
        //je crée un tableau pour recuperer les noms des colonnes de la table qui sont les keys de $_POST
        $colonne = []; //ici je stocke les valeurs à enregistrer sur la table
        $param = [];
        $id = $this->nettoiFormulaire($id);
        foreach ($tableau as $key => $value) {
            $colonne[] = "$key = ?";
            $param[] = $this->nettoiFormulaire($value);
        }
        $string_colonne = implode(",", $colonne);

        $sql = "UPDATE $table SET $string_colonne WHERE id = $id";

        $this->requet($sql, $param);
    }
}
