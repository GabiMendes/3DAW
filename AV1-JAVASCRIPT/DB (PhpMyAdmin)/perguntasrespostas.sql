-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Jun-2023 às 01:12
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `perguntasrespostas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntagabarito`
--

DROP TABLE IF EXISTS `perguntagabarito`;
CREATE TABLE IF NOT EXISTS `perguntagabarito` (
  `id` int DEFAULT NULL,
  `pergunta` varchar(255) DEFAULT NULL,
  `gabarito` varchar(255) DEFAULT NULL,
  `alternativaA` varchar(255) DEFAULT NULL,
  `alternativaB` varchar(255) DEFAULT NULL,
  `alternativaC` varchar(255) DEFAULT NULL,
  `alternativaD` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `perguntagabarito`
--

INSERT INTO `perguntagabarito` (`id`, `pergunta`, `gabarito`, `alternativaA`, `alternativaB`, `alternativaC`, `alternativaD`) VALUES
(1, 'TESTE', '', 'NULL', 'teste', 'NULL', 'NULL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

DROP TABLE IF EXISTS `resposta`;
CREATE TABLE IF NOT EXISTS `resposta` (
  `id` int DEFAULT NULL,
  `resposta` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
