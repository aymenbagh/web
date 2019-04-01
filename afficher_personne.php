<?php
include "../entities/personne.php" ;

if ( isset($_GET['pseudo']) && isset($_GET['nom']) && isset($_GET['cp']) ) 
{
	$cin=$_GET['pseudo'];
    $nom=$_GET['nom'];
	$prenom=$_GET['cp'];
	
	if( !empty($_GET['pseudo']) && !empty($_GET['nom']) && !empty($_GET['cp']) )
	{
		$compte=new Compte($pseudo,$nom,$prenom);
		?>



		<h1> Bienvenue </h1>
		<label> pseudo: </label>
		<label> <?php echo $compte->getpseudo(); ?> </label> <br>
		<label> Nom: </label>
		<label> <?php echo $compte->getnom(); ?> </label> <br>
		<label> cp: </label>
		<label> <?php echo $compte->getcp(); ?> </label> <br>

<?php
    }
}
?>