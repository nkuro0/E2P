-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 18 Avril 2017 à 09:39
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `e2p`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `tags` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `tags`) VALUES
(1, 'fps'),
(2, 'jeu de rôle'),
(3, 'stratégie'),
(4, 'mmorpg'),
(5, 'infiltration'),
(6, 'course'),
(7, 'action'),
(8, 'Third person shooter');

-- --------------------------------------------------------

--
-- Structure de la table `cat_join`
--

CREATE TABLE `cat_join` (
  `id` int(11) NOT NULL,
  `jeux_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cat_join`
--

INSERT INTO `cat_join` (`id`, `jeux_id`, `categorie_id`) VALUES
(9, 10, 2),
(10, 10, 4),
(14, 12, 7),
(15, 13, 2),
(16, 13, 7),
(17, 13, 8),
(31, 11, 1),
(32, 11, 7),
(33, 4, 1),
(34, 4, 5),
(35, 14, 3),
(36, 15, 1),
(37, 15, 8);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` longtext,
  `parent_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `parent_id`) VALUES
(1, 'Premier commentaire', 0),
(2, 'commentaire avec enfant', 0),
(3, 'première réponse', 2),
(4, 'seconde réponse', 2),
(5, 'sous sous réponse', 3);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `prix` varchar(50) NOT NULL,
  `datePub` date NOT NULL,
  `eval` tinyint(3) NOT NULL,
  `imgSmall` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `quantitySold` int(100) DEFAULT NULL,
  `description` text NOT NULL,
  `view` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`id`, `title`, `prix`, `datePub`, `eval`, `imgSmall`, `quantity`, `quantitySold`, `description`, `view`) VALUES
(1, 'Overwatch', '36.00', '2016-05-24', 5, 'overwatchMin.jpg', 243, 60, 'Soldats. Scientifiques. Aventuriers. Marginaux.\r\nDans une période de crise mondiale, des héros venus de tous les horizons ont composé une équipe d’intervention internationale pour ramener la paix dans un monde déchiré par la guerre : OVERWATCH.\r\n\r\nCette organisation a mis fin à la crise et préservé la paix pendant les décennies suivantes, inspiré une ère d’exploration, d’innovation et de découvertes. Mais après bien des années, son influence s’est étiolée, et elle a finalement été dissoute. Overwatch a disparu… mais le monde a toujours besoin de héros.\r\n\r\nOverwatch est un jeu de tir par équipe où des héros s\'affrontent dans un monde déchiré par la guerre.', 1),
(3, 'Battlefield 1', '25.00', '2016-10-21', 5, 'Battlefield1min.jpg', 230, 200, 'Battlefield 1 vous ramène au temps de la Première Guerre mondiale, où les nouvelles technologies et les conflits mondiaux ont marqué les débuts de la guerre moderne. Participez à chaque bataille, contrôlez des véhicules gigantesques et exécutez des manœuvres qui changeront le cours du combat. Le monde entier est en guerre. Découvrez ce qui se trouve au-delà des tranchées.', 1),
(4, 'Dishonored 2', '24.40', '2017-04-04', 1, 'dishonored2Min.jpg', 0, 15, '<p>Endossez &agrave; nouveau le r&ocirc;le d&#39;assassin surnaturel dans Dishonored 2, le nouveau chapitre tant attendu de Dishonored, la saga maintes fois r&eacute;compens&eacute;e sign&eacute;e Arkane Studios. Explorez &agrave; votre mani&egrave;re un monde o&ugrave; mysticisme et industrialisation cohabitent. Choisirez-vous d&#39;incarner l&#39;Imp&eacute;ratrice Emily Kaldwin, ou le Protecteur royal Corvo Attano ? Traverserez-vous le jeu comme une ombre insaisissable, ferez-vous un usage immod&eacute;r&eacute; du redoutable syst&egrave;me de combat, ou un peu des deux ? Comment allez-vous combiner les pouvoirs uniques, les armes et les gadgets de votre personnage pour &eacute;liminer vos ennemis ? Au fil des missions &eacute;labor&eacute;es de main de ma&icirc;tre, vos choix r&eacute;&eacute;criront l&#39;histoire et m&egrave;neront &agrave; des d&eacute;nouements inattendus.</p>\r\n', 1),
(5, 'Borderlands 2 ', '9.80', '2012-10-12', 2, 'borderlands2Min.jpg', 70, 40, 'Une nouvelle ère de jeu de tir et de découverte débarque. Incarnez l\'un des 4 chasseurs d\'Arche et affrontez un gigantesque monde de créatures et de sociopathes, sans oublier le diabolique Beau Jack. Faites-vous de nouveaux amis, armez-les jusqu\'aux dents et combattez ensemble à 4 en coopération dans une quête de vengeance et de rédemption sur une planète vivante imprévisible et inexplorée.', 1),
(10, 'World of warcraft : Legion', '20.99', '2017-02-19', 5, '1487538447.jpg', 2250, NULL, 'La L&eacute;gion ardente est de retour en Azeroth, 10000 ans apr&egrave;s sa derni&egrave;re venue qui avait scind&eacute; les continents juste apr&egrave;s que Illidan Hurlorage arrive, for&ccedil;ant les arm&eacute;es de l&#39;Alliance et de la Horde &agrave; s&#39;unir afin d&#39;affronter le plus grand p&eacute;ril jamais rencontr&eacute;. Mais ils seront aid&eacute;s par les Chasseurs de D&eacute;mons, nouvelle classe annonc&eacute;e lors de la gamescom annon&ccedil;ant l&#39;extension. Niveau maximum mont&eacute; &agrave; 110, nouveaux arbres de talents, nouvelles zones...\r\n\r\nVous pouvez cr&eacute;er un personnage niveau 100 &agrave; l&#39;essai de classe si vous voulez modifier votre S&eacute;same.\r\n', 1),
(11, 'Star wars battle front', '26', '2017-04-03', 1, '1487538514.jpg', 327, NULL, '<p>Le jeu se concentre sur cinq films de la saga&nbsp;Star Wars,&nbsp;Rogue One: A Star Wars Story,&nbsp;Un nouvel espoir,&nbsp;L&#39;Empire contre-attaque,&nbsp;Le Retour du Jedi&nbsp;et&nbsp;Le R&eacute;veil de la Force.&nbsp;Star Wars Battlefront&nbsp;met en sc&egrave;ne des combats arm&eacute;s entre les forces de l&#39;Empire galactique et d&#39;une organisation s&#39;y opposant, l&#39;Alliance rebelle (parfois appel&eacute;e la R&eacute;bellion) sur diverses plan&egrave;tes de la galaxie fictive. Ainsi, les plan&egrave;tes Tatooine (apparaissant d&egrave;s&nbsp;Un nouvel espoir), Hoth, Bespin (issues de&nbsp;L&#39;Empire contre-attaque), Endor (vue dans&nbsp;Le Retour du Jedi), Sullust (mentionn&eacute;e dans le m&ecirc;me film), Jakku (provenant de&nbsp;Le R&eacute;veil de la Force) et Scarif (venant de&nbsp;Rogue One: A Star Wars Story) sont les principaux th&eacute;&acirc;tres de guerre tout comme l&#39;&Eacute;toile de la mort, la base militaire de l&#39;Empire galactique5.</p>\r\n', 1),
(12, 'Dragon ball Xenoverse 2', '32', '2017-04-03', 1, '1487591974.jpg', 0, NULL, '<p>Un an apr&egrave;s le premier opus, Dragon Ball Xenoverse revient dans un nouveau jeu qui revendique l&#39;univers le plus d&eacute;taill&eacute; de tous les jeux Dragon Ball. Le jeu reprend la recette du premier Dragon Ball Xenoverse avec des bases de MMORPG et le retour des policiers du temps qui doivent prot&eacute;ger l&#39;histoire.&nbsp;</p>\r\n', 1),
(13, 'For Honor', '39.95', '2017-02-19', 5, '1487539103.jpg', 2670, NULL, 'For honor est un jeu d&#39;action/beat&#39;em all dans un univers m&eacute;di&eacute;val\r\n', 1),
(14, 'Warhammer 40000 : Dawn of War 3 ', '34.99', '2017-04-12', 5, '1491987555.jpg', 5, NULL, 'Prenez part &agrave; des batailles sans merci parmi trois factions\r\n\r\nDans Dawn of War&reg; III, vous devez affronter vos ennemis tandis qu&#39;une arme extr&ecirc;mement dangereuse vient d&#39;&ecirc;tre d&eacute;couverte dans le monde myst&eacute;rieux d&#39;Acheron.\r\n\r\n\r\nTandis que la guerre fait rage, la supr&eacute;matie sera synonyme de survie sur une plan&egrave;te assi&eacute;g&eacute;e par les arm&eacute;es du seigneur Gorgutz, un Orque des plus voraces, de Macha, ambitieux proph&egrave;te des Eldars, et du puissant commandant des Space Marines, Gabriel Angelos\r\n', 1),
(15, 'H1Z1', '20.99', '2017-04-12', 3, '1491987640.jpg', 7, NULL, 'H1Z1 is currently in Early Access on Steam. With a fully transparent approach to game design and development here at Daybreak Games, we want to transform the way our players interact and participate with our games. H1Z1 Early Access is your chance to experience and make a difference in H1Z1 as it evolves throughout the development process.&nbsp;\r\n', 1);

-- --------------------------------------------------------

--
-- Structure de la table `level_users`
--

CREATE TABLE `level_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `level_users`
--

INSERT INTO `level_users` (`id`, `name`, `level`) VALUES
(1, 'Utilisateur', 1),
(2, 'Modérateur', 2),
(3, 'Administrateur', 3),
(4, 'Webdev', 4);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `datePub` date NOT NULL,
  `time` time NOT NULL,
  `img` varchar(50) NOT NULL,
  `view` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `datePub`, `time`, `img`, `view`) VALUES
(1, 'ESCW world cup', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla finibus ante. Curabitur justo erat, maximus at faucibus sit amet, faucibus eget orci. Fusce nunc libero, auctor eu euismod quis, pulvinar ut est. Praesent dapibus at felis a vulputate. Proin varius sapien eget metus vulputate, eget fermentum risus convallis. Aliquam consectetur volutpat est, sit amet mattis metus finibus at. Vestibulum eget justo eu leo hendrerit auctor.</p>\r\n', '2017-01-04', '10:32:15', 'ESWC2016.png', 1),
(2, 'Resident evil VII', 'Ut at mollis sapien. Cras aliquam, nisi ac bibendum fermentum, ipsum lectus porttitor erat, id ullamcorper orci ante et purus. Cras egestas augue egestas arcu porttitor, rutrum varius sem venenatis. Pellentesque id lectus placerat, ultricies sapien tincidunt, egestas diam. Aenean iaculis, tellus nec varius imperdiet, ipsum quam porta augue, eu imperdiet orci tortor vitae quam. Curabitur auctor sem sit amet odio aliquet, a imperdiet massa cursus. Vivamus vehicula elit non nulla ultrices, faucibus vehicula erat auctor. Fusce eleifend maximus eros, vel condimentum nisl bibendum vehicula. Etiam hendrerit efficitur ligula vel porttitor. Fusce maximus sollicitudin metus, quis convallis felis placerat et. Pellentesque interdum tellus vitae turpis pharetra, a ultricies est efficitur.', '2016-12-16', '16:12:07', 'residentevil7.jpg', 1),
(18, 'Millenium TV - La vrai', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vulputate erat luctus nunc posuere bibendum. Integer sed tincidunt lacus. Integer semper mi vel turpis malesuada, non ullamcorper velit convallis. Cras blandit non dui ut ornare. Curabitur enim tortor, pharetra vel rutrum ut, hendrerit sed massa. Proin egestas leo eu metus rutrum aliquet. Aenean malesuada facilisis nulla gravida varius. Etiam ut felis pellentesque, rutrum nisl ut, varius urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tincidunt enim facilisis placerat.</p>\r\n', '2017-02-17', '19:45:09', '1487595052.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `link` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `view` tinyint(1) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `link`, `slug`, `view`, `content`) VALUES
(1, 'Nos derniers arrivage', 'Easy 2 play votre revendeur de jeux dématérialisé.', 'Accueil', 'accueil', 1, '<h2>Accueil</h2>\r\n'),
(2, 'Nos jeux', 'Notre catalogue de jeux', 'Catalogue', 'catalogue', 1, ''),
(3, 'Nouveautés', 'Nos news', 'News ', 'news', 1, ''),
(4, 'Nos services', 'Liste des services que nous proposons', 'Nos services', 'Service', 1, '<h1>Pr&eacute;ambule</h1>\r\n\r\n<p>En validant sa commande, le Client d&eacute;clare accepter sans r&eacute;serve les termes de ladite commande ainsi que l&#39;int&eacute;gralit&eacute; des pr&eacute;sentes conditions g&eacute;n&eacute;rales de vente.</p>\r\n\r\n<h1>Article 1 - Objet</h1>\r\n\r\n<p>Le pr&eacute;sent site a pour objet la vente de cl&eacute;s CD t&eacute;l&eacute;chargeables en ligne &agrave; partir du site Instant-Gaming.com, sous forme de carte scann&eacute;e, ou dans de rares cas sous forme de code affich&eacute; au format texte. Les codes sont des cl&eacute;s officielles permettant de d&eacute;bloquer l&#39;int&eacute;gralit&eacute; d&#39;un jeu t&eacute;l&eacute;charg&eacute; sous forme digitale aupr&egrave;s des plate-formes de t&eacute;l&eacute;chargement mises &agrave; disposition par les d&eacute;veloppeurs du jeu. La disponibilit&eacute; des cartes est en fonction des stocks. Un produit qui n&#39;est pas en stock ne pourra &ecirc;tre achet&eacute;, puisque nous d&eacute;sactivons la vente si le code ou la carte n&#39;est pas disponible.</p>\r\n\r\n<h1>Article 2 - Formules - Dur&eacute;e</h1>\r\n\r\n<p>Le client pourra acheter en ligne les diff&eacute;rentes cartes contenant une cl&eacute; CD, selon le tarif en vigueur le jour de la commande. Une fois le code entr&eacute;, il sera consomm&eacute; pendant la p&eacute;riode choisie. L&#39;activation du jeu sera effective d&egrave;s le code valid&eacute; par la plate forme.</p>\r\n\r\n<h1>Article 3 - Tarifs et modes de r&egrave;glement</h1>\r\n\r\n<p>Les tarifs correspondent &agrave; l&#39;acc&egrave;s au jeu complet, pr&eacute;cis&eacute; sur les pages du site. Ils sont consultables &agrave; tout moment sur le site internet instant-gaming.com.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="http://i.kinja-img.com/gawker-media/image/upload/t_original/wwy4z3jyvpawouujaprp.jpg" style="height:398px; width:800px" /></p>\r\n'),
(6, 'Support', 'Support client', 'Support', 'support', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `prix` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL,
  `view` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `slides`
--

INSERT INTO `slides` (`id`, `title`, `prix`, `img`, `view`) VALUES
(1, 'Battlefield 1', '25.00', 'battlefield1_slider.png', 1),
(2, 'Dishonored 2', '28.99', 'dishonored2_slider.jpg', 1),
(3, 'Watch dog 2', '29.99', 'watchdog2_slider.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `levelUser` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `username`, `password`, `mail`, `levelUser`) VALUES
(1, 'gér', 'Flo', 'modo', '$2y$10$uax1uRAIgLgifL5QPuDoq.P0inM75vSzj9frznpSWGK8XOFN/O87i', 'modo@hotmail.fr', 2),
(3, 'nic', 'pol', 'user', '$2y$10$Pb206riroSduHj9INO7Bou0sgzfU3R3HeW2FBLXGXAWSpbEi2gnpG', 'user1@hotmail.fr', 1),
(4, 'mat', 'mut', 'admin', '$2y$10$HRprY87Fl/HkVkCc2JPyteF75sxHMLS04HMnzAFw/DDbcXsFTEHsO', 'admin@hotmail.fr', 3),
(9, 'god', 'div', 'webdev', '$2y$10$OLd7Fx8l0fjmBcFIHm2EtuoCEtokjZ6Z3lrozdfbl98OvBYMLYUre', 'webdev@hotmail.fr', 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cat_join`
--
ALTER TABLE `cat_join`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeux_id` (`jeux_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `level_users`
--
ALTER TABLE `level_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `levelUser` (`levelUser`),
  ADD KEY `levelUser_2` (`levelUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `cat_join`
--
ALTER TABLE `cat_join`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cat_join`
--
ALTER TABLE `cat_join`
  ADD CONSTRAINT `cat_join_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `cat_join_ibfk_2` FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`levelUser`) REFERENCES `level_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
