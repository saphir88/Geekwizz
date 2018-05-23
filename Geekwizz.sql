-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 01 Mai 2018 à 10:19
-- Version du serveur :  5.7.22-0ubuntu0.16.04.1
-- Version de PHP :  7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `geekwizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `Config`
--

CREATE TABLE `Config` (
  `id` int(11) NOT NULL,
  `value` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Config`
--

INSERT INTO `Config` (`id`, `value`) VALUES
(1, 'Tu veux savoir quel est ton profil geek ? À quelle tendance tu appartiens ? C\'est simple ! Répond à ce test en moins de 2 minutes et nous te dirons qui tu es. À la fin du test partage ton résultat et défie tes amis. ');

-- --------------------------------------------------------

--
-- Structure de la table `Données`
--

CREATE TABLE `Données` (
  `id` int(10) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `tranche_age` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Quizz`
--

CREATE TABLE `Quizz` (
  `id` int(10) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `reponse1` varchar(100) NOT NULL,
  `reponse2` varchar(100) NOT NULL,
  `reponse3` varchar(100) NOT NULL,
  `reponse4` varchar(100) NOT NULL,
  `image1` varchar(200) DEFAULT NULL,
  `image2` varchar(200) DEFAULT NULL,
  `image3` varchar(200) DEFAULT NULL,
  `image4` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Quizz`
--

INSERT INTO `Quizz` (`id`, `titre`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `image1`, `image2`, `image3`, `image4`) VALUES
(1, 'Plus petit, quel programme regardais-tu ?', 'Code Lyoko', 'Albator', 'Zig et Sharko', 'Les Minikeums', 'assets/images/img_quizz/codelyokoPertinente.jpg', 'assets/images/img_quizz/albatorPertinente.jpg', 'assets/images/img_quizz/zigsharkoPertinente.jpg', 'assets/images/img_quizz/les minikeumsPertinente.jpg'),
(2, 'Qui aimerais-tu incarner ?', 'Nathan Drake', 'Wonder Woman', 'Superman', 'Lara Croft', 'assets/images/img_quizz/nathan drakePertinente.jpg', 'assets/images/img_quizz/wonderwomanPertinente.jpg', 'assets/images/img_quizz/supermanPertinente.jpg', 'assets/images/img_quizz/laracroftPertinente.jpg'),
(18, 'Quel film est le reflet de ta vie ?', 'Kick-Ass', 'Avatar', 'Iron Man', 'Retour vers le futur', 'assets/images/img_quizz/5ae2df964403ckickass.jpg', 'assets/images/img_quizz/5ae2df96440a5avatar.jpg', 'assets/images/img_quizz/5ae6dc7d963caironman.jpg', 'assets/images/img_quizz/5ae2df964414fretour vers le futur.jpg'),
(19, 'Quel véhicule voudrais tu avoir ?', 'Le Faucon Millenium', 'Je ne sors jamais', 'La Batmobile', 'Un velo Vintage', 'assets/images/img_quizz/5ae2e037a7124fauconmillenium.jpg', 'assets/images/img_quizz/img5ae6d4a5d707dnolife.jpeg', 'assets/images/img_quizz/5ae2e037a724ebatmobile.jpg', 'assets/images/img_quizz/5ae2e037a72cbvelovintage.jpg'),
(21, 'En cas d\'invasion de zombie, que ferais-tu ?', 'Je décroche mon sabre', 'Quel invasion ?', 'Je prend un flingue', 'Je fais des provisions', 'assets/images/img_quizz/5ae310cba3526sabre.jpg', 'assets/images/img_quizz/img5ae32eb1d80d9question.jpg', 'assets/images/img_quizz/5ae310cba35ebpistolet.jpg', 'assets/images/img_quizz/5ae310cba3676courses.jpg'),
(22, 'Si tu as un pouvoir ?', 'Être immortel', 'Jamais être fatigué', 'Avoir le savoir suprême', 'Voler', 'assets/images/img_quizz/5ae331cff0c8eimages.jpeg', 'assets/images/img_quizz/img5ae6d4e93dea5dormir.jpg', 'assets/images/img_quizz/5ae2e35d7dfb0formules scientifiques.jpg', 'assets/images/img_quizz/5ae2e35d7dff5voler superman.jpg'),
(23, 'Physiquement, je suis ...', 'Bien dans mes basket', 'Un peu lourd', 'd\'eau et de carbone', 'sportif', 'assets/images/img_quizz/5ae6c50adf767marty.jpeg', 'assets/images/img_quizz/img5ae6c50adf8eeronflex.png', 'assets/images/img_quizz/5ae6c50adfa00molecule.jpg', 'assets/images/img_quizz/5ae6c50adfb0ctsubasa.jpeg'),
(24, 'Quel cadeau souhaites tu ?', 'Dvd de ta série', 'Le dernier DLC de ton jeu préféré', 'Un téléphone', 'Une figurine pop', 'assets/images/img_quizz/5ae6cc51b3e2awho.jpg', 'assets/images/img_quizz/img5ae6cc19a418fwow.jpg', 'assets/images/img_quizz/5ae31a390e62fphone.jpg', 'assets/images/img_quizz/5ae31a390e947batman1.jpg'),
(25, 'Quel serait ton pire cauchemar ?', 'Le lag', 'Une panne de courant', 'Choisr entre PS4 et Xbox', 'Etre enfermé', 'assets/images/img_quizz/5ae31a6a9572blowco.png', 'assets/images/img_quizz/img5ae31a6a9583dbougie.jpg', 'assets/images/img_quizz/5ae31a6a958f2VS.jpg', 'assets/images/img_quizz/5ae32e9f4fc2eenfermé.jpeg'),
(27, 'Ta réplique préférée ?', '"Luke, je suis ton père..."', '"My preciousss..."', '"I\'ll be back !"', '"Winter is coming"', 'assets/images/img_quizz/5ae31b4329942DarkVader.jpg', 'assets/images/img_quizz/5ae31b432a0b7gollum.jpg', 'assets/images/img_quizz/5ae31b432a157terminator.jpg', 'assets/images/img_quizz/5ae31b432a1edsnow.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Resultat`
--

CREATE TABLE `Resultat` (
  `id` int(10) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Resultat`
--

INSERT INTO `Resultat` (`id`, `titre`, `description`, `image`) VALUES
(1, 'Geek', 'Bravo !! Tu correspond au profil suprême de ce quizz. Le geek est féru de nouvelles technologies. Il est passionné par la Science-Fiction, la Fantasy et l’univers de ses héros favoris qu’il croisera lors de ses aventures dans les jeux-vidéo, les séries et les films. IL aime se projeter dedans. Bien qu’il soit fan des nouveautés, le geek gardera toujours ses vieilles consoles, jeux, livres, séries et films.', 'assets/images/profil_geek.jpg'),
(2, 'Nolife', 'Véritable passionné ou addict, le nolife est complètement coupé du monde. Caché derrière un avatar, il mène sa vie comme bon lui semble. Souvent associé à une hygiène de vie déplorable et un manque d\'intérêt pour le monde qui l’entour, il aime simplement et uniquement sa passion.', 'assets/images/profil_nolife.jpg'),
(3, 'Nerd', 'Passionné par les technologies et les sciences, le nerd passe son temps sur son ordinateur ou à feuilleter des bouquins. Il fait principalement cela pour accumuler et approfondir ses connaissances dans les sciences. Son style vestimentaire ? Il n’en a pas particulièrement. Il s’habille au jour le jour sans se soucier du regards des autres.', 'assets/images/profil_nerd.png'),
(4, 'Casu', 'Pas particulièrement passionné par l’univers geek, vous accumulez quand même pas mal de notions de celui-ci. Cependant, vous gardez un peu vos distances et préférez sortir que rester enfermé dans une salle de cinéma ou chez vous. Vous êtes donc plutôt modéré en ce qui concerne l’appréhension des nouvelles technologies et vous ne vous vous passionnez pas particulièrement pour les sciences et la fiction.', 'assets/images/profil_casu.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Sauvegarde`
--

CREATE TABLE `Sauvegarde` (
  `id` int(11) NOT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `tranche_age` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Sauvegarde`
--

INSERT INTO `Sauvegarde` (`id`, `mail`, `genre`, `tranche_age`) VALUES
(13, 'cyrilbellamy1@gmail.com', 'homme', 'sup20'),
(14, 'bellamy.cyril@live.fr', 'homme', 'sup20');

-- --------------------------------------------------------

--
-- Structure de la table `Token`
--

CREATE TABLE `Token` (
  `id` int(11) NOT NULL,
  `validation` int(10) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `tranche_age` varchar(50) DEFAULT NULL,
  `id_resultat` int(11) DEFAULT NULL,
  `confirmkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Token`
--

INSERT INTO `Token` (`id`, `validation`, `mail`, `genre`, `tranche_age`, `id_resultat`, `confirmkey`) VALUES
(7, 0, 'hery.rasamimanana@gmail.com', 'homme', 'inf20', 1, '09157890001390'),
(8, 1, 'cyrilbellamy1@gmail.com', 'femme', 'sup20', 4, '43440039867555'),
(9, 1, 'cyrilbellamy1@gmail.com', 'femme', 'inf20', 4, '79510194493469'),
(10, 1, 'cyrilbellamy1@gmail.com', 'homme', 'inf20', 3, '86808714132071'),
(11, 0, 'cyrilbellamy1@gmail.com', 'femme', 'sup20', 3, '80999200833199'),
(12, 0, 'cyrilbellamy1@gmail.com', 'femme', 'sup20', 3, '59489783643287'),
(13, 0, 'cyrilbellamy1@gmail.com', 'femme', 'inf20', 4, '06352431770686'),
(14, 1, 'cyrilbellamy1@gmail.com', 'homme', 'inf20', 1, '40374585945920'),
(15, 1, 'cyrilbellamy1@gmail.com', 'homme', 'inf20', 1, '97351024258486'),
(16, 1, 'cyrilbellamy1@gmail.com', 'homme', 'inf20', 1, '88301182699325'),
(17, 1, 'cyrilbellamy1@gmail.com', 'homme', 'inf20', 1, '99415939874792'),
(18, 1, 'cyrilbellamy1@gmail.com', 'homme', 'inf20', 1, '21478974141817'),
(19, 1, 'cyrilbellamy1@gmail.com', 'femme', 'sup20', 2, '62913181196173'),
(20, 0, 'axelfertinel@gmail.com', 'homme', 'sup20', 4, '46229824788622'),
(21, 1, 'cyrilbellamy1@gmail.com', 'homme', 'inf20', 3, '21365666722155'),
(22, 1, 'cyrilbellamy1@gmail.com', 'homme', 'sup20', 3, '39786332769894'),
(23, 1, 'bellamy.cyril@live.fr', 'homme', 'sup20', 2, '94564682211781'),
(24, 0, 'cyrilbellamy1@gmail.com', 'homme', 'inf20', 1, '37591286659193'),
(25, 0, 'cyrilbellamy1@gmail.com', 'femme', 'sup20', 4, '23311465186241'),
(26, 0, 'cyrilbellamy1@gmail.com', 'homme', 'inf20', 1, '14753831196615'),
(27, 1, 'cyrilbellamy1@gmail.com', 'homme', 'inf20', 1, '26285498817135');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Config`
--
ALTER TABLE `Config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Données`
--
ALTER TABLE `Données`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Quizz`
--
ALTER TABLE `Quizz`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Resultat`
--
ALTER TABLE `Resultat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Sauvegarde`
--
ALTER TABLE `Sauvegarde`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Token`
--
ALTER TABLE `Token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_resultat` (`id_resultat`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Config`
--
ALTER TABLE `Config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Données`
--
ALTER TABLE `Données`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Quizz`
--
ALTER TABLE `Quizz`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `Resultat`
--
ALTER TABLE `Resultat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Sauvegarde`
--
ALTER TABLE `Sauvegarde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `Token`
--
ALTER TABLE `Token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Token`
--
ALTER TABLE `Token`
  ADD CONSTRAINT `Token_ibfk_1` FOREIGN KEY (`id_resultat`) REFERENCES `Resultat` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
