-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2023 a las 19:37:22
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `virtual-route`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `pk-comentar` int(11) NOT NULL,
  `pk-usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `contenido` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`pk-comentar`, `pk-usuario`, `fecha`, `contenido`) VALUES
(2, 22, '2023-05-07', 'Hola, soy test. Soy un usuario de prueba'),
(3, 22, '2023-05-07', 'Este es un comentario de prueba'),
(4, 22, '2023-05-07', 'Comentario de ejemplo'),
(5, 22, '2023-05-08', 'Hola, recuerdame'),
(6, 26, '2023-05-08', 'Hola, este es mi comentario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semester`
--

CREATE TABLE `semester` (
  `pksemester` int(2) NOT NULL,
  `namesemester` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `semester`
--

INSERT INTO `semester` (`pksemester`, `namesemester`) VALUES
(1, 'postgrado'),
(3, 'no soy estudiante'),
(4, 'primero'),
(5, 'segundo'),
(6, 'tercero'),
(7, 'cuarto'),
(8, 'quinto'),
(9, 'sexto'),
(10, 'septimo'),
(11, 'octavo'),
(12, 'noveno'),
(13, 'decimo'),
(14, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeuser`
--

CREATE TABLE `typeuser` (
  `pktype` int(2) NOT NULL,
  `nametype` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `typeuser`
--

INSERT INTO `typeuser` (`pktype`, `nametype`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `pkuser` int(7) NOT NULL,
  `fktype` int(2) NOT NULL,
  `nameuser` varchar(100) NOT NULL,
  `emailuser` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `fksemester` int(2) NOT NULL,
  `passuser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`pkuser`, `fktype`, `nameuser`, `emailuser`, `date`, `fksemester`, `passuser`) VALUES
(1, 1, 'administrador', 'administrador@gmail.com', '2023-02-19', 14, 'administrador'),
(22, 2, 'test', 'test@gmail.com', '0000-00-00', 3, 'etest'),
(23, 2, 'pruebas', 'pruebas@gmail.com', '2023-05-07', 3, 'epruebas'),
(26, 2, 'usar', 'usar@gmail.com', '2023-05-07', 3, 'eusar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`pk-comentar`,`pk-usuario`),
  ADD KEY `pk-usuario` (`pk-usuario`);

--
-- Indices de la tabla `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`pksemester`);

--
-- Indices de la tabla `typeuser`
--
ALTER TABLE `typeuser`
  ADD PRIMARY KEY (`pktype`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pkuser`,`passuser`),
  ADD KEY `fktype` (`fktype`),
  ADD KEY `fksemester` (`fksemester`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `pk-comentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `semester`
--
ALTER TABLE `semester`
  MODIFY `pksemester` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `typeuser`
--
ALTER TABLE `typeuser`
  MODIFY `pktype` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `pkuser` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`fktype`) REFERENCES `typeuser` (`pktype`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`fksemester`) REFERENCES `semester` (`pksemester`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
