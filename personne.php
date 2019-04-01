<?php

class Compte{
    private $pseudo;
    private $nom;
    private $mdp;
    private  $mdp2;
    private $mail;
    private $cp;
    function __construct($pseudo,$nom,$mdp,$mdp2,$mail,$cp){
        $this->pseudo=$pseudo;
        $this->nom=$nom;
        $this->mdp=$mdp;
        $this->mdp2=$mdp2;
        $this->mail=$mail;
        $this->cp=$cp;
    }
    
    function getPseudo(){
        return $this->pseudo;
    }
    function getNom(){
        return $this->nom;
    }
    function getMdp(){
        return $this->mdp;
    }
    function getMdp2 ()

{
    return $this->mdp2;
}
        function getCp(){
        return $this->cp;
    }
    function getMail(){
        return $this->mail;
    }

  
    
}
class Carte{
    private $pseudo;
    
    private $mdp;
    
    function __construct($pseudo,$mdp){
        $this->pseudo=$pseudo;
       
        $this->mdp=$mdp;
        
    }
    
    function getPseudo(){
        return $this->pseudo;
    }
    
    function getMdp(){
        return $this->mdp;
    }
    

  
    
}
?>