-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 19 juil. 2021 à 09:48
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leboncon`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `postId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `postId`) VALUES
(11, 'Defonce', 15),
(3, 'Nourriture', 10),
(4, 'objet', 10),
(6, 'objet', 14),
(9, 'Herbe', 15),
(7, 'Nourriture', 14),
(10, 'Fumette', 15);

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

DROP TABLE IF EXISTS `img`;
CREATE TABLE IF NOT EXISTS `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `postId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `img`
--

INSERT INTO `img` (`id`, `url`, `postId`) VALUES
(1, 'https://img.leboncoin.fr/api/v1/lbcpb1/images/6d/37/1d/6d371d576b6ef9694d7a60db1b0d2df9271b9876.jpg?rule=ad-image', 1),
(2, 'https://www.ducatillon.com/upload/referentiel/29685/options/299.0422.jpg', 1),
(3, 'https://media.castorama.fr/is/image/Castorama/barbecue-charbon-de-bois-blooma-mistral~3292193551149_01c_FR_CF?$MOB_PREV$&$width=618&$height=618', 1),
(4, 'https://media.castorama.fr/is/image/Castorama/barbecue-charbon-de-bois-blooma-mistral~3292193551149_01c_FR_CF?$MOB_PREV$&$width=618&$height=618', 1),
(5, 'https://media.castorama.fr/is/image/Castorama/barbecue-charbon-de-bois-blooma-mistral~3292193551149_01c_FR_CF?$MOB_PREV$&$width=618&$height=618', 1),
(6, 'https://media.castorama.fr/is/image/Castorama/barbecue-charbon-de-bois-blooma-mistral~3292193551149_01c_FR_CF?$MOB_PREV$&$width=618&$height=618', 6),
(7, 'https://images-na.ssl-images-amazon.com/images/I/61wmf4cdXQL._AC_SX425_.jpg', 6),
(8, 'h', 8),
(9, 'h', 8),
(10, 'h', 8),
(11, 'https://images-na.ssl-images-amazon.com/images/I/61wmf4cdXQL._AC_SX425_.jpg', 9),
(12, 'https://media.castorama.fr/is/image/Castorama/barbecue-charbon-de-bois-blooma-mistral~3292193551149_01c_FR_CF?$MOB_PREV$&$width=618&$height=618', 9),
(13, 'https://www.esprit-barbecue.fr/10614-large_default/grille-fonte-barbecue-q140-2-parties.jpg', 9),
(14, 'https://img2.cote-lumiere.com/e-shop/50633-large_default/lampe-de-bureau-style-architecte-henry.jpg', 10),
(15, 'https://media.cyrillus.fr/Pictures/cyrillus/94089/lampe-globe-a-poser.jpg?width=542', 10),
(16, 'https://media.madeindesign.com/nuxeo/products/d/c/lampe-sans-fil-mina-large-or-doux_madeindesign_346734_large.jpg', 10),
(17, 'https://vozer.s3.eu-west-3.amazonaws.com/wp-content/uploads/2017/11/kebab.jpg', 11),
(18, 'https://media-cdn.tripadvisor.com/media/photo-s/16/2d/aa/4b/photo0jpg.jpg', 11),
(19, '', 11),
(20, 'https://vozer.s3.eu-west-3.amazonaws.com/wp-content/uploads/2017/11/kebab.jpg', 12),
(21, 'https://media-cdn.tripadvisor.com/media/photo-s/16/2d/aa/4b/photo0jpg.jpg', 12),
(22, '', 12),
(23, 'https://vozer.s3.eu-west-3.amazonaws.com/wp-content/uploads/2017/11/kebab.jpg', 13),
(24, 'https://media-cdn.tripadvisor.com/media/photo-s/16/2d/aa/4b/photo0jpg.jpg', 13),
(25, '', 13),
(26, 'https://images-na.ssl-images-amazon.com/images/I/61wmf4cdXQL._AC_SX425_.jpg', 14),
(27, 'https://media.castorama.fr/is/image/Castorama/barbecue-charbon-de-bois-blooma-mistral~3292193551149_01c_FR_CF?$MOB_PREV$&$width=618&$height=618', 14),
(28, 'https://www.esprit-barbecue.fr/10614-large_default/grille-fonte-barbecue-q140-2-parties.jpg', 14),
(29, 'https://gurumed-oxn8moh.netdna-ssl.com/wp-content/uploads/2019/04/Haschich-19.jpg', 15),
(30, 'https://www.lyonmag.com/media/images/thumb/870x653_38447332804_1ea9e2a77b_o-14.jpg', 15),
(31, 'https://cdn-s-www.leprogres.fr/images/9C2A69ED-E818-41A2-BFA9-4B20BF61A7D5/NW_detail_M/title-1593795289.jpg', 15);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `price`, `place`, `content`) VALUES
(1, 'Cage Lapin', 40, 'Lille', 'Petite cage a lapin symphathique'),
(10, 'Lampe de table', 250, 'Lille', 'Lampe de table design'),
(15, 'Shit', 500, 'Lille', 'Du bon shit sa mere'),
(14, 'Barbecue', 50, 'Lille', 'content');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nickname`) VALUES
(1, 'test@test.com', 'test', 'test'),
(2, 'user@admin.com', '$argon2i$v=19$m=65536,t=4,p=1$ZHI5U0VUSnFUVWYuOWQxWQ$KP9AT+Eg7Drq5Zy7NvlAaHTBCLZ670gwXsfyj3EfnAQ', 'Admin'),
(3, 'lucas@declerck.com', '$argon2i$v=19$m=65536,t=4,p=1$bDhWVi9RUERHNTRGQkY0Tg$vTt4P28YePcVOXLFv5mON7MsK6wI9s79vKu6CmqWo/o', 'Lucas'),
(4, 'chloe@chloe.chloe', '$argon2i$v=19$m=65536,t=4,p=1$Q1IwQ0dubjlGb1BXOTdhYQ$5GxeKe3Q21qSZVnoSqe47fdvmNJ23gkXWPYmNolvL9A', 'Chloe'),
(5, 'marie@marie.com', '$argon2i$v=19$m=65536,t=4,p=1$STVwZ1VNQkZoRzEuVmZHTQ$7NuWjr8FwEHTc+fOLwHW2GUj3RcS41xTck4gYcSgdU0', 'marie');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
