-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2020 a las 13:06:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dwes_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id` int(11) NOT NULL,
  `nombreCompleto` varchar(25) NOT NULL,
  `genero` varchar(25) NOT NULL,
  `fotografia` varchar(25) NOT NULL,
  `nacionalidad` varchar(25) NOT NULL,
  `sexo` varchar(25) NOT NULL,
  `edad` varchar(25) NOT NULL,
  `discos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(25) NOT NULL,
  `autor` varchar(25) NOT NULL,
  `genero` varchar(25) NOT NULL,
  `precio` float NOT NULL,
  `caratula` varchar(100) NOT NULL,
  `detalle` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id`, `titulo`, `autor`, `genero`, `precio`, `caratula`, `detalle`) VALUES
(11, 'Music to be murdered', 'Eminem', 'rap', 12, '200117021516-02-eminem-new-album-super-169.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h'),
(12, 'El circulo', 'Kase o', 'rap', 18, 'cd-kaseo-el-circulo.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h'),
(13, 'drg', 'gfd', 'jazz', 33, 'Art blakey.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h'),
(14, 'Esenciall Jose Luis peral', 'Jose luis perales', 'rock', 14, '91LlhTipm2L._SL1500_.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `discoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `pais` varchar(25) NOT NULL,
  `provincia` varchar(25) NOT NULL,
  `localidad` varchar(25) NOT NULL,
  `calle` varchar(25) NOT NULL,
  `detalle` varchar(25) NOT NULL,
  `cp` varchar(25) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `telefono`, `pass`, `pais`, `provincia`, `localidad`, `calle`, `detalle`, `cp`, `tipo`) VALUES
(14, 'El fakin admin', 'Cuevas', 'admin@admin.com', '666666666', '81dc9bdb52d04dc20036dbd8313ed055', 'España', 'cantabria', 'Torrelavega', 'rio deva', '1', '39300', 0),
(15, 'Jesus', 'Cuevas', 'usuario@usuario.com', '666666666', '81dc9bdb52d04dc20036dbd8313ed055', 'España', 'cantabria', 'Torrelavega', 'rio deva', '1', '39300', 1),
(16, 'prueba tipo admin', 'prueba tipo admin', 'dxsd@gmail.com', 'prueba tipo admin', '6ba81cecf36231a5775e008f97f83390', 'prueba tipo admin', 'prueba tipo admin', 'prueba tipo admin', 'prueba tipo admin', 'prueba tipo admin', 'prueba tipo admin', 0),
(17, 'prueba usuario', 'prueba usuario', 'administradorpr@df.om', 'prueba usuario', '85e09659e3866d57b71106650ea8d699', 'asdf', 'prueba usuario', 'prueba usuario', 'prueba usuario', 'prueba usuario', 'prueba usuario', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discos` (`discos`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioId` (`usuarioId`),
  ADD KEY `discoId` (`discoId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autores`
--
ALTER TABLE `autores`
  ADD CONSTRAINT `autores_ibfk_1` FOREIGN KEY (`discos`) REFERENCES `discos` (`id`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`discoId`) REFERENCES `discos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
