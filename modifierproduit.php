<?php
require_once("../../Entites/produit.php");
require_once("../../Entites/categorie.php");
require_once("../../Entites/souscategorie.php");
require_once("../../connection.php");
//initialisation de la connexion à la base de données.
$db = Db::getInstance();
//on recupere les categories et les sous categories elli 3anna (nest7a9oulhom fel <select>
$resultat = $db->query("SELECT * FROM categorie");
while ($res = mysqli_fetch_array($resultat)) {
    $categories[] = new Categorie($res['id'], $res['nom']);
}
foreach ($categories as $categorie) {

    $id = $categorie->getid();
    $resultat = $db->query("SELECT * FROM souscategorie WHERE idcat=$id");

    while ($res = mysqli_fetch_array($resultat)) {
        $listsc[] = new SousCategorie($res['id'], $res['nom'], $res['idcat']);
    }
    $categorie->setsouscategories($listsc);
    $listsc = [];
}
//S'il a cliqué sur modifier, on récupère l'id du produit sur lequel il a cliqué depuis la page elli fiha liste
if (isset($_GET['id'])) {
    //njibou les souscategories, nest7a9oulhom mba3d fel <select>
    $resultat = $db->query("SELECT * FROM souscategorie");
    while ($res = mysqli_fetch_array($resultat)) {
        $souscategories[] = new SousCategorie($res['id'], $res['nom'], $res['idcat']);
    }
    //njibou el produit en question
    $id = $_GET['id'];
    $resultat = $db->query("SELECT * FROM produit where id=$id");
    while ($res = mysqli_fetch_array($resultat)) {
        $produit = new Produit($res['id'], $res['nom'], $res['description'], $res['prix'], $res['prixpromo'],
            $res['quantite'], $res['marque'], $res['idsc'], $res['file']);
    }
    //nlas9ou el sous categorie fel produit
    foreach ($souscategories as $sc) {
        if ($sc->getid() == $produit->getsouscategorie()) {
            $produit->setsouscategorie($sc->getnom());
        }
    }
    //nab3thou la page de modification
    require_once('../../Views/admin/produit/modifierproduit.php');
}
//S'il a cliqué sur le bouton "finish" mta3 el formulaire.
if (isset($_POST['form_submitted'])) {
    //verification des champs facultatifs
    //verif description
    if (isset($_POST['description_input'])) {
        $description = $_POST['description_input'];
    } else {
        $description = "";
    }
    //verif image
    if (empty($_FILES)) {
        $photo = uploadImageProduit();
    } else {
        $photo = $_POST['photo'];
    }
    //on recupere les champs
    $id = $_POST['id'];
    $nom = $_POST['nom_input'];
    $prix = $_POST['prix_input'];
    $prixpromo = $_POST['prix_input'];
    $quantite = $_POST['quantite_input'];
    $marque = $_POST['marque_input'];
    $categorie = $_POST['categorie_input'];
    //on execute la requete sql
    $req = "UPDATE produit SET nom='$nom', description='$description',prix=$prix,prixpromo=$prixpromo,
      quantite = $quantite,marque='$marque',idsc=$categorie, file='$photo' WHERE id=$id";
    $db->query($req);

    //Kahaw modif kemlet nraj3ou lel page listeproduits.
    require_once('./listeproduit.php');
}

function uploadImageProduit()
{
    $message = "ERROR";
    $allowedFileExtensions = ['png', 'jpeg', 'jpg'];

    $valid_file = true;
    if (!$_FILES['photo_input']['error']) {
        $message = "second if";

        //now is the time to modify the future file name and validate the file

        if ($_FILES['photo_input']['size'] > (2048000)) //can't be larger than 2 MB
        {
            $message = 'Oops!  Your file\'s size is to large.';
            $valid_file = false;
        }
        //if the file has passed the test
        if ($valid_file) {
            $filename = $_FILES['photo_input']['name'];
            $strings = explode('.', $filename);
            $extension = end($strings);
            if (in_array(strtolower($extension), $allowedFileExtensions)) {
                //move it to where we want it to be
                $new_file_name = generateRandomString() . '.' . $extension; //rename file
                move_uploaded_file($_FILES['photo_input']['tmp_name'], 'assets/img/product/' . $new_file_name);
                return $new_file_name;
            } else {
                $message = "File extension not allowed";
            }
        }

    }

    return $message;

}

function generateRandomString()
{
    $length = 15;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>