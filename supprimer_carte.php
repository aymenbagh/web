<?PHP
include "../core/personneC.php";
$carteC=new carteC();
if (isset($_POST["pseudo"])){
	$carteC->supprimerCarte($_POST["pseudo"]);
	header('Location:tables.php');
}

?>