-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16/11/2024 às 22:06
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE IF NOT EXISTS `itens` (
  `id_item` int NOT NULL AUTO_INCREMENT,
  `id_espec_item` int NOT NULL,
  `quantidade_item` int NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_espec_item` (`id_espec_item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `id_endereco_pedido` int NOT NULL,
  `id_item_pedido` int NOT NULL,
  `id_usuario_pedido` int NOT NULL,
  `pagamento_pedido` int NOT NULL,
  `status_pedido` int NOT NULL,
  `datacriacao_pedido` date NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_endereco_pedido` (`id_endereco_pedido`),
  KEY `id_item_pedido` (`id_item_pedido`),
  KEY `id_usuario_pedido` (`id_usuario_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `senha_usuario` varchar(40) NOT NULL,
  `datacriacao_usuario` date NOT NULL,
  `datanasc_usuario` date NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_usuario` (`email_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
