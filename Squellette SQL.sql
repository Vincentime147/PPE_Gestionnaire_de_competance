CREATE TABLE Utilisateur(
    idUtilisateur int(6),
    Nom varchar(20),
    Prenom varchar(20),
    Poste varchar(50),
    PRIMARY KEY (idUtilisateur)
);
CREATE TABLE Competance(
    idCompetance int(3),
    libelle varchar(30),
    descriptionComp varchar(50),
    PRIMARY KEY (idCompetance)
);

CREATE TABLE CompetanceUtilisateur(
    idUtilisateur int(6),
    idCompetance int(3),
    nvCompetence int(2),
    PRIMARY KEY (idUtilisateur, idCompetance),
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur),
    FOREIGN KEY (idCompetance) REFERENCES Competance(idCompetance)
);
CREATE TABLE Formation(
    idFormation int(5),
    libelleFormation varchar(50),
    PRIMARY KEY (idFormation)
);
CREATE TABLE Formateur(
    idFormateur int(3),
    Nom varchar(20),
    Prenom varchar(20),
    PRIMARY KEY (idFormateur)
);
CREATE TABLE FormLink(
    idFormation int(5),
    idFormateur int(3),
    PRIMARY KEY (idFormation, idFormateur),
    FOREIGN KEY (idFormation) References Formation(idFormation),
    FOREIGN KEY (idFormateur) References Formateur(idFormateur)
);
CREATE TABLE AppreciationFormation(
    idUtilisateur int(6),
    idFormation int(5),
    commantaire varchar(560),
    etoil int(2),
   PRIMARY KEY (idUtilisateur,idFormation),
   FOREIGN KEY (idUtilisateur) References Utilisateur(idUtilisateur),
   FOREIGN KEY (idFormation) References Formation(idFormation)
);