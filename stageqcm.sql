-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 15 oct. 2020 à 06:48
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
('DoctrineMigrations\\Version20201002100828', '2020-10-02 10:08:34', 106),
('DoctrineMigrations\\Version20201008073320', '2020-10-08 07:33:26', 193),
('DoctrineMigrations\\Version20201013082101', '2020-10-13 08:21:06', 194);

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
  `type_reponse_id` int(11) DEFAULT NULL,
  `questionnaire_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `nbre_choix`, `numero`, `libelle`, `bareme_question`, `type_reponse_id`, `questionnaire_id`) VALUES
(1, 52, 'Occaecat irure aut r', 'Lorem sint recusanda', 51, 1, 1),
(2, NULL, NULL, NULL, NULL, NULL, 1),
(3, 27, 'Excepteur blanditiis', 'Temporibus quos magn', 42, 1, 2),
(4, NULL, NULL, NULL, NULL, NULL, 2),
(5, 78, 'Ut reprehenderit quo', 'Voluptate ea labore', 40, 1, 3),
(6, NULL, NULL, NULL, NULL, NULL, 3),
(7, 11, 'Rerum commodo earum', 'Ullam dignissimos qu', 78, 2, 4),
(8, NULL, NULL, NULL, NULL, NULL, 4);

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
(1, 61, '2023-11-26 16:25:00', '2021-01-14 11:48:00', 3, 2),
(2, 87, '2025-03-19 05:30:00', '2021-07-17 21:50:00', 79, 4),
(3, 48, '2024-12-01 05:37:00', '2024-06-13 18:50:00', 75, 2),
(4, 21, '2020-11-19 23:33:00', '2025-07-22 11:06:00', 91, 1);

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
  `libelle_reponse` longtext COLLATE utf8mb4_unicode_ci,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reponse_prof`
--

INSERT INTO `reponse_prof` (`id`, `is_just`, `libelle_reponse`, `question_id`) VALUES
(1, 1, 'In exercitationem ve', 2),
(2, 1, 'Deserunt temporibus', 4),
(3, 1, 'Tempore cumque in a', 6),
(4, 1, 'In architecto reicie', 8);

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
  ADD KEY `IDX_B6F7494ED21B6DA7` (`type_reponse_id`),
  ADD KEY `IDX_B6F7494ECE07E8FF` (`questionnaire_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reponse_eleve`
--
ALTER TABLE `reponse_eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponse_prof`
--
ALTER TABLE `reponse_prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
