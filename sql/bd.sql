create database opep
use opep
CREATE TABLE `role` (`idRole` INT NOT NULL AUTO_INCREMENT , `Role` VARCHAR(60) NOT NULL , PRIMARY KEY (`idRole`), UNIQUE `role` (`Role`)) ;
CREATE TABLE `utlisateur` (`id_utlisateur` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(200) NOT NULL , `prenom` VARCHAR(200) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `idRole` INT NULL , PRIMARY KEY (`id_utlisateur`), UNIQUE `uniqueemail` (`email`(255))) ;
ALTER TABLE utlisateur
ADD CONSTRAINT nom_contrainte_fk
FOREIGN KEY (idrole)
REFERENCES role (idRole);
CREATE TABLE `panier` (`idpanier` INT NOT NULL AUTO_INCREMENT , `nompanier` VARCHAR(60) NOT NULL , PRIMARY KEY (`idpanier`)) 
;
CREATE TABLE `PAnPLA (`idpanier` INT NOT NULL , `idplante` INT NOT NULL , PRIMARY KEY (`idplante`,`idpanier`)) ;
ALTER TABLE `panpla` ADD CONSTRAINT `test` FOREIGN KEY (`idpanier`) REFERENCES `panier`(`idpanier`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `panpla` ADD CONSTRAINT `trest2` FOREIGN KEY (`idplante`) REFERENCES `plantes`(`idplante`) ON DELETE CASCADE ON UPDATE CASCADE;
CREATE TABLE commande (`idcommande` INT NOT NULL AUTO_INCREMENT , `date` DATE NOT NULL , `idpanier` INT NOT NULL , PRIMARY KEY (`idcommande`));
ALTER TABLE `commande` ADD CONSTRAINT `fk` FOREIGN KEY (`idpanier`) REFERENCES `panier`(`idpanier`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `panier` ADD CONSTRAINT `fkid` FOREIGN KEY (`idutili`) REFERENCES `utlisateur`(`id_utlisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;