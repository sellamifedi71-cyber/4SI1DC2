-- XAMPP-Lite
-- version 8.4.1
-- https://xampplite.sf.net/
--
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 jan. 2026 à 15:21
-- Version du serveur : 11.4.4-MariaDB-log
-- Version de PHP : 8.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdecojeunes`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `idAction` int(11) NOT NULL,
  `titreAction` varchar(100) DEFAULT NULL,
  `typeAction` char(1) DEFAULT NULL,
  `dateAction` date DEFAULT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `action`
--

INSERT INTO `action` (`idAction`, `titreAction`, `typeAction`, `dateAction`, `lieu`, `mail`) VALUES
(1, 'Nettoyage plage La Marsa', 'N', '2026-03-15', 'Plage La Marsa', 'm1@mail.tn'),
(2, 'Plantation arbres urbains', 'P', '2026-03-20', 'Parc Belvédère', 'm2@mail.tn'),
(3, 'Sensibilisation au recyclage', 'S', '2026-04-05', 'Lycée Pilote Tunis', 'm3@mail.tn'),
(4, 'Collecte plastique scolaire', 'R', '2026-04-10', 'Lycée Ariana', 'm4@mail.tn'),
(5, 'Nettoyage forêt Ain Draham', 'N', '2026-04-18', 'Forêt Ain Draham', 'm5@mail.tn'),
(6, 'Plantation oliviers', 'P', '2026-05-01', 'Zone rurale Sfax', 'm6@mail.tn'),
(7, 'Sensibilisation économie eau', 'S', '2026-05-10', 'Lycée Sousse', 'm7@mail.tn');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `mail` varchar(100) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `lycee` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`mail`, `nom`, `lycee`) VALUES
('m1@mail.tn', 'Ahmed Ben Ali', 'Lycée Pilote Tunis'),
('m10@mail.tn', 'Mariem Ben Amor', 'Lycée Sfax'),
('m11@mail.tn', 'Anis Louati', 'Lycée Gabès'),
('m12@mail.tn', 'Hela Saidi', 'Lycée Monastir'),
('m13@mail.tn', 'Bilel Krimi', 'Lycée Bizerte'),
('m14@mail.tn', 'Asma Chaari', 'Lycée Mahdia'),
('m15@mail.tn', 'Nour El Houda', 'Lycée Tozeur'),
('m2@mail.tn', 'Sarra Mhiri', 'Lycée Carthage'),
('m3@mail.tn', 'Youssef Trabelsi', 'Lycée Pilote Sousse'),
('m4@mail.tn', 'Amira Khlifi', 'Lycée El Mourouj'),
('m5@mail.tn', 'Firas Ben Salah', 'Lycée Ibn Rachiq'),
('m6@mail.tn', 'Ines Zoghlami', 'Lycée Ariana'),
('m7@mail.tn', 'Omar Gharbi', 'Lycée Pilote Nabeul'),
('m8@mail.tn', 'Rania Hadded', 'Lycée Hammamet'),
('m9@mail.tn', 'Skander Jaziri', 'Lycée El Kef');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`idAction`),
  ADD KEY `mail` (`mail`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `idAction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `membre` (`mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
