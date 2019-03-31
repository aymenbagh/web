<?php
require_once("../../Entites/categorie.php");
require_once("../../Entites/souscategorie.php");
require_once("../../connection.php");
//initialisation de la connexion à la base de données.
$db = Db::getInstance();
//S'il a rempli le formulaire d'ajout d'une categorie principale
if (isset($_POST['categorie_verif'])) {
    $nom = $_POST['categorie_input'];
    $req = "INSERT INTO categorie(nom) VALUES ('$nom')";
    $db->query($req);
    require_once('./listecategorie.php');

    //s'il a rempli le formulaire d'ajout d'une sous categorie
} else if (isset($_POST['souscategorie_verif'])) {
    $nom = $_POST['souscategorie_input'];
    $categoriemere = $_POST['categorie_select'];
    $req = "INSERT INTO souscategorie(nom,idcat) VALUES ('$nom',$categoriemere)";
    $db->query($req);
    require_once('./listecategorie.php');
    //sinon on affiche le formulaire
}else{
    $resultat = $db->query("SELECT * FROM categorie");
    while ($res = mysqli_fetch_array($resultat)) {
        $categories[] = new Categorie($res['id'], $res['nom']);
    }
    foreach ($categories as $categorie) {
        $id = $categorie->getid();
        $resultat = $db->query("SELECT * FROM souscategorie WHERE idcat='$id'");

        while ($res = mysqli_fetch_array($resultat)) {
            $listsc[] = new SousCategorie($res['id'], $res['nom'], $res['idcat']);
        }
        $categorie->setsouscategories($listsc);
        $listsc = [];
    }
    require_once('../../Views/admin/categorie/ajoutcategorie.php');
}












?>