<?php

class Produit
{
    private $id;
    private $nom;
    private $description;
    private $prix;
    private $prixpromo;
    private $quantite;
    private $marque;
    private $file;
    private $souscategorie;
    private $temporaire;

    public function getid()
    {
        return $this->id;
    }

    public function getnom()
    {
        return $this->nom;
    }

    public function getdescription()
    {
        return $this->description;
    }

    public function getprix()
    {
        return $this->prix;
    }

    public function getprixpromo()
    {
        return $this->prixpromo;
    }
    public function gettemporaire()
    {
        return $this->temporaire;
    }
    public function settemporaire($tmp){
        $this->temporaire = $tmp;
    }

    public function setprixpromo($prixpromo)
    {
        $this->prixpromo = $prixpromo;
    }

    public function getquantite()
    {
        return $this->quantite;
    }

    public function getfile()
    {
        return $this->file;
    }

    public function getmarque()
    {
        return $this->marque;
    }

    public function getsouscategorie()
    {
        return $this->souscategorie;
    }

    public function setsouscategorie($cat)
    {
        $this->souscategorie = $cat;
    }

    public function __construct($id, $nom, $description, $prix, $prixpromo, $quantite, $marque, $souscategorie, $file)
    {

        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->prixpromo = $prixpromo;
        $this->quantite = $quantite;
        $this->marque = $marque;
        $this->souscategorie = $souscategorie;
        $this->file = $file;
    }
    public function toString()
    {
        return
            '{ Id: ' . $this->id .
            ' Nom: ' . $this->nom .
            ' Description: ' . $this->description .
            ' Prix: ' . $this->prix .
            ' Quantite: ' . $this->quantite .
            ' Marque: ' . $this->marque .
            ' Categorie: ' . $this->souscategorie .
            ' File: ' . $this->file .
            ' }<br>';
    }

}