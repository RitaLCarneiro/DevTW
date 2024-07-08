-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jul-2024 às 12:47
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`idGenero`, `nome`) VALUES
(0, 'Romance'),
(1, 'Fantasia'),
(2, 'Sci-Fi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `generosuser`
--

CREATE TABLE `generosuser` (
  `idGenero` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `isFavorite` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `generosuser`
--

INSERT INTO `generosuser` (`idGenero`, `idUser`, `isFavorite`) VALUES
(0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `idLivro` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `editora` varchar(100) DEFAULT NULL,
  `isbn` bigint(20) DEFAULT NULL,
  `sinopse` varchar(800) DEFAULT NULL,
  `capa` varchar(100) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `datas` date DEFAULT NULL,
  `npaginas` int(4) DEFAULT NULL,
  `revisao` int(10) DEFAULT NULL,
  `idGenero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`idLivro`, `nome`, `autor`, `editora`, `isbn`, `sinopse`, `capa`, `preco`, `link`, `datas`, `npaginas`, `revisao`, `idGenero`) VALUES
(0, 'The Selection', 'Kiera Cass', 'HarperTeen', 9780062059932, 'For thirty-five girls, the Selection is the chance of a lifetime. The opportunity to escape the life laid out for them since birth. To be swept up in a world of glittering gowns and priceless jewels. To live in a palace and compete for the heart of gorgeous Prince Maxon.', 'https://covers.openlibrary.org/b/isbn/9780062059932-L.jpg', 20, 'https://openlibrary.org/books/OL25758719M', '2012-04-24', 336, 6, 0),
(1, 'Fourth Wing', 'Rebecca Yarros', 'Cengage Gale', 9798885799263, 'Enter the brutal and elite world of a war college for dragon riders from USA Today bestselling author Rebecca Yarros.Twenty-year-old Violet Sorrengail was supposed to enter the Scribe Quadrant, living a quiet life among books and history. Now, the commanding general—also known as her tough-as-talons mother—has ordered Violet to join the hundreds of candidates striving to become the elite of Navarre: dragon riders.But when you’re smaller than everyone else and your body is brittle, death is only a heartbeat away...because dragons don’t bond to “fragile” humans. They incinerate them.With fewer dragons willing to bond than cadets, most would kill Violet to better their own chances of success. The rest would kill her just for being her mother’s daughter—like Xaden Riorson, the most powerful an', 'https://covers.openlibrary.org/b/isbn/9798885799263-L.jpg', NULL, 'https://openlibrary.org/works/OL29226517W/Fourth_Wing', NULL, 512, 8, 1),
(2, 'Descendant Of The Crane', 'Joan He', 'AW Teen', 9780807515518, 'Ainda não adicionada', 'https://covers.openlibrary.org/b/isbn/9780807515518-M.jpg', NULL, 'https://openlibrary.org/works/OL20160831W/Descendant_of_the_Crane', '2019-04-09', 416, 4, 1),
(3, 'Scarred', 'Emily McIntire', 'Emily McIntire', 9798985138047, 'Ainda não adicionada', 'https://covers.openlibrary.org/b/isbn/9798985138047-L.jpg', NULL, 'https://openlibrary.org/works/OL27245840W/Scarred?edition=key%3A/books/OL36978093M', '2022-01-29', NULL, 2, 0),
(4, 'Powerless', 'Lauren Roberts', 'Simon & Schuster Books For Young Readers', 9781665954884, 'Ainda não tem uma adicionada.', 'https://covers.openlibrary.org/b/isbn/9781665954891-L.jpg', NULL, 'https://openlibrary.org/works/OL34774028W/Powerless', '2024-02-17', NULL, 4, 0),
(5, 'Reckless', 'Lauren Roberts', 'Simon & Schuster Books For Young Readers', 9781665955430, 'Ainda não tem uma adicionada.', 'https://covers.openlibrary.org/b/isbn/9781665955430-L.jpg', NULL, 'https://openlibrary.org/works/OL37855093W/Reckless', '2024-02-17', 512, 2, 0),
(6, 'Dune', 'Frank Herbert', 'Berkley Books', 9780425046876, 'Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the ´spice´ melange, a drug capable of extending life and enhancing consciousness. Coveted across the known universe, melange is a prize worth killing for... When House Atreides is betrayed, the destruction of Paul\'s family will set the boy on a journey toward a destiny greater than he could ever have imagined. And as he evolves into the mysterious man known as Muad\'Dib, he will bring to fruition humankind\'s most ancient and unattainable dream. A stunning blend of adventure and mysticism, environmentalism and politics, Dune won the first Nebula Award, shared the Hugo Award, and formed the basis of what is undoubtedly ', 'https://covers.openlibrary.org/b/isbn/9780425046876-L.jpg', NULL, 'https://openlibrary.org/works/OL893415W/Dune', '1980-05-15', NULL, 7, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livrouser`
--

CREATE TABLE `livrouser` (
  `idLivro` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `isFavourite` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livrouser`
--

INSERT INTO `livrouser` (`idLivro`, `idUser`, `isFavourite`) VALUES
(0, 0, 1),
(1, 0, 1),
(2, 0, 1),
(3, 0, 0),
(4, 0, 0),
(5, 0, 0),
(6, 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`idUser`, `name`, `email`, `tipo`, `passwords`, `aboutMe`) VALUES
(0, 'teste', 'teste@mail.com', 0, '11111', '¡Ay!\r\nFonsi, DY\r\nOh, oh no, oh no (oh)\r\nHey yeah\r\nDiridiri, dirididi Daddy\r\nGo!\r\nSí, sabes que ya llevo un rato mirándote\r\nTengo que bailar contigo hoy (DY)\r\nVi que tu mirada ya estaba llamándome\r\nMuéstrame el camino que yo voy\r\nOh, tú, tú eres el imán y yo soy el metal\r\nMe voy acercando y voy armando el plan\r\nSolo con pensarlo se acelera el pulso (oh yeah)\r\nYa, ya me estás gustando más de lo normal\r\nTodos mis sentidos van pidiendo más\r\nEsto hay que tomarlo sin ningún apuro\r\nDespacito\r\nQuiero re'),
(1, 'aaaaa', 'aaaaa@mail.com', 0, 'aaaaa', ''),
(2, 'StunSeed_backwards', 'hehe@mail', 0, '12345', ''),
(3, 'qDeQuaQua', 'qqq@qqq', 0, 'qqq', '');

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
-- Índices para tabela `livrouser`
--
ALTER TABLE `livrouser`
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
-- Limitadores para a tabela `livrouser`
--
ALTER TABLE `livrouser`
  ADD CONSTRAINT `livrouser_ibfk_1` FOREIGN KEY (`idLivro`) REFERENCES `livros` (`idLivro`),
  ADD CONSTRAINT `livrouser_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
