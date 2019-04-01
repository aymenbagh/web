 <?php
 include "../entities/personne.php" ;
 include "../core/personner.php" ;




if ( isset($_GET['Mail']) && isset($_GET['name']) && isset($_GET['feedback']) ) 
{

    $Mail=$_GET['Mail'];
    $name=$_GET['name'];
	$feedback=$_GET['feedback'];
}

if( isset ($_GET['Mail']) && isset($_GET['name']) && isset($_GET['feedback']) )
	{
		$p=new rate($Mail,$name,$feedback);
		$personner=new Personner();
		$mes=$personner->ajouter($p);
		if ($mes==true) 
		{
			echo "ajout avec succees";

		}
		else
			header('Location:rate.php');
		
    }


?>