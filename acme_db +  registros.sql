-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 09:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `no_documento` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`no_documento`, `nombre`, `email`, `direccion`, `telefono`) VALUES
(87415131, 'Gonzalo Gonzalez', 'gonzalo@abc.com', 'cra 80-63', ''),
(89765234, 'Ester Colero', 'ester@abc.com', 'cll40-52', '6642224678'),
(132690543, 'Armando Casas', 'arma.casas@abc.com', 'cll 50-189', '742235666'),
(873235672, 'Rodrigo Rodriguez', 'rorod@abc.com', 'cra 20-86', ''),
(1553227773, 'Fernando Fernandez', 'ferfer@abc.com', 'cll 8-20', '1231234567');

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `fecha` text NOT NULL DEFAULT current_timestamp(),
  `descripcion` text NOT NULL,
  `monto` int(11) NOT NULL DEFAULT -1,
  `estado` text NOT NULL DEFAULT 'pendiente',
  `id_historia_clinica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`id`, `fecha`, `descripcion`, `monto`, `estado`, `id_historia_clinica`) VALUES
(1, '30/6/2022', 'medicamentos', 300000, 'pendiente', 1);

-- --------------------------------------------------------

--
-- Table structure for table `historias_clinicas`
--

CREATE TABLE `historias_clinicas` (
  `id` int(11) NOT NULL,
  `fecha_ingreso` text NOT NULL DEFAULT current_timestamp(),
  `fecha_salida` text DEFAULT NULL,
  `diagnostico` text NOT NULL,
  `observaciones` text DEFAULT NULL,
  `tratamiento` text DEFAULT NULL,
  `no_documento_veterinario` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historias_clinicas`
--

INSERT INTO `historias_clinicas` (`id`, `fecha_ingreso`, `fecha_salida`, `diagnostico`, `observaciones`, `tratamiento`, `no_documento_veterinario`, `id_mascota`) VALUES
(1, '30/6/2022', '1/7/2022', 'demencia', 'sufre demencia', 'confinamiento preventivo', 84313518, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `especie` text NOT NULL,
  `raza` text NOT NULL,
  `fecha_nacimiento` text NOT NULL,
  `no_documento_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mascotas`
--

INSERT INTO `mascotas` (`id`, `nombre`, `especie`, `raza`, `fecha_nacimiento`, `no_documento_cliente`) VALUES
(1, 'Roski', 'Canino', 'labrador', '25/4/2015', 1553227773),
(2, 'Terremoto', 'Canino', '', '4/8/2010', 873235672),
(3, 'Tornado', 'Canino', 'bulldog', '13/9/213', 132690543),
(4, 'Pelusa', 'Felino', 'esfinge', '3/11/2017', 89765234),
(5, 'Garras', 'Felino', '', '21/12/2016', 87415131);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `password` text NOT NULL,
  `rol` text NOT NULL,
  `estado` text NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `rol`, `estado`) VALUES
(1, 'admin', 'admin', 'administrador', 'activo'),
(2, 'noesveterinario', 'admin', 'administrador', 'activo'),
(3, 'esveterinario', '12345', 'veterinario', 'activo'),
(4, 'Juan D', '12345', 'veterinario', 'activo'),
(5, 'skrillex', 'dubstep', 'veterinario', 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `veterinarios`
--

CREATE TABLE `veterinarios` (
  `no_documento` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `fecha_nacimiento` text NOT NULL,
  `telefono` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `especialidad` text NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veterinarios`
--

INSERT INTO `veterinarios` (`no_documento`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `direccion`, `especialidad`, `id_usuario`) VALUES
(9572691, 'Alejandro Diaz', '23/4/1976', '8537753724', 'esunvet@abc.com', 'cll 30-128', 'Inmunologo', 3),
(74246782, 'Juan Diaz', '21/7/1990', '9742227', 'juand@abc.com', 'rca 81-80', 'Otorrinonaringologo', 4),
(84313518, 'Esteban Quito', '31/12/1970', '953723672', 'dubstep@abc.com', 'cra 30-1', 'Traumatologo', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`no_documento`) USING BTREE;

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_historia_clinica` (`id_historia_clinica`);

--
-- Indexes for table `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `no_documento_veterinario` (`no_documento_veterinario`);

--
-- Indexes for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_documento_cliente` (`no_documento_cliente`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`) USING HASH;

--
-- Indexes for table `veterinarios`
--
ALTER TABLE `veterinarios`
  ADD PRIMARY KEY (`no_documento`) USING BTREE,
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_historia_clinica`) REFERENCES `historias_clinicas` (`id`);

--
-- Constraints for table `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  ADD CONSTRAINT `historias_clinicas_ibfk_1` FOREIGN KEY (`no_documento_veterinario`) REFERENCES `veterinarios` (`no_documento`),
  ADD CONSTRAINT `id_mascota` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id`);

--
-- Constraints for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`no_documento_cliente`) REFERENCES `clientes` (`no_documento`);

--
-- Constraints for table `veterinarios`
--
ALTER TABLE `veterinarios`
  ADD CONSTRAINT `veterinarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
