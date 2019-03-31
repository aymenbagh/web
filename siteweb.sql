-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 30 mars 2019 à 17:40
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `siteweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'CAT1'),
(2, 'CAT2'),
(3, 'TEST');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `prixpromo` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `idsc` int(11) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idsc` (`idsc`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `prixpromo`, `quantite`, `marque`, `idsc`, `description`, `file`) VALUES
(36, 'Produit417.1357496056108', 0, 0, 0, 'marque X', 2, '', 'p3.jpg'),
(38, 'Produit536.2957098207397', 0, 0, 0, 'marque X', 2, '', 'p1.jpg'),
(39, 'Produit502.856827520632', 0, 0, 0, 'marque X', 2, '', 'p2.jpg'),
(40, 'Produit895.3970416406142', 0, 0, 0, 'marque X', 2, '', 'p2.jpg'),
(41, 'Produit778.4147591408479', 0, 0, 0, 'marque X', 2, '', 'p7.jpg'),
(42, 'Produit105.88270428207024', 0, 0, 0, 'marque X', 2, '', 'p4.jpg'),
(43, 'Produit364.1692774874804', 0, 0, 0, 'marque X', 2, '', 'p1.jpg'),
(44, 'Produit403.19830809086403', 0, 0, 0, 'marque X', 2, '', 'p4.jpg'),
(45, 'Produit913.4837414915521', 0, 0, 0, 'marque X', 2, '', 'p8.jpg'),
(46, 'Produit77.82381668484194', 0, 0, 0, 'marque X', 2, '', 'p4.jpg'),
(47, 'Produit908.6678924492262', 0, 0, 0, 'marque X', 2, '', 'p5.jpg'),
(48, 'Produit1029.868045691278', 0, 0, 0, 'marque X', 2, '', 'p6.jpg'),
(49, 'Produit233.33658460838402', 0, 0, 0, 'marque X', 2, '', 'p6.jpg'),
(50, 'Produit247.07881946775953', 0, 0, 0, 'marque X', 2, '', 'p4.jpg'),
(51, 'Produit525.3843770133186', 0, 0, 0, 'marque X', 2, '', 'p5.jpg'),
(52, 'Produit785.6854601629875', 0, 0, 0, 'marque X', 2, '', 'p2.jpg'),
(53, 'Produit162.2742032746544', 0, 0, 0, 'marque X', 2, '', 'p4.jpg'),
(54, 'Produit624.3146693839828', 0, 0, 0, 'marque X', 2, '', 'p1.jpg'),
(55, 'Produit444.75077059562386', 0, 0, 0, 'marque X', 2, '', 'p6.jpg'),
(56, 'Produit340.80987832584407', 0, 0, 0, 'marque X', 2, '', 'p7.jpg'),
(57, 'Produit359.7971133420217', 0, 0, 0, 'marque X', 2, '', 'p8.jpg'),
(58, 'Produit766.5559652322493', 0, 0, 0, 'marque X', 2, '', 'p4.jpg'),
(59, 'Produit563.3885196348546', 0, 0, 0, 'marque X', 2, '', 'p8.jpg'),
(60, 'Produit507.2747359771978', 0, 0, 0, 'marque X', 2, '', 'p5.jpg'),
(61, 'Produit836.2081544810983', 0, 0, 0, 'marque X', 2, '', 'p6.jpg'),
(62, 'Produit469.2165979735708', 0, 0, 0, 'marque X', 2, '', 'p7.jpg'),
(63, 'Produit917.4585599242323', 0, 0, 0, 'marque X', 2, '', 'p4.jpg'),
(64, 'Produit989.6430392001225', 0, 0, 0, 'marque X', 2, '', 'p6.jpg'),
(65, 'Produit1095.8395497275885', 0, 0, 0, 'marque X', 2, '', 'p1.jpg'),
(66, 'Produit320.2686645372479', 0, 0, 0, 'marque X', 2, '', 'p1.jpg'),
(67, 'Produit483.82470700314707', 0, 0, 0, 'marque X', 2, '', 'p8.jpg'),
(68, 'Produit358.31757490366476', 0, 0, 0, 'marque X', 2, '', 'p1.jpg'),
(69, 'Produit330.11378700855545', 0, 0, 0, 'marque X', 2, '', 'p2.jpg'),
(70, 'Produit565.6162438314559', 0, 0, 0, 'marque X', 2, '', 'p7.jpg'),
(71, 'Produit737.7398916312865', 0, 0, 0, 'marque X', 2, '', 'p2.jpg'),
(72, 'Produit891.8507601617378', 0, 0, 0, 'marque X', 2, '', 'p4.jpg'),
(73, 'Produit56.034159414502014', 0, 0, 0, 'marque X', 2, '', 'p4.jpg'),
(74, 'Produit864.61855008697', 0, 0, 0, 'marque X', 2, '', 'p8.jpg'),
(75, 'Produit874.9903056910172', 0, 0, 0, 'marque X', 2, '', 'p8.jpg'),
(76, 'Produit681.0959116938485', 0, 0, 0, 'marque X', 2, '', 'p4.jpg'),
(77, 'Produit770.5086748958646', 0, 0, 0, 'marque X', 2, '', 'p3.jpg'),
(78, 'Produit709.2556728974503', 0, 0, 0, 'marque X', 2, '', 'p2.jpg'),
(79, 'Produit134.75237329933083', 0, 0, 0, 'marque X', 2, '', 'p7.jpg'),
(80, 'Produit715.9948813039762', 0, 0, 0, 'marque X', 2, '', 'p7.jpg'),
(81, 'Produit985.7173201215614', 0, 0, 0, 'marque X', 2, '', 'p1.jpg'),
(82, 'Produit590.6019901955519', 0, 0, 0, 'marque X', 2, '', 'p3.jpg'),
(83, 'Produit1075.858024112748', 0, 0, 0, 'marque X', 2, '', 'p6.jpg'),
(84, 'test', 45, 45, 10, 'test', 4, ' qsdsqdqsdqsdqs', 'ERROR'),
(85, 'aa', 222, 222, 15, 'aaa', 1, 'aaaaaaaa', 'yci7386LsNVinhs.jpg'),
(86, 'ss', 0.04, 0.04, 4, 'sdfg', 2, 'zedfgh', 'ERROR');

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

DROP TABLE IF EXISTS `souscategorie`;
CREATE TABLE IF NOT EXISTS `souscategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `idcat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_categorie` (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `souscategorie`
--

INSERT INTO `souscategorie` (`id`, `nom`, `idcat`) VALUES
(1, 'sc1', 1),
(2, 'sc2', 2),
(3, 'sc3', 1),
(4, 'sc4', 2),
(5, 'sc5', 2),
(6, 'TEST', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idsc`) REFERENCES `souscategorie` (`id`);

--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `FK_categorie` FOREIGN KEY (`idcat`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
