<?php
require_once("../../Entites/categorie.php");
require_once("../../Entites/souscategorie.php");
require_once("../../connection.php");
//initialisation de la connexion à la base de données.
$db = Db::getInstance();
$resultat = $db->query("SELECT * FROM categorie");
while ($res = mysqli_fetch_array($resultat)) {
    $categories[] = new Categorie($res['id'], $res['nom']);
}
foreach ($categories as $categorie) {
    $id= $categorie->getid();
    $resultat = $db->query("SELECT * FROM souscategorie WHERE idcat='$id'");

    while ($res = mysqli_fetch_array($resultat)) {
        $listsc[] = new SousCategorie($res['id'], $res['nom'], $res['idcat']);
    }
    $categorie->setsouscategories($listsc);
    $listsc = [];
}
$countcat = 0;
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
require_once('../../Views/admin/categorie/categorie.php');


?>