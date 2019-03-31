<?php
//define('ASSETS', dirname(__FILE__).'\assets\\');
define('ASSETS', 'http://localhost/ecommerce/');

require('connection.php');
require('Entites/souscategorie.php');
require('Entites/categorie.php');
require('Entites/produit.php');

header('Location: Views/client/index.php');

?>