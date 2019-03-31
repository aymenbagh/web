<?php

class SousCategorie
{
    private $id;
    private $nom;
    private $categorie;
    private $productcount;

    public function getid()
    {
        return $this->id;
    }

    public function getnom()
    {
        return $this->nom;
    }

    public function getcategorie()
    {
        return $this->categorie;
    }

    public function getproductcount()
    {
        return $this->productcount;
    }
    public function setproductcount($productcount)
    {
        $this->productcount = $productcount;
    }

    public function __construct($id, $nom, $categorie)
    {

        $this->id = $id;
        $this->nom = $nom;
        $this->categorie = $categorie;
    }

}