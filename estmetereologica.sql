-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2021 a las 17:20:10
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estmetereologica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosh`
--

CREATE TABLE `datosh` (
  `id` int(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `humedad` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datosh`
--

INSERT INTO `datosh` (`id`, `fecha`, `humedad`) VALUES
(1, '2021-03-05 03:54:55', 30.00),
(2, '2021-03-05 16:06:37', 50.00),
(3, '2021-03-05 16:06:54', 35.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datost`
--

CREATE TABLE `datost` (
  `id` int(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `temperatura` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datost`
--

INSERT INTO `datost` (`id`, `fecha`, `temperatura`) VALUES
(1, '2021-03-05 03:54:55', 27.00),
(2, '2021-03-05 16:06:37', 24.00),
(3, '2021-03-05 16:06:53', 29.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datosh`
--
ALTER TABLE `datosh`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datost`
--
ALTER TABLE `datost`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datosh`
--
ALTER TABLE `datosh`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `datost`
--
ALTER TABLE `datost`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
