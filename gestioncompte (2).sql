-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 24 juin 2021 à 22:43
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestioncompte`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `idagence` int(11) NOT NULL,
  `libagence` varchar(255) CHARACTER SET utf8 NOT NULL,
  `localisationagence` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contactagence` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`idagence`, `libagence`, `localisationagence`, `contactagence`) VALUES
(1, 'SGBCI', 'Treichville', '2721210000'),
(2, 'NSIA', 'Treichville', '2525080808');

-- --------------------------------------------------------

--
-- Structure de la table `caissiere`
--

CREATE TABLE `caissiere` (
  `idcaisse` int(11) NOT NULL,
  `nomcaisse` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenomcaisse` varchar(255) CHARACTER SET utf8 NOT NULL,
  `emailcaisse` varchar(255) CHARACTER SET utf8 NOT NULL,
  `passwordcaisse` varchar(255) CHARACTER SET utf8 DEFAULT 'cib2021@',
  `numerocaisse` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `caissiere`
--

INSERT INTO `caissiere` (`idcaisse`, `nomcaisse`, `prenomcaisse`, `emailcaisse`, `passwordcaisse`, `numerocaisse`) VALUES
(1, 'KOUADIO', 'EMMANUELLA', 'emma20@gmail.com', 'cib2021@', NULL),
(2, 'YAO', 'MARIE-ANNE', 'marieanne02@gamil.com', 'cib2021@', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idclient` int(11) NOT NULL,
  `cni` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `nomclient` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenomclient` varchar(255) CHARACTER SET utf8 NOT NULL,
  `datenaissance` date NOT NULL,
  `profession` varchar(255) CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lienphoto` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `liensignature` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `archive` int(1) NOT NULL DEFAULT 0,
  `idsexe` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idclient`, `cni`, `nomclient`, `prenomclient`, `datenaissance`, `profession`, `telephone`, `email`, `lienphoto`, `liensignature`, `archive`, `idsexe`) VALUES
(1, 'C1205045', 'TRAORE', 'ZIE ABASSE', '2021-06-01', 'Ingenieur', '0505560018', 'abasse882@gmail.com', '1624425123.jpg', '', 0, 1),
(2, 'S1203498', 'SORO', 'MARC ARNAUD', '2021-06-02', 'INGENIEUR', '0778983468', 'soromarc@gmail.com', '1624383386.jpg', '', 0, 1),
(7, 'A1232045123', 'DOUMBIA', 'AL MOUSTAPHA', '2021-05-31', 'Ingenieur', '0103090987', 'moustapha09@gmail.com', '1624416559.jpg', '', 0, 1),
(8, 'B1232045290', 'KOUADIO', 'BONI N\'CHO BERTRAND', '2020-08-04', 'Ingenieur', '0707789809', 'boni19@gmail.com', '1624417496.jpg', '', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `idcompte` int(11) NOT NULL,
  `numerocpte` varchar(255) CHARACTER SET utf8 NOT NULL,
  `visaouverture` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dateouverture` varchar(255) NOT NULL,
  `datefermeture` varchar(255) DEFAULT NULL,
  `visafermeture` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `obscpte` varchar(255) CHARACTER SET utf8 NOT NULL,
  `soldecpte` double NOT NULL DEFAULT 0,
  `idclient` int(11) NOT NULL,
  `archive` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idcompte`, `numerocpte`, `visaouverture`, `dateouverture`, `datefermeture`, `visafermeture`, `obscpte`, `soldecpte`, `idclient`, `archive`) VALUES
(3, 'CIB-1', '', '23-06-2021 04:49:19', '', '', 'compte actif', 0, 7, 0),
(4, 'CIB-2', NULL, '23-06-2021 05:04:56', NULL, NULL, 'Compte actif', 0, 8, 0);

-- --------------------------------------------------------

--
-- Structure de la table `modeoperation`
--

CREATE TABLE `modeoperation` (
  `idmodeoperation` int(11) NOT NULL,
  `libmodeoperation` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE `operation` (
  `idopteration` int(11) NOT NULL,
  `numerooperation` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dateoperation` date NOT NULL,
  `visaoperation` varchar(255) CHARACTER SET utf8 NOT NULL,
  `numerocpte` int(11) NOT NULL,
  `idtypeoperation` int(11) NOT NULL,
  `idmodeoperation` int(11) NOT NULL,
  `idagence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

CREATE TABLE `sexe` (
  `idsexe` int(11) NOT NULL,
  `libsexe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`idsexe`, `libsexe`) VALUES
(1, 'Masculin'),
(2, 'Féminin');

-- --------------------------------------------------------

--
-- Structure de la table `typecompte`
--

CREATE TABLE `typecompte` (
  `idtypeoperation` int(11) NOT NULL,
  `libtypeoperation` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typecompte`
--

INSERT INTO `typecompte` (`idtypeoperation`, `libtypeoperation`) VALUES
(1, 'Dépôt'),
(2, 'Retrait'),
(3, 'Consultation');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`idagence`);

--
-- Index pour la table `caissiere`
--
ALTER TABLE `caissiere`
  ADD PRIMARY KEY (`idcaisse`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idclient`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idcompte`);

--
-- Index pour la table `modeoperation`
--
ALTER TABLE `modeoperation`
  ADD PRIMARY KEY (`idmodeoperation`);

--
-- Index pour la table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`idopteration`);

--
-- Index pour la table `sexe`
--
ALTER TABLE `sexe`
  ADD PRIMARY KEY (`idsexe`);

--
-- Index pour la table `typecompte`
--
ALTER TABLE `typecompte`
  ADD PRIMARY KEY (`idtypeoperation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `idagence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `caissiere`
--
ALTER TABLE `caissiere`
  MODIFY `idcaisse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `idcompte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `modeoperation`
--
ALTER TABLE `modeoperation`
  MODIFY `idmodeoperation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `operation`
--
ALTER TABLE `operation`
  MODIFY `idopteration` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sexe`
--
ALTER TABLE `sexe`
  MODIFY `idsexe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `typecompte`
--
ALTER TABLE `typecompte`
  MODIFY `idtypeoperation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
