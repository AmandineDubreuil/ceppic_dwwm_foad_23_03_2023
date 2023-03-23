-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 mars 2023 à 15:58
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formation`
--
CREATE DATABASE IF NOT EXISTS `formation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `formation`;

-- --------------------------------------------------------

--
-- Structure de la table `choix`
--

CREATE TABLE `choix` (
  `id_choix` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `choix`
--

INSERT INTO `choix` (`id_choix`, `formation_id`, `user_id`) VALUES
(1, 1, 3),
(2, 4, 3),
(3, 1, 5),
(4, 4, 4),
(5, 1, 4),
(6, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id_formation` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id_formation`, `titre`, `description`, `image`, `created_at`) VALUES
(1, 'Power Query', 'OBJECTIFS DE LA FORMATION\nMaîtriser les bases de l’outil Power Query dans Excel pour réaliser des requêtes.\nPRÉ-REQUIS\n- Savoir déjà manipuler Excel', 'https://images.pexels.com/photos/15778613/pexels-photo-15778613.jpeg?auto=compress&cs=tinysrgb&w=150&h=90&dpr=2', '0000-00-00 00:00:00'),
(4, 'je suis un', 'j;g;kjhg', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'Etudiant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `email`, `pwd`, `role`) VALUES
(1, 'Amandine Dubreuil', 'amandine.dubreuil@hotmail.com', '$2y$10$VjP/Ssfjt9RpUGWUXAWbNuUPoebxTPs0CLBEGBBHRZEWEKglkL1B2', 'admin'),
(2, 'Ginette Martin', 'ginetteMartin@hotmail.fr', '$2y$10$eHK3vLQXK3CIDH7/Ph0P3eADrFJCQ9zzMDDalEy4m5f1bIHFncISO', 'Etudiant'),
(3, 'Pierre Kiroule', 'pierrekiroule@namassepas.mouss', '$2y$10$VWTvK/bK29Uj5/6z3AqTROVd9RcN8pODOlS4LmLhU3GV54SEtYZ5i', 'Etudiant'),
(4, 'Malo Saint', 'Saint-Malo@ville.fr', '$2y$10$ZQApDvggvb0MEX3X2VZb3OkhPWk7KHTO6hUcOtbgP/NfslqF4ztDi', 'Etudiant'),
(5, 'Jacques Adit', 'jacquesadit@adit.fr', '$2y$10$nxEoE3cGfygbfOktyHy6QOanztFmxzTphZqxC/jDftXHO2cVAubEq', 'Etudiant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `choix`
--
ALTER TABLE `choix`
  ADD PRIMARY KEY (`id_choix`),
  ADD KEY `formation_id` (`formation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id_formation`),
  ADD UNIQUE KEY `formation` (`titre`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `choix`
--
ALTER TABLE `choix`
  MODIFY `id_choix` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `choix`
--
ALTER TABLE `choix`
  ADD CONSTRAINT `choix_ibfk_1` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id_formation`),
  ADD CONSTRAINT `choix_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
