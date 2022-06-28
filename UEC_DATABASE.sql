-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jun-2022 às 20:19
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `uec`
--
CREATE DATABASE IF NOT EXISTS `uec` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `uec`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `luta`
--

CREATE TABLE `luta` (
  `id` int(11) NOT NULL,
  `idDesafiante` int(11) NOT NULL,
  `idDesafiado` int(11) NOT NULL,
  `nomeVencedor` varchar(255) DEFAULT NULL,
  `nomePerdedor` varchar(255) DEFAULT NULL,
  `rounds` tinyint(4) NOT NULL,
  `dataLuta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lutador`
--

CREATE TABLE `lutador` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `nacionalidade` varchar(30) DEFAULT NULL,
  `idade` tinyint(4) DEFAULT NULL,
  `altura` decimal(3,2) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `vitorias` int(11) DEFAULT NULL,
  `derrotas` int(11) DEFAULT NULL,
  `empates` int(11) DEFAULT NULL,
  `dataRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `luta`
--
ALTER TABLE `luta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FG_Desafiante` (`idDesafiante`),
  ADD KEY `FG_Desafiado` (`idDesafiado`);

--
-- Índices para tabela `lutador`
--
ALTER TABLE `lutador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `luta`
--
ALTER TABLE `luta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lutador`
--
ALTER TABLE `lutador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `luta`
--
ALTER TABLE `luta`
  ADD CONSTRAINT `FG_Desafiado` FOREIGN KEY (`idDesafiado`) REFERENCES `lutador` (`id`),
  ADD CONSTRAINT `FG_Desafiante` FOREIGN KEY (`idDesafiante`) REFERENCES `lutador` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
