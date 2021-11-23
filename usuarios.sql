-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Nov-2021 às 23:25
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

CREATE DATABASE cookeat;
USE cookeat;

--
-- Database: `cookeat`
--
CREATE DATABASE IF NOT EXISTS `cookeat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cookeat`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

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
(22, 'olaria', '$2y$10$M39.GVdsLEp26LWBeFjY/OK/bH9i9EuvAMBT3cBE5uzX7HzN92iWO', 'rafhael.pimentel.rj@gmail.com', 0),
(24, 'clecio', '$2y$10$54P2N91it/cK52Bmy4nBTOkiOBXPduwdGy5teOF7lo4l9hp2jCHIi', 'rafhael.pimentel.rj@gmail.com', 1),
(25, 'JosÃ©', '$2y$10$OWM47RnDbzeLSgypfYaz0u1qETZCjxeiEjRZaohgYzzvwSFXGBBrC', 'rafhael.pimentel.rj@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
