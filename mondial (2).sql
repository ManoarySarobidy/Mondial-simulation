-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 25 nov. 2022 à 10:35
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mondial`
--

-- --------------------------------------------------------

--
-- Structure de la table `blockest`
--

CREATE TABLE `blockest` (
  `idEquipe` varchar(10) DEFAULT NULL,
  `details` varchar(250) DEFAULT NULL,
  `types` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `blockest`
--

INSERT INTO `blockest` (`idEquipe`, `details`, `types`) VALUES
('EQP7', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP4', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP13', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP9', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP24', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP19', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP32', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP28', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP7', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP4', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP13', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP9', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP24', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP19', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP32', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP28', 'Huitieme de finale : 4 et 6 decembre', 8),
('EQP7', 'Quarts de finale 10 decembre', 4),
('EQP9', 'Quarts de finale 10 decembre', 4),
('EQP24', 'Quarts de finale 10 decembre', 4),
('EQP28', 'Quarts de finale 10 decembre', 4),
('EQP7', 'Demi finale 14 decembre', 2),
('EQP28', 'Demi finale 14 decembre', 2),
('EQP7', 'Finale 18 decembre', 1);

-- --------------------------------------------------------

--
-- Structure de la table `blockouest`
--

CREATE TABLE `blockouest` (
  `idEquipe` varchar(10) DEFAULT NULL,
  `details` varchar(250) DEFAULT NULL,
  `types` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `blockouest`
--

INSERT INTO `blockouest` (`idEquipe`, `details`, `types`) VALUES
('EQP3', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP6', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP10', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP14', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP20', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP21', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP27', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP31', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP3', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP6', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP10', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP14', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP20', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP21', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP27', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP31', 'Huitieme de finale : 3 et 5 decembre', 8),
('EQP3', 'Quarts de finale 9 decembre', 4),
('EQP10', 'Quarts de finale 9 decembre', 4),
('EQP20', 'Quarts de finale 9 decembre', 4),
('EQP31', 'Quarts de finale 9 decembre', 4),
('EQP3', 'Demi finale 13 decembre', 2),
('EQP20', 'Demi finale 13 decembre', 2),
('EQP20', 'Finale 18 decembre', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cdmwinner`
--

CREATE TABLE `cdmwinner` (
  `idWinner` int(11) NOT NULL,
  `idEquip` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cdmwinner`
--

INSERT INTO `cdmwinner` (`idWinner`, `idEquip`) VALUES
(9, 'EQP7');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `idEquipe` varchar(10) NOT NULL,
  `idPool` varchar(10) DEFAULT NULL,
  `nomEquipe` varchar(50) DEFAULT NULL,
  `Points` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `bgc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`idEquipe`, `idPool`, `nomEquipe`, `Points`, `image`, `bgc`) VALUES
('EQP1', 'POO1', 'Equateur', 4, 'flag/Equateur.jpeg', NULL),
('EQP10', 'POO3', 'Mexique', 6, 'flag/Mexique.png', NULL),
('EQP11', 'POO3', 'Pologne', 1, 'flag/Pologne.png', NULL),
('EQP12', 'POO3', 'Arabie-Saoudite', 1, 'flag/Arabie.jpeg', NULL),
('EQP13', 'POO4', 'Australie', 6, 'flag/Australie.png', NULL),
('EQP14', 'POO4', 'Danemark', 4, 'flag/Danemark.png', NULL),
('EQP15', 'POO4', 'France', 0, 'flag/France.png', NULL),
('EQP16', 'POO4', 'Tunisie', 2, 'flag/Tunise.png', NULL),
('EQP17', 'POO5', 'Costa Rica', 2, 'flag/Costa Rica.png', NULL),
('EQP18', 'POO5', 'Allemagne', 3, 'flag/Allemagne.png', NULL),
('EQP19', 'POO5', 'Japon', 4, 'flag/Japon.png', NULL),
('EQP2', 'POO1', 'Quatar', 5, 'flag/Qatar.png', NULL),
('EQP20', 'POO5', 'Espagne', 6, 'flag/Espagne.png', NULL),
('EQP21', 'POO6', 'Belgique', 4, 'flag/Belgique.png', NULL),
('EQP22', 'POO6', 'Canada', 2, 'flag/Canada.jpeg', NULL),
('EQP23', 'POO6', 'Croatie', 0, 'flag/Croatie.png', NULL),
('EQP24', 'POO6', 'Maroc', 7, 'flag/Maroc.png', NULL),
('EQP25', 'POO7', 'Bresil', 5, 'flag/Bresil.png', NULL),
('EQP26', 'POO7', 'Cameroun', 2, 'flag/Cameroun.png', NULL),
('EQP27', 'POO7', 'Serbie', 7, 'flag/Serbie.png', NULL),
('EQP28', 'POO7', 'Suisse', 5, 'flag/Suisse.png', NULL),
('EQP29', 'POO8', 'Ghana', 0, 'flag/Ghana.png', NULL),
('EQP3', 'POO1', 'Pays-Bas', 7, 'flag/Pays-Bas.png', NULL),
('EQP30', 'POO8', 'Coree du Sud', 1, 'flag/Corree.png', NULL),
('EQP31', 'POO8', 'Portugal', 1, 'flag/Portugal.png', NULL),
('EQP32', 'POO8', 'Uruguay', 1, 'flag/Uruguay.png', NULL),
('EQP4', 'POO1', 'Senegal', 6, 'flag/Senegal.jpeg', NULL),
('EQP5', 'POO2', 'Angleterre', 1, 'flag/Angleterre.png', NULL),
('EQP6', 'POO2', 'Iran', 4, 'flag/Iran.png', NULL),
('EQP7', 'POO2', 'USA', 4, 'flag/Etats-Unis.png', NULL),
('EQP8', 'POO2', 'Pays de Galles', 0, 'flag/Pays de Galles.png', NULL),
('EQP9', 'POO3', 'Argentine', 1, 'flag/Argentine.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `exhibition`
--

CREATE TABLE `exhibition` (
  `idMatch` int(11) NOT NULL,
  `idEquipe1` varchar(10) DEFAULT NULL,
  `idEquipe2` varchar(10) DEFAULT NULL,
  `score` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `exhibition`
--

INSERT INTO `exhibition` (`idMatch`, `idEquipe1`, `idEquipe2`, `score`) VALUES
(3554, 'EQP1', 'EQP2', '0 - 2'),
(3555, 'EQP1', 'EQP3', '2 - 7'),
(3556, 'EQP1', 'EQP4', '4 - 4'),
(3557, 'EQP2', 'EQP3', '1 - 0'),
(3558, 'EQP2', 'EQP4', '5 - 1'),
(3559, 'EQP3', 'EQP4', '7 - 6'),
(3560, 'EQP5', 'EQP6', '5 - 5'),
(3561, 'EQP5', 'EQP7', '3 - 7'),
(3562, 'EQP5', 'EQP8', '1 - 7'),
(3563, 'EQP6', 'EQP7', '4 - 6'),
(3564, 'EQP6', 'EQP8', '4 - 3'),
(3565, 'EQP7', 'EQP8', '4 - 0'),
(3566, 'EQP10', 'EQP11', '6 - 7'),
(3567, 'EQP10', 'EQP12', '2 - 6'),
(3568, 'EQP10', 'EQP9', '6 - 1'),
(3569, 'EQP11', 'EQP12', '2 - 2'),
(3570, 'EQP11', 'EQP9', '1 - 6'),
(3571, 'EQP12', 'EQP9', '1 - 1'),
(3572, 'EQP13', 'EQP14', '0 - 0'),
(3573, 'EQP13', 'EQP15', '4 - 6'),
(3574, 'EQP13', 'EQP16', '6 - 0'),
(3575, 'EQP14', 'EQP15', '2 - 0'),
(3576, 'EQP14', 'EQP16', '4 - 2'),
(3577, 'EQP15', 'EQP16', '0 - 2'),
(3578, 'EQP17', 'EQP18', '3 - 3'),
(3579, 'EQP17', 'EQP19', '6 - 4'),
(3580, 'EQP17', 'EQP20', '2 - 0'),
(3581, 'EQP18', 'EQP19', '6 - 1'),
(3582, 'EQP18', 'EQP20', '3 - 2'),
(3583, 'EQP19', 'EQP20', '4 - 6'),
(3584, 'EQP21', 'EQP22', '5 - 6'),
(3585, 'EQP21', 'EQP23', '7 - 1'),
(3586, 'EQP21', 'EQP24', '4 - 7'),
(3587, 'EQP22', 'EQP23', '7 - 6'),
(3588, 'EQP22', 'EQP24', '2 - 5'),
(3589, 'EQP23', 'EQP24', '0 - 7'),
(3590, 'EQP25', 'EQP26', '2 - 4'),
(3591, 'EQP25', 'EQP27', '1 - 3'),
(3592, 'EQP25', 'EQP28', '5 - 1'),
(3593, 'EQP26', 'EQP27', '6 - 6'),
(3594, 'EQP26', 'EQP28', '2 - 6'),
(3595, 'EQP27', 'EQP28', '7 - 5'),
(3596, 'EQP29', 'EQP30', '7 - 4'),
(3597, 'EQP29', 'EQP31', '0 - 3'),
(3598, 'EQP29', 'EQP32', '0 - 4'),
(3599, 'EQP30', 'EQP31', '0 - 4'),
(3600, 'EQP30', 'EQP32', '1 - 1'),
(3601, 'EQP31', 'EQP32', '1 - 1');

-- --------------------------------------------------------

--
-- Structure de la table `finalmatch`
--

CREATE TABLE `finalmatch` (
  `idEquipe1` varchar(10) DEFAULT NULL,
  `idEquipe2` varchar(10) DEFAULT NULL,
  `score` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `finalmatch`
--

INSERT INTO `finalmatch` (`idEquipe1`, `idEquipe2`, `score`) VALUES
('EQP20', 'EQP7', '2 - 6');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `finals`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `finals` (
`e1` varchar(50)
,`e2` varchar(50)
,`score` varchar(20)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `matchperteam`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `matchperteam` (
`idM` int(11)
,`equ1` varchar(50)
,`equ2` varchar(50)
,`idPool` varchar(10)
,`score` varchar(5)
);

-- --------------------------------------------------------

--
-- Structure de la table `pool`
--

CREATE TABLE `pool` (
  `idPool` varchar(10) NOT NULL,
  `poolName` varchar(10) DEFAULT NULL,
  `bgc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pool`
--

INSERT INTO `pool` (`idPool`, `poolName`, `bgc`) VALUES
('POO1', 'Groupe A', 'red'),
('POO2', 'Groupe B', 'green'),
('POO3', 'Groupe C', 'lightblue'),
('POO4', 'Groupe D', 'auqa'),
('POO5', 'Groupe E', 'orange'),
('POO6', 'Groupe F', 'violet'),
('POO7', 'Groupe G', 'yellow'),
('POO8', 'Groupe H', 'pink');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE `score` (
  `idScore` int(11) NOT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL,
  `idMatch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`idScore`, `score1`, `score2`, `idMatch`) VALUES
(3554, 0, 2, 3554),
(3555, 2, 7, 3555),
(3556, 4, 4, 3556),
(3557, 1, 0, 3557),
(3558, 5, 1, 3558),
(3559, 7, 6, 3559),
(3560, 5, 5, 3560),
(3561, 3, 7, 3561),
(3562, 1, 7, 3562),
(3563, 4, 6, 3563),
(3564, 4, 3, 3564),
(3565, 4, 0, 3565),
(3566, 6, 7, 3566),
(3567, 2, 6, 3567),
(3568, 6, 1, 3568),
(3569, 2, 2, 3569),
(3570, 1, 6, 3570),
(3571, 1, 1, 3571),
(3572, 0, 0, 3572),
(3573, 4, 6, 3573),
(3574, 6, 0, 3574),
(3575, 2, 0, 3575),
(3576, 4, 2, 3576),
(3577, 0, 2, 3577),
(3578, 3, 3, 3578),
(3579, 6, 4, 3579),
(3580, 2, 0, 3580),
(3581, 6, 1, 3581),
(3582, 3, 2, 3582),
(3583, 4, 6, 3583),
(3584, 5, 6, 3584),
(3585, 7, 1, 3585),
(3586, 4, 7, 3586),
(3587, 7, 6, 3587),
(3588, 2, 5, 3588),
(3589, 0, 7, 3589),
(3590, 2, 4, 3590),
(3591, 1, 3, 3591),
(3592, 5, 1, 3592),
(3593, 6, 6, 3593),
(3594, 2, 6, 3594),
(3595, 7, 5, 3595),
(3596, 7, 4, 3596),
(3597, 0, 3, 3597),
(3598, 0, 4, 3598),
(3599, 0, 4, 3599),
(3600, 1, 1, 3600),
(3601, 1, 1, 3601);

-- --------------------------------------------------------

--
-- Structure de la table `thirdplace`
--

CREATE TABLE `thirdplace` (
  `idThird` int(11) NOT NULL,
  `idEquipe` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `winnerest`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `winnerest` (
`idE` varchar(10)
,`pool` varchar(10)
,`nom` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `winnerouest`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `winnerouest` (
`idE` varchar(10)
,`pool` varchar(10)
,`nom` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la vue `finals`
--
DROP TABLE IF EXISTS `finals`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `finals`  AS SELECT `e`.`nomEquipe` AS `e1`, `d`.`nomEquipe` AS `e2`, `f`.`score` AS `score` FROM ((`finalmatch` `f` join `equipe` `e` on(`f`.`idEquipe1` = `e`.`idEquipe`)) join `equipe` `d` on(`f`.`idEquipe2` = `d`.`idEquipe`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `matchperteam`
--
DROP TABLE IF EXISTS `matchperteam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `matchperteam`  AS SELECT `exhib`.`idMatch` AS `idM`, `eq`.`nomEquipe` AS `equ1`, `e`.`nomEquipe` AS `equ2`, `eq`.`idPool` AS `idPool`, `exhib`.`score` AS `score` FROM ((`exhibition` `exhib` join `equipe` `eq` on(`exhib`.`idEquipe1` = `eq`.`idEquipe`)) join `equipe` `e` on(`exhib`.`idEquipe2` = `e`.`idEquipe`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `winnerest`
--
DROP TABLE IF EXISTS `winnerest`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `winnerest`  AS SELECT `b`.`idEquipe` AS `idE`, `e`.`idPool` AS `pool`, `e`.`nomEquipe` AS `nom` FROM (`blockest` `b` join `equipe` `e` on(`e`.`idEquipe` = `b`.`idEquipe`)) WHERE `b`.`types` = 1 ;

-- --------------------------------------------------------

--
-- Structure de la vue `winnerouest`
--
DROP TABLE IF EXISTS `winnerouest`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `winnerouest`  AS SELECT `b`.`idEquipe` AS `idE`, `e`.`idPool` AS `pool`, `e`.`nomEquipe` AS `nom` FROM (`blockouest` `b` join `equipe` `e` on(`e`.`idEquipe` = `b`.`idEquipe`)) WHERE `b`.`types` = 1 ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blockest`
--
ALTER TABLE `blockest`
  ADD KEY `idEquipe` (`idEquipe`);

--
-- Index pour la table `blockouest`
--
ALTER TABLE `blockouest`
  ADD KEY `idEquipe` (`idEquipe`);

--
-- Index pour la table `cdmwinner`
--
ALTER TABLE `cdmwinner`
  ADD PRIMARY KEY (`idWinner`),
  ADD KEY `idEquip` (`idEquip`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`idEquipe`),
  ADD KEY `idPool` (`idPool`);

--
-- Index pour la table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`idMatch`),
  ADD KEY `idEquipe1` (`idEquipe1`),
  ADD KEY `idEquipe2` (`idEquipe2`);

--
-- Index pour la table `finalmatch`
--
ALTER TABLE `finalmatch`
  ADD KEY `idEquipe1` (`idEquipe1`),
  ADD KEY `idEquipe2` (`idEquipe2`);

--
-- Index pour la table `pool`
--
ALTER TABLE `pool`
  ADD PRIMARY KEY (`idPool`);

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`idScore`),
  ADD KEY `idMatch` (`idMatch`);

--
-- Index pour la table `thirdplace`
--
ALTER TABLE `thirdplace`
  ADD PRIMARY KEY (`idThird`),
  ADD KEY `idEquipe` (`idEquipe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cdmwinner`
--
ALTER TABLE `cdmwinner`
  MODIFY `idWinner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `exhibition`
--
ALTER TABLE `exhibition`
  MODIFY `idMatch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3602;

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `idScore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3602;

--
-- AUTO_INCREMENT pour la table `thirdplace`
--
ALTER TABLE `thirdplace`
  MODIFY `idThird` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blockest`
--
ALTER TABLE `blockest`
  ADD CONSTRAINT `blockest_ibfk_1` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`idEquipe`);

--
-- Contraintes pour la table `blockouest`
--
ALTER TABLE `blockouest`
  ADD CONSTRAINT `blockouest_ibfk_1` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`idEquipe`);

--
-- Contraintes pour la table `cdmwinner`
--
ALTER TABLE `cdmwinner`
  ADD CONSTRAINT `cdmwinner_ibfk_1` FOREIGN KEY (`idEquip`) REFERENCES `equipe` (`idEquipe`);

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`idPool`) REFERENCES `pool` (`idPool`);

--
-- Contraintes pour la table `exhibition`
--
ALTER TABLE `exhibition`
  ADD CONSTRAINT `exhibition_ibfk_1` FOREIGN KEY (`idEquipe1`) REFERENCES `equipe` (`idEquipe`),
  ADD CONSTRAINT `exhibition_ibfk_2` FOREIGN KEY (`idEquipe2`) REFERENCES `equipe` (`idEquipe`);

--
-- Contraintes pour la table `finalmatch`
--
ALTER TABLE `finalmatch`
  ADD CONSTRAINT `finalmatch_ibfk_1` FOREIGN KEY (`idEquipe1`) REFERENCES `equipe` (`idEquipe`),
  ADD CONSTRAINT `finalmatch_ibfk_2` FOREIGN KEY (`idEquipe2`) REFERENCES `equipe` (`idEquipe`);

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`idMatch`) REFERENCES `exhibition` (`idMatch`);

--
-- Contraintes pour la table `thirdplace`
--
ALTER TABLE `thirdplace`
  ADD CONSTRAINT `thirdplace_ibfk_1` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`idEquipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
