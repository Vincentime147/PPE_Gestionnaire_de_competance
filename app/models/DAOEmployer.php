<?php

namespace App\models;

class DAOEmployer 
{
    private $cnx;

    public function __construct($cnx){
        $this->cnx = $cnx;
    }

    public function findById(int $idEmployer) : ?employer{
        $requete = $this->cnx->prepare("SELECT * FROM employer WHERE idEmployer LIKE :idEmployer");
        $requete->bindParam(':idEmployer', $idEmployer);    
        $requete->execute();
        $resultat = $requete->fetch();
       
        if ($resultat){
            $employer = new employer;
            $employer->setId($resultat["idEmployer"]);
            $employer->setNom($resultat["Nom"]);
            $employer->setPrenom($resultat["Prenom"]);
            $employer->setPost($resultat["Poste"]);
            return $employer;
        }
        return null;
    }
    public function findAll($offset = 0, $limit = 60) : Array {
        $desEmployer = [];
        $requete = $this->cnx->prepare("SELECT * FROM employer LIMIT :limite OFFSET :offsets");
        $requete->bindParam("limite",$limit ,\PDO::PARAM_INT);
        $requete->bindParam("offsets",$offset, \PDO::PARAM_INT);   
        $requete->execute();
        $requete = $requete->fetchAll();

        foreach ($requete as $unEmployer){
            $employer = new employer;
            $employer->setId($unEmployer["idEmployer"]);
            $employer->setNom($unEmployer["Nom"]);
            $employer->setPrenom($unEmployer["Prenom"]);
            $employer->setPost($unEmployer["Poste"]);

            $desEmployer[$unEmployer["idEmployer"]] = $employer;
        }


        return $desEmployer;
        
    }
    public function countNBComp(int $idEmployer){
        $requete = $this->cnx->prepare("SELECT COUNT(idEmployer) FROM competanceemployer WHERE idEmployer LIKE :idEmployer");
        $requete->bindParam(':idEmployer', $idEmployer);    
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
        /*
        if ($resultat){
            $employer = new employer;
            $employer->setId($resultat["idEmployer"]);
            $employer->setNom($resultat["Nom"]);
            $employer->setPrenom($resultat["Prenom"]);
            $employer->setPost($resultat["Poste"]);
            return $employer;
        }
        return null;*/
    }
}




/*
namespace App\models;
use App\models\employer;
use PDO;

class DAOEmployer 
{
    private $cnx;

    public function __construct($cnx){
        $this->cnx = $cnx;
    }

    public function findById(int $idEmployer) : ?employer{
        $requete = $this->cnx->prepare("SELECT * FROM employer WHERE idEmployer LIKE :idEmployer");
        $requete->bindParam('idEmployer',$idEmployer);    
        $requete->execute();
        $requete = $requete->fetch();
       
        if ($requete){
            $employer = new employer();
            $caserne->getId($requete["idEmployer"]);
            $caserne->getNom($requete["Nom"]);
            $caserne->getPrenom($requete["Prenom"]);
            $caserne->getPost($requete["Poste"]);
            return $employer;
        }
        return null;
    }


}
*/
