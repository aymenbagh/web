<?php

//Fichier hedha fih la liste des produits coté adminitrateur


require_once("../../Entites/produit.php");
require_once("../../Entites/categorie.php");
require_once("../../Entites/souscategorie.php");
require_once("../../connection.php");
//initialisation de la connexion à la base de données.
$db = Db::getInstance();
//initialisation des autres variables
$list = [];
$nbprod = 1;

//Recupération des categories
$resultat = $db->query("SELECT * FROM souscategorie");
while ($res = mysqli_fetch_array($resultat)) {
    $categories[] = new SousCategorie($res['id'], $res['nom'], $res['idcat']);
}

//Verification: si l'admin a cliqué sur le bouton supprimer
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    $sql = "DELETE FROM produit WHERE id = $id";
    $resultat = $db->query($sql);
}

//Verification: si l'admin a cliqué sur le bouton de recherche
if (isset($_POST['search'])) {
    $name = $_POST['nom_input'];
    $resultat = $db->query("SELECT * FROM produit WHERE nom LIKE '%" . $name . "%' ");
    //Verification: si l'admin vient de la page categorie et qu'il recherche une categorie spécifique
} else if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
    $sql = "SELECT * FROM produit WHERE idsc =$cat ";
    $resultat = $db->query($sql);
    //Verification : sinon on affiche par défaut la liste de tous les produits
} else {
    $resultat = $db->query("SELECT * FROM produit");
}

//Recuperation des resultats de la requete sql
while ($res = mysqli_fetch_array($resultat)) {
    $produits[] = new Produit($res['id'], $res['nom'], $res['description'], $res['prix'], $res['prixpromo'],
        $res['quantite'], $res['marque'], $res['idsc'], $res['file']);
}
//On teste si la liste de produits est vide. 3mal recherche 3la 7aja mahech mawjouda par exemple.
if (empty($produits)) {
    $produits = [];
    $nbprod = 1;
} else {
    $nbprod = sizeof($produits);
    foreach ($produits as $p) {
        foreach ($categories as $cat) {
            if ($p->getsouscategorie() == $cat->getid()) {
                $p->setsouscategorie($cat->getnom());
            }
        }
    }
}

$page = 1;
//Verification : S'il a cliqué pour changer la page
if (isset($_POST['page'])) {
    $page = $_POST['page'];
}
//Le nombre de boutons à afficher. Une page affiche 10 produits. ken 3anna 100 produits on aura 10 pages. FHEMT ???!!!!!!
$buttoncount = ceil($nbprod / 10);


//Ba3d el traitement wel ham hedha lkol, on redirige l'admin vers la page.
require_once('../../Views/admin/produit/produit.php');
?>