-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2025 a las 20:57:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdbiblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni`, `nombre`, `apellido`, `carrera`) VALUES
('40192583', 'Yamila', 'Chavez', 1),
('42089516', 'Nicolas', 'Garcia', 2),
('45678123', 'Teo ', 'Fernandez', 2),
('47912568', 'Karina', 'Diaz', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `articulo` varchar(250) NOT NULL,
  `detalle` varchar(250) NOT NULL,
  `numero_inventario` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `articulo`, `detalle`, `numero_inventario`, `estado`) VALUES
(1, 'Botas de Seguridad', 'Las botas de Seguridad que se componen de puntera de acero y plantilla anti perforante. ', 'ART-200', 1),
(5, 'Gafas de Seguridad', 'Las gafas de seguridad son fundamentales para proteger los ojos frente a diversos riesgos laborales', 'ART-100', 1),
(6, 'Guantes de Seguridad', 'Los guantes de seguridad diseñados para proteger las manos contra riesgos', 'ART-99', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `carrera` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `carrera`) VALUES
(1, 'Tecnicatura Superior en Seguridad e Higiene'),
(2, 'Tecnicatura Superior en Diseño y Desarrollo de productos mecánicos'),
(4, 'Tecnicatura Superior en Desarrollo de Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`, `descripcion`) VALUES
(1, 'Disponible', 'Puede ser prestado'),
(2, 'Prestado', 'Actualmente en uso'),
(4, 'Dañado', 'En reparación o fuera de servicio'),
(6, 'Atrasado', 'No fue devuelto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autor` varchar(150) NOT NULL,
  `editorial` varchar(100) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `numero_inventario` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `editorial`, `ISBN`, `numero_inventario`, `estado`) VALUES
(1, 'Harry Potter y la piedra filosofal', 'J. K. Rowling', 'Bloomsbury', '9789878000404', 'ART-001', 1),
(2, 'El Señor de los Anillos: La Comunidad del Anillo', 'J. R. R. Tolkien', 'George Allen & Unwin', '9789505472710', 'ART-100', 1),
(5, 'El Caballero de la Armadura Oxidada', 'Robert Fisher', 'Ediciones Obelisco', '9788497772303', 'ART-230', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamos` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `dni_alumno` varchar(20) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamos`, `id_libro`, `dni_alumno`, `fecha_prestamo`, `fecha_devolucion`) VALUES
(31, 1, '42089516', '2025-10-12', '2025-10-12'),
(32, 2, '42089516', '2025-10-12', '2025-10-12'),
(33, 1, '42089516', '2025-10-12', '2025-10-12'),
(34, 1, '42089516', '2025-10-12', '2025-10-12'),
(35, 1, '42089516', '2025-10-12', '2025-10-12'),
(37, 2, '42089516', '2025-10-12', '2025-10-14'),
(38, 5, '42089516', '2025-10-13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos_articulos`
--

CREATE TABLE `prestamos_articulos` (
  `id_prestamos_articulos` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `dni_alumno` varchar(20) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamos_articulos`
--

INSERT INTO `prestamos_articulos` (`id_prestamos_articulos`, `id_articulo`, `dni_alumno`, `fecha_prestamo`, `fecha_devolucion`) VALUES
(2, 1, '42089516', '2025-10-14', '2025-10-14'),
(3, 5, '42089516', '2025-10-14', '2025-10-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`) VALUES
(1, 'nico', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `carreras` (`carrera`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`),
  ADD UNIQUE KEY `numero_inventario` (`numero_inventario`),
  ADD KEY `estado2` (`estado`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD UNIQUE KEY `numero_inventario` (`numero_inventario`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamos`),
  ADD KEY `id_tem2` (`id_libro`),
  ADD KEY `dni` (`dni_alumno`);

--
-- Indices de la tabla `prestamos_articulos`
--
ALTER TABLE `prestamos_articulos`
  ADD PRIMARY KEY (`id_prestamos_articulos`),
  ADD KEY `articulo2` (`id_articulo`),
  ADD KEY `dni_alumno2` (`dni_alumno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `prestamos_articulos`
--
ALTER TABLE `prestamos_articulos`
  MODIFY `id_prestamos_articulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `carreras` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id_carrera`);

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `estado2` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `dni` FOREIGN KEY (`dni_alumno`) REFERENCES `alumnos` (`dni`),
  ADD CONSTRAINT `id_tem2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`);

--
-- Filtros para la tabla `prestamos_articulos`
--
ALTER TABLE `prestamos_articulos`
  ADD CONSTRAINT `articulo2` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`),
  ADD CONSTRAINT `dni_alumno2` FOREIGN KEY (`dni_alumno`) REFERENCES `alumnos` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
