-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 12 oct. 2020 à 23:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21


-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `NUMENSEIGNANT` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text,
  `passe` text,
  `PRENOMENSEIGNANT` text,
  `NOMENSEIGNANT` text,
  `NUMMATIERE` text,
  PRIMARY KEY (`NUMENSEIGNANT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `NUMETUDIANT` int(11) NOT NULL AUTO_INCREMENT,
  `NUMNIVEAU` int(11) DEFAULT NULL,
  `NUMOPTION` int(11) DEFAULT NULL,
  `PRENOMETUDIANT` text,
  `NOMETUDIANT` text,
  `DATENAISSANCE` date DEFAULT NULL,
  `LIEUNAISSANCE` text,
  `ADRESSE` text,
  `TELDOM` text,
  `TELPORT` text,
  `EMAIL` text,
  PRIMARY KEY (`NUMETUDIANT`),
  KEY `FK_RELATION_2` (`NUMNIVEAU`),
  KEY `FK_RELATION_3` (`NUMOPTION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `NUMMATIERE` int(11) NOT NULL AUTO_INCREMENT,
  `NUMMODULE` int(11) DEFAULT NULL,
  `NUMSEMESTRE` int(11) NOT NULL,
  `LIBELLEMATIERE` text,
  `COEF` decimal(20,0) DEFAULT NULL,
  PRIMARY KEY (`NUMMATIERE`),
  KEY `NUMMODULE` (`NUMMODULE`),
  KEY `NUMSEMESTRE` (`NUMSEMESTRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `NUMMODULE` int(11) NOT NULL AUTO_INCREMENT,
  `NUMSEMESTRE` int(11) DEFAULT NULL,
  `LIBELLEMODULE` text,
  PRIMARY KEY (`NUMMODULE`),
  KEY `FK_RELATION_5` (`NUMSEMESTRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `NUMNIVEAU` int(11) NOT NULL AUTO_INCREMENT,
  `LIBELLENIVEAU` text,
  PRIMARY KEY (`NUMNIVEAU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `NUMNOTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOTE` decimal(20,0) DEFAULT NULL,
  `NUMMATIERE` int(11) DEFAULT NULL,
  `NUMETUDIANT` int(11) DEFAULT NULL,
  `NUMSEMESTRE` int(11) DEFAULT NULL,
  `TYPE` text,
  PRIMARY KEY (`NUMNOTE`),
  KEY `FK_RELATION_1` (`NUMETUDIANT`),
  KEY `FK_RELATION_4` (`NUMMATIERE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `NUMOPTION` int(11) NOT NULL,
  `NUMECOLE` int(11) DEFAULT NULL,
  `LIBELLEOPTION` text,
  PRIMARY KEY (`NUMOPTION`),
  KEY `FK_RELATION_7` (`NUMECOLE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

DROP TABLE IF EXISTS `semestre`;
CREATE TABLE IF NOT EXISTS `semestre` (
  `NUMSEMESTRE` int(11) NOT NULL AUTO_INCREMENT,
  `LIBELLESEMESTRE` text,
  PRIMARY KEY (`NUMSEMESTRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IDLOGIN` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` text,
  `PASSWORD` text,
  `TYPE` text,
  PRIMARY KEY (`IDLOGIN`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDLOGIN`, `LOGIN`, `PASSWORD`, `TYPE`) VALUES
(1, 'admin', 'admin', 'admin');
