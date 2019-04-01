<?php
include "../entities/personne.php" ;

if ( isset($_GET['cin']) && isset($_GET['nom']) && isset($_GET['prenom']) ) 
{
	$cin=$_GET['cin'];
    $nom=$_GET['nom'];
	$prenom=$_GET['prenom'];
	
	if( !empty($_GET['cin']) && !empty($_GET['nom']) && !empty($_GET['prenom']) )
	{
		$personne=new Personne($cin,$nom,$prenom);
		?>



		<h1> Bienvenue </h1>
		<label> CIN: </label>
		<label> <?php echo $personne->getcin(); ?> </label> <br>
		<label> Nom: </label>
		<label> <?php echo $personne->getnom(); ?> </label> <br>
		<label> Prenom: </label>
		<label> <?php echo $personne->getprenom(); ?> </label> <br>

<?php
    }
}
?>