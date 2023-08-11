-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Fev-2022 às 19:29
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_users`
--

DROP TABLE IF EXISTS `adms_users`;
CREATE TABLE IF NOT EXISTS `adms_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(44) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recover_password` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adms_users`
--

INSERT INTO `adms_users` (`id`, `name`, `nickname`, `email`, `user`, `password`, `recover_password`, `image`, `created`, `modified`) VALUES
(1, 'Cesar', NULL, 'cesar@celke.com.br', 'cesar@celke.com.br', '$2y$10$fxMbkhclc8U7XdM7t4iqs.2KT3arX9AbC3tk1WUh7NZ7ljiELs3ky', NULL, NULL, '2022-02-23 16:22:54', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
