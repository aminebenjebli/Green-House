<?php

class Remise
{
    private $idRemise = null;
    private $dateDebut = null;
    private $dateFin = null;
    private $Produit = null;
    private $porcentage = null;


    function __construct($dateDebut, $dateFin, $Produit, $porcentage)
    {
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->Produit = $Produit;
        $this->porcentage = $porcentage;

    }

    public function getIdRemise()
    {
        return $this->idRemise;
    }


    public function setIdRemise($idRemise)
    {
        $this->idRemise = $idRemise;
    }


    public function getDateDebut()
    {
        return $this->dateDebut;
    }


    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }


    public function getDateFin()
    {
        return $this->dateFin;
    }


    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }


    public function getProduit()
    {
        return $this->Produit;
    }


    public function setProduit($Produit)
    {
        $this->Produit = $Produit;
    }


    public function getPorcentage()
    {
        return $this->porcentage;
    }


    public function setPorcentage($porcentage)
    {
        $this->porcentage = $porcentage;
    }


}

?>