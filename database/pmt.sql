-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2023 at 07:55 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_interesses`
--

CREATE TABLE `area_interesses` (
  `id_area_interesse` int NOT NULL,
  `area_interesse` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidatos`
--

CREATE TABLE `candidatos` (
  `id_candidato` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_area_interesse` int NOT NULL,
  `cpf` char(14) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `genero` varchar(25) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `experiencias` varchar(500) DEFAULT NULL,
  `conhecimentos` varchar(500) DEFAULT NULL,
  `biografia` varchar(500) DEFAULT NULL,
  `escolaridade` varchar(50) NOT NULL,
  `nacionalidade` varchar(15) NOT NULL,
  `estado_civil` varchar(10) NOT NULL,
  `foto` blob,
  `cep` int NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `data_abertura` date NOT NULL,
  `responsavel_legal` varchar(100) NOT NULL,
  `inscricao_estadual` varchar(50) NOT NULL,
  `email_corporativo` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) NOT NULL,
  `logotipo` blob NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int NOT NULL,
  `cep` int NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` char(2) NOT NULL,
  `complemento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historicos`
--

CREATE TABLE `historicos` (
  `id_historico` int NOT NULL,
  `id_candidato` int NOT NULL,
  `id_vaga` int NOT NULL,
  `data_de_inscricao` datetime NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `nome_social` varchar(100) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vagas`
--

CREATE TABLE `vagas` (
  `id_vaga` int NOT NULL,
  `id_empresa` int NOT NULL,
  `id_area_interesse` int NOT NULL,
  `informacoes_servicos` varchar(250) NOT NULL,
  `beneficios` varchar(200) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_final` time NOT NULL,
  `salario` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_interesses`
--
ALTER TABLE `area_interesses`
  ADD PRIMARY KEY (`id_area_interesse`);

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id_candidato`),
  ADD KEY `FK_candidatos_usuarios` (`id_usuario`),
  ADD KEY `FK_candidatos_area_interesses` (`id_area_interesse`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `historicos`
--
ALTER TABLE `historicos`
  ADD PRIMARY KEY (`id_historico`),
  ADD KEY `fk_historico-candidato` (`id_candidato`),
  ADD KEY `fk_historico_vaga` (`id_vaga`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id_vaga`),
  ADD KEY `fk_vaga_empresa` (`id_empresa`),
  ADD KEY `fk_vaga_area_interesses` (`id_area_interesse`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_interesses`
--
ALTER TABLE `area_interesses`
  MODIFY `id_area_interesse` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id_candidato` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historicos`
--
ALTER TABLE `historicos`
  MODIFY `id_historico` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id_vaga` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `FK_candidatos_area_interesses` FOREIGN KEY (`id_area_interesse`) REFERENCES `area_interesses` (`id_area_interesse`),
  ADD CONSTRAINT `FK_candidatos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `historicos`
--
ALTER TABLE `historicos`
  ADD CONSTRAINT `fk_historico-candidato` FOREIGN KEY (`id_candidato`) REFERENCES `candidatos` (`id_candidato`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_historico_vaga` FOREIGN KEY (`id_vaga`) REFERENCES `vagas` (`id_vaga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_vaga_area_interesses` FOREIGN KEY (`id_area_interesse`) REFERENCES `area_interesses` (`id_area_interesse`),
  ADD CONSTRAINT `fk_vaga_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
