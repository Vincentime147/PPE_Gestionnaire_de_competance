<?php
namespace App\models;

class competenceEmpl {
    public int $idEmployer;
    public int $idCompetance;
    public int $nvCompetence;

    /**
     * Get the value of idEmployer
     */ 
    public function getIdEmployer()
    {
        return $this->idEmployer;
    }

    /**
     * Set the value of idEmployer
     *
     * @return  self
     */ 
    public function setIdEmployer($idEmployer)
    {
        $this->idEmployer = $idEmployer;

        return $this;
    }

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
     * Get the value of nvCompetence
     */ 
    public function getNvCompetence()
    {
        return $this->nvCompetence;
    }

    /**
     * Set the value of nvCompetence
     *
     * @return  self
     */ 
    public function setNvCompetence($nvCompetence)
    {
        $this->nvCompetence = $nvCompetence;

        return $this;
    }
}