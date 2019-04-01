<?PHP
include "../core/personneC.php";
$compteC=new compteC();
if (isset($_POST["pseudo"])){
	$compteC->supprimerCompte($_POST["pseudo"]);
	header('Location:tables.php');
}

?>