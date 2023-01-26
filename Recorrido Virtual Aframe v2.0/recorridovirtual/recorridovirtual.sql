-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 17:52:11
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recorridovirtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(10) NOT NULL,
  `Nombre_Administrador` varchar(150) NOT NULL,
  `Telefono_Administrador` bigint(10) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Contraseña` char(60) NOT NULL,
  `Tipo_Usuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `Nombre_Administrador`, `Telefono_Administrador`, `Correo`, `Contraseña`, `Tipo_Usuario`) VALUES
(1, 'Juan Vazquez', 8122983052, 'juanjoz123@outlook.com', 'Juanjoz12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre_Cliente` varchar(150) NOT NULL,
  `telefono_Cliente` bigint(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` char(60) NOT NULL,
  `tipo_Usuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_Cliente`, `telefono_Cliente`, `correo`, `password`, `tipo_Usuario`) VALUES
(7, 'Juan Vazquez', 8112368900, 'juanjoz123@outlook.com', '$2y$10$560VZjvmXo7eYPjyAxkMXukqTurlNtCmZjQ9e0HCGOMpzSro0oZlO', 1),
(8, 'Lucia Robles', 8123456873, 'lucyrg@outlook.com', '$2y$10$xtCBIZwcEmoSYlTHHIBjrOiyqDVLbq1vKWIr8yF.Gwbe833dbpNeO', 2),
(9, 'Juan Vazquez', 8112368901, 'jjvr123@outlook.com', '$2y$10$BrtKkyGPaBsfKXuowisKa.O8P4nU5IbSVBVhQZgSSW1yrgydkVM6e', 2),
(10, 'Melina Vazquez', 8123456854, 'mlr123@outlook.com', '$2y$10$4SKUpfNg6jJG2oEpi9B8JeRSMTC9Dowb6LZfW8TBwCevcM.YfkbsG', 2),
(11, 'eewgfe', 84184848484, 'danielmendez265@gmail.com', '$2y$10$DpH60IUBzhsv.yD09dlTouNhKMFTY0kzVv.yrSGhzhSwLSg9zhQ9S', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `numero_Apartado` int(11) NOT NULL,
  `fecha_Pedido` date NOT NULL,
  `id_Cliente` int(11) NOT NULL,
  `nombre_Cliente` varchar(150) NOT NULL,
  `clave_Producto` int(11) NOT NULL,
  `nombre_Producto` varchar(150) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`numero_Apartado`, `fecha_Pedido`, `id_Cliente`, `nombre_Cliente`, `clave_Producto`, `nombre_Producto`, `precio`, `imagen`) VALUES
(5, '2022-04-09', 9, 'Juan Vazquez', 2, 'chaqueta de piel', '250.00', '89e1013854a8f23a159c6ebc7dad9a5a.jpg'),
(6, '2022-04-09', 9, 'Juan Vazquez', 2, 'chaqueta de piel', '250.00', '89e1013854a8f23a159c6ebc7dad9a5a.jpg'),
(7, '2022-04-09', 9, 'Juan Vazquez', 2, 'chaqueta de piel', '250.00', '89e1013854a8f23a159c6ebc7dad9a5a.jpg'),
(8, '2022-04-09', 9, 'Juan Vazquez', 2, 'chaqueta de piel', '250.00', '89e1013854a8f23a159c6ebc7dad9a5a.jpg'),
(9, '2022-04-09', 7, 'Juan Vazquez', 2, 'chaqueta de piel', '250.00', '89e1013854a8f23a159c6ebc7dad9a5a.jpg'),
(10, '2022-04-09', 9, 'Juan Vazquez', 2, 'chaqueta de piel', '250.00', '89e1013854a8f23a159c6ebc7dad9a5a.jpg'),
(11, '2022-04-09', 9, 'Juan Vazquez', 2, 'chaqueta de piel', '250.00', '89e1013854a8f23a159c6ebc7dad9a5a.jpg'),
(12, '2022-04-09', 9, 'Juan Vazquez', 3, 'chaqueta de piel', '250.00', '32f7468cc4cefe131eb4393f23c5ef9a.jpg'),
(13, '2022-04-09', 7, 'Juan Vazquez', 4, 'chaqueta de piel', '250.00', '6207ec653c0011156e4e3adbbced0570.jpg'),
(14, '2022-04-09', 7, 'Juan Vazquez', 5, 'chaqueta de piel', '200.00', 'd34030d77e618f89e05e9794811ce70d.jpg'),
(15, '2022-04-09', 9, 'Juan Vazquez', 6, 'chaqueta de piel', '239.00', '15f496b473c29663ee92f2505dcab201.jpg'),
(16, '2022-04-09', 9, 'Juan Vazquez', 7, 'chaqueta de piel', '1234.00', 'b9cae7e2b12666c62368f0ca6bd58eb1.jpg'),
(17, '2022-04-09', 9, 'Juan Vazquez', 9, 'chaqueta de piel', '321.00', 'a9492249b1a509457ca68d11a301b20f.jpg'),
(18, '2022-04-09', 9, 'Juan Vazquez', 8, 'chaqueta de piel', '234.00', 'cb7a64fd19c1e1d1c79d8add44536581.jpg'),
(19, '2022-04-09', 9, 'Juan Vazquez', 10, 'chaqueta de piel', '123.00', 'aca2fb31add9d912aa086764990d4031.jpg'),
(20, '2022-04-28', 8, 'Lucia Robles', 11, 'chaqueta de piel', '123.00', 'a92b025e4fa0a09fe78fa67a9cffe5f8.jpg'),
(22, '2022-04-28', 8, 'Lucia Robles', 17, 'Falda', '213.00', 'f5e029f8c162837decd3e0b13282eddd.jpg'),
(23, '2022-04-28', 8, 'Lucia Robles', 15, 'Falda', '432.00', '33dd3c4df9092278fea66d4630690630.jpg'),
(24, '2022-04-28', 8, 'Lucia Robles', 19, 'Player Harry Potter', '210.00', '06f53a38279d2b2b0e54bd0f28f40705.jpg'),
(25, '2022-04-29', 8, 'Lucia Robles', 21, 'Nike', '234.00', 'ed51c16fbb417a95210730968782e3ea.jpg'),
(26, '2022-04-29', 8, 'Lucia Robles', 23, 'chaqueta de piel', '213.00', '3e94e7f1754089a60341edbb4cb2a279.jpg'),
(27, '2022-04-29', 8, 'Lucia Robles', 25, 'vestido', '500.00', '39e93aeeb59defd524cc3f5196f75154.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `clave_Producto` int(11) NOT NULL,
  `nombre_Producto` varchar(150) NOT NULL,
  `imagen_Producto` varchar(200) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `talla` varchar(15) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fechaCreacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`clave_Producto`, `nombre_Producto`, `imagen_Producto`, `marca`, `talla`, `descripcion`, `precio`, `fechaCreacion`) VALUES
(12, 'chaqueta de piel', '3491171c9fd0bdf4040fff089360f957.jpg', 'GAP', 'S', 'nskjdncmsd', '123.00', '2022-04-09'),
(13, 'Falda', '2a75383a3f07848d63004839517a2d47.jpg', 'GAP', 'M', 'jknsdkjcnsd jsdncjk', '231.00', '2022-04-09'),
(14, 'Falda', '8d58981c3e6ed59030742a74556f06c8.jpg', 'GAP', 'M', 'jknsdkjcnsl,md jsdncjk', '231.00', '2022-04-09'),
(16, 'chaqueta de piel', 'b616a604d0f666080b4c0a83dd5e2e29.jpg', 'GAP', 'M', 'smmdlnkls jfdnkjs', '124.00', '2022-04-09'),
(20, 'sjdnfjksd', '330c22c9b7c5efd550306d8a7bbc3d2e.jpg', 'GAP', 'm', 'kjc jfdshfj hjkahcjkdassh', '321.00', '2022-04-28'),
(22, 'chaqueta de piel', '515270eb83d3059d00140894047411fd.jpg', 'Levis', 'M', 'jsnjsdn ksdbjhbsajd', '432.00', '2022-04-29'),
(24, 'chaqueta de piel', '85da60cfa38482d3d288919f2ea18da0.jpg', 'GAP', 'S', 'ksdnkdjs  dnnslkndkl', '111.00', '2022-04-29'),
(26, 'blusa beige', 'b44a509e9c335dfaaa2c7c3d6bb86cdb.jpg', 'Levis', 'L', 'jsncjsnajcnds josndjkfnsdjk', '231.00', '2022-04-29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Nombre_Cliente` (`nombre_Cliente`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`numero_Apartado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`clave_Producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `numero_Apartado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `clave_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
