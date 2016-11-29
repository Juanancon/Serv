-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2016 a las 17:30:33
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdjobyesterday`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_oferta`
--

CREATE TABLE `tbl_oferta` (
  `Cod` int(11) NOT NULL,
  `descripcion` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `telefono` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `correo` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `direccion` varchar(60) CHARACTER SET latin1 NOT NULL,
  `poblacion` varchar(55) CHARACTER SET latin1 DEFAULT NULL,
  `CP` int(10) NOT NULL,
  `provincia` int(11) DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL,
  `fechatope` date DEFAULT NULL,
  `psicologo` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `seleccionado` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `otrosdatos` varchar(150) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_oferta`
--

INSERT INTO `tbl_oferta` (`Cod`, `descripcion`, `nombre`, `telefono`, `correo`, `direccion`, `poblacion`, `CP`, `provincia`, `estado`, `fechacreacion`, `fechatope`, `psicologo`, `seleccionado`, `otrosdatos`) VALUES
(21, 'Oferta ama casa', 'Juan', '611258987', 'a@a.com', 'C/ Trigueros', 'Monzon', 21005, 28, 'C', '2016-11-08', '1970-01-01', 'Psicologo', 'CANCELADA', 'CANCELADA'),
(37, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(38, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(40, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(42, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(43, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(45, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(46, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(47, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(48, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(49, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(53, 'Descripcion', 'Nombre', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos'),
(54, 'Hola', 'Juan', '611258987', 'a@a.com', 'C/ Trigueros', 'Palos', 21005, 14, 'P', '2016-11-09', '1970-01-01', 'Psicologo', 'Candidato', 'Otros datos');

--
-- Disparadores `tbl_oferta`
--

CREATE TRIGGER `tr_fechacrea` BEFORE INSERT ON `tbl_oferta` FOR EACH ROW SET new.fechacreacion = curdate();

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_provincias`
--

CREATE TABLE `tbl_provincias` (
  `cod` char(2) NOT NULL DEFAULT '00' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia',
  `comunidad_id` tinyint(4) NOT NULL COMMENT 'Código de la comunidad a la que pertenece'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';

--
-- Volcado de datos para la tabla `tbl_provincias`
--

INSERT INTO `tbl_provincias` (`cod`, `nombre`, `comunidad_id`) VALUES
('01', 'Alava', 16),
('02', 'Albacete', 7),
('03', 'Alicante', 10),
('04', 'Almera', 1),
('05', 'Avila', 8),
('06', 'Badajoz', 11),
('07', 'Balears (Illes)', 4),
('08', 'Barcelona', 9),
('09', 'Burgos', 8),
('10', 'Cáceres', 11),
('11', 'Cádiz', 1),
('12', 'Castellón', 10),
('13', 'Ciudad Real', 7),
('14', 'Córdoba', 1),
('15', 'Coruña (A)', 12),
('16', 'Cuenca', 7),
('17', 'Girondona', 9),
('18', 'Granada', 1),
('19', 'Guadalajara', 7),
('20', 'Guipzcoa', 16),
('21', 'Huelva', 1),
('22', 'Huesca', 2),
('23', 'Jaén', 1),
('24', 'León', 8),
('25', 'Lleida', 9),
('26', 'Rioja (La)', 17),
('27', 'Lugo', 12),
('28', 'Madrid', 13),
('29', 'Málaga', 1),
('30', 'Murcia', 14),
('31', 'Navarra', 15),
('32', 'Ourense', 12),
('33', 'Asturias', 3),
('34', 'Palencia', 8),
('35', 'Palmas (Las)', 5),
('36', 'Pontevedra', 12),
('37', 'Salamanca', 8),
('38', 'Santa Cruz de Tenerife', 5),
('39', 'Cantabria', 6),
('40', 'Segovia', 8),
('41', 'Sevilla', 1),
('42', 'Soria', 8),
('43', 'Tarragona', 9),
('44', 'Teruel', 2),
('45', 'Toledo', 7),
('46', 'Valencia', 10),
('47', 'Valladolid', 8),
('48', 'Vizcaya', 16),
('49', 'Zamora', 8),
('50', 'Zaragoza', 2),
('51', 'Ceuta', 18),
('52', 'Melilla', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `Cod` int(10) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipo` varchar(1) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`Cod`, `usuario`, `password`, `tipo`) VALUES
(2, 'admin', '1234', 'A'),
(3, 'juan', '1234', 'P'),
(4, 'Pedro', '763', 'P'),
(5, 'Pedro', '763', 'P'),
(6, 'miguel', 'perro', 'P'),
(10, 'admin', 'admin', 'P'),
(13, 'wqe', 'qweqwe', 'P'),
(14, 'sads<', 'asdasd', 'P'),
(15, 'sads<', 'asdasd', 'P'),
(16, 'asdasd', 'asdasdasd', 'P'),
(17, 'asdasd', 'asdasdasd', 'P'),
(18, 'asdasd', 'a', 'P'),
(19, 'asdasd', 'adasd', 'P'),
(20, 'dffdg', 'dfgggf', 'P'),
(22, 'admin', '1234', 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_oferta`
--
ALTER TABLE `tbl_oferta`
  ADD PRIMARY KEY (`Cod`);

--
-- Indices de la tabla `tbl_provincias`
--
ALTER TABLE `tbl_provincias`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `FK_ComunidadAutonomaProv` (`comunidad_id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`Cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_oferta`
--
ALTER TABLE `tbl_oferta`
  MODIFY `Cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `Cod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
