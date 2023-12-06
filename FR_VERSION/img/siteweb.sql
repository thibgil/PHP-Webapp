-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 mai 2022 à 21:42
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `siteweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `msg`) VALUES
(4, 'Louis', 'Lewis', 'lewis@gmail.com', 'Voici un message d&#039;exemple.'),
(5, 'LÃ©a', 'GÃ©rard', 'grdlea@hotmail.com', 'Recrutez-vous chez Infinite Measures ?');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `date`, `pseudo`) VALUES
(132, 'Salut', '2022-05-06 05:03:20', 'ThibGil'),
(133, 'Salut comment vas-tu ?', '2022-05-06 05:04:17', 'XxMaxiNoellexX'),
(134, 'Très bien merci et toi ?', '2022-05-06 05:04:29', 'ThibGil'),
(135, 'ça va !', '2022-05-06 05:04:44', 'XxMaxiNoellexX'),
(136, 'Bla bla...', '2022-05-06 05:05:06', 'XxMaxiNoellexX'),
(137, 'Blablabla', '2022-05-06 05:05:14', 'ThibGil'),
(138, 'Bla Bla...', '2022-05-06 05:05:22', 'XxMaxiNoellexX'),
(139, 'BlaBlaBla', '2022-05-06 05:05:28', 'ThibGil'),
(140, 'BlaBlaBlaBla', '2022-05-06 05:05:34', 'XxMaxiNoellexX'),
(141, 'Blablabla', '2022-05-06 05:05:42', 'ThibGil'),
(142, 'Message de test', '2022-05-06 05:29:11', 'ThibGil'),
(143, 'Encore des messages', '2022-05-06 05:29:18', 'XxMaxiNoellexX'),
(144, 'Le chat est intéractif', '2022-05-06 05:29:26', 'ThibGil'),
(145, 'super', '2022-05-06 05:29:30', 'XxMaxiNoellexX'),
(146, 'Un autre message de test', '2022-05-06 05:29:43', 'ThibGil'),
(147, 'Encore un autre', '2022-05-06 05:29:48', 'XxMaxiNoellexX'),
(148, 'On continue', '2022-05-06 05:29:53', 'ThibGil'),
(149, 'Voilà', '2022-05-06 05:29:59', 'ThibGil'),
(150, 'test', '2022-05-06 05:30:04', 'XxMaxiNoellexX'),
(151, 'test', '2022-05-25 16:13:25', 'ThibGil'),
(153, 'msg', '2022-05-30 21:27:09', 'ThibGil');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isAdmin` int(11) NOT NULL DEFAULT '0',
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `last_name`, `first_name`, `email`, `pseudo`, `passwd`, `date`, `accepted`) VALUES
(10, 0, 'Garreta', 'Noelle', 'garretanoelle@gmail.com', 'XxMaxiNoellexX', '$2y$10$/GSS.1sGfiep6447anxbG.UCjdfmFUf.0kO5fJLGT9OY9e5f0F3Ga', '2022-03-24 01:17:46', 1),
(12, 1, 'Gilbin', 'Thibault', 'gilbinthibault@gmail.com', 'ThibGil', '$2y$10$NTOeoa2aKvC3sP.vvuBge.P/qHU3UW7sUqHY7nlVWsvZsqdyAvoOK', '2022-03-25 00:19:49', 1),
(14, 0, 'Canguilhem', 'Clemence', 'clem@gmail.com', 'Clem', '$2y$10$29QkcXzaKRxemwsNdkZnPOqu//Z6hLq59de00e2imseV0R28wf6g2', '2022-03-25 00:22:08', 1),
(18, 1, 'Chevalier', 'Lucas', 'lucas.chevalier08@gmail.com', 'LucasCvl', '$2y$10$ecxN87p8Oe7FoH22u.CQNODYjnZSLHNsGPF1kB8RBRbuC4uVALcYe', '2022-05-06 08:57:40', 1),
(25, 0, 'Personne', 'Personne', 'personne@gmail.com', 'Personne', '$2y$10$Skl1cZT5m58y7vExBmaa6.5cwVMkvApgSjbpnKuhFq89rDyWDqn6q', '2022-05-30 21:35:10', 0),
(26, 1, 'Administrator', 'Administrator', 'admin@infinitemeasures.com', 'Administrator', '$2y$10$yiGcZ7QqN6bmPVUNXHd8L.EkEZDyvDkac8/O0vknEqQGqLWOEn9W6', '2022-05-30 21:39:44', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `users` (`pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
