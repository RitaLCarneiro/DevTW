-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 24-Jun-2024 às 09:20
-- Versão do servidor: 5.7.39
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ladybook`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `idGenero` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `generosuser`
--

CREATE TABLE `generosuser` (
  `idGenero` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `isFavorite` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `idLivro` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `editora` varchar(100) DEFAULT NULL,
  `isbn` int(20) DEFAULT NULL,
  `sinopse` varchar(800) DEFAULT NULL,
  `capa` varchar(100) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `datas` date DEFAULT NULL,
  `npaginas` int(4) DEFAULT NULL,
  `revisao` int(10) DEFAULT NULL,
  `idGenero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livroUser`
--

CREATE TABLE `livroUser` (
  `idLivro` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `isFavourite` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `passwords` varchar(20) DEFAULT NULL,
  `aboutMe` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`idGenero`);

--
-- Índices para tabela `generosuser`
--
ALTER TABLE `generosuser`
  ADD KEY `idGenero` (`idGenero`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`idLivro`),
  ADD KEY `idGenero` (`idGenero`);

--
-- Índices para tabela `livroUser`
--
ALTER TABLE `livroUser`
  ADD KEY `idLivro` (`idLivro`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `generosuser`
--
ALTER TABLE `generosuser`
  ADD CONSTRAINT `generosuser_ibfk_1` FOREIGN KEY (`idGenero`) REFERENCES `generos` (`idGenero`),
  ADD CONSTRAINT `generosuser_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`idGenero`) REFERENCES `generos` (`idGenero`);

--
-- Limitadores para a tabela `livroUser`
--
ALTER TABLE `livroUser`
  ADD CONSTRAINT `livrouser_ibfk_1` FOREIGN KEY (`idLivro`) REFERENCES `livros` (`idLivro`),
  ADD CONSTRAINT `livrouser_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
