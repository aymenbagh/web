<?php
require_once("../../Entites/produit.php");
require_once("../../Entites/categorie.php");
require_once("../../Entites/souscategorie.php");
require_once("../../connection.php");
//initialisation de la connexion à la base de données.
$db = Db::getInstance();
//Ken 7ajtou juste bel page mta3 produit we7ed (single-product)
if (isset($_GET['id'])) {
    //Kel 3ada njibou les sous categories bech na3rfou el produit mte3na fi ana wa7da
    $resultat = $db->query("SELECT * FROM souscategorie");
    while ($res = mysqli_fetch_array($resultat)) {
        $souscategories[] = new SousCategorie($res['id'], $res['nom'], $res['idcat']);
    }
    //Njibou le produit en question sur lequel on a cliqué
    $id= $_GET['id'];
    $resultat = $db->query("SELECT * FROM produit where id=$id");
    while ($res = mysqli_fetch_array($resultat)) {
        $produit=  new Produit($res['id'], $res['nom'], $res['description'], $res['prix'], $res['prixpromo'],
            $res['quantite'], $res['marque'], $res['idsc'], $res['file']);
        $produit->settemporaire($res['idsc']);
    }
    //Nlas9ou el sous categorie fel produit
    foreach ($souscategories as $sc) {
        if ($sc->getid() == $produit->getsouscategorie()) {
            $produit->setsouscategorie($sc->getnom());
        }
    }
    //Finalement on le redirige vers la page du produit.
    require_once('../../Views/client/boutique/single-product.php');


//Sinon on affiche tous les produits (boutique)
} else {
    $nbprod = 1;
    //Njibou les categories, nest7a9oulhom fel filtre a gauche
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
    //Njibou les marques, lel filtre elli a gauche
    $resultat = $db->query("SELECT DISTINCT(marque) FROM produit");
    while ($res = mysqli_fetch_array($resultat)) {
        $marques[] = $res['marque'];
    }
    //Ne7sbou 9adech famma men produit pour chaque categorie et sous categorie
    foreach ($categories as $cat) {
        $countcategorie = 0;
        foreach ($cat->getsouscat() as $sc) {
            $id = $sc->getid();
            $resultat = $db->query("SELECT COUNT(DISTINCT(p.id)) AS nombre FROM produit p INNER JOIN souscategorie sc ON p.idsc = $id");
            $data = mysqli_fetch_assoc($resultat);
            $countsouscategorie = $data['nombre'];
            $sc->setproductcount($countsouscategorie);
            $countcategorie += $countsouscategorie;
        }
        $cat->setproductcount($countcategorie);
    }

    //Ken 3mal recherche on recupere les donnes du formulaire de recherche
    if (isset($_POST['search'])) {
        $nom = $_POST['nom_input'];
        $resultat = $db->query("SELECT * FROM produit WHERE nom LIKE '%" . $name . "%' ");
        while ($res = mysqli_fetch_array($resultat)) {

            $produits[] = new Produit($res['id'], $res['nom'], $res['description'], $res['prix'], $res['prixpromo'],
                $res['quantite'], $res['marque'], $res['idsc'], $res['file']);
        }
        if (empty($produits)) {
            $produits = [];
            $nbprod = 1;
        }
        //Ken 3mal recherche en fonction de la categorie (nzel 3la categorie)
    } else if (isset($_GET['cat'])) {
        $cat = $_GET['cat'];
        $resultat = $db->query("SELECT * FROM produit WHERE idsc = $cat");
        while ($res = mysqli_fetch_array($resultat)) {

            $produits[] = new Produit($res['id'], $res['nom'], $res['description'], $res['prix'], $res['prixpromo'],
                $res['quantite'], $res['marque'], $res['idsc'], $res['file']);
        }
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
    //Ken 3mal recherche en fonction du filtre marque+prix.
    } else if (isset($_POST['verif_filtre'])) {
        $marque = $_POST['marque'];
        $min = $_POST['min'];
        $max = $_POST['max'];
        //
        $sql = "SELECT * FROM produit WHERE prix BETWEEN $min AND $max ";
        if($marque=="tout")
        {
            $conditional_sql = "";
        }else{
            $conditional_sql = "AND marque = '$marque'";
        }
        $sql .=$conditional_sql;
        $resultat = $db->query($sql);
        while ($res = mysqli_fetch_array($resultat)) {

            $produits[] = new Produit($res['id'], $res['nom'], $res['description'], $res['prix'], $res['prixpromo'],
                $res['quantite'], $res['marque'], $res['idsc'], $res['file']);
        }
        //
        $nbprod = sizeof($produits);
        foreach ($produits as $p) {
            foreach ($categories as $cat) {
                if ($p->getsouscategorie() == $cat->getid()) {
                    $p->setsouscategorie($cat->getnom());
                }
            }
        }
    //Sinon ken juste il a cliqué sur le lien boutique, on affiche tous les produits
    } else {
        $resultat = $db->query("SELECT * FROM produit");
        while ($res = mysqli_fetch_array($resultat)) {
            $produits[] = new Produit($res['id'], $res['nom'], $res['description'], $res['prix'], $res['prixpromo'],
                $res['quantite'], $res['marque'], $res['idsc'], $res['file']);
        }
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
    if (isset($_POST['page'])) {
        $page = $_POST['page'];
    }
    $buttoncount = ceil($nbprod / 10);
    require_once('../../Views/client/boutique/boutique.php');
}

?>