<?php
namespace App\models;

class DAOCompetence {
    private $cnx;

    public function __construct($cnx){
        $this->cnx = $cnx;
    }
    public function findAll($offset = 0, $limit = 20) : Array {
        $desCompetence = [];
        $requete = $this->cnx->prepare("SELECT * FROM competance LIMIT :limite OFFSET :offsets");
        $requete->bindParam("limite",$limit ,\PDO::PARAM_INT);
        $requete->bindParam("offsets",$offset, \PDO::PARAM_INT);   
        $requete->execute();
        $requete = $requete->fetchAll();

        foreach ($requete as $uneCompetence){
            $competence = new competence;
            $competence->setIdCompetance($uneCompetence["idCompetance"]);
            $competence->setLibelle($uneCompetence["libelle"]);
            $competence->setDescriptionComp($uneCompetence["descriptionComp"]);

            $desCompetence[$uneCompetence["idCompetance"]] = $competence;
        }


        return $desCompetence;
        
    }
    public function countNBComp(int $idCompetance){
        $requete = $this->cnx->prepare("SELECT COUNT(idCompetance) FROM competanceemployer WHERE idCompetance LIKE :idCompetance");
        $requete->bindParam(':idCompetance', $idCompetance);    
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