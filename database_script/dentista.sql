-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2021 a las 10:23:03
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dentista`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Odontologo', 'especialista en odontologia'),
(2, 'Ayudante pro', 'ayudante del especialista'),
(4, 'Cargo prueba', 'prueba descripcion 2'),
(5, 'Otro cargo', 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_consulta`
--

CREATE TABLE `detalle_consulta` (
  `id` int(11) NOT NULL,
  `id_ficha_consulta` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_consulta`
--

INSERT INTO `detalle_consulta` (`id`, `id_ficha_consulta`, `id_servicio`, `cantidad`, `precio`) VALUES
(19, 1, 1, 2, 20),
(20, 1, 2, 1, 50.5),
(24, 9, 1, 1, 100),
(25, 9, 2, 2, 160),
(28, 10, 1, 2, 300),
(29, 10, 2, 2, 100),
(30, 10, 1, 1, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_nota_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_nota_venta`, `id_producto`, `cantidad`, `precio`) VALUES
(29, 19, 1, 4, 40),
(30, 19, 3, 5, 32.5),
(31, 19, 1, 4, 40),
(34, 21, 1, 2, 30),
(40, 22, 1, 5, 50),
(41, 22, 3, 3, 19.5),
(42, 22, 5, 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialista`
--

CREATE TABLE `especialista` (
  `id` int(11) NOT NULL,
  `ci` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialista`
--

INSERT INTO `especialista` (`id`, `ci`, `nombre`, `id_cargo`, `edad`, `telefono`) VALUES
(1, '8146522', 'Jose Zambrana', 1, 35, '76512'),
(2, '546522', 'Juana Sanchez', 2, 30, '1345'),
(3, '8156445', 'Gustavo FFFF', 4, 22, '2313322'),
(5, '8151', 'Solair 2', 1, 45, '77889944');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_consulta`
--

CREATE TABLE `ficha_consulta` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_especialista` int(11) NOT NULL,
  `monto` float NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ficha_consulta`
--

INSERT INTO `ficha_consulta` (`id`, `id_paciente`, `id_especialista`, `monto`, `fecha`, `hora`, `estado`) VALUES
(1, 8, 2, 70.5, '2021-01-18', '00:40:13', 'en curso'),
(9, 1, 5, 260, '2021-01-18', '00:46:01', 'Listo'),
(10, 2, 3, 500, '2021-01-18', '00:47:16', 'Terminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_venta`
--

CREATE TABLE `nota_venta` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_especialista` int(11) NOT NULL,
  `monto` float NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `observacion` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nota_venta`
--

INSERT INTO `nota_venta` (`id`, `id_paciente`, `id_especialista`, `monto`, `fecha`, `hora`, `observacion`) VALUES
(19, 1, 1, 112.5, '2021-01-17', '21:54:09', 'observacion 2'),
(21, 1, 5, 30, '2021-01-18', '00:28:11', 'observacion editada'),
(22, 16, 3, 119.5, '2021-01-18', '00:50:53', 'nada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `ci` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `ci`, `nombre`, `edad`, `telefono`) VALUES
(1, '8156445', 'Gustavo Franco', 24, '12345678'),
(2, '8645121', 'Goku Camacho', 20, '4154123'),
(8, '6', 'San Roque', 11, '123332'),
(14, '811223', 'Carla Fernandez', 45, '23133'),
(16, '8146522', 'Gustavo FFFF', 24, '34134');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `marca` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `marca`, `descripcion`) VALUES
(1, 'Pasta Dental', 10, 'Colgate', 'para cepillarse'),
(3, 'Hilo Dental', 6.5, 'Marca 1', 'hilo para limpiar los dientes'),
(5, 'Producto dental', 50, 'Marca dientes', 'nada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_servicio` int(11) NOT NULL,
  `precio` float NOT NULL,
  `duracion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `nombre`, `id_tipo_servicio`, `precio`, `duracion`) VALUES
(1, 'Limpieza total', 1, 150, 1),
(2, 'Revision', 3, 50.5, 0.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Odontologia', 'descripcion de odontologia'),
(3, 'Cirugia Oral', 'descripcion de cirugia'),
(4, 'Tipo 2', 'nadaa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_consulta`
--
ALTER TABLE `detalle_consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ficha_consulta` (`id_ficha_consulta`,`id_servicio`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nota_venta` (`id_nota_venta`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci` (`ci`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `ficha_consulta`
--
ALTER TABLE `ficha_consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`,`id_especialista`),
  ADD KEY `id_especialista` (`id_especialista`);

--
-- Indices de la tabla `nota_venta`
--
ALTER TABLE `nota_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`,`id_especialista`),
  ADD KEY `id_especialista` (`id_especialista`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci` (`ci`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_servicio` (`id_tipo_servicio`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_consulta`
--
ALTER TABLE `detalle_consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `especialista`
--
ALTER TABLE `especialista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ficha_consulta`
--
ALTER TABLE `ficha_consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `nota_venta`
--
ALTER TABLE `nota_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_consulta`
--
ALTER TABLE `detalle_consulta`
  ADD CONSTRAINT `detalle_consulta_ibfk_1` FOREIGN KEY (`id_ficha_consulta`) REFERENCES `ficha_consulta` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_consulta_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_nota_venta`) REFERENCES `nota_venta` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD CONSTRAINT `especialista_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ficha_consulta`
--
ALTER TABLE `ficha_consulta`
  ADD CONSTRAINT `ficha_consulta_ibfk_1` FOREIGN KEY (`id_especialista`) REFERENCES `especialista` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ficha_consulta_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_venta`
--
ALTER TABLE `nota_venta`
  ADD CONSTRAINT `nota_venta_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_venta_ibfk_2` FOREIGN KEY (`id_especialista`) REFERENCES `especialista` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_tipo_servicio`) REFERENCES `tipo_servicio` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
