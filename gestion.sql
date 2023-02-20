-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 août 2022 à 21:03
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `code_article` varchar(50) NOT NULL,
  `nom_article` varchar(50) NOT NULL,
  `images` text NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `code_article`, `nom_article`, `images`, `quantite`, `prix`, `time`) VALUES
(4, 'A004', 'Basket', '121887.jpg', 50, 1500, '2022-08-03 17:05:44'),
(12, 'c01', 'chemise', '610958.jpg', 500, 2500, '2022-08-03 17:05:44'),
(13, 'm001', 'Manguier', '783147.jpg', 0, 3000, '2022-08-03 17:05:44'),
(14, 'mo002', 'Moto GP', '28252.jpg', 12, 2500000, '2022-08-03 17:05:44'),
(15, 'v01', 'VTT', '599261.jpg', 120, 125000, '2022-08-03 17:05:44'),
(16, 'AS001', 'Assiette', '199627.jpg', 500, 5000, '2022-08-03 17:05:44'),
(17, 'PR001', 'Poulet Roti', '858877.jpg', 75, 4500, '2022-08-03 17:15:21'),
(18, 'S001', 'Galaxi S8', '870721.jpg', 125, 135000, '2022-08-03 17:05:44'),
(19, 'I001', 'Iphone 13 pro max', '439575.jpg', 100, 650000, '2022-08-03 17:05:44');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'b59c67bf196a4758191e42f76670ceba', 'Administrateur'),
(2, 'admin2', '4a7d1ed414474e4033ac29ccb8653d9b', 'Nikiema Juste'),
(3, 'admin3', '2be9bd7a3434f7038ca27d1918de58bd', 'Bamba Seydou');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `code_article` (`code_article`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
