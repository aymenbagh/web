<?php

class Categorie
{
    private $id;
    private $nom;
    private $souscategories;
    private $productcount;

    public function getid()
    {
        return $this->id;
    }

    public function getnom()
    {
        return $this->nom;
    }

    public function getsouscat()
    {
        return $this->souscategories;
    }

    public function getproductcount()
    {
        return $this->productcount;
    }

    public function setproductcount($productcount)
    {
        $this->productcount = $productcount;
    }

    public function setsouscategories($list)
    {
        $this->souscategories = $list;
    }

    public function __construct($id, $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
    }


}