-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2021 a las 19:37:41
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
(4, '2021-03-05 16:25:04', 66.00),
(5, '2021-03-05 16:25:19', 66.00),
(6, '2021-03-05 16:25:34', 65.00),
(7, '2021-03-05 16:25:49', 65.00),
(8, '2021-03-05 16:26:05', 65.00),
(9, '2021-03-05 16:26:20', 65.00),
(10, '2021-03-05 16:26:35', 65.00),
(11, '2021-03-05 16:26:50', 65.00),
(12, '2021-03-05 16:27:04', 65.00),
(13, '2021-03-05 16:27:20', 65.00),
(14, '2021-03-05 16:27:35', 65.00),
(15, '2021-03-05 16:27:50', 65.00),
(16, '2021-03-05 16:28:05', 65.00),
(17, '2021-03-05 16:28:20', 65.00),
(18, '2021-03-05 16:28:35', 65.00),
(19, '2021-03-05 16:28:50', 65.00),
(20, '2021-03-05 16:29:05', 65.00),
(21, '2021-03-05 16:29:20', 65.00),
(22, '2021-03-05 16:29:34', 65.00),
(23, '2021-03-05 16:29:49', 65.00),
(24, '2021-03-05 16:30:04', 65.00),
(25, '2021-03-05 16:30:19', 65.00),
(26, '2021-03-05 16:30:34', 65.00),
(27, '2021-03-05 16:30:49', 65.00),
(28, '2021-03-05 16:31:03', 65.00),
(29, '2021-03-05 16:31:18', 65.00),
(30, '2021-03-05 16:31:33', 65.00),
(31, '2021-03-05 16:31:48', 65.00),
(32, '2021-03-05 16:32:03', 65.00),
(33, '2021-03-05 16:32:19', 66.00),
(34, '2021-03-05 16:32:34', 65.00),
(35, '2021-03-05 16:32:49', 65.00),
(36, '2021-03-05 16:33:05', 75.00),
(37, '2021-03-05 16:33:20', 66.00),
(38, '2021-03-05 16:33:36', 64.00),
(39, '2021-03-05 16:33:50', 62.00),
(40, '2021-03-05 16:34:06', 62.00),
(41, '2021-03-05 16:34:21', 61.00),
(42, '2021-03-05 16:34:36', 61.00),
(43, '2021-03-05 16:34:51', 60.00),
(44, '2021-03-05 16:35:06', 62.00),
(45, '2021-03-05 16:35:21', 63.00),
(46, '2021-03-05 16:35:36', 62.00),
(47, '2021-03-05 16:35:51', 62.00),
(48, '2021-03-05 16:36:06', 63.00),
(49, '2021-03-05 16:36:21', 63.00),
(50, '2021-03-05 16:36:35', 63.00),
(51, '2021-03-05 16:36:50', 63.00),
(52, '2021-03-05 16:37:05', 63.00),
(53, '2021-03-05 16:37:20', 64.00),
(54, '2021-03-05 16:37:35', 63.00),
(55, '2021-03-05 16:37:49', 64.00),
(56, '2021-03-05 16:38:04', 64.00),
(57, '2021-03-05 16:38:19', 64.00),
(58, '2021-03-05 16:38:34', 64.00),
(59, '2021-03-05 16:38:50', 64.00),
(60, '2021-03-05 16:39:06', 64.00),
(61, '2021-03-05 16:39:21', 65.00),
(62, '2021-03-05 16:39:35', 65.00),
(63, '2021-03-05 16:39:50', 65.00),
(64, '2021-03-05 16:40:05', 65.00),
(65, '2021-03-05 16:40:20', 65.00),
(66, '2021-03-05 16:40:35', 65.00),
(67, '2021-03-05 16:40:50', 65.00),
(68, '2021-03-05 16:41:05', 65.00),
(69, '2021-03-05 16:41:19', 65.00),
(70, '2021-03-05 16:41:34', 65.00),
(71, '2021-03-05 16:41:49', 65.00),
(72, '2021-03-05 16:42:04', 65.00),
(73, '2021-03-05 16:42:19', 65.00),
(74, '2021-03-05 16:42:34', 65.00),
(75, '2021-03-05 16:42:48', 65.00);

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
(4, '2021-03-05 16:25:04', 20.70),
(5, '2021-03-05 16:25:19', 20.70),
(6, '2021-03-05 16:25:34', 20.70),
(7, '2021-03-05 16:25:49', 20.70),
(8, '2021-03-05 16:26:05', 20.70),
(9, '2021-03-05 16:26:20', 20.70),
(10, '2021-03-05 16:26:35', 20.70),
(11, '2021-03-05 16:26:50', 20.70),
(12, '2021-03-05 16:27:04', 20.80),
(13, '2021-03-05 16:27:20', 20.80),
(14, '2021-03-05 16:27:35', 19.60),
(15, '2021-03-05 16:27:50', 20.70),
(16, '2021-03-05 16:28:05', 20.70),
(17, '2021-03-05 16:28:20', 20.70),
(18, '2021-03-05 16:28:35', 20.80),
(19, '2021-03-05 16:28:50', 20.70),
(20, '2021-03-05 16:29:05', 20.40),
(21, '2021-03-05 16:29:20', 20.80),
(22, '2021-03-05 16:29:34', 20.80),
(23, '2021-03-05 16:29:49', 20.70),
(24, '2021-03-05 16:30:04', 20.80),
(25, '2021-03-05 16:30:19', 20.70),
(26, '2021-03-05 16:30:34', 20.90),
(27, '2021-03-05 16:30:49', 20.80),
(28, '2021-03-05 16:31:03', 20.80),
(29, '2021-03-05 16:31:18', 20.70),
(30, '2021-03-05 16:31:33', 20.80),
(31, '2021-03-05 16:31:48', 20.90),
(32, '2021-03-05 16:32:03', 20.90),
(33, '2021-03-05 16:32:19', 21.80),
(34, '2021-03-05 16:32:34', 20.80),
(35, '2021-03-05 16:32:49', 20.90),
(36, '2021-03-05 16:33:05', 21.50),
(37, '2021-03-05 16:33:20', 22.10),
(38, '2021-03-05 16:33:36', 22.30),
(39, '2021-03-05 16:33:50', 22.40),
(40, '2021-03-05 16:34:06', 22.60),
(41, '2021-03-05 16:34:21', 22.60),
(42, '2021-03-05 16:34:36', 22.50),
(43, '2021-03-05 16:34:51', 21.90),
(44, '2021-03-05 16:35:06', 22.20),
(45, '2021-03-05 16:35:21', 22.10),
(46, '2021-03-05 16:35:36', 21.90),
(47, '2021-03-05 16:35:51', 21.90),
(48, '2021-03-05 16:36:06', 21.80),
(49, '2021-03-05 16:36:21', 21.80),
(50, '2021-03-05 16:36:35', 21.70),
(51, '2021-03-05 16:36:50', 21.50),
(52, '2021-03-05 16:37:05', 21.50),
(53, '2021-03-05 16:37:20', 21.50),
(54, '2021-03-05 16:37:35', 21.60),
(55, '2021-03-05 16:37:49', 21.40),
(56, '2021-03-05 16:38:04', 21.40),
(57, '2021-03-05 16:38:19', 21.40),
(58, '2021-03-05 16:38:34', 21.30),
(59, '2021-03-05 16:38:50', 21.30),
(60, '2021-03-05 16:39:06', 21.20),
(61, '2021-03-05 16:39:21', 21.40),
(62, '2021-03-05 16:39:35', 21.20),
(63, '2021-03-05 16:39:50', 21.30),
(64, '2021-03-05 16:40:05', 21.10),
(65, '2021-03-05 16:40:20', 21.30),
(66, '2021-03-05 16:40:35', 21.30),
(67, '2021-03-05 16:40:50', 21.20),
(68, '2021-03-05 16:41:05', 21.20),
(69, '2021-03-05 16:41:19', 21.30),
(70, '2021-03-05 16:41:34', 21.20),
(71, '2021-03-05 16:41:49', 21.30),
(72, '2021-03-05 16:42:04', 21.20),
(73, '2021-03-05 16:42:19', 21.10),
(74, '2021-03-05 16:42:34', 21.20),
(75, '2021-03-05 16:42:48', 21.30);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `datost`
--
ALTER TABLE `datost`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
