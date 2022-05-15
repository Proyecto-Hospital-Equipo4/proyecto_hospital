-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2022 a las 08:53:05
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `CURP_paciente` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CURP_medico` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `Codigo_cita` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`CURP_paciente`, `CURP_medico`, `fecha`, `hora`, `Codigo_cita`) VALUES
('GUCAJ021122MJCRPB8', 'HEBS901223MRTUVWA9', '2022-05-12', '15:00:00', 1),
('GUCAJ021122MJCRPB8', 'HEBS901223MRTUVWA9', '2022-05-10', '12:40:00', 3),
('MALS021122HJCRPBA8', 'HEBS901223MRTUVWA9', '2022-05-13', '16:00:00', 4),
('GUCAJ021122MJCRPB8', 'HEBS901223MRTUVWA9', '2022-05-17', '16:00:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `Num_expediente` bigint(15) NOT NULL,
  `Fecha_observacion` date NOT NULL,
  `Hora` time NOT NULL,
  `Observacion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_medico` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`Num_expediente`, `Fecha_observacion`, `Hora`, `Observacion`, `Nombre_medico`) VALUES
(1, '2022-05-15', '00:58:00', 'Presenta molestias abdominales, mareos y sangrados nasales.', 'Susana Hernández Barba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `Nombre_paciente` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CURP` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Domicilio_paciente` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_contacto` bigint(15) NOT NULL,
  `Sexo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Edad` int(3) NOT NULL,
  `Num_expediente` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`Nombre_paciente`, `CURP`, `Domicilio_paciente`, `Telefono_contacto`, `Sexo`, `Edad`, `Num_expediente`) VALUES
('Ana Jazmín Guerrero Carlos', 'GUCAJ021122MJCRPB8', 'Antonio Rosales 209, Analco, 44450 Guadalajara, Jal.', 3320302203, 'Femenino', 19, 1),
('Sebastián Martínez López', 'MALS021122HJCRPBA8', 'Monte Alban, Rey Sayil, 45402 Tonalá, Jalisco', 3320302203, 'Masculino', 19, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `CURP` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Domicilio` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Especialidad` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_contacto` bigint(15) NOT NULL,
  `Fecha_contratacion` date NOT NULL,
  `Sexo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`CURP`, `Domicilio`, `Nombre`, `Especialidad`, `Telefono_contacto`, `Fecha_contratacion`, `Sexo`, `Edad`) VALUES
('DIAPE840510MKOSDO2', 'Real de Los Abetos 840, Camichines, 45527 San Pedro Tlaquepaque, Jal.', 'Paola Elizabeth Días Aceves', 'Pediatría', 3317170013, '2008-08-01', 'Femenino', 38),
('GOLCE010728MJYQWF5', 'Av Francisco Silva Romero 384, Lomas de Tlaquepaque, 45500 San Pedro Tlaquepaque, Jal.', 'Claudia Elizabeth Gómez López', 'Reumatología', 3315729512, '2019-03-10', 'Femenino', 20),
('HEBS901223MRTUVWA9', 'Av. de las Torres 730, Nueva Central Camionera, 45580 San Pedro Tlaquepaque, Jal.', 'Susana Hernández Barba', 'Nutriología', 3309114518, '2022-05-01', 'Femenino', 31),
('MEAC740911MLOPDFF9', 'C. Cabañas 209, Quintero, 45550 San Pedro Tlaquepaque, Jal.', 'Cristofer Meneses Arriola', 'Cardiología', 3319876512, '1997-12-31', 'Masculino', 47),
('RALJF940208HMSDSN1', 'Av. Patria 154, Paseos del valle, 45403 Tonalá, Jal.', 'Josué Francisco Ramírez Lugo', 'Gastroenterología', 3312239124, '2010-02-12', 'Masculino', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `Nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CURP` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Domicilio` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_contacto` bigint(20) NOT NULL,
  `Sexo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Edad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`Nombre`, `CURP`, `Domicilio`, `Telefono_contacto`, `Sexo`, `Edad`) VALUES
('Ana Jazmín Guerrero Carlos', 'GUCAJ021122MJCRPB8', 'Antonio Rosales 209, Analco, 44450 Guadalajara, Jal.', 3320302203, 'Femenino', 19),
('Sebastián Martínez López', 'MALS021122HJCRPBA8', 'Monte Alban, Rey Sayil, 45402 Tonalá, Jalisco', 3320302203, 'Masculino', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionista`
--

CREATE TABLE `recepcionista` (
  `CURP` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Domicilio` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_contacto` bigint(20) NOT NULL,
  `Fecha_contratacion` date NOT NULL,
  `Sexo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Edad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recepcionista`
--

INSERT INTO `recepcionista` (`CURP`, `Nombre`, `Domicilio`, `Telefono_contacto`, `Fecha_contratacion`, `Sexo`, `Edad`) VALUES
('MECB911013HKSIDSD9', 'Beatriz Medina Chicuate', 'Av. Juan Gil Preciado, Basilio Badillo, 45409 Guadalajara, Jal.', 3365132203, '2022-05-14', 'Femenino', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador'),
(2, 'recepcionista'),
(3, 'medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `idUsuario` int(10) NOT NULL,
  `Nombre_usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `rol_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`idUsuario`, `Nombre_usuario`, `Password`, `rol_id`) VALUES
(1, 'admin', '1234', 1),
(2, 'recepcionista', '1234', 2),
(3, 'HEBS901223MRTUVWA9', '$2y$10$wg/VrrZ8sW9a/NbtHBySPemGILwSvbiQwF1obEm.9qijAQQqy3JYi', 3),
(4, 'RALJF940208HMSDSN1', '$2y$10$sRwbp.JUIo/4onn6cyItQe8aXMUTzFd073xQVD5iNMSJ0qyv42SDy', 3),
(5, 'DIAPE840510MKOSDO2', '$2y$10$yDSLNP3IM8mn3QfU9OKY9.Pnr.11wVYZwgXGqr9oOfIRL/RPnoHx.', 3),
(6, 'GOLCE010728MJYQWF5', '$2y$10$8EP7o.X2hMiElgWaEQN8f.Cde4lU1.Tvqp0Fi8TMWFF3.Lqjdyll.', 3),
(7, 'MEAC740911MLOPDFF9', '$2y$10$eMbPOaeXpN72G5RyBpIVpevRSFgf/SemmVq8t51FkJRxwn.x3/O9a', 3),
(8, 'MECB911013HKSIDSD9', '$2y$10$UhRrscqujG3HEJCLLuTC2.NYlB50sPk/OFrueC7R1ioI5q94N8XHi', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Codigo_cita`),
  ADD KEY `curpmedico` (`CURP_medico`),
  ADD KEY `curppaciente` (`CURP_paciente`);

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD KEY `numexpediente` (`Num_expediente`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`Num_expediente`),
  ADD KEY `RCURP` (`CURP`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`CURP`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`CURP`);

--
-- Indices de la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD PRIMARY KEY (`CURP`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `roles_id` (`rol_id`),
  ADD KEY `sesionrecep` (`Nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `Codigo_cita` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `Num_expediente` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `curpmedico` FOREIGN KEY (`CURP_medico`) REFERENCES `medico` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curppaciente` FOREIGN KEY (`CURP_paciente`) REFERENCES `paciente` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `numexpediente` FOREIGN KEY (`Num_expediente`) REFERENCES `expediente` (`Num_expediente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `RCURP` FOREIGN KEY (`CURP`) REFERENCES `paciente` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `roles_id` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
