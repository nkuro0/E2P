-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 10 Juin 2017 à 00:58
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
-- Structure de la table `avis_jeux`
--

CREATE TABLE `avis_jeux` (
  `id` int(11) NOT NULL,
  `avis_jeux_id` int(11) NOT NULL,
  `avis_user_id` int(11) NOT NULL,
  `text` text,
  `dateAvis` date DEFAULT NULL,
  `dateTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `avis_jeux`
--

INSERT INTO `avis_jeux` (`id`, `avis_jeux_id`, `avis_user_id`, `text`, `dateAvis`, `dateTime`) VALUES
(115, 5, 12, '<p>Testera</p>\r\n', '2017-06-09', '14:14:45'),
(117, 31, 9, NULL, NULL, NULL),
(118, 32, 9, NULL, NULL, NULL),
(119, 33, 9, NULL, NULL, NULL),
(120, 34, 9, NULL, NULL, NULL),
(122, 5, 3, '<p>Super g&eacute;nial !</p>\r\n', '2017-06-09', '22:19:59'),
(123, 35, 9, NULL, NULL, NULL),
(125, 37, 9, NULL, NULL, NULL),
(126, 38, 9, NULL, NULL, NULL),
(127, 39, 9, NULL, NULL, NULL),
(128, 40, 9, NULL, NULL, NULL),
(129, 41, 9, NULL, NULL, NULL),
(130, 42, 9, NULL, NULL, NULL),
(131, 43, 9, NULL, NULL, NULL),
(132, 5, 13, '<p>J&#39;ai ador&eacute;</p>\r\n', '2017-06-10', '02:53:52'),
(133, 38, 13, '<p>Un mmo de folie</p>\r\n', '2017-06-10', '02:54:00'),
(134, 35, 13, '<p>Un jeu d&#39;infiltration comme je les aimes</p>\r\n', '2017-06-10', '02:54:21'),
(135, 41, 3, '<p>Un jeu d&#39;horreur que j&#39;affectionne beaucoup</p>\r\n', '2017-06-10', '02:56:04'),
(136, 34, 3, '<p>Je n&#39;ai pas aim&eacute;</p>\r\n', '2017-06-10', '02:56:21'),
(137, 37, 12, '<p>J&#39;adore dragon ball, merci e2p pour un service rapide !</p>\r\n', '2017-06-10', '02:57:06');

-- --------------------------------------------------------

--
-- Structure de la table `avis_join`
--

CREATE TABLE `avis_join` (
  `id` int(11) NOT NULL,
  `jeux_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `avis_id` int(11) NOT NULL,
  `avis_eval` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `avis_join`
--

INSERT INTO `avis_join` (`id`, `jeux_id`, `user_id`, `avis_id`, `avis_eval`) VALUES
(64, 5, 12, 115, 1),
(66, 31, 9, 117, NULL),
(67, 32, 9, 118, NULL),
(68, 33, 9, 119, NULL),
(69, 34, 9, 120, NULL),
(71, 5, 3, 122, 4),
(72, 35, 9, 123, NULL),
(74, 37, 9, 125, NULL),
(75, 38, 9, 126, NULL),
(76, 39, 9, 127, NULL),
(77, 40, 9, 128, NULL),
(78, 41, 9, 129, NULL),
(79, 42, 9, 130, NULL),
(80, 43, 9, 131, NULL),
(81, 5, 13, 132, 4),
(82, 38, 13, 133, 1),
(83, 35, 13, 134, 4),
(84, 41, 3, 135, 4),
(85, 34, 3, 136, 2),
(86, 37, 12, 137, 3);

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
(8, 'Third person shooter'),
(9, 'combat'),
(10, 'tactique'),
(11, 'horreur');

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
(252, 33, 8),
(253, 33, 9),
(256, 31, 3),
(257, 31, 10),
(258, 5, 1),
(259, 5, 2),
(260, 5, 7),
(261, 34, 5),
(262, 34, 8),
(263, 32, 1),
(269, 37, 9),
(270, 35, 1),
(271, 35, 5),
(272, 35, 9),
(279, 38, 2),
(280, 38, 4),
(281, 39, 1),
(282, 39, 3),
(290, 42, 9),
(291, 40, 1),
(292, 41, 1),
(296, 43, 1);

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
  `prix` varchar(10) NOT NULL,
  `datePub` date NOT NULL,
  `imgSmall` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `quantitySold` int(100) DEFAULT NULL,
  `description` text NOT NULL,
  `view` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`id`, `title`, `prix`, `datePub`, `imgSmall`, `url`, `quantity`, `quantitySold`, `description`, `view`) VALUES
(5, 'Borderlands 2 ', '18.00', '2013-02-22', 'Borderlands2.jpg', 'https://www.youtube.com/embed/kKVf5feSMEg', 7, 348, '<p>Une nouvelle &egrave;re de jeu de tir et de d&eacute;couverte d&eacute;barque. Incarnez l&#39;un des 4 chasseurs d&#39;Arche et affrontez un gigantesque monde de cr&eacute;atures et de sociopathes, sans oublier le diabolique Beau Jack. Faites-vous de nouveaux amis, armez-les jusqu&#39;aux dents et combattez ensemble &agrave; 4 en coop&eacute;ration dans une qu&ecirc;te de vengeance et de r&eacute;demption sur une plan&egrave;te vivante impr&eacute;visible et inexplor&eacute;e.</p>\r\n', 1),
(31, 'warhammer 40000', '28.00', '2017-05-25', 'dawnofwar3.jpg', 'https://www.youtube.com/embed/KrXrk1ntTCc', 43, 2, '<p>&nbsp;Prenez part &agrave; des batailles sans merci parmi trois factions dans Dawn of War III, vous devez affronter vos ennemis tandis qu&#39;une arme extr&ecirc;mement dangereuse vient d&#39;&ecirc;tre d&eacute;couverte dans le monde myst&eacute;rieux d&#39;Acheron.</p>\r\n', 1),
(32, 'Overwatch', '33.00', '2017-01-05', 'overwatch.jpg', 'https://www.youtube.com/embed/FqnKB22pOC0', 42, 18, '<p>Soldats. Scientifiques. Aventuriers. Marginaux. Dans une p&eacute;riode de crise mondiale, des h&eacute;ros venus de tous les horizons ont compos&eacute; une &eacute;quipe d&rsquo;intervention internationale pour ramener la paix dans un monde d&eacute;chir&eacute; par la guerre : OVERWATCH. Cette organisation a mis fin &agrave; la crise et pr&eacute;serv&eacute; la paix pendant les d&eacute;cennies suivantes, inspir&eacute; une &egrave;re d&rsquo;exploration, d&rsquo;innovation et de d&eacute;couvertes. Mais apr&egrave;s bien des ann&eacute;es, son influence s&rsquo;est &eacute;tiol&eacute;e, et elle a finalement &eacute;t&eacute; dissoute. Overwatch a disparu&hellip; mais le monde a toujours besoin de h&eacute;ros. Overwatch est un jeu de tir par &eacute;quipe o&ugrave; des h&eacute;ros s&#39;affrontent dans un monde d&eacute;chir&eacute; par la guerre.</p>\r\n', 1),
(33, 'For Honor', '30.00', '2017-03-30', 'forhonor.jpg', 'https://www.youtube.com/embed/y1HkuGUaNBY', 96, 4, '<p>Jeux de combat m&eacute;di&eacute;val</p>\r\n', 1),
(34, 'Watch Dogs 2', '24.00', '2017-03-15', 'WatchDogs2.jpg', 'https://www.youtube.com/embed/ixDxJ_X1pfo', 8, 12, '<p>Apr&egrave;s&nbsp;Chicago&nbsp;dans le premier opus, le jeu se d&eacute;roule cette fois-ci dans la ville de&nbsp;San Francisco&nbsp;aux&nbsp;&Eacute;tats-Unis1. Le jeu peut &ecirc;tre jou&eacute; en&nbsp;vue &agrave; la troisi&egrave;me personne&nbsp;et en&nbsp;vue &agrave; la premi&egrave;re personne&nbsp;lors de la conduite. Le joueur peut parcourir le monde en &agrave; pied ou dans un v&eacute;hicule. Le joueur contr&ocirc;le Marcus Holloway, un&nbsp;hacker&nbsp;qui travaille pour le groupe&nbsp;d&#39;hacktivistes&nbsp;DedSec&nbsp;pour prendre le contr&ocirc;le sur le&nbsp;ctOS 2.0, le syst&egrave;me de&nbsp;surveillance globale&nbsp;de&nbsp;San Francisco.</p>\r\n', 1),
(35, 'Dishonored 2', '27.50', '2016-09-07', 'dishonored2.jpg', 'https://www.youtube.com/embed/T3Z05Jr1wR4', 0, NULL, '<p>Endossez &agrave; nouveau le r&ocirc;le d&#39;assassin surnaturel dans Dishonored 2, le nouveau chapitre tant attendu de Dishonored, la saga maintes fois r&eacute;compens&eacute;e sign&eacute;e Arkane Studios. Explorez &agrave; votre mani&egrave;re un monde o&ugrave; mysticisme et industrialisation cohabitent. Choisirez-vous d&#39;incarner l&#39;Imp&eacute;ratrice Emily Kaldwin, ou le Protecteur royal Corvo Attano ? Traverserez-vous le jeu comme une ombre insaisissable, ferez-vous un usage immod&eacute;r&eacute; du redoutable syst&egrave;me de combat, ou un peu des deux ? Comment allez-vous combiner les pouvoirs uniques, les armes et les gadgets de votre personnage pour &eacute;liminer vos ennemis ? Au fil des missions &eacute;labor&eacute;es de main de ma&icirc;tre, vos choix r&eacute;&eacute;criront l&#39;histoire et m&egrave;neront &agrave; des d&eacute;nouements inattendus.</p>\r\n', 1),
(37, 'Dragon ball Xenoverse 2', '32.20', '2017-02-09', 'dragonballxenoverse2.jpg', 'https://www.youtube.com/embed/JnUbg-9v_bE', 31, 1, '<p>Jeu sur la c&eacute;l&egrave;bre licence dragon ball</p>\r\n', 1),
(38, 'World of warcraft : Legion', '21.00', '2017-06-05', 'worldofwarcraftlegion.jpg', '', 30, 1, '<p>La L&eacute;gion ardente est de retour en Azeroth, 10000 ans apr&egrave;s sa derni&egrave;re venue qui avait scind&eacute; les continents juste apr&egrave;s que Illidan Hurlorage arrive, for&ccedil;ant les arm&eacute;es de l&#39;Alliance et de la Horde &agrave; s&#39;unir afin d&#39;affronter le plus grand p&eacute;ril jamais rencontr&eacute;. Mais ils seront aid&eacute;s par les Chasseurs de D&eacute;mons, nouvelle classe annonc&eacute;e lors de la gamescom annon&ccedil;ant l&#39;extension. Niveau maximum mont&eacute; &agrave; 110, nouveaux arbres de talents, nouvelles zones... Vous pouvez cr&eacute;er un personnage niveau 100 &agrave; l&#39;essai de classe si vous voulez modifier votre S&eacute;same.</p>\r\n', 1),
(39, 'Battlefield 1', '41.99', '2017-06-06', 'Battlefield1.jpg', '', 31, 1, 'Battlefield 1 est jeu se d&eacute;roulant durant la 1&egrave;re guerre mondiale\r\n', 1),
(40, 'Star wars : Battlefront', '17.30', '2017-03-08', 'starwarsbattlefront.jpg', '', 19, 1, '<p>Le jeu se concentre sur cinq films de la saga&nbsp;Star Wars,&nbsp;Rogue One: A Star Wars Story,&nbsp;Un nouvel espoir,&nbsp;L&#39;Empire contre-attaque,&nbsp;Le Retour du Jedi&nbsp;et&nbsp;Le R&eacute;veil de la Force.&nbsp;Star Wars Battlefront&nbsp;met en sc&egrave;ne des combats arm&eacute;s entre les forces de l&#39;Empire galactique et d&#39;une organisation s&#39;y opposant, l&#39;Alliance rebelle (parfois appel&eacute;e la R&eacute;bellion) sur diverses plan&egrave;tes de la galaxie fictive. Ainsi, les plan&egrave;tes Tatooine (apparaissant d&egrave;s&nbsp;Un nouvel espoir), Hoth, Bespin (issues de&nbsp;L&#39;Empire contre-attaque), Endor (vue dans&nbsp;Le Retour du Jedi), Sullust (mentionn&eacute;e dans le m&ecirc;me film), Jakku (provenant de&nbsp;Le R&eacute;veil de la Force) et Scarif (venant de&nbsp;Rogue One: A Star Wars Story) sont les principaux th&eacute;&acirc;tres de guerre tout comme l&#39;&Eacute;toile de la mort, la base militaire de l&#39;Empire galactique5.</p>\r\n', 1),
(41, 'Doom 3 ', '7.90', '2016-01-06', 'Doom3.png', '', 28, 2, '<p>Doom 3 un jeu tr&egrave;s celebre</p>\r\n', 1),
(42, 'Injustice', '23.90', '2016-05-03', 'injustice.jpg', '', 11, 1, '<p>Un jeu de combat sur la saga DC</p>\r\n', 1),
(43, 'H1Z1', '15.45', '2017-04-05', 'h1z1.jpg', '', 3, 2, 'H1Z1 is currently in Early Access on Steam. With a fully transparent approach to game design and development here at Daybreak Games, we want to transform the way our players interact and participate with our games. H1Z1 Early Access is your chance to experience and make a difference in H1Z1 as it evolves throughout the development process.&nbsp;\r\n', 1);

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
-- Structure de la table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(15) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `text` text NOT NULL,
  `mail` varchar(50) NOT NULL,
  `dateMail` date NOT NULL,
  `dateTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mail`
--

INSERT INTO `mail` (`id`, `pseudo`, `firstname`, `name`, `user_id`, `text`, `mail`, `dateMail`, `dateTime`) VALUES
(9, 'Razen', 'Allan', 'Bil', 13, 'Bonjour, j\'ai fais une commande et je n\'ai pas reçu de mail', 'test1@hotmail.com', '2017-06-10', '02:54:50'),
(5, 'NKuro', 'Gérard', 'Florian', 12, 'bonjour, j\'ai un soucis de commande', 'nkuro@hotmail.Fr', '2017-06-09', '13:06:39'),
(6, 'NKuro', 'Gérard', 'Florian', 12, 'Bonjour, j\'ai un soucis de commande', 'nkuro@hotmail.Fr', '2017-06-09', '13:07:09'),
(7, 'NKuro', 'Gérard', 'Florian', 12, 'Bonjour, soucis', 'nkuro@hotmail.Fr', '2017-06-09', '13:07:22'),
(8, NULL, 'Gérard', 'Florian', NULL, 'merci beaucoup e2p', 'nkuro@hotmail.Fr', '2017-06-09', '13:07:48');

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
(2, 'Resident evil VII', '<p>Ut at mollis sapien. Cras aliquam, nisi ac bibendum fermentum, ipsum lectus porttitor erat, id ullamcorper orci ante et purus. Cras egestas augue egestas arcu porttitor, rutrum varius sem venenatis. Pellentesque id lectus placerat, ultricies sapien tincidunt, egestas diam. Aenean iaculis, tellus nec varius imperdiet, ipsum quam porta augue, eu imperdiet orci tortor vitae quam. Curabitur auctor sem sit amet odio aliquet, a imperdiet massa cursus. Vivamus vehicula elit non nulla ultrices, faucibus vehicula erat auctor. Fusce eleifend maximus eros, vel condimentum nisl bibendum vehicula. Etiam hendrerit efficitur ligula vel porttitor. Fusce maximus sollicitudin metus, quis convallis felis placerat et. Pellentesque interdum tellus vitae turpis pharetra, a ultricies est efficitur.</p>\r\n', '2016-12-16', '16:12:07', '1496176250.jpg', 1),
(18, 'Millenium TV - La vrai', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vulputate erat luctus nunc posuere bibendum. Integer sed tincidunt lacus. Integer semper mi vel turpis malesuada, non ullamcorper velit convallis. Cras blandit non dui ut ornare. Curabitur enim tortor, pharetra vel rutrum ut, hendrerit sed massa. Proin egestas leo eu metus rutrum aliquet. Aenean malesuada facilisis nulla gravida varius. Etiam ut felis pellentesque, rutrum nisl ut, varius urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tincidunt enim facilisis placerat.</p>\r\n', '2017-02-17', '19:45:09', '1496227039.jpg', 1);

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
(4, 'Nos services', 'Liste des services que nous proposons', 'Nos services', 'service', 1, '<h1>Pr&eacute;ambule</h1>\r\n\r\n<p>En validant sa commande, le Client d&eacute;clare accepter sans r&eacute;serve les termes de ladite commande ainsi que l&#39;int&eacute;gralit&eacute; des pr&eacute;sentes conditions g&eacute;n&eacute;rales de vente.</p>\r\n\r\n<h1>Article 1 - Objet</h1>\r\n\r\n<p>Le pr&eacute;sent site a pour objet la vente de cl&eacute;s CD t&eacute;l&eacute;chargeables en ligne &agrave; partir du site Instant-Gaming.com, sous forme de carte scann&eacute;e, ou dans de rares cas sous forme de code affich&eacute; au format texte. Les codes sont des cl&eacute;s officielles permettant de d&eacute;bloquer l&#39;int&eacute;gralit&eacute; d&#39;un jeu t&eacute;l&eacute;charg&eacute; sous forme digitale aupr&egrave;s des plate-formes de t&eacute;l&eacute;chargement mises &agrave; disposition par les d&eacute;veloppeurs du jeu. La disponibilit&eacute; des cartes est en fonction des stocks. Un produit qui n&#39;est pas en stock ne pourra &ecirc;tre achet&eacute;, puisque nous d&eacute;sactivons la vente si le code ou la carte n&#39;est pas disponible.</p>\r\n\r\n<h1>Article 2 - Formules - Dur&eacute;e</h1>\r\n\r\n<p>Le client pourra acheter en ligne les diff&eacute;rentes cartes contenant une cl&eacute; CD, selon le tarif en vigueur le jour de la commande. Une fois le code entr&eacute;, il sera consomm&eacute; pendant la p&eacute;riode choisie. L&#39;activation du jeu sera effective d&egrave;s le code valid&eacute; par la plate forme.</p>\r\n\r\n<h1>Article 3 - Tarifs et modes de r&egrave;glement</h1>\r\n\r\n<p>Les tarifs correspondent &agrave; l&#39;acc&egrave;s au jeu complet, pr&eacute;cis&eacute; sur les pages du site. Ils sont consultables &agrave; tout moment sur le site internet instant-gaming.com.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(6, 'Support', 'Support client', 'Support', 'support', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jeux_id` int(11) NOT NULL,
  `prix_unitaire` varchar(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  `dateAchat` date NOT NULL,
  `timeAchat` time NOT NULL,
  `num_commande` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`id`, `user_id`, `jeux_id`, `prix_unitaire`, `quantity`, `dateAchat`, `timeAchat`, `num_commande`) VALUES
(35, 12, 34, '23.99', 1, '2017-06-09', '23:40:34', '1497044432'),
(34, 12, 32, '32.25', 1, '2017-06-09', '23:40:34', '1497044432'),
(36, 12, 31, '28.00', 1, '2017-06-10', '00:15:48', '1497046543'),
(37, 12, 34, '23.99', 2, '2017-06-10', '00:15:48', '1497046543'),
(38, 12, 32, '32.25', 3, '2017-06-10', '00:16:09', '1497046565'),
(39, 12, 33, '30.00', 1, '2017-06-10', '00:16:09', '1497046565'),
(40, 3, 32, '32.25', 3, '2017-06-10', '01:08:01', '1497049679'),
(41, 3, 34, '23.99', 1, '2017-06-10', '01:08:01', '1497049679'),
(42, 3, 5, '18.00', 12, '2017-06-10', '01:12:40', '1497049954'),
(43, 13, 32, '33.00', 1, '2017-06-10', '02:53:26', '1497056004'),
(44, 13, 38, '21.00', 1, '2017-06-10', '02:53:26', '1497056004'),
(45, 13, 43, '15.45', 1, '2017-06-10', '02:53:26', '1497056004'),
(46, 13, 5, '18.00', 1, '2017-06-10', '02:55:02', '1497056101'),
(47, 13, 37, '32.20', 1, '2017-06-10', '02:55:02', '1497056101'),
(48, 13, 41, '7.90', 1, '2017-06-10', '02:55:02', '1497056101'),
(49, 13, 34, '24.00', 1, '2017-06-10', '02:55:12', '1497056111'),
(50, 13, 39, '41.99', 1, '2017-06-10', '02:55:12', '1497056111'),
(51, 13, 40, '17.30', 1, '2017-06-10', '02:55:12', '1497056111'),
(52, 13, 43, '15.45', 1, '2017-06-10', '02:55:12', '1497056111'),
(53, 3, 34, '24.00', 1, '2017-06-10', '02:55:42', '1497056140'),
(54, 3, 41, '7.90', 1, '2017-06-10', '02:55:42', '1497056140'),
(55, 3, 42, '23.90', 1, '2017-06-10', '02:55:42', '1497056140');

-- --------------------------------------------------------

--
-- Structure de la table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `jeux_id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `view` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `slides`
--

INSERT INTO `slides` (`id`, `jeux_id`, `img`, `view`) VALUES
(13, 34, 'watchdog2_slider.png', 1),
(15, 33, 'forhonor_slider.jpg', 1);

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
(9, 'god', 'div', 'webdev', '$2y$10$OLd7Fx8l0fjmBcFIHm2EtuoCEtokjZ6Z3lrozdfbl98OvBYMLYUre', 'webdev@hotmail.fr', 4),
(12, 'Florian', 'Gérard', 'NKuro', '$2y$10$.ChjRG5j3/F..KFPoXDm4.IsEy/XZnDqVjKbiewc9uDSEbmOyRZDe', 'nkuro@hotmail.Fr', 1),
(13, 'Bil', 'Allan', 'Razen', '$2y$10$HJZDsU3mVf5.XZQLAErw6uEZTFEzDGRbsWoxSgXtiJu.1WdwHBeyC', 'test1@hotmail.com', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `avis_jeux`
--
ALTER TABLE `avis_jeux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avis_jeux_id` (`avis_jeux_id`),
  ADD KEY `avis_user_id` (`avis_user_id`);

--
-- Index pour la table `avis_join`
--
ALTER TABLE `avis_join`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeux_id` (`jeux_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `avis_id` (`avis_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `prix` (`prix`),
  ADD KEY `title_2` (`title`);

--
-- Index pour la table `level_users`
--
ALTER TABLE `level_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mail`
--
ALTER TABLE `mail`
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
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jeux_id` (`jeux_id`);

--
-- Index pour la table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeux_id` (`jeux_id`);

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
-- AUTO_INCREMENT pour la table `avis_jeux`
--
ALTER TABLE `avis_jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT pour la table `avis_join`
--
ALTER TABLE `avis_join`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `cat_join`
--
ALTER TABLE `cat_join`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avis_jeux`
--
ALTER TABLE `avis_jeux`
  ADD CONSTRAINT `avis_jeux_id` FOREIGN KEY (`avis_jeux_id`) REFERENCES `jeux` (`id`),
  ADD CONSTRAINT `avis_user_id` FOREIGN KEY (`avis_user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `avis_join`
--
ALTER TABLE `avis_join`
  ADD CONSTRAINT `cstr_avis_id` FOREIGN KEY (`avis_id`) REFERENCES `avis_jeux` (`id`),
  ADD CONSTRAINT `cstr_jeux_id` FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`id`),
  ADD CONSTRAINT `cstr_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `cat_join`
--
ALTER TABLE `cat_join`
  ADD CONSTRAINT `cat_join_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `cat_join_ibfk_2` FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`id`);

--
-- Contraintes pour la table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `cstr_slide_jeux_id` FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`levelUser`) REFERENCES `level_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
