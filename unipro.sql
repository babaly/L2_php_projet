-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 13 nov. 2020 à 19:57
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `unipro`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `NUMABSENCE` int(11) NOT NULL,
  `NUMSEMESTRE` int(11) NOT NULL,
  `NUMNIVEAU` int(11) NOT NULL,
  `NUMMATIERE` int(11) NOT NULL,
  `NUMETUDIANT` int(11) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `LIBELLE` varchar(255) NOT NULL,
  `date_SAVE` date NOT NULL,
  `HEURE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`NUMABSENCE`, `NUMSEMESTRE`, `NUMNIVEAU`, `NUMMATIERE`, `NUMETUDIANT`, `TYPE`, `LIBELLE`, `date_SAVE`, `HEURE`) VALUES
(1, 2, 6, 4, 1, 'Retard', 'retard de 15 minute', '2020-11-13', '8h-12h');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `NUMENSEIGNANT` int(11) NOT NULL,
  `pseudo` text,
  `passe` text,
  `PRENOMENSEIGNANT` text,
  `NOMENSEIGNANT` text,
  `NUMMATIERE` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`NUMENSEIGNANT`, `pseudo`, `passe`, `PRENOMENSEIGNANT`, `NOMENSEIGNANT`, `NUMMATIERE`) VALUES
(1, 'AL_AMEEN', 'P@sser1', 'Baba', 'NGOM', '1'),
(2, 'musa@diagne', 'P@sser2', 'Moussa', 'DIAGNE', '4'),
(3, 'Nulk@', 'P@sser3', 'Mamadou Baba ', 'LY', '1'),
(4, 'lamine@lahi', 'Passer4', 'Mamadou Lamine', 'DRAME', '1');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `NUMETUDIANT` int(11) NOT NULL,
  `NUMNIVEAU` int(11) DEFAULT NULL,
  `PRENOMETUDIANT` text,
  `NOMETUDIANT` text,
  `DATENAISSANCE` date DEFAULT NULL,
  `LIEUNAISSANCE` text,
  `ADRESSE` text,
  `SEXE` text,
  `TELPORT` text,
  `EMAIL` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`NUMETUDIANT`, `NUMNIVEAU`, `PRENOMETUDIANT`, `NOMETUDIANT`, `DATENAISSANCE`, `LIEUNAISSANCE`, `ADRESSE`, `SEXE`, `TELPORT`, `EMAIL`) VALUES
(6, 6, 'Aissatou', 'SENE', '2003-02-02', 'Bambey', 'Rue 10, Grand Dakar', 'FÃ©minin', '774589665', 'aissatousene@gmail.com'),
(1, 6, 'Jean', 'Gomis', '2001-12-12', 'Pikine', 'Pikine Icotaf, villa 18', 'Masculin', '775231244', ' jeangomis@gmail.com'),
(5, 6, 'Fallou', 'wade', '2002-11-30', 'Thies', 'Medina, rue 4 x 12', 'Masculin', '778987744', ' fallouwade@gmail.com'),
(7, 7, 'Assane', 'SECK', '2002-03-22', 'Saint-Louis', 'Diamaguene Ouest', 'Masculin', '339875654', 'assaneseck@gmail.com'),
(8, 7, 'Fatou', 'SOW', '2002-02-28', 'Dakar', 'Dakar-Fann, villa 50', 'FÃ©minin', '775698788', 'fatousow@gmail.com'),
(9, 7, 'SÃ©raphin', 'Coly', '2002-11-11', 'Bignona', 'Plateau, rue 24', 'Masculin', '776592144', 's_coly@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `NUMMATIERE` int(11) NOT NULL,
  `NUMMODULE` int(11) DEFAULT NULL,
  `NUMSEMESTRE` int(11) NOT NULL,
  `NUMNIVEAU` int(11) NOT NULL,
  `LIBELLEMATIERE` text,
  `COEF` decimal(20,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`NUMMATIERE`, `NUMMODULE`, `NUMSEMESTRE`, `NUMNIVEAU`, `LIBELLEMATIERE`, `COEF`) VALUES
(1, 2, 4, 9, 'Anglais', '5'),
(3, 3, 2, 6, 'UML', '4'),
(4, 3, 2, 6, 'PHP', '5');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `NUMMODULE` int(11) NOT NULL,
  `NUMSEMESTRE` int(11) DEFAULT NULL,
  `NUMNIVEAU` int(11) NOT NULL,
  `LIBELLEMODULE` text,
  `CREDIT` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`NUMMODULE`, `NUMSEMESTRE`, `NUMNIVEAU`, `LIBELLEMODULE`, `CREDIT`) VALUES
(1, 0, 1, 'Outils de l\'ingÃ©nierie', 10),
(2, 2, 2, 'Informatique fondamentale', 12),
(3, 3, 3, 'Informatique', 13),
(4, 4, 4, 'RÃ©seaux et TÃ©lÃ©coms', 8),
(5, 4, 5, 'Environnement de l\'entreprise', 7);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `NUMNIVEAU` int(11) NOT NULL,
  `LIBELLENIVEAU` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`NUMNIVEAU`, `LIBELLENIVEAU`) VALUES
(3, 'GÃ©nie Civil 1'),
(4, 'GÃ©nie Civil 2'),
(5, 'GÃ©nie Civil 3'),
(6, 'Informatique 1'),
(7, 'Informatique 2'),
(8, 'Informatique 3'),
(9, 'ComptabilitÃ© 1'),
(10, 'ComptabilitÃ© 2'),
(11, 'ComptabilitÃ© 3');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `NUMNOTE` int(11) NOT NULL,
  `NOTE` decimal(20,0) DEFAULT NULL,
  `NUMMATIERE` int(11) DEFAULT NULL,
  `NUMETUDIANT` int(11) DEFAULT NULL,
  `NUMSEMESTRE` int(11) DEFAULT NULL,
  `TYPE` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`NUMNOTE`, `NOTE`, `NUMMATIERE`, `NUMETUDIANT`, `NUMSEMESTRE`, `TYPE`) VALUES
(1, '14', NULL, NULL, NULL, NULL),
(2, '14', 1, NULL, 3, '1'),
(3, '14', 1, NULL, 3, '1'),
(4, '14', 1, NULL, 3, '1'),
(6, '18', 1, 1, 3, '1'),
(7, '17', 1, 1, 3, '1');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `NUMOPTION` int(11) NOT NULL,
  `NUMECOLE` int(11) DEFAULT NULL,
  `LIBELLEOPTION` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `NUMSEMESTRE` int(11) NOT NULL,
  `LIBELLESEMESTRE` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `semestre`
--

INSERT INTO `semestre` (`NUMSEMESTRE`, `LIBELLESEMESTRE`) VALUES
(2, 'Semestre 2'),
(3, 'Semestre 3'),
(4, 'Semestre 4'),
(7, 'Semestre 5'),
(8, 'Semestre 6');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDLOGIN` int(11) NOT NULL,
  `LOGIN` text,
  `PASSWORD` text,
  `TYPE` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDLOGIN`, `LOGIN`, `PASSWORD`, `TYPE`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`NUMABSENCE`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`NUMENSEIGNANT`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`NUMETUDIANT`),
  ADD KEY `FK_RELATION_2` (`NUMNIVEAU`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`NUMMATIERE`),
  ADD KEY `NUMMODULE` (`NUMMODULE`),
  ADD KEY `NUMSEMESTRE` (`NUMSEMESTRE`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`NUMMODULE`),
  ADD KEY `FK_RELATION_5` (`NUMSEMESTRE`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`NUMNIVEAU`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`NUMNOTE`),
  ADD KEY `FK_RELATION_1` (`NUMETUDIANT`),
  ADD KEY `FK_RELATION_4` (`NUMMATIERE`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`NUMOPTION`),
  ADD KEY `FK_RELATION_7` (`NUMECOLE`);

--
-- Index pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`NUMSEMESTRE`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDLOGIN`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `NUMABSENCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `NUMENSEIGNANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `NUMETUDIANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `NUMMATIERE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `NUMMODULE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `NUMNIVEAU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `NUMNOTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `NUMSEMESTRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDLOGIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
