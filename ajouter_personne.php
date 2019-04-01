<?php
include "../entities/personne.php" ;
include "../core/personneC.php" ;

if ( isset($_GET['cin']) && isset($_GET['nom']) && isset($_GET['prenom']) ) 
{
	$cin=$_GET['cin'];
    $nom=$_GET['nom'];
	$prenom=$_GET['prenom'];
	
	if( !empty($_GET['cin']) && !empty($_GET['nom']) && !empty($_GET['prenom']) )
	{
		$p=new Personne($cin,$nom,$prenom);
		$personneC=new PersonneC();
		$mes=$personneC->ajouter($p);
		if ($mes==true) 
		{
			echo "ajout avec succees";
		}

    }
}
?>