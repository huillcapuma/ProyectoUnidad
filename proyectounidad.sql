-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3360
-- Tiempo de generación: 18-12-2021 a las 22:11:41
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectounidad`
CREATE DATABASE proyectounidad;
USE proyectounidad;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(9) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechavencimiento` datetime NOT NULL,
  `idusuario` int(9) NOT NULL,
  `categoria` int(5) NOT NULL,
  `contenido` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `titulo`, `fecharegistro`, `fechavencimiento`, `idusuario`, `categoria`, `contenido`) VALUES
(679, 'otra pruebita', '2021-12-13 14:47:00', '2021-12-22 14:47:00', 1, 1, '    otra prueba            '),
(735, '123', '2021-12-13 16:54:00', '2021-12-30 16:54:00', 1, 1, '            123456    '),
(759, 'PRUBAFINAL', '2021-12-13 14:41:00', '2021-12-28 14:41:00', 1, 1, '           ASDASD     ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellido`, `username`, `password`) VALUES
('1', '1', '1', '$2y$10$Mwp909C0aAezBiBMmw6JVersrN11J9O468.hHTTJefCTu.h5CTSdS'),
('kem', 'kem', 'kem', '$2y$10$Ye0FOLi85HMYyg0DUZmALO5yQmHurs8J/0PI5dCHYcyziibWcXPva');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
