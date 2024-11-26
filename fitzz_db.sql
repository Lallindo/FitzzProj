-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26/11/2024 às 21:34
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fitzz_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id_endereco` int NOT NULL AUTO_INCREMENT,
  `id_usuario_endereco` int NOT NULL,
  `tipo_endereco` char(1) NOT NULL,
  `rua_endereco` varchar(40) NOT NULL,
  `bairro_endereco` varchar(100) NOT NULL,
  `cidade_endereco` varchar(40) NOT NULL,
  `estado_endereco` char(2) NOT NULL,
  `cep_endereco` char(8) NOT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `id_usuario_endereco` (`id_usuario_endereco`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`id_endereco`, `id_usuario_endereco`, `tipo_endereco`, `rua_endereco`, `bairro_endereco`, `cidade_endereco`, `estado_endereco`, `cep_endereco`) VALUES
(1, 1, 'E', 'Rua Itu, 225', '', 'Dois Córregos', 'SP', '17300000'),
(2, 1, 'C', 'Rua Itu, 225', '', 'Dois Córregos', 'SP', '17300000'),
(3, 2, 'E', 'Rua 0, 10', '', 'Jaú', 'SP', '19382800'),
(4, 2, 'C', 'Rua 1, 00', '', 'Jaú', 'SP', '18239402'),
(5, 3, 'C', 'Rua 2, 20', '', 'Bauru', 'SP', '19382749'),
(6, 3, 'E', 'Rua 3, 02', '', 'Bauru', 'SP', '19283940'),
(7, 34, 'E', 'Rua Doutor Newton Ferraz de Marinis, 50', 'Jardim Maria Luiza II', 'Jaú', 'Sã', '17203040'),
(8, 35, 'E', 'Rua Doutor Newton Ferraz de Marinis, 50', 'Jardim Maria Luiza II', 'Jaú', 'Sã', '17203040'),
(9, 36, 'E', 'Rua Doutor Newton Ferraz de Marinis, 50', 'Jardim Maria Luiza II', 'Jaú', 'Sã', '17203040'),
(10, 37, 'E', 'Rua Doutor Newton Ferraz de Marinis, 50', 'Jardim Maria Luiza II', 'Jaú', 'Sã', '17203040'),
(11, 38, 'E', 'Rua Doutor Newton Ferraz de Marinis, 50', 'Jardim Maria Luiza II', 'Jaú', 'Sã', '17203040'),
(12, 39, 'E', 'Rua Doutor Newton Ferraz de Marinis, 50', 'Jardim Maria Luiza II', 'Jaú', 'Sã', '17203040'),
(13, 40, 'E', 'Rua Doutor Newton Ferraz de Marinis, 50', 'Jardim Maria Luiza II', 'Jaú', 'Sã', '17203040'),
(14, 41, 'E', 'Rua Doutor Afonso Mendes Braga, 45', 'Vila São Judas Tadeu', 'Jaú', 'Sã', '17207610'),
(15, 44, 'E', ', ', 'Jardim Maria Luiza II', 'Jaú', 'SP', '17203040'),
(16, 45, 'E', 'Rua Doutor Newton Ferraz de Marinis, 50', 'Jardim Maria Luiza II', 'Jaú', 'SP', '17203040'),
(17, 46, 'E', 'Rua Doutor Newton Ferraz de Marinis, 50', 'Jardim Maria Luiza II', 'Jaú', 'SP', '17203040'),
(18, 47, 'E', 'Rua Doutor Newton Ferraz de Marinis, 50', 'Jardim Maria Luiza II', 'Jaú', 'SP', '17203040');

-- --------------------------------------------------------

--
-- Estrutura para tabela `especificacoes`
--

DROP TABLE IF EXISTS `especificacoes`;
CREATE TABLE IF NOT EXISTS `especificacoes` (
  `id_espec` int NOT NULL AUTO_INCREMENT,
  `id_prod_espec` int NOT NULL,
  `cor_espec` char(1) NOT NULL,
  `tamanho_espec` char(1) NOT NULL,
  `quantidade_espec` int NOT NULL,
  `imagem1_espec` varchar(40) NOT NULL,
  `imagem2_espec` varchar(40) NOT NULL,
  PRIMARY KEY (`id_espec`),
  KEY `id_prod_espec` (`id_prod_espec`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `especificacoes`
--

INSERT INTO `especificacoes` (`id_espec`, `id_prod_espec`, `cor_espec`, `tamanho_espec`, `quantidade_espec`, `imagem1_espec`, `imagem2_espec`) VALUES
(16, 11, '1', '2', 8, 'img1.jpg', ''),
(15, 11, '1', '1', 9, '', ''),
(14, 11, '1', '0', 10, '', ''),
(13, 11, '0', '4', 0, '', ''),
(12, 11, '0', '3', 10, '', ''),
(11, 11, '0', '2', 10, '', ''),
(10, 11, '0', '1', 10, '', ''),
(9, 11, '0', '0', 10, 'img1.jpg', ''),
(17, 11, '1', '3', 10, '', ''),
(18, 11, '1', '4', 10, '', ''),
(19, 11, '2', '0', 10, '', ''),
(20, 11, '2', '1', 10, '', ''),
(21, 11, '2', '2', 10, '', ''),
(22, 11, '2', '3', 10, '', ''),
(23, 11, '2', '4', 10, '', ''),
(24, 11, '3', '0', 10, '', ''),
(25, 11, '3', '1', 10, '', ''),
(26, 11, '3', '2', 10, '', ''),
(27, 11, '3', '3', 10, '', ''),
(28, 11, '3', '4', 10, '', ''),
(29, 12, '0', '0', 10, '', ''),
(30, 12, '0', '1', 10, '', ''),
(31, 12, '0', '2', 10, '', ''),
(32, 12, '0', '3', 10, '', ''),
(33, 12, '0', '4', 10, '', ''),
(34, 12, '1', '0', 10, '', ''),
(35, 12, '1', '1', 10, '', ''),
(36, 12, '1', '2', 10, '', ''),
(37, 12, '1', '3', 10, '', ''),
(38, 12, '1', '4', 10, '', ''),
(39, 12, '2', '0', 10, '', ''),
(40, 12, '2', '1', 10, '', ''),
(41, 12, '2', '2', 10, '', ''),
(42, 12, '2', '3', 10, '', ''),
(43, 12, '2', '4', 10, '', ''),
(44, 12, '3', '0', 10, '', ''),
(45, 12, '3', '1', 10, '', ''),
(46, 12, '3', '2', 10, '', ''),
(47, 12, '3', '3', 10, '', ''),
(48, 12, '3', '4', 10, '', ''),
(49, 13, '0', '0', 10, '', ''),
(50, 13, '0', '1', 10, '', ''),
(51, 13, '0', '2', 10, '', ''),
(52, 13, '0', '3', 10, '', ''),
(53, 13, '0', '4', 10, '', ''),
(54, 13, '1', '0', 10, '', ''),
(55, 13, '1', '1', 10, '', ''),
(56, 13, '1', '2', 10, '', ''),
(57, 13, '1', '3', 10, '', ''),
(58, 13, '1', '4', 10, '', ''),
(59, 13, '2', '0', 10, '', ''),
(60, 13, '2', '1', 10, '', ''),
(61, 13, '2', '2', 10, '', ''),
(62, 13, '2', '3', 10, '', ''),
(63, 13, '2', '4', 10, '', ''),
(64, 13, '3', '0', 10, '', ''),
(65, 13, '3', '1', 10, '', ''),
(66, 13, '3', '2', 10, '', ''),
(67, 13, '3', '3', 10, '', ''),
(68, 13, '3', '4', 10, '', ''),
(69, 14, '0', '0', 10, '', ''),
(70, 14, '0', '1', 10, '', ''),
(71, 14, '0', '2', 10, '', ''),
(72, 14, '0', '3', 10, '', ''),
(73, 14, '0', '4', 10, '', ''),
(74, 14, '1', '0', 10, '', ''),
(75, 14, '1', '1', 10, '', ''),
(76, 14, '1', '2', 10, '', ''),
(77, 14, '1', '3', 10, '', ''),
(78, 14, '1', '4', 10, '', ''),
(79, 14, '2', '0', 10, '', ''),
(80, 14, '2', '1', 10, '', ''),
(81, 14, '2', '2', 10, '', ''),
(82, 14, '2', '3', 10, '', ''),
(83, 14, '2', '4', 10, '', ''),
(84, 14, '3', '0', 10, '', ''),
(85, 14, '3', '1', 10, '', ''),
(86, 14, '3', '2', 10, '', ''),
(87, 14, '3', '3', 10, '', ''),
(88, 14, '3', '4', 10, '', ''),
(89, 15, '0', '0', 10, '', ''),
(90, 15, '0', '1', 10, '', ''),
(91, 15, '0', '2', 10, '', ''),
(92, 15, '0', '3', 10, '', ''),
(93, 15, '0', '4', 10, '', ''),
(94, 15, '1', '0', 10, '', ''),
(95, 15, '1', '1', 10, '', ''),
(96, 15, '1', '2', 10, '', ''),
(97, 15, '1', '3', 10, '', ''),
(98, 15, '1', '4', 10, '', ''),
(99, 15, '2', '0', 10, '', ''),
(100, 15, '2', '1', 10, '', ''),
(101, 15, '2', '2', 10, '', ''),
(102, 15, '2', '3', 10, '', ''),
(103, 15, '2', '4', 10, '', ''),
(104, 15, '3', '0', 10, '', ''),
(105, 15, '3', '1', 10, '', ''),
(106, 15, '3', '2', 10, '', ''),
(107, 15, '3', '3', 10, '', ''),
(108, 15, '3', '4', 10, '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE IF NOT EXISTS `itens` (
  `id_item` int NOT NULL AUTO_INCREMENT,
  `id_pedido_item` int NOT NULL,
  `id_espec_item` int NOT NULL,
  `quantidade_item` int NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_espec_item` (`id_espec_item`),
  KEY `id_pedido_item` (`id_pedido_item`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `itens`
--

INSERT INTO `itens` (`id_item`, `id_pedido_item`, `id_espec_item`, `quantidade_item`) VALUES
(53, 22, 35, 1),
(52, 21, 37, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `id_endereco_pedido` int NOT NULL,
  `id_usuario_pedido` int NOT NULL,
  `valor_pedido` int NOT NULL,
  `pagamento_pedido` int DEFAULT NULL,
  `status_pedido` int DEFAULT NULL,
  `datacriacao_pedido` date DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_endereco_pedido` (`id_endereco_pedido`),
  KEY `id_usuario_pedido` (`id_usuario_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_endereco_pedido`, `id_usuario_pedido`, `valor_pedido`, `pagamento_pedido`, `status_pedido`, `datacriacao_pedido`) VALUES
(22, 18, 47, 20, 1, 0, '2024-11-26'),
(21, 12, 39, 20, 0, 0, '2024-11-26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `preco_produto` decimal(6,2) NOT NULL,
  `nome_produto` varchar(40) NOT NULL,
  `desc_produto` varchar(80) NOT NULL,
  PRIMARY KEY (`id_produto`),
  UNIQUE KEY `nome_produto` (`nome_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `preco_produto`, `nome_produto`, `desc_produto`) VALUES
(11, 10.00, 'Camiseta curta', 'Camisa'),
(12, 20.00, 'Camiseta', 'Camiseta'),
(13, 30.00, 'Moletom Blusa', 'Blusa Moletom'),
(14, 40.00, 'Bermuda Curta', 'Shorts'),
(15, 50.00, 'Bermuda', 'Calça'),
(16, 19.50, 'Camiseta Estampada Curta', 'Camisa estampada com desenho');

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefones`
--

DROP TABLE IF EXISTS `telefones`;
CREATE TABLE IF NOT EXISTS `telefones` (
  `id_telefone` int NOT NULL AUTO_INCREMENT,
  `id_usuario_telefone` int NOT NULL,
  `numero_telefone` varchar(20) NOT NULL,
  PRIMARY KEY (`id_telefone`),
  KEY `id_usuario_telefone` (`id_usuario_telefone`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `telefones`
--

INSERT INTO `telefones` (`id_telefone`, `id_usuario_telefone`, `numero_telefone`) VALUES
(14, 38, '14997702848'),
(13, 37, '14997702848'),
(12, 36, '14997702848'),
(11, 35, '14997702848'),
(10, 34, '14997702848'),
(16, 40, ''),
(17, 41, '14997922773'),
(19, 42, '14997702848'),
(20, 43, '14997702848'),
(21, 44, '14997702848'),
(22, 45, '14997702848'),
(30, 47, '12345678910');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nomecomp_usuario` varchar(80) NOT NULL,
  `cpf_usuario` varchar(11) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `datacriacao_usuario` date NOT NULL,
  `datanasc_usuario` date NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_usuario` (`email_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nomecomp_usuario`, `cpf_usuario`, `email_usuario`, `senha_usuario`, `datacriacao_usuario`, `datanasc_usuario`) VALUES
(41, 'Marcelo de Paula', '49252521860', 'marcelo@email.com', '$2y$10$yvi3o4RpFu7eaan0zPOh1eAsfc0xx/tirjgGosC48EvElrZ2uiVcu', '2024-11-18', '2002-10-12'),
(39, 'Bruno Lallo', '51214740839', 'bruno@email.com', '$2y$10$GFMwzLkVLPKbqCcxvzDA/uQXfDlBaCyunDwKL4gsnpDXnqnaJ8mxu', '2024-11-18', '2003-10-16'),
(45, 'Lian', '51214740839', 'lian@email.com', '$2y$10$.5LuDTyQJCrjPsrQOzokd.oo0MIoJCC9BoISgJ8xQ.QkihFZzXuRW', '2024-11-21', '2003-10-10'),
(46, 'Bruno Lallo', '51214740839', 'bruno2@email.com', '$2y$10$Fo60yvtm8SROMkXl4wtFJu5LIMxRINCPfeG9UDI6snANS9GlWeI5C', '2024-11-26', '2003-10-16'),
(47, 'Bruno', '51214740839', 'bruno3@email.com', '$2y$10$TfQbsRhPDbvaBFBXi6h5NesFiZ.BT.G4Q0Dc2.zqAuZyxFRkSDeHq', '2024-11-26', '2003-10-15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
