-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 15 déc. 2024 à 19:03
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'Nathan william'),
(2, 'Joe Smith'),
(3, 'Paul Taillor'),
(4, 'Carry Smith'),
(5, 'Adam Sale'),
(6, 'Drew Larson'),
(7, 'William Shakespeare'),
(8, 'Jane Austen'),
(9, 'Leo Tolstoy'),
(10, 'Gabriel Garcia Marquez'),
(11, 'George Orwell'),
(12, 'Mark Twain'),
(13, 'J.K. Rowling'),
(14, 'Ernest Hemingway'),
(15, 'Fyodor Dostoevsky'),
(16, 'Toni Morrison'),
(17, 'J.L. Rowling'),
(18, 'Antoine de Saint-Exupéry'),
(19, 'Nathan williams'),
(20, 'marine'),
(21, 'J.R.R. Tolkien'),
(22, 'Wade Mercer'),
(23, 'Barrett Gould'),
(24, 'Leandra Mckenzie'),
(25, 'TaShya Kirby'),
(26, 'Lisandra Vaughn'),
(27, 'rgpd'),
(28, 'Barrett2'),
(29, 'marine2'),
(30, 'marine3'),
(31, 'marine4'),
(32, 'marine5'),
(33, 'marine6'),
(34, 'Gannon Maynard'),
(35, 'Philippe Collin'),
(36, 'Gaël Faye'),
(37, 'Cécile Coulon'),
(38, 'Paulo Coelho'),
(39, 'Roald Dahl'),
(40, 'Victor Hugo'),
(41, 'Emile Zola'),
(42, 'Zola'),
(43, 'Albert Camus'),
(44, 'Ifeoma Warren'),
(45, 'Arden Blankenship'),
(46, 'Laetitia Colombani'),
(47, 'Irène Cohen-Janca'),
(48, 'Marcel Proust');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `statut` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `title`, `author_id`, `description`, `img`, `statut`) VALUES
(1, 'Hamlet', 2, '**\"Hamlet\"**, a tragedy by William Shakespeare, is one of the most celebrated works in the history of literature, exploring themes of revenge, madness, and moral corruption. The play follows Prince Hamlet of Denmark, who is haunted by the sudden death of his father, King Hamlet, and the swift remarriage of his mother, Queen Gertrude, to his uncle Claudius', 'img\\hamlet.jpeg', 'Disponible'),
(2, 'Pride and Prejudice', 8, 'Ce classique de Jane Austen suit Elizabeth Bennet et sa famille dans l\'Angleterre du XIXe siècle. Le roman explore les thèmes de l\'amour, de l\'orgueil et des préjugés sociaux à travers des dialogues vifs et une critique subtile de la société de l\'époque.', 'img/prejugé.jpeg', 'Disponible'),
(3, 'Jacaranda', 36, 'Gaël Faye nous entraîne au Rwanda post-génocide, où Milan cherche à comprendre les secrets entourant l\'arbre fétiche de son amie Stella. Un récit poignant sur la mémoire et la résilience. \r\n', 'img/faye.jpeg', 'Disponible'),
(4, 'One Hundred Years of Solitude', 10, '**\"One Hundred Years of Solitude\"**, written by Gabriel García Márquez, is a masterpiece of magical realism that chronicles the multi-generational saga of the Buendía family in the fictional town of Macondo. Spanning over a century, the novel weaves together the fates of several generations of the Buendía family, exploring themes of solitude, love, power, and the cyclical nature of history. ', 'img\\OneHundredYearsOfSolitude.jpeg', 'Disponible'),
(5, '1984', 11, '**\"1984,\"** a dystopian novel by George Orwell, presents a chilling vision of a totalitarian regime that wields absolute power over its citizens through surveillance, propaganda, and oppressive control.', 'img\\1984.jpeg', 'Disponible'),
(8, 'The Old Man and the sea', 14, 'The Old Man and the Sea\" by Ernest Hemingway is a profound tale of human endurance, solitude, and the unyielding struggle between man and nature. Set in the waters off the coast of Cuba, the story follows Santiago, an aging fisherman, who embarks on what becomes the defining challenge of his life: a battle with a giant marlin.', 'img/The_Old_Man_and_theSea.png', 'Indisponible'),
(9, 'Crime and Punishment', 15, '**\"Crime and Punishment,\"** a psychological novel by Fyodor Dostoevsky, delves deep into the troubled psyche of Raskolnikov, a poor former student living in St. Petersburg, Russia.', 'img\\CrimeAndPunishment.jpeg', 'Disponible'),
(10, 'Beloved', 16, '**\"Beloved\"** by Toni Morrison is a poignant and haunting novel that delves into the psychological scars of slavery through the story of Sethe, a runaway slave living in Cincinnati, Ohio, in the years following the Civil War. ', 'img\\Beloved.jpeg', 'Indisponible'),
(12, 'Voluptatem ', 24, 'Sit id consequatur ', 'img/livre_sans_img.jpg', 'indisponible'),
(17, 'Le Barman du Ritz', 35, 'Philippe Collin raconte l\'histoire d\'un barman du célèbre hôtel parisien pendant l\'Occupation, offrant une perspective unique sur cette période troublée. Un premier roman salué pour sa profondeur historique. \r\n', 'img/Philippe_Collin.jpeg', 'Disponible'),
(18, 'La Langue des choses cachées', 37, 'Pour enrichir vos lectures cette année, je vous recommande \"La Langue des choses cachées\" de Cécile Coulon. Publié en janvier 2024, ce roman explore les profondeurs de l\'âme humaine à travers une prose poétique et introspective. \r\nTOPLIVRE\r\n\r\nCécile Coulon, reconnue pour son écriture sensible et percutante, nous offre ici une œuvre qui interroge les non-dits et les secrets enfouis, tout en dépeignant des personnages attachants et complexes.\r\n\r\nCe livre a été salué par la critique pour sa profondeur et sa capacité à captiver le lecteur dès les premières pages. Il est disponible dans les librairies françaises et en ligne.\r\n\r\nPour une expérience de lecture enrichissante, \"La Langue des choses cachées\" est un choix incontournable cette année.', 'img/Cécile_Coulon.jpeg', 'Disponible'),
(19, 'L\'Alchimiste', 38, '\"L\'Alchimiste\" de Paulo Coelho Un conte philosophique facile à lire, sur la quête de ses rêves et la réalisation personnelle.', 'img/paolo.jpeg', 'Disponible'),
(20, 'L\'Alchimiste', 38, '\"L\'Alchimiste\" de Paulo Coelho Un conte philosophique facile à lire, sur la quête de ses rêves et la réalisation personnelle.', 'img/paolo.jpeg', 'Disponible'),
(21, 'Matilda', 39, '\"Matilda\" de Roald Dahl Une histoire pour petits et grands, remplie de magie et d’humour, mettant en scène une jeune fille aux capacités extraordinaires.\r\n\r\n', 'img/Matilda.jpeg', 'Disponible'),
(22, 'Les Misérables', 40, 'Un chef-d\'œuvre de Victor Hugo qui dépeint la vie de plusieurs personnages dans la France du XIXᵉ siècle, explorant des thèmes de justice, de rédemption et d\'amour.', 'img/les_misérable.jpeg', 'Disponible'),
(23, 'Géminal', 42, 'Émile Zola nous plonge dans le monde des mineurs du nord de la France, mettant en lumière leurs luttes et aspirations durant la révolution industrielle.', 'img/géminal.jpeg', 'Disponible'),
(24, 'L\'Étranger', 43, 'Dans ce roman d\'Albert Camus, Meursault, un homme détaché et indifférent, commet un meurtre absurde. Le livre explore l\'absurdité de la condition humaine et les thèmes de l\'existentialisme.', 'img/l\'etranger.jpeg', 'Disponible'),
(25, 'L\'Etranger', 43, 'Dans ce roman d\'Albert Camus, Meursault, un homme détaché et indifférent, commet un meurtre absurde. Le livre explore l\'absurdité de la condition humaine et les thèmes de l\'existentialisme.', 'img/l\'etranger.jpeg', 'Disponible'),
(26, '1984', 11, 'Ce roman dystopique de George Orwell dépeint une société totalitaire où la surveillance et le contrôle de la pensée sont omniprésents. À travers le parcours de Winston Smith, le livre explore les thèmes de la liberté, de la vérité et de la résistance face à l\'oppression.', 'img/1984-bis.jpeg', 'Disponible'),
(30, 'La tresse', 46, 'Inde. Smita est une Intouchable. Elle rêve de voir sa fille échapper à sa condition misérable et entrer à l’école.\r\nSicile. Giulia travaille dans l’atelier de son père. Lorsqu’il est victime d’un accident, elle découvre que l’entreprise familiale est ruinée.\r\nCanada. Sarah, avocate réputée, va être promue à la tête de son cabinet quand elle apprend qu’elle est gravement malade.\r\nLiées sans le savoir par ce qu’elles ont de plus intime et de plus singulier, Smita, Giulia et Sarah refusent le sort qui leur est réservé et décident de se battre. Vibrantes d’humanité, leurs histoires tissent une tresse d’espoir et de solidarité.\r\nTrois femmes, trois vies, trois continents. Une même soif de liberté.', 'img/tresses.jpg', 'Disponible'),
(31, 'Ruby tête haute', 47, 'Dans la Louisiane des années 60, Blancs et Noirs ne se mélangent pas. Ruby ne peut pas étudier à l’école près de chez elle, réservée aux Blancs : elle doit se rendre dans une autre école, bien plus loin de sa maison. Mais l\'année de ses 6 ans, tout va changer.\r\n', 'img/img2.jpg', 'Indisponible'),
(32, ' à la recherche du temps perdu ', 48, 'Que celui qui pourrait écrire un tel livre serait heureux, pensais-je, quel labeur devant lui ! Pour en donner une idée, c\'est aux arts les plus élevés et les plus différents qu\'il faudrait emprunter des comparaisons ; car cet écrivain, qui d\'ailleurs pour chaque caractère en ferait apparaître les faces opposées, pour montrer son volume, devrait préparer son livre minutieusement, avec de perpétuels regroupements de forces, comme une offensive, le supporter comme une fatigue, l\'accepter comme une règle, le construire comme une église, le suivre comme un régime, le vaincre comme un obstacle, le conquérir comme une amitié, le suralimenter comme un enfant, le créer comme un monde sans laisser de côté ces mystères qui n\'ont probablement leur explication que dans d\'autres mondes et dont le pressentiment est ce qui nous émeut le plus dans la vie et dans l\'art. Et dans ces grands livres-là, il y a des parties qui n\'ont eu le temps que d\'être esquissées et qui ne seront sans doute jamais finies, à cause de l\'ampleur même du plan de l\'architecte. Combien de grandes cathédrales restent inachevées ! » Marcel Proust, Le Temps retrouvé.', 'img/proust_1.jpg', 'Disponible');

-- --------------------------------------------------------

--
-- Structure de la table `book_library_relation`
--

CREATE TABLE `book_library_relation` (
  `id` int(11) NOT NULL,
  `library_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `book_library_relation`
--

INSERT INTO `book_library_relation` (`id`, `library_id`, `book_id`) VALUES
(2, 3, 3),
(4, 2, 5),
(11, 5, 4),
(12, 4, 9),
(14, 4, 10),
(15, 2, 1),
(16, 1, 8),
(17, 1, 2),
(23, 1, 17),
(24, 3, 18),
(25, 7, 20),
(26, 9, 21),
(27, 10, 22),
(28, 10, 23),
(29, 11, 25),
(30, 11, 26),
(34, 12, 30),
(35, 13, 31),
(36, 13, 32);

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `library`
--

INSERT INTO `library` (`id`, `user_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(8, 7),
(7, 15),
(9, 22),
(10, 23),
(11, 24),
(12, 25),
(13, 26),
(14, 27);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` int(1) DEFAULT 0,
  `conversation_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `content`, `sent_at`, `is_read`, `conversation_id`) VALUES
(1, 1, 2, 'Bonjour, comment vas-tu ?', '2024-11-21 23:37:14', 0, '1_2'),
(2, 2, 1, 'Bien et toi?', '2024-11-21 23:37:37', 1, '1_2'),
(3, 1, 14, 'Hello !!', '2024-11-22 02:49:46', 0, '1_13'),
(4, 20, 1, 'Coucou', '2024-11-22 02:49:46', 0, '1_20'),
(5, 4, 15, 'Bonjour, lequel ?', '2024-11-24 18:59:19', 0, NULL),
(6, 15, 4, 'Bonjour je suis intéresser par un de vos livres', '2024-11-24 18:59:19', 0, NULL),
(7, 15, 4, 'Crime and Punishment', '2024-11-24 19:06:09', 0, NULL),
(24, 22, 1, '', '2024-11-29 10:59:17', 1, NULL),
(30, 1, 2, 'très bien', '2024-11-29 12:23:18', 0, NULL),
(31, 1, 2, 'merci', '2024-11-29 12:23:53', 0, NULL),
(32, 1, 20, 'hello', '2024-11-29 12:24:53', 1, NULL),
(33, 1, 20, 'comment tu vas', '2024-11-29 12:26:41', 1, NULL),
(34, 1, 22, 'hello', '2024-11-29 12:27:15', 1, NULL),
(35, 1, 22, 'comment tu vas ?', '2024-11-29 12:27:51', 1, NULL),
(36, 22, 1, 'bien et toi', '2024-11-29 12:28:18', 1, NULL),
(37, 1, 20, 'je suis intéressée par un livre', '2024-11-29 12:28:44', 1, NULL),
(38, 22, 1, 'je voudrais emprunter un livre', '2024-11-29 12:29:09', 1, NULL),
(59, 22, 22, '', '2024-11-29 14:33:21', 0, NULL),
(63, 22, 5, '', '2024-11-30 10:05:44', 0, NULL),
(64, 22, 5, 'oki', '2024-11-30 10:06:08', 0, NULL),
(65, 22, 15, '', '2024-11-30 10:06:55', 0, NULL),
(66, 4, 2, '', '2024-11-30 10:28:02', 0, NULL),
(67, 4, 1, '', '2024-11-30 10:28:13', 1, NULL),
(68, 21, 1, '', '2024-12-01 19:59:56', 1, NULL),
(69, 21, 1, 'hello', '2024-12-01 20:00:00', 1, NULL),
(70, 1, 21, 'bonjour Paul', '2024-12-01 20:59:12', 1, NULL),
(71, 23, 22, '', '2024-12-01 21:04:50', 1, NULL),
(72, 23, 22, 'hello', '2024-12-01 21:04:56', 1, NULL),
(73, 22, 23, 'ça va', '2024-12-01 21:05:52', 1, NULL),
(74, 22, 23, 'oui', '2024-12-01 21:06:35', 1, NULL),
(75, 1, 23, '', '2024-12-05 13:14:10', 0, NULL),
(76, 1, 23, 'hello', '2024-12-05 13:14:21', 0, NULL),
(77, 22, 24, '', '2024-12-05 19:27:18', 1, NULL),
(78, 22, 24, 'hii', '2024-12-05 19:27:25', 1, NULL),
(79, 24, 23, '', '2024-12-05 19:28:03', 0, NULL),
(80, 24, 24, '', '2024-12-06 13:37:25', 1, NULL),
(81, 24, 24, 'hi', '2024-12-06 13:39:45', 1, NULL),
(82, 24, 22, 'hello', '2024-12-06 13:39:58', 1, NULL),
(83, 25, 24, '', '2024-12-06 13:56:51', 1, NULL),
(84, 25, 24, 'hello', '2024-12-06 14:08:35', 1, NULL),
(85, 25, 24, '<script>window.location = \"https://edounze.com\"</script>', '2024-12-06 14:09:29', 1, NULL),
(86, 25, 23, '', '2024-12-13 09:09:51', 0, NULL),
(87, 25, 5, '', '2024-12-13 09:47:13', 0, NULL),
(88, 25, 5, 'hello', '2024-12-13 09:47:19', 0, NULL),
(89, 25, 4, '', '2024-12-13 10:05:11', 0, NULL),
(90, 1, 24, '', '2024-12-13 11:32:29', 0, NULL),
(91, 25, 1, '', '2024-12-13 12:56:10', 0, NULL),
(92, 25, 1, 'hello!', '2024-12-13 12:56:19', 0, NULL),
(93, 24, 15, '', '2024-12-13 13:22:28', 0, NULL),
(94, 26, 25, '', '2024-12-13 13:26:02', 0, NULL),
(95, 26, 24, '', '2024-12-13 13:57:16', 0, NULL),
(96, 26, 26, '', '2024-12-14 19:34:05', 1, NULL),
(97, 22, 26, '', '2024-12-14 20:03:22', 0, NULL),
(98, 22, 26, 'hello', '2024-12-14 20:03:29', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `user_photo` text NOT NULL DEFAULT 'img/photoprofil.jpeg',
  `creation_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nickname`, `user_photo`, `creation_date`) VALUES
(1, 'marnie@azerty.com', '$2y$10$Iu42FNNoC0b7SPgWSk8ViOaoEHhSiH/ohYmTfQJ55/W6ETIJVp0Be', 'marineZZ', 'img/ppLion.png', '2019-11-12'),
(2, 'jdoe@xyz.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'JohnDoe', 'img/photoprofil.jpeg', '2024-11-15'),
(3, 'asmith@xyz.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'AliceSmith', 'img/photoprofil.jpeg', '2021-10-13'),
(4, 'bwayne@xyz.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'BruceWayne', 'img/profil-batman.png', '2024-11-15'),
(5, 'ckent@xyz.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'ClarkKent', 'img/photoprofil.jpeg', '2024-11-15'),
(6, 'pparker@xyz.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'PeterParker', 'img/photoprofil.jpeg', '2024-11-15'),
(7, 'hpotter@xyz.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'HarryPotter', 'img/photoprofil.jpeg', '2023-11-01'),
(8, 'tswift@xyz.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'TaylorSwift', 'img/photoprofil.jpeg', '2024-11-15'),
(9, 'eclarke@xyz.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'EmiliaClarke', 'img/photoprofil.jpeg', '2024-05-06'),
(10, 'jbond@xyz.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'JamesBond', 'img/photoprofil.jpeg', '2024-11-15'),
(11, 'lbaggins@xyz.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'FrodoBaggins', 'img/photoprofil.jpeg', '2024-11-15'),
(14, 'janette@xyz.com', '$2y$10$WtggSPOVC1YZMAm5DWTNneMsEtneg6JsmmyXmkHwPpf15YRCgCUba', 'Janette JJ', 'img/photoprofil.jpeg', '2024-11-15'),
(15, 'emicater@xyz.com', '$2y$10$7bQsgcHMvBBfjdNHi6n1NeD6EYI7zznfyFLde7ywEPxZqVtobT6XK', 'Emi', 'img/profil-emi.png', '2024-10-10'),
(18, 'corryb@xyz.com', '$2y$10$.QM0bvduKmgJnV5ZbU0KXeGuigemG43YdDjbkwQIfGHvog/rZL1ai', 'corryB', 'img/photoprofil.jpeg', '2022-09-05'),
(19, 'marnie2@xyz.com', '$2y$10$x3GfdG08LSJf2glOt.C3wutZxdnEZr0R6JMZlQtlneMNTeFJDCngS', 'marine kl', 'img/kimono_noir.jpeg', '2024-11-15'),
(20, 'pokkie@xyz.com', '$2y$10$Ja8EXKGunIPC7cqyakGDuefCeZfywEMhDnhbXK.uPXtZyO5a8f.zi', 'pokkie', 'img/famille-papier.jpg', '2024-11-15'),
(21, 'Pau2l@gmail.com', '$2y$10$rtia/VXBEdOuwyIlMCd0wuAhugdpvvBmdEnMy0fPupVmhEL169NCG', 'Paul', 'img/loader.png', '2024-11-15'),
(22, 'ozoua@gmail.com', '$2y$10$VmB.ME4J4hsw2D6KPYZ9PO2TTkFvJoZvAt79Oz5b4XWlNUADlP1Z6', 'Ozoua', 'img/ozoua.jpeg', '2024-11-24'),
(23, 'dilut@mailinator.com', '$2y$10$65TA1QkXq9J9WH/BDUbmyuUiZ1PgRBd4PHIZmyoVPfhzAJtP.eGKG', 'Kriss Hooper', 'img/profil-3.png', '2024-12-01'),
(24, 'peseky@mailinator.com', '$2y$10$5Kqughw.GvUXxhtXXJheEuA1g/CHw/oHB9wovK1BQLzT9QeQjgOl2', 'Barbara Peseky', 'img/sun_set.jpg', '2024-12-05'),
(25, 'pudorysu@mailinator.com', '$2y$10$Sce/Nh6Si/khuei6GCN5B.aijIcDjXLb1KQBKoETrvzflr4A1MjuS', 'Stephen Simpson', '', '2024-12-06'),
(26, 'jelav@mailinator.com', '$2y$10$Sce/Nh6Si/khuei6GCN5B.aijIcDjXLb1KQBKoETrvzflr4A1MjuS', 'jelav', '', '2024-12-13'),
(27, 'cufe@mailinator.com', '$2y$10$PZMiAW7JNLtxGpHu6Pu55e41YoR5rP2EGXZIABb7tjoFVYQHTWena', 'Gwendolyn Vaughn', '', '2024-12-13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_author` (`author_id`) USING BTREE;

--
-- Index pour la table `book_library_relation`
--
ALTER TABLE `book_library_relation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book` (`book_id`) USING BTREE,
  ADD KEY `library` (`library_id`) USING BTREE;

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sender` (`sender_id`) USING BTREE,
  ADD UNIQUE KEY `receiver` (`receiver_id`) USING BTREE;

--
-- Index pour la table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver_id` (`receiver_id`) USING BTREE,
  ADD KEY `sender_id` (`sender_id`) USING BTREE;

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `book_library_relation`
--
ALTER TABLE `book_library_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);

--
-- Contraintes pour la table `book_library_relation`
--
ALTER TABLE `book_library_relation`
  ADD CONSTRAINT `book_library_relation_ibfk_1` FOREIGN KEY (`library_id`) REFERENCES `library` (`id`),
  ADD CONSTRAINT `book_library_relation_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
