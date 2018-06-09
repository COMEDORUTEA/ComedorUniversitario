-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-06-2018 a las 23:29:44
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdcu`
--
CREATE DATABASE IF NOT EXISTS `bdcu` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bdcu`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `codigo_alumno` varchar(50) NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `nombres` varchar(200) DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `carrera_profesional` varchar(200) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `FECHA_REGISTRO` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codigo_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`codigo_alumno`, `dni`, `nombres`, `apellidos`, `carrera_profesional`, `sexo`, `estado`, `FECHA_REGISTRO`) VALUES
('200920397F', '47583287', 'Belcy', 'Pancorbo Monzon', 'ING AMBIENTAL R.N', 'Femenino', '0', '2018-06-08 23:37:03'),
('200920397R', '47583284', 'juan', 'Torres Bazan', 'ESTOMATOLOGIA', 'Masculino', '1', '2018-06-09 00:20:38'),
('201120501J', '45379716', 'ruben', 'Torres Bazan', 'ING DE SISTEMAS E INFORMATICA', 'Masculino', '0', '2018-06-09 09:58:57'),
('201120503M', '47583289', 'Luis', 'Pancorbo Torres', 'CONTABILIDAD', 'Masculino', '0', '2018-06-09 10:07:27'),
('201120903H', '85471555', 'Lili', 'sequeiros bracamonte', 'EDUCACION', 'Femenino', '0', '2018-06-09 16:21:59'),
('201128503M', '45874587', 'Lucas', 'Hoyola Hinostroza', 'AGRONOMIA', 'Masculino', '0', '2018-06-09 16:42:08'),
('201220102k', '12448885', 'Leonel', 'Mesi', 'EDUCACION', 'Masculino', '0', '2018-06-09 17:42:25'),
('201220102O', '25488966', 'Julia', 'sequeiros aymara', 'AGRONOMIA', 'Femenino', '0', '2018-06-09 16:20:01'),
('201220102P', '54896325', 'Leydy Sharumi', 'Torres Bazan', 'ESTOMATOLOGIA', 'Femenino', '0', '2018-06-09 10:09:32'),
('201320102J', '25634587', 'Victor', 'Pancorbo Torres', 'DERECHO', 'Masculino', '0', '2018-06-09 17:00:24'),
('201320505G', '42584566', 'Mary', 'Pancorbo Monzon', 'ING CIVIL', 'Femenino', '0', '2018-06-09 10:08:19'),
('254867888F', '4852369', 'Wili', 'sequeiros aymara', 'ING DE SISTEMAS E INFORMATICA', 'Masculino', '0', '2018-06-09 15:04:29'),
('741852962l', '12345677', 'luz maria', 'castro pancorbo', 'ENFERMERIA', 'Femenino', '0', '2018-06-09 17:57:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_alumno` varchar(50) DEFAULT NULL,
  `fecha_Registro` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_asistencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `codigo_alumno`, `fecha_Registro`) VALUES
(39, '201220102P', '2018-06-07'),
(40, '254867888F', '2018-06-07'),
(41, '201320505G', '2018-06-05'),
(42, '201120503M', '2018-06-06'),
(43, '201220102O', '2018-06-05'),
(44, '201120903H', '2018-06-05'),
(45, '201128503M', '2018-06-08'),
(46, '201320102J', '2018-06-07'),
(48, '201220102k', '2018-06-10'),
(49, '741852962l', '2018-06-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_sistema`
--

CREATE TABLE IF NOT EXISTS `menu_sistema` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) NOT NULL,
  `IMAGEN` varchar(50) NOT NULL DEFAULT 'imagenes/not_found.png',
  `URL` varchar(50) DEFAULT NULL,
  `ORDENAMIENTO` int(11) NOT NULL DEFAULT '0',
  `ESTATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `menu_sistema`
--

INSERT INTO `menu_sistema` (`ID`, `DESCRIPCION`, `IMAGEN`, `URL`, `ORDENAMIENTO`, `ESTATUS`) VALUES
(1, 'Inicio', 'imagenes/Customer.png', '#', 1, 0),
(2, 'Agregar Usuarios', 'imagen/Customer.png', 'usuarios/nuevo', 2, 0),
(3, 'Listar Usuarios', 'imagenes/Product.png', 'usuarios', 3, 0),
(4, 'Agregar Alumnos', 'imagenes/not_found.png', 'alumnos/nuevo', 4, 0),
(5, 'Listar Alumnos', 'imagenes/not_found.png', 'alumnos', 5, 0),
(6, 'Agregar Asistencia', 'imagenes/not_found.png', 'asistencia/nuevo', 6, 0),
(7, 'Listar Asistencia', 'imagenes/not_found.png', 'asistencia', 7, 0),
(8, 'Reportes', 'imagenes/not_found.png', 'reportes', 8, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisosmenu`
--

CREATE TABLE IF NOT EXISTS `permisosmenu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `permisosmenu`
--

INSERT INTO `permisosmenu` (`ID`, `ID_USUARIO`, `ID_MENU`, `ESTATUS`) VALUES
(1, 3, 1, 0),
(2, 3, 3, 0),
(3, 3, 2, 0),
(4, 3, 4, 1),
(5, 3, 5, 1),
(6, 3, 6, 1),
(7, 3, 7, 1),
(8, 3, 8, 1),
(9, 4, 1, 1),
(10, 4, 2, 1),
(11, 4, 3, 1),
(12, 4, 4, 1),
(13, 4, 5, 1),
(14, 4, 6, 1),
(15, 4, 7, 0),
(16, 4, 8, 0),
(17, 5, 1, 0),
(18, 5, 3, 1),
(19, 5, 5, 1),
(20, 5, 7, 1),
(21, 5, 8, 1),
(22, 5, 2, 0),
(23, 1, 3, 0),
(24, 1, 1, 0),
(25, 1, 2, 0),
(26, 1, 4, 0),
(27, 1, 5, 0),
(28, 1, 6, 0),
(29, 1, 7, 0),
(30, 1, 8, 0),
(31, 2, 1, 0),
(32, 2, 2, 0),
(33, 2, 3, 0),
(34, 2, 4, 0),
(35, 2, 5, 0),
(36, 2, 6, 0),
(37, 2, 7, 0),
(38, 2, 8, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `FECHA_REGISTRO` varchar(20) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT '0',
  `TIPO` varchar(20) NOT NULL DEFAULT 'Invitado',
  `PASSWORD` varchar(50) DEFAULT '123',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOMBRE`, `APELLIDOS`, `EMAIL`, `FECHA_REGISTRO`, `ESTATUS`, `TIPO`, `PASSWORD`) VALUES
(1, 'Ruben', 'Torres Bazan', 'rubentorresbazan@gmail.com', '2018-06-09 00:34:55', 0, 'Administrador', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Belcy', 'Pancorbo Monzon', 'belcy@gmail.com', '2018-06-09 09:38:47', 0, 'Administrador', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Luz Marina', 'Torres Bazan', 'luz@gmail.com', '2018-06-09 09:39:46', 0, 'Invitado', '123'),
(4, 'mario', 'rosas', 'maria@gmail.com', '2018-06-09 17:54:15', 0, 'Administrador', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
