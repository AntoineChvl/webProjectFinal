-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 17 nov. 2019 à 14:33
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetweblocal`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mug', '2019-11-15 11:16:14', '2019-11-15 11:16:14'),
(2, 'T-shirt', '2019-11-15 11:18:52', '2019-11-15 11:18:52'),
(3, 'K-pop', '2019-11-15 11:19:03', '2019-11-15 11:19:03'),
(4, 'Vêtement', '2019-11-15 11:19:27', '2019-11-15 11:19:27'),
(5, 'Noel', '2019-11-15 11:19:51', '2019-11-15 11:19:51'),
(6, 'Album', '2019-11-15 11:47:28', '2019-11-15 11:47:28'),
(7, 'Informatique', '2019-11-15 11:49:54', '2019-11-15 11:49:54'),
(8, 'Occasion', '2019-11-15 12:10:55', '2019-11-15 12:10:55'),
(9, 'Alcool', '2019-11-15 12:23:59', '2019-11-15 12:23:59'),
(10, 'Fête', '2019-11-15 12:24:13', '2019-11-15 12:24:13');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_past_events_id` int(11) NOT NULL,
  `is_validated` tinyint(1) NOT NULL DEFAULT '1',
  `restricted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comments_images_past_events0_FK` (`image_past_events_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `image_past_events_id`, `is_validated`, `restricted_at`, `created_at`, `updated_at`) VALUES
(3, 'La cueillette fut bonne !', 23, 1, 1, '2019-11-17 13:05:53', '2019-11-17 11:05:53', '2019-11-17 11:05:53');

-- --------------------------------------------------------

--
-- Structure de la table `contain`
--

DROP TABLE IF EXISTS `contain`;
CREATE TABLE IF NOT EXISTS `contain` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `contain_products0_FK` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `is_validated` tinyint(1) NOT NULL DEFAULT '1',
  `restricted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `events_images0_FK` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `location`, `date`, `price`, `user_id`, `image_id`, `is_validated`, `restricted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cueillette de champignons', 'La cueillette des champignons est souvent associée à l\'automne car certaines espèces poussent alors en abondance. Cependant, il est possible de ramasser des champignons toute l\'année. Dans tous les cas, il faut suivre certaines règles de bonne conduite.\r\n\r\nLe promeneur ne doit pas oublier qu\'il y a un propriétaire, privé ou public. Les champignons n\'appartiennent pas à tout le monde mais au propriétaire de la forêt, qu\'elle soit privée ou publique et qu\'elle soit interdite d\'accès par un panneau ou non (Code civil, art. 547 : « les fruits naturels [...] appartiennent au propriétaire par droit d\'accession »).', 'Forêt de Broceliande', '2019-11-01', 0, 19, 1, 1, '2019-11-17 11:33:03', '2019-11-15 10:53:32', '2019-11-17 10:33:03'),
(2, 'Sortie nautique', 'Ouvert principalement à partir du mois de mai, Jet & Gliss de Piriac et de Saint Brévin se chargent de vous apporter beaucoup de fun et vous faire découvrir 4 activités ludiques telles que le Jet ski, la bouée tractée par un bateau, la location de bateaux motorisés ainsi que le Flyboard. Seul ou en groupe, vous serez toujours acceuillis par une équipe qui sera vous donner le sourire et ce, en toute sécurité. Nous vous proposons également la possibilité d’organiser pour vous des évènements de groupes tels que des séminaires, anniversaires, enterrements de vie de garçon ou fille…', 'Océan', '2019-11-18', 15, 19, 2, 1, '2019-11-17 12:24:00', '2019-11-15 10:57:03', '2019-11-15 10:57:03'),
(3, 'Voyage au ski', 'Si vous lisez ces lignes c’est que vous êtes un skieur ou vous êtes en passe d’en devenir un. Parfait, vous êtes au bon endroit. Glisshop est un vendeur spécialisé dans l’équipement de sports d’hiver depuis 1999, passionné de ski, de snowboard, de ski de randonnée et de tout ce qui touche (ou glisse) à la neige. Notre équipe de skieurs vous guidera à travers votre sélection de matériel ski alpin et répondra à vos questions sur le ski, des plus basiques aux plus techniques. Vous voulez tout connaître de la fabrication d’un ski ? Savoir à quoi sert un noyau bois, un renfort carbone ou un rocker ? Quelle est la différence entre un ski de piste et un ski freeride ? Faites un tour chez nous et le ski n’aura plus de secret pour vous.', '3 Vallées', '2020-01-01', 400, 19, 3, 1, '2019-11-17 12:24:00', '2019-11-15 11:01:05', '2019-11-15 11:01:05'),
(4, 'Welcome party', 'Pour sa 5e Edition, l\'équipe Vie de Campus et Campus CESI Saint-Nazaire vous invitent à sa traditionnelle soirée de rentrée \r\nJeudi 28 Novembre 2019 à 19h30 - Restaurant Elior\r\nAu programme: Cocktail Pizzas  Bières  et Animation surprise', 'CESI', '2019-11-28', 0, 19, 6, 1, '2019-11-17 12:24:00', '2019-11-15 11:06:17', '2019-11-15 11:06:17'),
(5, 'Safari', 'Safari est un navigateur web pour Mac et iOS développé par Apple, dont le moteur de rendu HTML WebKit est fondé sur KHTML.\r\n\r\nIl est téléchargeable gratuitement depuis le 7 janvier 2003, soit depuis Mac OS X v10.2. Le 8 juin 2009 la version 4.0 est sortie pour les plateformes Mac OS X v10.4 (ou ultérieur), Windows XP et Vista (ou ultérieur). Ce navigateur est celui installé par défaut sur tous les ordinateurs Mac depuis Mac OS X v10.3. Pour le fonctionnement de Safari 4.0, il faut que Quartz Extrême soit pris en charge par la carte graphique. La version pour Windows a été abandonnée : la dernière, Safari 5.1.7, est sortie en mai 2012.', 'Internet', '2019-11-17', 1599, 19, 7, 1, '2019-11-17 12:24:00', '2019-11-15 11:10:07', '2019-11-17 00:18:29'),
(6, 'Degustation de rhums', 'Dégustation de rhums blancs agricoles\r\nDans ce cas, on peut passer directement au titre suivant. Mais pour comprendre le rhum et ses subtilités, on préfère souvent déguster au moins deux rhums côte à côte, afin que les arômes et les sensations apparaissent nettement par contraste.', 'Cité du rhum Bordeaux', '2019-11-29', 50, 19, 21, 1, '2019-11-17 12:24:00', '2019-11-15 12:37:01', '2019-11-15 12:37:01'),
(7, 'Chasse aux pokémons', 'Pokémon Go est un jeu vidéo mobile de type freemium fondé sur la localisation massivement multijoueur utilisant la réalité augmentée. Le projet est créé conjointement par The Pokémon Company et Niantic, responsable du jeu vidéo mobile en réalité augmentée Ingress. Le jeu est disponible depuis juillet 2016 sur les plateformes iOS et Android. Tout comme dans la série de jeux vidéo, le but est de capturer des Pokémon.\r\n\r\nAu lancement du jeu, celui-ci devient rapidement un phénomène de société. L\'application, qui n\'est pas encore téléchargeable officiellement dans tous les pays, dépasse localement ou mondialement le nombre de téléchargements de Twitter, Tinder, WhatsApp ou Snapchat, fait monter l\'action de Nintendo de 93,2 % en une semaine à la bourse de Tokyo.', 'St-Nazaire', '2019-11-22', 0, 19, 23, 1, '2019-11-17 11:32:29', '2019-11-15 12:39:29', '2019-11-17 10:32:29'),
(8, 'Atelier cuisine moléculaire !', 'La gastronomie moléculaire est, selon Hervé This, la discipline scientifique qui a pour objectif la recherche des mécanismes des phénomènes qui surviennent lors des transformations culinaires. Parfois, le terme est fautivement utilisé pour désigner ce qui est plus justement nommé \"cuisine moléculaire\".\r\n\r\nC’est une discipline scientifique1 : son objet est de participer au progrès de la connaissance scientifique, avec des applications possibles aux \"arts chimiques\", notamment la cuisine et les activités de formulation. Le terme \"gastronomie moléculaire et physique\" (molecular and physical gastronomy) a été proposé en 1988 par Nicholas Kurti, physicien d’Oxford, et Hervé This, physico-chimiste français, qui travaille aujourd’hui dans l’UMR 1145 de l’INRA à AgroParisTech.', 'Paris', '2019-11-23', 20, 19, 24, 1, '2019-11-17 11:30:05', '2019-11-15 12:45:48', '2019-11-17 10:34:10'),
(9, 'Sortie Kayak', 'Un kayak (danois kajak, inuktitut ᖃᔭᖅ qajaq) est un canot léger qui aujourd’hui utilise une pagaie à deux pales pour le propulser, le diriger et l’équilibrer.\r\n\r\nLe kayak est parfois confondu avec l\'aviron et le canoë, un type d\'embarcation distinct, la pratique sportive étant désignée par le terme général « canoë-kayak ». La construction et la pratique contemporaine distinguent notamment le kayak de rivière (eaux-vives) et le kayak de mer.', 'Océan Atlantique', '2019-11-29', 5, 19, 26, 1, '2019-11-17 12:24:00', '2019-11-15 12:46:58', '2019-11-15 12:46:58'),
(10, 'Star 80 la tournée', 'Le film Stars 80 ayant totalisé 1 809 617 spectateurs en 7 semaines2, une tournée homonyme de 36 dates est organisée en France, Suisse et Belgique par Cheyenne Productions, en accord avec les producteurs du film La Petite Reine, TF1 Films Production. Dans la lignée de la RFM Party 80, mise en scène par Olivier Kaefer, elle débute le 1er février 2013 au Mans et se termine le 20 avril à Dijon, en passant par Palais omnisports de Paris-Bercy le 12 avril et le Forest National de Bruxelles (complet) le lendemain.\r\n\r\nSont présents (en alternance) dans ce spectacle musical présenté par Laurent Petitguillaume : Émile et Images, Jean-Luc Lahaye, Début de soirée, Cookie Dingler, Jean-Pierre Mader, Patrick Hernandez, Jean Schultheis, François Feldman, Joniece Jamison, Lio, Sabrina, Léopold Nord et Vous, Caroline Loeb. Plus Laroche Valmont qui est le seul chanteur n\'ayant pas joué dans le film.', 'Zénith de Nantes', '2019-11-09', 60, 19, 27, 1, '2019-11-17 12:24:00', '2019-11-15 12:48:41', '2019-11-15 12:48:41'),
(11, 'Goûter sponsorisé par Nutella', 'Nutella est une marque déposée de pâte à tartiner composée de sucre (56 %), d\'huile de palme (15 %), de noisettes (13 %), de cacao (7 %), de lait (9 %), de lactosérum et d\'émulsifiants créée le 20 avril 19641 en Italie dans la région du Piémont par la société d\'industrie agroalimentaire italienne Ferrero2.\r\n\r\nCette transformation agroalimentaire domine le marché mondial de la pâte à tartiner3. En France, cette marque représente environ 82 % du marché de la pâte à tartiner en 20134.\r\n\r\nLes pots de Nutella commercialisés au sein du marché français sont fabriqués dans l\'usine Ferrero de Villers-Écalles (Seine-Maritime), qui fabrique également des barres chocolatées de marque Kinder Bueno. Cette usine (employant plus de 380 salariés) est le premier site mondial de fabrication de Nutella. Il y est fabriqué plus de 600 000 pots par jour soit un quart de la fabrication mondiale (chiffres de 2019).', 'Porcé', '2019-11-16', 0, 19, 28, 1, '2019-11-17 12:24:00', '2019-11-15 12:51:07', '2019-11-15 12:51:07'),
(12, 'Compétition de pile ou face', 'Tu tires ou tu pointes ? Choisis ton côté, il y a gros à gagner.\r\nPrépare ton choix si tu veux pas qu\'on te brise les doigts.', 'Ton porte monnaie', '2019-11-29', 1, 19, 29, 1, '2019-11-17 11:32:55', '2019-11-15 12:53:19', '2019-11-17 10:32:55');

-- --------------------------------------------------------

--
-- Structure de la table `have`
--

DROP TABLE IF EXISTS `have`;
CREATE TABLE IF NOT EXISTS `have` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`product_id`),
  KEY `have_products0_FK` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `have`
--

INSERT INTO `have` (`category_id`, `product_id`) VALUES
(1, 1),
(1, 2),
(3, 2),
(2, 3),
(4, 3),
(5, 3),
(2, 4),
(4, 4),
(5, 4),
(3, 5),
(6, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(5, 11),
(7, 11),
(8, 11),
(10, 11),
(9, 12),
(10, 12),
(9, 13),
(10, 13);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `path`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1573818811.jpg', 19, '2019-11-15 11:53:32', '2019-11-15 11:53:32'),
(2, '1573819023.jpg', 19, '2019-11-15 11:57:03', '2019-11-15 11:57:03'),
(3, '1573819264.jpg', 19, '2019-11-15 12:01:05', '2019-11-15 12:01:05'),
(4, '1573819537.png', 19, '2019-11-15 12:05:37', '2019-11-15 12:05:37'),
(5, '1573819551.png', 19, '2019-11-15 12:05:51', '2019-11-15 12:05:51'),
(6, '1573819577.png', 19, '2019-11-15 12:06:17', '2019-11-15 12:06:17'),
(7, '1573819807.png', 19, '2019-11-15 12:10:07', '2019-11-15 12:10:07'),
(8, '1573820506.jpg', 19, '2019-11-15 12:21:46', '2019-11-15 12:21:46'),
(9, '1573820676.png', 19, '2019-11-15 12:24:36', '2019-11-15 12:24:36'),
(10, '1573821004.jpg', 19, '2019-11-15 12:30:05', '2019-11-15 12:30:05'),
(11, '1573821759.jpg', 19, '2019-11-15 12:42:39', '2019-11-15 12:42:39'),
(12, '1573822137.jpg', 19, '2019-11-15 12:48:57', '2019-11-15 12:48:57'),
(13, '1573822444.jpg', 19, '2019-11-15 12:54:04', '2019-11-15 12:54:04'),
(14, '1573822644.jpg', 19, '2019-11-15 12:57:25', '2019-11-15 12:57:25'),
(15, '1573823134.jpg', 19, '2019-11-15 13:05:34', '2019-11-15 13:05:34'),
(16, '1573823275.jpg', 19, '2019-11-15 13:07:55', '2019-11-15 13:07:55'),
(17, '1573823534.jpg', 19, '2019-11-15 13:12:14', '2019-11-15 13:12:14'),
(18, '1573823704.webp', 19, '2019-11-15 13:15:04', '2019-11-15 13:15:04'),
(19, '1573824334.png', 19, '2019-11-15 13:25:34', '2019-11-15 13:25:34'),
(20, '1573824483.jpg', 19, '2019-11-15 13:28:04', '2019-11-15 13:28:04'),
(21, '1573825021.jpg', 19, '2019-11-15 13:37:01', '2019-11-15 13:37:01'),
(22, '1573825169.jpg', 19, '2019-11-15 13:39:29', '2019-11-15 13:39:29'),
(23, '1573825385.jpg', 19, '2019-11-15 13:43:05', '2019-11-15 13:43:05'),
(24, '1573825547.jpg', 19, '2019-11-15 13:45:48', '2019-11-15 13:45:48'),
(25, '1573825612.jpg', 19, '2019-11-15 13:46:52', '2019-11-15 13:46:52'),
(26, '1573825618.jpg', 19, '2019-11-15 13:46:58', '2019-11-15 13:46:58'),
(27, '1573825721.jpg', 19, '2019-11-15 13:48:41', '2019-11-15 13:48:41'),
(28, '1573825867.jpg', 19, '2019-11-15 13:51:07', '2019-11-15 13:51:07'),
(29, '1573825999.jpg', 19, '2019-11-15 13:53:19', '2019-11-15 13:53:19'),
(30, '1573827113.jpg', 19, '2019-11-15 14:11:53', '2019-11-15 14:11:53'),
(31, '1573827136.jpg', 19, '2019-11-15 14:12:16', '2019-11-15 14:12:16'),
(32, '1573828546.jpg', 19, '2019-11-15 14:35:46', '2019-11-15 14:35:46');

-- --------------------------------------------------------

--
-- Structure de la table `images_past_events`
--

DROP TABLE IF EXISTS `images_past_events`;
CREATE TABLE IF NOT EXISTS `images_past_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `is_validated` tinyint(1) NOT NULL DEFAULT '1',
  `restricted_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `images_past_events_events_FK` (`event_id`),
  KEY `images_past_events_images0_FK` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `images_past_events`
--

INSERT INTO `images_past_events` (`id`, `event_id`, `image_id`, `is_validated`, `restricted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 32, 1, '2019-11-16 18:22:18', '2019-11-15 14:35:46', '2019-11-16 17:22:18');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `images_past_events_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`images_past_events_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`images_past_events_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 19, '2019-11-15 13:37:20', '2019-11-15 13:37:20'),
(1, 23, '2019-11-17 11:05:58', '2019-11-17 11:05:58');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participate`
--

DROP TABLE IF EXISTS `participate`;
CREATE TABLE IF NOT EXISTS `participate` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participate`
--

INSERT INTO `participate` (`event_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 23, '2019-11-16 17:06:36', '2019-11-16 17:06:36');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `is_validated` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `products_images0_FK` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `user_id`, `image_id`, `is_validated`, `created_at`, `updated_at`) VALUES
(1, 'Mug Esrum', 'Le Mug Esrum en grès de la designer d\'intérieur scandinave Broste Copenhagen associe des teintes monochromes contemporaines à des textures sensorielles contrastantes. \r\n\r\nChaque pièce est fabriquée à la main de manière artisanale et donc unique en son genre. Les finitions varient légèrement en raison du processus de cuisson qui fait couler et transformer les couleurs.', 9, 19, 8, 1, '2019-11-15 11:21:46', '2019-11-15 11:21:46'),
(2, 'Mug TWICE', 'Craquez pour le mug Twice Casual Drawing, une création de Eleana\r\nComposé de 100% céramique, sa forme cylindrique est pratique avec une large poignée, et vous permet de vous servir facilement sans perdre de temps. Une capacité de volume de 32,5cl afin de se servir une bonne tasse de café.\r\nLe motif: Cute drawing of the Korean-girl group Twice. Manga style.\r\nLe marquage sur mug est réalisé par sublimation en France, afin de garantir une résistance du motif et un passage au lave-vaisselle sans problème.', 10, 19, 9, 1, '2019-11-15 11:24:36', '2019-11-15 11:24:36'),
(3, 'Pere noel cool', 'Parfait pour le temps des Fêtes, ce t-shirt de style superposé est équipé de manches isothermes et d’un imprimé de Père Noël.', 20, 19, 10, 1, '2019-11-15 11:30:05', '2019-11-15 11:30:05'),
(4, 'J\'peux pas j\'attends le père noel', 'Un classique sans compromis : vous allez adorer ce T-shirt simple et classique. Un basique à porter en toutes occasions.', 15, 19, 11, 1, '2019-11-15 11:42:39', '2019-11-15 11:42:39'),
(5, '[TWICE] FANCY YOU', '[FANCY YOU] Envie d\'ailleurs? Les TWICE sont là pour amener du soleil dans nos vies avec la sortie évènement de leur 7ème mini album FANCY YOU. À cette occasion, les superstars de la JYP Entertainment collaborent de nouveau avec le producteur Black Eyed Pilseung (CHEER UP, LIKEY, TT) pour le titre phare FANCY.', 20, 19, 12, 1, '2019-11-15 11:48:57', '2019-11-15 11:48:57'),
(6, 'PC G@M3RZ', 'Pour l\'armée américaine, l\'ULTRABOOK est un puissant avion furtif connu et reconnu pour sa silhouette unique et ses performances colossales en milieu hostile. Mais les États-Unis n\'ont plus le monopole de l\'ULTRABOOK ! nous en avons un également, équipé en Core i7 9700K et GeForce RTX 2070 SUPER. Le design est un peu plus carré certes mais les performances sont quasi les mêmes !', 168, 19, 13, 1, '2019-11-15 11:54:04', '2019-11-15 11:54:04'),
(7, 'CASQUE G@M3RZ', 'La conception révolutionnaire des transducteurs à chambre double du HyperX Cloud Alpha apporte à votre écoute une meilleure distinction entre medium / aigus / graves, une plus grande clarté du son, tout en réduisant la distorsion. Les chambres doubles séparent les basses pour générer un son plus clair et plus homogène. Le Cloud Alpha réunit les avantages de la mousse à mémoire de forme rouge, un arceau élargi, un cuir plus doux et plus souple, un cadre en aluminium, un câble tressé amovible, et un microphone à suppression de bruit. Il est compatible multiplateforme, avec des commandes en ligne sur toutes les plateformes équipées d\'un port 3,5 mm, telles que PC, PS4, Xbox One. Appuyez fermement sur le câble détachable dans le pinna pour vous assurer qu\'il est bien serré. La fiche est bloquée lorsqu\'aucune zone grise de la fiche n\'est visible. En cas de doute, débranchez le câble de la voie et reconnectez-le fermement.', 1, 19, 14, 1, '2019-11-15 11:57:25', '2019-11-15 11:57:25'),
(8, 'DEMI-CLAVIER G@M3RZ', 'Des switchs mécaniques réglables uniques en leur genre offrant une sensibilité personnalisable par touche\r\n    Une réponse 8x plus rapide, une activation 5x plus rapide et une durabilité 2x plus grande\r\n    L’affichage intelligent OLED fournit des informations provenant directement des jeux et des applications\r\n    Une structure en aluminium de qualité aéronautique de série 5000\r\n    Un repose-main magnétique détachable à la surface douce', 5, 19, 15, 1, '2019-11-15 12:05:34', '2019-11-15 12:05:34'),
(9, 'CASQUE VR G@M3RZ', 'Des images cristallines et une suppression active du bruit créent une expérience cinématographique vraiment immersive.Température de fonctionnement: 0 à 45 ° C\r\nLes écrans AMOLED avancés créent un écran géant virtuel incurvé et offrent une résolution Full HD de plus de 3000PPI.\r\nCompatible avec les services de streaming en ligne et les consoles de jeux via Wi-Fi et HDMI.\r\nLe design pliable breveté rend la Moon vraiment facile à transporter. L\'optique avancée permet à la plupart des porteurs de lunettes d’utiliser la Moon sans leurs lunettes.\r\nUn stockage interne de 32 Go permet aux films, vidéos et images d\'être enregistrés directement sur la Moon Box.', 999, 19, 16, 1, '2019-11-15 12:07:55', '2019-11-15 12:07:55'),
(11, 'Guirlande fait maison', 'Vous cherchez une décoration discrète et originale pour décorer votre intérieur ? Une salle de réception ou les tables de votre mariage ? N’attendez plus et découvrez la guirlande argent de 80 micro LED blanc chaud !\r\n\r\nDisposée sur un meuble ou dans un bocal, nous vous garantissons un incroyable effet en toute simplicité.\r\n\r\nLa guirlande lumineuse fil argent et ses 80 micro LED est très facile à mettre en place: il vous suffit d’insérer 3 piles de type AA, de positionner le bouton sur ON pour enfin, admirer votre splendide décoration lumineuse. Son installation sera facilitée par sa longueur de 8 mètres.\r\n\r\nPour une atmosphère encore plus magique, craquez pour les autres articles lumineux de la gamme Skylantern comme les sacs lumineux ou les boules à LED !', 30, 19, 18, 1, '2019-11-15 12:15:05', '2019-11-15 12:15:05'),
(12, 'Pack 3 fûts 6L Leffe Blonde', 'Profitez de cette offre exceptionnelle de 3 fûts Leffe blonde !\r\n\r\nLa Leffe blonde est une bière belge d\'abbaye au caractère reconnu et à la très solide réputation. Brassée par l\'Abbaye de Leffe, elle a su convaincre et s\'imposer comme une bière de référence au fil des siècles et se vend aujourd\'hui aux quatre coins du monde.\r\n\r\nBlonde et cuivrée avec une épaisse mousse blanche, elle dégage des arômes de céréales, de malt, de maïs, de banane et de clou de girofle pour des saveurs maltées et caramélisées avec des touches de fruits, d\'épices et de levure.', 80, 19, 19, 1, '2019-11-15 12:25:34', '2019-11-15 12:25:34'),
(13, 'STRATHISLA 65 ans 1953 G&M 43,5%', 'Embouteillé à 43,5% dans la gamme Private Collection, ce Strathisla 65 ans 1953 est une rareté compte parmi les plus vieux Strathisla jamais embouteillés. Vieillie en fût de sherry butt pendant plus de six décennies, cette version demeure fraîche et fruitée malgré les notes d\'épices et de bois précieux apportées par la maturation. Impressionnant d\'équilibre, le nez est marqué par des notes d\'eucalyptus, de noix et d\'agrumes. La bouche est complexe, délicatement boisée et épicée (muscade, encens) et fruitée (figues, bananes mûres). La finale est agréablement tannique, avec une pointe de fruits confits (pâte de coings) et de tabac blond. Grandiose !\r\n\r\nProfil : Équilibré, épicé. Eucalyptus, agrumes, rancio, figues, pâte de coings, tabac blond.', 13990, 19, 20, 1, '2019-11-15 12:28:04', '2019-11-15 12:28:04');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_images_past_events0_FK` FOREIGN KEY (`image_past_events_id`) REFERENCES `images_past_events` (`id`);

--
-- Contraintes pour la table `contain`
--
ALTER TABLE `contain`
  ADD CONSTRAINT `contain_orders_FK` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `contain_products0_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_images0_FK` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Contraintes pour la table `have`
--
ALTER TABLE `have`
  ADD CONSTRAINT `have_categories_FK` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `have_products0_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `images_past_events`
--
ALTER TABLE `images_past_events`
  ADD CONSTRAINT `images_past_events_events_FK` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `images_past_events_images0_FK` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `like_images_past_events_FK` FOREIGN KEY (`images_past_events_id`) REFERENCES `images_past_events` (`id`);

--
-- Contraintes pour la table `participate`
--
ALTER TABLE `participate`
  ADD CONSTRAINT `participate_events_FK` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_images0_FK` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
