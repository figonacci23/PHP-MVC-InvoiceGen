-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2023 às 15:33
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ex1database`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigonodocumento`
--

CREATE TABLE `artigonodocumento` (
  `id` int(255) NOT NULL,
  `nr_de_serie` int(255) NOT NULL,
  `id_artigo` int(255) NOT NULL,
  `quantidade` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `artigonodocumento`
--

INSERT INTO `artigonodocumento` (`id`, `nr_de_serie`, `id_artigo`, `quantidade`) VALUES
(12, 4, 7, 3),
(15, 5, 9, 3),
(16, 4, 7, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigos`
--

CREATE TABLE `artigos` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `IVA` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `artigos`
--

INSERT INTO `artigos` (`id`, `nome`, `valor`, `IVA`) VALUES
(7, 'cozido a portuguesa', 14.50, 23),
(8, 'lasanha', 42.00, 23),
(9, 'monster', 1.70, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `NIF` int(9) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `morada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`NIF`, `nome`, `morada`) VALUES
(111111111, 'testeCliente1', 'Faro'),
(123456123, 'testeCliente2', 'Rua ficticia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `nr_de_serie` int(255) NOT NULL,
  `data_emissao` date NOT NULL,
  `nif_cliente` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `documentos`
--

INSERT INTO `documentos` (`nr_de_serie`, `data_emissao`, `nif_cliente`) VALUES
(4, '2023-11-17', 111111111),
(5, '2023-11-15', 123456123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `NIF` int(9) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `morada_fiscal` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`NIF`, `nome`, `morada_fiscal`, `logo`) VALUES
(123789456, 'testeEmpresa', 'testeMoradaEmpresa', 'imagem_2023-11-03_132732121.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigonodocumento`
--
ALTER TABLE `artigonodocumento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nr_de_serie` (`nr_de_serie`),
  ADD KEY `id_artigo` (`id_artigo`);

--
-- Índices para tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`NIF`);

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`nr_de_serie`),
  ADD KEY `nif_cliente` (`nif_cliente`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`NIF`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigonodocumento`
--
ALTER TABLE `artigonodocumento`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `NIF` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987654322;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `nr_de_serie` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `artigonodocumento`
--
ALTER TABLE `artigonodocumento`
  ADD CONSTRAINT `artigonodocumento_ibfk_1` FOREIGN KEY (`nr_de_serie`) REFERENCES `documentos` (`nr_de_serie`),
  ADD CONSTRAINT `artigonodocumento_ibfk_2` FOREIGN KEY (`id_artigo`) REFERENCES `artigos` (`id`);

--
-- Limitadores para a tabela `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`nif_cliente`) REFERENCES `cliente` (`NIF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
