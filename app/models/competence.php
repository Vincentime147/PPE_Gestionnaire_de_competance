<?php
namespace App\models;
class competence{
    public int $idCompetance;
    public string $libelle;
    public string $descriptionComp;

    /**
     * Get the value of idCompetance
     */ 
    public function getIdCompetance()
    {
        return $this->idCompetance;
    }

    /**
     * Set the value of idCompetance
     *
     * @return  self
     */ 
    public function setIdCompetance($idCompetance)
    {
        $this->idCompetance = $idCompetance;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of descriptionComp
     */ 
    public function getDescriptionComp()
    {
        return $this->descriptionComp;
    }

    /**
     * Set the value of descriptionComp
     *
     * @return  self
     */ 
    public function setDescriptionComp($descriptionComp)
    {
        $this->descriptionComp = $descriptionComp;

        return $this;
    }
}