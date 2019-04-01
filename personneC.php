<?php

  include "../config.php";
  class CompteC {

	function ajouterCompte($Compte){
		$sql="insert into compte (pseudo,mdp2,mail,nom,cp,mdp) values (:pseudo,:mdp2,:mail,:nom,:cp,:mdp)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $pseudo=$Compte->getPseudo();
        $nom=$Compte->getNom();
        $mdp=$Compte->getMdp();
        $mdp2=$Compte->getMdp2();
        $cp=$Compte->getCp();
        $mail=$Compte->getMail();
		$req->bindValue(':pseudo',$pseudo);
		$req->bindValue(':mdp2',$mdp2);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':nom',$nom);
				$req->bindValue(':cp',$cp);
				

		$req->bindValue(':mdp',$mdp);
		
            $req->execute();
            echo 'oko';
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function afficherCompte(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From compte";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
    function supprimerCompte($pseudo){
        $sql="DELETE FROM compte where pseudo= :pseudo";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':pseudo',$pseudo);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifierCompte($compte,$pseudo){
        $sql="UPDATE compte SET pseudo=:pseudon, mdp2=:mdp2,mail=:mail,nom=:nom,cp=:cp,mdp=:mdp WHERE pseudo=:pseudo";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $pseudon=$compte->getPseudo();
        $mdp2=$compte->getMdp2();
        $mail=$compte->getMail();
        $nom=$compte->getNom();
        $cp=$compte->getCp();
        $mdp=$compte->getMdp();
        $datas = array(':pseudon'=>$pseudon, ':pseudo'=>$pseudo, ':mdp2'=>$mdp2,':mail'=>$mail,':nom'=>$nom,':cp'=>$cp, ':mdp'=>$mdp);
        $req->bindValue(':pseudon',$pseudon);
        $req->bindValue(':pseudo',$pseudo);
        $req->bindValue(':mdp2',$mdp2);
        $req->bindValue(':mail',$mail);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':cp',$cp);
        $req->bindValue(':mdp',$mdp);
        
        
            $s=$req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }

}
class CarteC {

    function ajouterCarte($Carte){
        $sql="insert into carte (pseudo,mdp) values (:pseudo,:mdp)";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        $pseudo=$Carte->getPseudo();
        
        $mdp=$Carte->getMdp();
        
        
        $req->bindValue(':pseudo',$pseudo);
        $req->bindValue(':mdp',$mdp);
        
                

       
        
            $req->execute();
            echo 'oko';
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    function afficherCarte(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From carte";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    function supprimerCarte($pseudo){
        $sql="DELETE FROM carte where pseudo= :pseudo";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':pseudo',$pseudo);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    }




?>