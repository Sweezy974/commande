CREATE DATABASE sqlserver;
USE `sqlserver`;

CREATE TABLE `sale_document` (
  `id` int(11) UNSIGNED NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `CustomerId` varchar(11) NOT NULL,
  `DocumentState` int(1) NOT NULL,
  `DocumentType` int(1) NOT NULL,
  `DocumentNumber` int(6) NOT NULL,
  `sysCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DeliveryAddress_Address` text NOT NULL,
  `DeliveryAddress_ZipCode` int(6) NOT NULL,
  `DeliveryAddress_City` varchar(255) NOT NULL,
  `InvoicingAddress_Address` text NOT NULL,
  `InvoicingAddress_ZipCode` int(6) NOT NULL,
  `InvoicingAddress_City` varchar(255) NOT NULL,
  `InvoicingContact_Phone` varchar(255) NOT NULL,
  `InvoicingContact_CellPhone` varchar(255) NOT NULL,
  `InvoicingContact_Email` varchar(255) NOT NULL,
  `InvoicingContact_Name` varchar(255) NOT NULL,
  `InvoicingContact_FirstName` varchar(255) NOT NULL,
  `AmountVatExcluded` varchar(255) NOT NULL,
  `DepositAmount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `devis_ebp`
--

INSERT INTO `sale_document` (`id`,`DocumentNumber`,`DocumentType`,`DocumentState`, `sysCreatedDate`,`CustomerId`, `CustomerName`, `InvoicingAddress_Address`, `InvoicingAddress_ZipCode`, `InvoicingAddress_City`, `DeliveryAddress_Address`, `DeliveryAddress_ZipCode`, `DeliveryAddress_City`, `InvoicingContact_Phone`, `InvoicingContact_CellPhone`, `InvoicingContact_Email`, `InvoicingContact_Name`, `InvoicingContact_FirstName`,`AmountVatExcluded`, `DepositAmount`) VALUES
(124, 9730,8,1,'2017-06-24 08:35:13',5405,'CENTRE COMMERCIAL BEL AIR', '145 RUE DU BEL-AIR', 97450, 'SAINT LOUIS', '145 RUE DU BEL-AIR', 97450, 'SAINT LOUIS',       '0262 31 91 80', '0692655653', 'belair-comm@gmail.com','MARTIN', 'MONIQUE','594.70 €', '189.60 €'),
(125, 0480,8,1,'2017-06-24 08:35:00',4555,'LA VARANGUE',               '8 RUE DE L OASIS', 97434, 'SAINT GILLES', '8 ROCADE DE L\'OASIS', 97434, 'SAINT GILLES',     '0262 30 20 40', '0692 65 65 71', 'lagrandevarangue@live.fr','MOREAU', 'HERVÉ', '1,731.64 €', '560.00 €'),
(126, 8408,6,0,'2017-06-24 08:30:14',6977,'MR CHONG',                  ' CHEMIN DU RUISSEAU BLANC', 97420, 'LE PORT', ' CHEMIN DU RUISSEAU BLANC', 97420, 'LE PORT', '0262 41 28 65', '0692 68 68 36', 'drchong@wanadoo.fr', 'PHILIPPE', 'FRANCIS','1,354.13 €', '431.29 €'),
(127, 8800,7,1,'2017-06-24 08:30:19',1827,'MME JEANNE BARTE ',         '29 CHEMIN BERNARD', 97410, 'LE TAMPON', '29 CHEMIN BERNARD', 97410, 'LE TAMPON',             '0262 57 04 06', '0692 85 14 59', 'jb974@laposte.net', 'BARTE', 'JEANNE','0.00 €', '0.00 €'),
(128, 0054,8,1,'2017-06-24 08:30:25',2873,'MR GEORGE DELAUNAY',        '4 RUE MONGOLIA', 97470, 'SAINT BENOIT', '4 RUE MONGOLIA', 97470, 'SAINT BENOIT',             '0692 84 78 25', '0692 84 78 25', 'george@gmail.com', 'DELAUNAY', 'GEORGE', '597.68 €', '0.00 €');

-- --------------------------------------------------------

CREATE DATABASE uflow;
USE `uflow`;
-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 24 Juin 2017 à 08:40
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `uflow`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) UNSIGNED NOT NULL,
  `lib` varchar(255) DEFAULT NULL,
  `description` text,
  `etat` int(11) DEFAULT NULL COMMENT '0 : non actif : 1 : actif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `lib`, `description`, `etat`) VALUES
(1, 'SuperUsers', 'Groupe des administrateurs', 1),
(2, 'Technicien', 'Groupe des techniciens', 1),
(3, 'Administratif', 'Groupe des administratifs', 1),
(4, 'Responsable technique', 'Groupe des responsables techniques', 1),
(5, 'Commercial', 'Groupe des commerciaux', 1),
(6, 'Client', 'Groupe des clients', 1),
(7, 'Opérateur', 'Groupe des opérateurs', 1);

-- --------------------------------------------------------

--
-- Structure de la table `modules_commandes`
--

CREATE TABLE `modules_commandes` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_createur` int(5) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `numero_devis` varchar(10) NOT NULL,
  `numero_comptable` varchar(11) NOT NULL,
  `raison_sociale` varchar(255) NOT NULL,
  `adresse_facturation` text NOT NULL,
  `cp_facturation` int(6) NOT NULL,
  `ville_facturation` varchar(255) NOT NULL,
  `adresse_livraison` text NOT NULL,
  `cp_livraison` int(6) NOT NULL,
  `ville_livraison` varchar(255) NOT NULL,
  `tel1` varchar(255) NOT NULL,
  `tel2` varchar(255) NOT NULL,
  `mail1` varchar(255) NOT NULL,
  `mail2` varchar(255) NOT NULL,
  `nom_responsable` varchar(255) NOT NULL,
  `prenom_responsable` varchar(255) NOT NULL,
  `materiel` text NOT NULL,
  `telesurveillance` varchar(5) NOT NULL,
  `videosurveillance` varchar(5) NOT NULL,
  `commentaires` text NOT NULL,
  `main_oeuvre` varchar(5) NOT NULL,
  `travaux_hauteur` varchar(5) NOT NULL,
  `cable_moulure` varchar(5) NOT NULL,
  `tranche_ext` varchar(5) NOT NULL,
  `cable_plafond` varchar(5) NOT NULL,
  `tube_iro` varchar(5) NOT NULL,
  `achat_location` varchar(12) NOT NULL,
  `engagement` int(3) NOT NULL,
  `montant_devis` varchar(255) NOT NULL,
  `acompte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `modules_commandes`
--

-- INSERT INTO `modules_commandes` (`id`, `id_createur`, `date_creation`, `numero_devis`, `numero_comptable`, `raison_sociale`, `adresse_facturation`, `cp_facturation`, `ville_facturation`, `adresse_livraison`, `cp_livraison`, `ville_livraison`, `tel1`, `tel2`, `mail1`, `mail2`, `nom_responsable`, `prenom_responsable`, `materiel`, `telesurveillance`, `videosurveillance`, `commentaires`, `main_oeuvre`, `travaux_hauteur`, `cable_moulure`, `tranche_ext`, `cable_plafond`, `tube_iro`, `achat_location`, `engagement`, `montant_devis`, `acompte`) VALUES
-- (124, 1, '2017-06-24 08:35:13', 'CC964', 'TS09205', 'CENTRE COMMERCIAL BEL AIR', '145 RUE DU BEL-AIR', 97450, 'SAINT LOUIS', '145 RUE DU BEL-AIR', 97450, 'SAINT LOUIS', '0262 31 91 80', '0692655653', 'belair-comm@gmail.com', '', 'MARTIN', 'MONIQUE', '1 CARTOUCHE NAT 150 M3', 'oui', 'oui', '000', '03:00', 'oui', 'oui', 'oui', 'oui', 'oui', 'vente', 0, '594.70 €', '189.60 €'),
-- (125, 5, '2017-06-24 08:35:00', 'CC907', 'CL06725', 'LA VARANGUE', '8 RUE DE L OASIS', 97434, 'SAINT GILLES', '8 ROCADE DE L\'OASIS', 97434, 'SAINT GILLES', '0262 30 20 40', '0692 65 65 71', 'lagrandevarangue@live.fr', '', 'MOREAU', 'HERVÉ', '1 CARTE CW32 - 1 CARTE EMETTEUR - RECEPTEUR RADIO -  1 CLAVIER RADIO  CW32 - 1 CARTE CHIMIQUE - 1 CARTOUCHE NAT 150 M3', 'oui', 'non', 'CONSERVER CENTRALE EXISTANTE ( SUMIT ) COMME ALIMENTATION\nPLACER CLAVIER CW32 DANS COFFRET EXTERIEUR.\nFOURNIR BATTERIE 13 VOLT 7AH POUR CENTRALE ET 1 BATTERIE 12 VOLT 2 AH POUR LA SIRENE EXTERIEURE  ARJOUTER SUR LE BON EN COMPLEMENT MATERIELS\n', '08:00', 'non', 'non', 'non', 'non', 'non', 'vente', 0, '1,731.64 €', '560.00 €'),
-- (126, 88, '2017-06-24 08:30:14', 'CC0945', 'GO0819', 'MR CHONG', ' CHEMIN DU RUISSEAU BLANC', 97420, 'LE PORT', ' CHEMIN DU RUISSEAU BLANC', 97420, 'LE PORT', '0262 41 28 65', '0692 68 68 36', 'drchong@wanadoo.fr', '', 'PHILIPPE', 'FRANCIS', 'pack focus particulier:\n2 détecteurs avec 11 contacts ', 'non', 'non', 'AUCUN', '10:00', 'non', 'non', 'non', 'non', 'non', 'vente', 0, '1,354.13 €', '431.29 €'),
-- (127, 88, '2017-06-24 08:30:19', 'CC0997', 'GO0348', 'MME JEANNE BARTE ', '29 CHEMIN BERNARD', 97410, 'LE TAMPON', '29 CHEMIN BERNARD', 97410, 'LE TAMPON', '0262 57 04 06', '0692 85 14 59', 'jb974@laposte.net', '', 'BARTE', 'JEANNE', '1 PACK HABITATION FOCUS\n1 CENTRALE AVEC 2 TELECOMMANDES 3 RADARS ET 8 CONTACTS', 'oui', 'non', 'AUCUN', '07:00', 'non', 'non', 'non', 'non', 'non', 'location', 24, '0.00 €', '0.00 €'),
-- (128, 88, '2017-06-24 08:30:25', 'CC0989', 'GO0798', 'MR GEORGE DELAUNAY', '4 RUE MONGOLIA', 97470, 'SAINT BENOIT', '4 RUE MONGOLIA', 97470, 'SAINT BENOIT', '0692 84 78 25', '0692 84 78 25', 'george@gmail.com', '', 'DELAUNAY', 'GEORGE', 'PACK HABITATION FOCUS : 1 CENTRALE , 2 TELECOMMANDES, 3 RADARS ET 8 CONTACTS PORTE', 'oui', 'non', 'AUCUN', '07:00', 'non', 'non', 'non', 'non', 'non', 'location', 24, '597.68 €', '0.00 €');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL DEFAULT '',
  `nom` varchar(255) NOT NULL DEFAULT '',
  `prenom` varchar(255) NOT NULL DEFAULT '',
  `pwd` text NOT NULL,
  `date` datetime NOT NULL,
  `last` datetime DEFAULT NULL,
  `droits` int(11) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `avatar` text,
  `id_group` int(11) UNSIGNED DEFAULT NULL,
  `signature` text,
  `etat` int(11) DEFAULT NULL COMMENT '1 : actif; 0 : non actif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `nom`, `prenom`, `pwd`, `date`, `last`, `droits`, `mail`, `avatar`, `id_group`, `signature`, `etat`) VALUES
(5, 'user1', 'user', 'user', 'fc9fbcddb038ef7bc06147f96728f5ec', '2016-09-14 00:00:00', '2017-06-07 09:20:07', 235397440, 'user1@grouptlc.re', NULL, 4, '5.png', NULL),
(51, 'user2', 'user', 'user', '73319e02623f5ea8b0a8d3a7fc3c5aa3', '2016-09-14 00:00:00', '2017-06-08 13:34:33', 236974531, 'user2@grouptlc.re', NULL, 2, '51.png', NULL),
(70, 'user3', 'user', 'user', '4b045e1dbf31ec93a9b4d20d18761371', '2016-09-14 00:00:00', '2017-06-02 15:26:27', 251656191, 'user3@grouptlc.re', NULL, 3, '70.png', NULL),
(72, 'user4', 'user', 'user', '81dc9bdb52d04dc20036dbd8313ed055', '2016-09-14 00:00:00', '2017-05-03 09:40:15', 235925504, 'user4@grouptlc.re', NULL, 2, '72.png', NULL),
(81, 'frederic', 'BOYER', 'Frédéric', '01df32998cb49083a65574ea325d2c36', '2016-09-14 00:00:00', '2017-06-07 21:10:25', 14671935, 'fred@boy.fr', NULL, 1, '81.png', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modules_commandes`
--
ALTER TABLE `modules_commandes`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
ADD KEY `id_group` (`id_group`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `modules_commandes`
--
ALTER TABLE `modules_commandes`
MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `id_group` FOREIGN KEY (`id_group`) REFERENCES `groupe` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
