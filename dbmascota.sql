-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 01:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmascota`
--

-- --------------------------------------------------------

--
-- Table structure for table `afiliacion`
--

CREATE TABLE `afiliacion` (
  `id_afiliacion` int(11) NOT NULL,
  `fecha_afiliacion` datetime NOT NULL,
  `id_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `tipo_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id_estado`, `tipo_estado`) VALUES
(1, 'activo'),
(2, 'inactivo'),
(3, 'vacaciones'),
(4, 'saludable'),
(5, 'enfermo');

-- --------------------------------------------------------

--
-- Table structure for table `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipo_mascota` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `raza` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `id_usuario`, `id_tipo_mascota`, `nombre`, `raza`, `color`) VALUES
(8, 100015, 2, 'luna', 'criolla', 'negro amarillo'),
(9, 100015, 2, 'canela', 'criolla', 'negro amarillo'),
(10, 100015, 3, 'neron', 'doberman', 'negro'),
(11, 4444, 3, 'dodo', 'doberman', 'blanco'),
(12, 3456, 3, 'ggg', 'criolla', 'amarillo'),
(13, 1234, 3, 'aaa', 'doberman', 'blanco'),
(14, 3456, 4, 'lola', 'loro', 'rojo');

-- --------------------------------------------------------

--
-- Table structure for table `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_medicamentos` int(11) NOT NULL,
  `medicamentos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicamentos`
--

INSERT INTO `medicamentos` (`id_medicamentos`, `medicamentos`) VALUES
(1, 'canatox'),
(2, 'comfortis'),
(3, 'jabon asuntol');

-- --------------------------------------------------------

--
-- Table structure for table `receta`
--

CREATE TABLE `receta` (
  `id_receta` int(11) NOT NULL,
  `id_visita` int(11) NOT NULL,
  `id_medicamentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receta`
--

INSERT INTO `receta` (`id_receta`, `id_visita`, `id_medicamentos`) VALUES
(16, 20, 1),
(17, 26, 1),
(18, 27, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_mascota`
--

CREATE TABLE `tipo_mascota` (
  `id_tipo_mascota` int(11) NOT NULL,
  `tipo_mascota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo_mascota`
--

INSERT INTO `tipo_mascota` (`id_tipo_mascota`, `tipo_mascota`) VALUES
(2, 'gato'),
(3, 'perro'),
(4, 'ave');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'administrador'),
(2, 'veterinario'),
(5, 'propietario'),
(9, 'jefe');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `dirrecion` varchar(20) NOT NULL,
  `tarjeta_profesional` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `id_estado`, `password`, `identificacion`, `nombre`, `apellido`, `telefono`, `correo`, `dirrecion`, `tarjeta_profesional`) VALUES
(1, 1, 1, '0000', '4444', 'jorge', 'admin', '12345', 'correo@gmail.com', 'Av 100 cr 45 E', NULL),
(2, 2, 1, '0001', '3333', 'Alonso', 'Veterinario', '65432', 'veteri@gmail.com', 'cll 12 # 21 c sur', '10203'),
(100015, 5, 1, '00002', '3456', 'juan', 'vargas', '98976098', 'juan@gmail.com', 'calle 29#17', '0'),
(100016, 5, 1, '6666', '1234', 'samuel', 'caicedo', '0987654', 'samuel@gmail.com', 'ieiwie', '0'),
(100017, 5, 1, '4563', '4563', 'Pedro', 'pablo', '123478596', 'correo@correo.com', 'casa', '0'),
(100018, 5, 1, '8527', '7896', 'pablo', 'jimenez', '852', 'correo@correo.com', 'casa', '0'),
(100019, 5, 2, '8520', '8520', 'paula', 'navarro', '753', 'correo@correo.com', 'casa', '0'),
(100020, 5, 2, '963410', '410963', 'maria', 'fernanda', '783245', 'correo@correo.com', 'casa', '0'),
(100021, 2, 1, '159786423', '03158', 'sandra', 'pajaro', '852', 'correo@correo.com', 'casa', '785'),
(100022, 2, 1, '74029653', '74208563', 'natalie', 'jimenez', '753', 'correo@correo.com', 'casa', '857612');

-- --------------------------------------------------------

--
-- Table structure for table `visita`
--

CREATE TABLE `visita` (
  `id_visita` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `fecha_visita` datetime NOT NULL,
  `temperatura` varchar(20) NOT NULL,
  `peso` varchar(20) NOT NULL,
  `freq_respi` varchar(20) NOT NULL,
  `freq_cardi` varchar(20) NOT NULL,
  `estado_animo` varchar(20) NOT NULL,
  `recomendaciones` varchar(20) NOT NULL,
  `costo_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visita`
--

INSERT INTO `visita` (`id_visita`, `id_mascota`, `id_usuario`, `id_estado`, `fecha_visita`, `temperatura`, `peso`, `freq_respi`, `freq_cardi`, `estado_animo`, `recomendaciones`, `costo_visita`) VALUES
(20, 8, 100015, 4, '2022-09-26 00:00:00', '34°c', '12 kg', '70/min', '90/min', 'alegre', 'UHT0ÍJWRQU', 7573),
(21, 9, 100016, 4, '2022-09-27 00:00:00', '35°C', '12 kg', '80/min', '90/min', 'alegre', 'kijteieriw', 877),
(23, 9, 3333, 4, '2022-09-10 00:00:00', '39', '23', '23', '23', 'alegre', 'uhcy djbc', 657),
(24, 10, 3333, 4, '2022-09-28 00:00:00', '36°c', '20kg', '70/min', '90/min', 'alegre', 'udfowefñ', 2134),
(25, 12, 3333, 5, '2022-09-29 00:00:00', '25', '10', '45', '50', 'Feliz', 'Pasear diariamente', 150000),
(26, 14, 3333, 5, '2022-09-29 00:00:00', '45', '542', '21', '2145', '4545', '454', 0),
(27, 14, 3333, 4, '2022-09-27 00:00:00', '25', '42', '245', '452', '453', '789879', 7878978);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afiliacion`
--
ALTER TABLE `afiliacion`
  ADD PRIMARY KEY (`id_afiliacion`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `id_dueño` (`id_usuario`),
  ADD KEY `id_tipo_mascota` (`id_tipo_mascota`);

--
-- Indexes for table `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_medicamentos`);

--
-- Indexes for table `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id_receta`),
  ADD KEY `id_visita` (`id_visita`),
  ADD KEY `id_medicamentos` (`id_medicamentos`) USING BTREE;

--
-- Indexes for table `tipo_mascota`
--
ALTER TABLE `tipo_mascota`
  ADD PRIMARY KEY (`id_tipo_mascota`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id_visita`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_dueño` (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afiliacion`
--
ALTER TABLE `afiliacion`
  MODIFY `id_afiliacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_medicamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receta`
--
ALTER TABLE `receta`
  MODIFY `id_receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tipo_mascota`
--
ALTER TABLE `tipo_mascota`
  MODIFY `id_tipo_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100023;

--
-- AUTO_INCREMENT for table `visita`
--
ALTER TABLE `visita`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `afiliacion`
--
ALTER TABLE `afiliacion`
  ADD CONSTRAINT `afiliacion_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`);

--
-- Constraints for table `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_2` FOREIGN KEY (`id_tipo_mascota`) REFERENCES `tipo_mascota` (`id_tipo_mascota`);

--
-- Constraints for table `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`id_visita`) REFERENCES `visita` (`id_visita`),
  ADD CONSTRAINT `receta_ibfk_2` FOREIGN KEY (`id_medicamentos`) REFERENCES `medicamentos` (`id_medicamentos`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Constraints for table `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`),
  ADD CONSTRAINT `visita_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
