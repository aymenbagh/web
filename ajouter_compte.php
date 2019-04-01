<?php
include "../entities/personne.php";
include "../core/personneC.php";

if (isset($_GET['pseudo']) && isset($_GET['mdp']) && isset($_GET['mdp2']) && isset($_GET['mail']) && isset($_GET['nom'])&&isset($_GET['cp']))
{
	$pseudo=$_GET['pseudo'];
	$mdp=$_GET['mdp'];
	$mdp2=$_GET['mdp2'];
	$nom=$_GET['mail'];
	$mail=$_GET['nom'];
	$cp  =$_GET['cp'];

	if (isset($_GET['pseudo']) && isset($_GET['mdp']) && isset($_GET['mdp2']) && isset($_GET['mail']) && isset($_GET['nom'])&&isset($_GET['cp']))
	{

$c=new Compte($pseudo,$mdp,$mdp2,$mail,$nom,$cp);
$CompteC=new CompteC();
$mes=$CompteC->ajouterCompte($c);
		if ($mes==true) 
		{
			echo "ajout avec succees";
		}
		else
			echo 'manaresh';
			//header('Location:inscrire.html');
	}
}

 
?>



