create database opep
use opep
CREATE TABLE `role` (`idRole` INT NOT NULL AUTO_INCREMENT , `Role` VARCHAR(60) NOT NULL , PRIMARY KEY (`idRole`), UNIQUE `role` (`Role`)) ;
CREATE TABLE `utlisateur` (`id_utlisateur` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(200) NOT NULL , `prenom` VARCHAR(200) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `idRole` INT NULL , PRIMARY KEY (`id_utlisateur`), UNIQUE `uniqueemail` (`email`(255))) ;
ALTER TABLE utlisateur
ADD CONSTRAINT nom_contrainte_fk
FOREIGN KEY (idrole)
REFERENCES role (idRole);