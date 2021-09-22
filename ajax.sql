-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 22 sep. 2021 à 21:11
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ajax`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ca_id` int(11) NOT NULL DEFAULT '0',
  `ca_libelle` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`ca_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ca_id`, `ca_libelle`) VALUES
(1, 'fauteuil'),
(2, 'canap'),
(3, 'chaise'),
(4, 'armoire');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `pr_id` int(11) NOT NULL DEFAULT '0',
  `pr_libelle` varchar(40) NOT NULL DEFAULT '',
  `pr_prix` decimal(18,2) NOT NULL DEFAULT '0.00',
  `pr_categorie` int(11) NOT NULL DEFAULT '0',
  `pr_image` varchar(50) NOT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`pr_id`, `pr_libelle`, `pr_prix`, `pr_categorie`, `pr_image`) VALUES
(1, 'fauteuil confortable', '50.00', 1, 'image/fauteuil_confortable.jpg'),
(2, 'fauteuil de style', '100.00', 1, 'image/fauteuil_de_style.jpg'),
(3, 'fauteuil moderne', '75.00', 1, 'image/fauteuil_moderne.jpg'),
(4, 'fauteuil de style picard', '80.00', 1, 'image/fauteuil_de_style_picard.jpg'),
(5, 'Canape en cuir', '800.00', 2, 'image/canape_en_cuir.jpg'),
(6, 'Petit canape sympa', '450.00', 2, 'image/petit_canape_sympa.jpg'),
(7, 'Canape 12 places', '2000.00', 2, 'image/canape_12_places.jpg'),
(8, 'Chaise longue', '40.00', 3, 'image/chaise_longue.jpg'),
(9, 'Chaise haute', '45.00', 3, 'image/chaise_haute.jpg'),
(10, 'Petite chaise rouge', '25.00', 3, 'image/petite_chaise_rouge.jpg'),
(11, 'Chaise bancale', '120.00', 3, 'image/chaise_bancale.jpg'),
(12, 'Chaise musicale', '250.00', 3, 'image/chaise_musicale.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `revendeur`
--

DROP TABLE IF EXISTS `revendeur`;
CREATE TABLE IF NOT EXISTS `revendeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomSociete` varchar(50) COLLATE utf8_bin NOT NULL,
  `adrMagasin` varchar(200) COLLATE utf8_bin NOT NULL,
  `nomResponsable` varchar(50) COLLATE utf8_bin NOT NULL,
  `mail` varchar(40) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `revendeur`
--

INSERT INTO `revendeur` (`id`, `nomSociete`, `adrMagasin`, `nomResponsable`, `mail`, `mdp`) VALUES
(1, 'castaing', '10 rue de la paix ', 'Sabine', 'sabine@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'donjon', '40 rue l\'imperium', 'Astartes', 'terra@gmail.com', '7c77f048a2d02e784926184a82686fa0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
