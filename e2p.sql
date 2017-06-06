-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 06 Juin 2017 à 11:30
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
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `avis_jeux`
--

INSERT INTO `avis_jeux` (`id`, `avis_jeux_id`, `avis_user_id`, `text`, `date`) VALUES
(55, 3, 9, '<p>J&#39;ai ador&eacute;, g&eacute;nial</p>\r\n', NULL),
(56, 4, 9, '<p>J&#39;ai ador&eacute;</p>\r\n', NULL),
(57, 5, 9, '<p>J&#39;ai ador&eacute;</p>\r\n', NULL),
(58, 10, 9, '<p>J&#39;ai ador&eacute;</p>\r\n', NULL),
(59, 11, 9, '<p>J&#39;ai ador&eacute;</p>\r\n', NULL),
(60, 12, 9, '<p>J&#39;ai ador&eacute;</p>\r\n', NULL),
(61, 13, 9, '<p>J&#39;ai ador&eacute;</p>\r\n', NULL),
(62, 14, 9, '<p>J&#39;ai ador&eacute;</p>\r\n', NULL),
(63, 15, 9, '<p>J&#39;ai ador&eacute;</p>\r\n', NULL),
(66, 1, 9, '<p>J&#39;ai ador&eacute;, ouaip</p>\r\n', NULL),
(71, 1, 3, '<p>J&#39;ai ador&eacute; super g&eacute;nial</p>\r\n', NULL),
(72, 1, 4, '<p>Merci pour overwatch, le jeu est top !</p>\r\n', NULL),
(74, 3, 3, '<p>J&#39;ai ador&eacute; test</p>\r\n', NULL),
(75, 5, 3, '<p>J&#39;ai ador&eacute; test</p>\r\n', NULL),
(76, 5, 4, '<p>bordeland 2 un grand classique !</p>\r\n', NULL),
(77, 10, 3, '<p>ouai</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL),
(79, 22, 9, NULL, NULL),
(84, 27, 9, NULL, NULL),
(91, 34, 9, NULL, NULL),
(92, 34, 3, '<p>Trop cool !</p>\r\n', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `avis_join`
--

CREATE TABLE `avis_join` (
  `id` int(11) NOT NULL,
  `jeux_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `avis_id` int(11) NOT NULL,
  `avis_eval` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `avis_join`
--

INSERT INTO `avis_join` (`id`, `jeux_id`, `user_id`, `avis_id`, `avis_eval`) VALUES
(3, 3, 9, 55, 1),
(4, 4, 9, 56, 1),
(5, 5, 9, 57, 1),
(6, 10, 9, 58, 1),
(7, 11, 9, 59, 1),
(8, 12, 9, 60, 1),
(9, 13, 9, 61, 1),
(12, 14, 9, 62, 1),
(13, 15, 9, 63, 1),
(15, 1, 9, 66, 3),
(20, 1, 3, 71, 4),
(21, 1, 4, 72, 3),
(23, 3, 3, 74, 1),
(24, 5, 3, 75, 1),
(25, 5, 4, 76, 5),
(26, 10, 3, 77, 1),
(28, 22, 9, 79, 0),
(33, 27, 9, 84, 0),
(40, 34, 9, 91, 0),
(41, 34, 3, 92, 5);

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
(131, 1, 1),
(132, 1, 7),
(133, 3, 1),
(134, 4, 1),
(135, 4, 5),
(136, 5, 1),
(137, 5, 2),
(138, 5, 7),
(139, 10, 2),
(140, 10, 4),
(141, 11, 1),
(142, 11, 3),
(143, 11, 7),
(144, 11, 8),
(145, 13, 2),
(146, 13, 7),
(147, 13, 8),
(148, 12, 7),
(149, 14, 3),
(150, 14, 10),
(154, 15, 1),
(155, 15, 8),
(156, 15, 11),
(157, 22, 1),
(158, 22, 3),
(159, 22, 10),
(160, 27, 1),
(161, 27, 7),
(162, 27, 11),
(163, 34, 1);

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
  `imgSmall` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `quantitySold` int(100) DEFAULT NULL,
  `description` text NOT NULL,
  `view` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`id`, `title`, `prix`, `datePub`, `imgSmall`, `quantity`, `quantitySold`, `description`, `view`) VALUES
(1, 'Overwatch', '36.00', '2017-04-06', 'overwatch.jpg', 243, 60, '<p>Soldats. Scientifiques. Aventuriers. Marginaux. Dans une p&eacute;riode de crise mondiale, des h&eacute;ros venus de tous les horizons ont compos&eacute; une &eacute;quipe d&rsquo;intervention internationale pour ramener la paix dans un monde d&eacute;chir&eacute; par la guerre : OVERWATCH. Cette organisation a mis fin &agrave; la crise et pr&eacute;serv&eacute; la paix pendant les d&eacute;cennies suivantes, inspir&eacute; une &egrave;re d&rsquo;exploration, d&rsquo;innovation et de d&eacute;couvertes. Mais apr&egrave;s bien des ann&eacute;es, son influence s&rsquo;est &eacute;tiol&eacute;e, et elle a finalement &eacute;t&eacute; dissoute. Overwatch a disparu&hellip; mais le monde a toujours besoin de h&eacute;ros. Overwatch est un jeu de tir par &eacute;quipe o&ugrave; des h&eacute;ros s&#39;affrontent dans un monde d&eacute;chir&eacute; par la guerre.</p>\r\n', 1),
(3, 'Battlefield 1', '25.00', '2016-03-24', 'Battlefield1.jpg', 230, 200, '<p>Battlefield 1 vous ram&egrave;ne au temps de la Premi&egrave;re Guerre mondiale, o&ugrave; les nouvelles technologies et les conflits mondiaux ont marqu&eacute; les d&eacute;buts de la guerre moderne. Participez &agrave; chaque bataille, contr&ocirc;lez des v&eacute;hicules gigantesques et ex&eacute;cutez des man&oelig;uvres qui changeront le cours du combat. Le monde entier est en guerre. D&eacute;couvrez ce qui se trouve au-del&agrave; des tranch&eacute;es.</p>\r\n', 1),
(4, 'Dishonored 2', '24.40', '2016-10-21', 'dishonored2.jpg', 0, 15, '<p>Endossez &agrave; nouveau le r&ocirc;le d&#39;assassin surnaturel dans Dishonored 2, le nouveau chapitre tant attendu de Dishonored, la saga maintes fois r&eacute;compens&eacute;e sign&eacute;e Arkane Studios. Explorez &agrave; votre mani&egrave;re un monde o&ugrave; mysticisme et industrialisation cohabitent. Choisirez-vous d&#39;incarner l&#39;Imp&eacute;ratrice Emily Kaldwin, ou le Protecteur royal Corvo Attano ? Traverserez-vous le jeu comme une ombre insaisissable, ferez-vous un usage immod&eacute;r&eacute; du redoutable syst&egrave;me de combat, ou un peu des deux ? Comment allez-vous combiner les pouvoirs uniques, les armes et les gadgets de votre personnage pour &eacute;liminer vos ennemis ? Au fil des missions &eacute;labor&eacute;es de main de ma&icirc;tre, vos choix r&eacute;&eacute;criront l&#39;histoire et m&egrave;neront &agrave; des d&eacute;nouements inattendus.</p>\r\n', 1),
(5, 'Borderlands 2 ', '17.50', '2013-02-22', 'Borderlands2.jpg', 70, 40, '<p>Une nouvelle &egrave;re de jeu de tir et de d&eacute;couverte d&eacute;barque. Incarnez l&#39;un des 4 chasseurs d&#39;Arche et affrontez un gigantesque monde de cr&eacute;atures et de sociopathes, sans oublier le diabolique Beau Jack. Faites-vous de nouveaux amis, armez-les jusqu&#39;aux dents et combattez ensemble &agrave; 4 en coop&eacute;ration dans une qu&ecirc;te de vengeance et de r&eacute;demption sur une plan&egrave;te vivante impr&eacute;visible et inexplor&eacute;e.</p>\r\n', 1),
(10, 'World of warcraft : Legion', '20.99', '2016-07-08', 'worldofwarcraftlegion.jpg', 2250, NULL, '<p>La L&eacute;gion ardente est de retour en Azeroth, 10000 ans apr&egrave;s sa derni&egrave;re venue qui avait scind&eacute; les continents juste apr&egrave;s que Illidan Hurlorage arrive, for&ccedil;ant les arm&eacute;es de l&#39;Alliance et de la Horde &agrave; s&#39;unir afin d&#39;affronter le plus grand p&eacute;ril jamais rencontr&eacute;. Mais ils seront aid&eacute;s par les Chasseurs de D&eacute;mons, nouvelle classe annonc&eacute;e lors de la gamescom annon&ccedil;ant l&#39;extension. Niveau maximum mont&eacute; &agrave; 110, nouveaux arbres de talents, nouvelles zones... Vous pouvez cr&eacute;er un personnage niveau 100 &agrave; l&#39;essai de classe si vous voulez modifier votre S&eacute;same.</p>\r\n', 1),
(11, 'Star wars battle front', '26', '2015-11-29', 'starwarsbattlefront.jpg', 327, NULL, '<p>Le jeu se concentre sur cinq films de la saga&nbsp;Star Wars,&nbsp;Rogue One: A Star Wars Story,&nbsp;Un nouvel espoir,&nbsp;L&#39;Empire contre-attaque,&nbsp;Le Retour du Jedi&nbsp;et&nbsp;Le R&eacute;veil de la Force.&nbsp;Star Wars Battlefront&nbsp;met en sc&egrave;ne des combats arm&eacute;s entre les forces de l&#39;Empire galactique et d&#39;une organisation s&#39;y opposant, l&#39;Alliance rebelle (parfois appel&eacute;e la R&eacute;bellion) sur diverses plan&egrave;tes de la galaxie fictive. Ainsi, les plan&egrave;tes Tatooine (apparaissant d&egrave;s&nbsp;Un nouvel espoir), Hoth, Bespin (issues de&nbsp;L&#39;Empire contre-attaque), Endor (vue dans&nbsp;Le Retour du Jedi), Sullust (mentionn&eacute;e dans le m&ecirc;me film), Jakku (provenant de&nbsp;Le R&eacute;veil de la Force) et Scarif (venant de&nbsp;Rogue One: A Star Wars Story) sont les principaux th&eacute;&acirc;tres de guerre tout comme l&#39;&Eacute;toile de la mort, la base militaire de l&#39;Empire galactique5.</p>\r\n', 1),
(12, 'Dragon ball Xenoverse 2', '32', '2016-10-12', 'dragonballxenoverse2.jpg', 0, NULL, '<p>Un an apr&egrave;s le premier opus, Dragon Ball Xenoverse revient dans un nouveau jeu qui revendique l&#39;univers le plus d&eacute;taill&eacute; de tous les jeux Dragon Ball. Le jeu reprend la recette du premier Dragon Ball Xenoverse avec des bases de MMORPG et le retour des policiers du temps qui doivent prot&eacute;ger l&#39;histoire.&nbsp;</p>\r\n', 1),
(13, 'For Honor', '39.95', '2017-02-09', 'forhonor.jpg', 2670, NULL, '<p>For honor est un jeu d&#39;action/beat&#39;em all dans un univers m&eacute;di&eacute;val</p>\r\n', 1),
(14, 'Warhammer 40000 : Dawn of War 3 ', '34.99', '2017-05-04', 'dawnofwar3.jpg', 5, NULL, '<p>Prenez part &agrave; des batailles sans merci parmi trois factions Dans Dawn of War&reg; III, vous devez affronter vos ennemis tandis qu&#39;une arme extr&ecirc;mement dangereuse vient d&#39;&ecirc;tre d&eacute;couverte dans le monde myst&eacute;rieux d&#39;Acheron. Tandis que la guerre fait rage, la supr&eacute;matie sera synonyme de survie sur une plan&egrave;te assi&eacute;g&eacute;e par les arm&eacute;es du seigneur Gorgutz, un Orque des plus voraces, de Macha, ambitieux proph&egrave;te des Eldars, et du puissant commandant des Space Marines, Gabriel Angelos</p>\r\n', 1),
(15, 'H1Z1', '20.99', '2015-04-09', 'h1z1.jpg', 7, NULL, '<p>H1Z1 is currently in Early Access on Steam. With a fully transparent approach to game design and development here at Daybreak Games, we want to transform the way our players interact and participate with our games. H1Z1 Early Access is your chance to experience and make a difference in H1Z1 as it evolves throughout the development process.&nbsp;</p>\r\n', 1),
(22, 'Rainbow six : Siege', '15.75', '2015-06-19', 'rainbow6siege.jpg', 50, NULL, '<p>test</p>\r\n', 1),
(27, 'Doom 3', '3.4', '2009-06-23', 'Doom3.png', 10, NULL, '<p>super doom 3</p>\r\n', 1),
(34, 'warhammer 40000', '27', '2017-06-08', 'dawnofwar3.jpg', 10, NULL, 'azeazgazg\r\n', 1);

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
(4, 'Nos services', 'Liste des services que nous proposons', 'Nos services', 'service', 1, '<h1>Pr&eacute;ambule</h1>\r\n\r\n<p>En validant sa commande, le Client d&eacute;clare accepter sans r&eacute;serve les termes de ladite commande ainsi que l&#39;int&eacute;gralit&eacute; des pr&eacute;sentes conditions g&eacute;n&eacute;rales de vente.</p>\r\n\r\n<h1>Article 1 - Objet</h1>\r\n\r\n<p>Le pr&eacute;sent site a pour objet la vente de cl&eacute;s CD t&eacute;l&eacute;chargeables en ligne &agrave; partir du site Instant-Gaming.com, sous forme de carte scann&eacute;e, ou dans de rares cas sous forme de code affich&eacute; au format texte. Les codes sont des cl&eacute;s officielles permettant de d&eacute;bloquer l&#39;int&eacute;gralit&eacute; d&#39;un jeu t&eacute;l&eacute;charg&eacute; sous forme digitale aupr&egrave;s des plate-formes de t&eacute;l&eacute;chargement mises &agrave; disposition par les d&eacute;veloppeurs du jeu. La disponibilit&eacute; des cartes est en fonction des stocks. Un produit qui n&#39;est pas en stock ne pourra &ecirc;tre achet&eacute;, puisque nous d&eacute;sactivons la vente si le code ou la carte n&#39;est pas disponible.</p>\r\n\r\n<h1>Article 2 - Formules - Dur&eacute;e</h1>\r\n\r\n<p>Le client pourra acheter en ligne les diff&eacute;rentes cartes contenant une cl&eacute; CD, selon le tarif en vigueur le jour de la commande. Une fois le code entr&eacute;, il sera consomm&eacute; pendant la p&eacute;riode choisie. L&#39;activation du jeu sera effective d&egrave;s le code valid&eacute; par la plate forme.</p>\r\n\r\n<h1>Article 3 - Tarifs et modes de r&egrave;glement</h1>\r\n\r\n<p>Les tarifs correspondent &agrave; l&#39;acc&egrave;s au jeu complet, pr&eacute;cis&eacute; sur les pages du site. Ils sont consultables &agrave; tout moment sur le site internet instant-gaming.com.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="http://i.kinja-img.com/gawker-media/image/upload/t_original/wwy4z3jyvpawouujaprp.jpg" style="height:398px; width:800px" /></p>\r\n'),
(6, 'Support', 'Support client', 'Support', 'support', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jeux_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- AUTO_INCREMENT pour la table `avis_jeux`
--
ALTER TABLE `avis_jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT pour la table `avis_join`
--
ALTER TABLE `avis_join`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `cat_join`
--
ALTER TABLE `cat_join`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
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
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`levelUser`) REFERENCES `level_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
