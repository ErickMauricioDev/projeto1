-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/11/2025 às 23:37
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cidade`, `uf`) VALUES
(1, 'Padaria Central', 'Salvador', 'PB'),
(2, 'Loja Itambé', 'Itambé', 'PE'),
(3, 'Supermercado Alfa', 'Feira de Santana', 'BA'),
(4, 'Marcos Enzo Teste da Silva', 'Alagos', 'AL'),
(5, 'Teste 2 ', 'Rio de Janeiro', 'RJ'),
(6, '134', 'Rio de Janeiro', 'RJ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fale_conosco`
--

CREATE TABLE `fale_conosco` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `assunto` varchar(150) NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fale_conosco`
--

INSERT INTO `fale_conosco` (`id`, `nome`, `email`, `assunto`, `mensagem`, `data_envio`) VALUES
(1, 'Padaria Central', 'daviguedes0103@gmail.com', 'Acidende de trabalho ', 'Durante o expediente, ao tentar trocar a garrafa de água do bebedouro, o funcionário subestimou o peso da garrafa e superestimou a própria força. O resultado foi uma coreografia improvisada digna de Dança dos Famosos, com direito a giros, tropeços e um banho completo de 20 litros de água gelada.\r\n\r\nFelizmente, nenhum ferimento grave foi registrado — apenas o orgulho molhado e o chão do escritório que ficou digno de uma piscina olímpica. O bebedouro, apesar do susto, passa bem.', '2025-11-06 19:23:58'),
(2, 'Padaria Central', 'daviguedes0103@gmail.com', 'Acidende de trabalho ', 'Durante o expediente, ao tentar trocar a garrafa de água do bebedouro, o funcionário subestimou o peso da garrafa e superestimou a própria força. O resultado foi uma coreografia improvisada digna de Dança dos Famosos, com direito a giros, tropeços e um banho completo de 20 litros de água gelada.\r\n\r\nFelizmente, nenhum ferimento grave foi registrado — apenas o orgulho molhado e o chão do escritório que ficou digno de uma piscina olímpica. O bebedouro, apesar do susto, passa bem.', '2025-11-06 19:27:22');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `data_criacao`) VALUES
(1, 'QUEIJO', 'FEITO DE LEITE FERMENTADO', 10.00, '2025-11-06 21:08:21'),
(2, 'Queijo', NULL, 10.00, '2025-11-06 21:54:27');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fale_conosco`
--
ALTER TABLE `fale_conosco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `fale_conosco`
--
ALTER TABLE `fale_conosco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
