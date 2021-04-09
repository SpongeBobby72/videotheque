-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 05 avr. 2021 à 18:30
-- Version du serveur :  10.3.25-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Videoclub`
--

-- --------------------------------------------------------

--
-- Structure de la table `fiche_film`
--

CREATE TABLE `fiche_film` (
  `id` int(11) NOT NULL,
  `realisateur` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `synopsis` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fiche_film`
--

INSERT INTO `fiche_film` (`id`, `realisateur`, `genre`, `synopsis`, `image`) VALUES
(12, 'Richard Marquand', 'Science-fiction', NULL, '1617362095_SW6.jpg'),
(28, 'George Lucas', 'Science-fiction', 'Avant de devenir un célèbre chevalier Jedi, et bien avant de se révéler l\'âme la plus noire de la galaxie, Anakin Skywalker est un jeune esclave sur la planète Tatooine. La Force est déjà puissante en lui et il est un remarquable pilote de Podracer. Le maître Jedi Qui-Gon Jinn le découvre et entrevoit alors son immense potentiel. Pendant ce temps, l\'armée de droïdes de l\'insatiable Fédération du Commerce a envahi Naboo dans le cadre d\'un plan secret des Sith visant à accroître leur pouvoir.', '1616504866_la menace fantome.jpg'),
(30, 'George Lucas', 'Science-fiction', '\r\nLa Guerre des Clones fait rage. Une franche hostilité oppose désormais le Chancelier Palpatine au Conseil Jedi. Anakin Skywalker, jeune Chevalier Jedi pris entre deux feux, hésite sur la conduite à tenir. Séduit par la promesse d\'un pouvoir sans précédent, tenté par le côté obscur de la Force, il prête allégeance au maléfique Darth Sidious et devient Dark Vador.\r\nLes Seigneurs Sith s\'unissent alors pour préparer leur revanche, qui commence par l\'extermination des Jedi. Seuls rescapés du massacre, Yoda et Obi Wan se lancent à la poursuite des Sith. La traque se conclut par un spectaculaire combat au sabre entre Anakin et Obi Wan, qui décidera du sort de la galaxie. ', '1617356442_SW3.jpg'),
(29, 'George Lucas', 'Science-fiction', 'Depuis le blocus de la planète Naboo, la République, gouvernée par le Chancelier Palpatine, connaît une crise. Un groupe de dissidents, mené par le sombre Jedi comte Dooku, manifeste son mécontentement. Le Sénat et la population intergalactique se montrent pour leur part inquiets. Certains sénateurs demandent à ce que la République soit dotée d\'une armée pour empêcher que la situation ne se détériore. Padmé Amidala, devenue sénatrice, est menacée par les séparatistes et échappe à un attentat.', '1617357429_SW2.jpg'),
(10, 'Irvin Kershner', 'Science-fiction', 'Malgré la destruction de l\'Etoile Noire, l\'Empire maintient son emprise sur la galaxie, et poursuit sans relâche sa lutte contre l\'Alliance rebelle. Basés sur la planète glacée de Hoth, les rebelles essuient un assaut des troupes impériales. Parvenus à s\'échapper, la princesse Leia, Han Solo, Chewbacca et C-3P0 se dirigent vers Bespin, la cité des nuages gouvernée par Lando Calrissian, ancien compagnon de Han.', '1617357517_SW5.jpg'),
(9, 'George Lucas', 'Science-fiction', 'Il y a bien longtemps, dans une galaxie très lointaine. La guerre civile fait rage entre l\'Empire galactique et l\'Alliance rebelle. Capturée par les troupes de choc de l\'Empereur menées par le sombre et impitoyable Dark Vador, la princesse Leia Organa dissimule les plans de l\'Etoile Noire, une station spatiale invulnérable, à son droïde R2-D2 avec pour mission de les remettre au Jedi Obi-Wan Kenobi.', '1617362155_SW4.jpg'),
(31, 'Gareth Edwards', 'Science-fiction', 'Dans une période de conflit, un groupe d\'improbables héros s\'unit pour voler les plans de l\'Étoile de la Mort, l\'arme de destruction massive de l\'Empire. Ce tournant décisif dans la chronologie Star Wars réunit des personnes ordinaires qui choisissent de faire des choses extraordinaires, pour défendre une noble cause.', '1617362367_rogue one.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Film`
--

CREATE TABLE `Film` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `année` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Film`
--

INSERT INTO `Film` (`id`, `titre`, `année`) VALUES
(9, 'Star wars - Un nouvel espoir', '1977'),
(10, 'Star wars - L\'empire contre attaque', '1980'),
(12, 'Star wars - Le retour du Jedi', '1983'),
(28, 'Star wars - La menace fantome', '1999'),
(29, 'Star wars - l\'attaque des clones', '2002'),
(30, 'Star wars - La revanche des Siths', '2005'),
(31, 'Star wars - Rogue One story', '2016');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Film`
--
ALTER TABLE `Film`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Film`
--
ALTER TABLE `Film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
