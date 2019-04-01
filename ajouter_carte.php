

<?php
include "../entities/personne.php";
include "../core/personneC.php";

if (isset($_GET['pseudo']) && isset($_GET['mdp']))
{
	$pseudo=$_GET['pseudo'];
	$mdp=$_GET['mdp'];
	
	if (isset($_GET['pseudo']) && isset($_GET['mdp']))
	{

$c=new Carte($pseudo,$mdp);
$CarteC=new CarteC();
$mes=$CarteC->ajouterCarte($c);
		if ($mes==true) 
		{
			echo "ajout avec succees";
		}
		else
			echo 'manaresh';
			header('Location:form-basic.html');
	}
}

 
?>
