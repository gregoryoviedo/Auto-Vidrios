-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2020 a las 19:03:25
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `auto_vidrios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` double NOT NULL,
  `correo` varchar(185) COLLATE utf8_unicode_ci NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `idusuario`, `cedula`, `nombre`, `apellido`, `telefono`, `correo`, `creacion`, `rol`, `password`, `foto`, `foto_url`) VALUES
(1, 'Gregory', 26594451, 'Gregory Alejandro', 'Oviedo Morantes', 4147114752, 'omalejandro7@hotmail.com', '2020-11-12 20:08:52', 'administrador', '$2y$10$nkUp6Ku/TDm3C6ApM0pxDOtuvpGtJyb1Mmln7P97u4U3KqPelbCKG', 'GregoryFoto.png', '../../frontend/files/usuarios/GregoryFoto.png');

--
-- Disparadores `administradores`
--
DELIMITER $$
CREATE TRIGGER `agregar_admin` BEFORE INSERT ON `administradores` FOR EACH ROW INSERT INTO `auditorias_administrador`(`idusuario`, `accion`, `modificado`) VALUES (new.idusuario,'se ha REGISTRADO de la tabla ADMINISTRADORES',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editar_admin` BEFORE UPDATE ON `administradores` FOR EACH ROW INSERT INTO `auditorias_administrador`(`idusuario`, `accion`, `modificado`) VALUES (new.idusuario,'se ha ACTUALIZADO de la tabla ADMINISTRADORES',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminar_admin` AFTER DELETE ON `administradores` FOR EACH ROW INSERT INTO `auditorias_administrador`(`idusuario`, `accion`, `modificado`) VALUES (old.idusuario,'se ha ELIMINADO de la tabla ADMINISTRADORES',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditorias_administrador`
--

CREATE TABLE `auditorias_administrador` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `accion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auditorias_administrador`
--

INSERT INTO `auditorias_administrador` (`id`, `idusuario`, `accion`, `modificado`) VALUES
(1, 'asdsad', 'se ha REGISTRADO de la tabla ADMINISTRADORES', '2020-11-28 08:06:37'),
(2, 'asdsadljksfjfslkfds', 'se ha ACTUALIZADO de la tabla ADMINISTRADORES', '2020-11-28 08:06:55'),
(3, 'asdsadljksfjfslkfds', 'se ha ELIMINADO de la tabla ADMINISTRADORES', '2020-11-28 08:07:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditorias_atencion`
--

CREATE TABLE `auditorias_atencion` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `accion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auditorias_atencion`
--

INSERT INTO `auditorias_atencion` (`id`, `idusuario`, `accion`, `modificado`) VALUES
(1, 'ejemoo', 'se ha ELIMIADO el PEDIDO de la tabla PEDIDOS', '2020-11-28 08:09:08'),
(2, 'Jesus', 'se ha ELIMINADO la CITA de la tabla HORARIOS', '2020-11-28 08:55:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditorias_catalogo`
--

CREATE TABLE `auditorias_catalogo` (
  `id` int(11) NOT NULL,
  `catalogo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `accion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auditorias_catalogo`
--

INSERT INTO `auditorias_catalogo` (`id`, `catalogo`, `accion`, `modificado`) VALUES
(1, 'dsf', 'se ha REGISTRADO de la tabla SERVICIOS', '2020-11-28 08:12:43'),
(2, 'dsfasdsads', 'se ha ACTUALIZADO de la tabla SERVICIOS', '2020-11-28 08:13:17'),
(3, 'dsfasdsads', 'se ha ELIMINADO de la tabla SERVICIOS', '2020-11-28 08:13:21'),
(4, 'patatas fritas', 'se ha ELIMINADO de la tabla PRODUCTOS', '2020-11-28 08:14:12'),
(5, 'patatas fritas', 'se ha REGISTRADO en la tabla PRODUCTOS', '2020-11-28 08:14:12'),
(6, 'patatas fritas', 'se ha ELIMINADO de la tabla PRODUCTOS', '2020-11-28 08:14:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditorias_clientes`
--

CREATE TABLE `auditorias_clientes` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `accion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auditorias_clientes`
--

INSERT INTO `auditorias_clientes` (`id`, `idusuario`, `accion`, `modificado`) VALUES
(18, 'asdas', 'se ha REGISTRADO en la tabla CLIENTES', '2020-11-28 08:53:03'),
(19, 'asdas', 'se ha ACTUALIZADO de la tabla CLIENTES', '2020-11-28 08:53:14'),
(20, 'asdas', 'se ha ELIMINADO de la tabla CLIENTES', '2020-11-28 08:54:11'),
(21, 'ejemoo', 'se ha ELIMINADO de la tabla CLIENTES', '2020-11-28 08:54:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditorias_economia`
--

CREATE TABLE `auditorias_economia` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `accion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auditorias_economia`
--

INSERT INTO `auditorias_economia` (`id`, `idusuario`, `accion`, `modificado`) VALUES
(1, 'Gregory', 'ha REGISTRADO de la tabla INGRESOS', '2020-11-28 08:15:08'),
(2, 'Gregory', 'ha ACTUALIZADO de la tabla INGRESOS', '2020-11-28 08:15:21'),
(3, 'Gregory', 'ha ELIMINADO de la tabla INGRESOS', '2020-11-28 08:15:25'),
(4, 'Gregory', 'ha REGISTRADO en la tabla EGRESOS', '2020-11-28 08:15:40'),
(5, 'Gregory', 'ha ACTUALIZADO de la tabla EGRESOS', '2020-11-28 08:15:49'),
(6, 'Gregory', 'ha ELIMINADO de la tabla EGRESOS', '2020-11-28 08:15:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditorias_empleados`
--

CREATE TABLE `auditorias_empleados` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `accion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auditorias_empleados`
--

INSERT INTO `auditorias_empleados` (`id`, `idusuario`, `accion`, `modificado`) VALUES
(1, 'asdsad', 'se ha REGISTRADO de la tabla EMPLEADOS', '2020-11-28 08:07:44'),
(2, 'asdsadsfsdfsdf', 'se ha ACTUALIZADO de la tabla EMPLEADO', '2020-11-28 08:08:02'),
(3, 'asdsadsfsdfsdf', 'se ha ELIMINADO de la tabla EMPLEADOS', '2020-11-28 08:08:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` double NOT NULL,
  `day` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `idusuario`, `cedula`, `nombre`, `apellido`, `correo`, `telefono`, `day`, `month`, `year`, `sexo`, `creacion`, `password`, `rol`, `foto`, `foto_url`) VALUES
(1, 'Jesus', 26123698, 'Josman Jesus', 'Moncada Torres', 'jesus@gmail.com', 4144649984, '20', 'Julio', '1997', 'Masculino', '2020-11-12 20:06:32', '$2y$10$7A4XimRoffItPSlkb3L14e6Zwa8VIwHlPOxs0ZLCBdEWv9uZBgBae', 'cliente', 'FotoJesus.png', '../../frontend/files/usuarios/FotoJesus.png'),
(2, 'Jeff', 26987412, 'Jeffrey Rafael', 'Caceres Benitez', 'jeffreycaceres@gmail.com', 4142370048, '8', 'Diciembre', '1998', 'Masculino', '2020-11-12 20:12:16', '$2y$10$VYeeT1Sa1Ror93AO7ok3ru/9xOXQanhGQAutQJQsDYTR0rpCl.rrK', 'cliente', 'FotoJeffrey.png', '../../frontend/files/usuarios/FotoJeffrey.png');

--
-- Disparadores `clientes`
--
DELIMITER $$
CREATE TRIGGER `auditoria_cliente_agregar` AFTER INSERT ON `clientes` FOR EACH ROW INSERT INTO `auditorias_clientes`(`idusuario`, `accion`, `modificado`) VALUES (new.idusuario,'se ha REGISTRADO en la tabla CLIENTES',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `auditoria_cliente_editar` BEFORE UPDATE ON `clientes` FOR EACH ROW INSERT INTO `auditorias_clientes`(`idusuario`, `accion`, `modificado`) VALUES (new.idusuario,'se ha ACTUALIZADO de la tabla CLIENTES',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `auditoria_cliente_eliminar` AFTER DELETE ON `clientes` FOR EACH ROW INSERT INTO `auditorias_clientes`(`idusuario`, `accion`, `modificado`) VALUES (old.idusuario,'se ha ELIMINADO de la tabla CLIENTES',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `idusuario`, `foto_url`, `comentario`, `fecha`) VALUES
(1, 'Jesus', '../../frontend/files/usuarios/FotoJesus.png', 'primer comentario y editado', '2020-11-23 22:20:22'),
(2, 'Jeff', '../../frontend/files/usuarios/FotoJeffrey.png', 'segundo comentario.', '2020-11-12 20:21:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactanos`
--

CREATE TABLE `contactanos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `asunto` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `idusuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `material` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` double NOT NULL,
  `cantidad_original` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`id`, `id_material`, `idusuario`, `fecha`, `material`, `cantidad`, `cantidad_original`) VALUES
(5, 4, 'Gregory', '2020-11-28 03:31:13', 'pivotes', 40, 150);

--
-- Disparadores `egresos`
--
DELIMITER $$
CREATE TRIGGER `agregar_egreso` BEFORE INSERT ON `egresos` FOR EACH ROW INSERT INTO `auditorias_economia`(`idusuario`, `accion`, `modificado`) VALUES (new.idusuario,'ha REGISTRADO en la tabla EGRESOS',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editar_egreso` BEFORE UPDATE ON `egresos` FOR EACH ROW INSERT INTO `auditorias_economia`(`idusuario`, `accion`, `modificado`) VALUES (new.idusuario,'ha ACTUALIZADO de la tabla EGRESOS',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminar_egreso` AFTER DELETE ON `egresos` FOR EACH ROW INSERT INTO `auditorias_economia`(`idusuario`, `accion`, `modificado`) VALUES (old.idusuario,'ha ELIMINADO de la tabla EGRESOS',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` double NOT NULL,
  `correo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `rif` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `idusuario`, `cedula`, `nombre`, `apellido`, `telefono`, `correo`, `rif`, `creacion`, `rol`, `password`, `foto`, `foto_url`) VALUES
(3, 'Kevin', 28461247, 'Kevin Alberto', 'Reyes Ramirez', 4144569874, 'kevin_nieto@gmail.com', '2020114D11444', '2020-11-14 04:13:51', 'empleado', '$2y$10$HOcngeRewhlPCkmSnqGOIuaodDzYThGEVeCjPCcXA4BQxg.4aMM3K', 'Kevin_empleado.png', '../../frontend/files/usuarios/Kevin_empleado.png'),
(4, 'Nelson', 19489123, 'Nelson Josue', 'Caceres Perez', 4264549888, 'nelson@gmail.com', '12220201148766', '2020-11-14 06:57:25', 'empleado', '$2y$10$DdqBFTquHnuNJiWh.6mDAOCbuE0fZjulDdG5UoviwrNZajjkZNro2', 'profile-1.jpg', '../../frontend/files/usuarios/profile-1.jpg');

--
-- Disparadores `empleados`
--
DELIMITER $$
CREATE TRIGGER `agregar_empleado` BEFORE INSERT ON `empleados` FOR EACH ROW INSERT INTO `auditorias_empleados`(`idusuario`, `accion`, `modificado`) VALUES (new.idusuario,'se ha REGISTRADO de la tabla EMPLEADOS',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editar_empleado` BEFORE UPDATE ON `empleados` FOR EACH ROW INSERT INTO `auditorias_empleados`(`idusuario`, `accion`, `modificado`) VALUES (new.idusuario,'se ha ACTUALIZADO de la tabla EMPLEADO',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminar_empleado` AFTER DELETE ON `empleados` FOR EACH ROW INSERT INTO `auditorias_empleados`(`idusuario`, `accion`, `modificado`) VALUES (old.idusuario,'se ha ELIMINADO de la tabla EMPLEADOS',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `servicio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empleado` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `idusuario`, `servicio`, `fecha`, `hora`, `empleado`) VALUES
(21, 'Jesus', 'dsfdsfsd', '0000-00-00', 'sdfsdf', 'Kevin');

--
-- Disparadores `horarios`
--
DELIMITER $$
CREATE TRIGGER `eliminar_cita` AFTER DELETE ON `horarios` FOR EACH ROW INSERT INTO `auditorias_atencion`(`idusuario`, `accion`, `modificado`) VALUES (old.idusuario,'se ha ELIMINADO la CITA de la tabla HORARIOS',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `empleado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `servicio` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `cliente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id`, `idusuario`, `fecha`, `empleado`, `servicio`, `descripcion`, `cliente`, `monto`) VALUES
(8, 'Gregory', '2020-11-15 01:25:38', 'Kevin', 'Cremalleras Manual', 'Rollo de papel ahumado', 'carlos mariano', 450000),
(9, 'Gregory', '2020-11-27 20:44:43', 'Nelson', 'Cremalleras Manual', 'Rollo de papel', 'carlos', 50000);

--
-- Disparadores `ingresos`
--
DELIMITER $$
CREATE TRIGGER `agregar_ingreso` BEFORE INSERT ON `ingresos` FOR EACH ROW INSERT INTO `auditorias_economia`(`idusuario`, `accion`, `modificado`) VALUES (new.idusuario,'ha REGISTRADO de la tabla INGRESOS',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editar_ingreso` BEFORE UPDATE ON `ingresos` FOR EACH ROW INSERT INTO `auditorias_economia`(`idusuario`, `accion`, `modificado`) VALUES (new.idusuario,'ha ACTUALIZADO de la tabla INGRESOS',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminar_ingreso` AFTER DELETE ON `ingresos` FOR EACH ROW INSERT INTO `auditorias_economia`(`idusuario`, `accion`, `modificado`) VALUES (old.idusuario,'ha ELIMINADO de la tabla INGRESOS',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idingreso` int(11) NOT NULL,
  `idusuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inicio` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idingreso`, `idusuario`, `inicio`, `estado`, `rol`) VALUES
(1, 'Jesus', '2020-11-28 05:26:46', 'A iniciado sesion', 'cliente'),
(2, 'Jesus', '2020-11-28 05:26:49', 'A cerrado sesion', 'cliente'),
(3, 'Gregory', '2020-11-28 05:28:36', 'A iniciado sesion', 'administrador'),
(4, 'Gregory', '2020-11-28 05:52:21', 'A cerrado sesion', 'administrador'),
(5, 'Gregory', '2020-11-28 05:52:25', 'A iniciado sesion', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id` int(11) NOT NULL,
  `material` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id`, `material`, `cantidad`, `foto`, `foto_url`) VALUES
(4, 'pivotes', 150, 'pivotes2.jpg', '../../frontend/files/materiales/pivotes2.jpg'),
(5, 'Guaya', 500, 'FondoGuaya.png', '../../frontend/files/materiales/FondoGuaya.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `idusuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `idusuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `producto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_original` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` double NOT NULL,
  `busqueda` date NOT NULL,
  `solicitado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_producto`, `idusuario`, `producto`, `foto_url`, `cantidad_original`, `cantidad`, `total`, `busqueda`, `solicitado`) VALUES
(16, 1, 'Jesus', 'Papel Ahumado', '../../frontend/files/usuarios/FotoJesus.png', 30, 2, 160000, '2020-11-19', '2020-11-25 00:45:38');

--
-- Disparadores `pedidos`
--
DELIMITER $$
CREATE TRIGGER `eliminar_pedido` AFTER DELETE ON `pedidos` FOR EACH ROW INSERT INTO `auditorias_atencion`(`idusuario`, `accion`, `modificado`) VALUES (old.idusuario,'se ha ELIMIADO el PEDIDO de la tabla PEDIDOS',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `producto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `producto`, `descripcion`, `precio`, `cantidad`, `foto`, `foto_url`) VALUES
(1, 'Papel Ahumado', 'Rollo de papel ahumado para los vidrios laterales de tu carro', 80000, 30, 'RolloDePapelAhumado.jpg', '../../frontend/files/productos/RolloDePapelAhumado.jpg'),
(2, 'Vidrios', 'Parabrisas frontales y traseros, y laterales, los necesarios para tu carro', 150000, 50, 'Parabrisas.png', '../../frontend/files/productos/Parabrisas.png');

--
-- Disparadores `productos`
--
DELIMITER $$
CREATE TRIGGER `agregar_producto` BEFORE INSERT ON `productos` FOR EACH ROW INSERT INTO `auditorias_catalogo`(`catalogo`, `accion`, `modificado`) VALUES (new.producto,'se ha REGISTRADO en la tabla PRODUCTOS',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editar_producto` BEFORE INSERT ON `productos` FOR EACH ROW INSERT INTO `auditorias_catalogo`(`catalogo`, `accion`, `modificado`) VALUES (new.producto,'se ha ELIMINADO de la tabla PRODUCTOS',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminar_producto` AFTER DELETE ON `productos` FOR EACH ROW INSERT INTO `auditorias_catalogo`(`catalogo`, `accion`, `modificado`) VALUES (old.producto,'se ha ELIMINADO de la tabla PRODUCTOS',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `servicio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `servicio`, `descripcion`, `precio`, `foto`, `foto_url`) VALUES
(4, 'Cremalleras Manual', 'Cremalleras de tipo manual para el funcionamiento de tu vidrios', 150000, 'cremallera.jpg', '../../frontend/files/servicios/cremallera.jpg'),
(5, 'Gomas', 'Gomas para el soporte de tus parabrisas y vidrios laterales', 90000, 'GomaEnTira.png', '../../frontend/files/servicios/GomaEnTira.png');

--
-- Disparadores `servicios`
--
DELIMITER $$
CREATE TRIGGER `agregar_servicio` BEFORE INSERT ON `servicios` FOR EACH ROW INSERT INTO `auditorias_catalogo`(`catalogo`, `accion`, `modificado`) VALUES (new.servicio,'se ha REGISTRADO de la tabla SERVICIOS',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editar_servicio` BEFORE UPDATE ON `servicios` FOR EACH ROW INSERT INTO `auditorias_catalogo`(`catalogo`, `accion`, `modificado`) VALUES (new.servicio,'se ha ACTUALIZADO de la tabla SERVICIOS',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminar_servicio` AFTER DELETE ON `servicios` FOR EACH ROW INSERT INTO `auditorias_catalogo`(`catalogo`, `accion`, `modificado`) VALUES (old.servicio,'se ha ELIMINADO de la tabla SERVICIOS',now())
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `auditorias_administrador`
--
ALTER TABLE `auditorias_administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auditorias_atencion`
--
ALTER TABLE `auditorias_atencion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auditorias_catalogo`
--
ALTER TABLE `auditorias_catalogo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auditorias_clientes`
--
ALTER TABLE `auditorias_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `auditorias_economia`
--
ALTER TABLE `auditorias_economia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auditorias_empleados`
--
ALTER TABLE `auditorias_empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `rol` (`rol`),
  ADD KEY `foto_url` (`foto_url`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `foto_url` (`foto_url`);

--
-- Indices de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `material` (`material`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `cantidad_original` (`cantidad_original`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `rol` (`rol`),
  ADD KEY `foto_url` (`foto_url`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `apellido` (`apellido`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `empleado` (`empleado`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `servicio` (`servicio`),
  ADD KEY `empleado` (`empleado`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idingreso`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material` (`material`),
  ADD KEY `cantidad` (`cantidad`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `producto` (`producto`),
  ADD KEY `foto_url` (`foto_url`),
  ADD KEY `cantidad_original` (`cantidad_original`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto` (`producto`),
  ADD KEY `cantidad` (`cantidad`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicio` (`servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `auditorias_administrador`
--
ALTER TABLE `auditorias_administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `auditorias_atencion`
--
ALTER TABLE `auditorias_atencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `auditorias_catalogo`
--
ALTER TABLE `auditorias_catalogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `auditorias_clientes`
--
ALTER TABLE `auditorias_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `auditorias_economia`
--
ALTER TABLE `auditorias_economia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `auditorias_empleados`
--
ALTER TABLE `auditorias_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `clientes` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`foto_url`) REFERENCES `clientes` (`foto_url`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD CONSTRAINT `egresos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `administradores` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `egresos_ibfk_2` FOREIGN KEY (`material`) REFERENCES `materiales` (`material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `egresos_ibfk_3` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `egresos_ibfk_4` FOREIGN KEY (`cantidad_original`) REFERENCES `materiales` (`cantidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horarios_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `clientes` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `administradores` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingresos_ibfk_2` FOREIGN KEY (`servicio`) REFERENCES `servicios` (`servicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingresos_ibfk_3` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `clientes` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `clientes` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`foto_url`) REFERENCES `clientes` (`foto_url`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`cantidad_original`) REFERENCES `productos` (`cantidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_5` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
