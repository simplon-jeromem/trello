-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 29 Janvier 2016 à 11:48
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `trello2`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE IF NOT EXISTS `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `projet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projet_id` (`projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `activite`
--

INSERT INTO `activite` (`id`, `nom`, `projet`) VALUES
(1, 'salut', 20),
(23, 'bonjours', 20),
(24, 'bonjours', 20),
(25, 'passe', 20),
(26, 'bonjour', 20),
(27, 'c''est le bordel', 20);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `createur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `createur` (`createur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `nom`, `createur`) VALUES
(20, 'salut', 8),
(26, 'salut', 8);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE IF NOT EXISTS `tache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `activite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activite` (`activite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id`, `nom`, `activite`) VALUES
(1, 'test', 23),
(2, 'dire bonjours', 1),
(3, 'dire bonjours', 1),
(4, 'dire bonjours', 1),
(5, 'dire sourire', 1),
(8, 'etre gentil', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `password`) VALUES
(1, 'jerome', 'passe'),
(2, 'david', 'passe'),
(3, 'derick', 'passe'),
(4, 'jerome2', 'passe'),
(5, 'jerome3', 'passe'),
(6, 'jerome4', 'passe'),
(7, 'jerome5', 'passe'),
(8, 'jerome6', 'passe'),
(10, 'jerome7', 'passe'),
(11, 'jerome8', 'passe');

-- --------------------------------------------------------

--
-- Structure de la table `userprojet`
--

CREATE TABLE IF NOT EXISTS `userprojet` (
  `idU` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  PRIMARY KEY (`idU`,`idP`),
  KEY `idP` (`idP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `userprojet`
--

INSERT INTO `userprojet` (`idU`, `idP`) VALUES
(1, 26),
(10, 26);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `fk_projet_id` FOREIGN KEY (`projet`) REFERENCES `projet` (`id`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`createur`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`activite`) REFERENCES `activite` (`id`);

--
-- Contraintes pour la table `userprojet`
--
ALTER TABLE `userprojet`
  ADD CONSTRAINT `userprojet_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `userprojet_ibfk_2` FOREIGN KEY (`idP`) REFERENCES `projet` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
