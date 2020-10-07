-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 07 oct. 2020 à 14:49
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stageqcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201001131338', '2020-10-01 13:13:46', 58),
('DoctrineMigrations\\Version20201001145402', '2020-10-01 14:54:14', 100),
('DoctrineMigrations\\Version20201002072223', '2020-10-02 07:22:31', 189),
('DoctrineMigrations\\Version20201002075408', '2020-10-02 07:54:15', 1125),
('DoctrineMigrations\\Version20201002095331', '2020-10-02 09:53:39', 86),
('DoctrineMigrations\\Version20201002095647', '2020-10-02 09:56:55', 124),
('DoctrineMigrations\\Version20201002100828', '2020-10-02 10:08:34', 106);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`) VALUES
(1, 'Mathématique'),
(2, 'Informatique'),
(3, 'Français'),
(4, 'Comptabilité');

-- --------------------------------------------------------

--
-- Structure de la table `matiere_user`
--

CREATE TABLE `matiere_user` (
  `matiere_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere_user`
--

INSERT INTO `matiere_user` (`matiere_id`, `user_id`) VALUES
(2, 5),
(4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `note_totale` int(11) DEFAULT NULL,
  `reponse_eleve_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `nbre_choix` int(11) DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` longtext COLLATE utf8mb4_unicode_ci,
  `bareme_question` int(11) DEFAULT NULL,
  `questionnaire_id` int(11) DEFAULT NULL,
  `type_reponse_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `nbre_choix`, `numero`, `libelle`, `bareme_question`, `questionnaire_id`, `type_reponse_id`) VALUES
(1, 41, 'Illo minima maxime sequi est fugit maiores commodo eum deleniti fugit et aut obcaecati', 'Sint distinctio Fac', 88, 1, 2),
(2, 41, 'Illo minima maxime sequi est fugit maiores commodo eum deleniti fugit et aut obcaecati', 'Sint distinctio Fac', 88, 2, 2),
(3, 41, 'Illo minima maxime sequi est fugit maiores commodo eum deleniti fugit et aut obcaecati', 'Sint distinctio Fac', 88, 3, 2),
(4, 41, 'Illo minima maxime sequi est fugit maiores commodo eum deleniti fugit et aut obcaecati', 'Sint distinctio Fac', 88, 4, 2),
(5, 41, 'Illo minima maxime sequi est fugit maiores commodo eum deleniti fugit et aut obcaecati', 'Sint distinctio Fac', 88, 5, 2),
(6, 41, 'Illo minima maxime sequi est fugit maiores commodo eum deleniti fugit et aut obcaecati', 'Sint distinctio Fac', 88, 6, 2),
(7, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 7, 1),
(8, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 8, 1),
(9, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 9, 1),
(10, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 10, 2),
(11, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 11, 2),
(12, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 12, 2),
(13, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 13, 2),
(14, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 14, 2),
(15, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 15, 2),
(16, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 16, 2),
(17, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 17, 2),
(18, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 18, 2),
(19, 24, 'Consequatur lorem laborum quaerat nihil velit sint quos aut delectus sed et atque', 'Minima placeat nemo', 55, 19, 2),
(20, 13, 'Et quia aspernatur et dolore quasi enim', 'Quis in eligendi inv', 79, 20, 1),
(21, 13, 'Et quia aspernatur et dolore quasi enim', 'Quis in eligendi inv', 79, 21, 1),
(22, 13, 'Et quia aspernatur et dolore quasi enim', 'Quis in eligendi inv', 79, 22, 1),
(23, 13, 'Et quia aspernatur et dolore quasi enim', 'Quis in eligendi inv', 79, 23, 1),
(24, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 24, 1),
(25, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 25, 1),
(26, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 26, 1),
(27, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 27, 1),
(28, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 28, 1),
(29, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 29, 1),
(30, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 30, 1),
(31, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 31, 1),
(32, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 32, 1),
(33, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 33, 1),
(34, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 34, 1),
(35, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 35, 1),
(36, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 36, 1),
(37, 92, 'Id in eligendi quibusdam laborum sit facere sunt voluptate', 'Quas eaque non digni', 5, 37, 1),
(38, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 38, 2),
(39, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 39, 2),
(40, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 40, 2),
(41, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 41, 2),
(42, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 42, 2),
(43, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 43, 2),
(44, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 44, 2),
(45, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 45, 2),
(46, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 46, 2),
(47, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 47, 2),
(48, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 48, 2),
(49, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 49, 2),
(50, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 50, 2),
(51, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 51, 2),
(52, 67, 'Ab provident optio ipsam dolor duis accusantium dolorem officia sunt qui consectetur corporis ut labore', 'Ut harum fuga Exerc', 77, 52, 2),
(53, NULL, NULL, NULL, NULL, 53, 1),
(54, NULL, NULL, NULL, NULL, 54, 1),
(55, NULL, NULL, NULL, NULL, 55, 1),
(56, NULL, NULL, NULL, NULL, 56, 1),
(57, 11, 'Dolore id modi quisquam minima et distinctio', 'Vitae velit corporis', 85, 57, 1),
(58, 11, 'Dolore id modi quisquam minima et distinctio', 'Vitae velit corporis', 85, 58, 1),
(59, 11, 'Dolore id modi quisquam minima et distinctio', 'Vitae velit corporis', 85, 59, 1),
(60, 11, 'Dolore id modi quisquam minima et distinctio', 'Vitae velit corporis', 85, 60, 1),
(61, 11, 'Dolore id modi quisquam minima et distinctio', 'Vitae velit corporis', 85, 61, 1),
(62, 11, 'Dolore id modi quisquam minima et distinctio', 'Vitae velit corporis', 85, 62, 1),
(63, 11, 'Dolore id modi quisquam minima et distinctio', 'Vitae velit corporis', 85, 63, 1),
(64, 11, 'Dolore id modi quisquam minima et distinctio', 'Vitae velit corporis', 85, 64, 1),
(65, 64, 'Ullamco earum proident esse quia itaque', 'Veniam sit Nam enim', 47, 65, 1),
(66, 23, 'Fugiat explicabo Vero fuga Illum modi aut recusandae Commodo est tenetur modi eu et fugit unde placeat ex', 'Ea cillum enim illo', 21, 66, 1),
(67, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 67, 1),
(68, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 68, 1),
(69, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 69, 1),
(70, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 70, 1),
(71, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 71, 1),
(72, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 72, 1),
(73, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 73, 1),
(74, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 74, 1),
(75, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 75, 1),
(76, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 76, 1),
(77, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 77, 1),
(78, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 78, 1),
(79, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 79, 1),
(80, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 80, 1),
(81, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 81, 1),
(82, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 82, 1),
(83, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 83, 1),
(84, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 84, 1),
(85, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 85, 1),
(86, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 86, 1),
(87, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 87, 1),
(88, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 88, 1),
(89, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 89, 1),
(90, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 90, 1),
(91, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 91, 1),
(92, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 92, 1),
(93, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 93, 1),
(94, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 94, 1),
(95, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 95, 1),
(96, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 96, 1),
(97, 16, 'Fugiat voluptas quo ipsam est sunt', 'Atque explicabo Qui', 14, 97, 1);

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id` int(11) NOT NULL,
  `nbre_question` int(11) DEFAULT NULL,
  `started_at` datetime DEFAULT NULL,
  `stopped_at` datetime DEFAULT NULL,
  `bareme_tot` int(11) DEFAULT NULL,
  `matiere_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `nbre_question`, `started_at`, `stopped_at`, `bareme_tot`, `matiere_id`) VALUES
(1, 32, '2015-07-24 17:58:00', '2022-04-23 11:49:00', 72, 3),
(2, 32, '2015-07-24 17:58:00', '2022-04-23 11:49:00', 72, 3),
(3, 32, '2015-07-24 17:58:00', '2022-04-23 11:49:00', 72, 3),
(4, 32, '2015-07-24 17:58:00', '2022-04-23 11:49:00', 72, 3),
(5, 32, '2015-07-24 17:58:00', '2022-04-23 11:49:00', 72, 3),
(6, 32, '2015-07-24 17:58:00', '2022-04-23 11:49:00', 72, 3),
(7, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(8, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(9, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(10, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(11, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(12, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(13, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(14, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(15, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(16, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(17, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(18, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(19, 4, '2025-02-05 20:34:00', '2018-05-14 13:09:00', 20, 4),
(20, 65, '2018-09-09 02:28:00', '2017-10-17 19:14:00', 29, 4),
(21, 65, '2018-09-09 02:28:00', '2017-10-17 19:14:00', 29, 4),
(22, 65, '2018-09-09 02:28:00', '2017-10-17 19:14:00', 29, 4),
(23, 65, '2018-09-09 02:28:00', '2017-10-17 19:14:00', 29, 4),
(24, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(25, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(26, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(27, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(28, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(29, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(30, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(31, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(32, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(33, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(34, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(35, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(36, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(37, 4, '2019-07-16 21:44:00', '2015-11-25 03:31:00', 33, 4),
(38, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(39, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(40, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(41, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(42, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(43, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(44, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(45, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(46, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(47, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(48, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(49, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(50, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(51, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(52, 2, '2017-05-24 12:04:00', '2017-10-18 21:29:00', 38, 3),
(53, 3, '2018-02-04 01:03:00', '2019-03-03 01:03:00', 20, 1),
(54, 3, '2018-02-04 01:03:00', '2019-03-03 01:03:00', 21, 1),
(55, 3, '2018-02-04 01:03:00', '2019-03-03 01:03:00', 21, 1),
(56, 3, '2018-02-04 01:03:00', '2019-03-03 01:03:00', 21, 1),
(57, 4, '2022-11-16 03:07:00', '2019-04-16 12:41:00', 15, 1),
(58, 4, '2022-11-16 03:07:00', '2019-04-16 12:41:00', 15, 1),
(59, 4, '2022-11-16 03:07:00', '2019-04-16 12:41:00', 15, 1),
(60, 2, '2022-11-16 03:07:00', '2019-04-16 12:41:00', 15, 1),
(61, 2, '2022-11-16 03:07:00', '2019-04-16 12:41:00', 15, 1),
(62, 2, '2022-11-16 03:07:00', '2019-04-16 12:41:00', 15, 1),
(63, 2, '2022-11-16 03:07:00', '2019-04-16 12:41:00', 15, 1),
(64, 2, '2022-11-16 03:07:00', '2019-04-16 12:41:00', 15, 1),
(65, 3, '2018-07-20 04:05:00', '2021-09-04 20:08:00', 30, 1),
(66, 2, '2016-02-23 11:20:00', '2022-05-06 23:53:00', 7, 3),
(67, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(68, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(69, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(70, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(71, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(72, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(73, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(74, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(75, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(76, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(77, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(78, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(79, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(80, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(81, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(82, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(83, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(84, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(85, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(86, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(87, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(88, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(89, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(90, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(91, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(92, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(93, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(94, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(95, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(96, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4),
(97, 5, '2024-02-14 18:00:00', '2025-11-02 10:59:00', 27, 4);

-- --------------------------------------------------------

--
-- Structure de la table `reponse_eleve`
--

CREATE TABLE `reponse_eleve` (
  `id` int(11) NOT NULL,
  `reponse_eleve` longtext COLLATE utf8mb4_unicode_ci,
  `is_just` tinyint(1) DEFAULT NULL,
  `note_question` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `reponse_prof_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reponse_prof`
--

CREATE TABLE `reponse_prof` (
  `id` int(11) NOT NULL,
  `is_just` tinyint(1) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `libelle_reponse` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reponse_prof`
--

INSERT INTO `reponse_prof` (`id`, `is_just`, `question_id`, `libelle_reponse`) VALUES
(1, 0, 1, 'Pariatur Praesentiu'),
(2, 0, 2, 'Pariatur Praesentiu'),
(3, 0, 3, 'Pariatur Praesentiu'),
(4, 0, 4, 'Pariatur Praesentiu'),
(5, 0, 5, 'Pariatur Praesentiu'),
(6, 0, 6, 'Pariatur Praesentiu'),
(7, 1, 7, 'Expedita aut id aut'),
(8, 1, 8, 'Expedita aut id aut'),
(9, 1, 9, 'Expedita aut id aut'),
(10, 1, 10, 'Expedita aut id aut'),
(11, 1, 11, 'Expedita aut id aut'),
(12, 1, 12, 'Expedita aut id aut'),
(13, 1, 13, 'Expedita aut id aut'),
(14, 1, 14, 'Expedita aut id aut'),
(15, 1, 15, 'Expedita aut id aut'),
(16, 1, 16, 'Expedita aut id aut'),
(17, 1, 17, 'Expedita aut id aut'),
(18, 1, 18, 'Expedita aut id aut'),
(19, 1, 19, 'Expedita aut id aut'),
(20, 1, 20, 'Ipsam dolorem et sed'),
(21, 1, 21, 'Ipsam dolorem et sed'),
(22, 1, 22, 'Ipsam dolorem et sed'),
(23, 1, 23, 'Ipsam dolorem et sed'),
(24, 1, 24, 'Velit saepe dolorem'),
(25, 1, 25, 'Velit saepe dolorem'),
(26, 1, 26, 'Velit saepe dolorem'),
(27, 1, 27, 'Velit saepe dolorem'),
(28, 1, 28, 'Velit saepe dolorem'),
(29, 1, 29, 'Velit saepe dolorem'),
(30, 1, 30, 'Velit saepe dolorem'),
(31, 1, 31, 'Velit saepe dolorem'),
(32, 1, 32, 'Velit saepe dolorem'),
(33, 1, 33, 'Velit saepe dolorem'),
(34, 1, 34, 'Velit saepe dolorem'),
(35, 1, 35, 'Velit saepe dolorem'),
(36, 1, 36, 'Velit saepe dolorem'),
(37, 1, 37, 'Velit saepe dolorem'),
(38, 0, 38, 'Assumenda esse et s'),
(39, 0, 39, 'Assumenda esse et s'),
(40, 0, 40, 'Assumenda esse et s'),
(41, 0, 41, 'Assumenda esse et s'),
(42, 0, 42, 'Assumenda esse et s'),
(43, 0, 43, 'Assumenda esse et s'),
(44, 0, 44, 'Assumenda esse et s'),
(45, 0, 45, 'Assumenda esse et s'),
(46, 0, 46, 'Assumenda esse et s'),
(47, 0, 47, 'Assumenda esse et s'),
(48, 0, 48, 'Assumenda esse et s'),
(49, 0, 49, 'Assumenda esse et s'),
(50, 0, 50, 'Assumenda esse et s'),
(51, 0, 51, 'Assumenda esse et s'),
(52, 0, 52, 'Assumenda esse et s'),
(53, 0, 53, NULL),
(54, 0, 54, NULL),
(55, 0, 55, NULL),
(56, 0, 56, NULL),
(57, 1, 57, 'Soluta architecto pa'),
(58, 1, 58, 'Soluta architecto pa'),
(59, 1, 59, 'Soluta architecto pa'),
(60, 1, 60, 'Soluta architecto pa'),
(61, 1, 61, 'Soluta architecto pa'),
(62, 1, 62, 'Soluta architecto pa'),
(63, 1, 63, 'Soluta architecto pa'),
(64, 1, 64, 'Soluta architecto pa'),
(65, 1, 65, 'Omnis omnis sed cons'),
(66, 1, 66, 'Autem eligendi volup'),
(67, 0, 67, 'Amet harum est quod'),
(68, 0, 68, 'Amet harum est quod'),
(69, 0, 69, 'Amet harum est quod'),
(70, 0, 70, 'Amet harum est quod'),
(71, 0, 71, 'Amet harum est quod'),
(72, 0, 72, 'Amet harum est quod'),
(73, 0, 73, 'Amet harum est quod'),
(74, 0, 74, 'Amet harum est quod'),
(75, 0, 75, 'Amet harum est quod'),
(76, 0, 76, 'Amet harum est quod'),
(77, 0, 77, 'Amet harum est quod'),
(78, 0, 78, 'Amet harum est quod'),
(79, 0, 79, 'Amet harum est quod'),
(80, 0, 80, 'Amet harum est quod'),
(81, 0, 81, 'Amet harum est quod'),
(82, 0, 82, 'Amet harum est quod'),
(83, 0, 83, 'Amet harum est quod'),
(84, 0, 84, 'Amet harum est quod'),
(85, 0, 85, 'Amet harum est quod'),
(86, 0, 86, 'Amet harum est quod'),
(87, 0, 87, 'Amet harum est quod'),
(88, 0, 88, 'Amet harum est quod'),
(89, 0, 89, 'Amet harum est quod'),
(90, 0, 90, 'Amet harum est quod'),
(91, 0, 91, 'Amet harum est quod'),
(92, 0, 92, 'Amet harum est quod'),
(93, 0, 93, 'Amet harum est quod'),
(94, 0, 94, 'Amet harum est quod'),
(95, 0, 95, 'Amet harum est quod'),
(96, 0, 96, 'Amet harum est quod'),
(97, 0, 97, 'Amet harum est quod');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `session_user`
--

CREATE TABLE `session_user` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_reponse`
--

CREATE TABLE `type_reponse` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_reponse`
--

INSERT INTO `type_reponse` (`id`, `type`) VALUES
(1, 'libre'),
(2, 'qcm');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `prenom`) VALUES
(1, 'admin@admin.fr', '[\"ROLE_ADMIN\"]', '$argon2i$v=19$m=65536,t=4,p=1$TlVleWljcGg5WHc4ZXlpQw$GX/EpQm7g5DC4sRvJ+GyYIeyqSq5khoHgouLyQHRLu4', 'admin', 'admin'),
(4, 'xvforest@orange.fr', '[]', '$argon2i$v=19$m=65536,t=4,p=1$TlVleWljcGg5WHc4ZXlpQw$GX/EpQm7g5DC4sRvJ+GyYIeyqSq5khoHgouLyQHRLu4', 'Forest', 'Véronique'),
(5, 'prof@prof.fr', '[\"ROLE_PROF\"]', '$argon2i$v=19$m=65536,t=4,p=1$ZFBvSHEwYnQ2Mm9USTA3WA$Xej8nEI1P+MtQyfgsbZr9El8Mz4J3GMoAURhM3MvXBo', 'Prof', 'Prof');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiere_user`
--
ALTER TABLE `matiere_user`
  ADD PRIMARY KEY (`matiere_id`,`user_id`),
  ADD KEY `IDX_FE415017F46CD258` (`matiere_id`),
  ADD KEY `IDX_FE415017A76ED395` (`user_id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_CFBDFA1455E048C5` (`reponse_eleve_id`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6F7494ECE07E8FF` (`questionnaire_id`),
  ADD KEY `IDX_B6F7494ED21B6DA7` (`type_reponse_id`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7A64DAFF46CD258` (`matiere_id`);

--
-- Index pour la table `reponse_eleve`
--
ALTER TABLE `reponse_eleve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3487E94613FECDF` (`session_id`),
  ADD KEY `IDX_3487E9422C688C7` (`reponse_prof_id`);

--
-- Index pour la table `reponse_prof`
--
ALTER TABLE `reponse_prof`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_67D139F81E27F6BF` (`question_id`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `session_user`
--
ALTER TABLE `session_user`
  ADD PRIMARY KEY (`session_id`,`user_id`),
  ADD KEY `IDX_4BE2D663613FECDF` (`session_id`),
  ADD KEY `IDX_4BE2D663A76ED395` (`user_id`);

--
-- Index pour la table `type_reponse`
--
ALTER TABLE `type_reponse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `reponse_eleve`
--
ALTER TABLE `reponse_eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponse_prof`
--
ALTER TABLE `reponse_prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_reponse`
--
ALTER TABLE `type_reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `matiere_user`
--
ALTER TABLE `matiere_user`
  ADD CONSTRAINT `FK_FE415017A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FE415017F46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA1455E048C5` FOREIGN KEY (`reponse_eleve_id`) REFERENCES `reponse_eleve` (`id`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_B6F7494ECE07E8FF` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaire` (`id`),
  ADD CONSTRAINT `FK_B6F7494ED21B6DA7` FOREIGN KEY (`type_reponse_id`) REFERENCES `type_reponse` (`id`);

--
-- Contraintes pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `FK_7A64DAFF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `reponse_eleve`
--
ALTER TABLE `reponse_eleve`
  ADD CONSTRAINT `FK_3487E9422C688C7` FOREIGN KEY (`reponse_prof_id`) REFERENCES `reponse_prof` (`id`),
  ADD CONSTRAINT `FK_3487E94613FECDF` FOREIGN KEY (`session_id`) REFERENCES `session` (`id`);

--
-- Contraintes pour la table `reponse_prof`
--
ALTER TABLE `reponse_prof`
  ADD CONSTRAINT `FK_67D139F81E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

--
-- Contraintes pour la table `session_user`
--
ALTER TABLE `session_user`
  ADD CONSTRAINT `FK_4BE2D663613FECDF` FOREIGN KEY (`session_id`) REFERENCES `session` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4BE2D663A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
