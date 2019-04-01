 <?php
 include "../entities/personne.php" ;
 include "../core/personneC.php" ;



if ( isset($_GET['Mail']) && isset($_GET['Mail']) && isset($_GET['Object']) && isset($_GET['Message'])  ) 
{
	$Name=$_GET['Name'];
    $Mail=$_GET['Mail'];
	$Object=$_GET['Object'];
	$Message=$_GET['Message'];
}

	if( isset ($_GET['Name']) && isset($_GET['Mail']) && isset($_GET['Object']) && isset($_GET['Message']))
	{
		$p=new sav($Name,$Mail,$Object,$Message);
		$personneC=new PersonneC();
		$mes=$personneC->ajouter($p);
		if ($mes==true) 
		{
			echo "ajout avec succees";

		}
		else
			header('Location:contact.php');
		
    }





?>