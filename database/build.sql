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
Id_Etudiant INT PRIMARY KEY ,
NomEtudiant varchar(20) NOT NULL,
PrénomEtudiant varchar(20) NOT NULL,
Date_Naissance date NOT NULL,
Email_Etudiant varchar(50) NOT NULL,
Niveau_Etude varchar(20) NOT NULL,
UNIQUE (Id_Etudiant)

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
Id_Etudiant INTEGER,
Id_Enseignant INTEGER,
  UNIQUE (Id_RDV,Date_RDV,Id_Etudiant,Id_Enseignant),
  FOREIGN KEY(Id_Etudiant) REFERENCES Etudiant(Id_Etudiant),
  FOREIGN KEY(Id_Enseignant) REFERENCES Enseignant(Id_Enseignant)

);

CREATE TABLE Message (
Id_msg INTEGER PRIMARY KEY ,
Id_Etudiant INTEGER,
  FOREIGN KEY(Id_Etudiant) REFERENCES Etudiant(Id_Etudiant)
);

CREATE TABLE Fichier (
Id_Fichier INTEGER PRIMARY KEY ,
Id_Etudiant INTEGER,
  FOREIGN KEY(Id_Etudiant) REFERENCES Etudiant(Id_Etudiant)

);

CREATE TABLE Probleme (
Id_Pbm INTEGER PRIMARY KEY ,
Nom_Pbm varchar(20),
Id_Etudiant INTEGER,
  FOREIGN KEY(Id_Etudiant) REFERENCES Etudiant(Id_Etudiant)

);

CREATE TABLE UtilisateurEtudiant (
Email_Etudiant varchar(50),
Mot_Passe_Hashé varchar(100),
   UNIQUE (Email_Etudiant,Mot_Passe_Hashé),
  PRIMARY KEY(Email_Etudiant)
);

CREATE TABLE UtilisateurEnseignant (
Email_Enseignant varchar(50),
Mot_Passe_Hashé varchar(100),
   UNIQUE (Email_Enseignant,Mot_Passe_Hashé),
  PRIMARY KEY(Email_Enseignant)
);
