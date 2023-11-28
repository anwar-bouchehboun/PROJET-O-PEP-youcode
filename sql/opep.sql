
CREATE TABLE `catégorie` (
  `id_cat` int(11) NOT NULL,
  `nomcat` varchar(255) NOT NULL
) ;



INSERT INTO `catégorie` (`id_cat`, `nomcat`) VALUES
(19, 'Fleurs coupées'),
(18, 'Fleurs de jardin'),
(15, 'Fleurs des champs'),
(23, 'Fleurs GREEN'),
(21, 'Fleurs printanières'),
(10, 'Fleurs rouges'),
(22, 'Fleurs simples ');


--
CREATE TABLE `commande` (
  `idcommande` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `idutli` int(11) DEFAULT NULL,
  `idplant` int(11) NOT NULL
) ;


INSERT INTO `commande` (`idcommande`, `date`, `idutli`, `idplant`) VALUES
(53, '2023-11-28 11:50:00', 50, 36),
(54, '2023-11-28 18:16:42', 50, 36),
(55, '2023-11-28 18:17:19', 52, 37),
(56, '2023-11-28 19:37:02', 50, 37);



CREATE TABLE `panier` (
  `idpanier` int(11) NOT NULL,
  `idpalante` int(11) NOT NULL,
  `idutili` int(11) NOT NULL
) ;


CREATE TABLE `panpla` (
  `idpanier` int(11) NOT NULL,
  `idplante` int(11) NOT NULL,
  `QTE` int(11) NOT NULL DEFAULT 1
) ;


CREATE TABLE `plantes` (
  `idplante` int(11) NOT NULL,
  `nomplante` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `idcat` int(11) NOT NULL
) ;


INSERT INTO `plantes` (`idplante`, `nomplante`, `image`, `prix`, `idcat`) VALUES
(33, 'FLEUR', 'IMG-6563b1afda6bd9.13343151.jpeg', 2000, 19),
(36, ' Acanthe ', 'IMG-6565c4ef6eac35.86478796.jpeg', 300, 18),
(37, 'Agave', 'IMG-6565c507072832.78064402.jpg', 500, 15),
(38, ' Aloès', 'IMG-6565c525c476e4.23847604.jpeg', 400, 19),
(39, 'CAPITATA', 'IMG-6565c56e178e62.24049019.jpg', 1000, 18),
(40, 'Balsamine', 'IMG-65662226e75094.04032143.jpg', 400, 21),
(41, 'Classification  BARIFS', 'IMG-6566333d643657.68343151.jpg', 300, 23);



CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `Role` varchar(60) NOT NULL
) ;


INSERT INTO `role` (`idRole`, `Role`) VALUES
(1, 'admin'),
(2, 'client');



CREATE TABLE `utlisateur` (
  `id_utlisateur` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idRole` int(11) DEFAULT NULL
) ;



INSERT INTO `utlisateur` (`id_utlisateur`, `nom`, `prenom`, `email`, `password`, `idRole`) VALUES
(47, 'Anwar', 'Bouchehboun', 'anouar.ab95@gmail.com', '$2y$10$yUzJSDgz1jOd7lxexRDl5OBOALY8e3wSwAFbvlQW76VRi.htGYSvq', 1),
(50, 'Anwar', 'Bouchehboun', 'ab95@gmail.com', '$2y$10$Vyc/PuPasGDeoG7ZxMntreDWA6Sog0eU4ksJPZw4ng1ZBjJ5rD9nC', 2),
(52, 'AHMDE', 'ZIZO', 'bhbn.ab95@gmail.com', '$2y$10$N6y0K9C0TR2mIIrWhS/AMe6l5XyLml2Cfvb9qcLfJg7NiS0LeIAiW', 2);

ALTER TABLE `catégorie`
  ADD PRIMARY KEY (`id_cat`),
  ADD UNIQUE KEY `CAT` (`nomcat`);


ALTER TABLE `commande`
  ADD PRIMARY KEY (`idcommande`),
  ADD KEY `cmmndfkutli` (`idutli`),
  ADD KEY `fkk` (`idplant`);


ALTER TABLE `panier`
  ADD PRIMARY KEY (`idpanier`),
  ADD KEY `fk4` (`idutili`);


ALTER TABLE `panpla`
  ADD PRIMARY KEY (`idplante`,`idpanier`),
  ADD KEY `panpla_ibfk_1` (`idpanier`);


ALTER TABLE `plantes`
  ADD PRIMARY KEY (`idplante`),
  ADD KEY `cle_fk` (`idcat`);

ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`),
  ADD UNIQUE KEY `role` (`Role`);


ALTER TABLE `utlisateur`
  ADD PRIMARY KEY (`id_utlisateur`),
  ADD UNIQUE KEY `uniqueemail` (`email`),
  ADD KEY `nom_contrainte_fk` (`idRole`);



ALTER TABLE `commande`
  ADD CONSTRAINT `cmmndfkutli` FOREIGN KEY (`idutli`) REFERENCES `utlisateur` (`id_utlisateur`),
  ADD CONSTRAINT `fkk` FOREIGN KEY (`idplant`) REFERENCES `plantes` (`idplante`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `panier`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`idutili`) REFERENCES `utlisateur` (`id_utlisateur`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `panpla`
  ADD CONSTRAINT `panpla_ibfk_1` FOREIGN KEY (`idpanier`) REFERENCES `panier` (`idpanier`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `plantes`
  ADD CONSTRAINT `cle_fk` FOREIGN KEY (`idcat`) REFERENCES `catégorie` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `utlisateur`
  ADD CONSTRAINT `nom_contrainte_fk` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);
COMMIT;

