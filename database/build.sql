/* Suppression de tables existantes */
DROP TABLE IF EXISTS Probleme;
DROP TABLE IF EXISTS Fichier;
DROP TABLE IF EXISTS Message;
DROP TABLE IF EXISTS RendezVous;
DROP TABLE IF EXISTS Disponibilite;
DROP TABLE IF EXISTS UtilisateurEtudiant;
DROP TABLE IF EXISTS UtilisateurEnseignant;
DROP TABLE IF EXISTS Enseignant;
DROP TABLE IF EXISTS Etudiant;
/*Creation des Table*/


CREATE TABLE Etudiant (
IdEtudiant INTEGER PRIMARY KEY AUTOINCREMENT,
NomEtudiant varchar(20) NOT NULL,
PrénomEtudiant varchar(20) NOT NULL,
Date_Naissance DATE NOT NULL,
Email_Etudiant varchar(50) NOT NULL,
Niveau_Etude varchar(20) NOT NULL,
NumTelephone varchar(20),
UNIQUE (IdEtudiant),
UNIQUE (Email_Etudiant)

);
CREATE TABLE Enseignant (
Id_Enseignant INTEGER PRIMARY KEY ,
NomEnseignant varchar(20) NOT NULL,
PrénomEnseignant varchar(20) NOT NULL,
Date_Naissance date NOT NULL,
Email_Enseignant varchar(50) NOT NULL,
Matière varchar(20) NOT NULL,
UNIQUE (Id_Enseignant)

);

CREATE TABLE Disponibilite (
Date_DISP datetime NOT NULL,
Id_Enseignant INTEGER,
 FOREIGN KEY(Id_Enseignant) REFERENCES Enseignant(Id_Enseignant),
 PRIMARY KEY(Date_DISP)
);

CREATE TABLE RendezVous (
Id_RDV INTEGER PRIMARY KEY ,
Date_RDV datetime NOT NULL,
Message VARCHAR
IdEtudiant INTEGER,
Id_Enseignant INTEGER,
  UNIQUE (Id_RDV,Date_RDV,IdEtudiant,Id_Enseignant),
  FOREIGN KEY(IdEtudiant) REFERENCES Etudiant(IdEtudiant),
  FOREIGN KEY(Id_Enseignant) REFERENCES Enseignant(Id_Enseignant)

);

CREATE TABLE Message (
Id_msg INTEGER PRIMARY KEY ,
IdEtudiant INTEGER,
  FOREIGN KEY(IdEtudiant) REFERENCES Etudiant(IdEtudiant)
);

CREATE TABLE Fichier (
Id_Fichier INTEGER PRIMARY KEY ,
IdEtudiant INTEGER,
  FOREIGN KEY(IdEtudiant) REFERENCES Etudiant(IdEtudiant)

);

CREATE TABLE Probleme (
Id_Pbm INTEGER PRIMARY KEY,
Nom_Pbm varchar(20),
IdEtudiant INTEGER,
  FOREIGN KEY(IdEtudiant) REFERENCES Etudiant(IdEtudiant)
);

CREATE TABLE UtilisateurEtudiant (
Id INTEGER PRIMARY KEY AUTOINCREMENT,
Email_Etudiant varchar(50),
Mot_Passe_Hashé varchar(100),
codeReinitialisation INT,
   UNIQUE (Email_Etudiant)
);

CREATE TABLE UtilisateurEnseignant (
Id INTEGER PRIMARY KEY AUTOINCREMENT,
Email_Enseignant varchar(50),
Mot_Passe_Hashé varchar(100),
   UNIQUE (Email_Enseignant)
);

