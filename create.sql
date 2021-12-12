-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Dez-2021 às 03:06
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookeat`
--
CREATE DATABASE IF NOT EXISTS `cookeat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cookeat`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `cod_autor` int(11) NOT NULL,
  `cod_postagem` int(11) NOT NULL,
  `comentario` varchar(150) NOT NULL,
  `cod_coment` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comment`
--

INSERT INTO `comment` (`cod_autor`, `cod_postagem`, `comentario`, `cod_coment`) VALUES
(28, 14, '0', 1),
(28, 14, 'olÃ¡\r\n', 2),
(28, 14, 'Rafhael', 3),
(28, 14, 'zumzumzum', 4),
(28, 15, 'lula2022', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtidas`
--

DROP TABLE IF EXISTS `curtidas`;
CREATE TABLE `curtidas` (
  `cod_curtida` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_comentario` int(11) DEFAULT NULL,
  `cod_postagem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curtidas`
--

INSERT INTO `curtidas` (`cod_curtida`, `cod_usuario`, `cod_comentario`, `cod_postagem`) VALUES
(2, 28, 0, 15),
(4, 28, 0, 14),
(5, 28, 1, 0),
(6, 28, 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `cod_autor` int(11) NOT NULL,
  `post` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id_post`, `cod_autor`, `post`) VALUES
(1, 1, 'adasdasdadadad'),
(2, 2, 'adasfdgdsgsdgsg'),
(3, 16, 'adsadada'),
(4, 16, 'nÃ£o'),
(5, 16, 'pedro lima Ã© feio'),
(6, 16, 'Alo'),
(7, 16, 'adaadaedaf'),
(8, 16, 'fabio'),
(9, 16, 'olÃ¡'),
(10, 16, 'vasco\r\n'),
(11, 26, 'aaaaaaaaa'),
(12, 26, 'koe '),
(13, 16, 'olÃ¡\r\n'),
(14, 28, 'oi'),
(15, 28, 'diretinho'),
(16, 28, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `senha_cript` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adm` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `username`, `senha_cript`, `email`, `adm`) VALUES
(16, 'Rafhs', '$2y$10$aBaAOmQzzbqH2156xs9qt.Q1Py0BnXxniY8CNbOAuw.QLf93PZmeq', 'rafhael.pimentel.rj@gmail.com', 1),
(24, 'clecio', '$2y$10$54P2N91it/cK52Bmy4nBTOkiOBXPduwdGy5teOF7lo4l9hp2jCHIi', 'rafhael.pimentel.rj@gmail.com', 0),
(25, 'JosÃ©', '$2y$10$OWM47RnDbzeLSgypfYaz0u1qETZCjxeiEjRZaohgYzzvwSFXGBBrC', 'rafhael.pimentel.rj@gmail.com', 1),
(26, 'geovanna', '$2y$10$S3YoF5cO47URi897w37PfueuCb4KSxnTR5akRXXqj2x0ouBZaeAXa', 'geovanna@gmail.com', 0),
(27, 'Daisy', '$2y$10$3T5fIdXGDZICMGONY8uJWuj1bx.F0NYtROkvbQErTPBP9iHX8n/eW', 'daisy@gmail.com', 0),
(28, 'teste', '$2y$10$l.uMHYjIHT7P7cZQof4eRuXR5juvVyPk1ZAYKtG9I/1Dmbbo7P4za', 'teste@123.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cod_coment`);

--
-- Indexes for table `curtidas`
--
ALTER TABLE `curtidas`
  ADD PRIMARY KEY (`cod_curtida`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cod_coment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `curtidas`
--
ALTER TABLE `curtidas`
  MODIFY `cod_curtida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
