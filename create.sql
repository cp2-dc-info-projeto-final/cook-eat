-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Dez-2021 às 18:54
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

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
CREATE TABLE IF NOT EXISTS `comment` (
  `cod_autor` int(11) NOT NULL,
  `cod_postagem` int(11) NOT NULL,
  `comentario` int(150) NOT NULL,
  `cod_coment` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cod_coment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `cod_autor` int(11) NOT NULL,
  `post` varchar(190) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

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
(13, 16, 'olÃ¡\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `senha_cript` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adm` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `username`, `senha_cript`, `email`, `adm`) VALUES
(16, 'Rafhs', '$2y$10$aBaAOmQzzbqH2156xs9qt.Q1Py0BnXxniY8CNbOAuw.QLf93PZmeq', 'rafhael.pimentel.rj@gmail.com', 1),
(24, 'clecio', '$2y$10$54P2N91it/cK52Bmy4nBTOkiOBXPduwdGy5teOF7lo4l9hp2jCHIi', 'rafhael.pimentel.rj@gmail.com', 0),
(25, 'JosÃ©', '$2y$10$OWM47RnDbzeLSgypfYaz0u1qETZCjxeiEjRZaohgYzzvwSFXGBBrC', 'rafhael.pimentel.rj@gmail.com', 1),
(26, 'geovanna', '$2y$10$S3YoF5cO47URi897w37PfueuCb4KSxnTR5akRXXqj2x0ouBZaeAXa', 'geovanna@gmail.com', 0),
(27, 'Daisy', '$2y$10$3T5fIdXGDZICMGONY8uJWuj1bx.F0NYtROkvbQErTPBP9iHX8n/eW', 'daisy@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
