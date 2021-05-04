-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql-comp
-- Tempo de geração: 04/05/2021 às 19:55
-- Versão do servidor: 8.0.0-dmr
-- Versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_comp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `dqc84`
--

CREATE TABLE `dqc84` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` bigint(20) UNSIGNED NOT NULL,
  `fat_part_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_location` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `dqc84`
--

INSERT INTO `dqc84` (`id`, `model`, `fat_part_no`, `total_location`, `created_at`, `updated_at`) VALUES
(1, 1, 'SD018CMAB1R', 124, '2021-05-04 09:08:47', '2021-05-04 09:08:47'),
(2, 1, 'SD018CMAB0T', 129, '2021-05-04 09:08:54', '2021-05-04 09:08:54'),
(3, 1, 'SD018PMAB0P', 2, '2021-05-04 09:09:01', '2021-05-04 09:09:01'),
(7, 1, 'SD018HANB0D', 3, '2021-05-04 14:55:25', '2021-05-04 14:55:25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dqc841`
--

CREATE TABLE `dqc841` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fat_part_no` bigint(20) UNSIGNED NOT NULL,
  `parts_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unt_usg` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_designator` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `dqc841`
--

INSERT INTO `dqc841` (`id`, `fat_part_no`, `parts_no`, `unt_usg`, `description`, `ref_designator`, `created_at`, `updated_at`) VALUES
(1, 2, 'HGSE5014R05', 1, 'LABEL PCB BARCODE LABEL 10X6MM 25# PLASTIC BLANK', NULL, '2021-05-04 09:09:33', '2021-05-04 09:09:33'),
(2, 2, 'SD018CMAB0T', 48, 'CHIP RES. 1/20W 15 +-5% 0201', 'R1_AR1,R1_AR10,R1_AR13,R1_AR14,R1_AR17,R1_AR18,R1_AR19,R1_AR2,R1_AR20,R1_AR21,R1_AR22,R1_AR23,R1_AR24,R1_AR25,R1_AR26,R1_AR37,R1_AR39,R1_AR41,R1_AR43,R1_AR45,R1_AR47,R1_AR49,R1_AR51,R1_AR9,R2_AR1,R2_AR10,R2_AR13,R2_AR14,R2_AR17,R2_AR18,R2_AR19,R2_AR2,R2_AR20,R2_AR21,R2_AR22,R2_AR23,R2_AR24,R2_AR25,R2_AR26,R2_AR37,R2_AR39,R2_AR41,R2_AR43,R2_AR45,R2_AR47,R2_AR49,R2_AR51,R2_AR9', '2021-05-04 09:09:53', '2021-05-04 09:09:53'),
(3, 1, 'SAH8NCJRZ05', 8, 'IC(DDR4 SDRAM) 1GX8 2666 FBGA 78P 1.2V TP', 'U11,U12,U13,U14,U15,U16,U17,U18', '2021-05-04 09:10:49', '2021-05-04 09:10:49'),
(4, 1, 'SDH40009Z07', 8, 'CHIP RES. 1/16W 240 +-1% 0402', 'R10,R11,R12,R13,R14,R15,R16,R9', '2021-05-04 09:26:25', '2021-05-04 09:26:25'),
(5, 1, 'SDH40012666', 55, 'CHIP RES. 1/20W 15 +-5% 0201', NULL, '2021-05-04 11:48:39', '2021-05-04 11:48:39'),
(6, 1, 'SDH40012333', 25, 'CHIP RES. 1/20W 15 +-5% 0201', 'U1,U2,U3,U4,U5,U6,U7,U8', '2021-05-04 11:50:47', '2021-05-04 11:50:47'),
(7, 1, 'SEH40004Z04', 11, 'CHIP CAP. (MLCC) 1U 6.3V +-10% X5R 0402', 'C16,C21,C27,C28,C52,C58,C63,C69,C70,C76,C82', '2021-05-04 13:21:24', '2021-05-04 13:21:24'),
(9, 3, 'DDH00004Z04', 1, 'SOFTWARE HLMA82GS6CJR8N-VK', NULL, '2021-05-04 15:35:08', '2021-05-04 15:35:08'),
(10, 3, 'SD018CMAB0T', 1, 'SMT TOP', NULL, '2021-05-04 15:35:35', '2021-05-04 15:35:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dqc_model`
--

CREATE TABLE `dqc_model` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `dqc_model`
--

INSERT INTO `dqc_model` (`id`, `model`) VALUES
(1, 'SSD018'),
(2, 'SSD019'),
(3, 'SSD020');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_03_085616_create_dqc_model_table', 1),
(2, '2021_05_03_085648_create_dqc84_table', 1),
(3, '2021_05_03_085730_create_dqc841_table', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `dqc84`
--
ALTER TABLE `dqc84`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dqc84_fat_part_no_unique` (`fat_part_no`),
  ADD KEY `dqc84_model_foreign` (`model`);

--
-- Índices de tabela `dqc841`
--
ALTER TABLE `dqc841`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dqc841_fat_part_no_foreign` (`fat_part_no`),
  ADD KEY `parts_no` (`parts_no`);

--
-- Índices de tabela `dqc_model`
--
ALTER TABLE `dqc_model`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dqc_model_model_unique` (`model`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `dqc84`
--
ALTER TABLE `dqc84`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `dqc841`
--
ALTER TABLE `dqc841`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `dqc_model`
--
ALTER TABLE `dqc_model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `dqc84`
--
ALTER TABLE `dqc84`
  ADD CONSTRAINT `dqc84_model_foreign` FOREIGN KEY (`model`) REFERENCES `dqc_model` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `dqc841`
--
ALTER TABLE `dqc841`
  ADD CONSTRAINT `dqc841_fat_part_no_foreign` FOREIGN KEY (`fat_part_no`) REFERENCES `dqc84` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
