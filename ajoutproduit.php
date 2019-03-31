<?php
require_once("../../Entites/produit.php");
require_once("../../Entites/categorie.php");
require_once("../../Entites/souscategorie.php");
require_once("../../connection.php");
//initialisation de la connexion à la base de données.
$db = Db::getInstance();
//si l'utilisation a rempli le formulaire
if (isset($_POST['form_submitted'])) {
    //verification des champs facultatifs
    //verif description
    if (isset($_POST['description_input'])) {
        $description = $_POST['description_input'];
    } else {
        $description = "";
    }
    //verif image
    if (isset($_FILES['photo_input']['name'])) {
        $photo = uploadImageProduit();
    }
    //recuperation des champs
    $nom = $_POST['nom_input'];
    $prix = $_POST['prix_input'];
    $prixpromo = $_POST['prix_input'];
    $quantite = $_POST['quantite_input'];
    $marque = $_POST['marque_input'];
    $categorie = $_POST['categorie_input'];

    //on execute la requete d'ajout
    $req = "INSERT INTO produit(nom,description,prix,prixpromo,quantite,marque,idsc,file) VALUES
('$nom','$description',$prix,$prixpromo,$quantite,'$marque',$categorie,'$photo')";
    echo $req;
    $db->query($req);

    require_once('./listeproduit.php');

    //s'il n'a rien cliqué, juste y7eb 3al formulaire d'ajout
} else {
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
    require_once('../../Views/admin/produit/ajoutproduit.php');
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
                echo $_SERVER["DOCUMENT_ROOT"].'/ecomerce/assets';
                move_uploaded_file($_FILES['photo_input']['tmp_name'],$_SERVER["DOCUMENT_ROOT"].'/ecommerce/assets/img/product/' . $new_file_name);
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
